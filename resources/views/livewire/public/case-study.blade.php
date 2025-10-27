<div>
@push('styles')
<style>
    .case-wrapper {
        background : #fff;
        border: 1px solid #efefef;
        border-radius: 14px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.04);
        transition: box-shadow .25s, transform .25s;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        height: 100%;
        position: relative;
    }
    .case-wrapper:hover {
        box-shadow: 0 12px 32px rgba(255,31,31,0.10);
        transform: translateY(-4px);
        border-color: #ffd6d6;
    }
    .case-img {
        width: 100%;
        height: 180px;
        background : #fff7f7;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        margin-bottom: 0;
    }
    .case-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-top-left-radius: 14px;
        border-top-right-radius: 14px;
        transition: transform .3s;
    }
    .case-wrapper:hover .case-img img {
        transform: scale(1.05);
    }
    .case-tag {
        display: inline-block;
        background : #fff2f2;
        color: #ff1f1f;
        font-size: 13px;
        font-weight: 600;
        border-radius: 8px;
        padding: 4px 14px;
        margin-bottom: 10px;
        letter-spacing: 0.5px;
    }
    .case-title {
        font-size: 20px;
        font-weight: 700;
        color: #111;
        margin-bottom: 12px;
    }
    .case-text {
        padding: 22px 18px 18px 18px;
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }
    .case-text p {
        color: #555;
        margin-bottom: 18px;
        font-size: 16px;
        line-height: 1.6;
    }
    .theme_btn3 {
        padding: 8px 18px;
        border-radius: 8px;
        font-size: 15px;
        font-weight: 600;
        background : #ff1f1f;
        color: #fff;
        transition: background .2s;
        box-shadow: 0 2px 8px rgba(255,31,31,0.08);
    }
    .theme_btn3:hover {
        background : #d90000;
        color: #fff;
    }
    .case-icon {
        position: absolute;
        top: 14px;
        right: 14px;
        width: 38px;
        height: 38px;
        background : #fff2f2;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 8px rgba(255,31,31,0.08);
    }
    .case-icon img {
        width: 22px;
        height: 22px;
    }
    @media (max-width: 991px) {
        .case-title { font-size: 18px; }
        .case-img { height: 140px; }
    }
</style>
@endpush
    <!--page-title-area start-->
<section class="page-title-area pb-60 pt-240 pt-md-180 pt-xs-140 text-center">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="page-title-wrapper d-flex flex-column align-items-center justify-content-center services-title-wrapper text-center">
          <h1 class="page-title mb-20">
            Success <span class="round-line">Story</span>
          </h1>
          <h4 class="sub-title mb-0 info-text">
            End-to-end legal, regulatory and compliance support for India entry and growth.
          </h4>
        </div>
      </div>
    </div>
  </div>
