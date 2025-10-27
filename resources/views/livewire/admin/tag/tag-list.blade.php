<div>
  <div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <input type="text" wire:model.debounce.300ms="search" placeholder="Search tag..." class="form-control w-25">
        <button class="btn btn-primary" wire:click="openModal">
            <i class="ti ti-plus me-1"></i> {{ __('button.add_tag') }}
        </button>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-vcenter card-table table-hover mb-0">
                <thead class="table-primary">
                    <tr>
                        <th class="text-center">ID</th>
                        <th>Translations</th>
                        <th class="text-center" width="180">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tags as $tag)
                        <tr>
                            <td class="text-center fw-bold">{{ $tag->id }}</td>
                            <td>
                                @foreach ($tag->translations as $t)
                                    <span class="badge bg-primary-lt me-1">{{ strtoupper($t->locale) }}: {{ $t->name }}</span>
                                @endforeach
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-warning" wire:click="openModal({{ $tag->id }})">
                                    <i class="ti ti-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" wire:click="confirmDelete({{ $tag->id }})">
                                    <i class="ti ti-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="text-center text-muted py-3">No tags found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">{{ $tags->links() }}</div>

    {{-- Add/Edit Modal --}}
    @if($showModal)
    <div class="modal modal-blur fade show d-block" tabindex="-1" style="background: rgba(0,0,0,0.5)">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form wire:submit.prevent="saveTag">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $isEdit ? 'Edit Tag' : 'Add Tag' }}</h5>
                        <button type="button" class="btn-close" wire:click="closeModal"></button>
                    </div>
                    <div class="modal-body">
                        @foreach($availableLocales as $code => $label)
                            <div class="mb-3">
                                <label class="form-label">{{ $label }} ({{ strtoupper($code) }})</label>
                                <input type="text" class="form-control" wire:model.defer="names.{{ $code }}">
                                @error("names.{$code}") <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn me-auto" wire:click="closeModal">{{ __('button.cancel') }}</button>
                        <button type="submit" class="btn btn-primary">{{ $isEdit ? __('button.update') : __('button.save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif

    {{-- Delete Confirmation Modal --}}
    @if($showConfirmModal)
    <div class="modal modal-blur fade show d-block" tabindex="-1" style="background: rgba(0,0,0,0.5)">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center py-4">
                    <i class="ti ti-alert-circle text-warning" style="font-size: 2rem;"></i>
                    <h3 class="mt-2">Are you sure?</h3>
                    <p class="text-muted">This action cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-link link-secondary" wire:click="$set('showConfirmModal', false)">{{ __('button.cancel') }}</button>
                    <button class="btn btn-danger ms-auto" wire:click="deleteTag">{{ __('button.yes_delete') }}</button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
</div>
