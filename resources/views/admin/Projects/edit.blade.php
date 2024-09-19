@extends('admin.layouts.main')
@section('title', 'Edit Project')
@section('css')
<style>
    .other-fileds {
        display: none;
    }

    .gallery {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
        gap: 10px;
        padding: 10px;
    }

    .gallery-item {
        position: relative;
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

    .gallery-item:hover img {
        transform: scale(1.05);
    }

    .close-icon {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 1.5em;
        color: #fff;
        background-color: rgba(0, 0, 0, 0.6);
        border-radius: 50%;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .close-icon:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    @media (max-width: 600px) {
        .gallery {
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        }
    }
</style>
@if ($Project->category->slug =='animation')
<style>
    #youtube-id-field-div {
        display: block;
    }
</style>
@endif
@if ($Project->category->slug =='arvr')
<style>
    #arvr-image-field-div {
        display: block;
    }
</style>
@endif

@if ($Project->category->slug && $Project->category->slug !='arvr' && $Project->category->slug !='animation')
<style>
    #exterior-images-field-div,
    #interior-images-field-div {
        display: block;
    }
</style>
@endif
@stop
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12">

            <div class="card mb-4">
                <h5 class="card-header">Edit Blogs</h5>
                <!-- Account -->
                <hr class="my-0" />
                <div class="card-body">
                    <form id="form" method="POST" action="{{ route('admin.Projects.update') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $Project['id'] }}">
                        <input type="hidden" name="old_image" id="old_image" value="{{ $Project['image'] }}">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="image" class="form-label">Cover Image</label>
                                <input class="form-control" type="file" id="image" name="image">
                                <div id="image_error" class="text-danger"> @error('image')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <img src="{{ $Project['image'] ? asset($Project['image']) : asset('assets/admin/img/avatars/dummy-image-square.jpg') }}"
                                    alt="Project Image" class="d-block rounded" height="100" width="100"
                                    id="uploadedAvatar" />
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="title" class="form-label">Title</label>
                                <input class="form-control @error('title') is-invalid @enderror" type="text"
                                    id="title" name="title" value="{{ $Project['title'] }}" autofocus />
                                <div id="title_error" class="text-danger"> @error('title')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="address" class="form-label">Work type</label>
                                <input class="form-control @error('address') is-invalid @enderror" type="text"
                                    id="address" name="address" value="{{ $Project['address'] }}" autofocus />
                                <div id="address_error" class="text-danger"> @error('address')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select @error('category') is-invalid @enderror" id="category"
                                    name="category">
                                    @foreach ($categorys as $category)
                                    <option slug="{{$category->slug}}" {{ $category->id == $Project->category->id ? 'selected' : '' }}
                                        value="{{ $category->slug }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <div id="category_error" class="text-danger"> @error('category')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 col-md-12 other-fileds" id="youtube-id-field-div">
                                <label for="youtube_video_id" class="form-label">Youtube Video ID</label>
                                <input class="form-control @error('youtube_video_id') is-invalid @enderror" type="text"
                                    id="youtube_video_id" name="youtube_video_id" value="{{ $Project->youtube_video_id }}" autofocus />
                                <div id="youtube_video_id_error" class="text-danger"> @error('youtube_video_id')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            @if($Project['youtube_video_id'] && $Project->category_slug == 'animation')
                            <div class="mb-3 col-md-12 other-fileds" id="youtube-id-field-div">
                                <iframe width="100%" height="315"
                                    src="https://www.youtube.com/embed/{{ $Project['youtube_video_id'] }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </div>
                            @endif

                            <div class="mb-3 col-md-12 other-fileds" id="arvr-image-field-div">
                                <label for="arvr_image" class="form-label">AR/VR 360 Image</label>
                                <input class="form-control" type="file" id="arvr_image" name="arvr_image">
                                <div id="arvr_image_error" class="text-danger"> @error('arvr_image')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            @if($Project['arvr_image'] && $Project->category_slug == 'arvr')

                            <div class="mb-3 col-md-12 other-fileds" style="display: block;">
                                <div class="gallery">
                                    <div class="gallery-item"><img src="{{ asset($Project['arvr_image']) }}" alt="Image"></div>
                                </div>
                            </div>

                            @endif

                            <div class="mb-3 col-md-12 other-fileds" id="exterior-images-field-div">
                                <label for="exterior_images" class="form-label">Exterior Images</label>
                                <input class="form-control" type="file" id="exterior_images" name="exterior_images[]" multiple>
                                <div id="exterior_images_error" class="text-danger">
                                    @error('exterior_images')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            @if($Project->exteriorImages && $Project->category_slug != 'animation' && $Project->category_slug != 'arvr')
                            <div class="mb-3 col-md-12 other-fileds" style="display: block;">
                                <div class="gallery">
                                    @foreach($Project->exteriorImages as $image)
                                    <div class="gallery-item" data-image-id="{{$image->id}}"><img src="{{ asset($image->image) }}" alt="Image">
                                        <div class="close-icon exteriorImages">&times;</div>
                                    </div>
                                    @endforeach
                                    <!-- Add more images as needed -->
                                </div>
                            </div>
                            @endif

                            <div class="mb-3 col-md-12 other-fileds" id="interior-images-field-div">
                                <label for="interior_images" class="form-label">Interior Images</label>
                                <input class="form-control" type="file" id="interior_images" name="interior_images[]" multiple>
                                <div id="interior_images_error" class="text-danger">
                                    @error('interior_images')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            @if($Project->interiorImages && $Project->category_slug != 'animation' && $Project->category_slug != 'arvr')
                            <div class="mb-3 col-md-12 other-fileds" style="display: block;">
                                <div class="gallery">
                                    @foreach($Project->interiorImages as $image)
                                    <div class="gallery-item" data-image-id="{{$image->id}}"><img src="{{ asset($image->image) }}" alt="Image">
                                        <div class="close-icon interiorImages">&times;</div>
                                    </div>
                                    @endforeach
                                    <!-- Add more images as needed -->
                                </div>
                            </div>
                            @endif

                            <div class="mb-3 col-md-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" rows="5" type="text"
                                    id="description" name="description" value="">{!! $Project['description'] !!}</textarea>
                                <div id="description_error" class="text-danger"> @error('description')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                <a href="{{ route('admin.Projects.index') }}" class="btn btn-secondary">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script src="{{ asset('assets/admin/js/jquery.validate.min.js') }}"></script>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            if (input.files[0].type.startsWith('image/')) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector("#uploadedAvatar").setAttribute("src", e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                $('#image_error').html('Allowed JPG, GIF or PNG.')
                $('#upload').val('');
            }
        }
    }
    CKEDITOR.replace('description');
