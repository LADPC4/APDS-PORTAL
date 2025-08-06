<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pli;
use App\Models\Classification;
use App\Models\Region;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    { 
        $classifications = Classification::orderBy('name')->get();
        $regions = Region::orderBy('name')->get();

        return view('auth.register', compact('classifications', 'regions'));
        // return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => 'required|string|max:255',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'contact_number' => 'required|string|max:20',
            // 'classification' => 'required|string|max:255',
            'classification_id' => 'required|exists:classifications,id',
            // 'region' => 'required|string|max:255',
            'region' => 'required|array',
            'region.*' => 'string',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            // 'classification' => $request->classification,
            'classification_id' => $request->classification_id,
            'region' => $request->region,
            'password' => Hash::make($request->password),
            'usertype' => 'user',
            'status' => 'for-evaluation',
        ]);

        // Create a PLI for the user
        $pli = Pli::create([
            'name' => $user->name,
            'classification_id' => $user->classification_id,
            'region' => $user->region,
        ]);
        
        // Connect the PLI to the user (not as admin)
        $user->plis()->attach($pli->id);

        event(new Registered($user));

        Auth::login($user);

        // return redirect(route('dashboard', absolute: false));
        

        // Redirect based on usertype
        if ($user->usertype === 'admin') {
            return redirect('/admin');
        }

        if ($user->usertype === 'user') {
            return redirect('/user');
        }

        return redirect('/');
    }
}
