<div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <button wire:click="openCreateModal" class="btn btn-primary">
            <i class="ti ti-plus me-1"></i> {{ __('button.add_user') }}
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
                        <th>Profile</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}</td>
                            <td>
                                @if($user->profile_photo_path)
                                    <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="{{ $user->name }}" class="rounded-circle" width="40" height="40" style="object-fit: cover;">
                                @else
                                    <span class="avatar rounded-circle" style="background-color: #206bc4; color: white;">{{ strtoupper(substr($user->name, 0, 2)) }}</span>
                                @endif
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><span class="badge bg-{{ $user->role === 'admin' ? 'danger-lt' : ($user->role === 'author' ? 'warning-lt' : 'info-lt') }}">{{ ucfirst($user->role) }}</span></td>
                            <td>
                                <label class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" wire:click="toggleStatus({{ $user->id }})" {{ $user->is_active ? 'checked' : '' }}>
                                    <span class="form-check-label">{{ $user->is_active ? 'Active' : 'Inactive' }}</span>
                                </label>
                            </td>
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
                            <td colspan="7" class="text-center text-muted">No users found.</td>
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
                                <label class="form-label">Profile Image</label>
                                <input type="file" class="form-control" wire:model="profile_image" accept="image/*">
                                @error('profile_image') <div class="text-danger">{{ $message }}</div> @enderror
                                
                                <div wire:loading wire:target="profile_image" class="mt-2">
                                    <div class="spinner-border spinner-border-sm text-primary" role="status">
                                        <span class="visually-hidden">Uploading...</span>
                                    </div>
                                    <span class="text-muted ms-2">Uploading image...</span>
                                </div>
                                
                                @if ($profile_image)
                                    <div class="mt-2">
                                        <img src="{{ $profile_image->temporaryUrl() }}" class="rounded" width="100" height="100" style="object-fit: cover;">
                                    </div>
                                @elseif ($editMode && $existingImage)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $existingImage) }}" class="rounded" width="100" height="100" style="object-fit: cover;">
                                    </div>
                                @endif
                            </div>

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
                                <label class="form-label">Role</label>
                                <select class="form-select" wire:model.defer="role">
                                    <option value="user">User</option>
                                    <option value="author">Author</option>
                                    <option value="admin">Admin</option>
                                </select>
                                @error('role') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">About</label>
                                <input class="form-control" wire:model.defer="about" placeholder="Brief bio or about information">
                                @error('about') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" wire:model.defer="description" rows="4" placeholder="Detailed description"></textarea>
                                @error('description') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" wire:model.defer="is_active" checked>
                                    <span class="form-check-label">Active Status</span>
                                </label>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" wire:model.defer="password" {{ $editMode ? '' : 'required' }}>
                                @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="d-flex justify-content-end mt-3">
                                <button type="submit" class="btn btn-primary me-2" wire:loading.attr="disabled" wire:target="saveUser, profile_image">
                                    <span wire:loading.remove wire:target="saveUser, profile_image">
                                        {{ $editMode ? __('button.update') : __('button.create') }}
                                    </span>
                                    <span wire:loading wire:target="saveUser, profile_image">
                                        <span class="spinner-border spinner-border-sm me-1" role="status"></span>
                                        Saving...
                                    </span>
                                </button>
                                <button type="button" class="btn btn-link" wire:click="$set('showModal', false)">{{ __('button.cancel') }}</button>
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
                            <button class="btn btn-danger me-2" wire:click="deleteUser">{{ __('button.delete') }}</button>
                            <button class="btn btn-secondary" wire:click="$set('showDeleteModal', false)">{{ __('button.cancel') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-backdrop fade show"></div>
    @endif
</div>
