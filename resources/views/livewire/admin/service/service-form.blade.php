<div>
    @if($isModalOpen)
    <div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,0.4);" wire:ignore.self
        x-data="{
         init() { this.$nextTick(() => this.$dispatch('modal-opened')) }
     }">
        <div class="modal-dialog">
            <div class="modal-content">
                <form wire:submit.prevent="saveService">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $serviceId ? 'Edit Service' : 'Add Service' }}</h5>
                        <button type="button" class="btn-close" wire:click="close"></button>
                    </div>

                    <div class="modal-body">

                        {{-- Service Name --}}
                        <div class="mb-3">
                            <label>Service Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" wire:model="nextServiceName">
                                <button type="button" class="btn btn-outline-secondary" wire:click.prevent="setNextServiceName">Generate</button>
                            </div>
                            @error('nextServiceName') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- Image --}}
                        <div class="mb-3" x-data="{ isUploading: false, progress: 0 }"
                            x-on:livewire-upload-start="isUploading = true"
                            x-on:livewire-upload-finish="isUploading = false"
                            x-on:livewire-upload-error="isUploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress">
                            <label>Service Image</label>
                            <input type="file" wire:model="image" class="form-control">

                            <div x-show="isUploading" class="mt-2">
                                <div class="progress" style="height:6px;">
                                    <div class="progress-bar" role="progressbar"
                                        :style="'width: '+progress+'%'" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small class="text-muted" x-text="progress + '%'"></small>
                            </div>

                            @if ($image)
                            {{-- Show newly uploaded (temporary) image preview --}}
                            <img src="{{ $image->temporaryUrl() }}" class="img-fluid mt-2" width="100">
                            @elseif(!empty($existingImage))
                            {{-- Show existing stored image when editing and no new upload present --}}
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($existingImage) }}" class="img-fluid mt-2" width="100">
                            @endif
                            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
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
                            {{ $serviceId ? 'Update' : 'Save' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>
