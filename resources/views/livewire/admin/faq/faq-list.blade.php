<div>
    {{-- Header --}}
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div class="d-flex gap-2 align-items-center">
            <button wire:click="create" class="btn btn-primary">Add FAQ</button>
        
        </div>

        <div class="d-flex gap-2 align-items-center">
            <input type="text" class="form-control" placeholder="Search FAQs..." wire:model.debounce.500ms="search">
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
                    @forelse($faqs as $faq)
                    <tr>
                        <td>{{ $faq->id }}</td>
                        <td>{{ $faq->name }}</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="activeSwitch{{ $faq->id }}"
                                    @if($faq->is_active) checked @endif
                                    wire:click="toggleActive({{ $faq->id }})"
                                    wire:loading.attr="disabled"
                                    wire:target="toggleActive({{ $faq->id }})">
                                <label class="form-check-label" for="activeSwitch{{ $faq->id }}">
                                    {{ $faq->is_active ? 'Active' : 'Inactive' }}
                                </label>
                            </div>
                        </td>
                        <td class="text-end">
                            <button wire:click="edit({{ $faq->id }})" class="btn btn-sm btn-outline-secondary">Edit</button>
                            <button wire:click="confirmDelete({{ $faq->id }})" class="btn btn-sm btn-outline-danger">Delete</button>
                            <button wire:click="$dispatch('openTranslation', { id: {{ $faq->id }} })" class="btn btn-sm btn-info">Translate</button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">No FAQs found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer d-flex justify-content-between">
            <div>Showing {{ $faqs->firstItem() ?? 0 }} to {{ $faqs->lastItem() ?? 0 }} of {{ $faqs->total() }} entries</div>
            {{ $faqs->links() }}
        </div>
    </div>

    {{-- Add/Edit Modal --}}
    @if ($showForm)
    <div class="modal fade show d-block" tabindex="-1" style="background-color: rgba(0,0,0,0.5)">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $faq_id ? 'Edit FAQ' : 'Add FAQ' }}</h5>
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
                    <p>Are you sure you want to delete this FAQ?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" wire:click="cancel">Cancel</button>
                    <button class="btn btn-danger" wire:click="deleteConfirmed">Delete</button>
                </div>
            </div>
        </div>
    </div>
    @endif

    <livewire:admin.faq.faq-translation />
</div>
