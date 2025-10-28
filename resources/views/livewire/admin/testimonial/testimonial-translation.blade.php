<div>
    @if ($showModal)
    <div class="modal-backdrop fade show"></div>
    @endif

    <div
        class="modal fade @if($showModal) show d-block @endif"
        tabindex="-1"
        style="@if(!$showModal) display:none; @endif"
        aria-hidden="{{ $showModal ? 'false' : 'true' }}">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content shadow-lg border-0 rounded-3">
                <div class="modal-header bg-light border-0">
                    <div class="d-flex align-items-center">
                        <span class="me-2 text-primary">
                            <!-- Tabler Testimonial Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-quote" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M7 7h-2v6a4 4 0 0 0 4 4h2v-2a4 4 0 0 0 -4 -4z" />
                                <path d="M17 7h-2v6a4 4 0 0 0 4 4h2v-2a4 4 0 0 0 -4 -4z" />
                            </svg>
                        </span>
                        <h5 class="modal-title mb-0 fw-semibold">{{ $editingTranslationId ? 'Edit Translation' : 'Manage Testimonial Translations' }}</h5>
                    </div>

                    <button type="button" class="btn-close" wire:click="closeModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <div class="modal-body">
                    @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Locale</label>
                            <select class="form-select" wire:model.defer="locale">
                                @foreach(\App\Enums\LocaleType::options() as $val => $label)
                                <option value="{{ $val }}">{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('locale') <div class="form-hint text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-8">
                            <label class="form-label fw-semibold">Content</label>
                            <textarea class="form-control" rows="3" wire:model.defer="content" placeholder="Enter testimonial content"></textarea>
                            @error('content') <div class="form-hint text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Gender</label>
                            <select class="form-select" wire:model.defer="gender">
                                <option value="">-- Select --</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Position</label>
                            <input type="text" class="form-control" wire:model.defer="position" placeholder="e.g. CEO">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Company</label>
                            <input type="text" class="form-control" wire:model.defer="company" placeholder="Company name">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Photo</label>

                            <div class="mb-2">
                                {{-- Preview: temporary uploaded file or existing stored photo --}}
                                @if($photoFile)
                                    <img src="{{ $photoFile->temporaryUrl() }}" alt="preview" class="img-fluid rounded" style="max-height:120px;">
                                @elseif(!empty($photo))
                                    <img src="{{ asset('storage/' . $photo) }}" alt="preview" class="img-fluid rounded" style="max-height:120px;">
                                @else
                                    <div class="border rounded d-flex align-items-center justify-content-center text-muted" style="height:120px">No image</div>
                                @endif
                            </div>

                            <input type="file" class="form-control" wire:model="photoFile" accept="image/*">
                            @error('photoFile') <div class="form-hint text-danger">{{ $message }}</div> @enderror

                            <div class="mt-2">
                                <div wire:loading wire:target="photoFile" class="small text-muted">
                                    Uploading image...
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Address</label>
                            <input type="text" class="form-control" wire:model.defer="address" placeholder="City, Country">
                        </div>
                    </div>

                    @if(!empty($translations))
                    <hr class="my-3">
                    <h6 class="fw-semibold text-muted mb-2">Existing Translations</h6>
                    <div class="list-group list-group-flush border rounded">
                        @foreach($translations as $t)
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                @if(!empty($t->photo))
                                    <img src="{{ asset('storage/' . $t->photo) }}" alt="thumb" class="rounded me-2" style="width:48px;height:48px;object-fit:cover">
                                @endif
                                <div>
                                    <span class="badge bg-primary me-2">{{ strtoupper($t->locale) }}</span>
                                    <strong>{!! Str::limit($t->content, 60) !!}</strong>
                                    <div class="small text-muted">{{ $t->position }} @if($t->company) &nbsp;at&nbsp; {{ $t->company }} @endif</div>
                                </div>
                            </div>
                            <div class="text-end small text-muted">
                                {!! nl2br(e(Str::limit($t->content, 100))) !!}
                                <div class="mt-2">
                                    <button class="btn btn-sm btn-outline-secondary" wire:click="loadTranslation({{ $t->id }})">Edit</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>

                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-primary d-flex align-items-center" wire:click="saveTranslation">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5v14" />
                            <path d="M5 12h14" />
                        </svg>
                        {{ $editingTranslationId ? 'Update Translation' : 'Save Translation' }}
                    </button>
                    <button type="button" class="btn btn-outline-secondary" wire:click="closeModal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
