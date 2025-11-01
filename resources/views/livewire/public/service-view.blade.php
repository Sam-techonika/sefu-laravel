<div>
    <!-- Hero / Title -->
    <section class="page-title-area pb-60 pt-200 pt-md-160 pt-xs-130">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="page-title-wrapper services-title-wrapper">
                        <h1 class="page-title mb-15">{{ $title }}</h1>
                        <h4 class="sub-title info-text mb-0">{{ $subtitle }}</h4>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block text-right">
                    <img class="img-fluid" src="{{ $coverImage }}" alt="{{ $title }} illustration" style="max-height: 220px;">
                </div>
            </div>
        </div>
    </section>

    <!-- Description -->
    @if($description)
    <section class="pt-10 pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="ck-content mb-10">{!! nl2br(e($description)) !!}</div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Overview -->
    @if($overview)
    <section class="pt-10 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="section-title mb-15">
                        <h3>Overview</h3>
                    </div>
                    <div class="ck-content">{!! nl2br(e($overview)) !!}</div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Why Choose Us -->
    <section class="pt-30 pb-30 grey-bg-soft">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-20 mb-lg-0">
                    <div class="section-title mb-15">
                        <h3>Why Choose Us</h3>
                    </div>
                    <ul class="benefit-list">
                        <li>
                            <span class="b-icon"><img src="{{ asset('assets/img/icon/tick.svg') }}" alt=""></span>
                            <span class="b-text">Expert team with years of industry experience</span>
                        </li>
                        <li>
                            <span class="b-icon"><img src="{{ asset('assets/img/icon/tick.svg') }}" alt=""></span>
                            <span class="b-text">Compliance-first approach for peace of mind</span>
                        </li>
                        <li>
                            <span class="b-icon"><img src="{{ asset('assets/img/icon/tick.svg') }}" alt=""></span>
                            <span class="b-text">End-to-end support throughout the process</span>
                        </li>
                        <li>
                            <span class="b-icon"><img src="{{ asset('assets/img/icon/tick.svg') }}" alt=""></span>
                            <span class="b-text">Fast turnaround with transparent timelines</span>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="subs-letter-bg white-bg pt-35 pb-35 pl-30 pr-30 radius-10">
                        <h4 class="mb-10">What you get</h4>
                        <p class="mb-0">Comprehensive service delivery with expert guidance and ongoing support tailored to your business needs.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How it works -->
    @if(!empty($howItWorks) && count($howItWorks) > 0)
    <section class="pt-60 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="section-title mb-30">
                        <h3>How it works</h3>
                    </div>
                    <div class="steps">
                        @foreach($howItWorks as $index => $step)
                            <div class="step-item">
                                <div class="step-index">{{ $index + 1 }}</div>
                                <div class="step-content">
                                    <h5 class="mb-5">{{ $step['title'] ?? '' }}</h5>
                                    <p class="mb-0">{{ $step['description'] ?? '' }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Deliverables -->
    @if(!empty($deliverables) && count($deliverables) > 0)
    <section class="pt-20 pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="section-title mb-15">
                        <h3>Deliverables</h3>
                    </div>
                    <ul class="deliverables">
                        @foreach($deliverables as $deliverable)
                            <li><i class="far fa-check-circle"></i> {{ $deliverable['title'] ?? $deliverable }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- FAQ -->
    @if(!empty($faqs) && count($faqs) > 0)
    <section class="faq-area pt-60 pb-60 pt-md-40 pb-md-40">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title text-center mb-40">
                        <h3 class="mb-10">Frequently Asked Questions</h3>
                        <p>Get quick answers to common queries about this service.</p>
                    </div>
                    <div class="faq-que faq-que-2 mb-10">
                        <div id="accordionService">
                            @foreach($faqs as $idx => $faq)
                            <div class="card">
                                <div class="card-header" id="h{{ $idx }}">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link {{ $idx !== 0 ? 'collapsed' : '' }}" data-toggle="collapse" data-target="#c{{ $idx }}" aria-expanded="{{ $idx === 0 ? 'true' : 'false' }}" aria-controls="c{{ $idx }}">
                                            {{ $faq['question'] }}
                                        </button>
                                    </h5>
                                </div>
                                <div id="c{{ $idx }}" class="collapse {{ $idx === 0 ? 'show' : '' }}" aria-labelledby="h{{ $idx }}" data-parent="#accordionService">
                                    <div class="card-body">{{ $faq['answer'] }}</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="get-answer text-center mt-20">
                        <h4 class="mb-15">Still have questions?</h4>
                        <a wire:navigate href="{{ route('contact',app()->getLocale()) }}" class="theme_btn faq-btn">{{ __('button.contact_us') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- CTA -->
    <section class="subscribe-letter-area pt-30 pb-80">
        <div class="container">
            <div class="subs-letter-bg grey-bg-soft pt-45 pb-45">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="subscribe-wrapper text-center">
                            <div class="section-title">
                                <h3 class="mb-15">Ready to start your India journey?</h3>
                                <h4 class="sub-title mb-30">Book a 20‑minute consultation. Well map the fastest compliant route.</h4>
                                <a wire:navigate href="{{ route('contact',app()->getLocale()) }}" class="theme_btn theme_btn3">{{ __('button.book_consultation') }} <i class="far fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('styles')
    <style>
        .ck-content p { color:#555; line-height:1.9; }
        .benefit-list { list-style:none; padding:0; margin:0; }
        .benefit-list li { display:flex; align-items:flex-start; gap:12px; margin-bottom:12px; }
        .benefit-list .b-icon { width:22px; height:22px; background:#fff2f2; border-radius:6px; display:flex; align-items:center; justify-content:center; }
        .benefit-list .b-icon img{ max-width:12px; }
        .benefit-list .b-text{ color:#333; }

        .steps { position:relative; }
        .step-item { display:flex; gap:16px; position:relative; padding-bottom:18px; }
        .step-item:not(:last-child):after { content:""; position:absolute; left:14px; top:30px; width:2px; height:calc(100% - 30px); background:#ffe1e1; }
        .step-index { min-width:28px; height:28px; border-radius:50%; background:#ff1f1f; color:#fff; font-weight:700; display:flex; align-items:center; justify-content:center; font-size:13px; }
        .step-content h5{ margin:0; font-weight:700; }
        .step-content p{ margin:6px 0 0 0; color:#555; }

        .deliverables { list-style:none; padding:0; margin:0; columns:1; column-gap:40px; }
        .deliverables li { margin-bottom:10px; color:#333; break-inside:avoid; }
        .deliverables i { color:#28a745; margin-right:8px; }
        @media(min-width:992px){ .deliverables{ columns:2; } }

        /* FAQ */
        .faq-area .btn-link { color:#111; padding:18px 24px; text-align:left; width:100%; }
        .faq-area .btn-link:hover { color:#ff1f1f; text-decoration:none; }
        .faq-area .card { border:1px solid #eee; border-radius:6px; margin-bottom:12px; }
        .faq-area .card-body { color:#555; line-height:1.8; }
        .faq-btn { background:#ff1f1f; color:#fff; padding:12px 28px; border-radius:5px; display:inline-block; }
    </style>
    @endpush
</div>
