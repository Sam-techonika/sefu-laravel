<div>
    <main>

        <section class="page-title-area pb-75 pt-240 pt-md-200 pt-xs-150">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="page-title-wrapper page-title-blog">
                            {!! __('blogMain.page_title') !!}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="page-title-wrapper pl-80 pl-lg-0 pl-md-0 pl-xs-0">
                            <h4 class="sub-title mb-35">{{ __('blogMain.sub_title') }}</h4>
                        </div>
                    </div>
                </div>

        </section>
        <!--page-title-area end-->

        <!--blog-area start-->
        <section class="blog-area pt-80 pb-75 pt-md-0 pb-md-35 pt-xs-0 pb-xs-35">
            <div class="container">
                @if (!empty($errorMessage))
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-danger text-center">{{ $errorMessage }}</div>
                    </div>
                </div>
                @endif

                <div class="row">
                    @forelse($blogs as $blog)
                    @php
                    $trans = $blog->translations->first();
                    $thumb = $blog->featured_image ? asset('storage/' . $blog->featured_image) : asset('assets/img/blog/01.jpg');
                    $title = $trans->title ?? $blog->name;
                    $slug = $trans->slug ?? null;
                    $categoryName = $trans && $trans->category
                    ? optional($trans->category->translations->firstWhere('locale', app()->getLocale()))->name
                    : 'General';
                    // Use route() if slug exists, otherwise use #
                    $link = $slug
                    ? route('blog.view', ['locale' => app()->getLocale(), 'slug' => $slug])
                    : '#';
                    @endphp

                    <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
                        <div class="card shadow-lg border-0 rounded-3" style="border-top: 4px solid #ff1f1f;">
                            <div class="card-body p-4">


                                <div class="blogs mb-0">
                                    <div class="blogs-mask-img">
                                        <div class="blogs__thumb mb-40">
                                            <img class="img-fluid" src="{{ $thumb }}" alt="{{ $title }}">
                                        </div>
                                    </div>

                                    <div class="blogs__content">
                                        <span class="tag mb-25">{{ $categoryName }}</span>

                                        <h3 class="blog-title mb-20">
                                            <a wire:navigate href="{{ $link }}">
                                                {{ \Illuminate\Support\Str::limit($title, 80) }}
                                            </a>
                                        </h3>

                                        <a class="blog-btn" href="{{ $link }}">
                                            <img src="{{ asset('assets/img/icon/icon12.svg') }}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">{{ __('blogMain.no_posts') }}</p>
                    </div>
                    @endforelse
                </div>


                <div class="row">
                    <div class="col-xl-12">
                        <div class="pagination-area mt-70 mb-35">
                            <nav aria-label="Page navigation">
                                {{ $blogs->links('vendor.livewire.sefu') }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--blog-area end-->

        <!--subscribe-letter-area start-->
        <section class="subscribe-letter-area pt-50 pb-115">
            <div class="container">
                <div class="subs-letter-bg grey-bg-soft pt-65 pb-55">
                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                            <div class="subscribe-wrapper">
                                <div class="section-title text-center">
                                    <h3 class="mb-25">{!! __('blogMain.subscribe_title') !!}</h3>
                                    <h4 class="sub-title mb-50">{{ __('blogMain.subscribe_subtitle') }}</h4>
                                    <a href="{{ route('contact',['locale' => app()->getLocale()]) }}" class="theme_btn sub-btn">{{ __('blogMain.subscribe_button') }}</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--subscribe-letter-area end-->
    </main>
</div>