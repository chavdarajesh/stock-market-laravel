@php $current_route_name=Route::currentRouteName() @endphp
@php
    use App\Models\Admin\ContactSetting;
    $ContactSetting = ContactSetting::get_contact_us_details();
    use App\Models\SiteSetting;
    $headerLogo = SiteSetting::getSiteSettings('header_logo');
    use App\Models\Category;
    $Category = Category::getCategory();
    $loader = SiteSetting::getSiteSettings('loader');

    $social_facebook_url = SiteSetting::getSiteSettings('social_facebook_url');
    $social_linkedin_url = SiteSetting::getSiteSettings('social_linkedin_url');
    $social_instagram_url = SiteSetting::getSiteSettings('social_instagram_url');
    $social_youtube_url = SiteSetting::getSiteSettings('social_youtube_url');
@endphp

<!-- Spinner Start -->
<div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    {{-- <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div> --}}
    <img style="width: 200px;"
        src="{{ isset($loader) && isset($loader->value) && $loader != null ? asset($loader->value) : asset('custom-assets/admin/siteimages/logo/loader.gif') }}"
        alt="Loader">
</div>
<!-- Spinner End -->


<!-- Topbar Start -->
<div class="container-fluid bg-dark text-light px-0 py-2 d-none d-lg-block">
    <div class="row gx-0 d-none d-lg-flex">
        @if ($ContactSetting)
            <div class="col-lg-7 px-5 text-start">
                @if ($ContactSetting['phone'])
                    <div class="h-100 d-inline-flex align-items-center me-4">
                        <a href="tel:{{ $ContactSetting['phone'] ? $ContactSetting['phone'] : '' }}" class="text-white">
                            <span class="fa fa-phone-alt me-2"></span>
                            <span>{{ $ContactSetting['phone'] ? $ContactSetting['phone'] : '' }}</span>
                        </a>
                    </div>
                @endif
                @if ($ContactSetting['email'])
                    <div class="h-100 d-inline-flex align-items-center">
                        <a target="_blanck" href="mailto:{{ $ContactSetting['email'] ? $ContactSetting['email'] : '' }}"
                            class="text-white">
                            <span class="far fa-envelope me-2"></span>
                            <span>{{ $ContactSetting['email'] ? $ContactSetting['email'] : '' }}</span>
                        </a>
                    </div>
                @endif
            </div>
        @endif
        @if ((isset($social_facebook_url) && isset($social_facebook_url->value))||(isset($social_youtube_url) && isset($social_youtube_url->value))||(isset($social_linkedin_url) && isset($social_linkedin_url->value)) || (isset($social_instagram_url) && isset($social_instagram_url->value)))
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center mx-n2">
                    <span>Follow Us:</span>
                    @if (isset($social_facebook_url) &&
                            isset($social_facebook_url->value) &&
                            $social_facebook_url->value != null &&
                            $social_facebook_url->value != '')
                        <a target="_blank" class="btn btn-link text-light" href="{{ $social_facebook_url->value }}"><i
                                class="fab fa-facebook-f"></i></a>
                    @endif
                    @if (isset($social_youtube_url) &&
                            isset($social_youtube_url->value) &&
                            $social_youtube_url->value != null &&
                            $social_youtube_url->value != '')
                        <a target="_blank" class="btn btn-link text-light" href="{{ $social_facebook_url->value }}"><i
                                class="fab fa-youtube"></i></a>
                    @endif
                    @if (isset($social_linkedin_url) &&
                            isset($social_linkedin_url->value) &&
                            $social_linkedin_url->value != null &&
                            $social_linkedin_url->value != '')
                        <a target="_blank" class="btn btn-link text-light" href="{{ $social_linkedin_url->value }}"><i
                                class="fab fa-linkedin-in"></i></a>
                    @endif
                    @if (isset($social_instagram_url) &&
                            isset($social_instagram_url->value) &&
                            $social_instagram_url->value != null &&
                            $social_instagram_url->value != '')
                        <a target="_blank" class="btn btn-link text-light" href="{{ $social_instagram_url->value }}"><i
                                class="fab fa-instagram"></i></a>
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>
<!-- Topbar End -->

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
    <a href="{{ route('front.home') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <img src="{{ isset($headerLogo) && isset($headerLogo->value) && $headerLogo != null ? asset($headerLogo->value) : asset('custom-assets/admin/siteimages/logo/header-logo.png') }}"
            width="250" height="48" alt="Header Logo">

    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0" id="isotope-project-flters">
            <a href="{{ route('front.about') }}"
                class="nav-item nav-link {{ $current_route_name == 'front.about' ? 'active' : '' }}">We</a>
            @if (isset($Category) && !$Category->isEmpty())

                @if ($current_route_name == 'front.home')
                    @foreach ($Category as $item)
                        <a id="{{ $item->slug }}" data-filter=".{{ $item->slug }}" href="javascript:void(0);"
                            class="nav-item nav-link isotope-project-home {{ $item->slug }}-isotope-project-home-class ">{{ $item->name }}</a>
                    @endforeach
                @else
                    @foreach ($Category as $item)
                        <a href="{{ route('front.home') }}#{{ $item->slug }}"
                            class="nav-item nav-link">{{ $item->name }}</a>
                    @endforeach
                @endif
            @endif
            <a href="{{ route('front.career') }}" class="nav-item nav-link {{ $current_route_name == 'front.career' ? 'active' : '' }}">Career</a>
            <a href="{{ route('front.contact') }}"
                class="nav-item nav-link {{ $current_route_name == 'front.contact' ? 'active' : '' }}">Contact</a>
        </div>
    </div>
</nav>
<!-- Navbar End -->
