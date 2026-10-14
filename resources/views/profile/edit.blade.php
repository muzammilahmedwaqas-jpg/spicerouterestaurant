<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0 fw-bold text-dark">
            <i class="bi bi-person-gear me-2 text-primary"></i>{{ __('Profile Settings') }}
        </h2>
    </x-slot>

    <div class="row g-4">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm border-0 mb-4 rounded-3">
                <div class="card-body p-4">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="card shadow-sm border-0 mb-4 rounded-3">
                <div class="card-body p-4">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="card shadow-sm border-danger border-1 mb-4 rounded-3">
                <div class="card-body p-4">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
