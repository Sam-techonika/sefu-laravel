<div>
     <main>
        <!--page-title-area start-->
        <section class="page-title-area before-overlay pb-75 pt-240 pt-md-200 pt-xs-150">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-7">
                        <div class="page-title-wrapper page-title-2">
                            <h1 class="page-title mb-35"><span class="round-line">{{ $title }}</span></h1>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-5">
                        <div class="page-title-wrapper pl-80 pl-lg-0 pl-md-0 pl-xs-0">
                           <h4 class="sub-title mb-35">{{ $description }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--page-title-area end-->
        
        <!--case-details-area start-->
        <section class="case-details-area pb-50 pb-md-20 pt-xs-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        @if($goals)
                        <div class="case-single mb-50">
                            <h3 class="case-title mb-20">{{ __('caseStudy.goals') }}</h3>
                            <div class="sub-title">{!! $goals !!}</div>
                        </div>
                        @endif

                        @if($challenges)
                        <div class="case-single mb-50">
                            <h3 class="case-title mb-20">{{ __('caseStudy.challenges') }}</h3>
                            <div class="sub-title">{!! $challenges !!}</div>
                        </div>
                        @endif

                        @if(!empty($results) && is_array($results))
                        <div class="case-single mb-65">
                            <h3 class="case-title mb-20">{{ __('caseStudy.our_results') }}</h3>
                            @foreach($results as $result)
                                @if(isset($result['section']) && !empty($result['section']))
                                    <h5 class="sub-title mb-20">{{ $result['section'] }}</h5>
                                @endif
                                @if(isset($result['points']) && is_array($result['points']) && !empty($result['points']))
                                    <ul class="chose-text-list case-list mb-40">
                                        @foreach($result['points'] as $point)
                                            @if(!empty($point))
                                                <li>{{ $point }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endif
                            @endforeach
                        </div>
                        @endif

                        @if($image)
                        <div class="case-single case-box mb-50">
                        </div>
                        @endif
                    </div>
                    <div class="col-lg-4">
                        <ul class="case-info pl-45 pl-xs-0">
                            @if($publishDate)
                            <li>
                                <span>{{ __('caseStudy.date') }}</span>
                                <h5>{{ $publishDate }}</h5>
                            </li>
                            @endif
                            @if($clientName)
                            <li>
                                <span>{{ __('caseStudy.client_name') }}</span>
                                <h5>{{ $clientName }}</h5>
                            </li>
                            @endif
                            @if($projectName)
                            <li>
                                <span>{{ __('caseStudy.project_type') }}</span>
                                <h5>{{ $projectName }}</h5>
                            </li>
                            @endif
                            @if($categoryName)
                            <li>
                                <span>{{ __('caseStudy.category') }}</span>
                                <h5>{{ $categoryName }}</h5>
                            </li>
                            @endif
                            <li>
                                <span>{{ __('caseStudy.share') }}</span>
                                <div class="footer-social">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($title) }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}&title={{ urlencode($title) }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section>
        <!--case-details-area end-->
        
        <!--subscribe-letter-area start-->
        <section class="subscribe-letter-area pt-50 pb-115">
            <div class="container">
                <div class="subs-letter-bg grey-bg-soft pt-65 pb-55">
                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                            <div class="subscribe-wrapper">
                                <div class="section-title text-center">
                                    <h3 class="mb-25">{{ __('caseStudy.cta_title') }}</h3>
                                    <h4 class="sub-title mb-50">{{ __('caseStudy.cta_subtitle') }}</h4>
                                    <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" class="theme_btn sub-btn">{{ __('caseStudy.cta_button') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
     
    </main>
</div>
