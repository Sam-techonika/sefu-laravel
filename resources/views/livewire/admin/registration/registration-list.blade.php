<div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h4 class="m-0">Registrations</h4>
            <div class="small text-muted">Manage user registrations and plans</div>
        </div>

        <div class="d-flex gap-2">
            <input type="text" class="form-control" placeholder="Search name, email or phone" wire:model.debounce.live.300ms="search">

            <select wire:model.live="perPage" class="form-select w-auto">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
            </select>
        </div>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Plan</th>
                        <th class="text-center">Processed</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($registrations as $registration)
                        <tr wire:key="registration-{{ $registration->id }}">
                            <td>{{ $loop->iteration + ($registrations->currentPage() - 1) * $registrations->perPage() }}</td>
                            <td>{{ $registration->name }}</td>
                            <td>{{ $registration->email ?? '-' }}</td>
                            <td>{{ $registration->phone }}</td>
                            <td>
                                @if($registration->registration)
                                    <div class="small text-muted">{{ $registration->registration->name }}</div>
                                @endif
                                <div>{{ $registration->plan->name ?? $registration->plan_name ?? '-' }}</div>
                            </td>
                            <td class="text-center">
                                @if($registration->is_processed)
                                    <span class="badge bg-success-lt" title="Processed">Processed</span>
                                @else
                                    <button wire:click="toggleProcessed({{ $registration->id }})" class="badge bg-warning-lt" title="Mark as processed">
                                        Mark
                                    </button>
                                @endif
                            </td>
                            <td class="text-end">
                                <!-- <button type="button" wire:click="show({{ $registration->id }})" class="btn btn-sm btn-primary me-1">View</button> -->
                                <button type="button" wire:click="confirmDeletion({{ $registration->id }})" class="btn btn-sm btn-danger" wire:loading.attr="disabled">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">No registrations found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer d-flex justify-content-between align-items-center">
            <div class="small text-muted">Showing {{ $registrations->firstItem() ?: 0 }} to {{ $registrations->lastItem() ?: 0 }} of {{ $registrations->total() }}</div>
            <div>
                {{ $registrations->links() }}
            </div>
        </div>
    </div>
</div>
    <!-- Registration view modal (Livewire controlled) -->
    @if($showRegistrationModal)
        <div class="modal modal-blur fade d-block" tabindex="-1" role="dialog" aria-hidden="true" style="display:block; background: rgba(0,0,0,0.35);">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Registration details</h5>
                        <button type="button" class="btn-close" wire:click="closeRegistrationModal"></button>
                    </div>
                    <div class="modal-body">
                        @if($selectedRegistration)
                            <div class="row">
                                <div class="col-md-6">
                                    <dl class="row">
                                        <dt class="col-4">Name</dt>
                                        <dd class="col-8">{{ $selectedRegistration->name }}</dd>

                                        <dt class="col-4">Email</dt>
                                        <dd class="col-8">{{ $selectedRegistration->email ?? '-' }}</dd>

                                        <dt class="col-4">Phone</dt>
                                        <dd class="col-8">{{ $selectedRegistration->phone }}</dd>
                                    </dl>
                                </div>
                                <div class="col-md-6">
                                    <dl class="row">
                                        <dt class="col-4">Plan</dt>
                                        <dd class="col-8">{{ $selectedRegistration->plan->name ?? $selectedRegistration->plan_name ?? '-' }}</dd>

                                        <dt class="col-4">Registration</dt>
                                        <dd class="col-8">{{ $selectedRegistration->registration->name ?? '-' }}</dd>

                                        <dt class="col-4">Received</dt>
                                        <dd class="col-8">{{ $selectedRegistration->created_at->toDayDateTimeString() }}</dd>
                                    </dl>
                                </div>
                            </div>
                            <hr>
                            <h6>Notes / Message</h6>
                            <div>{!! nl2br(e($selectedRegistration->notes ?? $selectedRegistration->message ?? '-')) !!}</div>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link link-secondary" wire:click="closeRegistrationModal">Close</button>
                        <button type="button" class="btn btn-danger" wire:click="confirmDeletion({{ $selectedRegistration->id ?? 'null' }})">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Delete confirmation modal (Livewire controlled) -->
    @if($showDeleteModal)
        <div class="modal modal-blur fade d-block" tabindex="-1" role="dialog" aria-hidden="true" style="display:block; background: rgba(0,0,0,0.35);">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="modal-title">Are you sure?</div>
                        <div class="text-muted">Do you really want to delete this registration? This action cannot be undone.</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link link-secondary" wire:click="closeRegistrationModal">Cancel</button>
                        <button type="button" class="btn btn-danger" wire:click="deleteConfirmed" wire:loading.attr="disabled">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
