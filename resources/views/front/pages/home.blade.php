@extends('front.layouts.main')
@section('title', 'Home')
@section('css')
    <style>
        #header-carousel .carousel-indicators [data-bs-target] {
            width: 14px;
            height: 14px;
            border-radius: 100%;
        }

        .icon-overlay {
            z-index: 1;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            /* Adjust size as needed */
            height: 50px;
            /* Adjust size as needed */
            /* background: rgba(255, 255, 255, 0.7);  */
            border-radius: 50%;
            /* Optional: rounded background */
        }

        .icon-overlay img {
            width: 50px;
            /* Adjust size as needed */
            height: 50px;
            /* Adjust size as needed */
        }
    </style>
@stop
@section('content')
    @if (!$HomeSlider->isEmpty())
        <!-- Carousel Start -->
        <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
            <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach ($HomeSlider as $key => $slider)
                        <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="{{ $key }}"
                            class=" {{ $key == 0 ? 'active' : '' }} " {{ $key == 0 ? ' aria-current="true" ' : '' }}
                            aria-label="Slide {{ $key + 1 }}"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach ($HomeSlider as $key => $slider)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img class="w-100" src="{{ asset($slider->image) }}" alt="Image">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- Carousel End -->
    @endif
    @if (!$Projects->isEmpty())
        <!-- Projects Start -->
        <div class="container-xxl py-5" id="home-projects-isotope-div">
            <div class="container">
                <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h1 class="display-5 mb-5">Some Of Our Wonderful Projects</h1>
                </div>
                <div class="row g-4 portfolio-container">
                    @foreach ($Projects as $key => $Project)
                        <div class="col-lg-4 col-md-6 portfolio-item  wow fadeInUp {{ $Project->category->slug }} "
                            data-wow-delay="0.1s">
                            <div class="portfolio-inner rounded">
                                @if ($Project->category->slug == 'arvr')
                                    <a target="_blank" href="{{ route('front.project.details.arvr', $Project->id) }}">
                                        <img class="img-fluid w-100" src="{{ asset($Project->image) }}" alt="">
                                        <div class="portfolio-text">
                                            {{-- <h4 class="text-white mb-1">{{ $Project->title }}</h4> --}}
                                            {{-- <p class="fs-6 text-white mb-1">{{ $Project->address }}</p> --}}
                                            {{-- <div class="d-flex"> --}}
                                            {{-- <a class="btn btn-lg-square rounded-circle mx-2" href="{{ asset($Project->image) }}"
                                            data-lightbox="portfolio"><i class="fa fa-eye"></i></a> --}}
                                            {{-- <a class="btn btn-lg-square rounded-circle mx-2" href=""><i
                                                class="fa fa-link"></i></a> --}}
                                            {{-- </div> --}}
                                        </div>
                                    </a>
                                @elseif($Project->category->slug == 'animation')
                                    <img class="img-fluid w-100" src="{{ asset($Project->image) }}" alt="">
                                    <div class="icon-overlay openYoutubeLightBoxPopup"
                                        data-id="{{ $Project->youtube_video_id }}">
                                        <img src="{{ asset('custom-assets/front/images/YouTube_full-color_icon.svg') }}"
                                            alt="YouTube Icon">
                                    </div>
                                    <div class="portfolio-text openYoutubeLightBoxPopup"
                                        data-id="{{ $Project->youtube_video_id }}">
                                        <h4 class="text-white mb-1">{{ $Project->title }}</h4>
                                        <p class="fs-6 text-white mb-1">{{ $Project->address }}</p>
                                        <div class="d-flex">
                                            {{-- <a class="btn btn-lg-square rounded-circle mx-2" href="{{ asset($Project->image) }}"
                                            data-lightbox="portfolio"><i class="fa fa-eye"></i></a> --}}
                                            {{-- <a class="btn btn-lg-square rounded-circle mx-2" href=""><i
                                                class="fa fa-link"></i></a> --}}
                                        </div>
                                    </div>
                                @else
                                    <a href="{{ route('front.project.details', $Project->id) }}">
                                        <img class="img-fluid w-100" src="{{ asset($Project->image) }}" alt="">
                                        <div class="portfolio-text">
                                            <h4 class="text-white mb-1">{{ $Project->title }}</h4>
                                            <p class="fs-6 text-white mb-1">{{ $Project->address }}</p>
                                            <div class="d-flex">
                                                {{-- <a class="btn btn-lg-square rounded-circle mx-2" href="{{ asset($Project->image) }}"
                                            data-lightbox="portfolio"><i class="fa fa-eye"></i></a> --}}
                                                {{-- <a class="btn btn-lg-square rounded-circle mx-2" href=""><i
                                                class="fa fa-link"></i></a> --}}
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Projects End -->
    @endif

    <div class="modal " tabindex="-1" id="youtube-video-modal">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background-color: #000">
                <div class="modal-header border-0 ">
                    <button type="button" class="btn-close btn-close-white close-youtube-model" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body m-0">
                    <div class="embed-responsive embed-responsive-16by9 w-100 h-100">
                        <iframe id="youtube-video" class="w-100 h-100" src="https://www.youtube.com/embed/" frameborder="0"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.openYoutubeLightBoxPopup', function() {
                var videoId = $(this).data('id');
                openYoutubeLightBoxPopup(videoId);
            });

            $("#youtube-video-modal .close-youtube-model").on("click", function() {
                $('#youtube-video-modal #youtube-video').prop('src', 'https://www.youtube.com/embed/');
            })
        });

        function openYoutubeLightBoxPopup(videoId) {
            $('#youtube-video-modal').fadeIn(1000, function() {
                $(this).modal('show');
            });
            var videoURL = $('#youtube-video-modal #youtube-video').prop('src');
            videoURL += videoId + "?autoplay=1&mute=1&rel=0";
            $('#youtube-video-modal #youtube-video').prop('src', videoURL);
        }
    </script>

@stop
