<x-guest-layout>
    <div class="text-center mb-4">
        <div class="display-6 text-warning mb-2"><i class="bi bi-shield-lock"></i></div>
        <h1 class="h4 fw-bold mb-1">{{ __('Confirm Password') }}</h1>
        <p class="text-muted small">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div class="mb-3">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password"
                            type="password"
                            name="password"
                            required autocomplete="current-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <div class="d-grid">
            <x-primary-button class="py-2">
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
