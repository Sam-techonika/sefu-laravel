<div>
    <footer class="footer-area fix pt-60">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6  wow fadeInUp2 animated" data-wow-delay='.1s'>
                    <div class="footer__widget fot_widget_h3 text-center text-md-left pos-rel mb-30">
                        <div class="footer-log mb-40">
                            <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="logo">
                                <img width="100" src="{{ setting('logo') ? asset('storage/'.setting('logo')) : asset('assets/img/logo/logo2.png') }}" alt="{{ setting('site_name', 'Logo') }}">
                            </a>
                        </div>
                        <ul class="contact-list">
                            <li>
                                <h5>
                                    <a href="mailto:{{ setting('email', __('footer.contact_email')) }}">
                                        {{ setting('email', __('footer.contact_email')) }}
                                    </a>
                                </h5>
                            </li>
                            <li>
                                <h5>
                                    <a href="tel:{{ setting('phone_number', __('footer.contact_phone')) }}">
                                        {{ setting('phone_number', __('footer.contact_phone')) }}
                                    </a>
                                </h5>
                            </li>
                        </ul>


                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-6 wow fadeInUp2 animated" data-wow-delay='.3s'>
                    <div class="footer__widget fot_widget_h3 text-center text-md-left mb-30 pl-40">
                        <h4 class="widget-title mb-40">{{ __('footer.links_title') }}</h4>
                        <ul class="fot-list">
                            @php
                            $links = [
                            'home', 'service', 'about', 'testimonials', 'case.study'
                            ];
                            @endphp
                            @foreach($links as $name)
                            @if(\Illuminate\Support\Facades\Route::has($name))
                            <li>
                                <a href="{{ route($name, ['locale' => app()->getLocale()]) }}">{{ __('footer.links.'.$name) != 'footer.links.'.$name ? __('footer.links.'.$name) : ucfirst(str_replace(['.', '-'], ' ', $name)) }}</a>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-md-6  wow fadeInUp2 animated" data-wow-delay='.5s'>
                    <div class="footer__widget fot_widget_h3 text-center text-md-left mb-25 pl-85">
                        <h4 class="widget-title mb-40">{{ __('footer.help_title') }}</h4>
                        <ul class="fot-list">
                            @php
                            $help = ['faq', 'blogs', 'contact'];
                            @endphp
                            @foreach($help as $name)
                            @if(\Illuminate\Support\Facades\Route::has($name))
                            <li>
                                <a href="{{ route($name, ['locale' => app()->getLocale()]) }}">{{ __('footer.help.'.$name) != 'footer.help.'.$name ? __('footer.help.'.$name) : ucfirst($name) }}</a>
                            </li>
                            @endif
                            @endforeach
                            <li>
                                <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}">{{ __('footer.help.support') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-6  wow fadeInUp2 animated" data-wow-delay='.7s'>
                    <div class="footer__widget fot_widget_h3 text-center text-md-left mb-30 pl-30">
                        <h4 class="widget-title mb-40">{{ __('footer.address_title') }}</h4>
                        <!-- <p class="mb-15">{{ setting('address', __('footer.address_text')) }}</p> -->
                        <div class="footer-social mb-40">
                            @foreach(['facebook','twitter','linkedin','google'] as $net)
                            @if(config('services.social.'.$net))
                            <a href="{{ config('services.social.'.$net) }}"><i class="fab fa-{{ $net == 'google' ? 'google-plus-g' : $net }}"></i></a>
                            @else
                            <a href="#"><i class="fab fa-{{ $net == 'google' ? 'google-plus-g' : $net }}"></i></a>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!--scroll-target-btn-->
            <!-- <a href="#top-menu" class="scroll-target"><i class="far fa-arrow-up"></i></a> -->
            <!--scroll-target-btn-->
            <div class="copy-right-area pt-50">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="copyright mb-40 text-center">
                            <p>{{ str_replace(':year', date('Y'), __('footer.copyright')) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>