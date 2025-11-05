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
                                    <h1 class="main-title mb-35" data-animation="fadeInUp2" data-delay=".2s">Incorporate. Grow.<span style="color:#ff1f1f">comply </span> With Confidence</h1>
                                    <h3>Led by experienced Company Secretaries who make business setup, compliance, and filings seamless and stress-free.</h3>
                                    <ul class="input-box mt-70">
                                        <li>
                                            <form class="hero-form">
                                                <label>Email address</label>
                                                <input type="email" name="email" placeholder="ihidago@ujufidnan.gov">
                                            </form>
                                        </li>
                                        <li>
                                            <a href="https://wa.me/919821008011" class="theme_btn quote-btn theme_btn2 "><i class="fab fa-whatsapp" style="font-size:18px;"></i> Contact Us</a>
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
                                    <h1 class="main-title mb-35" data-animation="fadeInUp2" data-delay=".2s">Incorporate. Grow.<span style="color:#ff1f1f">comply </span> With Confidence</h1>
                                    <h3>Led by experienced Company Secretaries who make business setup, compliance, and filings seamless and stress-free.</h3>
                                    <ul class="input-box mt-70">
                                        <li>
                                            <form class="hero-form">
                                                <label>Email address</label>
                                                <input type="email" name="email" placeholder="ihidago@ujufidnan.gov">
                                            </form>
                                        </li>
                                        <li>
                                            <a href="https://wa.me/919821008011" class="theme_btn quote-btn theme_btn2 "><i class="fab fa-whatsapp" style="font-size:18px;"></i> Contact Us</a>
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

        <!-- Pricing Comparison Section -->
        <section class="pricing-comparison-section py-5" x-data="{ showComparison: false }">
            <div class="container">
                {{-- Section Header --}}
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-10 text-center">
                        <h2 class="section-title mb-3">Foreign Company Registration Plans</h2>
                        <p class="section-subtitle">Establish your Indian subsidiary with complete compliance support</p>
                    </div>
                </div>

                {{-- Pricing Cards --}}
                <div class="row g-4 mb-5">
                    {{-- Starter Plan --}}
                    <div class="col-lg-4 col-md-6">
                        <div class="pricing-card">
                            <div class="card-header">
                                <h3 class="plan-name">Starter Plan</h3>
                                <p class="plan-tagline">Incorporate your Indian Subsidiary or Company with all mandatory compliances.</p>
                            </div>

                            <div class="card-pricing">
                                <div class="price-amount">₹24,999</div>
                                <div class="price-note">Basic incorporation with essential registrations</div>
                            </div>

                            <button class="btn-cta btn-outline" wire:click="selectPlan('Starter Plan')">
                                Start Registration →
                            </button>

                            <div class="card-features">
                                <p class="features-title">Perfect for new foreign entities:</p>
                                <ul class="features-list">
                                    <li>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M13.3337 4L6.00033 11.3333L2.66699 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        Company Incorporation under MCA V3 (Private Limited / Branch / LO)
                                    </li>
                                    <li>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M13.3337 4L6.00033 11.3333L2.66699 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        DIN & DSC for Two Directors
                                    </li>
                                    <li>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M13.3337 4L6.00033 11.3333L2.66699 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        RBI / FEMA Approval Filing Support
                                    </li>
                                    <li>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M13.3337 4L6.00033 11.3333L2.66699 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        Foreign Investment Compliance Documentation
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- Compliance Plan (Featured) --}}
                    <div class="col-lg-4 col-md-6">
                        <div class="pricing-card featured">
                            <div class="popular-badge">Most Popular</div>
                            
                            <div class="card-header">
                                <h3 class="plan-name">Compliance Plan</h3>
                                <p class="plan-tagline">Complete setup with registered office and resident director support included.</p>
                            </div>

                            <div class="card-pricing">
                                <div class="price-amount">₹59,999</div>
                                <div class="price-note">Includes 6 months office & director support</div>
                            </div>

                            <button class="btn-cta btn-primary" wire:click="selectPlan('Compliance Plan')">
                                Get Compliance Setup →
                            </button>

                            <div class="card-features">
                                <p class="features-title">Everything in Starter, plus:</p>
                                <ul class="features-list">
                                    <li>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M13.3337 4L6.00033 11.3333L2.66699 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        Registered Office Address (6 Months included — ₹5,000/month)
                                    </li>
                                    <li>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M13.3337 4L6.00033 11.3333L2.66699 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        Resident Director Facilitation (6 Months included — ₹15,000/month)
                                    </li>
                                    <li>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M13.3337 4L6.00033 11.3333L2.66699 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        GST Registration & Setup
                                    </li>
                                    <li>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M13.3337 4L6.00033 11.3333L2.66699 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        Bank Account Opening Assistance
                                    </li>
                                    <li>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M13.3337 4L6.00033 11.3333L2.66699 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        Compliance Calendar & Advisory
                                    </li>
                                    <li>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M13.3337 4L6.00033 11.3333L2.66699 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        30-Minute CS Consultation
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- Complete Setup Plan --}}
                    <div class="col-lg-4 col-md-6">
                        <div class="pricing-card">
                            <div class="card-header">
                                <h3 class="plan-name">Complete Setup Plan</h3>
                                <p class="plan-tagline">Full-year support with office, resident director, and complete compliance management.</p>
                            </div>

                            <div class="card-pricing">
                                <div class="price-amount">₹149,999</div>
                                <div class="price-note">Includes 1 year complete support package</div>
                            </div>

                            <button class="btn-cta btn-outline" wire:click="selectPlan('Complete Setup Plan')">
                                Get Complete Setup →
                            </button>

                            <div class="card-features">
                                <p class="features-title">Everything in Compliance, plus:</p>
                                <ul class="features-list">
                                    <li>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M13.3337 4L6.00033 11.3333L2.66699 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        Registered Office Address (1 Year included — ₹60,000 value)
                                    </li>
                                    <li>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M13.3337 4L6.00033 11.3333L2.66699 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        Resident Director Services (1 Year — ₹180,000 value)
                                    </li>
                                    <li>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M13.3337 4L6.00033 11.3333L2.66699 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        1-Year CS Compliance Package (Full secretarial management – ₹35,000 value)
                                    </li>
                                    <li>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M13.3337 4L6.00033 11.3333L2.66699 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        Annual ROC Filings (FC-4, AOC-4, MGT-7A, etc.)
                                    </li>
                                    <li>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M13.3337 4L6.00033 11.3333L2.66699 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        RBI Annual Return Filing
                                    </li>
                                    <li>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M13.3337 4L6.00033 11.3333L2.66699 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        Priority FEMA & FDI Advisory
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Comparison Link --}}
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <a @click.prevent="showComparison = !showComparison" class="compare-link" style="cursor: pointer;">
                            <span x-show="!showComparison">Compare plan features</span>
                            <span x-show="showComparison">Hide comparison</span>
                            <svg x-show="!showComparison" width="16" height="16" viewBox="0 0 16 16" fill="none" style="display: inline-block; margin-left: 4px;">
                                <path d="M4 6L8 10L12 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <svg x-show="showComparison" width="16" height="16" viewBox="0 0 16 16" fill="none" style="display: inline-block; margin-left: 4px;">
                                <path d="M12 10L8 6L4 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
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
                                        <a @click.prevent="showComparison = false" class="compare-features-link" style="cursor: pointer;">Hide comparison</a>
                                    </div>
                                    {{-- Starter Plan Header --}}
                                    <div class="plan-column plan-header-box">
                                        <div class="plan-header-content">
                                            <h4 class="plan-name-header">Starter Plan</h4>
                                            <div class="plan-price-header">₹24,999</div>
                                            <button class="btn-header-cta btn-default" wire:click="selectPlan('Starter Plan')">
                                                Buy Now
                                            </button>
                                        </div>
                                    </div>
                                    {{-- Compliance Plan Header (Featured) --}}
                                    <div class="plan-column plan-header-box featured-header">
                                        <div class="plan-header-content">
                                            <h4 class="plan-name-header">Compliance Plan</h4>
                                            <div class="plan-price-header">₹59,999</div>
                                            <button class="btn-header-cta btn-featured" wire:click="selectPlan('Compliance Plan')">
                                                Buy Now
                                            </button>
                                            <div class="checkmark-below">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                    <path d="M13.3337 4L6.00033 11.3333L2.66699 8" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Complete Setup Header --}}
                                    <div class="plan-column plan-header-box">
                                        <div class="plan-header-content">
                                            <h4 class="plan-name-header">Complete Setup Plan</h4>
                                            <div class="plan-price-header">₹149,999</div>
                                            <button class="btn-header-cta btn-default" wire:click="selectPlan('Complete Setup Plan')">
                                                Buy Now
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
                                        <h5>Incorporation & Setup</h5>
                                    </div>
                                    
                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">Company Incorporation (Private Limited / Branch / LO)</span>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="plan-column featured">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">DIN & DSC for Two Directors</span>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="plan-column featured">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">RBI / FEMA Approval Filing Support</span>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="plan-column featured">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">Foreign Investment Compliance Documentation</span>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="plan-column featured">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">PAN & TAN Allotment</span>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="plan-column featured">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">Post-Incorporation Docs (Share Certificates, Registers)</span>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="plan-column featured">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                {{-- Office & Director Support Section --}}
                                <div class="category-section">
                                    <div class="category-header">
                                        <h5>Office & Director Support</h5>
                                    </div>
                                    
                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">Registered Office Address (6 Months)</span>
                                        </div>
                                        <div class="plan-column">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column featured">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="plan-column">
                                            <span class="no-feature">—</span>
                                        </div>
                                    </div>

                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">Resident Director Facilitation (6 Months)</span>
                                        </div>
                                        <div class="plan-column">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column featured">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="plan-column">
                                            <span class="no-feature">—</span>
                                        </div>
                                    </div>

                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">Registered Office Address (1 Year)</span>
                                        </div>
                                        <div class="plan-column">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column featured">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">Resident Director Services (1 Year)</span>
                                        </div>
                                        <div class="plan-column">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column featured">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                {{-- Compliance & Registrations Section --}}
                                <div class="category-section">
                                    <div class="category-header">
                                        <h5>Compliance & Registrations</h5>
                                    </div>
                                    
                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">GST Registration & Setup</span>
                                        </div>
                                        <div class="plan-column">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column featured">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">Bank Account Opening Assistance</span>
                                        </div>
                                        <div class="plan-column">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column featured">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">1-Year CS Compliance Package</span>
                                        </div>
                                        <div class="plan-column">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column featured">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">Annual ROC Filings (FC-4, AOC-4, MGT-7A)</span>
                                        </div>
                                        <div class="plan-column">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column featured">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">RBI Annual Return Filing</span>
                                        </div>
                                        <div class="plan-column">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column featured">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">Compliance Calendar & Advisory</span>
                                        </div>
                                        <div class="plan-column">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column featured">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">30-Minute CS Consultation</span>
                                        </div>
                                        <div class="plan-column">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column featured">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">Priority FEMA & FDI Advisory</span>
                                        </div>
                                        <div class="plan-column">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column featured">
                                            <span class="no-feature">—</span>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                {{-- Support Section --}}
                                <div class="category-section">
                                    <div class="category-header">
                                        <h5>Support & Advisory</h5>
                                    </div>
                                    
                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">Email & Phone Support</span>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="plan-column featured">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="plan-column">
                                            <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
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
                                            <strong>Need help choosing the right plan?</strong>
                                            <p>Our team will guide you through foreign entity setup and compliance requirements.</p>
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

        <section class="quick-summary-area pt-40 pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="quick-summary-card">
                            <div class="d-flex align-items-center justify-content-between mb-20">
                                <h4 class="quick-summary-title mb-0">Quick Summary</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="quick-summary-table">
                                    <thead>
                                        <tr>
                                            <th>Plan Name</th>
                                            <th>Ideal For</th>
                                            <th class="text-right">All-Inclusive Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-label="Plan Name">Starter Plan</td>
                                            <td data-label="Ideal For">Foreign entities looking for basic Indian subsidiary incorporation</td>
                                            <td data-label="All-Inclusive Price" class="text-right price-cell">₹24,999</td>
                                        </tr>
                                        <tr>
                                            <td data-label="Plan Name">Compliance Plan</td>
                                            <td data-label="Ideal For">Companies needing registered office and resident director for 6 months</td>
                                            <td data-label="All-Inclusive Price" class="text-right price-cell">₹59,999</td>
                                        </tr>
                                        <tr>
                                            <td data-label="Plan Name">Complete Setup Plan</td>
                                            <td data-label="Ideal For">Full-year setup with complete compliance and secretarial support</td>
                                            <td data-label="All-Inclusive Price" class="text-right price-cell">₹149,999</td>
                                        </tr>
                                    </tbody>
                                </table>
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
                                    <h3 class="mb-25">Need help choosing the right plan?</span></h3>
                                    <h4 class="sub-title mb-50">Our team will guide you based on your business goals and compliance needs.</h4>
                                    <a href="contact.html" class="theme_btn sub-btn">Talk to an Expert →</a>
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

        <section class="quick-summary-area pt-20 pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="section-title text-center mb-70">
                                    <h3>Quick summary</h3>
                                </div>
                                <div class="quick-summary-card">
                                    <div class="d-flex align-items-center justify-content-between mb-20">
                                        <h4 class="quick-summary-title mb-0">Quick Summary</h4>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="quick-summary-table">
                                            <thead>
                                                <tr>
                                                    <th>Plan Name</th>
                                                    <th>Ideal For</th>
                                                    <th class="text-right">All-Inclusive Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td data-label="Plan Name">Starter Plan</td>
                                                    <td data-label="Ideal For">Foreign entrepreneurs needing quick India incorporation & FEMA compliance</td>
                                                    <td data-label="All-Inclusive Price" class="text-right price-cell">₹24,999</td>
                                                </tr>
                                                <tr>
                                                    <td data-label="Plan Name">Compliance Plan</td>
                                                    <td data-label="Ideal For">Foreign investors requiring short-term office &amp; director support</td>
                                                    <td data-label="All-Inclusive Price" class="text-right price-cell">₹59,999</td>
                                                </tr>
                                                <tr>
                                                    <td data-label="Plan Name">Complete Setup Plan</td>
                                                    <td data-label="Ideal For">Global founders seeking full-year office, director &amp; compliance package</td>
                                                    <td data-label="All-Inclusive Price" class="text-right price-cell">₹149,999</td>
                                                </tr>
                                            </tbody>
                                        </table>
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
                                <h5 class="mb-25">-Prashant Kumar, Partner,<span>Pratham Legal</span></h5>
                                <h5 class="a-text">Legal compliance isn’t just about ticking boxes it’s about building confidence in every business decision.</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-wrapper pl-70">
                            <div class="section-title section-title-3 text-center text-md-left mb-30">
                                <h3 class="mb-35">Where Law Meets Business Clarity <span class="highlight-text" style="color:#ff1f1f">provider</span></h3>
                                <h4 class="sub-title mb-40">We help founders and companies navigate India’s legal and regulatory landscape with simplicity, precision, and personal attention.</h4>
                                <h4 class="sub-title mb-65"> Every mandate is led by qualified professionals not agents ensuring accountability at every step.</h4>
                                <a href="{{ route('about',['locale' => app()->getLocale()]) }}" class="theme_btn theme_btn2">More about us</a>
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
                            <h3 class="mb-50">You Have Goals.We Bring <span class="highlight-text" style="color:#ff1f1f">clarity.</span></h3>
                            <h4 class="sub-title mb-65">Building a business shouldn’t be complicated. We simplify every step from incorporation to compliance with clear, professional guidance.</h4>
                            <a href="{{ route('contact',['locale' => app()->getLocale()]) }}" class="theme_btn theme_btn2">Contact Us</a>
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
                                        <h5>RESPONSIVE & RELIABLE</h5>
                                        <h3>Quick answers. Clear guidance. Always.</h3>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="chose-box wow fadeInUp2 animated" data-wow-delay="0.3s">
                                    <div class="chose-box-icon">
                                        <img src="{{ asset('assets/img/icon/icon22.svg') }}" alt="">
                                    </div>
                                    <div class="chose-box-text">
                                        <h5>BUSINESS-READY DOCUMENTS</h5>
                                        <h3>Legally precise. Professionally drafted.</h3>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="chose-box wow fadeInUp2 animated" data-wow-delay="0.5s">
                                    <div class="chose-box-icon">
                                        <img src="{{ asset('assets/img/icon/icon23.svg') }}" alt="">
                                    </div>
                                    <div class="chose-box-text">
                                        <h5>LONG-TERM SUPPORT</h5>
                                        <h3>From setup to success.</h3>
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
                                <h3 class="mb-45">Start Now & Choose Your <span class="highlight-text" style="color:#ff1f1f">plan</span></h3>
                                <h4 class="sub-title mb-60">Have questions about registration or compliance? We’re here to help — talk directly to a professional.</h4>
                                <h5 class="mb-25">Facing any issue while getting a quote?</h5>
                                <a href="tel:+919821008011" class="number">+91 9821008011</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="form-box form-box-2 white-bg" wire:key="service-quote-form">
                            <h4 class="sub-title mb-45">Get Service Quote</h4>
                            @if($showServiceThanks)
                                <div class="alert alert-success" role="alert" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000); $wire.set('showServiceThanks', false, false)">
                                    <strong>Thank you!</strong> We'll get back to you shortly.
                                </div>
                            @endif
                            <form class="quote-form mb-20" wire:submit.prevent="submitServiceRequest">                          
                                <div class="email-input">
                                    <label class="input-title">Phone Number</label>
                                    <input type="text" wire:model.live="servicePhone" placeholder="enter your phone number" required>
                                    @error('servicePhone') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                                <div class="email-input">
                                    <label class="input-title">Email</label>
                                    <input type="email" wire:model.live="serviceEmail" placeholder="enter your email">
                                    @error('serviceEmail') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                                    <div class="choice-list mb-20">
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="input-title pl-20">Service</span>
                                            <select class="select-product" wire:model.live="serviceType" required>
                                                <option value="">Select a service</option>
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
                                <button type="submit" class="q-btn-lg">Send Query</button>
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
                <img class="test test_01 d-none d-lg-inline-block" src="{{ asset('assets/img/testimonial/10.png') }}" alt="">
                <img class="test test_02 d-none d-lg-inline-block" src="{{ asset('assets/img/testimonial/11.png') }}" alt="">
                <img class="test test_03 d-none d-lg-inline-block" src="{{ asset('assets/img/testimonial/12.png') }}" alt="">
                <img class="test test_04 d-none d-lg-inline-block" src="{{ asset('assets/img/testimonial/10.png') }}" alt="">
                <img class="test test_05 d-none d-lg-inline-block" src="{{ asset('assets/img/testimonial/14.png') }}" alt="">
                <img class="test test_06 d-none d-lg-inline-block" src="{{ asset('assets/img/testimonial/15.png') }}" alt="">
                <div class="container">
                    <div class="client-feedback-wrapper-content pos-rel">
                        <div class="container custom-container-feedback">
                            <div class="row justify-content-center">
                                <div class="col-xl-6">
                                    <div class="testimonial-text-wrapper mb-30">
                                        <div class="section-title section-title-3 text-center">
                                            <h3 class="mb-25">Check what's client say <span class="highlight-text" style="color:#ff1f1f">about us</span></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row no-gutters justify-content-center">
                        <div class="col-lg-9">
                            <div class="feedback-active4 owl-carousel">
                                <div class="feedback-item-wrapper">
                                    <div class="feedback-box fb-box-3 text-center">
                                        <div class="quote-icon">
                                            <img src="{{ asset('assets/img/icon/quote-gray.svg') }}" alt="">
                                        </div>
                                        <h4 class="sub-title mb-25">We’v agents around occae cat the country, Find agents your neighborhood.Lorem ipsum dolor sit amet consectetur, omnis. voluptate velit esse cillum dolore eu fugiat nulla</h4>
                                        <h5 class="mb-10">Rashed Ka</h5>
                                        <h6>Senior Designer, Squre.</h6>
                                    </div>
                                </div>
                                <div class="feedback-item-wrapper">
                                    <div class="feedback-box fb-box-3 text-center">
                                        <div class="quote-icon">
                                            <img src="{{ asset('assets/img/icon/quote-gray.svg') }}" alt="">
                                        </div>
                                        <h4 class="sub-title mb-25">ommodo consequat. Duis aute irure dolor in reprehendert
                                            voluptate velit esse cillum dolore eu fugiat nulla
                                            Excepteu sint occaecat cupidat non proident, sunt in culpa qui officia deserunt
                                            mollit anim id est lrum.</h4>
                                        <h5 class="mb-10">Hasan Mahmud</h5>
                                        <h6>Senior Developer, Squre.</h6>
                                    </div>
                                </div>
                                <div class="feedback-item-wrapper">
                                    <div class="feedback-box fb-box-3 text-center">
                                        <div class="quote-icon">
                                            <img src="{{ asset('assets/img/icon/quote-gray.svg') }}" alt="">
                                        </div>
                                        <h4 class="sub-title mb-25">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, cumque id! Nulla vero nam ipsa quae ut, ullam, ad repudiandae, tenetur facilis impedit velit maiores ipsum. Quos, sequi. Quod amet voluptatibus repellat veritatis.</h4>
                                        <h5 class="mb-10">Rashed Ka</h5>
                                        <h6>Senior Designer, Squre.</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-9">
                            <div class="d-flex justify-content-center pt-5 text-center mt-4">
                                <a href="contact.html" class="theme_btn sub-btn">Go to Blog →</a>
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
                            <h3>Get latest Blog from Pratham <span class="highlight-text" style="color:#ff1f1f"> legals.</span></h3>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                        <div class="view-more text-center text-md-right mb-30">
                            <a href="{{ route('blogs',['locale' => app()->getLocale()]) }}" class="theme_btn theme_btn2">Go to Blog</a>
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
                                    <a class="blog-btn" href="{{ route('blog.view', ['locale' => app()->getLocale(), 'slug' => $blog['slug']]) }}">Continue Reading <img src="{{ asset('assets/img/icon/chevron.svg') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="text-center">No blogs available at the moment.</p>
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
                                    <h3 class="mb-25 wow fadeInUp2 animated" data-wow-delay="0.1s">Ready to Get Started? It’s Just .<span class="highlight-text" style="color:#ff1f1f">one click</span></h3>
                                    <h4 class="sub-title mb-40 wow fadeInUp2 animated" data-wow-delay="0.3s">Incorporate your company with expert-led guidance transparent, compliant, and hassle-free.</h4>
                                    <a href="#" class="theme_btn theme_btn2 sub-btn wow fadeInUp2 animated" data-wow-delay="0.5s">Start Registration</a>
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
                        <img src="{{ asset('assets/img/icon/icon16.svg') }}" alt="icon" style="height:28px;margin-right:10px;"/>
                        <div>
                            <h4>Get Started</h4>
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
                        <label class="input-label">Name</label>
                        <input type="text" wire:model.defer="name" class="custom-form-control" placeholder="Enter Your full name" />
                        @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-row">
                        <label class="input-label">Email</label>
                        <input type="email" wire:model.defer="email" class="custom-form-control" placeholder="Enter your Email" />
                        @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>
                       <div class="form-row">
                        <label class="input-label">Selected Plan</label>
                        <input type="text" wire:model.defer="planName" class="custom-form-control" style="font-weight:bold" placeholder="Selected Plan" readonly />
                        @error('planName') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-row">
                        <label class="input-label">Phone</label>
                        <input type="text" wire:model.defer="phone" class="custom-form-control" placeholder="Enter Your Phone Number" />
                        @error('phone') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="custom-modal-footer">
                    <button type="button" wire:click="saveRegistration" class="theme_btn">Get Started</button>
                    <button type="button" wire:click="$set('showModal', false)" class="theme_btn border-btn">Cancel</button>
                </div>
            </div>
        </div>
    @endif

    @if($showThanksModal)
        <div class="custom-modal" role="dialog" aria-modal="true">
            <div class="custom-modal-backdrop" wire:click="$set('showThanksModal', false)"></div>
            <div class="custom-modal-card small">
                <div class="thanks-icon">✓</div>
                <h4 class="thanks-title">Thanks we will contact you shortly.</h4>
                <p class="muted">Our team will reach out to the email or phone you provided.</p>
                <div style="margin-top:14px;">
                    <button type="button" wire:click="$set('showThanksModal', false)" class="theme_btn">Close</button>
                </div>
            </div>
        </div>
    @endif

    @if($showPendingModal)
        <div class="custom-modal" role="dialog" aria-modal="true">
            <div class="custom-modal-backdrop" wire:click="$set('showPendingModal', false)"></div>
            <div class="custom-modal-card small">
                <div class="thanks-icon" style="background:#fff4e8;color:#ff8a1f">…</div>
                <h4 class="thanks-title">We are working on your request</h4>
                <p class="muted">It looks like you already submitted a request for <strong>Your Selected Plan </strong> and it's being processed. Please be patient; we'll notify you once it's complete.</p>
                <div style="margin-top:14px;">
                    <button type="button" wire:click="$set('showPendingModal', false)" class="theme_btn">Okay</button>
                </div>
            </div>
        </div>
    @endif

    <style>
        /* Themed modal styles to match site */
        .custom-modal{
            position:fixed;inset:0;display:flex;align-items:center;justify-content:center;z-index:1050;
        }
        .custom-modal-backdrop{
            position:absolute;inset:0;background:rgba(0,0,0,0.5);
        }
        .custom-modal-card{
            position:relative;z-index:1060;background:#fff;max-width:520px;width:92%;border-radius:10px;box-shadow:0 8px 30px rgba(5,0,32,0.12);overflow:hidden;animation:modal-pop .18s ease-out;
        }
        .custom-modal-card.small{max-width:420px;padding:34px 28px;text-align:center}
        /* simplified header: solid color, reduced padding */
        .custom-modal-header{display:flex;align-items:center;justify-content:space-between;padding:14px 20px;background:#050020;color:#fff}
        .custom-modal-header .modal-title{display:flex;align-items:center;gap:10px}
        .custom-modal-header h4{margin:0;font-size:16px;font-weight:600}
        .custom-modal-header .muted{color:rgba(255,255,255,0.9);font-size:12px}
        .custom-modal-header .modal-title img{height:20px}
        .modal-close{background:transparent;border:0;color:rgba(255,255,255,0.9);font-size:26px;line-height:1;cursor:pointer}
        .custom-modal-body{padding:20px 24px;background:#fff}
        .form-row{margin-bottom:12px}
        .input-label{display:block;font-size:13px;color:#222;margin-bottom:6px}
        .custom-form-control{width:100%;padding:11px 14px;border:1px solid #e6e6e6;border-radius:8px;font-size:14px;box-shadow:inset 0 1px 0 rgba(255,255,255,0.6)}
        .custom-form-control:focus{outline:none;border-color:#ff1f1f;box-shadow:0 4px 18px rgba(255,31,31,0.08)}
        .custom-modal-footer{padding:12px 20px;background:#fff;display:flex;justify-content:flex-end;gap:10px}

        /* modal button refinements - clean & professional */
        .custom-modal .theme_btn{
            background:#ff1f1f;color:#fff;padding:9px 16px;border-radius:8px;border:none;font-weight:600;font-size:14px;box-shadow:none;transition:transform .12s ease,box-shadow .12s ease;
        }
        .custom-modal .theme_btn:hover{transform:translateY(-1px);box-shadow:0 6px 18px rgba(255,31,31,0.09)}
        .custom-modal .theme_btn.border-btn{background:transparent;color:#050020;border:1px solid #e6e6e6;padding:8px 14px;border-radius:8px;font-weight:600}
        .thanks-icon{width:64px;height:64px;border-radius:50%;background:#e8f8f1;color:#0aa06a;font-size:36px;display:flex;align-items:center;justify-content:center;margin:0 auto 12px;box-shadow:0 6px 18px rgba(10,160,106,0.12)}
        .thanks-title{font-size:20px;margin:6px 0 0;color:#050020}
        .muted{color:#6c6c6c}
        @keyframes modal-pop{from{opacity:0;transform:translateY(6px) scale(.98)}to{opacity:1;transform:translateY(0) scale(1)}}

    
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
            background: #ffffff;
        }

        /* Widen quick summary container on large screens */
        @media (min-width: 1200px) {
            .quick-summary-area .container {
                max-width: 1320px;
            }
        }

        .quick-summary-card {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 24px;
        }

        .quick-summary-title {
            color: #050020;
            font-weight: 700;
            font-size: 20px;
            font-family: "Circular Std", sans-serif;
            position: relative;
        }

        .quick-summary-title:after {
            content: "";
            display: block;
            width: 56px;
            height: 3px;
            background: #ff1f1f;
            border-radius: 2px;
            margin-top: 8px;
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .quick-summary-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 720px;
            /* allow some horizontal scroll on small screens */
        }

        .quick-summary-table thead th {
            background: #050020;
            color: #ffffff;
            font-weight: 600;
            font-size: 14px;
            text-align: left;
            padding: 14px 16px;
            border: 1px solid #1a1540;
            font-family: "Circular Std", sans-serif;
            white-space: nowrap;
        }

        .quick-summary-table td {
            font-size: 14px;
            color: #343434;
            padding: 14px 16px;
            border: 1px solid #e5e5e5;
            vertical-align: top;
            font-family: "Circular Std Book", sans-serif;
        }

        .quick-summary-table tbody tr:hover {
            background: #fafafa;
        }

        .quick-summary-table .price-cell {
            font-weight: 700;
            font-family: "Circular Std", sans-serif;
            color: #050020;
        }

        .text-right {
            text-align: right;
        }

        @media (max-width: 991px) {
            .quick-summary-card {
                padding: 20px;
            }

            .quick-summary-title {
                font-size: 18px;
            }

            .quick-summary-table thead th,
            .quick-summary-table td {
                font-size: 13px;
                padding: 12px 14px;
            }
        }

        @media (max-width: 767px) {
            .quick-summary-table {
                min-width: 640px;
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