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
                            <!-- Tabler Language Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-language" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 5h7" />
                                <path d="M9 3v2c0 4.418 -2.239 8 -5 8" />
                                <path d="M5 9h4" />
                                <path d="M12 20l4 -9l4 9" />
                                <path d="M19.1 18h-6.2" />
                            </svg>
                        </span>
                        <h5 class="modal-title mb-0 fw-semibold">Manage FAQ Translations</h5>
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
                            <label class="form-label fw-semibold">Question</label>
                            <input type="text" class="form-control" wire:model.defer="question" placeholder="Enter question">
                            @error('question') <div class="form-hint text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Answer</label>
                            <textarea class="form-control" rows="4" wire:model.defer="answer" placeholder="Enter answer"></textarea>
                            @error('answer') <div class="form-hint text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    @if(!empty($translations))
                    <hr class="my-3">
                    <h6 class="fw-semibold text-muted mb-2">Existing Translations</h6>
                    <div class="list-group list-group-flush border rounded">
                        @foreach($translations as $t)
                        <div class="list-group-item d-flex justify-content-between">
                            <div>
                                <span class="badge bg-primary me-2">{{ strtoupper($t->locale) }}</span>
                                <strong>{{ $t->question }}</strong>
                            </div>
                            <div class="text-end small text-muted">{!! nl2br(e(Str::limit($t->answer, 100))) !!}</div>
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
                        Save Translation
                    </button>
                    <button type="button" class="btn btn-outline-secondary" wire:click="closeModal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>