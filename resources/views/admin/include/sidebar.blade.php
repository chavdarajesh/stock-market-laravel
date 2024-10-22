@php $current_route_name = Route::currentRouteName();
use App\Models\SiteSetting;
$headerLogo = SiteSetting::getSiteSettings('header_logo');
@endphp
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme ">
    <div class="app-brand demo bg-primary">
        <a href="{{ route('admin.dashboard') }}" class="app-brand-link">

        <span class="app-brand-text demo menu-text fw-bolder"><img width="200"
                    src="{{ isset($headerLogo) && isset($headerLogo->value) && $headerLogo != null ? asset($headerLogo->value) : asset('custom-assets/default/admin/images/siteimages/logo/header-logo.png') }}"
                    alt="Header Logo"></span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>
    <div class="divider">
        <hr>
    </div>
    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item  {{ $current_route_name == 'admin.dashboard' ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Module</span>
        </li>
        <li
            class="menu-item  {{ $current_route_name == 'admin.categorys.index' || $current_route_name == 'admin.categorys.create' || $current_route_name == 'admin.categorys.edit' || $current_route_name == 'admin.categorys.view' ? 'active' : '' }}">
            <a href="{{ route('admin.categorys.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-category-alt"></i>
                <div>Category</div>
            </a>
        </li>
        <li
            class="menu-item  {{ $current_route_name == 'admin.news.index' || $current_route_name == 'admin.news.create' || $current_route_name == 'admin.news.edit' || $current_route_name == 'admin.news.view' || $current_route_name == 'admin.news.cat-index' ? 'active' : '' }}">
            <a href="{{ route('admin.news.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-list-ul"></i>
                <div>News</div>
            </a>
        </li>
        <li class="menu-item {{ $current_route_name == 'admin.contact.settings.index' ? 'active' : '' }}">
            <a href="{{ route('admin.contact.settings.index') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-contact'></i>
                <div data-i18n="Without menu">Contact Settings</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Settings</span>
        </li>
        <li class="menu-item {{ $current_route_name == 'admin.profile.settings.password.index' || $current_route_name == 'admin.profile.setting.index' ? 'open active' : '' }}"
            style="">
            <a href="{{ route('admin.profile.settings.password.index') }}" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons bx bxs-user-account'></i>
                <div data-i18n="Layouts">Admin Profile</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ $current_route_name == 'admin.profile.setting.index' ? 'active' : '' }}">
                    <a href="{{ route('admin.profile.setting.index') }}" class="menu-link">
                        <div data-i18n="Without menu">Profile Setting</div>
                    </a>
                </li>
                <li
                    class="menu-item {{ $current_route_name == 'admin.profile.settings.password.index' ? 'active' : '' }}">
                    <a href="{{ route('admin.profile.settings.password.index') }}" class="menu-link ">
                        <div data-i18n="Without menu">Password Setting</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item  {{ $current_route_name == 'admin.site.settings.index' ? 'active' : '' }}">
            <a href="{{ route('admin.site.settings.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-cog"></i>
                <div>Site Settings</div>
            </a>
        </li>

    </ul>
</aside>
