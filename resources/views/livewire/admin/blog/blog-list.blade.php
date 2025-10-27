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
                        <td>{{ optional($blog->category)->name ?? 'N/A' }}</td>
                        <td>
                            {{
                                    $blog->tags->map(function($tag) {
                                        $en = $tag->translations->firstWhere('locale', 'en');
                                        return $en?->name ?? $tag->name;
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

    <!-- Modal -->
    @if($isModalOpen)
    <div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,0.4);" wire:ignore.self 
         x-data="{ 
             shown: false,
             init() {
                 this.shown = true;
                 this.$nextTick(() => {
                     // Dispatch event to reinitialize TomSelect
                     this.$dispatch('modal-opened');
                 });
             }
         }">
        <div class="modal-dialog">
            <div class="modal-content">
                <form wire:submit.prevent="saveBlog">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $blogId ? 'Edit Blog' : 'Add Blog' }}</h5>
                        <button type="button" class="btn-close" wire:click="closeModal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Blog Name {{ $blogId ? '' : '(Auto-generated)' }}</label>
                            <input type="text" class="form-control" 
                                   wire:model="nextBlogName" 
                                   {{ $blogId ? '' : 'readonly' }}>
                            @if(!$blogId)
                            <small class="text-muted">Name will be like BlogPost 1, 2, 3…</small>
                            @endif
                            @error('nextBlogName') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Author</label>
                            <select wire:model="author" class="form-select">
                                <option value="">Select Author</option>
                                @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('author') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Category</label>
                            <select wire:model="category_id" class="form-select">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                @endforeach
                            </select>
                            @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3" x-data="{
                            tagSelect: null,
                            selectedTags: @entangle('selectedTags'),
                            init() {
                                this.initTomSelect();
                                this.$watch('selectedTags', () => {
                                    this.updateTomSelect();
                                });
                                
                                // Listen for modal opened event
                                this.$listen('modal-opened', () => {
                                    setTimeout(() => {
                                        this.initTomSelect();
                                    }, 100);
                                });
                            },
                            initTomSelect() {
                                if (this.tagSelect) {
                                    this.tagSelect.destroy();
                                }
                                this.$nextTick(() => {
                                    this.tagSelect = new TomSelect(this.$refs.tagSelect, {
                                        plugins: ['remove_button'],
                                        placeholder: 'Select Tags',
                                        onItemAdd: () => this.updateLivewire(),
                                        onItemRemove: () => this.updateLivewire()
                                    });
                                    this.updateTomSelect();
                                });
                            },
                            updateTomSelect() {
                                if (this.tagSelect) {
                                    this.tagSelect.clear(true);
                                    this.selectedTags.forEach(tagId => {
                                        this.tagSelect.addItem(tagId, true);
                                    });
                                }
                            },
                            updateLivewire() {
                                if (this.tagSelect) {
                                    let selected = this.tagSelect.getValue();
                                    this.selectedTags = Array.isArray(selected) ? selected : (selected ? [selected] : []);
                                }
                            }
                        }" wire:ignore>
                            <label>Tags</label>
                            <select x-ref="tagSelect" multiple class="form-select">
                                @foreach($tags as $tag)
                                <option value="{{ $tag['id'] }}">
                                    {{ $tag['name'] }}
                                </option>
                                @endforeach
                            </select>
                            @error('selectedTags') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Featured Image</label>
                            <input type="file" wire:model="featured_image" class="form-control">
                            @if ($featured_image)
                            <img src="{{ $featured_image->temporaryUrl() }}" class="img-fluid mt-2" width="100">
                            @endif
                            @error('featured_image') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <label class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" wire:model="is_active">
                                <span class="form-check-label">
                                    {{ $is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </label>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal">{{ __('button.cancel') }}</button>
                        <button type="submit" class="btn btn-primary">
                            {{ $blogId ? __('button.update') : __('button.save') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>