<div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="m-0">Registrations</h4>

        <input type="text" class="form-control w-25" placeholder="Search by name, email or phone"
               wire:model.debounce.300ms="search">
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
                        <tr>
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
                                    <span class="text-success" title="Processed">
                                        <i class="ti ti-check"></i>
                                    </span>
                                @else
                                    <button wire:click="toggleProcessed({{ $registration->id }})" class="btn btn-sm btn-outline-success" title="Mark as processed">
                                        <i class="ti ti-check"></i>
                                    </button>
                                @endif
                            </td>
                            <td class="text-end">
                                <!-- Future actions: view/delete -->
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

        <div class="card-footer d-flex justify-content-end">
            {{ $registrations->links() }}
        </div>
    </div>
</div>
