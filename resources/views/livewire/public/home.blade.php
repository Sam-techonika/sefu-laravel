<div>
    <div class="body-overlay"></div>
    <!-- slide-bar end -->
    <main>
        <!--slider-area start-->
        <section class="slider-area slider-bg-3 pos-rel pb-150">
            <img src="{{ asset('assets/img/shape/shape_10.svg') }}" alt="" class="sl shape_one">
            <img src="{{ asset('assets/img/shape/shape_11.svg') }}" alt="" class="sl shape_two">
            <img src="{{ asset('assets/img/shape/shape_12.svg') }}" alt="" class="sl shape_three">
            <img src="{{ asset('assets/img/shape/shape_13.svg') }}" alt="" class="sl shape_four">
            <div class="single-slider d-flex align-items-center">
                <div class="slider-ai-img">
                    <img class="img-fluid" src="{{ asset('assets/img/ai/slider-ai1.svg') }}" alt="">
                </div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="slider__content slider__content-3 text-center text-md-left pt-325">
                                <h1 class="main-title wow fadeInUp2 animated mb-40 " data-wow-delay=".1s">{{ __('home.hero_main_title') }}</h1>
                                <h4 class="sub-title wow fadeInUp2 animated mb-50" data-wow-delay=".3s">{{ __('home.hero_subtitle') }}</h4>
                                <ul class="btn-list d-sm-flex align-items-center wow fadeInUp2 animated mb-35" data-wow-delay=".5s">
                                    <li>
                                        <a class="theme_btn border-btn active mr-20" href="{{ route('contact',['locale' => app()->getLocale()]) }}">{{ __('button.get_started') }}</a>
                                    </li>
                                    <li>
                                        <a class="theme_btn border-btn" href="{{ route('contact',['locale' => app()->getLocale()]) }}">{{ __('button.consult_expert') }}</a>
                                    </li>
                                </ul>
                                <div class="client-review text-center d-sm-flex align-items-center justify-content-md-start wow fadeInUp2 animated" data-wow-delay=".7s">
                                    <h3>4.7</h3>
                                    <div class="review-box ml-20">
                                        <span>{{ __('home.hero_rating_text') }}</span>
                                        <div class="review-icon">
                                            <a href="#"><i class="fas fa-star"></i></a>
                                            <a href="#"><i class="fas fa-star"></i></a>
                                            <a href="#"><i class="fas fa-star"></i></a>
                                            <a href="#"><i class="fas fa-star"></i></a>
                                            <a href="#"><i class="fas fa-star"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .col/ -->
                    </div><!-- .row/ -->
                </div>
            </div>
        </section>
        <!--slider-area end-->
        <!--company-status-area start-->
        <section class="company-status-area">
            <div class="container">
                <div class="status-bg pr-50 pl-50 pt-50 pb-15">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="status-box pr-50 mb-30">
                                <div class="status-icon">
                                    <img src="{{ asset('assets/img/icon/icon16.svg') }}" alt="">
                                </div>
                                <div class="status-content">
                                    <span>{{ __('home.status_expert_led') }}</span>
                                    <h4 class="sub-title">{{ __('home.status_expert_subtitle') }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="status-box pr-50 mb-30">
                                <div class="status-icon ic-2">
                                    <img src="{{ asset('assets/img/icon/icon16.svg') }}" alt="">
                                </div>
                                <div class="status-content">
                                    <span>{{ __('home.status_quick_hassle') }}</span>
                                    <h4 class="sub-title">{{ __('home.status_quick_subtitle') }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="status-box pr-50 mb-30">
                                <div class="status-icon ic-3">
                                    <img src="{{ asset('assets/img/icon/icon16.svg') }}" alt="">
                                </div>
                                <div class="status-content">
                                    <span>{{ __('home.status_transparent') }}</span>
                                    <h4 class="sub-title">{{ __('home.status_transparent_subtitle') }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--company-status-area end-->
        <!--services-area start-->
        <section class="services-area yellow-soft-bg pt-270 pb-115 pt-md-90 pb-md-60 pt-xs-90 pb-xs-60">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title section-title-4 text-center wow fadeInUp2 animated mb-125" data-wow-delay='.1s'>
                            <h3 class="pr-30 pl-30 mb-0 pl-lg-0 pr-lg-0 pl-xs-0 pr-xs-0">{{ __('home.services_title') }}</h3>
                            <h4 class="sub-title">{{ __('home.services_subtitle') }}</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 wow fadeInUp2 animated" data-wow-delay='.2s'>
                        <div class="s-services-wrapper pos-rel pr-70 pl-110 pt-55 pb-40 mb-50">
                            <div class="ilustration-img mr-120">
                                <img class="ilustar" src="{{ asset('assets/img/ai/ai1.svg') }}" alt="">
                            </div>
                            <div class="s-services-text">
                                <h5>{{ __('home.business_setup_label') }}</h5>
                                <h3>{{ __('home.business_setup_title') }}</h3>
                                <h4 class="sub-title mb-40">{{ __('home.business_setup_subtitle') }}</h4>
                                <a class="s-more-btn" href="{{ route('service.view', ['locale' => app()->getLocale(), 'slug' =>'business-setup-india-entry']) }}">
                                    <img class="back-one" src="{{ asset('assets/img/icon/icon13.svg') }}" alt="">
                                    <img class="back-two" src="{{ asset('assets/img/icon/long-arrow-right.svg') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 wow fadeInUp2 animated" data-wow-delay='.4s'>
                        <div class="s-services-wrapper pr-70 pl-60 pt-55 pb-40 mb-50">
                            <div class="ilustration-img mr-80 mr-md-20">
                                <img class="ilustar" src="{{ asset('assets/img/ai/ai2.svg') }}" alt="">
                            </div>
                            <div class="s-services-text">
                                <h5>{{ __('home.fema_regulatory_label') }}</h5>
                                <h3>{{ __('home.fema_regulatory_title') }}</h3>
                                <h4 class="sub-title mb-40 mr-md-20">{{ __('home.fema_regulatory_subtitle') }}</h4>
                                <a class="s-more-btn" href="{{ route('service.view', ['locale' => app()->getLocale(), 'slug' =>'regulatory-fema-advisory']) }}">
                                    <img class="back-one" src="{{ asset('assets/img/icon/icon13.svg') }}" alt="">
                                    <img class="back-two" src="{{ asset('assets/img/icon/long-arrow-right.svg') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 wow fadeInUp2 animated" data-wow-delay='.6s'>
                        <div class="s-services-wrapper pos-rel pr-70 pl-100 pt-55 pb-40 mb-50">
                        
                            <div class="ilustration-img mr-100 mr-md-20">
                                <img class="ilustar" src="{{ asset('assets/img/ai/ai3.svg') }}" alt="">
                            </div>
                            <div class="s-services-text">
                                <h5>{{ __('home.intellectual_property_label') }}</h5>
                                <h3>{{ __('home.intellectual_property_title') }}</h3>
                                <h4 class="sub-title mb-40">{{ __('home.intellectual_property_subtitle') }}</h4>
                                <a class="s-more-btn" href="{{ route('service.view', ['locale' => app()->getLocale(), 'slug' =>'intellectual-property-rights']) }}">
                                    <img class="back-one" src="{{ asset('assets/img/icon/icon13.svg') }}" alt="">
                                    <img class="back-two" src="{{ asset('assets/img/icon/long-arrow-right.svg') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div><!-- /.row -->
                <div class="row justify-content-center mt-85">
                    <div class="col-lg-9">
                        <div class="row-title text-center wow fadeInUp2 animated mb-30" data-wow-delay='.1s'>
                            <h3 class="mb-20">{{ __('home.services_cta_text') }}</h3>
                            <a href="{{ route('contact',['locale' => app()->getLocale()]) }}" class="theme_btn theme_btn3">{{ __('button.book_consultation') }}</a>
                        </div>
                    </div>
                </div>
            </div><!-- /.container -->
        </section>
        <!--services-area end-->
        <!--what-we-do-area start-->
        <section class="what-we-do-area pt-225 pb-105 pt-md-100 pb-md-60 pt-xs-100 pb-xs-60">
            <div class="container">
                <div class="row align-items-center mb-70">
                    <div class="col-lg-7">
                        <div class="do-wrapper text-center text-md-left mb-30">
                            <div class="section-title section-title-4 pr-70 pr-lg-0 pr-md-0 pr-xs-0">
                                <h3>{{ __('home.trusted_founders_title') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="what-text-2 text-center text-md-left mb-30">
                            <h3>{{ __('home.trusted_founders_subtitle') }}</h3>
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-lg-4 col-md-6 wow fadeInUp2 animated" data-wow-delay="0.1s">
                        <div class="do-box-wrapper mb-30">
                            <div class="do-inner pl-40 pr-40 pt-35">
                                <h3 class="mb-35">{{ __('home.law_powers_growth_title') }}</h3>
                                <h5 class="sub-title-2">{{ __('home.law_powers_growth_subtitle') }}</h5>
                            </div>
                            <img class="ilustar-do" src="{{ asset('assets/img/ai/ai4.svg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp2 animated" data-wow-delay="0.3s">
                        <div class="do-box-wrapper active mb-30">
                            <div class="do-inner pl-40 pr-40 pt-35">
                                <h3 class="mb-35">{{ __('home.qualified_experts_title') }}</h3>
                                <h5 class="sub-title-2">{{ __('home.qualified_experts_subtitle') }}</h5>
                            </div>
                            <img class="ilustar-do" src="{{ asset('assets/img/ai/ai5.svg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp2 animated" data-wow-delay="0.5s">
                        <div class="do-box-wrapper mb-30">
                            <div class="do-inner pl-40 pr-40 pt-35">
                                <h3 class="mb-35">{{ __('home.vision_execution_title') }}</h3>
                                <h5 class="sub-title-2">{{ __('home.vision_execution_subtitle') }}</h5>
                            </div>
                            <img class="ilustar-do" src="{{ asset('assets/img/ai/ai6.svg') }}" alt="">
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section>
        <!--what-we-do-area end-->
        <!--customer-fact-area start-->
        <section class="customer-fact-area pt-100 pb-125 pt-md-40 pb-md-65 pt-xs-40 pb-xs-65">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-6 col-md-12">
                        <div class="fact-main-wrapper pos-rel">
                            <img src="{{ asset('assets/img/shape/shape_04.svg') }}" alt="" class="shapes shape1">
                            <img src="{{ asset('assets/img/shape/shape_05.svg') }}" alt="" class="shapes shape2">
                            <img src="{{ asset('assets/img/shape/shape_06.svg') }}" alt="" class="shapes shape3">
                            <img src="{{ asset('assets/img/shape/shape_07.svg') }}" alt="" class="shapes shape4">
                            <img src="{{ asset('assets/img/shape/shape_08.svg') }}" alt="" class="shapes shape5">
                            <img src="{{ asset('assets/img/shape/shape_09.svg') }}" alt="" class="shapes shape6">
                            <img src="{{ asset('assets/img/shape/round1.svg') }}" alt="" class="shapes shape7">
                            <ul class="fact-list">
                                <li>
                                    <div class="fact-one text-center mb-55 pr-120">
                                        <h3><span class="counter mb-15">500</span>+</h3>
                                        <h4 class="sub-title-2">{{ __('home.businesses_incorporated') }}</h4>
                                    </div>
                                </li>
                                <li>
                                    <div class="fact-one text-center mb-55">
                                        <h3><span class="mb-15">1,000+</span></h3>
                                        <h4 class="sub-title-2">{{ __('home.clients_across_india') }}</h4>
                                    </div>
                                </li>
                                <li>
                                    <div class="fact-one text-center mb-55 pr-120">
                                        <h3><span class="mb-15">100%</span></h3>
                                        <h4 class="sub-title-2">{{ __('home.compliance_accuracy') }}</h4>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="fact-wrapper mb-30">
                            <div class="section-title section-title-4 text-center text-md-left">
                                <h3 class="mb-20">{{ __('home.clarity_title') }}</h3>
                                <h4 class="sub-title-2 mb-40">{{ __('home.clarity_description_1') }}</h4>
                                <h4 class="sub-title-2 mb-55">{{ __('home.clarity_description_2') }}</h4>
                                <a href="{{ route('contact',['locale' => app()->getLocale()]) }}" class="theme_btn theme_btn3">{{ __('button.book_consultation') }}</a>
                            </div>
                     
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section>
        <!--customer-fact-area end-->
        <!--client-feedback-area start-->
        <section class="client-feedback-area sky-blue-bg pt-160 pb-120 pt-md-90 pb-md-30 pt-xs-90 pb-xs-30">
            <div class="container custom-container-feedback">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="testimonial-text-wrapper mb-30">
                            <div class="section-title section-title-4 text-center pr-90 pl-90">
                                <h3 class="mb-30">{{ __('home.testimonials_title') }}</h3>
                                <h4 class="sub-title-3 mb-95">{{ __('home.testimonials_subtitle') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="feedback-slick-wrapper">
                    <div class="feedback-active3">
                        @forelse($testimonials as $testimonial)
                        <div class="feedback-item">
                            <div class="feedback-box fb-box2 text-center">
                            
                                <h4 class="sub-title-3">{{ $testimonial['name'] }}</h4>
                                <h6>{{ $testimonial['position'] }}@if($testimonial['position'] && $testimonial['company']) – @endif{{ $testimonial['company'] }}</h6>
                                <h4 class="sub-title-3">"{{ $testimonial['content'] }}"</h4>
                            </div>
                        </div>
                        @empty
               
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
        <!--client-feedback-area end-->
        <!--faq-area start-->
        <section class="faq-area pt-235 pt-md-95 pt-xs-95">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="faq-title-wrapper mb-30 pr-40 pr-xs-0">
                            <div class="section-title section-title-4 text-center text-md-left">
                                <h3 class="mb-25">{{ __('home.faq_title') }}</h3>
                                <h5>{{ __('home.faq_subtitle') }}</h5>
                                <a href="{{ route('faq',['locale' => app()->getLocale()]) }}" class="theme_btn theme_btn3">{{ __('home.faq_button_text') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="faq-que mb-30">
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                {{ __('home.faq_q1') }}
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            {{ __('home.faq_a1') }} </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                {{ __('home.faq_q2') }}
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            {{ __('home.faq_a2') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                {{ __('home.faq_q3') }}
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">
                                            {{ __('home.faq_a3') }} </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingFour">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                {{ __('home.faq_q4') }}
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                        <div class="card-body">
                                            {{ __('home.faq_a4') }}
                                        </div>
                                    </div>

                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingFive">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                {{ __('home.faq_q5') }}
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                                        <div class="card-body">
                                            {{ __('home.faq_a5') }} </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingSix">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                {{ __('home.faq_q6') }}
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                                        <div class="card-body">
                                            {{ __('home.faq_a6') }} </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!--faq-area end-->
        <!--get-quote-area start-->
        <section class="get-quote-area pos-rel pt-185 pt-md-85 pt-xs-85">
            <div class="container">
                <div class="quote-wrapper-bg pr-40 pl-80 pt-80 pb-35">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="quote-form-left mb-30 pr-80 mr-65 pr-lg-20 mr-lg-0 pr-md-0 pl-md-0">
                                <h3 class="mb-20">{{ __('home.get_quote_title') }}</h3>
                                <h5 class="mb-30">{{ __('home.get_quote_subtitle') }}</h5>
                                
                                @if (session('service_request_success'))
                                    <div class="alert alert-success mb-15">
                                        {{ session('service_request_success') }}
                                    </div>
                                @endif

                                <form class="quote-form mb-15" wire:submit.prevent="submitServiceRequest">
                                    <div class="choice-list">
                                        <span class="input-title">Service</span>
                                        <select class="select-product" wire:model="service" name="select-value" id="select-area">
                                            <option value="">{{ __('home.service_select_placeholder') }}</option>
                                            <option value="Business Setup & India Entry">{{ __('home.service_business_setup') }}</option>
                                            <option value="Regulatory & FEMA Advisory">{{ __('home.service_regulatory_fema') }}</option>
                                            <option value="Intellectual Property Rights (IPR)">{{ __('home.service_intellectual_property') }}</option>
                                            <option value="Corporate Secretarial & Compliance Management">{{ __('home.service_corporate_secretarial') }}</option>
                                            <option value="Corporate Transactions & Legal Documentation">{{ __('home.service_corporate_transactions') }}</option>
                                        </select>
                                        @error('service') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="email-input">
                                        <label class="input-title">{{ __('home.email_label') }}</label>
                                        <input type="email" wire:model="email" placeholder="{{ __('home.email_placeholder') }}">
                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="email-input">
                                        <label class="input-title">{{ __('home.phone_label') }}</label>
                                        <input type="text" wire:model="phone" placeholder="{{ __('home.phone_placeholder') }}">
                                        @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <button type="submit" class="theme_btn3 q-btn-lg mb-10">{{ __('button.send_message') }}</button>
                                </form>
                                <p class="review-text">{{ __('home.been_here_before') }}</p>
                                <p class="review-text">{{ __('home.questions_call_team') }} <a href="tel:{{ setting('phone_number', '+91-9821008011') }}">{{ setting('phone_number', '+91-9821008011') }}</a></p>

                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="quote-wrapper mb-30">
                                <div class="section-title section-title-4 text-center text-md-left">
                                    <h3 class="mb-20">{{ __('home.build_business_title') }}</h3>
                                    <h5 class="mb-45">{{ __('home.build_business_subtitle') }}</h5>
                                    <p>{{ __('home.need_quick_help') }}</p>
                                    <span class="number"><b>{{ __('home.call_label') }}</b> <a href="tel:{{ setting('phone_number', '+91-9821008011') }}">{{ setting('phone_number', '+91-9821008011') }}</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--get-quote-area end-->
        <!--blog-area start-->
        <section class="blog-area yellow-soft-bg pt-315 pb-265 pt-md-100 pt-xs-100 pb-md-100 pb-xs-100">
            <div class="container">
                <div class="row justify-content-center pt-100 pt-md-0 pt-xs-0">
                    <div class="col-lg-8">
                        <div class="blog-title-wrapper">
                            <div class="section-title section-title-4 text-center mb-85">
                                <h6 class="mb-30">{{ __('home.blog_news_updates') }}</h6>
                                <h3>{{ __('home.blog_latest_title') }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @forelse($blogs as $index => $blog)
                        <div class="col-xl-4 col-lg-4 col-md-4">
                            <div class="blogs-2 blogs-3 mb-30 wow fadeInUp2 animated" data-wow-delay="{{ ($index + 1) * 0.2 }}s">
                                <div class="blogs__thumb mb-20">
                                    <img class="img-fluid" src="{{ $blog['featured_image'] ? asset('storage/'.$blog['featured_image']) : asset('assets/img/blog/04.jpg') }}" alt="{{ $blog['title'] }}">
                                </div>
                                <div class="blogs__content">
                                    <span class="date-tag mb-15">{{ $blog['created_at']->format('d M, Y') }}</span>
                                    <h3 class="blog-title mb-20"><a href="{{ route('blog.view', ['locale' => app()->getLocale(), 'slug' => $blog['slug']]) }}">{{ Str::limit($blog['title'], 50) }}</a></h3>
                                    <a class="blog-btn" href="{{ route('blog.view', ['locale' => app()->getLocale(), 'slug' => $blog['slug']]) }}">{{ __('home.blog_read_more') }} <img src="{{ asset('assets/img/icon/chevron.svg') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="text-center">{{ __('home.blog_no_blogs') }}</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
        <!--blog-area end-->
        <!--subscribe-letter-area start-->
        <section class="subscribe-letter-area pb-50">
            <div class="container">
                <div class="sub-bg-h3 pt-40 pb-25 pr-50 pl-40">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <div class="subscribe-wrapper">
                                <div class="section-title section-title-4 text-center text-md-left mb-30">
                                    <h3 class="mb-10">{{ __('home.subscribe_title') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="get-quote-btn text-center text-md-right mb-30">
                                <a href="{{route('contact',['locale' => app()->getLocale()])}}" class="theme_btn theme_btn3 sub-btn">{{ __('button.start_your_consultation') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--subscribe-letter-area end-->
    </main>
    <!--footer-area start-->
</div>