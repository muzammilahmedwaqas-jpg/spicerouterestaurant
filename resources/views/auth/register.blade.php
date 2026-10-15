<x-guest-layout>
    <div class="text-center mb-4">
        <h1 class="h4 fw-bold mb-1">{{ __('Create an Account') }}</h1>
        <p class="text-muted small">{{ __('Get started with Spice Route Restaurant') }}</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="mb-3">
            <x-input-label for="name" :value="__('Full Name')" />
            <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="John Doe" />
            <x-input-error :messages="$errors->get('name')" class="mt-1" />
        </div>

        <!-- Email Address -->
        <div class="mb-3">
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="name@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <!-- Password -->
        <div class="mb-3">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password"
                            type="password"
                            name="password"
                            required autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
        </div>

        <!-- Role -->
        <div class="mb-4">
            <x-input-label for="role" :value="__('Account Role')" />
            <select id="role" name="role" class="form-select border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="manager" {{ old('role') === 'manager' ? 'selected' : '' }}>Manager (Full Admin Access)</option>
                <option value="staff" {{ old('role') === 'staff' ? 'selected' : '' }}>Staff (Portal & Attendance)</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-1" />
        </div>

        <div class="d-grid mb-3">
            <x-primary-button class="py-2">
                {{ __('Register Account') }}
            </x-primary-button>
        </div>

        <div class="text-center text-muted small">
            {{ __('Already registered?') }}
            <a class="text-decoration-none fw-semibold" href="{{ route('login') }}">
                {{ __('Sign In') }}
            </a>
        </div>
    </form>
</x-guest-layout>
