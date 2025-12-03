<div>
      <main>
        <!--page-title-area start-->
        <section class="page-title-area fix pb-75 pt-240 pt-md-200 pt-xs-150">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="page-title-wrapper page-title-blog">
                            <h1 class="page-title mb-35"><span class="round-line">Find</span> answers here.</h1>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="page-title-wrapper pl-45 pl-lg-0 pl-md-0 pl-xs-0">
                           <h4 class="sub-title mb-35">Excepteur sint occaecat cupidat non sunt in culpa qui officia desrunt molli test laborum.</h4>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="widget-search-content faq-que-search mt-20">
                            <form class="subscribe-form" wire:submit.prevent="search">
                                <input type="text" placeholder="Search here..." wire:model.debounce.live.500ms="searchQuery">
                                <button type="submit" class="search-icon"><i class="far fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--page-title-area end-->
        <!--faq-area start-->
        <section class="faq-area grey-bg-soft pt-100 pb-100 pt-md-95 pt-xs-95">
            <div class="container">
                <div class="row">
                    @if($faqs && $faqs->count() > 0)
                        @php
                            $half = ceil($faqs->count() / 2);
                            $firstHalf = $faqs->take($half);
                            $secondHalf = $faqs->skip($half);
                        @endphp
                        
                        <!-- First Column -->
                        <div class="col-lg-6">
                            <div class="faq-que faq-que-details mb-30">
                                <div id="accordion">
                                    @foreach($firstHalf as $index => $faq)
                                        <div class="card">
                                            <div class="card-header" id="heading{{ $index + 1 }}">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link {{ $index == 0 ? '' : 'collapsed' }}" data-toggle="collapse" data-target="#collapse{{ $index + 1 }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index + 1 }}">
                                                        {{ $faq->question }}
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapse{{ $index + 1 }}" class="collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index + 1 }}" data-parent="#accordion">
                                                <div class="card-body">
                                                    {{ $faq->answer }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        
                        <!-- Second Column -->
                        <div class="col-lg-6">
                            <div class="faq-que faq-que-details mb-30">
                                <div id="accordion2">
                                    @foreach($secondHalf as $index => $faq)
                                        @php $realIndex = $index + $half + 1; @endphp
                                        <div class="card">
                                            <div class="card-header" id="heading{{ $realIndex }}">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link {{ $index == 0 ? '' : 'collapsed' }}" data-toggle="collapse" data-target="#collapse{{ $realIndex }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $realIndex }}">
                                                        {{ $faq->question }}
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapse{{ $realIndex }}" class="collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $realIndex }}" data-parent="#accordion2">
                                                <div class="card-body">
                                                    {{ $faq->answer }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-12">
                            <div class="text-center">
                                <h3>{{ $searchQuery ? 'No FAQs found matching your search.' : 'No FAQs available at the moment.' }}</h3>
                                @if($searchQuery)
                                    <button wire:click="$set('searchQuery', '')" class="theme_btn mt-3">Clear Search</button>
                                @endif
                            </div>
                        </div>
                    @endif
                    
                    <div class="col-lg-12">
                        <div class="get-answer text-center mt-50">
                            <h3>Don't find your answer?</h3>
                            <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" class="theme_btn faq-btn">{{ __('button.contact_us') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--faq-area end-->
        
       
    </main>
</div>