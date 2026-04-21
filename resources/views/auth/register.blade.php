<x-app-layout>
    <form method="POST" action="{{ route('register') }}"
class="w-full sm:max-w-md mx-auto mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"
    >

        <h2 class="text-2xl font-semibold bg-zinc-700 text-zinc-200 px-6 py-4 -mx-6 -mt-4 mb-6">
            {{ __('Join Us') }}
        </h2>

        @csrf


{{--            name field renamed to given name, family name added--}}
        <div>
            <x-input-label for="given_name" :value="__('Given Name')" />
            <x-text-input id="given_name" class="block mt-1 w-full" type="text" name="given_name" :value="old('given_name')" required autofocus autocomplete="given_name" />
            <x-input-error :messages="$errors->get('given_name')" class="mt-2" />
        </div>

        <div>
           <x-input-label for="family_name" :value="__('Family Name')" />
        <x-text-input id="family_name" class="block mt-1 w-full" type="text" name="family_name" :value="old('family_name')" autofocus autocomplete="family_name" />
           <x-input-error :messages="$errors->get('family_name')" class="mt-2" />
       </div>




        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-zinc-600 hover:text-zinc-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Join Us') }}
            </x-primary-button>
        </div>
    </form>
</x-app-layout>
