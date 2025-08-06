@props(['compact' => false])

<footer class="bg-[#1c2b50] text-white border-t border-gray-200 mt-auto {{ $compact ? 'py-3' : 'py-8' }}">
    <div class="container mx-auto px-4">
        @if($compact)
            {{-- Compact footer layout --}}
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center mb-2 md:mb-0">
                    <img src="{{ asset('images/logo.png') }}" alt="DPLIAS Logo" >
                    <span class="text-xs">
                        Copyright © Department of Education {{ date('Y') }}. All rights reserved.
                    </span>
                </div>
                <div class="flex flex-wrap justify-center">
                    <a href="" class="text-xs hover:text-gray-300 mx-2">Data Policy</a>
                    <a href="" class="text-xs hover:text-gray-300 mx-2">Contact Support</a>
                </div>
            </div>
        @else
            {{-- Full footer layout --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <!-- First Column - Seal Only -->
                <div class="flex justify-center items-center h-full">
                    <img src="{{ asset('images/logo.png') }}" alt="DPLIAS Logo" class="h-72">
                </div>

                <!-- Second Column -->
                <div>
                    <h3 class="font-semibold text-lg mb-4 mt-[1.5rem]">DEPED PRIVATE<br>LENDING INSTITUTIONS<br>ACCREDITATION SYSTEM</h3>
                    
                    <p class="text-sm">
                        Copyright © Department of Education {{ date('Y') }}.</br>
                        All rights reserved.
                    </p>
                </div>

                <!-- Third Column -->
                <div>
                    <h3 class="font-semibold text-lg mb-4 mt-[1.5rem]">GOVERNMENT LINKS</h3>
                    <ul class="columns-2 space-y-2 text-sm">
                        <li><a href="http://www.gov.ph/" class="hover:text-gray-300">GOV.PH</a></li>
                        <li><a href="http://www.gov.ph/data" class="hover:text-gray-300">Open Data Portal</a></li>
                        <li><a href="http://www.officialgazette.gov.ph/" class="hover:text-gray-300">Official Gazette</a></li>
                        <li><a href="http://president.gov.ph/" class="hover:text-gray-300">Office of the President</a></li>
                        <li><a href="http://ovp.gov.ph/" class="hover:text-gray-300">Office of the Vice President</a></li>
                        <li><a href="http://www.senate.gov.ph/" class="hover:text-gray-300">Senate of the Philippines</a></li>
                        <li><a href="http://www.congress.gov.ph/" class="hover:text-gray-300">House of Representatives</a></li>
                        <li><a href="http://sc.judiciary.gov.ph/" class="hover:text-gray-300">Supreme Court</a></li>
                        <li><a href="http://ca.judiciary.gov.ph/" class="hover:text-gray-300">Court of Appeals</a></li>
                        <li><a href="http://sb.judiciary.gov.ph/" class="hover:text-gray-300">Sandigbayan</a></li>
                    </ul>
                </div>
            </div>
        @endif
    </div>
</footer>