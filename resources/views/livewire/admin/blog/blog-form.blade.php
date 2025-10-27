<div>
    @if($isModalOpen)
    <div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,0.4);" wire:ignore.self
        x-data="{
         init() { this.$nextTick(() => this.$dispatch('modal-opened')) }
     }">
        <div class="modal-dialog">
            <div class="modal-content">
                <form wire:submit.prevent="saveBlog">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $blogId ? 'Edit Blog' : 'Add Blog' }}</h5>
                        <button type="button" class="btn-close" wire:click="close"></button>
                    </div>

                    <div class="modal-body">

                        {{-- Blog Name --}}
                        <div class="mb-3">
                            <label>Blog Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" wire:model="nextBlogName">
                                <button type="button" class="btn btn-outline-secondary" wire:click.prevent="setNextBlogName">Generate</button>
                            </div>
                            @error('nextBlogName') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- Author --}}
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

                        {{-- Category --}}
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

                        {{-- Tags --}}
                        <div class="mb-3"
                            x-data="{
        tagSelect: null,
        selected: @entangle('selectedTags'),
        init() {
            this.$nextTick(() => this.initSelect());
        },
        initSelect() {
            if (this.tagSelect) this.tagSelect.destroy();
            this.tagSelect = new TomSelect(this.$refs.tagSelect, {
                plugins: ['remove_button'],
                persist: false,
                closeAfterSelect: true,
                maxOptions: 100,
                placeholder: 'Select Tags',
                onItemAdd: () => this.sync(),
                onItemRemove: () => this.sync(),
            });
            this.refreshSelect();
        },
        refreshSelect() {
            if (!this.tagSelect) return;
            this.tagSelect.clear(true);
            (this.selected || []).forEach(id => {
                this.tagSelect.addItem(id, true);
            });
        },
        sync() {
            let values = this.tagSelect.getValue();

    
            // so we ensure it's always an array
            if (!Array.isArray(values)) {
                values = values ? values.split(',') : [];
            }

            
            this.selected = values.map(v => parseInt(v));
        }
    }"
                            wire:ignore>
                            <label>Tags</label>
                            <select x-ref="tagSelect" multiple class="form-select">
                                @foreach($tags as $tag)
                                <option value="{{ $tag['id'] }}">{{ $tag['name'] }}</option>
                                @endforeach
                            </select>
                            @error('selectedTags') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- Featured Image --}}
                        <div class="mb-3" x-data="{ isUploading: false, progress: 0 }"
                            x-on:livewire-upload-start="isUploading = true"
                            x-on:livewire-upload-finish="isUploading = false"
                            x-on:livewire-upload-error="isUploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress">
                            <label>Featured Image</label>
                            <input type="file" wire:model="featured_image" class="form-control">

                            <div x-show="isUploading" class="mt-2">
                                <div class="progress" style="height:6px;">
                                    <div class="progress-bar" role="progressbar"
                                        :style="'width: '+progress+'%'" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small class="text-muted" x-text="progress + '%'"></small>
                            </div>

                            @if ($featured_image)
                            {{-- Show newly uploaded (temporary) image preview --}}
                            <img src="{{ $featured_image->temporaryUrl() }}" class="img-fluid mt-2" width="100">
                            @elseif(!empty($existingFeaturedImage))
                            {{-- Show existing stored image when editing and no new upload present --}}
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($existingFeaturedImage) }}" class="img-fluid mt-2" width="100">
                            @endif
                            @error('featured_image') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- Status --}}
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <label class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" wire:model="is_active">
                                <span class="form-check-label">{{ $is_active ? 'Active' : 'Inactive' }}</span>
                            </label>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="close">Cancel</button>
                        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                            {{ $blogId ? 'Update' : 'Save' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>