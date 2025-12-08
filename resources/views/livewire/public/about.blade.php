    <div>
        <section class="page-title-area page-t-height" data-bg="{{ asset('assets/img/about/slider1.jpg') }}" style="color: #f5f5f5;">
            <div class="page-title-img about-page-title" data-bg="{{ asset('assets/img/page-title/p-bg1.jpg') }}">
                <h1 class="title-text d-none d-lg-inline-block">{{ __('about.page_title') }}</h1>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-12 pad-bottom-sm">
                        <div class="page-title-wrapper page-wrapper-white pt-240 pr-50 pt-md-200 pt-xs-150 pr-xs-0">
                            <h1 class="page-title mb-35"><span class="round-line"> {{ __('about.title_main') }}</span></h1>
                            <h4 class="sub-title mb-35">{{ __('about.title_subtitle_1') }}</h4>
                            <h4 class="sub-title mb-55 mb-xs-25">{{ __('about.title_subtitle_2') }}</h4>
                            <h5 class="mb-15">{{ __('about.title_author') }} <span>{{ __('about.title_author_role') }}</span></h5>
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="page-style-text d-none">{{ __('about.page_title') }}</h1>
        </section>

        <!--page-title-area end-->

        <!--what-we-do-area start-->
        <section class="what-we-do-area pt-180 pb-85 pt-md-120 pb-md-75 pt-xs-120 pb-xs-75">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="do-box active skew-bg mb-30">
                            <div class="icon mb-50">
                                <img src="{{ asset('assets/img/icon/icon3.svg') }}" alt="">
                            </div>
                            <h5>{{ __('about.expert_led_title') }}</h5>
                            <h3>{{ __('about.expert_led_description') }}</h3>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="do-box skew-bg mb-30">
                            <div class="icon mb-50">
                                <img src="{{ asset('assets/img/icon/icon2.svg') }}" alt="">
                            </div>
                            <h5>{{ __('about.quick_hassle_title') }}</h5>
                            <h3>{{ __('about.quick_hassle_description') }}</h3>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="do-box skew-bg mb-30">
                            <div class="icon mb-50">
                                <img src="{{ asset('assets/img/icon/icon4.svg') }}" alt="">
                            </div>
                            <h5>{{ __('about.trusted_title') }}</h5>
                            <h3>{{ __('about.trusted_description') }}</h3>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section>
        <!--what-we-do-area end-->
        <!--about-us-area start-->
        <section class="about-us-area pos-rel about-style-1 pt-50 pb-75 pt-md-10 pb-md-40 pt-xs-10 pb-xs-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="do-wrapper mb-30">
                            <div class="section-title">
                                <h3 class="mb-25"><span class="round-line">{{ __('about.businesses_served') }}</span></h3>
                                <h4 class="sub-title">{{ __('about.businesses_served_subtitle') }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-single-box mb-100">
                            <h5>{{ __('about.who_we_are') }}</h5>
                            <h4 class="sub-title">{{ __('about.who_we_are_description') }}</h4>
                        </div>

                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section>

        <section class="why-chose-us-area pt-65 pb-115 pb-lg-15 pt-md-45 pb-md-20 pt-xs-45 pb-xs-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="chose-title-wrapper mb-30 pr-40 pr-lg-0 pr-md-0 pr-xs-0">
                            <div class="section-title">
                                <h3 class="mb-40">{{ __('about.why_best_title') }}</h3>
                                <h5 class="sub-title">{{ __('about.why_best_description') }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="chose-text-list pl-65 pl-lg-0 pl-md-0 pl-xs-0">
                            <li>{{ __('about.why_list_1') }}</li>
                            <li>{{ __('about.why_list_2') }}</li>
                            <li>{{ __('about.why_list_3') }}</li>
                            <li>{{ __('about.why_list_4') }}</li>
                            <li>{{ __('about.why_list_5') }}</li>
                        </ul>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section>
        @php
        $commitmentImage = asset('assets/img/about/commitment.jpg');
        @endphp

        <section
            class="plan-coverage-area pos-rel about-style-1 pt-90 pb-95 pt-lg-50 pt-md-10 pb-md-30 pt-xs-10 pb-xs-30">
            <div class="about-img-wrapper" data-bg="{{ $commitmentImage }}">
                <h1 class="title-text">{{ __('about.commitment') }}</h1>
                <div class="authors-quote">
                    <div class="a-icon">
                        <img src="{{ asset('assets/img/icon/icon20.svg') }}" alt="">
                    </div>
                    <h5>{{ __('about.commitment_author') }} <span>{{ __('about.commitment_author_role') }}</span></h5>
                    <h5 class="a-text">{{ __('about.commitment_quote') }}</h5>
                </div>
            </div>

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 offset-lg-6">
                        <div class="plan-title-wrapper mb-30 pl-95 pl-lg-0 pl-md-0 pl-xs-0">
                            <div class="section-title mb-55">
                                <h3 class="mb-45">{{ __('about.expertise_title') }}</h3>
                                <h4 class="sub-title">
                                    {{ __('about.expertise_description') }}
                                </h4>
                            </div>
                            <ul class="chose-text-list plan-list">
                                <li>{{ __('about.expertise_1') }}</li>
                                <li>{{ __('about.expertise_2') }}</li>
                                <li>{{ __('about.expertise_3') }}</li>
                                <li>{{ __('about.expertise_4') }}</li>
                                <li>{{ __('about.expertise_5') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script>
            document.addEventListener('livewire:navigated', function() {
                document.querySelectorAll('[data-bg]').forEach(function(el) {
                    var url = el.getAttribute('data-bg');
                    if (url) {
                        el.style.backgroundImage = 'url(' + url + ')';
                        el.style.backgroundSize = 'cover';
                        el.style.backgroundPosition = 'center';
                        el.style.backgroundRepeat = 'no-repeat';
                    }
                });
            });
        </script>




        <!--client-feedback-area end-->
        <!--subscribe-letter-area start-->
        <section class="subscribe-letter-area pt-50 pb-115 pt-xs-115">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="subscribe-wrapper">
                            <div class="section-title text-center">
                                <h3 class="mb-25">{{ __('about.cta_title') }}</h3>
                                <h4 class="sub-title mb-50">{{ __('about.cta_description') }}</h4>
                                <a href="{{ route('contact',['locale' => app()->getLocale()]) }}" class="theme_btn sub-btn">{{ __('about.cta_button') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>