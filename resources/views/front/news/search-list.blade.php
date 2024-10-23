@extends('front.layouts.main')
@section('title', 'Search News : '.$search)
@section('css')

@stop
@section('content')
<!-- Breadcrumb -->
<div class="container">
    <form action="{{ route('front.news.search') }}" class="sidebar__search-form" method="GET">
        <div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
            <div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6 w-100 ">
                <input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search" value="{{ isset($search) ? $search : '' }}">
                <button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03" type="submit">
                    <i class="zmdi zmdi-search"></i>
                </button>
            </div>
        </div>
    </form>
</div>

<!-- Page heading -->
<div class="container p-t-4 p-b-40">
    <h2 class="f1-l-1 cl2">
        News Search : {{$search}}
    </h2>
</div>

<!-- Post -->
<section class="bg0 p-b-55">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-10 col-lg-8 p-b-80">
                @if (!$News->isEmpty())
                <div class="p-r-10 p-r-0-sr991">
                    <div class="m-t--40 p-b-40">
                        <!-- Item post -->
                        @foreach ($News as $New)
                        <div class="flex-wr-sb-s p-t-40 p-b-15 how-bor2">
                            <a href="{{ route('front.news.details', ['slug' => $New->slug]) }}" class="size-w-8 wrap-pic-w hov1 trans-03 w-full-sr575 m-b-25">
                                <img style="max-height: 260px;" src="{{ $New && isset($New->image) && $New->image ? asset($New->image) : asset('custom-assets/front/placeholder/dummy-image-square.jpg') }}" alt="IMG">
                            </a>

                            <div class="size-w-9 w-full-sr575 m-b-25">
                                <h5 class="p-b-12">
                                    <a href="{{ route('front.news.details', ['slug' => $New->slug]) }}" class="f1-l-1 cl2 hov-cl10 trans-03 respon2">
                                        {{ $New && $New->title ? (strlen($New->title) > 60 ? substr($New->title, 0, 60) . '..' : $New->title) : '' }}
                                    </a>
                                </h5>

                                <div class="cl8 p-b-18">
                                    <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                        by {{$New->user->name}}
                                    </a>

                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span>

                                    <span class="f1-s-3">
                                        {{ $New && $New->published_date ? \Carbon\Carbon::parse($New->published_date)->format('d-M-Y') : '' }}
                                    </span>
                                </div>

                                <p class="f1-s-1 cl6 p-b-24">
                                    @php
                                    echo strlen($New->description) > 120 ? substr(strip_tags($New->description), 0, 120) . '..' : strip_tags($New->description);
                                    @endphp </p>

                                <a href="{{ route('front.news.details', ['slug' => $New->slug]) }}" class="f1-s-1 cl9 hov-cl10 trans-03">
                                    Read More
                                    <i class="m-l-2 fa fa-long-arrow-alt-right"></i>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    {{ $News->links('vendor.pagination.bootstrap-4') }}
                    <!-- <a href="#" class="flex-c-c size-a-13 bo-all-1 bocl11 f1-m-6 cl6 hov-btn1 trans-03">
                        Load More
                    </a> -->
                </div>
                @else
                <a href="{{route('front.home')}}" class="f1-s-10 cl2 hov-cl10 trans-03 text-uppercase">
                    No News Found!
                </a>
                @endif
            </div>


            <!-- Sidebar -->
            <div class="col-md-10 col-lg-4 p-b-30">
                <div class="p-l-10 p-rl-0-sr991 p-t-70">
                    <!-- Category -->
                    @if (!$categorys->isEmpty())
                    <div class="p-b-60">
                        <div class="how2 how2-cl4 flex-s-c">
                            <h3 class="f1-m-2 cl3 tab01-title">
                                Category
                            </h3>
                        </div>

                        <ul class="p-t-35">
                            @foreach ($categorys as $category)
                            <li class="how-bor3 p-rl-4">
                                <a href="{{ route('front.news.category.list', ['slug' => $category->slug]) }}" class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
                                    {{ $category->name }}
                                </a>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                    @endif

                    @if (!$newsCount->isEmpty())
                    <div class="p-b-37">
                        <div class="how2 how2-cl4 flex-s-c">
                            <h3 class="f1-m-2 cl3 tab01-title">
                                Archive
                            </h3>
                        </div>

                        <ul class="p-t-32">
                            @foreach($newsCount as $news)
                            <li class="p-rl-4 p-b-19">
                                <a href="{{ route('front.news.archive', ['month' => $news->month,'year'=>$news->year ]) }}" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
                                    <span>
                                        {{ $news->month }} {{ $news->year }}
                                    </span>

                                    <span>
                                        ({{ $news->news_count }})
                                    </span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <!-- Popular Posts -->
                    @if (!$latestNews->isEmpty())
                    <div class="p-b-30">
                        <div class="how2 how2-cl4 flex-s-c">
                            <h3 class="f1-m-2 cl3 tab01-title">
                                Latest Post
                            </h3>
                        </div>

                        <ul class="p-t-35">
                            @foreach ($latestNews as $latestNew)
                            <li class="flex-wr-sb-s p-b-30">
                                <a href="{{ route('front.news.details', ['slug' => $latestNew->slug]) }}" class="size-w-10 wrap-pic-w hov1 trans-03">
                                    <img style="max-height: 75px;" src="{{ $latestNew && isset($latestNew->image) && $latestNew->image ? asset($latestNew->image) : asset('custom-assets/front/placeholder/dummy-image-square.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-11">
                                    <h6 class="p-b-4">
                                        <a href="{{ route('front.news.details', ['slug' => $latestNew->slug]) }}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            {{ $latestNew && $latestNew->title ? (strlen($latestNew->title) > 60 ? substr($latestNew->title, 0, 60) . '..' : $latestNew->title) : '' }}
                                        </a>
                                    </h6>

                                    <span class="cl8 txt-center p-b-24">
                                        <!-- <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Music
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span> -->

                                        <span class="f1-s-3">
                                            {{ $latestNew && $latestNew->published_date ? \Carbon\Carbon::parse($latestNew->published_date)->format('d-M-Y') : '' }}
                                        </span>
                                    </span>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@stop

@section('js')
@stop
