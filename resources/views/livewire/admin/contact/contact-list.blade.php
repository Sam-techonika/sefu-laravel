<div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="card-title">Contacts</h3>

                            <div class="ms-auto d-flex align-items-center">
                                <input wire:model.debounce.live.300ms="search" class="form-control form-control-sm me-2" placeholder="Search name, email, phone or message">

                                <select wire:model.live="perPage" class="form-select form-select-sm w-auto">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                </select>
                            </div>
                        </div>



                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Message</th>
                                        <th>Read</th>
                                        <th>Received</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($contacts as $c)
                                    <tr wire:key="contact-{{ $c->id }}" @if(!$c->is_read) class="table-warning" @endif>
                                        <td>{{ $c->name }}</td>
                                        <td>{{ $c->email ?? '—' }}</td>
                                        <td>{{ $c->phone ?? '—' }}</td>
                                        <td style="max-width:320px">{{
                                            Str::limit(strip_tags($c->message), 80)
                                        }}</td>
                                        <td>
                                            @if($c->is_read)
                                            <span class="badge bg-success-lt">Read</span>
                                            @else
                                            <span class="badge bg-warning-lt">New</span>
                                            @endif
                                        </td>
                                        <td>{{ $c->created_at->diffForHumans() }}</td>
                                        <td class="text-end">
                                            <button type="button" wire:click="show({{ $c->id }})" class="btn btn-sm btn-primary me-1">View</button>
                                            <button type="button" wire:click="toggleRead({{ $c->id }})" class="btn btn-sm btn-outline-secondary me-1">Toggle Read</button>
                                            <button type="button" wire:click="confirmDeletion({{ $c->id }})" class="btn btn-sm btn-danger" wire:loading.attr="disabled">Delete</button>
                                            <span wire:loading wire:target="confirmDeletion({{ $c->id }})" class="spinner-border spinner-border-sm ms-2" role="status" aria-hidden="true"></span>
                                        </td>
                                    </tr>
                                    @if($selectedContact && $selectedContact->id === $c->id)
                                    <tr>
                                        <td colspan="7">
                                            <div class="card card-body">
                                                <div class="d-flex justify-content-between align-items-start mb-2">
                                                    <h4 class="mb-0">Message from {{ $selectedContact->name }}</h4>
                                                    <div>
                                                        <button wire:click="clearSelected" class="btn btn-sm btn-outline-secondary">Close</button>
                                                    </div>
                                                </div>
                                                <p><strong>Email:</strong> {{ $selectedContact->email ?? '—' }}</p>
                                                <p><strong>Phone:</strong> {{ $selectedContact->phone ?? '—' }}</p>
                                                <hr>
                                                <div>{!! nl2br(e($selectedContact->message)) !!}</div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No contacts found.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <div>
                                Showing {{ $contacts->firstItem() ?: 0 }} to {{ $contacts->lastItem() ?: 0 }} of {{ $contacts->total() }} entries
                            </div>
                            <div>
                                {{ $contacts->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($showDeleteModal)
        <div class="modal modal-blur fade show d-block" tabindex="-1" style="background: rgba(0,0,0,0.5)">
            <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center py-4">
                        <i class="ti ti-alert-circle text-warning" style="font-size: 2rem;"></i>
                        <h3 class="mt-2">Are you sure?</h3>
                        <p class="text-muted">This action cannot be undone.</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-link link-secondary" wire:click="$set('showDeleteModal', false)">
                            {{ __('button.cancel') }}
                        </button>
                        <button class="btn btn-danger ms-auto" wire:click="deleteConfirmed">
                            {{ __('button.yes_delete') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>