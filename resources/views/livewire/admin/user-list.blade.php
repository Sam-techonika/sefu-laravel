<div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <button wire:click="openCreateModal" class="btn btn-primary">
            <i class="ti ti-plus me-1"></i> Add User
        </button>

        <input type="text" class="form-control w-25" placeholder="Search by Name or Email"
               wire:model.debounce.300ms="search">
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-end">
                                <button wire:click="openEditModal({{ $user->id }})" class="btn btn-sm btn-warning me-1">
                                    <i class="ti ti-pencil"></i>
                                </button>
                                <button wire:click="confirmDelete({{ $user->id }})" class="btn btn-sm btn-danger">
                                    <i class="ti ti-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer d-flex justify-content-end">
            {{ $users->links() }}
        </div>
    </div>

    <!-- Add/Edit User Modal -->
    @if($showModal)
        <div class="modal modal-blur fade show d-block" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $editMode ? 'Edit User' : 'Add User' }}</h5>
                        <button type="button" class="btn-close" wire:click="$set('showModal', false)"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="saveUser">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" wire:model.defer="name" required>
                                @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" wire:model.defer="email" required>
                                @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" wire:model.defer="password" {{ $editMode ? '' : 'required' }}>
                                @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="d-flex justify-content-end mt-3">
                                <button type="submit" class="btn btn-primary me-2">
                                    {{ $editMode ? 'Update' : 'Create' }}
                                </button>
                                <button type="button" class="btn btn-link" wire:click="$set('showModal', false)">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-backdrop fade show"></div>
    @endif

    <!-- Delete Confirmation Modal -->
    @if($showDeleteModal)
        <div class="modal modal-blur fade show d-block" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center py-4">
                        <h3>Are you sure?</h3>
                        <p>This user will be deleted permanently!</p>
                        <div class="d-flex justify-content-center mt-3">
                            <button class="btn btn-danger me-2" wire:click="deleteUser">Delete</button>
                            <button class="btn btn-secondary" wire:click="$set('showDeleteModal', false)">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-backdrop fade show"></div>
    @endif
</div>
