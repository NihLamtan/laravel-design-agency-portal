<x-guest-layout>
    <x-slot name="title">
        Sign In
    </x-slot>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="/images/logo.png" alt="">`
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label value="{{ __('Email address') }}" />
                <x-jet-input class="block mt-1 w-full" type="email" name="email" placeholder="Email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <div class="d-flex justify-between">
                    <x-jet-label value="{{ __('Password') }}"  />
                    <div class="flex items-center justify-end mb-2">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>
                </div>
                
                <x-jet-input class="block mt-1 w-full" type="password" name="password" placeholder="Password" required autocomplete="current-password" />
            </div>
<!-- 
            <div class="block mt-4">
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div> -->

            <div class="flex items-center justify-end mt-5">
                <x-jet-button class="w-100 p-3 text-center">
                    {{ __('Login') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
