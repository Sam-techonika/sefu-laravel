<div>
    @if($isModalOpen)
    <div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,0.4);" wire:ignore.self
        x-data="{
         init() { this.$nextTick(() => this.$dispatch('modal-opened')) }
     }">
        <div class="modal-dialog">
            <div class="modal-content">
                <form wire:submit.prevent="saveCaseStudy">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $caseStudyId ? 'Edit Case Study' : 'Add Case Study' }}</h5>
                        <button type="button" class="btn-close" wire:click="close"></button>
                    </div>

                    <div class="modal-body">

                        {{-- Case Study Name --}}
                        <div class="mb-3">
                            <label>Case Study Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" wire:model="nextCaseStudyName">
                                <button type="button" class="btn btn-outline-secondary" wire:click.prevent="setNextCaseStudyName">Generate</button>
                            </div>
                            @error('nextCaseStudyName') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- Client Name --}}
                        <div class="mb-3">
                            <label>Client Name</label>
                            <input type="text" class="form-control" wire:model="client_name" placeholder="Enter client name">
                            @error('client_name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- Project Name --}}
                        <div class="mb-3">
                            <label>Project Name</label>
                            <input type="text" class="form-control" wire:model="project_name" placeholder="Enter project name">
                            @error('project_name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- Category --}}
                        <div class="mb-3">
                            <label>Category</label>
                            <select class="form-select" wire:model="case_category_id">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                @endforeach
                            </select>
                            @error('case_category_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- Image --}}
                        <div class="mb-3" x-data="{ isUploading: false, progress: 0 }"
                            x-on:livewire-upload-start="isUploading = true"
                            x-on:livewire-upload-finish="isUploading = false"
                            x-on:livewire-upload-error="isUploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress">
                            <label>Case Study Image</label>
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
                            {{ $caseStudyId ? 'Update' : 'Save' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>
