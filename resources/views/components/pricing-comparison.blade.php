@php
$plans = [
    [
        'name' => 'Starter Plan',
        'tagline' => 'Kickstart your business with all essentials for incorporation.',
        'price' => '₹8,999',
        'price_label' => '',
        'cta' => 'Start Registration →',
        'cta_link' => '#',
        'highlight_text' => 'Includes ₹6,500 Govt. Fees + ₹2,499 Professional Fees',
        'summary' => 'Perfect for new business setup:',
        'summary_items' => [
            'Company Incorporation under MCA V3 (Private Limited / LLP / OPC)',
            'DIN & DSC for Two Directors',
            'Name Reservation SPICe+ RUN Form',
            'Drafting and filing under Companies Act, 2013'
        ],
        'featured' => false
    ],
    [
        'name' => 'Compliance Plan',
        'tagline' => 'Register with confidence full legal and secretarial compliance handled.',
        'price' => '₹12,999',
        'price_label' => '',
        'cta' => 'Get Compliance Setup →',
        'cta_link' => '#',
        'highlight_text' => 'Includes ₹6,500 Govt. Fees + ₹6,499 Professional Fees',
        'summary' => 'Everything in Starter, plus:',
        'summary_items' => [
            'GST Registration (Complete filing & approval support)',
            'MSME (Udyam) Registration',
            'First Year Compliance Guidance',
            'Compliance Calendar Setup',
            'AGM & Board Meeting Documentation',
            'Professional Consultation Session (30-minute CS consultation)'
        ],
        'featured' => true,
        'badge' => 'Most Popular'
    ],
    [
        'name' => 'Complete Setup Plan',
        'tagline' => 'Incorporate with confidence full compliance, filings, and legal protection for your first year.',
        'price' => '₹24,999',
        'price_label' => '',
        'cta' => 'Get Complete Setup →',
        'cta_link' => '#',
        'highlight_text' => 'Includes ₹11,000 Govt. Fees + ₹13,999 Professional Fees',
        'summary' => 'Everything in Compliance, plus:',
        'summary_items' => [
            'Trademark Registration (Filing of one trademark application)',
            'Startup India Recognition (DPIIT registration)',
            '1-Year CS Compliance Package',
            'Annual ROC Filings for First Financial Year (AOC-4, MGT-7A)',
            'AGM & Board Meeting Documentation',
            '1-Year Complete Secretarial Records'
        ],
        'featured' => false
    ]
];

$comparisonFeatures = [
    [
        'category' => 'Incorporation',
        'features' => [
            [
                'name' => 'Company Incorporation under MCA V3',
                'starter' => true,
                'compliance' => true,
                'full' => true
            ],
            [
                'name' => 'DIN & DSC for Two Directors',
                'starter' => true,
                'compliance' => true,
                'full' => true
            ],
            [
                'name' => 'Name Reservation SPICe+ RUN Form',
                'starter' => true,
                'compliance' => true,
                'full' => true
            ],
            [
                'name' => 'MOA, AOA & Incorporation Certificate',
                'starter' => true,
                'compliance' => true,
                'full' => true
            ],
            [
                'name' => 'PAN & TAN Allotment',
                'starter' => true,
                'compliance' => true,
                'full' => true
            ],
            [
                'name' => 'Post-Incorporation Docs (Share Certificates, Registers, Minutes)',
                'starter' => true,
                'compliance' => true,
                'full' => true
            ],
            [
                'name' => 'Assistance in Bank Account Opening',
                'starter' => true,
                'compliance' => true,
                'full' => true
            ]
        ]
    ],
    [
        'category' => 'Compliance & Governance',
        'features' => [
            [
                'name' => 'GST Registration (Complete filing & approval support)',
                'starter' => false,
                'compliance' => true,
                'full' => true
            ],
            [
                'name' => 'MSME (Udyam) Registration',
                'starter' => false,
                'compliance' => true,
                'full' => true
            ],
            [
                'name' => 'Startup India (DPIIT) Recognition',
                'starter' => false,
                'compliance' => false,
                'full' => true
            ],
            [
                'name' => 'Trademark Filing (1 Class – Name or Logo)',
                'starter' => false,
                'compliance' => false,
                'full' => true
            ],
            [
                'name' => 'Compliance Calendar & Due-Date Tracker',
                'starter' => false,
                'compliance' => true,
                'full' => true
            ],
            [
                'name' => '30-Minute CS Consultation',
                'starter' => false,
                'compliance' => true,
                'full' => true
            ],
            [
                'name' => '1-Year CS Compliance Package',
                'starter' => false,
                'compliance' => false,
                'full' => true
            ],
            [
                'name' => 'Annual ROC Filings (AOC-4, MGT-7A)',
                'starter' => false,
                'compliance' => false,
                'full' => true
            ]
        ]
    ],
    [
        'category' => 'Advisory & Support',
        'features' => [
            [
                'name' => 'AGM & Board Meeting Documentation',
                'starter' => false,
                'compliance' => true,
                'full' => true
            ],
            [
                'name' => '1-Year Secretarial Records Maintenance',
                'starter' => false,
                'compliance' => false,
                'full' => true
            ],
            [
                'name' => 'Director\'s Report & Compliance Advisory',
                'starter' => false,
                'compliance' => false,
                'full' => true
            ],
            [
                'name' => 'Email & Phone Support',
                'starter' => true,
                'compliance' => true,
                'full' => true
            ]
        ]
    ]
];
@endphp

