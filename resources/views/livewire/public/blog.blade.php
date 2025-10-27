<div>
    <div class="page page-center bg-light">
        <div class="container container-tight py-5">
            <!-- Logo -->
            <div class="text-center mb-4">
                <a href="{{ url('/') }}" class="navbar-brand navbar-brand-autodark">
                    <img src="{{ asset('tabler/theme/img/logo.png') }}" height="48" alt="Logo">
                </a>
            </div>

            <!-- Card -->
            <div class="card shadow-lg border-0 rounded-3" style="border-top: 4px solid #ff1f1f;">
                <div class="card-body p-4">
                    <h2 class="card-title text-center mb-4" style="color:#ff1f1f;">
                        Login to your account
                    </h2>

                    @if ($errorMessage)
                        <div class="alert alert-danger text-center">
                            {{ $errorMessage }}
                        </div>
                    @endif

                    <form wire:submit.prevent="login" autocomplete="off" class="space-y-4">
                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email address</label>
                            <input type="email" wire:model.defer="email" class="form-control form-control-lg"
                                placeholder="you@example.com" required>
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Password
                                @if (Route::has('password.request'))
                                    <span class="form-label-description">
                                        <a href="{{ route('password.request') }}" style="color:#ff1f1f;">Forgot password?</a>
                                    </span>
                                @endif
                            </label>
                            <div class="input-group input-group-flat">
                                <input type="password" wire:model.defer="password" class="form-control form-control-lg"
                                    placeholder="Your password" required>
                            </div>
                            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="mb-3 d-flex align-items-center justify-content-between">
                            <label class="form-check mb-0">
                                <input type="checkbox" wire:model="remember" class="form-check-input" />
                                <span class="form-check-label">Remember me</span>
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-footer mt-3">
                            <button type="submit" class="btn w-100 btn-lg text-white fw-bold"
                                style="background-color:#ff1f1f;" wire:loading.attr="disabled">
                                <span wire:loading.remove>Sign in</span>
                                <span wire:loading>Signing in...</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
