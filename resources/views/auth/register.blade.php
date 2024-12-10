<x-guest-layout>
    <x-authentication-card>
        <x-validation-errors class="mb-4" />

        <div class="mb-4">
            <a wire:navigate href="{{ route('home') }}">
                <p class="font-jaro text-center text-xl">
                    Zai<span class="text-blue-600">Blog</span>
                </p>
            </a>
        </div>

        <div class="mb-3 text-center">
            <h2 class="text-3xl font-semibold">Register</h2>
            <p class="text-sm">Enter Your Email and Password</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif
            
            <div class="w-full mt-4">
                <button class="bg-blue-600 hover:bg-blue-700 w-full rounded-lg text-white py-2 transition duration-150 ease-in-out" type="submit">
                    Register
                </button>
            </div>

        </form>

        <div class="text-center mt-6 mb-8">
            already have an account? <a wire:navigate href="{{ route('login') }}" class="underline">Login</a>
        </div>

    </x-authentication-card>
</x-guest-layout>