<section class="pricing-comparison-section py-5" x-data="{ showComparison: false }">
    <div class="container">
        {{-- Section Header --}}
        <div class="row justify-content-center mb-5">
            <div class="col-lg-10 text-center">
                <h2 class="section-title mb-3">Choose a plan that best suits your needs</h2>
                <p class="section-subtitle">Simple, transparent pricing for your company registration</p>
            </div>
        </div>

        {{-- Pricing Cards --}}
        <div class="row g-4 mb-5">
            @foreach($plans as $plan)
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-card {{ $plan['featured'] ? 'featured' : '' }}">
                        @if($plan['featured'] && isset($plan['badge']))
                            <div class="popular-badge">{{ $plan['badge'] }}</div>
                        @endif
                        
                        <div class="card-header">
                            <h3 class="plan-name">{{ $plan['name'] }}</h3>
                            <p class="plan-tagline">{{ $plan['tagline'] }}</p>
                        </div>

                        <div class="card-pricing">
                            <div class="price-label">{{ $plan['price_label'] }}</div>
                            <div class="price-amount">{{ $plan['price'] }}</div>
                            <div class="price-note">{{ $plan['highlight_text'] }}</div>
                        </div>

                        <button class="btn-cta {{ $plan['featured'] ? 'btn-primary' : 'btn-outline' }}" 
                                wire:click="selectPlan('{{ $plan['name'] }}')">
                            {{ $plan['cta'] }}
                        </button>

                        <div class="card-features">
                            <p class="features-title">{{ $plan['summary'] }}</p>
                            <ul class="features-list">
                                @foreach($plan['summary_items'] as $item)
                                    <li>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M13.3337 4L6.00033 11.3333L2.66699 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        {{ $item }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
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
                            @foreach($plans as $plan)
                                <div class="plan-column plan-header-box {{ $plan['featured'] ? 'featured-header' : '' }}">
                                    <div class="plan-header-content">
                                        <h4 class="plan-name-header">{{ $plan['name'] }}</h4>
                                        <div class="plan-price-header">{{ $plan['price'] }}</div>
                                        <button class="btn-header-cta {{ $plan['featured'] ? 'btn-featured' : 'btn-default' }}" 
                                                wire:click="selectPlan('{{ $plan['name'] }}')">
                                            Buy Now
                                        </button>
                                        @if($plan['featured'])
                                            <div class="checkmark-below">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                    <path d="M13.3337 4L6.00033 11.3333L2.66699 8" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Table Body --}}
                    <div class="comparison-body">
                        @foreach($comparisonFeatures as $section)
                            <div class="category-section">
                                <div class="category-header">
                                    <h5>{{ $section['category'] }}</h5>
                                </div>
                                
                                @foreach($section['features'] as $feature)
                                    <div class="feature-row">
                                        <div class="feature-column">
                                            <span class="feature-name">{{ $feature['name'] }}</span>
                                        </div>
                                        <div class="plan-column {{ $plans[0]['featured'] ? 'featured' : '' }}">
                                            @if($feature['starter'])
                                                <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                    <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            @else
                                                <span class="no-feature">—</span>
                                            @endif
                                        </div>
                                        <div class="plan-column {{ $plans[1]['featured'] ? 'featured' : '' }}">
                                            @if($feature['compliance'])
                                                <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                    <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            @else
                                                <span class="no-feature">—</span>
                                            @endif
                                        </div>
                                        <div class="plan-column {{ $plans[2]['featured'] ? 'featured' : '' }}">
                                            @if($feature['full'])
                                                <svg class="check-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                    <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="#ff1f1f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            @else
                                                <span class="no-feature">—</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>

                    {{-- Price Note --}}
                    <div class="comparison-footer">
                        <div class="footer-row">
                            <div class="feature-column">
                                <div class="help-section">
                                    <strong>Need help choosing the right plan?</strong>
                                    <p>Our team will guide you based on your business goals and compliance needs.</p>
                                </div>
                            </div>
                            @foreach($plans as $plan)
                                <div class="plan-column"></div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
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

.price-label {
    font-size: 14px;
    color: #6b7280;
    margin-bottom: 4px;
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
    font-weight: 700;
    color: #050020 !important;
    margin-bottom: 12px;
}

.plan-price-header {
    font-size: 28px;
    font-weight: 700;
    color: #050020 !important;
    margin-bottom: 16px;
    line-height: 1;
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

.plan-header-content .plan-name {
    font-size: 20px;
    font-weight: 600;
    color: #050020;
    margin-bottom: 8px;
}

.plan-header-content .plan-price {
    font-size: 30px;
    font-weight: 700;
    color: #050020;
    margin-bottom: 16px;
    line-height: 1.2;
}

.btn-table-cta {
    padding: 10px 20px;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 600;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    width: 100%;
    max-width: 140px;
}

.plan-header-content .check-icon {
    margin-top: 12px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    background: #ff1f1f;
    border-radius: 50%;
    color: #fff;
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

.comparison-footer .text-muted {
    color: #6b7280;
    font-size: 12px;
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
