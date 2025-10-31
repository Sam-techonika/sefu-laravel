<div>
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Edit Case Study Translation</h2>
                <div class="text-muted mt-1">
                    Currently Editing: <span class="badge bg-blue text-white">{{ $locale === 'en' ? 'English' : 'हिंदी (Hindi)' }}</span>
                    <span class="mx-2">•</span>
                    <span class="">{{ $caseStudy->name ?? 'Case Study' }}</span>
                </div>
            </div>
            <div class="col-auto ms-auto">
                <div class="btn-list">
                    <a href="{{ route('admin.case-studies') }}" class="btn btn-outline-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" />
                        </svg>
                        Back to Case Studies
                    </a>
                    <a href="{{ route('admin.case-studies.translations', $caseStudyId) }}" class="btn btn-outline-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 5h3l3 3h7l-3 -3h3a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-8a2 2 0 0 1 2 -2z" />
                            <path d="M9 13v-1a1 1 0 0 1 1 -1h1m2 1v1a1 1 0 0 1 -1 1h-1" />
                            <path d="M11 10h1" />
                        </svg>
                        View Languages
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <form wire:submit.prevent="save">
                {{-- Locale Selection --}}
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Locale</label>
                        <select class="form-select" wire:model.live="locale">
                            @foreach(\App\Enums\LocaleType::options() as $code => $label)
                            <option value="{{ $code }}">{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('locale') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-8 mt-5">
                        <div class="d-flex gap-3">
                            @if($caseStudy && $caseStudy->client_name)
                            <div>
                                <small class="text-muted">Client:</small>
                                <span class="badge bg-primary">{{ $caseStudy->client_name }}</span>
                            </div>
                            @endif
                            @if($caseStudy && $caseStudy->project_name)
                            <div>
                                <small class="text-muted">Project:</small>
                                <span class="badge bg-secondary text-white">{{ $caseStudy->project_name }}</span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Title --}}
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" wire:model.live="title">
                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Slug --}}
                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" class="form-control" wire:model="slug">
                    @error('slug') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Description --}}
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" rows="4" wire:model="description" placeholder="Enter description..."></textarea>
                    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Goals --}}
                <div class="mb-3" wire:ignore>
                    <label class="form-label">Goals</label>
                    <textarea id="goals" class="form-control">{{ $goals ?? '' }}</textarea>
                    @error('goals') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Challenges --}}
                <div class="mb-3" wire:ignore>
                    <label class="form-label">Challenges</label>
                    <textarea id="challenges" class="form-control">{{ $challenges ?? '' }}</textarea>
                    @error('challenges') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Dynamic Results with Points --}}
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label mb-0">Results</label>
                        <button type="button" class="btn btn-sm btn-outline-primary" wire:click="addResult">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            Add Result
                        </button>
                    </div>

                    @foreach($results as $resultIndex => $result)
                    <div class="card mb-3 border-primary" wire:key="result-{{ $resultIndex }}">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title mb-0">Result #{{ $resultIndex + 1 }}</h5>
                                @if(count($results) > 1)
                                <button type="button" class="btn btn-sm btn-outline-danger" wire:click="removeResult({{ $resultIndex }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <line x1="18" y1="6" x2="6" y2="18" />
                                        <line x1="6" y1="6" x2="18" y2="18" />
                                    </svg>
                                    Remove Result
                                </button>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Result Section</label>
                                <textarea type="text" class="form-control"
                                    wire:model="results.{{ $resultIndex }}.section"
                                    placeholder="Enter result section..."></textarea>
                                @error("results.{$resultIndex}.section")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <label class="form-label mb-0">Points</label>
                                    <button type="button" class="btn btn-sm btn-outline-success" wire:click="addPoint({{ $resultIndex }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <line x1="12" y1="5" x2="12" y2="19" />
                                            <line x1="5" y1="12" x2="19" y2="12" />
                                        </svg>
                                        Add Point
                                    </button>
                                </div>

                                @if(isset($result['points']) && is_array($result['points']))
                                @foreach($result['points'] as $pointIndex => $point)
                                <div class="input-group mb-2" wire:key="point-{{ $resultIndex }}-{{ $pointIndex }}">
                                    <span class="input-group-text">{{ $pointIndex + 1 }}.</span>
                                    <input type="text" class="form-control"
                                        wire:model="results.{{ $resultIndex }}.points.{{ $pointIndex }}"
                                        placeholder="Enter point...">
                                    @if(count($result['points']) > 1)
                                    <button type="button" class="btn btn-outline-danger" wire:click="removePoint({{ $resultIndex }}, {{ $pointIndex }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <line x1="18" y1="6" x2="6" y2="18" />
                                            <line x1="6" y1="6" x2="18" y2="18" />
                                        </svg>
                                    </button>
                                    @endif
                                </div>
                                @error("results.{$resultIndex}.points.{$pointIndex}")
                                <span class="text-danger d-block mb-2">{{ $message }}</span>
                                @enderror
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M19 7l-3 3l-3 -3" />
                        <path d="M16 10v9a1 1 0 0 1 -1 1h-10a1 1 0 0 1 -1 -1v-12a1 1 0 0 1 1 -1h8m4 0l2 2l-8 8l-2.5 -2.5" />
                    </svg>
                    Update Translation
                </button>
            </form>
        </div>
    </div>

    {{-- TinyMCE with API key --}}
    <script src="https://cdn.tiny.cloud/1/pvxf2rey6dhbd0zfoep9pxag4n66tqcoa74t54qq0aybqjbs/tinymce/8/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        let currentLocale = @json($locale);

        function initTinyMCE() {
            ['goals', 'challenges'].forEach(field => {
                if (tinymce.get(field)) tinymce.get(field).remove();

                tinymce.init({
                    selector: `#${field}`,
                    height: 300,
                    menubar: false,
                    plugins: 'lists link image paste help wordcount',
                    toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | removeformat',
                    setup: function(editor) {
                        editor.on('Change KeyUp', function() {
                            Livewire.find(document.querySelector('[wire\\:id]').getAttribute('wire:id'))
                                .set(field, editor.getContent());
                        });
                    }
                });
            });
        }

        document.addEventListener('livewire:init', () => {
            initTinyMCE();
        });

        document.addEventListener('livewire:mount', () => {
            initTinyMCE();
        });

        Livewire.hook('message.processed', (message, component) => {
            currentLocale = component.get('locale');

            ['goals', 'challenges'].forEach(field => {
                const editor = tinymce.get(field);
                if (editor) {
                    const content = component.get(field) || '';
                    if (editor.getContent() !== content) editor.setContent(content);
                }
            });

            setTimeout(() => {
                initTinyMCE();
            }, 100);
        });
    </script>
</div>
