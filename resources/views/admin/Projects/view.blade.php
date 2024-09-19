@extends('admin.layouts.main')
@section('title', 'View Project')
@section('css')

<style>
    .gallery {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
        gap: 10px;
        padding: 10px;
    }

    .gallery-item {
        overflow: hidden;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .gallery-item img {
        width: 100%;
        height: auto;
        display: block;
        transition: transform 0.3s ease;
    }

    .gallery-item:hover {
        transform: scale(1.05);
    }

    .gallery-item img {
        display: block;
        transition: transform 0.3s ease;
    }

    .gallery-item:hover img {
        transform: scale(1.05);
    }

    @media (max-width: 600px) {
        .gallery {
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        }
    }
</style>
@stop
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">View Project</h5>
                <!-- Account -->
                <hr class="my-0" />
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{ $Project['image'] ? asset($Project['image']) : asset('assets/admin/img/avatars/dummy-image-square.jpg') }}"
                                alt="Project Image" class="d-block rounded" height="100" width="100"
                                id="uploadedAvatar" />
                            <div id="dvPreview">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label for="title" class="form-label">Title</label>
                            <input class="form-control" type="text" disabled id="title" name="title"
                                value="{{ $Project['title'] }}" />
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="address" class="form-label">Address</label>
                            <input class="form-control" type="text" disabled id="address" name="address"
                                value="{{ $Project['address'] }}" />
                        </div>

                        <div class="mb-3 col-md-12">
                            <label for="category" class="form-label">Category</label>
                            <input class="form-control" type="text" disabled id="category" name="category"
                                value="{{ $Project->category->name }}" />
                        </div>
                        @if($Project['youtube_video_id'] && $Project->category_slug == 'animation')
                        <div class="mb-3 col-md-12 other-fileds" id="youtube-id-field-div">
                            <label for="youtube_video_id" class="form-label">Youtube Video</label>
                            <iframe width="100%" height="315"
                                src="https://www.youtube.com/embed/{{ $Project['youtube_video_id'] }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                        @endif

                        @if($Project['arvr_image'] && $Project->category_slug == 'arvr')

                        <div class="mb-3 col-md-12 other-fileds" id="arvr-image-field-div">
                            <label for="arvr_image" class="form-label">AR/VR 360 Image</label>
                            <div class="gallery">
                                <div class="gallery-item"><img src="{{ asset($Project['arvr_image']) }}" alt="Image"></div>
                            </div>
                            @endif

                            @if($Project->exteriorImages && $Project->category_slug != 'animation' && $Project->category_slug != 'arvr')
                            <div class="mb-3 col-md-12 other-fileds" id="exterior-images-field-div">
                                <label for="exterior_images" class="form-label">Exterior Images</label>
                                <div class="gallery">
                                    @foreach($Project->exteriorImages as $image)
                                    <div class="gallery-item"><img src="{{ asset($image->image) }}" alt="Image"></div>
                                    @endforeach
                                    <!-- Add more images as needed -->
                                </div>
                            </div>
                            @endif

                            @if($Project->interiorImages && $Project->category_slug != 'animation' && $Project->category_slug != 'arvr')
                            <div class="mb-3 col-md-12 other-fileds" id="interior-images-field-div">
                                <label for="interior_images" class="form-label">Interior Images</label>
                                <div class="gallery">
                                    @foreach($Project->interiorImages as $image)
                                    <div class="gallery-item"><img src="{{ asset($image->image) }}" alt="Image"></div>
                                    @endforeach
                                    <!-- Add more images as needed -->
                                </div>
                            </div>
                            @endif

                            <div class="mb-3 col-md-12">
                                <label for="description" class="form-label">Description</label>
                                <div class="form-control">
                                    {!! html_entity_decode($Project['description']) !!}
                                </div>
                            </div>
                            <div class="mt-2">
                                <a href="{{ route('admin.Projects.edit', $Project->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('admin.Projects.index') }}" class="btn btn-secondary">Back</a>
                            </div>
                        </div>
                    </div>
                    <!-- /Account -->
                </div>
            </div>
        </div>
    </div>
    @stop
