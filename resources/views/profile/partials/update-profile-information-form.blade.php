<section>
    <header class="mb-3">
        <h3 class="h5 fw-bold text-dark mb-1">
            <i class="bi bi-person-lines-fill me-1 text-primary"></i> {{ __('Profile Information') }}
        </h3>
        <p class="text-muted small mb-0">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div class="mb-3">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-1" :messages="$errors->get('name')" />
        </div>

        <div class="mb-3">
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" name="email" type="email" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-1" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="alert alert-warning mt-2 d-flex align-items-center justify-content-between p-2 small">
                    <div>
                        <i class="bi bi-exclamation-triangle-fill me-1"></i> {{ __('Your email address is unverified.') }}
                    </div>
                    <button form="send-verification" class="btn btn-sm btn-outline-dark">
                        {{ __('Re-send email') }}
                    </button>
                </div>

                @if (session('status') === 'verification-link-sent')
                    <div class="alert alert-success mt-2 p-2 small">
                        <i class="bi bi-check-circle me-1"></i> {{ __('A new verification link has been sent to your email address.') }}
                    </div>
                @endif
            @endif
        </div>

        <div class="d-flex align-items-center gap-3">
            <x-primary-button>
                <i class="bi bi-save me-1"></i> {{ __('Save Changes') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <span
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2500)"
                    class="badge bg-success-subtle text-success p-2"
                >
                    <i class="bi bi-check-lg me-1"></i> {{ __('Saved.') }}
                </span>
            @endif
        </div>
    </form>
</section>
