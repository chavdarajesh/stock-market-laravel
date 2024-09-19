@php
use App\Models\SiteSetting;
$favicon = SiteSetting::getSiteSettings('favicon');
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ env('APP_NAME', 'Laravel App') }} | @yield('title')</title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ isset($favicon) && isset($favicon->value) && $favicon != null && $favicon->value != '' ? asset($favicon->value) : asset('custom-assets/admin/siteimages/logo/favicon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ isset($favicon) && isset($favicon->value) && $favicon != null && $favicon->value != '' ? asset($favicon->value) : asset('custom-assets/admin/siteimages/logo/favicon.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ isset($favicon) && isset($favicon->value) && $favicon != null && $favicon->value != '' ? asset($favicon->value) : asset('custom-assets/admin/siteimages/logo/favicon.png') }}" />
    <meta name="description" content="@yield('description')" />

    @include('front.layouts.head')
</head>

<body>
    @include('front.include.header')

    @yield('content')

    @include('front.include.footer')

    @include('front.layouts.footer')

</body>

</html>
