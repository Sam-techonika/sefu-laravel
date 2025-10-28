<div>
    {{-- Header --}}
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div class="d-flex gap-2 align-items-center">
            <button wire:click="create" class="btn btn-primary">Add Testimonial</button>
            @if (session()->has('message'))
                <div class="alert alert-success mb-0">{{ session('message') }}</div>
            @endif
        </div>

        <div class="d-flex gap-2 align-items-center">
            <input type="text" class="form-control" placeholder="Search Testimonials..." wire:model.debounce.500ms="search">
            <select class="form-select" wire:model="perPage">
                <option value="5">5 / page</option>
                <option value="10">10 / page</option>
                <option value="25">25 / page</option>
                <option value="50">50 / page</option>
            </select>
        </div>
    </div>

    {{-- Table --}}
    <div class="card">
        <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Active</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonials as $t)
                    <tr>
                        <td>{{ $t->id }}</td>
                        <td>{{ $t->name }}</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="activeSwitch{{ $t->id }}"
                                    @if($t->is_active) checked @endif
                                    wire:click="toggleActive({{ $t->id }})"
                                    wire:loading.attr="disabled"
                                    wire:target="toggleActive({{ $t->id }})">
                                <label class="form-check-label" for="activeSwitch{{ $t->id }}">
                                    {{ $t->is_active ? 'Active' : 'Inactive' }}
                                </label>
                            </div>
                        </td>
                        <td class="text-end">
                            <button wire:click="edit({{ $t->id }})" class="btn btn-sm btn-outline-secondary">Edit</button>
                            <button wire:click="confirmDelete({{ $t->id }})" class="btn btn-sm btn-outline-danger">Delete</button>
                            <button wire:click="$dispatch('openTranslation', { id: {{ $t->id }} })" class="btn btn-sm btn-info">Translate</button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">No Testimonials found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer d-flex justify-content-between">
            <div>Showing {{ $testimonials->firstItem() ?? 0 }} to {{ $testimonials->lastItem() ?? 0 }} of {{ $testimonials->total() }} entries</div>
            {{ $testimonials->links() }}
        </div>
    </div>

    {{-- Add/Edit Modal --}}
    @if ($showForm)
    <div class="modal fade show d-block" tabindex="-1" style="background-color: rgba(0,0,0,0.5)">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $testimonial_id ? 'Edit Testimonial' : 'Add Testimonial' }}</h5>
                    <button type="button" class="btn-close" wire:click="cancel"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" wire:model.defer="name">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mt-2">
                        <label>Active</label>
                        <select class="form-control" wire:model.defer="is_active">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" id="isHome" wire:model.defer="is_homepage">
                        <label class="form-check-label" for="isHome">Show on homepage</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button wire:click="save" class="btn btn-success">Save</button>
                    <button wire:click="saveWithStayOpen" class="btn btn-primary">Save & Add Another</button>
                    <button wire:click="cancel" class="btn btn-secondary">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    @endif

    {{-- Delete Confirmation Modal --}}
    @if ($showDeleteModal)
    <div class="modal fade show d-block" tabindex="-1" style="background-color: rgba(0,0,0,0.5)">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="btn-close" wire:click="cancel"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="text-danger mb-3">
                        <i class="ti ti-alert-circle" style="font-size: 32px;"></i>
                    </div>
                    <p>Are you sure you want to delete this Testimonial?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" wire:click="cancel">Cancel</button>
                    <button class="btn btn-danger" wire:click="deleteConfirmed">Delete</button>
                </div>
            </div>
        </div>
    </div>
    @endif

    <livewire:admin.testimonial.testimonial-translation />
</div>
