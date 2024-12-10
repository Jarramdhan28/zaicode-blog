<x-guest-layout>
    <x-authentication-card>
        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession
        
        <div class="mb-4">
            <a wire:navigate href="{{ route('home') }}">
                <p class="font-jaro text-center text-xl">
                    Zai<span class="text-blue-600">Blog</span>
                </p>
            </a>
        </div>
        
        <div class="mb-3 text-center">
            <h2 class="text-3xl font-semibold">Login</h2>
            <p class="text-sm">Enter Your Name, Email and Password</p>
        </div>
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </div>

                    <div>
                        @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="w-full mt-4">
                <button class="bg-blue-600 hover:bg-blue-700 w-full rounded-lg text-white py-2 transition duration-150 ease-in-out" type="submit">
                    Login
                </button>
            </div>
        </form>

        <div class="text-center mt-6 mb-8">
            don't have an account yet? <a wire:navigate href="{{ route('register') }}" class="underline">Register</a>
        </div>
    </x-authentication-card>
</x-guest-layout>
