    <div>
        <section class="page-title-area pb-75 pt-240 pt-md-200 pt-xs-150">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="page-title-wrapper page-title-blog">
                            <h1 class="page-title mb-35"><span class="round-line">Send</span> message anytime. </h1>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="page-title-wrapper pl-45 pl-md-0 pl-xs-0">
                            <h4 class="sub-title mb-35">Contact us for inquiries, technical support, or partnership opportunities. Our team is here to assist you.</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--page-title-area end-->
        <!--address-details-area start-->
        <section class="address-details-area pb-30 pb-md-20 pb-xs-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <!-- <div class="address-box text-center mb-50 pl-45 pr-45">
                            <span class="loc-icon mb-25" style="display:inline-block;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--theme-color, #ff1f1f)" viewBox="0 0 24 24">
                                    <path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2a1.003 1.003 0 011.01-.24c1.12.37 2.33.57 3.58.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1C10.07 21 3 13.93 3 5c0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.46.57 3.58.13.34.05.73-.24 1.01l-2.2 2.2z"/>
                                </svg>
                            </span>
                            <h4 class="sub-title mb-25">Our Location</h4>
                            <p>Danmondi, 7563 King Meadow Suite 896, USA</p>
                        </div> -->
                        <div class="address-box text-center mb-50 pl-45 pr-45">
                            <svg class="loc-icon mb-25" xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="var(--theme-color, #ff1f1f)" viewBox="0 0 24 24" style="margin-right:7px;">
                                <path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2a1.003 1.003 0 011.01-.24c1.12.37 2.33.57 3.58.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1C10.07 21 3 13.93 3 5c0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.46.57 3.58.13.34.05.73-.24 1.01l-2.2 2.2z" />
                            </svg>
                            <h4 class="sub-title mb-25">Phone</h4>
                            <p>
                                <a href="tel:{{ setting('phone_number', '879546213') }}" style="color:inherit;text-decoration:none;display:inline-flex;align-items:center;">

                                    {{ setting('phone_number', '879546213') }}
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="address-box text-center mb-50 pl-45 pr-45">
                            <img class="loc-icon mb-25" src="{{ asset('assets/img/icon/mail.svg') }}" alt="">
                            <h4 class="sub-title mb-25">Email</h4>
                            <p><a href="mailto:{{ setting('email', 'example@example.com') }}">{{ setting('email', 'example@example.com') }}</a></p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="address-box text-center mb-50 pl-45 pr-45">
                            <img class="loc-icon mb-25" src="{{ asset('assets/img/icon/chain.svg') }}" alt="">
                            <h4 class="sub-title mb-25">Get In Touch</h4>
                            <!-- <p>DAlso find us social media below</p> -->
                            <div class="footer-social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--address-details-area end-->
        <!--contact-form-area start-->
        <section class="contact-form-area pos-rel pt-65 pb-120 pb-xs-0">
            <div class="map-area">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d29170.22300629427!2d90.39828165!3d23.950612149999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1621964093436!5m2!1sen!2sbd"></iframe>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-6 col-md-6 offset-md-6">
                        <div class="contact-form pl-40 pl-lg-0 pl-md-0 pl-xs-0">
                            <h3 class="blog-details-title mb-45">Don’t hesitate to drop a line to us.</h3>

                            @if (session()->has('success'))
                            <div class="text-success">{{ session('success') }}</div>
                            @endif

                            <form class="quote-form" wire:submit.prevent="submit">
                                <div class="email-input">
                                    <label class="input-title">Your Name</label>
                                    <input type="text" wire:model.defer="name" placeholder="Enter your name">
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="email-input">
                                    <label class="input-title">Email</label>
                                    <input type="text" wire:model.defer="email" placeholder="Enter your email">
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="email-input">
                                    <label class="input-title">Phone</label>
                                    <input type="text" wire:model.defer="phone" placeholder="Enter your phone number">
                                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="email-input">
                                    <label class="input-title">Your Message</label>
                                    <textarea wire:model.defer="message" cols="30" rows="10" placeholder="Enter your message"></textarea>
                                    @error('message') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <button type="submit" class="theme_btn comments-btn">{{ __('button.send') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>