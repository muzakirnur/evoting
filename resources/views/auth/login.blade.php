<x-authentication-layout>
    <div class="flex flex-wrap justify-center pb-20">
        <div class="logo">
            <img src="{{ asset('images/logokpu.png') }}" alt="Pemilihan Kepala Desa" class="w-20 h-20">
        </div>
        <div class="text p-2">
            <h2 class="font-semibold text-2xl text-white">Aplikasi E-Voting</h2>
            <h2 class="font-semibold text-2xl text-white">Pemilihan Kepala Desa</h2>
        </div>
    </div>
    {{-- <h1 class="text-3xl text-slate-800 dark:text-slate-100 font-bold mb-6">{{ __('Welcome back!') }} ✨</h1> --}}
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif   
    <!-- Form -->
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="space-y-4">
            <div>
                <x-jet-label for="username" value="{{ __('NIK atau Username') }}"  class="text-white"/>
                <x-jet-input id="username" type="username" name="username" :value="old('username')" required autofocus />                
            </div>
            <div>
                <x-jet-label for="password" value="{{ __('Password') }}" class="text-white"/>
                <x-jet-input id="password" type="password" name="password" required autocomplete="current-password" />                
            </div>
        </div>
        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <div class="mr-1">
                    <a class="text-sm underline hover:no-underline text-white" href="{{ route('password.request') }}">
                        {{ __('Forgot Password?') }}
                    </a>
                </div>
            @endif             
            <button type="submit" class="btn bg-white hover:bg-slate-200 text-slate-800 whitespace-nowrap">Sign In</button>           
        </div>
    </form>
    <x-jet-validation-errors class="mt-4" />   
    <!-- Footer -->
    {{-- <div class="pt-5 mt-6 border-t border-slate-200"> --}}
        <div class="text-sm">
            {{ __('Belum Punya Akun ?') }} <a class="font-medium text-indigo-500 hover:text-indigo-600" href="{{ route('register') }}">{{ __('Daftar') }}</a>
        </div>
        <!-- Warning -->
        {{-- <div class="mt-5">
            <div class="bg-amber-100 text-amber-600 px-3 py-2 rounded">
                <svg class="inline w-3 h-3 shrink-0 fill-current" viewBox="0 0 12 12">
                    <path d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z" />
                </svg>
                <span class="text-sm">
                    To support you during the pandemic super pro features are free until March 31st.
                </span>
            </div>
        </div> --}}
    </div>
</x-authentication-layout>
