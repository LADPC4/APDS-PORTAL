<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ExistingPli;
use App\Models\User;
use App\Models\Pli;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules;
use Illuminate\View\View;


class ExistingPliRegistrationController extends Controller
{
    /**
     * Show loan code input form
     */
    public function showLoanCodeForm(): View
    {
        return view('auth.existing-pli.loan-code');
    }

    /**
     * Validate loan code and redirect to confirmation
     */
    public function validateLoanCode(Request $request): RedirectResponse
    {
        $request->validate([
            'loan_code' => 'required|string'
        ]);

        $existingPli = ExistingPli::where('loan_code', $request->loan_code)->first();

        if (!$existingPli) {
            return back()->withErrors(['loan_code' => 'Invalid loan code. Please check and try again.']);
        }

        // Check if PLI already has a user assigned
        if ($existingPli->user_in_charge) {
            return back()->withErrors(['loan_code' => 'This PLI is already registered with a user.']);
        }

        // Store PLI data in session
        Session::put('registration.existing_pli_id', $existingPli->id);
        Session::put('registration.loan_code', $request->loan_code);

        return redirect()->route('register.existing.confirm');
    }

    /**
     * Show PLI details for confirmation
     */
    public function showConfirmation(): View|RedirectResponse
    {
        $existingPliId = Session::get('registration.existing_pli_id');
        
        if (!$existingPliId) {
            return redirect()->route('register.existing')->withErrors(['error' => 'Session expired. Please try again.']);
        }

        $existingPli = ExistingPli::with('classification')->find($existingPliId);
        
        if (!$existingPli) {
            Session::forget(['registration.existing_pli_id', 'registration.loan_code']);
            return redirect()->route('register.existing')->withErrors(['error' => 'PLI not found. Please try again.']);
        }

        return view('auth.existing-pli.confirm', compact('existingPli'));
    }

    /**
     * Process yes/no confirmation
     */
    public function processConfirmation(Request $request): RedirectResponse
    {
        $request->validate([
            'confirmation' => 'required|in:yes,no'
        ]);

        if ($request->confirmation === 'no') {
            Session::forget(['registration.existing_pli_id', 'registration.loan_code']);
            return redirect()->route('register.canceled');
        }

        return redirect()->route('register.existing.complete');
    }

    /**
     * Show canceled registration page
     */
    public function showCanceled(): View
    {
        return view('auth.existing-pli.canceled');
    }

    /**
     * Show final registration form with existing PLI data
     */
    public function showFinalForm(): View|RedirectResponse
    {
        $existingPliId = Session::get('registration.existing_pli_id');
        
        if (!$existingPliId) {
            return redirect()->route('register.existing')->withErrors(['error' => 'Session expired. Please try again.']);
        }

        $existingPli = ExistingPli::with('classification')->find($existingPliId);
        
        if (!$existingPli) {
            Session::forget(['registration.existing_pli_id', 'registration.loan_code']);
            return redirect()->route('register.existing')->withErrors(['error' => 'PLI not found. Please try again.']);
        }

        return view('auth.existing-pli.final-form', compact('existingPli'));
    }

    /**
     * Store final registration using existing PLI data
     */
    public function storeFinalRegistration(Request $request): RedirectResponse
    {
        $existingPliId = Session::get('registration.existing_pli_id');
        
        if (!$existingPliId) {
            return redirect()->route('register.existing')->withErrors(['error' => 'Session expired. Please try again.']);
        }

        $existingPli = ExistingPli::find($existingPliId);
        
        if (!$existingPli) {
            Session::forget(['registration.existing_pli_id', 'registration.loan_code']);
            return redirect()->route('register.existing')->withErrors(['error' => 'PLI not found. Please try again.']);
        }

        // Validate user input (removed AR field validation)
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'contact_number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Convert existing PLI regional data to format needed for User/PLI
        $regionArray = $this->convertExistingPliRegionsToArray($existingPli);

        // Create User record (removed AR fields)
        $user = User::create([
            'name' => $existingPli->name,
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'address' => $request->address,
            'classification_id' => $existingPli->classification_id,
            'region' => $regionArray,
            'password' => Hash::make($request->password),
            'usertype' => 'user',
            'status' => 'for-evaluation',
        ]);

        // Create new PLI record based on existing PLI data
        $pli = Pli::create([
            'name' => $existingPli->name,
            'loan_code' => $existingPli->loan_code,
            'mas_code' => $existingPli->mas_code,
            'insurance_code' => $existingPli->insurance_code,
            'classification_id' => $existingPli->classification_id,
            'region' => $regionArray,
            'status' => 'Active',
            // Copy regional boolean flags and province data
            ...$this->mapExistingPliRegionalData($existingPli)
        ]);

        // Link PLI to User
        $user->plis()->attach($pli->id);

        // Update existing PLI to mark it as registered
        $existingPli->update([
            'user_in_charge' => $user->id
        ]);

        // Clear session data
        Session::forget(['registration.existing_pli_id', 'registration.loan_code']);

        // Fire registered event and login user
        event(new Registered($user));
        Auth::login($user);

        // Redirect to user panel
        return redirect('/user')->with('success', 'Registration completed successfully!');
    }

    /**
     * Convert existing PLI boolean regions to array format
     */
    private function convertExistingPliRegionsToArray(ExistingPli $existingPli): array
    {
        $regions = [];
        $regionCodes = ['CAR', 'NCR', 'R01', 'R02', 'R03', 'R04A', 'R04B', 'R05', 'R06', 'R07', 'R08', 'R09', 'R10', 'R11', 'R12', 'R13'];
        
        foreach ($regionCodes as $code) {
            if ($existingPli->{$code . '_region'}) {
                $regions[] = $code;
            }
        }
        
        return $regions;
    }

    /**
     * Map existing PLI regional data to new PLI format
     */
    private function mapExistingPliRegionalData(ExistingPli $existingPli): array
    {
        $data = [];
        $regionCodes = ['CAR', 'NCR', 'R01', 'R02', 'R03', 'R04A', 'R04B', 'R05', 'R06', 'R07', 'R08', 'R09', 'R10', 'R11', 'R12', 'R13'];
        
        foreach ($regionCodes as $code) {
            // Copy boolean flag
            $data[$code] = $existingPli->{$code . '_region'} ? 1 : 0;
            // Copy province data
            $data[$code . '_Prov'] = $existingPli->{$code . '_provinces'} ?? [];
        }
        
        return $data;
    }
}