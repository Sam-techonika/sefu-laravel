<div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <button class="btn btn-primary" wire:click="openModal">
            <i class="ti ti-plus"></i> Add Case Study
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
                        <th>Client Name</th>
                        <th>Project Name</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($caseStudies as $index => $caseStudy)
                    <tr>
                        <td>{{ $caseStudies->firstItem() + $index }}</td>
                        <td>
                            @if($caseStudy->image)
                            <img src="{{ asset('storage/'.$caseStudy->image) }}"
                                class="rounded" width="60" height="60"
                                style="object-fit: cover;">
                            @else
                            <span class="text-muted">N/A</span>
                            @endif
                        </td>
                        <td>{{ $caseStudy->name }}</td>
                        <td>{{ $caseStudy->client_name ?? 'N/A' }}</td>
                        <td>{{ $caseStudy->project_name ?? 'N/A' }}</td>
                        <td>
                            @if($caseStudy->category)
                                @php
                                    $categoryTranslation = $caseStudy->category->translations->where('locale', app()->getLocale())->first();
                                @endphp
                                <span class="badge bg-info-lt">{{ $categoryTranslation?->name ?? 'N/A' }}</span>
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <label class="form-check form-switch m-0">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    wire:click="toggleStatus({{ $caseStudy->id }})"
                                    {{ $caseStudy->is_active ? 'checked' : '' }}>
                            </label>
                        </td>
                        <td>{{ $caseStudy->created_at->format('d M Y') }}</td>
                        <td class="text-end">
                            <a class="btn btn-sm btn-outline-primary" wire:navigate href="{{route('admin.case-studies.translations', $caseStudy->id )}}">
                                <i class="ti ti-arrow-right"></i>
                            </a>
                            <button class="btn btn-sm btn-outline-primary" wire:click="edit({{ $caseStudy->id }})">
                                <i class="ti ti-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger" wire:click="confirmDelete({{ $caseStudy->id }})">
                                <i class="ti ti-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center text-muted py-4">
                            No case studies found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">{{ $caseStudies->links() }}</div>

    <livewire:admin.casestudy.case-study-form />
    
    {{-- Delete Confirmation Modal --}}
    @if($showDeleteModal)
    <div class="modal fade show" style="display: block; background: rgba(0,0,0,0.5);" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="btn-close" wire:click="cancelDelete"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center py-3">
                        <i class="ti ti-alert-circle text-danger" style="font-size: 64px;"></i>
                        <h5 class="mt-3">Are you sure you want to delete this case study?</h5>
                        <p class="text-muted mb-0">
                            <strong>{{ $deleteName }}</strong>
                        </p>
                        <p class="text-danger mt-2 mb-0">This action cannot be undone!</p>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" wire:click="cancelDelete">
                        <i class="ti ti-x">Cancel</i> 
                    </button>
                    <button type="button" class="btn btn-danger" wire:click="delete">
                        <i class="ti ti-trash">Delete</i> 
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
