@extends('admin.layouts.main')
@section('title', 'Create Project')

@section('css')
<style>
    .other-fileds {
        display: none;
    }
</style>
@if (old('category')=='animation')
<style>
    #youtube-id-field-div {
        display: block;
    }
</style>
@endif
@if (old('category')=='arvr')
<style>
    #arvr-image-field-div {
        display: block;
    }
</style>
@endif

@if (old('category') && old('category') !='arvr' && old('category') !='animation')
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
                <h5 class="card-header">Create Project </h5>
                <!-- Account -->
                <hr class="my-0" />
                <div class="card-body">
                    <form id="form" method="POST" action="{{ route('admin.Projects.save') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="image" class="form-label">Cover Image</label>
                                <input class="form-control" type="file" id="image" name="image">
                                <div id="image_error" class="text-danger"> @error('image')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="title" class="form-label">Title</label>
                                <input class="form-control @error('title') is-invalid @enderror" type="text"
                                    id="title" name="title" value="{{ old('title') }}" autofocus />
                                <div id="title_error" class="text-danger"> @error('title')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="address" class="form-label">Work type</label>
                                <input class="form-control @error('address') is-invalid @enderror" type="text"
                                    id="address" name="address" value="{{ old('address') }}" autofocus />
                                <div id="address_error" class="text-danger"> @error('address')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select @error('category') is-invalid @enderror" id="category"
                                    name="category">
                                    <option selected disabled value="">Select Category</option>
                                    @foreach ($categorys as $category)
                                    <option {{ old('category') == $category->slug ? 'selected' : '' }} slug="{{ $category->slug}}" value="{{ $category->slug }}">{{ $category->name }}</option>
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
                                    id="youtube_video_id" name="youtube_video_id" value="{{ old('youtube_video_id') }}" autofocus />
                                <div id="youtube_video_id_error" class="text-danger"> @error('youtube_video_id')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 col-md-12 other-fileds" id="arvr-image-field-div">
                                <label for="arvr_image" class="form-label">AR/VR 360 Image</label>
                                <input class="form-control" type="file" id="arvr_image" name="arvr_image">
                                <div id="arvr_image_error" class="text-danger"> @error('arvr_image')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 col-md-12 other-fileds" id="exterior-images-field-div">
                                <label for="exterior_images" class="form-label">Exterior Images</label>
                                <input class="form-control" type="file" id="exterior_images" name="exterior_images[]" multiple>
                                <div id="exterior_images_error" class="text-danger">
                                    @error('exterior_images')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 col-md-12 other-fileds" id="interior-images-field-div">
                                <label for="interior_images" class="form-label">Interior Images</label>
                                <input class="form-control" type="file" id="interior_images" name="interior_images[]" multiple>
                                <div id="interior_images_error" class="text-danger">
                                    @error('interior_images')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" rows="10" type="text"
                                    id="description" name="description" value="">{{ old('description') }}</textarea>
                                <div id="description_error" class="text-danger"> @error('description')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Save</button>
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
    var imageRequired = true;

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
                },
                arvr_image: {
                    required: function() {
                        return $('#category').find(':selected').attr('slug') == 'arvr';
                    }
                },
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
@stop
