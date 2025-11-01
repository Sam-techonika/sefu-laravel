<div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <button class="btn btn-primary" wire:click="openModal">
            <i class="ti ti-plus"></i> Add Service
        </button>
        <input type="text" class="form-control w-25" placeholder="Search..." wire:model.debounce.300ms="search">
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services as $index => $service)
                    <tr>
                        <td>{{ $services->firstItem() + $index }}</td>
                        <td>
                            @if($service->image)
                            <img src="{{ asset('storage/'.$service->image) }}"
                                class="rounded" width="60" height="60"
                                style="object-fit: cover;">
                            @else
                            <span class="text-muted">N/A</span>
                            @endif
                        </td>
                        <td>{{ $service->name }}</td>
                        <td class="text-center">
                            <label class="form-check form-switch m-0">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    wire:click="toggleStatus({{ $service->id }})"
                                    {{ $service->is_active ? 'checked' : '' }}>
                            </label>
                        </td>
                        <td>{{ $service->created_at->format('d M Y') }}</td>
                        <td class="text-end">
                            <a class="btn btn-sm btn-outline-primary" wire:navigate href="{{route('admin.service.languages', $service->id )}}">
                                <i class="ti ti-arrow-right"></i>
                            </a>
                            <button class="btn btn-sm btn-outline-primary" wire:click="edit({{ $service->id }})">
                                <i class="ti ti-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger" wire:click="delete({{ $service->id }})"
                                onclick="confirm('Are you sure?') || event.stopImmediatePropagation()">
                                <i class="ti ti-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            No services found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">{{ $services->links() }}</div>

    <livewire:admin.service.service-form />
</div>
