<div class="container-xl py-4">
    <!-- Header -->
    <div class="page-header d-print-none mb-4">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    <i class="ti ti-settings me-2"></i> Settings
                </h2>
                <div class="text-muted mt-1">Manage your application settings and branding</div>
            </div>
            <div class="col-auto ms-auto">
                <button wire:click="save" type="button" class="btn btn-primary">
                    <i class="ti ti-device-floppy me-1"></i> Save All Changes
                </button>
            </div>
        </div>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <div class="d-flex">
                <div>
                    <i class="ti ti-check icon alert-icon"></i>
                </div>
                <div>
                    <h4 class="alert-title">Success!</h4>
                    <div class="text-muted">{{ session('success') }}</div>
                </div>
            </div>
        </div>
    @endif

    <div class="row row-cards">
        <!-- General Information -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="ti ti-info-circle me-2"></i> General Information</h3>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label required">Site Name</label>
                            <input type="text" class="form-control" wire:model="site_name" placeholder="Enter site name">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">CEO Name</label>
                            <input type="text" class="form-control" wire:model="ceo_name" placeholder="Enter CEO name">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email Address</label>
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="ti ti-mail"></i>
                                </span>
                                <input type="email" class="form-control" wire:model="email" placeholder="contact@example.com">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" wire:model="address" placeholder="Enter business address">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Site Description</label>
                            <textarea class="form-control" wire:model="site_description" rows="2" placeholder="Brief description for SEO (recommended 150-160 characters)"></textarea>
                            <small class="form-hint">This appears in search engine results</small>
                        </div>
                        <div class="col-12">
                            <label class="form-label">About Text</label>
                            <textarea class="form-control" wire:model="about_text" rows="3" placeholder="Short description about your company"></textarea>
                            <small class="form-hint">Displayed in mobile menu and other locations</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Information -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="ti ti-phone me-2"></i> Contact Information</h3>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Phone Number</label>
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="ti ti-phone"></i>
                                </span>
                                <input type="text" class="form-control" wire:model="phone_number" placeholder="+1 (555) 000-0000">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">WhatsApp Number</label>
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="ti ti-brand-whatsapp"></i>
                                </span>
                                <input type="text" class="form-control" wire:model="whatsapp_number" placeholder="+1234567890">
                            </div>
                            <small class="form-hint">Include country code (e.g., +1234567890). Enables floating chat button on website.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Branding & Media -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="ti ti-photo me-2"></i> Branding & Media</h3>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <!-- Logo Upload -->
                        <div class="col-lg-6">
                            <label class="form-label">Site Logo</label>
                            <div class="mb-3">
                                <input type="file" class="form-control" wire:model="new_logo" accept="image/*" id="logo-upload">
                                @error('new_logo') 
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="small text-muted mb-3">
                                <i class="ti ti-info-circle me-1"></i>
                                Formats: JPEG, PNG, SVG, WebP, AVIF, BMP | Max: 2MB
                            </div>
                            
                            @if ($new_logo || $logo)
                                <div class="card card-sm border">
                                    <div class="card-body text-center">
                                        <div class="mb-2 text-muted small">Preview</div>
                                        @if ($new_logo)
                                            <img src="{{ $new_logo->temporaryUrl() }}" alt="Logo Preview" class="rounded" style="max-height: 80px; max-width: 200px; object-fit: contain;">
                                        @else
                                            <img src="{{ asset('storage/'.$logo) }}" alt="Current Logo" class="rounded" style="max-height: 80px; max-width: 200px; object-fit: contain;">
                                        @endif
                                    </div>
                                </div>
                            @else
                                <div class="card card-sm border border-dashed">
                                    <div class="card-body text-center text-muted py-4">
                                        <i class="ti ti-photo-x icon mb-2" style="font-size: 2rem;"></i>
                                        <div>No logo uploaded</div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Favicon Upload -->
                        <div class="col-lg-6">
                            <label class="form-label">Favicon</label>
                            <div class="mb-3">
                                <input type="file" class="form-control" wire:model="new_favicon" accept="image/*,.ico" id="favicon-upload">
                                @error('new_favicon')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="small text-muted mb-3">
                                <i class="ti ti-info-circle me-1"></i>
                                Formats: ICO, PNG, SVG | Max: 512KB | Recommended: 32x32px
                            </div>
                            
                            @if ($new_favicon || $favicon)
                                <div class="card card-sm border">
                                    <div class="card-body text-center">
                                        <div class="mb-2 text-muted small">Preview</div>
                                        @if ($new_favicon)
                                            <img src="{{ $new_favicon->temporaryUrl() }}" alt="Favicon Preview" class="rounded" style="width: 48px; height: 48px; object-fit: contain;">
                                        @else
                                            <img src="{{ asset('storage/'.$favicon) }}" alt="Current Favicon" class="rounded" style="width: 48px; height: 48px; object-fit: contain;">
                                        @endif
                                    </div>
                                </div>
                            @else
                                <div class="card card-sm border border-dashed">
                                    <div class="card-body text-center text-muted py-4">
                                        <i class="ti ti-photo-x icon mb-2" style="font-size: 2rem;"></i>
                                        <div>No favicon uploaded</div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Settings Preview -->
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-light">
                    <h3 class="card-title"><i class="ti ti-eye me-2"></i> Current Settings</h3>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="datagrid">
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Site Name</div>
                                    <div class="datagrid-content">{{ $site_name ?: '—' }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Email</div>
                                    <div class="datagrid-content">{{ $email ?: '—' }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Phone</div>
                                    <div class="datagrid-content">{{ $phone_number ?: '—' }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="datagrid">
                                <div class="datagrid-item">
                                    <div class="datagrid-title">WhatsApp</div>
                                    <div class="datagrid-content">
                                        {{ $whatsapp_number ?: '—' }}
                                        @if($whatsapp_number)
                                            <span class="badge bg-success-lt ms-2">Active</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Address</div>
                                    <div class="datagrid-content">{{ $address ?: '—' }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">CEO Name</div>
                                    <div class="datagrid-content">{{ $ceo_name ?: '—' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="alert alert-info mt-4 mb-0">
                        <div class="d-flex">
                            <div>
                                <i class="ti ti-info-circle icon alert-icon"></i>
                            </div>
                            <div>
                                <h4 class="alert-title">Quick Tips</h4>
                                <ul class="mb-0 ps-3">
                                    <li>Logo appears in header, footer, and admin panel</li>
                                    <li>WhatsApp number enables floating chat button on all public pages</li>
                                    <li>All changes are reflected instantly across the entire site</li>
                                    <li>SEO description should be 150-160 characters for best results</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
