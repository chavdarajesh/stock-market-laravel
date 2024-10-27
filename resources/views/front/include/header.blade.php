@php $current_route_name=Route::currentRouteName() @endphp
@php
use App\Models\SiteSetting;
$headerLogo = SiteSetting::getSiteSettings('header_logo');
$home_ads_banner = SiteSetting::getSiteSettings('home_ads_banner');
@endphp
<!-- Header -->
<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- <div class="topbar">
            <div class="content-topbar h-100 p-rl-30">
                <div class="align-self-stretch size-w-0 pos-relative m-r-30">
                    <div class="f2-s-1 flex-wr-s-c s-full ab-t-l p-b-2">
                        <span class="text-uppercase cl0 p-r-8">
                            Trending Now:
                        </span>

                        <span class="dis-inline-block cl16 slide100-txt pos-relative size-w-0" data-in="fadeInDown"
                            data-out="fadeOutDown">
                            <span class="dis-inline-block slide100-txt-item animated visible-false">
                                Interest rate angst trips up US equity bull market
                            </span>

                            <span class="dis-inline-block slide100-txt-item animated visible-false">
                                Designer fashion show kicks off Variety Week
                            </span>

                            <span class="dis-inline-block slide100-txt-item animated visible-false">
                                Microsoft quisque at ipsum vel orci eleifend ultrices
                            </span>
                        </span>
                    </div>
                </div>


                <div class="flex-wr-e-c">
                    <div class="left-topbar">
                        <span class="left-topbar-item flex-wr-s-c">
                            <span>
                                New York, NY
                            </span>

                            <img class="m-b-1 m-rl-8" src="{{ asset('assets/front/images/icons/icon-night.png') }}" alt="IMG">

                            <span>
                                HI 58° LO 56°
                            </span>
                        </span>

                        <a href="#" class="left-topbar-item">
                            About
                        </a>

                        <a href="#" class="left-topbar-item">
                            Contact
                        </a>

                        <a href="#" class="left-topbar-item">
                            Sing up
                        </a>

                        <a href="#" class="left-topbar-item">
                            Log in
                        </a>

                        <a href="#" class="left-topbar-item"></a>
                    </div>

                    <div class="right-topbar p-l-18">
                        <a href="#">
                            <span class="fab fa-facebook-f"></span>
                        </a>

                        <a href="#">
                            <span class="fab fa-twitter"></span>
                        </a>

                        <a href="#">
                            <span class="fab fa-pinterest-p"></span>
                        </a>

                        <a href="#">
                            <span class="fab fa-vimeo-v"></span>
                        </a>

                        <a href="#">
                            <span class="fab fa-youtube"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->
            <div class="logo-mobile">
                <a href="{{route('front.home')}}"><img src="{{ isset($headerLogo) && isset($headerLogo->value) && $headerLogo != null ? asset($headerLogo->value) : asset('custom-assets/default/admin/images/siteimages/logo/header-logo.png') }}" alt="IMG-LOGO"></a>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze m-r--8">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <!-- <ul class="topbar-mobile">
                <li class="left-topbar">
                    <span class="left-topbar-item flex-wr-s-c">
                        <span>
                            New York, NY
                        </span>

                        <img class="m-b-1 m-rl-8" src="{{ asset('assets/front/images/icons/icon-night.png') }}" alt="IMG">

                        <span>
                            HI 58° LO 56°
                        </span>
                    </span>
                </li>

                <li class="left-topbar">
                    <a href="#" class="left-topbar-item">
                        About
                    </a>

                    <a href="#" class="left-topbar-item">
                        Contact
                    </a>

                    <a href="#" class="left-topbar-item">
                        Sing up
                    </a>

                    <a href="#" class="left-topbar-item">
                        Log in
                    </a>
                </li>

                <li class="right-topbar">
                    <a href="#">
                        <span class="fab fa-facebook-f"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-twitter"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-pinterest-p"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-vimeo-v"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-youtube"></span>
                    </a>
                </li>
            </ul> -->

            <ul class="main-menu-m">
                <li>
                    <a href="{{route('front.home')}}">Home</a>
                </li>

                @if ($current_route_name == 'front.home')
                <li>
                    <a href="#category_id-1">Stocks</a>
                </li>
                <li>
                    <a href="#category_id-2">Economy Outlook</a>
                </li>
                <li>
                    <a href="#category_id-3">Research</a>
                </li>
                <li>
                    <a href="#category_id-4">IPO's</a>
                </li>
                <li>
                    <a href="#category_id-5">	Company News</a>
                </li>
                @else
                <li>
                    <a href="{{route('front.home')}}#category_id-1">Stocks</a>
                </li>
                <li>
                    <a href="{{route('front.home')}}#category_id-2">Economy Outlook</a>
                </li>
                <li>
                    <a href="{{route('front.home')}}#category_id-3">Research</a>
                </li>
                <li>
                    <a href="{{route('front.home')}}#category_id-4">IPO's</a>
                </li>
                <li>
                    <a href="{{route('front.home')}}#category_id-5">	Company News</a>
                </li>
                @endif


            </ul>
        </div>


        <!-- Banner -->
        @if(isset($home_ads_banner) &&
        isset($home_ads_banner->value) &&
        $home_ads_banner != null &&
        $home_ads_banner->value != '')
        <div class="container m-t-10">
            <div class="flex-c-c">
                <a href="#">
                    <img class="max-w-full" src="{{ asset($home_ads_banner->value) }}" alt="IMG">
                </a>
            </div>
        </div>
        @endif

        <!--  -->
        <div class="wrap-logo no-banner container">
            <!-- Logo desktop -->
            <div class="logo">
                <a href="{{route('front.home')}}"><img src="{{ isset($headerLogo) && isset($headerLogo->value) && $headerLogo != null ? asset($headerLogo->value) : asset('custom-assets/default/admin/images/siteimages/logo/header-logo.png') }}" alt="LOGO"></a>
            </div>
        </div>

        <!--  -->
        <div class="wrap-main-nav">
            <div class="main-nav">
                <!-- Menu desktop -->
                <nav class="menu-desktop">
                    <a class="logo-stick" href="{{route('front.home')}}">
                        <img src="{{ isset($headerLogo) && isset($headerLogo->value) && $headerLogo != null ? asset($headerLogo->value) : asset('custom-assets/default/admin/images/siteimages/logo/header-logo.png') }}" alt="LOGO">
                    </a>

                    <ul class="main-menu justify-content-center">
                        <li class="{{ $current_route_name == 'front.home' ? 'main-menu-active': 'mega-menu-item' }}">
                            <a href="{{route('front.home')}}">Home</a>
                        </li>

                        @if ($current_route_name == 'front.home')
                        <li class="mega-menu-item">
                            <a href="#category_id-1" class="scroll">Stocks</a>
                        </li>
                        <li class="mega-menu-item">
                            <a href="#category_id-2" class="scroll">Economy Outlook</a>
                        </li>
                        <li class="mega-menu-item">
                            <a href="#category_id-3" class="scroll">Research</a>
                        </li>
                        <li class="mega-menu-item">
                            <a href="#category_id-4" class="scroll">IPO's</a>
                        </li>
                        <li class="mega-menu-item">
                            <a href="#category_id-5" class="scroll">Company News</a>
                        </li>
                        @else
                        <li class="mega-menu-item">
                            <a href="{{route('front.home')}}#category_id-1" >Stocks</a>
                        </li>
                        <li class="mega-menu-item">
                            <a href="{{route('front.home')}}#category_id-2" >Economy Outlook</a>
                        </li>
                        <li class="mega-menu-item">
                            <a href="{{route('front.home')}}#category_id-3" >Research</a>
                        </li>
                        <li class="mega-menu-item">
                            <a href="{{route('front.home')}}#category_id-4" >IPO's</a>
                        </li>
                        <li class="mega-menu-item">
                            <a href="{{route('front.home')}}#category_id-5" >Company News</a>
                        </li>
                        @endif

                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
