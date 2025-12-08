<div>
    <main>
        <!--page-title-area start-->
        <section class="page-title-area page-area-two page-t-height pb-155" style="background-image: url({{asset('assets/img/page-title/tm1.jpg')}})">
            <div class="page-title-img" style="background-image: url({{asset('assets/img/page-title/tm1.jpg')}});">
                <h1 class="title-text d-none d-lg-inline-block">{{ __('testimonial.page_title') }}</h1>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-12">
                        <div class="page-title-wrapper page-wrapper-team page-wrapper-white pt-240 pt-md-200 pt-xs-150">
                            <h1 class="page-title mb-60">
                                {{ __('testimonial.hero_title') }}
                            </h1>

                            <h4 class="sub-title mb-35 pr-80 pr-xs-0">
                           {{ __('testimonial.hero_subtitle') }}

                            </h4>

                        </div>
                    </div>
                </div>
            </div>
            <h1 class="page-style-text d-none">{{ __('testimonial.page_title') }}</h1>
        </section>
        <!--page-title-area end-->
        <!--client-feedback-area start-->
        <section class="client-feedback-area cf-area-three pos-rel pt-100 pb-100 pt-md-85 pb-mb-60 pt-xs-85 pb-xs-100">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="testimonial-text-wrapper">
                            <div class="section-title text-center mb-10">
                                <h3 class="mb-25">{{ __('testimonial.what_client_say') }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row no-gutters justify-content-center">
                    <div class="col-lg-9">
                        <div class="feedback-active4 owl-carousel">
                            @forelse($testimonials as $testimonial)
                            @php
                            $translation = $testimonial->translation;
                            @endphp
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
                                    <h4 class="sub-title mb-25">{{ __('testimonial.no_testimonials') }}</h4>
                                    <h5 class="mb-10">-</h5>
                                    <h6>-</h6>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--client-feedback-area end-->
        <!--client-feedback-area start-->
        <section class="client-feedback-area testimonial-style-one pos-rel pt-100 pb-150 pt-md-85 pb-mb-60 pt-xs-85 pb-xs-60">
            <div class="feedback-img-wrapper" style="background-image: url({{asset('assets/img/testimonial/01.jpg')}});">
                <h1 class="title-text">{{ __('testimonial.testimonial_client') }}</h1>
            </div>
            <div class="container">
                <div class="row justify-content-center justify-content-xl-end">
                    <div class="col-xl-5 col-lg-8">
                        <div class="testimonial-text-wrapper mb-30 mb-md-0 mb-xs-0">
                            <div class="section-title text-center text-xl-left">
                                <h3 class="mb-25">{{ __('testimonial.satisfied_customer') }}</h3>
                                <h4 class="sub-title mb-15 mb-md-0 mb-xs-0">{{ __('testimonial.satisfied_subtitle') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container feedback-wrap">
                <div class="feedback-active owl-carousel">
                    @forelse($testimonials as $testimonial)
                    @php
                    $translation = $testimonial->translation;
                    @endphp
                    @if($translation)
                    <div class="feedback-item">
                        <div class="feedback-inner-content">
                            <div class="quote-icon mb-25">
                                <img src="{{asset('assets/img/icon/icon10.svg')}}" alt="">
                            </div>
                            <h4 class="inner-text mb-35">{{ Str::limit($translation->content, 120) }}</h4>
                            <div class="client-box">
                                <div class="client-img">
                                    @if($translation->photo)
                                    <img height="30" width="30" style="border-radius:100%;" src="{{ asset('storage/' . $translation->photo) }}" alt="{{ Str::limit($testimonial->name, 20) }}">
                                    @else
                                    @if($translation->gender === 'female')
                                    <img height="30" width="30" style="border-radius:100%;" src="{{ asset('assets/img/testimonial/female-avatar.jpg') }}" alt="{{ Str::limit($testimonial->name, 20) }}">
                                    @elseif($translation->gender === 'male')
                                    <img height="30" width="30" style="border-radius:100%;" src="{{ asset('assets/img/testimonial/male-avatar.png') }}" alt="{{ Str::limit($testimonial->name, 20) }}">
                                    @else
                                    <img height="30" width="30" style="border-radius:100%;" src="{{ asset('assets/img/testimonial/default-avatar.png') }}" alt="{{ Str::limit($testimonial->name, 20) }}">
                                    @endif
                                    @endif
                                </div>
                                <h5>{{ Str::limit($testimonial->name, 25) }}</h5>
                                <p>{{ Str::limit($translation->address ?? __('testimonial.customer'), 30) }}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                    @empty
                    <div class="feedback-item">
                        <div class="feedback-inner-content">
                            <div class="quote-icon mb-25">
                                <img src="{{asset('assets/img/icon/icon10.svg')}}" alt="">
                            </div>
                            <h4 class="inner-text mb-35">{{ __('testimonial.no_testimonials') }}</h4>
                            <div class="client-box">
                                <div class="client-img">
                                    <img src="{{ asset('assets/img/testimonial/default-avatar.png') }}" alt="Default">
                                </div>
                                <h5>-</h5>
                                <p>-</p>
                            </div>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>
        <!--client-feedback-area end-->
        <!--subscribe-letter-area start-->
        <section class="subscribe-letter-area pt-50 pb-115">
            <div class="container">
                <div class="subs-letter-bg grey-bg-soft pt-65 pb-55">
                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                            <div class="subscribe-wrapper">
                                <div class="section-title text-center">
                                    <h3 class="mb-25">{{ __('testimonial.cta_title') }}</h3>
                                    <h4 class="sub-title mb-50">{{ __('testimonial.cta_subtitle') }}</h4>
                                    <a href="{{ route('contact',['locale' => app()->getLocale()]) }}" class="theme_btn sub-btn">{{ __('testimonial.cta_button') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
</div>