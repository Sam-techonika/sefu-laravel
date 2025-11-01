<div class="page-wrapper">
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Service Translations - ID: {{ $serviceId }}
                    </h2>
                    <div class="text-muted mt-1">Manage service content in different languages</div>
                </div>
                <div class="col-auto ms-auto">
                    <div class="btn-list">
                        <a href="{{ route('admin.services') }}" class="btn btn-outline-primary">
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
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                                    <rect x="9" y="3" width="6" height="4" rx="2" />
                                    <path d="M9 12l2 2l4 -4" />
                                </svg>
                                Service Translations
                            </h3>
                            &nbsp;<div class="card-subtitle">{{ $serviceTranslations->count() }} of {{ $this->getTotalLocalesCount() }} language(s) available</div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-vcenter">
                                    <thead>
                                        <tr>
                                            <th>Language</th>
                                            <th>Status</th>
                                            <th>Title</th>
                                            <th>Content</th>
                                            <th>Last Updated</th>
                                            <th class="w-1">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($this->getLocales() as $localeEnum)
                                        @php 
                                            $locale = $localeEnum->value;
                                            $translation = $serviceTranslations->get($locale); 
                                        @endphp
                                        @if($translation)
                                        <tr>
                                            <td>
                                                <span class="flag flag-{{ $this->getLocaleFlagCode($locale) }} flag-sm me-2"></span>
                                                {{ $this->getLocaleDisplayName($locale) }}
                                            </td>
                                            <td>
                                                <span class="badge bg-success-lt text-white">Available</span>
                                            </td>
                                            <td>{{ Str::limit($translation->title, 30) }}</td>
                                            <td>
                                                <div class="d-flex gap-1">
                                                    @if($translation->subtitle)<span class="badge bg-success-lt text-white badge-sm" title="Subtitle">ST</span>@endif
                                                    @if($translation->description)<span class="badge bg-success-lt text-white badge-sm" title="Description">DS</span>@endif
                                                    @if($translation->overview)<span class="badge bg-success-lt text-white badge-sm" title="Overview">OV</span>@endif
                                                    @if($translation->how_it_works)<span class="badge bg-success-lt text-white badge-sm" title="How It Works">HW</span>@endif
                                                    @if($translation->deliverables)<span class="badge bg-success-lt text-white badge-sm" title="Deliverables">DL</span>@endif
                                                    @if($translation->faqs)<span class="badge bg-success-lt text-white badge-sm" title="FAQs">FAQ</span>@endif
                                                    @if(!$translation->subtitle && !$translation->description && !$translation->overview && !$translation->how_it_works && !$translation->deliverables && !$translation->faqs)
                                                        <span class="text-muted">No content sections</span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>{{ $translation->updated_at->diffForHumans() }}</td>
                                            <td>
                                                <div class="btn-list flex-nowrap">
                                                    <a href="{{ route('admin.service.edit', ['id' => $serviceId, 'locale' => $locale]) }}" class="btn btn-sm btn-primary">Edit</a>
                                                </div>
                                            </td>
                                        </tr>
                                        @else
                                        <tr>
                                            <td>
                                                <span class="flag flag-{{ $this->getLocaleFlagCode($locale) }} flag-sm me-2"></span>
                                                {{ $this->getLocaleDisplayName($locale) }}
                                            </td>
                                            <td>
                                                <span class="badge bg-warning">Missing</span>
                                            </td>
                                            <td class="text-muted">-</td>
                                            <td class="text-muted">-</td>
                                            <td class="text-muted">-</td>
                                            <td>
                                                <div class="btn-list flex-nowrap">
                                                    <a href="{{ route('admin.service.add', $serviceId) }}?locale={{ $locale }}" class="btn btn-sm btn-outline-primary">Add</a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if($serviceTranslations->count() === 0)
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body text-center py-5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-lg text-muted mb-3" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 7a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v10a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-10z" />
                                <path d="M12 7v10" />
                                <path d="M9 7h6" />
                                <path d="M9 17h6" />
                            </svg>
                            <h3 class="text-muted mb-3">No Translations Available</h3>
                            <p class="text-muted mb-4">This service doesn't have any translations yet. Start by adding content in your preferred language.</p>
                            <a href="{{route('admin.service.add', $serviceId)}}" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="12" y1="5" x2="12" y2="19" />
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                </svg>
                                Add First Translation
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="row mt-3">
                <div class="col-12">
                    <div class="alert alert-info">
                        <div class="d-flex">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="12" cy="12" r="9" />
                                    <line x1="12" y1="8" x2="12.01" y2="8" />
                                    <polyline points="11,12 12,12 12,16 13,16" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="alert-title">Content Badges</h4>
                                <div class="text-muted">
                                    <strong>ST:</strong> Subtitle &nbsp;|&nbsp; 
                                    <strong>DS:</strong> Description &nbsp;|&nbsp; 
                                    <strong>OV:</strong> Overview &nbsp;|&nbsp; 
                                    <strong>HW:</strong> How It Works &nbsp;|&nbsp; 
                                    <strong>DL:</strong> Deliverables &nbsp;|&nbsp; 
                                    <strong>FAQ:</strong> Frequently Asked Questions
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