</section>

    <!--page-title-area end-->

    <!--case-area start-->
    <section class="case-area pt-120 pb-80 pt-md-80 pt-xs-60 pb-md-50 pb-xs-30">
        <div class="container">
            <div class="row">
                <!-- Case Study 1 -->
                <div class="col-lg-4 col-md-6 mb-40">
                    <div class="case-wrapper">
                        <div class="case-img">
                            <a href="{{ route('case.study.view', ['locale' => app()->getLocale()]) }}"><img class="img-fluid" src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80" alt="Business Expansion"></a>
                            <span class="case-icon"><img src="/assets/img/icon/icon3.svg" alt="Business Setup"></span>
                        </div>
                        <div class="case-text">
                            <span class="case-tag">Business Setup</span>
                            <h3 class="case-title"><a href="{{ route('case.study.view', ['locale' => app()->getLocale()]) }}">Business Expansion in India</a></h3>
                            <p>How we helped a global tech company set up operations, navigate regulations, and achieve rapid growth in the Indian market.</p>
                            <a href="{{ route('case.study.view', ['locale' => app()->getLocale()]) }}" class="theme_btn theme_btn3">Read More <i class="far fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Case Study 2 -->
                <div class="col-lg-4 col-md-6 mb-40">
                    <div class="case-wrapper">
                        <div class="case-img">
                            <a href="{{ route('case.study.view', ['locale' => app()->getLocale()]) }}"><img class="img-fluid" src="https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=600&q=80" alt="Trademark Registration"></a>
                            <span class="case-icon"><img src="/assets/img/icon/icon9.svg" alt="IPR"></span>
                        </div>
                        <div class="case-text">
                            <span class="case-tag">IPR Services</span>
                            <h3 class="case-title"><a href="{{ route('case.study.view', ['locale' => app()->getLocale()]) }}">Trademark Registration Success</a></h3>
                            <p>Securing intellectual property for a fashion brand, including trademark registration and protection against infringement.</p>
                            <a href="{{ route('case.study.view', ['locale' => app()->getLocale()]) }}" class="theme_btn theme_btn3">Read More <i class="far fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Case Study 3 -->
                <div class="col-lg-4 col-md-6 mb-40">
                    <div class="case-wrapper">
                        <div class="case-img">
                            <a href="{{ route('case.study.view', ['locale' => app()->getLocale()]) }}"><img class="img-fluid" src="https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=600&q=80" alt="Foreign National Entry"></a>
                            <span class="case-icon"><img src="/assets/img/icon/icon7.svg" alt="Foreign Investment"></span>
                        </div>
                        <div class="case-text">
                            <span class="case-tag">Foreign Investment</span>
                            <h3 class="case-title"><a href="{{ route('case.study.view', ['locale' => app()->getLocale()]) }}">Foreign National Entry</a></h3>
                            <p>Guiding a foreign entrepreneur through the process of starting a business in India, including regulatory and financial advisory.</p>
                            <a href="{{ route('case.study.view', ['locale' => app()->getLocale()]) }}" class="theme_btn theme_btn3">Read More <i class="far fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Case Study 4 -->
                <div class="col-lg-4 col-md-6 mb-40">
                    <div class="case-wrapper">
                        <div class="case-img">
                            <a href="{{ route('case.study.view', ['locale' => app()->getLocale()]) }}"><img class="img-fluid" src="https://images.unsplash.com/photo-1521737852567-6949f3f9f2b5?auto=format&fit=crop&w=600&q=80" alt="Corporate Compliance"></a>
                            <span class="case-icon"><img src="/assets/img/icon/icon4.svg" alt="Compliance"></span>
                        </div>
                        <div class="case-text">
                            <span class="case-tag">Compliance</span>
                            <h3 class="case-title"><a href="{{ route('case.study.view', ['locale' => app()->getLocale()]) }}">Corporate Compliance Management</a></h3>
                            <p>Helping a manufacturing firm streamline compliance and reporting, reducing risk and improving efficiency.</p>
                            <a href="{{ route('case.study.view', ['locale' => app()->getLocale()]) }}" class="theme_btn theme_btn3">Read More <i class="far fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Case Study 5 -->
                <div class="col-lg-4 col-md-6 mb-40">
                    <div class="case-wrapper">
                        <div class="case-img">
                            <a href="{{ route('case.study.view', ['locale' => app()->getLocale()]) }}"><img class="img-fluid" src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=600&q=80" alt="Legal Documentation"></a>
                            <span class="case-icon"><img src="/assets/img/icon/icon21.svg" alt="Legal Services"></span>
                        </div>
                        <div class="case-text">
                            <span class="case-tag">Legal Services</span>
                            <h3 class="case-title"><a href="{{ route('case.study.view', ['locale' => app()->getLocale()]) }}">Legal Documentation & Transactions</a></h3>
                            <p>Drafting and managing legal documents for a real estate company, ensuring smooth transactions and regulatory compliance.</p>
                            <a href="{{ route('case.study.view', ['locale' => app()->getLocale()]) }}" class="theme_btn theme_btn3">Read More <i class="far fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Case Study 6 -->
                <div class="col-lg-4 col-md-6 mb-40">
                    <div class="case-wrapper">
                        <div class="case-img">
                            <a href="{{ route('case.study.view', ['locale' => app()->getLocale()]) }}"><img class="img-fluid" src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=600&q=80" alt="Regulatory Advisory"></a>
                            <span class="case-icon"><img src="/assets/img/icon/tick2.svg" alt="FEMA Advisory"></span>
                        </div>
                        <div class="case-text">
                            <span class="case-tag">FEMA Advisory</span>
                            <h3 class="case-title"><a href="{{ route('case.study.view', ['locale' => app()->getLocale()]) }}">Regulatory & FEMA Advisory</a></h3>
                            <p>Advising a fintech startup on FEMA regulations, helping them launch new products and stay compliant.</p>
                            <a href="{{ route('case.study.view', ['locale' => app()->getLocale()]) }}" class="theme_btn theme_btn3">Read More <i class="far fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--case-area end-->

    <!--subscribe-letter-area start-->
    <section class="subscribe-letter-area pt-50 pb-115">
        <div class="container">
            <div class="subs-letter-bg grey-bg-soft pt-65 pb-55">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="subscribe-wrapper">
                            <div class="section-title text-center">
                                <h3 class="mb-25">Ready to start your own <span class="round-line">Success Story?</span></h3>
                                <h4 class="sub-title mb-50">Book a free call and let our experts guide you — no cancellation fees, no risk.</h4>
                                <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" class="theme_btn theme_btn3">Get your free quote <i class="far fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--subscribe-letter-area end-->

</div>