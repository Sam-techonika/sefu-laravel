<div class="page page-center" style="background-color:#f8f9fa; min-height:100vh; display:flex; align-items:center; justify-content:center;">
    <div class="container-tight" style="width:100%; max-width:420px;">

        <!-- Logo -->
        <div class="text-center mb-4">
            <a href="{{ url('/') }}" class="navbar-brand navbar-brand-autodark">
                <img src="{{ asset('tabler/theme/img/logo.png') }}" height="50" alt="Logo">
            </a>
        </div>

        <!-- Card -->
        <div class="card shadow-lg border-0" style="border-top:4px solid #ff1f1f; border-radius:12px; transition:all 0.3s ease;">
            <div class="card-body p-4">
                <h2 class="card-title text-center mb-4" style="color:#ff1f1f; font-weight:700;">
                    Login to your account
                </h2>

                @if ($errorMessage)
                    <div class="alert alert-danger text-center" style="border-radius:6px; font-size:14px;">
                        {{ $errorMessage }}
                    </div>
                @endif

                <form wire:submit.prevent="login" autocomplete="off">
                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label" style="font-weight:600;">Email address</label>
                        <input type="email" wire:model.defer="email" class="form-control" placeholder="you@example.com" required
                               style="border-radius:8px; padding:10px 12px; border:1px solid #ddd;">
                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label class="form-label" style="font-weight:600;">
                            Password
                            @if (Route::has('password.request'))
                                <span class="form-label-description">
                                    <a href="{{ route('password.request') }}" style="color:#ff1f1f; text-decoration:none;">Forgot?</a>
                                </span>
                            @endif
                        </label>
                        <input type="password" wire:model.defer="password" class="form-control" placeholder="Your password" required
                               style="border-radius:8px; padding:10px 12px; border:1px solid #ddd;">
                        @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="mb-3">
                        <label class="form-check" style="display:flex; align-items:center; gap:6px;">
                            <input type="checkbox" wire:model="remember" class="form-check-input" style="cursor:pointer;">
                            <span class="form-check-label" style="font-size:14px;">Remember me</span>
                        </label>
                    </div>

                    <!-- Submit -->
                    <div class="form-footer mt-3">
                        <button type="submit" class="btn w-100 fw-bold text-white" wire:loading.attr="disabled"
                                style="background-color:#ff1f1f; border:none; border-radius:8px; padding:10px; font-weight:600; transition:all 0.3s ease;">
                            <span wire:loading.remove>Sign in</span>
                            <span wire:loading>Signing in...</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
