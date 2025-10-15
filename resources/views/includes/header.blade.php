<div>
      <header id="top-menu">
        <div class="header-top-cta pt-20 pb-35">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-3 col-md-6 col-sm-6">
                         <div class="logo">
                            <a class="logo-img"  wire:navigate href="index.html">
                            <img
                            class="logo-1"
                            src="assets/img/logo/logo2.png"
                            alt="Logo"
                            class="mt-1"
                            style="height: 40px; width: auto;"
                            >
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-9 col-md-6 col-sm-6 d-none d-sm-inline-block">
                        <div class="header-top-nav">
                            <ul class="d-flex align-items-center justify-content-end">
                                <li>
                                    <form class="search-input mr-10" action="form.php">
                                        <img class="search" src="assets/img/icon/search.svg" alt="">
                                        <input type="text" placeholder="Search here..">
                                    </form>
                                </li>
                                <li class="d-none d-lg-inline-block">
                                    <span><img src="assets/img/icon/at.svg" alt=""> ensure@inc.com</span>
                                </li>
                                <li class="d-none d-lg-inline-block">
                                    <span><img src="assets/img/icon/telephone.svg" alt=""> (479) 421-6814</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-header-area main-head-three">
            <div class="container">
                <div class="header-bg white-bg pl-30 pr-30 pl-lg-15 pr-lg-15">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-xl-8 col-lg-7 col-md-6 col-6">
                            <div class="main-nav d-flex align-items-center">
                                <div class="main-menu main-menu-3 mr-80 mr-lg-0 mr-md-0 mr-xs-0 d-none d-lg-block">
                                    <nav>
                                        <ul>
                                            <li><a class="active"  wire:navigate href="{{ route('home') }}">Home</i></a>  
                                            </li>
                                             <li><a  wire:navigate href="{{ route('about') }}">About Us</a></li>
                                            <li><a  wire:navigate href="{{ route('service') }}">Our Services</a></li>
                                            <li><a  wire:navigate href="{{ route('contact') }}">Contacts Us</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="hamburger-menu d-md-block d-lg-none text-right">
                                    <a  wire:navigate href="javascript:void(0);">
                                        <i class="far fa-bars"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                            <div class="header-right-widget d-flex align-items-center justify-content-end">
                                <div class="language-switcher dropdown">
                                    <button class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        English
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                        <ul class="ct-language_dropdown">
                                            <li><a  wire:navigate href="#">Arabic</a></li>
                                            <li><a  wire:navigate href="#">German</a></li>
                                            <li><a  wire:navigate href="#">Spanish</a></li>
                                            <li><a  wire:navigate href="#">China</a></li>
                                            <li><a  wire:navigate href="#">Italy</a></li>
                                            <li><a  wire:navigate href="#">USA</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="quote-btn d-none d-md-block ml-20">
                                    <a  wire:navigate href="contact.html" class="theme_btn theme_btn3">Get a quote <i class="far fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-area end -->

    <!-- slide-bar start -->
    <aside class="slide-bar">
        <div class="close-mobile-menu">
            <a  wire:navigate href="javascript:void(0);"><i class="fas fa-times"></i></a>
        </div>

        <!-- offset-sidebar start -->
        <div class="offset-sidebar">
            <div class="offset-widget offset-logo mb-30">
                <a  wire:navigate href="index.html">
                    <img src="assets/img/logo/header_logo_one.png" alt="logo">
                </a>
            </div>
            <div class="offset-widget mb-40">
                <div class="info-widget">
                    <h4 class="offset-title mb-20">About Us</h4>
                    <p class="mb-30">
                        But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain
                        was born and will give you a complete account of the system and expound the actual teachings of
                        the great explore
                    </p>
                    <a class="theme_btn theme_btn_bg"  wire:navigate href="contact.html">Contact Us</a>
                </div>
            </div>
            <div class="offset-widget mb-30 pr-10">
                <div class="info-widget info-widget2">
                    <h4 class="offset-title mb-20">Contact Info</h4>
                    <p> <i class="fal fa-address-book"></i> 23/A, Miranda City Likaoli Prikano, Dope</p>
                    <p> <i class="fal fa-phone"></i> +0989 7876 9865 9 </p>
                    <p> <i class="fal fa-envelope-open"></i> info@example.com </p>
                </div>
            </div>
        </div>
        <!-- offset-sidebar end -->

        <!-- side-mobile-menu start -->
         <nav class="side-mobile-menu">
            <ul id="mobile-menu-active">
                <li>
                    <a  wire:navigate href="{{ route('home') }}">Home</a>
                </li>
                <li><a  wire:navigate href="{{ route('about') }}">About Us</a></li>
                <li><a  wire:navigate href="{{ route('service') }}">Our Services</a></li>
                <li><a  wire:navigate href="{{ route('contact') }}">Contacts Us</a></li>
            </ul>
        </nav>
        <!-- side-mobile-menu end -->
    </aside>
    
</div>