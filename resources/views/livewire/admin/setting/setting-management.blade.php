<div class="container py-4">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-primary text-white d-flex align-items-center justify-content-between">
            <h3 class="card-title mb-0">⚙️ Project Settings</h3>
            <button wire:click="save" type="button" class="btn btn-light btn-sm">
                <i class="ti ti-device-floppy me-1"></i> Save Changes
            </button>
        </div>

        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <i class="ti ti-check me-2"></i>
                    <div>{{ session('success') }}</div>
                </div>
            @endif

            <div class="row g-4">
                <div class="col-12">
                    <h4 class="border-bottom pb-2 mb-3 text-muted">
                        <i class="ti ti-info-circle me-2"></i> General Information
                    </h4>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Project Name</label>
                    <input type="text" class="form-control" wire:model="site_name" placeholder="Enter project name">
                </div>

                <div class="col-md-6">
                    <label class="form-label">CEO Name</label>
                    <input type="text" class="form-control" wire:model="ceo_name" placeholder="Enter CEO name">
                </div>

                <div class="col-12">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" wire:model="address" placeholder="Enter project address">
                </div>

                <!-- Contact Info -->
                <div class="col-12 mt-3">
                    <h4 class="border-bottom pb-2 mb-3 text-muted">
                        <i class="ti ti-phone me-2"></i> Contact Information
                    </h4>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Phone Number</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="ti ti-phone"></i></span>
                        <input type="text" class="form-control" wire:model="phone_number" placeholder="Enter phone number">
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="form-label">WhatsApp Number</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="ti ti-brand-whatsapp"></i></span>
                        <input type="text" class="form-control" wire:model="whatsapp_number" placeholder="Enter WhatsApp number">
                    </div>
                </div>

                <!-- Branding -->
                <div class="col-12 mt-3">
                    <h4 class="border-bottom pb-2 mb-3 text-muted">
                        <i class="ti ti-photo me-2"></i> Branding
                    </h4>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Project Logo</label>
                    <input type="file" class="form-control" wire:model="new_logo" accept="image/*">
                    <div class="mt-2 d-flex align-items-center">
                        @if ($new_logo)
                            <img src="{{ $new_logo->temporaryUrl() }}" alt="Logo Preview" class="rounded shadow-sm me-3" width="100">
                        @elseif ($logo)
                            <img src="{{ asset('storage/'.$logo) }}" alt="Current Logo" class="rounded shadow-sm me-3" width="100">
                        @else
                            <span class="text-muted">No logo uploaded yet</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Favicon</label>
                    <input type="file" class="form-control" wire:model="new_favicon" accept="image/*">
                    <div class="mt-2 d-flex align-items-center">
                        @if ($new_favicon)
                            <img src="{{ $new_favicon->temporaryUrl() }}" alt="Favicon Preview" class="rounded shadow-sm me-3" width="48">
                        @elseif ($favicon)
                            <img src="{{ asset('storage/'.$favicon) }}" alt="Current Favicon" class="rounded shadow-sm me-3" width="48">
                        @else
                            <span class="text-muted">No favicon uploaded yet</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer text-end">
            <button wire:click="save" type="button" class="btn btn-primary">
                <i class="ti ti-device-floppy me-1"></i> Save Settings
            </button>
        </div>
    </div>

    <style>
        .form-label {
            font-weight: 600;
        }
        .card {
            border-radius: 1rem;
        }
        .card-header {
            border-bottom: none;
        }
        .alert-success {
            border-radius: 0.75rem;
        }
    </style>
</div>
