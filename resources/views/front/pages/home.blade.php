@extends('front.layouts.main')
@section('title', 'Home')
@section('css')

@stop
@section('content')
<!-- Feature post -->
@if($newsItems->count() > 0)
<section class="bg0">
    <div class="mx-3 pt-5 px-2 px-lg-5 mx-lg-5 row d-flex justify-content-center">
        @if($newsItems->count() > 1)
        <div class="col-md-2 order-2 order-md-1 px-2">
            <div class="row">
                @if($newsItems->count() > 1)
                <div class="col-sm-12">
                    <div class="mb-4">
                        <a href="{{ route('front.news.details', ['slug' => $newsItems[1]->slug]) }}" class="wrap-pic-w hov1 trans-03">
                            <img style="max-height: 130px;" src="{{ $newsItems[1] && isset($newsItems[1]->image) && $newsItems[1]->image ? asset($newsItems[1]->image) : asset('custom-assets/front/placeholder/dummy-image-square.jpg') }}" alt="IMG">
                        </a>

                        <div class="p-t-16">
                            <h5 class="p-b-5">
                                <a href="{{ route('front.news.details', ['slug' => $newsItems[1]->slug]) }}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                    {{ $newsItems[1] && $newsItems[1]->title ? (strlen($newsItems[1]->title) > 60 ? substr($newsItems[1]->title, 0, 60) . '..' : $newsItems[1]->title) : '' }}
                                </a>
                            </h5>

                            <span class="cl8 p-b-5">
                                <span class="f1-s-4 cl8 hov-cl10 trans-03">
                                    @php
                                    echo strlen($newsItems[1]->description) > 80 ? substr(strip_tags($newsItems[1]->description), 0, 80) . '..' : strip_tags($newsItems[1]->description);
                                    @endphp
                                </span>
                            </span>
                            <div class="cl8 pt-3 f1-s-5">
                                {{ $newsItems[1] && $newsItems[1]->published_date ? \Carbon\Carbon::parse($newsItems[1]->published_date)->format('d-M-Y') : '' }}
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if($newsItems->count() > 2)
                <div class="col-sm-12">
                    <div class="mb-4">
                        <a href="{{ route('front.news.details', ['slug' => $newsItems[2]->slug]) }}" class="wrap-pic-w hov1 trans-03">
                            <img style="max-height: 130px;" src="{{ $newsItems[2] && isset($newsItems[2]->image) && $newsItems[2]->image ? asset($newsItems[2]->image) : asset('custom-assets/front/placeholder/dummy-image-square.jpg') }}" alt="IMG">
                        </a>

                        <div class="p-t-16">
                            <h5 class="p-b-5">
                                <a href="{{ route('front.news.details', ['slug' => $newsItems[2]->slug]) }}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                    {{ $newsItems[2] && $newsItems[2]->title ? (strlen($newsItems[2]->title) > 60 ? substr($newsItems[2]->title, 0, 60) . '..' : $newsItems[2]->title) : '' }}
                                </a>
                            </h5>

                            <span class="cl8 p-b-5">
                                <span class="f1-s-4 cl8 hov-cl10 trans-03">
                                    @php
                                    echo strlen($newsItems[2]->description) > 80 ? substr(strip_tags($newsItems[2]->description), 0, 80) . '..' : strip_tags($newsItems[2]->description);
                                    @endphp
                                </span>
                            </span>
                            <div class="cl8 pt-3 f1-s-5">
                                {{ $newsItems[2] && $newsItems[2]->published_date ? \Carbon\Carbon::parse($newsItems[2]->published_date)->format('d-M-Y') : '' }}
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
        @endif

        @if($newsItems->count() > 0)
        <div class="col-md-8 order-1 order-md-2 px-2">
            <div class="flex-col-s-c how-bor2 ">
                <a href="{{ route('front.news.details', ['slug' => $newsItems[0]->slug]) }}" class="wrap-pic-w hov1 trans-03 w-100">
                    <img style="max-height: 500px;" src="{{ $newsItems[0] && isset($newsItems[0]->image) && $newsItems[0]->image ? asset($newsItems[0]->image) : asset('custom-assets/front/placeholder/dummy-image-square.jpg') }}" alt="IMG">
                </a>
                <div class="cl8 txt-center py-3">
                    <span class="f1-s-5">
                        {{ $newsItems[0] && $newsItems[0]->published_date ? \Carbon\Carbon::parse($newsItems[0]->published_date)->format('d-M-Y') : '' }}
                    </span>
                </div>
                <h5 class="p-b-17 txt-center">
                    <a href="{{ route('front.news.details', ['slug' => $newsItems[0]->slug]) }}" class="f1-l-1 cl2 hov-cl10 trans-03 respon2">
                        {{ $newsItems[0] && $newsItems[0]->title ? (strlen($newsItems[0]->title) > 60 ? substr($newsItems[0]->title, 0, 60) . '..' : $newsItems[0]->title) : '' }}
                    </a>
                </h5>
                <p class="f1-s-11 cl6 txt-center p-b-22">
                    @php
                    echo strlen($newsItems[0]->description) > 250 ? substr(strip_tags($newsItems[0]->description), 0, 250) . '..' : strip_tags($newsItems[0]->description);
                    @endphp
                </p>

                <a href="{{ route('front.news.details', ['slug' => $newsItems[0]->slug]) }}" class="f1-s-1 cl9 hov-cl10 trans-03">
                    Read More
                    <i class="m-l-2 fa fa-long-arrow-alt-right"></i>
                </a>
            </div>
        </div>
        @endif

        @if($newsItems->count() > 3)
        <div class="col-md-2 order-3 order-md-3 px-2">
            <div class="row ">
                <div class="col-sm-12">
                    <div class="p-b-53">
                        <a href="{{ route('front.news.details', ['slug' => $newsItems[3]->slug]) }}" class="wrap-pic-w hov1 trans-03">
                            <img src="{{ $newsItems[3] && isset($newsItems[3]->image) && $newsItems[3]->image ? asset($newsItems[3]->image) : asset('custom-assets/front/placeholder/dummy-image-square.jpg') }}" alt="IMG">
                        </a>

                        <div class="p-t-16">
                            <h5 class="p-b-5">
                                <a href="{{ route('front.news.details', ['slug' => $newsItems[3]->slug]) }}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                    {{ $newsItems[3] && $newsItems[3]->title ? (strlen($newsItems[3]->title) > 60 ? substr($newsItems[3]->title, 0, 60) . '..' : $newsItems[3]->title) : '' }}
                                </a>
                            </h5>


                            <p class="f1-s-11 cl6">
                                @php
                                echo strlen($newsItems[3]->description) > 150 ? substr(strip_tags($newsItems[3]->description), 0, 150) . '..' : strip_tags($newsItems[3]->description);
                                @endphp
                            </p>
                            <div class="cl8 p-b-17 pt-3">
                                <span class="f1-s-5">
                                    {{ $newsItems[3] && $newsItems[3]->published_date ? \Carbon\Carbon::parse($newsItems[3]->published_date)->format('d-M-Y') : '' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    <!-- </div> -->
</section>
@endif
@if($categoryStocksNewsItems->count() > 0)
<hr>
<section class="bg0" id="category_id-1">
    <h5 class="mx-3 px-2 px-lg-5 mx-lg-5">
        <a href="javascript:void(0);" class="f1-l-5 cl2 hov-cl10 trans-03 respon2">
            Stocks
        </a>
    </h5>
    <div class="mx-3 pt-5 px-2 px-lg-5 mx-lg-5 row d-flex justify-content-center ">
        <div class="d-flex justify-content-between ">
            @foreach($categoryStocksNewsItems as $key => $categoryStocksNewsItem)
            <div class="col-12 col-md-6 col-lg-2 px-2 ">
                <div class="">
                    <a href="{{ route('front.news.details', ['slug' => $categoryStocksNewsItem->slug]) }}" class="wrap-pic-w hov1 trans-03">
                        <img style="max-height: 250px;" src="{{ $categoryStocksNewsItem && isset($categoryStocksNewsItem->image) && $categoryStocksNewsItem->image ? asset($categoryStocksNewsItem->image) : asset('custom-assets/front/placeholder/dummy-image-square.jpg') }}" alt="IMG">
                    </a>

                    <div class="p-t-16">
                        <h5 class="p-b-5">
                            <a href="{{ route('front.news.details', ['slug' => $categoryStocksNewsItem->slug]) }}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                {{ $categoryStocksNewsItem && $categoryStocksNewsItem->title ? (strlen($categoryStocksNewsItem->title) > 30 ? substr($categoryStocksNewsItem->title, 0, 30) . '..' : $categoryStocksNewsItem->title) : '' }}
                            </a>
                        </h5>


                        <p class="f1-s-11 cl6">
                            @php
                            echo strlen($categoryStocksNewsItem->description) > 120 ? substr(strip_tags($categoryStocksNewsItem->description), 0, 120) . '..' : strip_tags($categoryStocksNewsItem->description);
                            @endphp
                        </p>
                        <div class="cl8 p-b-17 pt-3">
                            <span class="f1-s-5">
                                {{ $categoryStocksNewsItem && $categoryStocksNewsItem->published_date ? \Carbon\Carbon::parse($categoryStocksNewsItem->published_date)->format('d-M-Y') : '' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
@endif
@if($firstcategoryEconomyOutlookNews || $othercategoryEconomyOutlookNews->count() > 0)
<hr>
<section class="bg0" id="category_id-2">
    <h5 class="mx-3 px-2 px-lg-5 mx-lg-5">
        <a href="javascript:void(0);" class="f1-l-5 cl2 hov-cl10 trans-03 respon2">
            Economy Outlook
        </a>
    </h5>
    <div class="mx-3 pt-5 px-2 px-lg-5 mx-lg-5 row">
        <div class="flex-wr-sb-s w-100">
            @if($firstcategoryEconomyOutlookNews)
            <div class="size-w-6 w-full-sr575">

                <div class="m-b-30">
                    <a href="{{ route('front.news.details', ['slug' => $firstcategoryEconomyOutlookNews->slug]) }}" class="wrap-pic-w hov1 trans-03">
                        <img style="max-height: 500px;" src="{{ $firstcategoryEconomyOutlookNews && isset($firstcategoryEconomyOutlookNews->image) && $firstcategoryEconomyOutlookNews->image ? asset($firstcategoryEconomyOutlookNews->image) : asset('custom-assets/front/placeholder/dummy-image-square.jpg') }}" alt="IMG">
                    </a>

                    <div class="p-t-25">
                        <h5 class="pb-3">
                            <a href="{{ route('front.news.details', ['slug' => $firstcategoryEconomyOutlookNews->slug]) }}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                {{ $firstcategoryEconomyOutlookNews && $firstcategoryEconomyOutlookNews->title ? (strlen($firstcategoryEconomyOutlookNews->title) > 60 ? substr($firstcategoryEconomyOutlookNews->title, 0, 60) . '..' : $firstcategoryEconomyOutlookNews->title) : '' }}
                            </a>
                        </h5>

                        <span class="cl8">
                            <span class="f1-s-5">
                                {{ $firstcategoryEconomyOutlookNews && $firstcategoryEconomyOutlookNews->published_date ? \Carbon\Carbon::parse($firstcategoryEconomyOutlookNews->published_date)->format('d-M-Y') : '' }}
                            </span>

                            <!-- <span class="f1-s-5 m-rl-3">
                                -
                            </span>

                            <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                Music
                            </a> -->
                        </span>

                        <p class="f1-s-1 cl6 pt-3">
                            @php
                            echo strlen($firstcategoryEconomyOutlookNews->description) > 130 ? substr(strip_tags($firstcategoryEconomyOutlookNews->description), 0, 130) . '..' : strip_tags($firstcategoryEconomyOutlookNews->description);
                            @endphp
                        </p>
                        <a href="{{ route('front.news.details', ['slug' => $firstcategoryEconomyOutlookNews->slug]) }}" class="f1-s-1 cl9 hov-cl10 trans-03">
                            Read More
                            <i class="m-l-2 fa fa-long-arrow-alt-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endif
            @if($othercategoryEconomyOutlookNews->count() > 0)
            <div class="size-w-7 w-full-sr575">
                <div class="row">
                    <div class="col-sm-12">
                        @foreach($othercategoryEconomyOutlookNews as $othercategoryEconomyOutlookNew)

                        <div class="flex-wr-sb-s m-b-30">


                            <div class="size-w-2">
                                <h5 class="p-b-5">
                                    <a href="{{ route('front.news.details', ['slug' => $othercategoryEconomyOutlookNew->slug]) }}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                        {{ $othercategoryEconomyOutlookNew && $othercategoryEconomyOutlookNew->title ? (strlen($othercategoryEconomyOutlookNew->title) > 60 ? substr($othercategoryEconomyOutlookNew->title, 0, 60) . '..' : $othercategoryEconomyOutlookNew->title) : '' }}
                                    </a>
                                </h5>

                                <span class="cl8">
                                    <!-- <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                        Beach
                                    </a>

                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span> -->

                                    <span class="f1-s-3">
                                        {{ $othercategoryEconomyOutlookNew && $othercategoryEconomyOutlookNew->published_date ? \Carbon\Carbon::parse($othercategoryEconomyOutlookNew->published_date)->format('d-M-Y') : '' }}
                                    </span>
                                </span>
                            </div>
                            <a href="{{ route('front.news.details', ['slug' => $othercategoryEconomyOutlookNew->slug]) }}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                <img style="max-height: 75px;" src="{{ $othercategoryEconomyOutlookNew && isset($othercategoryEconomyOutlookNew->image) && $othercategoryEconomyOutlookNew->image ? asset($othercategoryEconomyOutlookNew->image) : asset('custom-assets/front/placeholder/dummy-image-square.jpg') }}" alt="IMG">
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endif

@if($categoryResearchNewsItems->count() > 0)
<hr>
<section class="bg0" id="category_id-3">
    <h5 class="mx-3 px-2 px-lg-5 mx-lg-5">
        <a href="javascript:void(0);" class="f1-l-5 cl2 hov-cl10 trans-03 respon2">
            Research
        </a>
    </h5>
    <div class="mx-3 pt-5 px-2 px-lg-5 mx-lg-5 row d-flex justify-content-center ">
        <div class="d-flex justify-content-between ">

            @foreach($categoryResearchNewsItems as $key => $categoryResearchNewsItem)
            <div class="col-12 col-md-6 col-lg-2 px-2 ">
                <div class="">
                    <a href="{{ route('front.news.details', ['slug' => $categoryResearchNewsItem->slug]) }}" class="wrap-pic-w hov1 trans-03">
                        <img style="max-height: 250px;" src="{{ $categoryResearchNewsItem && isset($categoryResearchNewsItem->image) && $categoryResearchNewsItem->image ? asset($categoryResearchNewsItem->image) : asset('custom-assets/front/placeholder/dummy-image-square.jpg') }}" alt="IMG">
                    </a>

                    <div class="p-t-16">
                        <h5 class="p-b-5">
                            <a href="{{ route('front.news.details', ['slug' => $categoryResearchNewsItem->slug]) }}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                {{ $categoryResearchNewsItem && $categoryResearchNewsItem->title ? (strlen($categoryResearchNewsItem->title) > 30 ? substr($categoryResearchNewsItem->title, 0, 30) . '..' : $categoryResearchNewsItem->title) : '' }}
                            </a>
                        </h5>


                        <p class="f1-s-11 cl6">
                            @php
                            echo strlen($categoryResearchNewsItem->description) > 120 ? substr(strip_tags($categoryResearchNewsItem->description), 0, 120) . '..' : strip_tags($categoryResearchNewsItem->description);
                            @endphp
                        </p>
                        <div class="cl8 p-b-17 pt-3">
                            <span class="f1-s-5">
                                {{ $categoryResearchNewsItem && $categoryResearchNewsItem->published_date ? \Carbon\Carbon::parse($categoryResearchNewsItem->published_date)->format('d-M-Y') : '' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
@endif

@if($firstcategoryIPONews || $othercategoryIPONews->count() > 0)
<hr>
<section class="bg0" id="category_id-4">
    <h5 class="mx-3 px-2 px-lg-5 mx-lg-5">
        <a href="javascript:void(0);" class="f1-l-5 cl2 hov-cl10 trans-03 respon2">
            IPO's
        </a>
    </h5>
    <div class="mx-3 pt-5 px-2 px-lg-5 mx-lg-5 row">
        <div class="flex-wr-sb-s w-100">
            @if($firstcategoryIPONews)
            <div class="size-w-6 w-full-sr575">

                <div class="m-b-30">
                    <a href="{{ route('front.news.details', ['slug' => $firstcategoryIPONews->slug]) }}" class="wrap-pic-w hov1 trans-03">
                        <img style="max-height: 500px;" src="{{ $firstcategoryIPONews && isset($firstcategoryIPONews->image) && $firstcategoryIPONews->image ? asset($firstcategoryIPONews->image) : asset('custom-assets/front/placeholder/dummy-image-square.jpg') }}" alt="IMG">
                    </a>

                    <div class="p-t-25">
                        <h5 class="pb-3">
                            <a href="{{ route('front.news.details', ['slug' => $firstcategoryIPONews->slug]) }}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                {{ $firstcategoryIPONews && $firstcategoryIPONews->title ? (strlen($firstcategoryIPONews->title) > 60 ? substr($firstcategoryIPONews->title, 0, 60) . '..' : $firstcategoryIPONews->title) : '' }}
                            </a>
                        </h5>

                        <span class="cl8">
                            <span class="f1-s-5">
                                {{ $firstcategoryIPONews && $firstcategoryIPONews->published_date ? \Carbon\Carbon::parse($firstcategoryIPONews->published_date)->format('d-M-Y') : '' }}
                            </span>

                            <!-- <span class="f1-s-5 m-rl-3">
                                -
                            </span>

                            <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                Music
                            </a> -->
                        </span>

                        <p class="f1-s-1 cl6 pt-3">
                            @php
                            echo strlen($firstcategoryIPONews->description) > 130 ? substr(strip_tags($firstcategoryIPONews->description), 0, 130) . '..' : strip_tags($firstcategoryIPONews->description);
                            @endphp
                        </p>
                        <a href="{{ route('front.news.details', ['slug' => $firstcategoryIPONews->slug]) }}" class="f1-s-1 cl9 hov-cl10 trans-03">
                            Read More
                            <i class="m-l-2 fa fa-long-arrow-alt-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endif
            @if($othercategoryIPONews->count() > 0)
            <div class="size-w-7 w-full-sr575">
                <div class="row">
                    <div class="col-sm-12">
                        @foreach($othercategoryIPONews as $othercategoryIPONew)

                        <div class="flex-wr-sb-s m-b-30">


                            <div class="size-w-2">
                                <h5 class="p-b-5">
                                    <a href="{{ route('front.news.details', ['slug' => $othercategoryIPONew->slug]) }}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                        {{ $othercategoryIPONew && $othercategoryIPONew->title ? (strlen($othercategoryIPONew->title) > 60 ? substr($othercategoryIPONew->title, 0, 60) . '..' : $othercategoryIPONew->title) : '' }}
                                    </a>
                                </h5>

                                <span class="cl8">
                                    <!-- <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                        Beach
                                    </a>

                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span> -->

                                    <span class="f1-s-3">
                                        {{ $othercategoryIPONew && $othercategoryIPONew->published_date ? \Carbon\Carbon::parse($othercategoryIPONew->published_date)->format('d-M-Y') : '' }}
                                    </span>
                                </span>
                            </div>
                            <a href="{{ route('front.news.details', ['slug' => $othercategoryIPONew->slug]) }}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                <img style="max-height: 75px;" src="{{ $othercategoryIPONew && isset($othercategoryIPONew->image) && $othercategoryIPONew->image ? asset($othercategoryIPONew->image) : asset('custom-assets/front/placeholder/dummy-image-square.jpg') }}" alt="IMG">
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endif

@if($categoryCompanyNewsNewsItems->count() > 0)
<hr>
<section class="bg0" id="category_id-5">
    <h5 class="mx-3 px-2 px-lg-5 mx-lg-5">
        <a href="javascript:void(0);" class="f1-l-5 cl2 hov-cl10 trans-03 respon2">
            Company News
        </a>
    </h5>
    <div class="mx-3 pt-5 px-2 px-lg-5 mx-lg-5 row d-flex justify-content-center ">
        <div class="d-flex justify-content-between ">

            @foreach($categoryCompanyNewsNewsItems as $key => $categoryCompanyNewsNewsItem)
            <div class="col-12 col-md-6 col-lg-2 px-2 ">
                <div class="">
                    <a href="{{ route('front.news.details', ['slug' => $categoryCompanyNewsNewsItem->slug]) }}" class="wrap-pic-w hov1 trans-03">
                        <img style="max-height: 250px;" src="{{ $categoryCompanyNewsNewsItem && isset($categoryCompanyNewsNewsItem->image) && $categoryCompanyNewsNewsItem->image ? asset($categoryCompanyNewsNewsItem->image) : asset('custom-assets/front/placeholder/dummy-image-square.jpg') }}" alt="IMG">
                    </a>

                    <div class="p-t-16">
                        <h5 class="p-b-5">
                            <a href="{{ route('front.news.details', ['slug' => $categoryCompanyNewsNewsItem->slug]) }}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                {{ $categoryCompanyNewsNewsItem && $categoryCompanyNewsNewsItem->title ? (strlen($categoryCompanyNewsNewsItem->title) > 30 ? substr($categoryCompanyNewsNewsItem->title, 0, 30) . '..' : $categoryCompanyNewsNewsItem->title) : '' }}
                            </a>
                        </h5>


                        <p class="f1-s-11 cl6">
                            @php
                            echo strlen($categoryCompanyNewsNewsItem->description) > 120 ? substr(strip_tags($categoryCompanyNewsNewsItem->description), 0, 120) . '..' : strip_tags($categoryCompanyNewsNewsItem->description);
                            @endphp
                        </p>
                        <div class="cl8 p-b-17 pt-3">
                            <span class="f1-s-5">
                                {{ $categoryCompanyNewsNewsItem && $categoryCompanyNewsNewsItem->published_date ? \Carbon\Carbon::parse($categoryCompanyNewsNewsItem->published_date)->format('d-M-Y') : '' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
@endif
@stop

@section('js')
@stop