</script>
<script>
    var imageRequired = $('#old_image').val() ? false : true;

    $(document).ready(function() {
        $('#form').validate({
            rules: {
                image: {
                    required: imageRequired,
                },
                title: {
                    required: true,
                },
                address: {
                    required: true,
                },
                category: {
                    required: true,
                },
                description: {
                    required: true,
                },
                youtube_video_id: {
                    required: function() {
                        return $('#category').find(':selected').attr('slug') == 'animation';
                    }
                }
            },
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                $('#' + element.attr('id') + '_error').html(error)
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#category').change(function() {
            var selectedCategory = $(this).find(':selected').attr('slug');
            $('.other-fileds').slideUp();
            if (selectedCategory === 'animation') {
                $('#youtube-id-field-div').slideDown();
            } else if (selectedCategory === 'arvr') {
                $('#arvr-image-field-div').slideDown();
            } else if (selectedCategory) {
                $('#exterior-images-field-div').slideDown();
                $('#interior-images-field-div').slideDown();
            }
        });
    });
</script>

<script>
    // script.js
    $(document).ready(function() {
        $('.interiorImages').on('click', function() {
            var galleryItem = $(this).closest('.gallery-item');
            var imageId = galleryItem.data('image-id');

            $.ajax({
                url: '{{ route("admin.Projects.image.delete.interior") }}',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': imageId
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.success) {
                        galleryItem.remove();
                        toastr.success(data.success);
                    }
                    if (data.error) {
                        toastr.error(data.error);
                    }
                },
                error: function(xhr) {

                    toastr.error(xhr);

                }
            });
        });
        $('.exteriorImages').on('click', function() {
            var galleryItem = $(this).closest('.gallery-item');
            var imageId = galleryItem.data('image-id');
            $.ajax({
                url: '{{ route("admin.Projects.image.delete.exterior") }}',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': imageId
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.success) {
                        galleryItem.remove();
                        toastr.success(data.success);
                    }
                    if (data.error) {
                        toastr.error(data.error);
                    }
                },
                error: function(xhr) {

                    toastr.error(xhr);

                }
            });
        });
    });
</script>
@stop
