<x-guest-layout>
    <div class="text-center mb-4">
        <h1 class="h4 fw-bold mb-1">{{ __('Forgot Password') }}</h1>
        <p class="text-muted small">
            {{ __('Enter your email address and we will send you a password reset link.') }}
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-3" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus placeholder="name@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <div class="d-grid mb-3">
            <x-primary-button class="py-2">
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>

        <div class="text-center text-muted small">
            <a class="text-decoration-none" href="{{ route('login') }}">
                <i class="bi bi-arrow-left me-1"></i> {{ __('Back to login') }}
            </a>
        </div>
    </form>
</x-guest-layout>
