<div>
    <main>
        <!--slider-area start-->
        <section class="slider-area slider-bg pos-rel" wire:ignore>
            <div class="slider-active">
                <div class="single-slider slider-height-2 pos-rel pt-275 pb-190 pt-md-200 pt-xs-50 pb-md-50 pb-xs-50">
                    <div class="slider__img-two d-none d-lg-block" style="background: url({{ asset('assets/img/registrations/slider4.png') }});">
                        <div class="slider-card">
                            <div class="icon">
                                <img src="{{ asset('assets/img/icon/icon16.svg') }}" alt="">
                            </div>
                            <p>Quick, easy and hassle free</p>
                        </div>
                        <div class="slider-card card-2">
                            <div class="icon">
                                <img src="{{ asset('assets/img/icon/icon16.svg') }}" alt="">
                            </div>
                            <div class="slider-text">
                                <h5>Save up to 50% in our all policy.</h5>
                                <span>Learn MORE</span>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-lg-8">
                                <div class="slider__content slider__content-2 text-left">
                                    <h1 class="main-title mb-35" data-animation="fadeInUp2" data-delay=".2s">Expand Into <span style="color:#ff1f1f">india </span> With Confidence</h1>
                                    <h3>Led by experienced Company Secretaries and FEMA experts who make foreign company setup, RBI filings, and compliance completely seamless.</h3>
                                    <ul class="input-box mt-70">
                                        <li>
                                            <form class="hero-form">
                                                <label>{{ __('foriegn.slider.email_label') }}</label>
                                                <input type="email" name="email" placeholder="{{setting('contact_email','prashant@prathamlegal.com')}}">
                                            </form>
                                        </li>
                                        <li>
                                            <a href="{{setting('whatsapp_url', '')}}" class="theme_btn quote-btn theme_btn2 "><i class="fab fa-whatsapp" style="font-size:18px;"></i> {{ __('foriegn.slider.contact_us') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- .col/ -->
                        </div><!-- .row/ -->
                    </div><!-- .container/ -->
                </div>
                <div class="single-slider slider-height-2 pos-rel pt-275 pb-190 pt-md-200 pt-xs-50 pb-md-50 pb-xs-50">
                    <div class="slider__img-two d-none d-lg-block" style="background: url({{ asset('assets/img/registrations/slider3.png') }});">
                        <div class="slider-card">
                            <div class="icon">
                                <img src="{{ asset('assets/img/icon/icon16.svg') }}" alt="">
                            </div>
                            <p>{{ __('foriegn.slider.quick_easy') }}</p>
                        </div>
                        <div class="slider-card card-2">
                            <div class="icon">
                                <img src="{{ asset('assets/img/icon/icon16.svg') }}" alt="">
                            </div>
                            <div class="slider-text">
                                <h5>{{ __('foriegn.slider.save_policy') }}</h5>
                                <span>{{ __('foriegn.slider.learn_more') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-lg-8">
                                <div class="slider__content slider__content-2 text-left">
                                    <h1 class="main-title mb-35" data-animation="fadeInUp2" data-delay=".2s">{!! __('foriegn.slider.main_title_html') !!}</h1>
                                    <h3>{{ __('foriegn.slider.subtitle') }}</h3>
                                    <ul class="input-box mt-70">
                                        <li>
                                            <form class="hero-form">
                                                <label>{{ __('foriegn.slider.email_label') }}</label>
                                                <input type="email" name="email" placeholder="{{setting('contact_email','prashant@prathamlegal.com')}}">
                                            </form>
                                        </li>
                                        <li>
                                            <a href="{{setting('whatsapp_url', 'no number found')}}" class="theme_btn quote-btn theme_btn2 "><i class="fab fa-whatsapp" style="font-size:18px;"></i> {{ __('foriegn.slider.contact_us') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--slider-area end-->

          <section class="what-we-do-area pt-100 pb-100 pb-md-20 pt-md-60 pt-xs-60 pb-xs-20">
            <div class="container">
                <div class="row mb-85">
                    <div class="col-lg-6">
                        <div class="do-wrapper mb-30">
                            <div class="section-title section-title-3 text-center text-md-left">
                                <h3>{{ __('foriegn.what_we_do.trusted_users') }} <span class="highlight-text">{{ __('foriegn.what_we_do.love_us') }}</span></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 text-center text-md-left">
                        <div class="what-text pt-10 pl-155 pl-lg-0 pl-md-0 pl-xs-0">
                            <h3>{{ __('foriegn.what_we_do.helping_text') }}</h3>
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-6 wow fadeInUp2 animated" data-wow-delay="0.1s">
                        <div class="do-box do-box-2 active mb-30">
                            <div class="icon mb-25">
                                <img src="{{asset('assets/img/icon/icon17.svg')}}" alt="">
                            </div>
                            <h5>{{ __('foriegn.what_we_do.expert_led.title') }}</h5>
                            <h3>{{ __('foriegn.what_we_do.expert_led.description') }}</h3>
                            <a class="more-btn" href="{{route('contact',['locale' => app()->getLocale()])}}">{{ __('foriegn.what_we_do.expert_led.link') }}</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp2 animated" data-wow-delay="0.3s">
                        <div class="do-box do-box-2 mb-30">
                            <div class="icon mb-25">
                                <img src="{{asset('assets/img/icon/icon18.svg')}}" alt="">
                            </div>
                            <h5>{{ __('foriegn.what_we_do.transparent_pricing.title') }}</h5>
                            <h3>{{ __('foriegn.what_we_do.transparent_pricing.description') }}</h3>
                            <a class="more-btn" href="{{route('contact',['locale' => app()->getLocale()])}}">{{ __('foriegn.what_we_do.transparent_pricing.link') }}</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp2 animated" data-wow-delay="0.5s">
                        <div class="do-box do-box-2 mb-30">
                            <div class="icon mb-25">
                                <img src="{{asset('assets/img/icon/icon19.svg')}}" alt="">
                            </div>
                            <h5>{{ __('foriegn.what_we_do.regulatory_support.title') }}</h5>
                            <h3>{{ __('foriegn.what_we_do.regulatory_support.description') }}</h3>
                            <a class="more-btn" href="{{route('contact',['locale' => app()->getLocale()])}}">{{ __('foriegn.what_we_do.regulatory_support.link') }}</a>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section>

        <!-- Pricing Comparison Section -->
        <section class="pricing-comparison-section py-5" x-data="{ showComparison: false }">
            <div class="container">
                {{-- Section Header --}}
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-10 text-center">
                        <h2 class="section-title mb-3">{{ __('foriegn.pricing.section_title') }}</h2>
                        <p class="section-subtitle">{{ __('foriegn.pricing.section_subtitle') }}</p>
                    </div>
                </div>

                {{-- Pricing Cards --}}
                <div class="row g-4 mb-5">
                    {{-- Starter Plan --}}
                    <div class="col-lg-4 col-md-6">
                        <div class="pricing-card">
                            <div class="card-header">
                                <h3 class="plan-name">{{ __('foriegn.pricing.starter.name') }}</h3>
                                <p class="plan-tagline">{{ __('foriegn.pricing.starter.tagline') }}</p>
                            </div>

                            <div class="card-pricing">
                                <div class="price-amount">{{ __('foriegn.pricing.starter.price') }}</div>
                                <div class="price-note">{{ __('foriegn.pricing.starter.price_note') }}</div>
                            </div>

                            <button class="btn-cta btn-outline" wire:click="selectPlan('Starter Plan')">
                                {{ __('foriegn.pricing.starter.btn_text') }}
                            </button>

                            <div class="card-features">
                                <p class="features-title">{{ __('foriegn.pricing.starter.features_title') }}</p>
                                <ul class="features-list">
                                    @foreach(__('foriegn.pricing.starter.features') as $feature)
                                    <li>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M13.3337 4L6.00033 11.3333L2.66699 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        {{ $feature }}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- Compliance Plan (Featured) --}}
                    <div class="col-lg-4 col-md-6">
                        <div class="pricing-card featured">
                            <div class="popular-badge">{{ __('foriegn.pricing.compliance.badge') }}</div>

                            <div class="card-header">
                                <h3 class="plan-name">{{ __('foriegn.pricing.compliance.name') }}</h3>
                                <p class="plan-tagline">{{ __('foriegn.pricing.compliance.tagline') }}</p>
                            </div>

                            <div class="card-pricing">
                                <div class="price-amount">{{ __('foriegn.pricing.compliance.price') }}</div>
                                <div class="price-note">{{ __('foriegn.pricing.compliance.price_note') }}</div>
                            </div>

                            <button class="btn-cta btn-primary" wire:click="selectPlan('Compliance Plan')">
                                {{ __('foriegn.pricing.compliance.btn_text') }}
                            </button>

                            <div class="card-features">
                                <p class="features-title">{{ __('foriegn.pricing.compliance.features_title') }}</p>
                                <ul class="features-list">
                                    @foreach(__('foriegn.pricing.compliance.features') as $feature)
                                    <li>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M13.3337 4L6.00033 11.3333L2.66699 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        {{ $feature }}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- Complete Setup Plan --}}
                    <div class="col-lg-4 col-md-6">
                        <div class="pricing-card">
                            <div class="card-header">
                                <h3 class="plan-name">{{ __('foriegn.pricing.complete.name') }}</h3>
                                <p class="plan-tagline">{{ __('foriegn.pricing.complete.tagline') }}</p>
                            </div>

                            <div class="card-pricing">
                                <div class="price-amount">{{ __('foriegn.pricing.complete.price') }}</div>
                                <div class="price-note">{{ __('foriegn.pricing.complete.price_note') }}</div>
                            </div>

                            <button class="btn-cta btn-outline" wire:click="selectPlan('Complete Setup Plan')">
                                {{ __('foriegn.pricing.complete.btn_text') }}
                            </button>

                            <div class="card-features">
                                <p class="features-title">{{ __('foriegn.pricing.complete.features_title') }}</p>
                                <ul class="features-list">
                                    @foreach(__('foriegn.pricing.complete.features') as $feature)
                                    <li>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M13.3337 4L6.00033 11.3333L2.66699 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        {{ $feature }}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Comparison Link --}}
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <a @click.prevent="showComparison = !showComparison" class="compare-link" style="cursor: pointer;">
                            <span x-show="!showComparison">{{ __('foriegn.pricing.compare_show') }}</span>
                            <span x-show="showComparison">{{ __('foriegn.pricing.compare_hide') }}</span>
                            <svg x-show="!showComparison" width="16" height="16" viewBox="0 0 16 16" fill="none" style="display: inline-block; margin-left: 4px;">
                                <path d="M4 6L8 10L12 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <svg x-show="showComparison" width="16" height="16" viewBox="0 0 16 16" fill="none" style="display: inline-block; margin-left: 4px;">
                                <path d="M12 10L8 6L4 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Comparison Table --}}
                <div class="row" id="comparison-table" x-show="showComparison" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" style="display: none;">
                    <div class="col-12">
                        <div class="comparison-table-wrapper">
                            {{-- Table Header --}}
                            <div class="comparison-header">
                                <div class="header-row">
                                    <div class="feature-column header-title">
                                        <a @click.prevent="showComparison = false" class="compare-features-link" style="cursor: pointer;">{{ __('foriegn.comparison_table.hide_comparison') }}</a>
                                    </div>
                                    {{-- Starter Plan Header --}}
                                    <div class="plan-column plan-header-box">
                                        <div class="plan-header-content">
                                            <h4 class="plan-name-header">{{ __('foriegn.pricing.starter.name') }}</h4>
                                            <div class="plan-price-header">{{ __('foriegn.pricing.starter.price') }}</div>
                                            <button class="btn-header-cta btn-default" wire:click="selectPlan('Starter Plan')">
                                                {{ __('foriegn.comparison_table.buy_now') }}
                                            </button>
                                        </div>
                                    </div>
                                    {{-- Compliance Plan Header (Featured) --}}
                                    <div class="plan-column plan-header-box featured-header">
                                        <div class="plan-header-content">
                                            <h4 class="plan-name-header">{{ __('foriegn.pricing.compliance.name') }}</h4>
                                            <div class="plan-price-header">{{ __('foriegn.pricing.compliance.price') }}</div>
                                            <button class="btn-header-cta btn-featured" wire:click="selectPlan('Compliance Plan')">
                                                {{ __('foriegn.comparison_table.buy_now') }}
                                            </button>
                                            <div class="checkmark-below">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                    <path d="M13.3337 4L6.00033 11.3333L2.66699 8" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Complete Setup Header --}}
                                    <div class="plan-column plan-header-box">
                                        <div class="plan-header-content">
                                            <h4 class="plan-name-header">{{ __('foriegn.pricing.complete.name') }}</h4>
                                            <div class="plan-price-header">{{ __('foriegn.pricing.complete.price') }}</div>
                                            <button class="btn-header-cta btn-default" wire:click="selectPlan('Complete Setup Plan')">
                                                {{ __('foriegn.comparison_table.buy_now') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Table Body --}}
                            <div class="comparison-body">
                                {{-- Incorporation Section --}}
                                <div class="category-section">
                                    <div class="category-header">
                                        <h5>{{ __('foriegn.comparison_table.incorporation_title') }}</h5>
                                    </div>

                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">{{ __('foriegn.comparison_table.features.company_incorporation') }}</span>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="plan-column featured">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">{{ __('foriegn.comparison_table.features.din_dsc') }}</span>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="plan-column featured">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">{{ __('foriegn.comparison_table.features.rbi_fema') }}</span>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="plan-column featured">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">{{ __('foriegn.comparison_table.features.foreign_investment') }}</span>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="plan-column featured">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">{{ __('foriegn.comparison_table.features.pan_tan') }}</span>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="plan-column featured">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">{{ __('foriegn.comparison_table.features.post_incorporation') }}</span>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="plan-column featured">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                {{-- Office & Director Support Section --}}
                                <div class="category-section">
                                    <div class="category-header">
                                        <h5>{{ __('foriegn.comparison_table.office_director_title') }}</h5>
                                    </div>

                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">{{ __('foriegn.comparison_table.features.office_6months') }}</span>
                                        </div>
                                        <div class="plan-column">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column featured">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="plan-column">
                                            <span class="no-feature">—</span>
                                        </div>
                                    </div>

                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">{{ __('foriegn.comparison_table.features.director_6months') }}</span>
                                        </div>
                                        <div class="plan-column">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column featured">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="plan-column">
                                            <span class="no-feature">—</span>
                                        </div>
                                    </div>

                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">{{ __('foriegn.comparison_table.features.office_1year') }}</span>
                                        </div>
                                        <div class="plan-column">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column featured">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">{{ __('foriegn.comparison_table.features.director_1year') }}</span>
                                        </div>
                                        <div class="plan-column">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column featured">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                {{-- Compliance & Registrations Section --}}
                                <div class="category-section">
                                    <div class="category-header">
                                        <h5>{{ __('foriegn.comparison_table.compliance_title') }}</h5>
                                    </div>

                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">{{ __('foriegn.comparison_table.features.gst_registration') }}</span>
                                        </div>
                                        <div class="plan-column">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column featured">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">{{ __('foriegn.comparison_table.features.bank_account') }}</span>
                                        </div>
                                        <div class="plan-column">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column featured">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">{{ __('foriegn.comparison_table.features.cs_compliance') }}</span>
                                        </div>
                                        <div class="plan-column">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column featured">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">{{ __('foriegn.comparison_table.features.annual_roc') }}</span>
                                        </div>
                                        <div class="plan-column">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column featured">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">{{ __('foriegn.comparison_table.features.rbi_annual') }}</span>
                                        </div>
                                        <div class="plan-column">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column featured">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">{{ __('foriegn.comparison_table.features.compliance_calendar') }}</span>
                                        </div>
                                        <div class="plan-column">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column featured">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">{{ __('foriegn.comparison_table.features.30min_consultation') }}</span>
                                        </div>
                                        <div class="plan-column">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column featured">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">{{ __('foriegn.comparison_table.features.fema_advisory') }}</span>
                                        </div>
                                        <div class="plan-column">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column featured">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                {{-- Support Section --}}
                                <div class="category-section">
                                    <div class="category-header">
                                        <h5>{{ __('foriegn.comparison_table.support_title') }}</h5>
                                    </div>

                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">{{ __('foriegn.comparison_table.features.email_phone_support') }}</span>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="plan-column featured">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Footer --}}
                            <div class="comparison-footer">
                                <div class="footer-row">
                                    <div class="feature-column">
                                        <div class="help-section">
                                            <strong>{{ __('foriegn.comparison_table.footer_help') }}</strong>
                                            <p>{{ __('foriegn.comparison_table.footer_subtitle') }}</p>
                                        </div>
                                    </div>
                                    <div class="plan-column"></div>
                                    <div class="plan-column"></div>
                                    <div class="plan-column"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="quick-summary-area pt-60 pb-60">
            <div class="container">
                <div class="row justify-content-center mb-4">
                    <div class="col-lg-8 text-center">
                        <h2 class="summary-main-title">{{ __('foriegn.quick_summary.title') }}</h2>
                        <p class="summary-subtitle">{{ __('foriegn.quick_summary.subtitle') }}</p>
                    </div>
                </div>
                <div class="row g-4">
                    {{-- Starter Plan Summary --}}
                    <div class="col-lg-4 col-md-6">
                        <div class="summary-plan-card">
                            <div class="plan-icon-wrapper starter-icon">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" />
                                </svg>
                            </div>
                            <h3 class="summary-plan-name">{{ __('foriegn.pricing.starter.name') }}</h3>
                            <div class="summary-plan-price">{{ __('foriegn.pricing.starter.price') }}</div>
                            <p class="summary-plan-desc">{{ __('foriegn.quick_summary.starter_desc') }}</p>
                            <div class="summary-plan-highlights">
                                @foreach(__('foriegn.quick_summary_highlights.starter') as $highlight)
                                <div class="highlight-item">
                                    <span class="highlight-icon">✓</span>
                                    <span>{{ $highlight }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- Compliance Plan Summary --}}
                    <div class="col-lg-4 col-md-6">
                        <div class="summary-plan-card featured-summary">
                            <div class="popular-badge-summary">{{ __('foriegn.pricing.most_popular') }}</div>
                            <div class="plan-icon-wrapper compliance-icon">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                </svg>
                            </div>
                            <h3 class="summary-plan-name">{{ __('foriegn.pricing.compliance.name') }}</h3>
                            <div class="summary-plan-price">{{ __('foriegn.pricing.compliance.price') }}</div>
                            <p class="summary-plan-desc">{{ __('foriegn.quick_summary.compliance_desc') }}</p>
                            <div class="summary-plan-highlights">
                                @foreach(__('foriegn.quick_summary_highlights.compliance') as $highlight)
                                <div class="highlight-item">
                                    <span class="highlight-icon">✓</span>
                                    <span>{{ $highlight }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- Complete Setup Plan Summary --}}
                    <div class="col-lg-4 col-md-6">
                        <div class="summary-plan-card">
                            <div class="plan-icon-wrapper complete-icon">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                    <polyline points="22 4 12 14.01 9 11.01" />
                                </svg>
                            </div>
                            <h3 class="summary-plan-name">{{ __('foriegn.pricing.complete.name') }}</h3>
                            <div class="summary-plan-price">{{ __('foriegn.pricing.complete.price') }}</div>
                            <p class="summary-plan-desc">{{ __('foriegn.quick_summary.complete_desc') }}</p>
                            <div class="summary-plan-highlights">
                                @foreach(__('foriegn.quick_summary_highlights.complete') as $highlight)
                                <div class="highlight-item">
                                    <span class="highlight-icon">✓</span>
                                    <span>{{ $highlight }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="plan-area pb-70 pt-100" style="display: none;">
            <div class="container">

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row no-gutters">
                            <div class="col-lg-4 col-md-6 mt-50 mt-md-0 mt-xs-0">
                                <div class="plan mb-30">
                                    <span class="plan-tag">Starter Plan</span>
                                    <div class="plan__header text-center pb-45 mb-50">
                                        <h4 class="sub-title">Incorporate your Indian Subsidiary or Company with all mandatory compliances. </h4>
                                        </h4>
                                        <h1 class="mb-35">₹24,999</sup></h1>
                                        <h5>Covers everything you need to establish a compliant presence in India:</h5>
                                    </div>
                                    <div class="plan__body">
                                        <ul class="chose-text-list pb-10 mb-30">
                                            <li>Company Incorporation (Wholly Owned Subsidiary / JV)</li>
                                            <li>DIN & DSC for Two Directors (including Non-Resident Director)</li>
                                            <li>Name Reservation (SPICe+ RUN Form)</li>
                                            <li>MOA, AOA & Incorporation Certificate (custom-drafted for foreign ownership)</li>
                                            <li>PAN, TAN & GST Application (mandatory for India entities)</li>
                                            <li>FEMA Advisory & Compliance Support (FDI structuring, share issue process)</li>
                                            <li>FC-GPR Filing & CS Certification (for foreign investment reporting)</li>
                                            <li>Post-Incorporation Documentation (Share Certificates, Registers & First Board Minutes)</li>
                                            <li>Assistance in Opening Foreign-Invested Bank Account (AD Bank coordination support)</li>
                                            <li>Dedicated CS Support (Call, WhatsApp & Email)</li>
                                        </ul>
                                    </div>
                                    <div class="plan__footer text-center">
                                        <a href="#" class="theme_btn border-btn mb-10">Start Registration →</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="plan plan-2 active mb-30">
                                    <span class="plan-tag">Complete Setup Plan</span>
                                    <div class="plan__header text-center pb-35 mb-60">
                                        <h4 class="sub-title">Go beyond incorporation ensure full FEMA and RBI compliance for foreign investment.

                                        </h4>
                                        <h1 class="mb-35">₹59,999</sup></h1>
                                        <h5>Everything in Starter, plus</h5>
                                    </div>
                                    <div class="plan__body">
                                        <ul class="chose-text-list pb-35 mb-30">
                                            <li>Registered Office Address (6 Months included — ₹5,000/month)</li>
                                            <li>Resident Director Facilitation (6 Months included — ₹15,000/month)</li>
                                            <li>RBI Filing under FIRMS Portal (FC-GPR, FC-TRS & related reporting)</li>
                                            <li>Foreign Remittance & FIRC Documentation Support (KYC, AD Bank coordination)</li>
                                            <li>Professional FEMA Consultation (Investment, capital infusion, and structuring)</li>
                                            <li>Basic Compliance Roadmap (Initial filings, statutory registers, and advisory notes)</li>

                                        </ul>
                                    </div>
                                    <div class="plan__footer text-center">
                                        <a href="#" class="theme_btn border-btn mb-10">Upgrade to Compliance →</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mt-50 mt-md-0 mt-xs-0">
                                <div class="plan mb-30">
                                    <span class="plan-tag">Compliance Plan</span>
                                    <div class="plan__header text-center pb-45 mb-50">
                                        <h4 class="sub-title">Comprehensive legal, regulatory, and compliance management for your Indian subsidiary.</h4>
                                        <h1 class="mb-35">₹149,999</h1>
                                        <h5>Everything in Compliance, plus</h5>
                                    </div>
                                    <div class="plan__body">
                                        <ul class="chose-text-list pb-10 mb-30">
                                            <li>Registered Office Address (1 Year included — ₹60,000 value)</li>
                                            <li>Resident Director Facilitation (1 Year included ₹1,80,000 value)</li>
                                            <li>FEMA & FDI Compliance Advisory (Continuous support and post-investment reporting)</li>
                                            <li>1-Year CS Compliance Package (Full secretarial management – ₹35,000 value)</li>
                                            <li>Annual ROC Filings (AOC-4, MGT-7A & Linked Forms under MCA V3)</li>
                                            <li>AGM & Board Meeting Documentation (Notices, Minutes, Registers, Director’s Report)</li>
                                            <li>1-Year Secretarial Record Maintenance (Registers, Share Certificates, Minutes Book)</li>
                                            <li>Trademark Filing (1 Class – Company Name or Logo)</li>
                                            <li>Startup India (DPIIT) Recognition Support (If eligible)</li>
                                        </ul>
                                    </div>
                                    <div class="plan__footer text-center">
                                        <a href="#" class="theme_btn border-btn mb-10">Get Complete Setup →</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="subscribe-letter-area pt-50 pb-115">
            <div class="container">
                <div class="subs-letter-bg grey-bg-soft pt-65 pb-55">
                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                            <div class="subscribe-wrapper">
                                <div class="section-title text-center">
                                    <h3 class="mb-25">{{ __('foriegn.help_section.title') }}</span></h3>
                                    <h4 class="sub-title mb-50">{{ __('foriegn.help_section.subtitle') }}</h4>
                                    <a href="{{route('contact',['locale' => app()->getLocale()])}}" class="theme_btn sub-btn">{{ __('foriegn.help_section.btn_text') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Old Comparison Table Section - Hidden -->
        <section class="comparison-area pt-30 pb-90" style="display: none;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title text-center mb-70">
                            <h3>Compare Our Plans</h3>
                            <p class="sub-title mt-30">Choose the perfect plan that fits your business needs</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="modern-comparison-wrapper">
                            <!-- Header with Plan Names and Prices -->
                            <div class="comparison-header">
                                <div class="comparison-row header-row">
                                    <div class="feature-col header-feature">
                                        <h4>Plan Features</h4>
                                    </div>
                                    <div class="plan-col">
                                        <div class="plan-header-content">
                                            <h4>Starter Plan</h4>
                                            <div class="price-tag">₹24,999</div>
                                            <p class="price-subtitle">(All Inclusive)</p>
                                            <!-- <small>₹6,500 Govt + ₹2,499 Professional</small> -->
                                            <button type="button" wire:click="selectPlan('Starter Plan')" class="get-started-btn">Get Started</button>
                                        </div>
                                    </div>
                                    <div class="plan-col featured-plan">
                                        <div class="plan-header-content">
                                            <h4>Compliance Plan</h4>
                                            <div class="price-tag">₹59,999 </div>
                                            <p class="price-subtitle">(All Inclusive)</p>
                                            <!-- <small>₹6,500 Govt + ₹6,499 Professional</small> -->
                                            <button type="button" wire:click="selectPlan('Compliance Plan')" class="get-started-btn">Get Started</button>
                                        </div>
                                    </div>
                                    <div class="plan-col">
                                        <div class="plan-header-content">
                                            <h4>Complete Setup Plan</h4>
                                            <div class="price-tag">₹149,999</div>
                                            <p class="price-subtitle">(All Inclusive)</p>
                                            <!-- <small>₹11,000 Govt + ₹13,999 Professional</small> -->
                                            <button type="button" wire:click="selectPlan('Complete Setup Plan')" class="get-started-btn">Get Started</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Collapsible Sections -->
                            <div class="comparison-body" x-data="{ 
                            incorporationOpen: true, 
                            complianceOpen: false, 
                            advisoryOpen: false,
                            femaOpen: false,
                            corporateOpen: false,
                            legalOpen: false
                        }" x-init="$wire.on('livewire:navigated', () => { incorporationOpen = true; complianceOpen = false; advisoryOpen = false; femaOpen = false; corporateOpen = false; legalOpen = false; })">

                                <!-- Incorporation Section -->
                                <div class="feature-section">
                                    <div class="section-header" @click="incorporationOpen = !incorporationOpen">
                                        <div class="section-title-content">
                                            <i class="fas fa-building"></i>
                                            <span>Incorporation & Registration</span>
                                        </div>
                                        <i class="fas fa-chevron-down toggle-icon" :class="{ 'rotate': incorporationOpen }"></i>
                                    </div>
                                    <div class="section-content" :class="{ 'open': incorporationOpen }">
                                        <div class="comparison-row">
                                            <div class="feature-col">
                                                <span class="feature-name">Company Incorporation (Subsidiary / JV / LLP)</span>
                                            </div>
                                            <div class="plan-col"><span class="icon-check">✓</span></div>
                                            <div class="plan-col featured"><span class="icon-check">✓</span></div>
                                            <div class="plan-col"><span class="icon-check">✓</span></div>
                                        </div>
                                        <div class="comparison-row">
                                            <div class="feature-col">
                                                <span class="feature-name">DIN & DSC for 2 Directors</span>
                                            </div>
                                            <div class="plan-col"><span class="icon-check">✓</span></div>
                                            <div class="plan-col featured"><span class="icon-check">✓</span></div>
                                            <div class="plan-col"><span class="icon-check">✓</span></div>
                                        </div>
                                        <div class="comparison-row">
                                            <div class="feature-col">
                                                <span class="feature-name">MOA, AOA & Incorporation Certificate</span>
                                            </div>
                                            <div class="plan-col"><span class="icon-check">✓</span></div>
                                            <div class="plan-col featured"><span class="icon-check">✓</span></div>
                                            <div class="plan-col"><span class="icon-check">✓</span></div>
                                        </div>
                                        <div class="comparison-row">
                                            <div class="feature-col">
                                                <span class="feature-name">PAN, TAN & GST Registration</span>
                                            </div>
                                            <div class="plan-col"><span class="icon-check">✓</span></div>
                                            <div class="plan-col featured"><span class="icon-check">✓</span></div>
                                            <div class="plan-col"><span class="icon-check">✓</span></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Compliance & Governance Section -->
                                <div class="feature-section">
                                    <div class="section-header" @click="complianceOpen = !complianceOpen">
                                        <div class="section-title-content">
                                            <i class="fas fa-clipboard-check"></i>
                                            <span>Registered Office & Resident Director</span>
                                        </div>
                                        <i class="fas fa-chevron-down toggle-icon" :class="{ 'rotate': complianceOpen }"></i>
                                    </div>
                                    <div class="section-content" :class="{ 'open': complianceOpen }">
                                        <div class="comparison-row">
                                            <div class="feature-col">
                                                <span class="feature-name">Registered Office Address Assistance</span>
                                            </div>
                                            <div class="plan-col"><span class="icon-cross">✕</span></div>
                                            <div class="plan-col featured"><span class="icon-check">✓</span><span>6 months</span></div>
                                            <div class="plan-col"><span class="icon-check">✓</span><span>6 months</span></div>
                                        </div>
                                        <div class="comparison-row">
                                            <div class="feature-col">
                                                <span class="feature-name">Resident Director Facilitation</span>
                                            </div>
                                            <div class="plan-col"><span class="icon-cross">✕</span></div>
                                            <div class="plan-col featured"><span class="icon-check">✓</span><span>6 months</span></div>
                                            <div class="plan-col"><span class="icon-check">✓</span><span>6 months</span></div>
                                        </div>

                                    </div>
                                </div>

                                <!-- Advisory & Support Section -->
                                <div class="feature-section">
                                    <div class="section-header" @click="femaOpen = !femaOpen">
                                        <div class="section-title-content">
                                            <i class="fas fa-globe-asia"></i>
                                            <span>FEMA / FDI Compliance</span>
                                        </div>
                                        <i class="fas fa-chevron-down toggle-icon" :class="{ 'rotate': femaOpen }"></i>
                                    </div>
                                    <div class="section-content" :class="{ 'open': femaOpen }">
                                        <div class="comparison-row">
                                            <div class="feature-col">
                                                <span class="feature-name">FEMA Advisory & Structuring</span>
                                            </div>
                                            <div class="plan-col"><span class="icon-check">✓</span></div>
                                            <div class="plan-col featured"><span class="icon-check">✓</span></div>
                                            <div class="plan-col"><span class="icon-check">✓</span></div>
                                        </div>
                                        <div class="comparison-row">
                                            <div class="feature-col">
                                                <span class="feature-name">FC-GPR Filing & CS Certification</span>
                                            </div>
                                            <div class="plan-col"><span class="icon-check">✓</span></div>
                                            <div class="plan-col featured"><span class="icon-check">✓</span></div>
                                            <div class="plan-col"><span class="icon-check">✓</span></div>
                                        </div>
                                        <div class="comparison-row">
                                            <div class="feature-col">
                                                <span class="feature-name">RBI Filings (FC-TRS / FIRC Support)</span>
                                            </div>
                                            <div class="plan-col"><span class="icon-check">✓</span></div>
                                            <div class="plan-col featured"><span class="icon-check">✓</span></div>
                                            <div class="plan-col"><span class="icon-check">✓</span></div>
                                        </div>
                                        <div class="comparison-row">
                                            <div class="feature-col">
                                                <span class="feature-name">Ongoing FEMA Reporting Support</span>
                                            </div>
                                            <div class="plan-col"><span class="icon-cross">✕</span></div>
                                            <div class="plan-col featured"><span class="icon-check">✓</span></div>
                                            <div class="plan-col"><span class="icon-check">✓</span></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="feature-section">
                                    <div class="section-header" @click="corporateOpen = !corporateOpen">
                                        <div class="section-title-content">
                                            <i class="fas fa-building"></i>
                                            <span>Corporate Compliance</span>
                                        </div>
                                        <i class="fas fa-chevron-down toggle-icon" :class="{ 'rotate': corporateOpen }"></i>
                                    </div>
                                    <div class="section-content" :class="{ 'open': corporateOpen }">
                                        <div class="comparison-row">
                                            <div class="feature-col">
                                                <span class="feature-name">1-Year CS Compliance Package</span>
                                            </div>
                                            <div class="plan-col"><span class="icon-cross">✕</span></div>
                                            <div class="plan-col featured"><span class="icon-cross">✕</span></div>
                                            <div class="plan-col"><span class="icon-check">✓</span></div>
                                        </div>
                                        <div class="comparison-row">
                                            <div class="feature-col">
                                                <span class="feature-name">Annual ROC Filings (AOC-4, MGT-7A)</span>
                                            </div>
                                            <div class="plan-col"><span class="icon-cross">✕</span></div>
                                            <div class="plan-col featured"><span class="icon-cross">✕</span></div>
                                            <div class="plan-col"><span class="icon-check">✓</span></div>
                                        </div>
                                        <div class="comparison-row">
                                            <div class="feature-col">
                                                <span class="feature-name">AGM & Board Meeting Documentation</span>
                                            </div>
                                            <div class="plan-col"><span class="icon-cross">✕</span></div>
                                            <div class="plan-col featured"><span class="icon-cross">✕</span></div>
                                            <div class="plan-col"><span class="icon-check">✓</span></div>
                                        </div>
                                        <div class="comparison-row">
                                            <div class="feature-col">
                                                <span class="feature-name">1-Year Secretarial Record Maintenance</span>
                                            </div>
                                            <div class="plan-col"><span class="icon-cross">✕</span></div>
                                            <div class="plan-col featured"><span class="icon-cross">✕</span></div>
                                            <div class="plan-col"><span class="icon-check">✓</span></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="feature-section">
                                    <div class="section-header" @click="legalOpen = !legalOpen">
                                        <div class="section-title-content">
                                            <i class="fas fa-balance-scale"></i>
                                            <span>Legal & Advisory Add-ons</span>
                                        </div>
                                        <i class="fas fa-chevron-down toggle-icon" :class="{ 'rotate': legalOpen }"></i>
                                    </div>
                                    <div class="section-content" :class="{ 'open': legalOpen }">
                                        <div class="comparison-row">
                                            <div class="feature-col">
                                                <span class="feature-name">Trademark Filing (1 Class – Name or Logo)</span>
                                            </div>
                                            <div class="plan-col"><span class="icon-cross">✕</span></div>
                                            <div class="plan-col featured"><span class="icon-cross">✕</span></div>
                                            <div class="plan-col"><span class="icon-check">✓</span></div>
                                        </div>
                                        <div class="comparison-row">
                                            <div class="feature-col">
                                                <span class="feature-name">Startup India Recognition (DPIIT)</span>
                                            </div>
                                            <div class="plan-col"><span class="icon-cross">✕</span></div>
                                            <div class="plan-col featured"><span class="icon-cross">✕</span></div>
                                            <div class="plan-col"><span class="icon-check">✓</span></div>
                                        </div>
                                        <div class="comparison-row">
                                            <div class="feature-col">
                                                <span class="feature-name">Professional FEMA Consultation</span>
                                            </div>
                                            <div class="plan-col"><span class="icon-check">✓</span></div>
                                            <div class="plan-col featured"><span class="icon-check">✓</span></div>
                                            <div class="plan-col"><span class="icon-check">✓</span></div>
                                        </div>
                                        <div class="comparison-row">
                                            <div class="feature-col">
                                                <span class="feature-name">Dedicated CS Support (Call, WhatsApp & Email)</span>
                                            </div>
                                            <div class="plan-col"><span class="icon-check">✓</span></div>
                                            <div class="plan-col featured"><span class="icon-check">✓</span></div>
                                            <div class="plan-col"><span class="icon-check">✓</span></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!--about-us-area start-->
        <section class="about-us-area pos-rel about-style-1 pt-100 pb-100 pt-md-60 pb-md-40 pt-xs-60 pb-xs-40">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-img-wrapper-2">
                            <div class="line-shape d-none d-xl-inline-block">
                                <!-- <img src="{{ asset('assets/img/line-shape/line_2.svg') }}" alt=""> -->
                            </div>
                            <img class="img-2" src="{{ asset('assets/img/registrations/trust2.png') }}" height="673" width="684" alt="">
                            <div class="authors-quote at-quote-2">
                                <div class="a-icon">
                                    <img src="{{ asset('assets/img/icon/icon20.svg') }}" alt="">
                                </div>
                                <h5 class="mb-25">{{ __('foriegn.about.quote_author') }}<span>{{ __('foriegn.about.quote_company') }}</span></h5>
                                <h5 class="a-text">{{ __('foriegn.about.quote_text') }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-wrapper pl-70">
                            <div class="section-title section-title-3 text-center text-md-left mb-30">
                                <h3 class="mb-35">{!! __('foriegn.about.title_html') !!}</h3>
                                <h4 class="sub-title mb-40">{{ __('foriegn.about.subtitle') }}</h4>
                                <h4 class="sub-title mb-65"> Every mandate is led by qualified professionals not agents ensuring accountability at every step.</h4>
                                <a href="{{ route('about',['locale' => app()->getLocale()]) }}" class="theme_btn theme_btn2">{{ __('foriegn.about.btn_text') }}</a>
                            </div>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section>



        <!--customer-fact-area end-->
        <!--why-chose-us-area start-->
        <section class="why-chose-us-area pt-100 pb-110 pt-md-45 pb-md-40 pt-xs-45 pb-xs-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section-title section-title-3 text-center text-md-left mb-30 pr-80 pr-xs-0">
                            <h3 class="mb-50">{!! __('foriegn.why_choose.title_html') !!}</h3>
                            <h4 class="sub-title mb-65">{{ __('foriegn.why_choose.subtitle') }}</h4>
                            <a href="{{ route('contact',['locale' => app()->getLocale()]) }}" class="theme_btn theme_btn2">{{ __('foriegn.why_choose.btn_text') }}</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="chose-list">
                            <li>
                                <div class="chose-box wow fadeInUp2 animated" data-wow-delay="0.1s">
                                    <div class="chose-box-icon">
                                        <img src="{{ asset('assets/img/icon/icon21.svg') }}" alt="">
                                    </div>
                                    <div class="chose-box-text">
                                        <h5>{{ __('foriegn.why_choose.responsive.title') }}</h5>
                                        <h3>{{ __('foriegn.why_choose.responsive.description') }}</h3>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="chose-box wow fadeInUp2 animated" data-wow-delay="0.3s">
                                    <div class="chose-box-icon">
                                        <img src="{{ asset('assets/img/icon/icon22.svg') }}" alt="">
                                    </div>
                                    <div class="chose-box-text">
                                        <h5>{{ __('foriegn.why_choose.documents.title') }}</h5>
                                        <h3>{{ __('foriegn.why_choose.documents.description') }}</h3>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="chose-box wow fadeInUp2 animated" data-wow-delay="0.5s">
                                    <div class="chose-box-icon">
                                        <img src="{{ asset('assets/img/icon/icon23.svg') }}" alt="">
                                    </div>
                                    <div class="chose-box-text">
                                        <h5>{{ __('foriegn.why_choose.support.title') }}</h5>
                                        <h3>{{ __('foriegn.why_choose.support.description') }}</h3>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section>
        <!--why-chose-us-area end-->

        <!--download-our-app end-->
        <!--get-quote-area start-->
        <section class="get-quote-area pos-rel pt-85 pb-115 pt-md-50 pt-xs-50 pb-md-40 pb-xs-40">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="quote-wrapper mb-30">
                            <div class="section-title section-title-3 text-center text-md-left pr-70 pr-lg-0 pr-md-0 pr-xs-0">
                                <h3 class="mb-45">{!! __('foriegn.get_quote.title_html') !!}</h3>
                                <h4 class="sub-title mb-60">{{ __('foriegn.get_quote.subtitle') }}</h4>
                                <h5 class="mb-25">{{ __('foriegn.get_quote.issue_text') }}</h5>
                                <a href="tel:+919821008011" class="number">+91 9821008011</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="form-box form-box-2 white-bg" wire:key="service-quote-form">
                            <h4 class="sub-title mb-45">{{ __('foriegn.get_quote.form_title') }}</h4>
                            @if($showServiceThanks)
                            <div class="alert alert-success" role="alert" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000); $wire.set('showServiceThanks', false, false)">
                                <strong>{{ __('foriegn.get_quote.thank_you') }}</strong> {{ __('foriegn.get_quote.thank_you_msg') }}
                            </div>
                            @endif
                            <form class="quote-form mb-20" wire:submit.prevent="submitServiceRequest">
                                <div class="email-input">
                                    <label class="input-title">{{ __('foriegn.get_quote.phone_label') }}</label>
                                    <input type="text" wire:model.live="servicePhone" placeholder="{{ __('foriegn.get_quote.phone_placeholder') }}" required>
                                    @error('servicePhone') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                                <div class="email-input">
                                    <label class="input-title">{{ __('foriegn.get_quote.email_label') }}</label>
                                    <input type="email" wire:model.live="serviceEmail" placeholder="{{ __('foriegn.get_quote.email_placeholder') }}">
                                    @error('serviceEmail') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                                <div class="choice-list mb-20">
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="input-title pl-20">{{ __('foriegn.get_quote.service_label') }}</span>
                                            <select class="select-product" wire:model.live="serviceType" required>
                                                <option value="">{{ __('foriegn.get_quote.service_placeholder') }}</option>
                                                <option value="Business Setup & India Entry">Business Setup & India Entry</option>
                                                <option value="Regulatory & FEMA Advisory">Regulatory & FEMA Advisory</option>
                                                <option value="Intellectual Property Rights (IPR)">Intellectual Property Rights (IPR)</option>
                                                <option value="Corporate Secretarial & Compliance Management">Corporate Secretarial & Compliance Management</option>
                                                <option value="Corporate Transactions & Legal Documentation">Corporate Transactions & Legal Documentation</option>
                                            </select>
                                        </div>
                                    </div>
                                    @error('serviceType') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                                <button type="submit" class="q-btn-lg">{{ __('foriegn.get_quote.submit_btn') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--get-quote-area end-->
        <!--client-feedback-area start-->
        <section class="client-feedback-area testimonial-two pt-120 pb-55 pt-md-90 pb-md-15 pt-xs-90 pb-xs-15">
            <div class="line-shape d-none d-lg-inline-block">
                <!-- <img class="img-fluid" src="{{ asset('assets/img/line-shape/line_4.svg') }}" alt=""> -->
            </div>

            <section class="client-feedback-area cf-area-three pos-rel pt-40 pb-100 pt-md-85 pb-mb-60 pt-xs-85 pb-xs-100">
               
                <div class="container">
                    <div class="client-feedback-wrapper-content pos-rel">
                        <div class="container custom-container-feedback">
                            <div class="row justify-content-center">
                                <div class="col-xl-6">
                                    <div class="testimonial-text-wrapper mb-30">
                                        <div class="section-title section-title-3 text-center">
                                            <h3 class="mb-25">{!! __('foriegn.testimonials.title_html') !!}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row no-gutters justify-content-center">
                        <div class="col-lg-9">
                            <div class="feedback-active4 owl-carousel">
                                @forelse($testimonials as $testimonial)
                                @php $translation = $testimonial->translation; @endphp
                                @if($translation)
                                <div class="feedback-item-wrapper">
                                    <div class="feedback-box fb-box-3 text-center">
                                        <div class="quote-icon">
                                            <img src="{{ asset('assets/img/icon/quote-gray.svg') }}" alt="">
                                        </div>
                                        <h4 class="sub-title mb-25">{{ Str::limit($translation->content, 150) }}</h4>
                                        <h5 class="mb-10">{{ Str::limit($testimonial->name, 30) }}</h5>
                                        @if($translation->position && $translation->company)
                                        <h6>{{ Str::limit($translation->position, 25) }}, {{ Str::limit($translation->company, 25) }}.</h6>
                                        @elseif($translation->position)
                                        <h6>{{ Str::limit($translation->position, 50) }}.</h6>
                                        @elseif($translation->company)
                                        <h6>{{ Str::limit($translation->company, 50) }}.</h6>
                                        @endif
                                    </div>
                                </div>
                                @endif
                                @empty
                                <div class="feedback-item-wrapper">
                                    <div class="feedback-box fb-box-3 text-center">
                                        <div class="quote-icon">
                                            <img src="{{ asset('assets/img/icon/quote-gray.svg') }}" alt="">
                                        </div>
                                        <h4 class="sub-title mb-25">{{ __('foriegn.testimonials.no_testimonials') }}</h4>
                                        <h5 class="mb-10">-</h5>
                                        <h6>-</h6>
                                    </div>
                                </div>
                                @endforelse
                            </div>
                        </div>

                        <div class="col-lg-9">
                            <div class="d-flex justify-content-center pt-5 text-center mt-4">
                                <a href="{{route('blogs',['locale' => app()->getLocale()])}}" class="theme_btn sub-btn">{{ __('foriegn.testimonials.go_to_blog') }}</a>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </section>

        <section class="blog-area pt-100 pb-180 pt-md-20 pb-md-20 pt-xs-20 pb-xs-20">
            <div class="container">
                <div class="row align-items-center mb-70">
                    <div class="col-lg-6 col-md-8">
                        <div class="section-title section-title-3 text-center text-md-left mb-30">
                            <h3>{!! __('foriegn.blog.title_html') !!}</h3>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                        <div class="view-more text-center text-md-right mb-30">
                            <a href="{{ route('blogs',['locale' => app()->getLocale()]) }}" class="theme_btn theme_btn2">{{ __('foriegn.blog.btn_text') }}</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @forelse($blogs as $index => $blog)
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="blogs blogs-2 mb-30 wow fadeInUp2 animated" data-wow-delay="{{ ($index + 1) * 0.2 }}s">
                            <div class="blogs__thumb mb-30">
                                <img class="img-fluid" src="{{ $blog['featured_image'] ? asset('storage/'.$blog['featured_image']) : asset('assets/img/blog/01.jpg') }}" alt="{{ $blog['title'] }}">
                            </div>
                            <div class="blogs__content">
                                <span class="date-tag mb-25">{{ $blog['created_at']->format('d M, Y') }}</span>
                                <h3 class="blog-title mb-15"><a href="{{ route('blog.view', ['locale' => app()->getLocale(), 'slug' => $blog['slug']]) }}">{{ Str::limit($blog['title'], 60) }}</a></h3>
                                <a class="blog-btn" href="{{ route('blog.view', ['locale' => app()->getLocale(), 'slug' => $blog['slug']]) }}">{{ __('foriegn.blog.continue_reading') }} <img src="{{ asset('assets/img/icon/chevron.svg') }}" alt=""></a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <p class="text-center">{{ __('foriegn.blog.no_blogs') }}</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>
        <!--blog-area end-->
        <!--subscribe-letter-area start-->
        <section class="subscribe-letter-area pt-50 pb-80">
            <div class="line-shape d-none d-lg-inline-block">
                <!-- <img class="img-fluid" src="{{ asset('assets/img/line-shape/line_5.svg') }}" alt=""> -->
            </div>
            <div class="container custom-container-subs">
                <div class="sub-bg pt-85 pb-75 pr-150 pl-150 pr-md-50 pl-md-50 pr-xs-0 pl-xs-0">
                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                            <div class="subscribe-wrapper">
                                <div class="section-title section-title-3 text-center">
                                        <h3 class="mb-25 wow fadeInUp2 animated" data-wow-delay="0.1s">{!! __('foriegn.footer_cta.title_html') !!}</h3>
                                        <h4 class="sub-title mb-40 wow fadeInUp2 animated" data-wow-delay="0.3s">{{ __('foriegn.footer_cta.subtitle') }}</h4>
                                        <a href="#" class="theme_btn theme_btn2 sub-btn wow fadeInUp2 animated" data-wow-delay="0.5s">{{ __('foriegn.footer_cta.btn_text') }}</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--subscribe-letter-area end-->
    </main>
    @if($showModal)
    <div class="custom-modal" role="dialog" aria-modal="true">
        <div class="custom-modal-backdrop" wire:click="$set('showModal', false)"></div>
        <div class="custom-modal-card">
            <div class="custom-modal-header">
                <div class="modal-title">
                    <img src="{{ asset('assets/img/icon/icon16.svg') }}" alt="icon" style="height:28px;margin-right:10px;" />
                    <div>
                        <h4>{{ __('foriegn.modal.get_started') }}</h4>
                        <small class="muted">{{ $planName ?? 'Plan' }}</small>
                    </div>
                </div>
                <button type="button" class="modal-close" wire:click="$set('showModal', false)">×</button>
            </div>
            <div class="custom-modal-body">
                @if(session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="form-row">
                    <label class="input-label">{{ __('foriegn.modal.name_label') }}</label>
                    <input type="text" wire:model.defer="name" class="custom-form-control" placeholder="{{ __('foriegn.modal.name_placeholder') }}" />
                    @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
                <div class="form-row">
                    <label class="input-label">{{ __('foriegn.modal.email_label') }}</label>
                    <input type="email" wire:model.defer="email" class="custom-form-control" placeholder="{{ __('foriegn.modal.email_placeholder') }}" />
                    @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
                <div class="form-row">
                    <label class="input-label">{{ __('foriegn.modal.plan_label') }}</label>
                    <input type="text" wire:model.defer="planName" class="custom-form-control" style="font-weight:bold" placeholder="{{ __('foriegn.modal.plan_placeholder') }}" readonly />
                    @error('planName') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
                <div class="form-row">
                    <label class="input-label">{{ __('foriegn.modal.phone_label') }}</label>
                    <input type="text" wire:model.defer="phone" class="custom-form-control" placeholder="{{ __('foriegn.modal.phone_placeholder') }}" />
                    @error('phone') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="custom-modal-footer">
                <button type="button" wire:click="saveRegistration" class="theme_btn">{{ __('foriegn.modal.submit_btn') }}</button>
                <button type="button" wire:click="$set('showModal', false)" class="theme_btn border-btn">{{ __('foriegn.modal.cancel_btn') }}</button>
            </div>
        </div>
    </div>
    @endif

    @if($showThanksModal)
    <div class="custom-modal" role="dialog" aria-modal="true">
        <div class="custom-modal-backdrop" wire:click="$set('showThanksModal', false)"></div>
        <div class="custom-modal-card small">
            <div class="thanks-icon">✓</div>
            <h4 class="thanks-title">{{ __('foriegn.modal.thanks_title') }}</h4>
            <p class="muted">{{ __('foriegn.modal.thanks_subtitle') }}</p>
            <div style="margin-top:14px;">
                <button type="button" wire:click="$set('showThanksModal', false)" class="theme_btn">{{ __('foriegn.modal.close_btn') }}</button>
            </div>
        </div>
    </div>
    @endif

    @if($showPendingModal)
    <div class="custom-modal" role="dialog" aria-modal="true">
        <div class="custom-modal-backdrop" wire:click="$set('showPendingModal', false)"></div>
        <div class="custom-modal-card small">
            <div class="thanks-icon" style="background:#fff4e8;color:#ff8a1f">…</div>
            <h4 class="thanks-title">{{ __('foriegn.modal.pending_title') }}</h4>
            <p class="muted">{!! __('foriegn.modal.pending_subtitle') !!}</p>
            <div style="margin-top:14px;">
                <button type="button" wire:click="$set('showPendingModal', false)" class="theme_btn">{{ __('foriegn.modal.okay_btn') }}</button>
            </div>
        </div>
    </div>
    @endif

    <style>
        /* Themed modal styles to match site */
        .custom-modal {
            position: fixed;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1050;
        }

        .custom-modal-backdrop {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
        }

        .custom-modal-card {
            position: relative;
            z-index: 1060;
            background: #fff;
            max-width: 520px;
            width: 92%;
            border-radius: 10px;
            box-shadow: 0 8px 30px rgba(5, 0, 32, 0.12);
            overflow: hidden;
            animation: modal-pop .18s ease-out;
        }

        .custom-modal-card.small {
            max-width: 420px;
            padding: 34px 28px;
            text-align: center
        }

        /* simplified header: solid color, reduced padding */
        .custom-modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 20px;
            background: #050020;
            color: #fff
        }

        .custom-modal-header .modal-title {
            display: flex;
            align-items: center;
            gap: 10px
        }

        .custom-modal-header h4 {
            margin: 0;
            font-size: 16px;
            font-weight: 600
        }

        .custom-modal-header .muted {
            color: rgba(255, 255, 255, 0.9);
            font-size: 12px
        }

        .custom-modal-header .modal-title img {
            height: 20px
        }

        .modal-close {
            background: transparent;
            border: 0;
            color: rgba(255, 255, 255, 0.9);
            font-size: 26px;
            line-height: 1;
            cursor: pointer
        }

        .custom-modal-body {
            padding: 20px 24px;
            background: #fff
        }

        .form-row {
            margin-bottom: 12px
        }

        .input-label {
            display: block;
            font-size: 13px;
            color: #222;
            margin-bottom: 6px
        }

        .custom-form-control {
            width: 100%;
            padding: 11px 14px;
            border: 1px solid #e6e6e6;
            border-radius: 8px;
            font-size: 14px;
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.6)
        }

        .custom-form-control:focus {
            outline: none;
            border-color: #ff1f1f;
            box-shadow: 0 4px 18px rgba(255, 31, 31, 0.08)
        }

        .custom-modal-footer {
            padding: 12px 20px;
            background: #fff;
            display: flex;
            justify-content: flex-end;
            gap: 10px
        }

        /* modal button refinements - clean & professional */
        .custom-modal .theme_btn {
            background: #ff1f1f;
            color: #fff;
            padding: 9px 16px;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            font-size: 14px;
            box-shadow: none;
            transition: transform .12s ease, box-shadow .12s ease;
        }

        .custom-modal .theme_btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(255, 31, 31, 0.09)
        }

        .custom-modal .theme_btn.border-btn {
            background: transparent;
            color: #050020;
            border: 1px solid #e6e6e6;
            padding: 8px 14px;
            border-radius: 8px;
            font-weight: 600
        }

        .thanks-icon {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: #e8f8f1;
            color: #0aa06a;
            font-size: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 12px;
            box-shadow: 0 6px 18px rgba(10, 160, 106, 0.12)
        }

        .thanks-title {
            font-size: 20px;
            margin: 6px 0 0;
            color: #050020
        }

        .muted {
            color: #6c6c6c
        }

        @keyframes modal-pop {
            from {
                opacity: 0;
                transform: translateY(6px) scale(.98)
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1)
            }
        }


        /* Modern Comparison Table Styles */
        .comparison-area {
            background: #f6f3f1;
        }

        /* Widen comparison container on large screens */
        @media (min-width: 1200px) {
            .comparison-area .container {
                max-width: 1320px;
                /* increase from default (e.g., 1140px) */
            }
        }

        .modern-comparison-wrapper {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        /* Header Styles */
        .comparison-header {
            background: #050020;
            color: white;
        }

        .comparison-row {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 0;
        }

        .header-row {
            align-items: stretch;
        }

        .feature-col,
        .plan-col {
            padding: 20px 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .header-feature {
            background: #050020;
            color: white;
            font-weight: 600;
            font-size: 18px;
            justify-content: flex-start;
            text-align: left;
        }

        .header-feature h4 {
            color: white;
            margin: 0;
            font-size: 18px;
            font-family: "Circular Std", sans-serif;
        }

        .plan-col {
            border-left: 1px solid rgba(255, 255, 255, 0.1);
            flex-direction: column;
            padding: 25px 15px;
        }

        .plan-col.featured-plan {
            background: #ff1f1f;
            position: relative;
        }

        .popular-badge {
            position: absolute;
            top: -10px;
            background: #050020;
            color: white;
            padding: 5px 18px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }

        .plan-header-content h4 {
            color: white;
            font-size: 18px;
            margin-bottom: 10px;
            font-weight: 700;
            font-family: "Circular Std", sans-serif;
        }

        .price-tag {
            font-size: 32px;
            font-weight: 700;
            color: white;
            margin: 8px 0;
            font-family: "Circular Std", sans-serif;
        }

        .price-subtitle {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.95);
            margin: 5px 0;
            font-family: "Circular Std Book", sans-serif;
        }

        .plan-header-content small {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.85);
            display: block;
            margin-bottom: 15px;
            font-family: "Circular Std Book", sans-serif;
        }

        .get-started-btn {
            background: white;
            color: #050020;
            padding: 10px 22px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            display: inline-block;
            transition: all 0.3s ease;
            font-family: "Circular Std", sans-serif;
            border: 2px solid white;
        }

        .featured-plan .get-started-btn {
            background: #050020;
            color: white;
            border-color: #050020;
        }

        .get-started-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            background: #ff1f1f;
            color: white;
            border-color: #ff1f1f;
        }

        .featured-plan .get-started-btn:hover {
            background: white;
            color: #ff1f1f;
            border-color: white;
        }

        /* Feature Sections */
        .feature-section {
            border-bottom: 1px solid #e5e5e5;
        }

        .section-header {
            background: #050020;
            color: white;
            padding: 18px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .section-header:hover {
            background: #0a0035;
        }

        .section-title-content {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 600;
            font-size: 16px;
            font-family: "Circular Std", sans-serif;
        }

        .section-title-content i {
            font-size: 18px;
            color: #ff1f1f;
        }

        .toggle-icon {
            transition: transform 0.3s ease;
            font-size: 14px;
        }

        .toggle-icon.rotate {
            transform: rotate(180deg);
        }

        .section-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .section-content.open {
            max-height: 2000px;
        }

        /* Comparison Rows */
        .comparison-body .plan-col {
            padding: 16px 15px;
            border-left: 1px solid #f0f0f0;
        }

        .comparison-body .plan-col.featured {
            background: #fff2f2;
        }

        /* Icons */
        .icon-check,
        .icon-cross {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            font-size: 16px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .icon-check {
            background: #e8f5e9;
            color: #2e7d32;
            border: 2px solid #4caf50;
        }

        .icon-cross {
            background: #ffebee;
            color: #c62828;
            border: 2px solid #ef5350;
        }

        .comparison-body .comparison-row:hover .icon-check {
            background: #4caf50;
            color: white;
            transform: scale(1.05);
        }

        .comparison-body .comparison-row:hover .icon-cross {
            background: #ef5350;
            color: white;
            transform: scale(1.05);
        }

        /* Responsive Design */
        @media (max-width: 991px) {
            .comparison-row {
                grid-template-columns: 1.5fr 1fr 1fr 1fr;
            }

            .price-tag {
                font-size: 26px;
            }

            .plan-header-content h4 {
                font-size: 16px;
            }

            .feature-name {
                font-size: 13px;
            }
        }

        @media (max-width: 767px) {

            /* Mobile-first stacked layout (no horizontal scroll) */
            .comparison-header {
                display: none;
                /* hide the grid header on small screens */
            }

            .comparison-row {
                grid-template-columns: 1fr;
                /* stack: feature then each plan */
            }

            .comparison-body .feature-col {
                padding: 14px 16px;
                justify-content: flex-start;
                text-align: left;
                background: #f9f9f9;
                border-right: none;
            }

            .comparison-body .plan-col {
                padding: 12px 16px;
                justify-content: flex-start;
                text-align: left;
                border-left: none;
                /* remove column divider in stacked layout */
                border-top: 1px solid #f0f0f0;
                /* subtle separation between plans */
                position: relative;
                gap: 10px;
            }

            /* Add plan labels before each plan value using nth-child mapping */
            .comparison-body .comparison-row>.plan-col::before {
                content: '';
                display: inline-block;
                font-weight: 600;
                font-size: 12px;
                color: #050020;
                background: #eef0f7;
                border-radius: 4px;
                padding: 3px 8px;
                margin-right: 10px;
                line-height: 1.2;
            }

            .comparison-body .comparison-row>.plan-col:nth-child(2)::before {
                content: 'Starter';
            }

            .comparison-body .comparison-row>.plan-col:nth-child(3)::before {
                content: 'Compliance';
            }

            .comparison-body .comparison-row>.plan-col:nth-child(4)::before {
                content: 'Complete Setup';
            }

            .price-tag {
                font-size: 22px;
            }

            .plan-header-content h4 {
                font-size: 14px;
            }

            .plan-header-content small {
                font-size: 10px;
            }

            .get-started-btn {
                padding: 8px 15px;
                font-size: 12px;
            }

            .feature-name {
                font-size: 12px;
            }

            .icon-check,
            .icon-cross {
                width: 24px;
                height: 24px;
                font-size: 14px;
            }
        }

        @media (max-width: 575px) {
            .comparison-area {
                padding-top: 60px;
                padding-bottom: 60px;
            }
        }

        /* Quick Summary Styles */
        .quick-summary-area {
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        }

        .summary-main-title {
            font-size: 32px;
            font-weight: 700;
            color: #050020;
            margin-bottom: 12px;
        }

        .summary-subtitle {
            font-size: 16px;
            color: #6b7280;
        }

        .summary-plan-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 32px 24px;
            height: 100%;
            transition: all 0.3s ease;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .summary-plan-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(5, 0, 32, 0.12);
        }

        .summary-plan-card.featured-summary {
            background: linear-gradient(135deg, #fff5f5 0%, #ffffff 100%);
            border: 2px solid #ff1f1f;
            transform: scale(1.03);
        }

        .summary-plan-card.featured-summary:hover {
            transform: scale(1.03) translateY(-5px);
        }

        .popular-badge-summary {
            position: absolute;
            top: -12px;
            left: 50%;
            transform: translateX(-50%);
            background: #ff1f1f;
            color: #fff;
            padding: 6px 20px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(255, 31, 31, 0.3);
        }

        .plan-icon-wrapper {
            width: 64px;
            height: 64px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .starter-icon {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            color: #d97706;
        }

        .compliance-icon {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #dc2626;
        }

        .complete-icon {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            color: #2563eb;
        }

        .summary-plan-card:hover .plan-icon-wrapper {
            transform: scale(1.1) rotate(5deg);
        }

        .summary-plan-name {
            font-size: 22px;
            font-weight: 700;
            color: #050020;
            margin-bottom: 12px;
        }

        .summary-plan-price {
            font-size: 36px;
            font-weight: 800;
            color: #ff1f1f;
            margin-bottom: 16px;
            line-height: 1;
        }

        .summary-plan-desc {
            font-size: 14px;
            color: #6b7280;
            line-height: 1.6;
            margin-bottom: 24px;
            flex-grow: 1;
        }

        .summary-plan-highlights {
            display: flex;
            flex-direction: column;
            gap: 12px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
        }

        .highlight-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            color: #1f2937;
        }

        .highlight-icon {
            width: 20px;
            height: 20px;
            background: #ff1f1f;
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
            flex-shrink: 0;
        }

        @media (max-width: 991px) {
            .summary-plan-card.featured-summary {
                transform: scale(1);
            }

            .summary-plan-card.featured-summary:hover {
                transform: translateY(-5px);
            }

            .summary-main-title {
                font-size: 26px;
            }

            .summary-plan-price {
                font-size: 30px;
            }
        }

        @media (max-width: 767px) {
            .summary-main-title {
                font-size: 22px;
            }

            .summary-plan-name {
                font-size: 20px;
            }

            .summary-plan-price {
                font-size: 28px;
            }

            .plan-icon-wrapper {
                width: 56px;
                height: 56px;
            }
        }

        /* Pricing Comparison Styles */
        .pricing-comparison-section {
            background: #fff;
            font-family: 'Circular Std', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }

        .section-title {
            font-size: 32px;
            font-weight: 700;
            color: #050020;
            margin-bottom: 0;
        }

        .section-subtitle {
            font-size: 16px;
            color: #6b7280;
            margin-top: 12px;
        }

        /* Pricing Cards */
        .pricing-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 32px 24px;
            height: 100%;
            transition: all 0.3s ease;
            position: relative;
        }

        .pricing-card.featured {
            background: #fff5f5;
            border: 2px solid #ff1f1f;
            transform: scale(1.02);
        }

        .pricing-card:hover {
            box-shadow: 0 8px 24px rgba(5, 0, 32, 0.1);
        }

        .popular-badge {
            position: absolute;
            top: -12px;
            left: 50%;
            transform: translateX(-50%);
            background: #ff1f1f;
            color: #fff;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .card-header {
            margin-bottom: 24px;
        }

        .plan-name {
            font-size: 24px;
            font-weight: 700;
            color: #050020;
            margin-bottom: 8px;
            line-height: 1.3;
        }

        .plan-tagline {
            font-size: 14px;
            color: #4b5563;
            line-height: 1.5;
            margin-bottom: 0;
        }

        .card-pricing {
            margin-bottom: 24px;
            padding-bottom: 24px;
            border-bottom: 1px solid #e5e7eb;
        }

        .price-amount {
            font-size: 36px;
            font-weight: 700;
            color: #050020;
            margin-bottom: 4px;
        }

        .price-note {
            font-size: 13px;
            color: #6b7280;
            line-height: 1.4;
        }

        .btn-cta {
            width: 100%;
            padding: 14px 24px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 24px;
        }

        .btn-primary {
            background: #ff1f1f;
            color: #fff;
        }

        .btn-primary:hover {
            background: #e01b1b;
        }

        .btn-outline {
            background: #fff;
            color: #ff1f1f;
            border: 2px solid #ff1f1f;
        }

        .btn-outline:hover {
            background: #fff5f5;
        }

        .card-features {
            text-align: left;
        }

        .features-title {
            font-size: 15px;
            font-weight: 600;
            color: #050020;
            margin-bottom: 16px;
        }

        .features-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .features-list li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 12px;
            font-size: 14px;
            color: #1f2937;
            line-height: 1.6;
        }

        .features-list li svg {
            flex-shrink: 0;
            margin-top: 2px;
            color: #ff1f1f;
        }

        .compare-link {
            color: #ff1f1f;
            text-decoration: none;
            font-size: 16px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .compare-link:hover {
            text-decoration: underline;
        }

        /* Comparison Table */
        .comparison-table-wrapper {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            overflow: hidden;
            margin-top: 40px;
        }

        .comparison-header {
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
        }

        .header-title {
            background: #ffffff;
            display: flex;
            align-items: center;
            padding: 20px !important;
        }

        .compare-features-link {
            color: #ff1f1f;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
        }

        .compare-features-link:hover {
            text-decoration: underline;
        }

        .plan-header-box {
            background: #ffffff !important;
            padding: 24px 20px !important;
            border-left: 1px solid #e5e7eb;
        }

        .plan-header-box.featured-header {
            background: #fff5f5 !important;
            border-left: 1px solid #ffdddd;
            border-right: 1px solid #ffdddd;
        }

        .plan-name-header {
            font-size: 18px;
            font-weight: 600;
            color: #050020 !important;
            margin-bottom: 10px;
        }

        .plan-price-header {
            font-size: 30px;
            font-weight: 700;
            color: #050020 !important;
            margin-bottom: 16px;
            line-height: 1.2;
        }

        .btn-header-cta {
            padding: 10px 24px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            border: 2px solid;
        }

        .btn-default {
            background: #ffffff;
            color: #ff1f1f;
            border-color: #ff1f1f;
        }

        .btn-default:hover {
            background: #fff5f5;
        }

        .btn-featured {
            background: #ff1f1f;
            color: #ffffff;
            border-color: #ff1f1f;
        }

        .btn-featured:hover {
            background: #e01b1b;
        }

        .checkmark-below {
            margin-top: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .header-row,
        .feature-row,
        .footer-row {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 0;
            align-items: center;
        }

        .feature-column,
        .plan-column {
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            border-right: 1px solid #e5e7eb;
        }

        .feature-column {
            justify-content: flex-start;
            text-align: left;
        }

        .plan-column:last-child {
            border-right: none;
        }

        .plan-column.featured {
            background: #fff5f5;
            border-left: 1px solid #ffdddd;
            border-right: 1px solid #ffdddd;
        }

        .plan-header-content {
            width: 100%;
        }

        .category-section {
            border-bottom: 1px solid #e5e7eb;
        }

        .category-section:last-child {
            border-bottom: none;
        }

        .category-header {
            background: #f9fafb;
            padding: 16px 20px;
            border-bottom: 1px solid #e5e7eb;
        }

        .category-header h5 {
            font-size: 16px;
            font-weight: 700;
            color: #050020;
            margin: 0;
        }

        .feature-row {
            border-bottom: 1px solid #f3f4f6;
        }

        .feature-row:last-child {
            border-bottom: none;
        }

        .feature-row:hover {
            background: #fafafa;
        }

        .feature-name {
            font-size: 14px;
            color: #1f2937;
            line-height: 1.6;
            font-weight: 500;
        }

        .check-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .no-feature {
            color: #d1d5db;
            font-size: 20px;
        }

        .comparison-footer {
            background: #f9fafb;
            border-top: 1px solid #e5e7eb;
        }

        .help-section {
            text-align: left;
            padding: 8px 0;
        }

        .help-section strong {
            color: #050020;
            font-size: 16px;
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .help-section p {
            color: #4b5563;
            font-size: 14px;
            margin: 0;
            line-height: 1.5;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .pricing-card.featured {
                transform: scale(1);
            }
        }

        @media (max-width: 768px) {
            .comparison-table-wrapper {
                overflow-x: auto;
            }

            .header-row,
            .feature-row,
            .footer-row {
                min-width: 800px;
            }

            .section-title {
                font-size: 24px;
            }

            .plan-name {
                font-size: 20px;
            }

            .price-amount {
                font-size: 28px;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('[data-bg]').forEach(function(el) {
                var url = el.getAttribute('data-bg');
                if (url) {
                    el.style.backgroundImage = 'url(' + url + ')';
                }
            });
        });
    </script>
</div>