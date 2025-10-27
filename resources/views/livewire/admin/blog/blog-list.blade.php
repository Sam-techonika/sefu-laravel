<div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <button class="btn btn-primary" wire:click="openModal">
            <i class="ti ti-plus"></i> {{ __('button.add_blog') }}
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
                        <th>Author</th>
                        <th>Category</th>
                        <th>Tags</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($blogs as $index => $blog)
                    <tr>
                        <td>{{ $blogs->firstItem() + $index }}</td>
                        <td>
                            @if($blog->featured_image)
                            <img src="{{ asset('storage/'.$blog->featured_image) }}"
                                class="rounded" width="60" height="60"
                                style="object-fit: cover;">
                            @else
                            <span class="text-muted">N/A</span>
                            @endif
                        </td>
                        <td>{{ $blog->name }}</td>
                        <td>{{ $blog->author ? \App\Models\User::find($blog->author)?->name : 'N/A' }}</td>
                        <td>{{ optional($blog?->category?->translations->firstWhere('locale', 'en'))->name ?? 'N/A' }}</td>
                        <td>
                            {{
                                    $blog->tags->map(function($tag) use ($locale) {
                                        $tr = $tag?->translations?->firstWhere('locale', 'en');
                                        return $tr?->name ?? $tag->name;
                                    })->join(', ')
                                }}
                        </td>
                        <td class="text-center">
                            <label class="form-check form-switch m-0">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    wire:click="toggleStatus({{ $blog->id }})"
                                    {{ $blog->is_active ? 'checked' : '' }}>
                            </label>
                        </td>
                        <td>{{ $blog->created_at->format('d M Y') }}</td>
                        <td class="text-end">
                            <a class="btn btn-sm btn-outline-primary" wire:navigate href="{{route('admin.blog.languages', $blog->id )}}">
                                <i class="ti ti-arrow-right"></i>
                            </a>
                            <button class="btn btn-sm btn-outline-primary" wire:click="edit({{ $blog->id }})">
                                <i class="ti ti-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger" wire:click="delete({{ $blog->id }})"
                                onclick="confirm('Are you sure?') || event.stopImmediatePropagation()">
                                <i class="ti ti-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center text-muted py-4">
                            No blogs found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">{{ $blogs->links() }}</div>

    <livewire:admin.blog.blog-form />
</div>