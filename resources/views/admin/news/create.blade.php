@extends('admin.layouts.main')
@section('title', 'Create News')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">News /</span> All News /</span> Create News</h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Create News </h5>
                <!-- Account -->
                <hr class="my-0" />
                <div class="card-body">
                    <form id="form" method="POST" action="{{ route('admin.news.save') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="image" class="form-label">Image</label>
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
                            <div class="mb-3 col-md-6">
                                <label for="author" class="form-label">Author</label>
                                <select class="form-select @error('author') is-invalid @enderror" id="author"
                                    name="author">
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ Auth::user()->id == $user->id ? 'selected' : '' }}>{{ $user->name }}
                                    </option>
                                    @endforeach
                                </select>
                                <div id="author_error" class="text-danger"> @error('author')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="publish-date" class="form-label">Publish Date</label>
                                <input class="form-control @error('published_date') is-invalid @enderror" type="date"
                                    id="publish-date" name="published_date"
                                    value="{{ old('published_date') ? old('published_date') : date('Y-m-d') }}" />
                                <div id="published_date_error" class="text-danger"> @error('published_date')
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
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <div id="category_error" class="text-danger"> @error('category')
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
                                <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Back</a>
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
    CKEDITOR.replace('description');
</script>
<script>
    $(document).ready(function() {
        $('#form').validate({
            rules: {
                image: {
                    required: true,
                },
                title: {
                    required: true,
                },
                author: {
                    required: true,
                },
                category: {
                    required: true,
                },
                published_date: {
                    required: true,
                },
                description: {
                    required: function() {
                        var editor = CKEDITOR.instances.description;
                        if (editor) {
                            var text = editor.getData().replace(/<[^>]*>/g, '');
                            return text.length === 0;
                        }
                        return true;
                    },
                }
            },
            // messages: {
            //     title: {
            //         required: 'This field is required',
            //     },
            //     user: {
            //         required: 'This field is required',
            //     },
            //     author: {
            //         required: 'This field is required',
            //     },
            //     tags: {
            //         required: 'This field is required',
            //     },
            //     published_date: {
            //         required: 'This field is required',
            //     },
            //     description: {
            //         required: 'This field is required',
            //     }
            // },
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
