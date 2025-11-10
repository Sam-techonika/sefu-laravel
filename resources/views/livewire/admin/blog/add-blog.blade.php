<div>
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Edit Blog Translation</h2>
                <div class="text-muted mt-1">
                    Currently Adding: <span class="badge bg-blue text-white">{{ $locale === 'en' ? 'English' : 'हिंदी (Hindi)' }}</span>
                    <span class="mx-2">•</span>
                    <span class="">{{ $blog->name ?? 'Blog' }}</span>
                </div>
            </div>
            <div class="col-auto ms-auto">
                <div class="btn-list">
                    <a href="{{ route('admin.blogs') }}" class="btn btn-outline-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" />
                        </svg>
                        Back to Blogs
                    </a>
                </div>
            </div>
        </div>
    </div>

    @if (session()->has('message'))
    <div class="alert alert-success mt-2">{{ session('message') }}</div>
    @endif

    @if (session()->has('error'))
    <div class="alert alert-danger mt-2">{{ session('error') }}</div>
    @endif

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
                    <div class="col-md-8">
                        <div class="d-flex gap-3">
                            @if($blog && $blog->category)
                            <div>
                                <small class="text-muted">Category:</small>
                                <span class="badge bg-primary">{{ $blog->category->name ?? 'N/A' }}</span>
                            </div>
                            @endif
                            @if($blog && $blog->tags->count() > 0)
                            <div>
                                <small class="text-muted">Tags:</small>
                                @foreach($blog->tags as $tag)
                                @php
                                $translation = $tag->translations->firstWhere('locale',$locale );
                                @endphp
                                <span class="badge bg-secondary text-white me-1">
                                    {{ $translation->name ?? 'N/A' }}
                                </span>
                                @endforeach
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
                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" class="form-control" wire:model="slug">
                    @error('slug') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Tags Input --}}
                <div class="mb-3">
                    <label class="form-label">Tags</label>
                    <input type="text" class="form-control" wire:model="tags" 
                           placeholder="Enter tags separated by commas (e.g., technology, web development, programming)">
                    <div class="form-text">
                        <small class="text-muted">
                            <i class="fas fa-info-circle"></i>
                            Enter tags separated by commas. These tags will help users filter and find your blog posts.
                        </small>
                    </div>
                    @error('tags') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- TinyMCE Fields --}}
                @foreach(['at_glance', 'key_takeaways'] as $field)
                <div class="mb-3" wire:ignore>
                    <label class="form-label">{{ ucwords(str_replace('_', ' ', $field)) }}</label>
                    <textarea id="{{ $field }}" class="form-control">{{ $this->$field ?? '' }}</textarea>
                </div>
                @endforeach

                {{-- Main Content --}}
                <div class="mb-3" wire:ignore>
                    <label class="form-label">Main Content</label>
                    <textarea id="main_content" class="form-control">{{ $main_content ?? '' }}</textarea>
                    @error('main_content') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- FAQs with Dynamic Question-Answer Format --}}
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label mb-0">FAQs</label>
                        <button type="button" class="btn btn-sm btn-outline-primary" wire:click="addFaq">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            {{ __('button.add_faq') }}
                        </button>
                    </div>

                    @foreach($faqs as $index => $faq)
                    <div class="card mb-3" wire:key="faq-{{ $index }}">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title mb-0">FAQ #{{ $index + 1 }}</h5>
                                @if(count($faqs) > 1)
                                <button type="button" class="btn btn-sm btn-outline-danger" wire:click="removeFaq({{ $index }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <line x1="18" y1="6" x2="6" y2="18" />
                                        <line x1="6" y1="6" x2="18" y2="18" />
                                    </svg>
                                    {{ __('button.remove') }}
                                </button>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label class="form-label">Question</label>
                                    <input type="text" class="form-control"
                                        wire:model="faqs.{{ $index }}.question"
                                        placeholder="Enter your question here...">
                                    @error("faqs.{$index}.question")
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Answer</label>
                                    <textarea class="form-control" rows="3"
                                        wire:model="faqs.{{ $index }}.answer"
                                        placeholder="Enter your answer here..."></textarea>
                                    @error("faqs.{$index}.answer")
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
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
                   Add Blog Translation
                </button>
            </form>
        </div>
    </div>

    {{-- JS Dependencies --}}
    {{-- TinyMCE with API key --}}
    <script src="https://cdn.tiny.cloud/1/pvxf2rey6dhbd0zfoep9pxag4n66tqcoa74t54qq0aybqjbs/tinymce/8/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        let currentLocale = @json($locale);

        function initTinyMCE() {
            // Initialize standard TinyMCE fields
            ['at_glance', 'key_takeaways', 'main_content'].forEach(field => {
                if (tinymce.get(field)) tinymce.get(field).remove();

                tinymce.init({
                    selector: `#${field}`,
                    height: field === 'main_content' ? 500 : 300,
                    menubar: false,
                    plugins: 'lists link image paste help wordcount code table',
                    toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image table | code | removeformat',
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

            // Update standard TinyMCE content
            ['at_glance', 'key_takeaways', 'main_content'].forEach(field => {
                const editor = tinymce.get(field);
                if (editor) {
                    const content = component.get(field) || '';
                    if (editor.getContent() !== content) editor.setContent(content);
                }
            });

            // Reinitialize TinyMCE for dynamic content
            setTimeout(() => {
                initTinyMCE();
            }, 100);
        });
    </script>
</div>