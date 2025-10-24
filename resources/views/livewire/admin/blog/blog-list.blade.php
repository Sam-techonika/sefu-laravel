<div>
    <div>
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Blogs List</h2>
            </div>
            <div class="col-auto ms-auto">
                <a href="{{ route('admin.blog.add') }}" class="btn btn-primary">Add New Blog</a>
            </div>
        </div>
    </div>

    {{-- Filters --}}
    <div class="row mb-3">
        <div class="col-md-3">
            <input type="text" class="form-control" placeholder="Search Title" wire:model.debounce.300ms="search">
        </div>
        <div class="col-md-3">
            <select class="form-select" wire:model="category_id">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <select class="form-select" wire:model="tag_id">
                <option value="">All Tags</option>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <select class="form-select" wire:model="locale">
                <option value="">All Languages</option>
                <option value="en">English</option>
                <option value="hi">Hindi</option>
            </select>
        </div>
    </div>

    {{-- Blog Table --}}
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-vcenter table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Tags</th>
                            <th>Locale</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($blogs as $blog)
                            <tr>
                                <td>{{ $blog->id }}</td>
                                <td>{{ $blog->title[$blog->locale] ?? 'N/A' }}</td>
                                <td>{{ $blog->category->name ?? 'N/A' }}</td>
                                <td>
                                    @foreach($blog->tags as $tag)
                                        <span class="badge bg-primary">{{ $tag->name }}</span>
                                    @endforeach
                                </td>
                                <td>{{ strtoupper($blog->locale) }}</td>
                                <td>{{ $blog->created_at->format('d M Y') }}</td>
                                <td>
                                    <button wire:click="delete({{ $blog->id }})" class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No blogs found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
</div>

</div>
