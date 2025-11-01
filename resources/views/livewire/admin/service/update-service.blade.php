<div>
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Edit Service Translation</h2>
                <div class="text-muted mt-1">
                    Currently Editing: <span class="badge bg-blue text-white">{{ $locale === 'en' ? 'English' : 'हिंदी (Hindi)' }}</span>
                    <span class="mx-2">•</span>
                    <span class="">{{ $service->name ?? 'Service' }}</span>
                </div>
            </div>
            <div class="col-auto ms-auto">
                <div class="btn-list">
                    <a href="{{ route('admin.services') }}" class="btn btn-outline-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" />
                        </svg>
                        Back to Services
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

                {{-- Subtitle --}}
                <div class="mb-3">
                    <label class="form-label">Subtitle</label>
                    <input type="text" class="form-control" wire:model="subtitle">
                    @error('subtitle') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Description --}}
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" rows="4" wire:model="description" placeholder="Enter description..."></textarea>
                    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Overview --}}
                <div class="mb-3">
                    <label class="form-label">Overview</label>
                    <textarea class="form-control" rows="5" wire:model="overview" placeholder="Enter overview..."></textarea>
                    @error('overview') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Service Highlights --}}
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label mb-0">Service Highlights</label>
                        <button type="button" class="btn btn-sm btn-outline-primary" wire:click="addHighlight">
                            <i class="ti ti-plus"></i> Add Highlight
                        </button>
                    </div>

                    @foreach($service_highlights as $index => $highlight)
                    <div class="card mb-2" wire:key="highlight-{{ $index }}">
                        <div class="card-body p-3">
                            <div class="d-flex gap-2">
                                <input type="text" class="form-control" wire:model="service_highlights.{{ $index }}.title" placeholder="Highlight title...">
                                @if(count($service_highlights) > 1)
                                <button type="button" class="btn btn-outline-danger" wire:click="removeHighlight({{ $index }})">
                                    <i class="ti ti-x"></i>
                                </button>
                                @endif
                            </div>
                            @error("service_highlights.{$index}.title") <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- How It Works Sections --}}
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label mb-0">How It Works</label>
                        <button type="button" class="btn btn-sm btn-outline-primary" wire:click="addHowItWorks">
                            <i class="ti ti-plus"></i> Add Section
                        </button>
                    </div>

                    @foreach($how_it_works as $index => $section)
                    <div class="card mb-3" wire:key="how-{{ $index }}">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title mb-0">Section #{{ $index + 1 }}</h5>
                                @if(count($how_it_works) > 1)
                                <button type="button" class="btn btn-sm btn-outline-danger" wire:click="removeHowItWorks({{ $index }})">
                                    <i class="ti ti-x"></i> Remove
                                </button>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" wire:model="how_it_works.{{ $index }}.title" placeholder="Enter title...">
                                    @error("how_it_works.{$index}.title") <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" rows="3" wire:model="how_it_works.{{ $index }}.description" placeholder="Enter description..."></textarea>
                                    @error("how_it_works.{$index}.description") <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Deliverables --}}
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label mb-0">Deliverables</label>
                        <button type="button" class="btn btn-sm btn-outline-primary" wire:click="addDeliverable">
                            <i class="ti ti-plus"></i> Add Deliverable
                        </button>
                    </div>

                    @foreach($deliverables as $index => $deliverable)
                    <div class="card mb-2" wire:key="del-{{ $index }}">
                        <div class="card-body p-3">
                            <div class="d-flex gap-2">
                                <input type="text" class="form-control" wire:model="deliverables.{{ $index }}.title" placeholder="Deliverable title...">
                                @if(count($deliverables) > 1)
                                <button type="button" class="btn btn-outline-danger" wire:click="removeDeliverable({{ $index }})">
                                    <i class="ti ti-x"></i>
                                </button>
                                @endif
                            </div>
                            @error("deliverables.{$index}.title") <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- FAQs --}}
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label mb-0">FAQs</label>
                        <button type="button" class="btn btn-sm btn-outline-primary" wire:click="addFaq">
                            <i class="ti ti-plus"></i> Add FAQ
                        </button>
                    </div>

                    @foreach($faqs as $index => $faq)
                    <div class="card mb-3" wire:key="faq-{{ $index }}">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title mb-0">FAQ #{{ $index + 1 }}</h5>
                                @if(count($faqs) > 1)
                                <button type="button" class="btn btn-sm btn-outline-danger" wire:click="removeFaq({{ $index }})">
                                    <i class="ti ti-x"></i> Remove
                                </button>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label class="form-label">Question</label>
                                    <input type="text" class="form-control" wire:model="faqs.{{ $index }}.question" placeholder="Enter question...">
                                    @error("faqs.{$index}.question") <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Answer</label>
                                    <textarea class="form-control" rows="3" wire:model="faqs.{{ $index }}.answer" placeholder="Enter answer..."></textarea>
                                    @error("faqs.{$index}.answer") <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="ti ti-check"></i> Update Translation
                </button>
            </form>
        </div>
    </div>
</div>
