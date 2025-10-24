<div>
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Add New Blog</h2>
            </div>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-success mt-2">{{ session('message') }}</div>
    @endif

    <div class="card mt-3">
        <div class="card-body">
            <form wire:submit.prevent="save">
                {{-- Locale, Category, Tags --}}
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">Locale</label>
                        <select class="form-select" wire:model.live="locale">
                            <option value="en">English</option>
                            <option value="hi">Hindi</option>
                        </select>
                        @error('locale') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    {{-- Category with TomSelect --}}
                    <div class="col-md-3" wire:ignore x-data x-init="
                        let categorySelect = new TomSelect($refs.categorySelect,{
                            placeholder:'Select Category'
                        });
                        $refs.categorySelect.addEventListener('change',()=>{
                            $wire.set('category_id',$refs.categorySelect.value);
                        });
                    ">
                        <label class="form-label">Category</label>
                        <select x-ref="categorySelect" class="form-select">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category['id'] }}" @selected($category['id'] == $category_id)>
                                    {{ $category['name'] }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    {{-- Tags with TomSelect --}}
                    <div class="col-md-6" wire:ignore x-data x-init="
                        let tagSelect = new TomSelect($refs.tagSelect,{
                            plugins:['remove_button'],
                            placeholder:'Select Tags'
                        });
                        $refs.tagSelect.addEventListener('change',()=>{
                            let selected=[...$refs.tagSelect.selectedOptions].map(o=>o.value);
                            $wire.set('selectedTags',selected);
                        });
                    ">
                        <label class="form-label">Tags</label>
                        <select x-ref="tagSelect" multiple class="form-select">
                            @foreach($tags as $tag)
                                <option value="{{ $tag['id'] }}" @selected(in_array($tag['id'],$selectedTags))>
                                    {{ $tag['name'] }}
                                </option>
                            @endforeach
                        </select>
                        @error('selectedTags') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                {{-- Title --}}
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" wire:model="title.{{ $locale }}">
                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Featured Image --}}
                <div class="mb-3">
                    <label class="form-label">Featured Image URL</label>
                    <input type="text" class="form-control" wire:model="featured_image">
                    @error('featured_image') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- CKEditor Fields --}}
                @foreach(['at_glance', 'introduction', 'main_content', 'key_takeaways'] as $field)
                    <div class="mb-3">
                        <label class="form-label">{{ ucwords(str_replace('_', ' ', $field)) }}</label>
                        <div wire:ignore>
                            <textarea id="{{ $field }}" class="form-control">{{ $this->$field[$locale] ?? '' }}</textarea>
                        </div>
                    </div>
                @endforeach

                {{-- FAQs --}}
                <div class="mb-3">
                    <label class="form-label">FAQs</label>
                    <textarea class="form-control" rows="3" wire:model="faqs.{{ $locale }}"></textarea>
                </div>

                {{-- Author --}}
                <div class="mb-3">
                    <label class="form-label">Author</label>
                    <input type="text" class="form-control" wire:model="author.{{ $locale }}">
                </div>

                <button type="submit" class="btn btn-primary">Save Blog</button>
            </form>
        </div>
    </div>

    {{-- JS Dependencies --}}
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

    {{-- CKEditor 5 --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        document.addEventListener('livewire:init', function () {
            ['at_glance', 'introduction', 'main_content', 'key_takeaways'].forEach(field => {
                ClassicEditor
                    .create(document.querySelector(`#${field}`))
                    .then(editor => {
                        editor.model.document.on('change:data', () => {
                            @this.set(`${field}.${@json($locale)}`, editor.getData());
                        });
                    });
            });
        });
    </script>
</div>
