<div>
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
                    <button type="button" class="btn-close" wire:click="close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Blog Name {{ $blogId ? '' : '(Auto-generated — you can edit)' }}</label>
                        <div class="input-group">
                            <input type="text" class="form-control" wire:model="nextBlogName">
                            <button type="button" class="btn btn-outline-secondary" wire:click.prevent="setNextBlogName">Generate</button>
                        </div>
                        <small class="text-muted">Name will be like BlogPost 1, 2, 3… — you can edit before saving.</small>
                        @error('nextBlogName') <span class="text-danger d-block mt-1">{{ $message }}</span> @enderror
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
                            this.$listen('modal-opened', () => {
                                setTimeout(() => { this.initTomSelect(); }, 100);
                            });
                        },
                        initTomSelect() {
                            if (this.tagSelect) { this.tagSelect.destroy(); }
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
                                this.selectedTags.forEach(tagId => { this.tagSelect.addItem(tagId, true); });
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
                            <option value="{{ $tag['id'] }}">{{ $tag['name'] }}</option>
                            @endforeach
                        </select>
                        @error('selectedTags') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3" x-data="{ isUploading: false, progress: 0 }"
                         x-on:livewire-upload-start="isUploading = true"
                         x-on:livewire-upload-finish="isUploading = false"
                         x-on:livewire-upload-error="isUploading = false"
                         x-on:livewire-upload-progress="progress = $event.detail.progress">
                        <label>Featured Image</label>
                        <input type="file" wire:model="featured_image" class="form-control">

                        <div class="mt-2" x-show="isUploading" style="display:none;">
                            <div class="d-flex align-items-center">
                                <div class="spinner-border spinner-border-sm text-primary me-2" role="status">
                                    <span class="visually-hidden">Uploading...</span>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="progress" style="height:6px;">
                                        <div class="progress-bar" role="progressbar" :style="'width: '+progress+'%'" :aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small class="text-muted" x-text="progress + '%'">0%</small>
                                </div>
                            </div>
                        </div>

                        @if ($featured_image)
                        <img src="{{ $featured_image->temporaryUrl() }}" class="img-fluid mt-2" width="100">
                        @endif
                        @error('featured_image') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <label class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" wire:model="is_active">
                            <span class="form-check-label">{{ $is_active ? 'Active' : 'Inactive' }}</span>
                        </label>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="close">{{ __('button.cancel') }}</button>
                    <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:target="featured_image">
                        {{ $blogId ? __('button.update') : __('button.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

</div>