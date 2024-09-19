@extends('admin.layouts.main')
@section('title', 'Edit HomeSlider')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Edit HomeSliders</h5>
                    <!-- Account -->
                    <hr class="my-0" />
                    <div class="card-body">
                        <form id="form" method="POST" action="{{ route('admin.homeslider.update') }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $HomeSlider['id'] }}">
                            <input type="hidden" name="old_image" value="{{ $HomeSlider['image'] }}">

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
                                    <img src="{{ $HomeSlider['image'] ? asset($HomeSlider['image']) : asset('assets/admin/img/avatars/dummy-image-square.jpg') }}"
                                        alt="HomeSlider Image" class="d-block rounded" height="100" width="100"
                                        id="uploadedAvatar" />
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="name" class="form-label">Name</label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text"
                                        id="name" name="name" value="{{ $HomeSlider['name'] }}" autofocus />
                                    <div id="name_error" class="text-danger"> @error('name')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                    <a href="{{ route('admin.homeslider.index') }}" class="btn btn-secondary">Back</a>
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
    </script>
    <script>
        $(document).ready(function() {
            var imageRequired = $('#old_image').val() ? false : true;
            $('#form').validate({
                rules: {
                    // name: {
                    //     required: true,
                    // },
                    image: {
                        required: imageRequired,
                        accept: "image/*"
                    }
                },
                messages: {
                    // name: {
                    //     required: 'This field is required',
                    // },
                    image: {
                        required: 'This field is required',
                        accept: 'Allowed JPG, GIF or PNG.'
                    }
                },
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    $('#' + element.attr('name') + '_error').html(error)
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
@stop
