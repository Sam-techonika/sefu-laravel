<div>
  <!-- Page Title -->
  <section class="page-title-area pb-60 pt-240 pt-md-180 pt-xs-140">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-7">
          <div class="page-title-wrapper services-title-wrapper">
            <h1 class="page-title mb-20">{{ __('serviceMain.page_title') }}</h1>
            <h4 class="sub-title mb-0 info-text">{{ __('serviceMain.page_subtitle') }}</h4>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Page Title end -->

  <!-- Services Grid -->
  <section class="services-area pt-80 pb-80 pt-md-60 pb-md-50 pt-xs-40 pb-xs-40">
    <div class="container">
      <div class="row">
        @forelse($services as $index => $service)
          @php
            $translation = $service->translations->where('locale', app()->getLocale())->first();
            $delay = '.'. (($index % 6) + 1) . 's';
            $defaultImage = 'ai' . (($index % 6) + 1) . '.svg';
          @endphp
          
          @if($translation)
          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="service-card mb-30 wow fadeInUp2 animated" data-wow-delay="{{ $delay }}">
              <div class="service-cover">
                @if($service->image)
                  <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $translation->title }}">
                @else
                  <img src="{{ asset('assets/img/ai/' . $defaultImage) }}" alt="{{ $translation->title }}">
                @endif
              </div>
              <h3 class="service-title">{{ $translation->title }}</h3>
              
              @if($translation->service_highlights && count($translation->service_highlights) > 0)
              <ul class="service-list">
                @foreach($translation->service_highlights as $highlight)
                  <li>{{ $highlight['title'] ?? $highlight }}</li>
                @endforeach
              </ul>
              @elseif($translation->description)
              <p class="service-desc">{{ Str::limit(strip_tags($translation->description), 120) }}</p>
              @endif
              
              <div class="service-cta">
                <a wire:navigate href="{{ route('service.view', ['locale' => app()->getLocale(), 'slug' => $translation->slug]) }}" class="theme_btn theme_btn3">
                  {{ __('serviceMain.learn_more') }} <i class="far fa-chevron-right"></i>
                </a>
              </div>
            </div>
          </div>
          @endif
        @empty
          <div class="col-12">
            <div class="text-center py-5">
              <h4>{{ __('serviceMain.no_services_title') }}</h4>
              <p class="text-muted">{{ __('serviceMain.no_services_text') }}</p>
            </div>
          </div>
        @endforelse
      </div>

      <!-- Bottom CTA -->
      <div class="row justify-content-center mt-30">
        <div class="col-lg-10">
          <div class="subs-letter-bg grey-bg-soft pt-45 pb-45 text-center">
            <h3 class="mb-15">{{ __('serviceMain.cta_title') }}</h3>
            <h4 class="sub-title mb-30">{{ __('serviceMain.cta_subtitle') }}</h4>
            <a href="https://wa.me/919821008011" target="_blank" class="theme_btn theme_btn3">
              <i class="fab fa-whatsapp" style="margin-right: 6px;"></i> {{ __('serviceMain.cta_button') }}
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Services Grid end -->

  @push('styles')
  <style>
    .service-card {
      background: #fff;
      border: 1px solid #efefef;
      border-radius: 10px;
      padding: 0 24px 24px 24px;
      height: 100%;
      position: relative;
      display: flex;
      flex-direction: column;
      align-items: center;
      /* ✅ centers inner elements */
      text-align: center;
      /* ✅ centers text too */
      transition: all .25s ease;
    }

    .service-card:hover {
      box-shadow: 0 15px 35px rgba(0, 0, 0, .06);
      transform: translateY(-4px);
      border-color: #ffd6d6;
    }

    /* Cover */
    .service-cover {
      width: 100%;
      height: 140px;
      background: #fff7f7;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
      margin: 0 -24px 18px -24px;
      display: flex;
      align-items: center;
      justify-content: center;
      /* ✅ centers image */
      overflow: hidden;
    }

    .service-cover img {
      max-height: 100%;
      width: auto;
      object-fit: contain;
    }

    /* Icon */
    .service-icon {
      width: 54px;
      height: 54px;
      border-radius: 12px;
      background: #fff2f2;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 16px auto;
      /* ✅ centers icon */
    }

    .service-icon img {
      max-width: 28px;
    }

    /* Title & List */
    .service-title {
      font-size: 20px;
      font-weight: 700;
      color: #111;
      margin-bottom: 12px;
    }

    .service-list {
      margin: 0 0 18px 0;
      padding: 0;
      list-style: none;
    }

    .service-list li {
      position: relative;
      padding-left: 22px;
      color: #555;
      margin-bottom: 8px;
      line-height: 1.6;
      text-align: left;
      /* ✅ keeps list left-aligned */
    }

    .service-list li:before {
      content: "";
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: #ff1f1f;
      position: absolute;
      left: 0;
      top: 10px;
    }

    /* CTA Button */
    .service-cta {
      margin-top: auto;
      text-align: center;
      /* ✅ centers button */
    }

    .service-cta .theme_btn {
      padding: 10px 18px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
    }

    @media (max-width: 991px) {
      .service-title {
        font-size: 18px;
      }

      .service-icon {
        width: 50px;
        height: 50px;
      }

      .service-icon img {
        max-width: 26px;
      }

      .service-cover {
        height: 120px;
      }
    }
  </style>
  @endpush
</div>