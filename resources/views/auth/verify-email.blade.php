<x-guest-layout>
    <div class="text-center mb-4">
        <div class="display-6 text-primary mb-2"><i class="bi bi-envelope-check"></i></div>
        <h1 class="h4 fw-bold mb-1">{{ __('Verify Email Address') }}</h1>
        <p class="text-muted small">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
            <i class="bi bi-check-circle me-1"></i> {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex flex-column gap-2 mt-4">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <div class="d-grid">
                <x-primary-button class="py-2">
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="text-center mt-2">
            @csrf
            <button type="submit" class="btn btn-link text-muted text-decoration-none small">
                <i class="bi bi-box-arrow-right me-1"></i> {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
