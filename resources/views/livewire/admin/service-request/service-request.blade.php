<div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Service Requests</h3>
                            
                            <div class="ms-auto d-flex align-items-center gap-2">
                                <input wire:model.live.debounce.300ms="search" 
                                       class="form-control form-control-sm" 
                                       style="width: 200px;"
                                       placeholder="Search...">

                                <select wire:model.live="statusFilter" class="form-select form-select-sm" style="width: 140px;">
                                    <option value="">All Status</option>
                                    <option value="pending">Pending</option>
                                    <option value="processing">Processing</option>
                                    <option value="completed">Completed</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>

                                <select wire:model.live="perPage" class="form-select form-select-sm" style="width: 80px;">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Service</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Submitted</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($requests as $request)
                                    <tr wire:key="request-{{ $request->id }}">
                                        <td>
                                            <span class="text-muted">#{{ $request->id }}</span>
                                        </td>
                                        <td>
                                            <div class="text-truncate" style="max-width: 280px;">
                                                {{ $request->service }}
                                            </div>
                                        </td>
                                        <td>
                                            <a href="tel:{{ $request->phone }}" class="text-reset">
                                                {{ $request->phone }}
                                            </a>
                                        </td>
                                        <td>
                                            @if($request->email)
                                                <a href="mailto:{{ $request->email }}" class="text-reset">
                                                    {{ $request->email }}
                                                </a>
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($request->status === 'pending')
                                                <span class="badge bg-warning-lt">Pending</span>
                                            @elseif($request->status === 'processing')
                                                <span class="badge bg-info-lt">Processing</span>
                                            @elseif($request->status === 'completed')
                                                <span class="badge bg-success-lt">Completed</span>
                                            @else
                                                <span class="badge bg-secondary-lt">{{ ucfirst($request->status) }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="text-muted" title="{{ $request->created_at->format('M d, Y h:i A') }}">
                                                {{ $request->created_at->diffForHumans() }}
                                            </span>
                                        </td>
                                        <td class="text-end">
                                            <button type="button" 
                                                    wire:click="show({{ $request->id }})" 
                                                    class="btn btn-sm btn-icon btn-primary"
                                                    title="View Details">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                                                </svg>
                                            </button>
                                            
                                            <div class="btn-group">
                                                <button type="button" 
                                                        class="btn btn-sm btn-icon btn-outline-secondary dropdown-toggle" 
                                                        data-bs-toggle="dropdown" 
                                                        aria-expanded="false"
                                                        title="Change Status">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M9 11l3 3l8 -8"></path>
                                                        <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9"></path>
                                                    </svg>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a class="dropdown-item" href="#" wire:click.prevent="updateStatus({{ $request->id }}, 'pending')">
                                                            <span class="badge bg-warning-lt me-2">●</span> Pending
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#" wire:click.prevent="updateStatus({{ $request->id }}, 'processing')">
                                                            <span class="badge bg-info-lt me-2">●</span> Processing
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#" wire:click.prevent="updateStatus({{ $request->id }}, 'completed')">
                                                            <span class="badge bg-success-lt me-2">●</span> Completed
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            
                                            <button type="button" 
                                                    wire:click="confirmDeletion({{ $request->id }})" 
                                                    class="btn btn-sm btn-icon btn-danger"
                                                    wire:loading.attr="disabled"
                                                    title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M4 7l16 0"></path>
                                                    <path d="M10 11l0 6"></path>
                                                    <path d="M14 11l0 6"></path>
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                </svg>
                                            </button>
                                            
                                            <span wire:loading wire:target="confirmDeletion({{ $request->id }})" class="spinner-border spinner-border-sm ms-1" role="status"></span>
                                        </td>
                                    </tr>
                                    
                                    @if($selectedRequest && $selectedRequest->id === $request->id)
                                    <tr>
                                        <td colspan="7" class="p-0">
                                            <div class="card m-3 shadow-sm">
                                                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                                    <h4 class="mb-0">Service Request Details #{{ $selectedRequest->id }}</h4>
                                                    <button wire:click="clearSelected" class="btn btn-sm btn-ghost-secondary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M18 6l-12 12"></path>
                                                            <path d="M6 6l12 12"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label text-muted small">Service Type</label>
                                                                <div class="fw-bold">{{ $selectedRequest->service }}</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label text-muted small">Status</label>
                                                                <div>
                                                                    @if($selectedRequest->status === 'pending')
                                                                        <span class="badge bg-warning">Pending</span>
                                                                    @elseif($selectedRequest->status === 'processing')
                                                                        <span class="badge bg-info">Processing</span>
                                                                    @elseif($selectedRequest->status === 'completed')
                                                                        <span class="badge bg-success">Completed</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label text-muted small">Phone Number</label>
                                                                <div>
                                                                    <a href="tel:{{ $selectedRequest->phone }}" class="text-decoration-none">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone me-1" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                            <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2"></path>
                                                                        </svg>
                                                                        {{ $selectedRequest->phone }}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label text-muted small">Email Address</label>
                                                                <div>
                                                                    @if($selectedRequest->email)
                                                                        <a href="mailto:{{ $selectedRequest->email }}" class="text-decoration-none">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail me-1" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                                <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z"></path>
                                                                                <path d="M3 7l9 6l9 -6"></path>
                                                                            </svg>
                                                                            {{ $selectedRequest->email }}
                                                                        </a>
                                                                    @else
                                                                        <span class="text-muted">Not provided</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label text-muted small">Submitted Date</label>
                                                                <div>{{ $selectedRequest->created_at->format('F d, Y h:i A') }}</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label text-muted small">Last Updated</label>
                                                                <div>{{ $selectedRequest->updated_at->format('F d, Y h:i A') }}</div>
                                                            </div>
                                                        </div>
                                                        @if($selectedRequest->message)
                                                        <div class="col-12">
                                                            <div class="mb-0">
                                                                <label class="form-label text-muted small">Additional Message</label>
                                                                <div class="border rounded p-3 bg-light">
                                                                    {!! nl2br(e($selectedRequest->message)) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-5">
                                            <div class="empty">
                                                <div class="empty-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-search" width="48" height="48" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                        <path d="M12 21h-5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v4.5"></path>
                                                        <path d="M16.5 17.5m-2.5 0a2.5 2.5 0 1 0 5 0a2.5 2.5 0 1 0 -5 0"></path>
                                                        <path d="M18.5 19.5l2.5 2.5"></path>
                                                    </svg>
                                                </div>
                                                <p class="empty-title">No service requests found</p>
                                                <p class="empty-subtitle text-muted">
                                                    Try adjusting your search or filter to find what you're looking for.
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        @if($requests->hasPages())
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <div class="text-muted">
                                Showing <strong>{{ $requests->firstItem() ?: 0 }}</strong> to <strong>{{ $requests->lastItem() ?: 0 }}</strong> of <strong>{{ $requests->total() }}</strong> entries
                            </div>
                            <div>
                                {{ $requests->links() }}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Delete Confirmation Modal --}}
    @if($showDeleteModal)
    <div class="modal modal-blur fade show" style="display: block;" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close" wire:click="closeDeleteModal" aria-label="Close"></button>
                <div class="modal-status bg-danger"></div>
                <div class="modal-body text-center py-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 9v4"></path>
                        <path d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z"></path>
                        <path d="M12 16h.01"></path>
                    </svg>
                    <h3>Are you sure?</h3>
                    <div class="text-muted">Do you really want to delete this service request? This action cannot be undone.</div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn w-100" wire:click="closeDeleteModal">
                                    Cancel
                                </button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-danger w-100" wire:click="deleteConfirmed" wire:loading.attr="disabled">
                                    <span wire:loading.remove wire:target="deleteConfirmed">Delete</span>
                                    <span wire:loading wire:target="deleteConfirmed">
                                        <span class="spinner-border spinner-border-sm me-2"></span>
                                        Deleting...
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-backdrop fade show"></div>
    @endif
</div>
