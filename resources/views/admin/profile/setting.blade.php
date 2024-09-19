@extends('admin.layouts.main')
@section('title', 'Profile Setting')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Profile Setting</h5>
                    <hr class="my-0" />
                    <div class="card-body">
                        <form id="form" method="POST" action="{{ route('admin.profile.setting.save') }}"
                            enctype="multipart/form-data">
                            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    <img src="{{ Auth::user()->profileimage ? asset(Auth::user()->profileimage) : asset('assets/admin/img/avatars/1.png') }}"
                                        alt="user-avatar" class="d-block rounded" height="100" width="100"
                                        id="uploadedAvatar" />
                                    <div id="dvPreview">
                                    </div>
                                    <div class="button-wrapper">
                                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                            <span class="d-none d-sm-block">Upload Profile Photo</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input type="file" id="upload" class="account-file-input" hidden
                                                accept="image/*" name="profileimage" onchange="readURL(this)" />
                                        </label>
                                        <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 4Mb</p>
                                    </div>
                                </div>
                                <div id="profileimage_error" class="text-danger"> @error('profileimage')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label for="name" class="form-label">Name</label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text"
                                        id="name" name="name"
                                        value="{{ Auth::user()->name ? Auth::user()->name : old('name') }}" autofocus />
                                    <div id="name_error" class="text-danger"> @error('name')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="text"
                                        id="email" name="email"
                                        value="{{ Auth::user()->email ? Auth::user()->email : old('email') }}" />
                                    <div id="email_error" class="text-danger"> @error('email')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label class="form-label " for="phone">Phone Number</label>
                                    <div class="input-group input-group-merge ">
                                        <span class="input-group-text @error('phone') border border-danger @enderror">IND
                                            (+91)</span>
                                        <input type="text" id="phone" name="phone"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            value="{{ Auth::user()->phone ? Auth::user()->phone : old('phone') }}" />
                                    </div>
                                    <div id="phone_error" class="text-danger"> @error('phone')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="username" class="form-label">User Name</label>
                                    <input class="form-control @error('username') is-invalid @enderror" type="text"
                                        id="username" name="username"
                                        value="{{ Auth::user()->username ? Auth::user()->username : old('username') }}"
                                        autofocus />
                                    <div id="username_error" class="text-danger"> @error('username')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" rows="3">{{ Auth::user()->address ? Auth::user()->address : old('address') }}</textarea>
                                    <div id="address_error" class="text-danger"> @error('address')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="dateofbirth" class="form-label">Date OF Birth</label>
                                    <input class="form-control @error('dateofbirth') is-invalid @enderror" type="date"
                                        id="dateofbirth" name="dateofbirth"
                                        value="{{ Auth::user()->dateofbirth ? Auth::user()->dateofbirth : old('dateofbirth') }}"
                                        autofocus />
                                    <div id="dateofbirth_error" class="text-danger"> @error('dateofbirth')
                                            {{ $message }}
                                        @enderror
                                    </div>

                                </div>

                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
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
                    $('#profileimage_error').html('Allowed JPG, GIF or PNG.')
                    $('#upload').val('');
                }
            }
        }
        dateofbirth.max = new Date().toISOString().split("T")[0];
    </script>

    <script>
        $(document).ready(function() {
            $('#form').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true,
                        minlength: 10,
                    },
                    username: {
                        required: true,
                    },
                    address: {
                        required: true,
                    },
                    dateofbirth: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: 'This field is required',
                    },
                    email: {
                        required: 'This field is required',
                        email: 'Enter a valid email',
                    },
                    phone: {
                        required: 'This field is required',
                        minlength: 'Phone must be at least 10 characters long'
                    },
                    username: {
                        required: 'This field is required',
                    },
                    address: {
                        required: 'This field is required',
                    },
                    dateofbirth: {
                        required: 'This field is required',
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
