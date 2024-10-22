@extends('admin.layouts.main')
@section('title', 'View News')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">News /</span> All News /</span> View News</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">News Setting</h5>
                    <!-- Account -->
                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <img src="{{ $News['image'] ? asset($News['image']) : asset('assets/admin/img/avatars/dummy-image-square.jpg') }}"
                                    alt="News Image" class="d-block rounded" height="100" width="100"
                                    id="uploadedAvatar" />
                                <div id="dvPreview">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="title" class="form-label">Title</label>
                                <input class="form-control" type="text" disabled id="title" name="title"
                                    value="{{ $News['title'] }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="author" class="form-label">Author</label>
                                <input class="form-control" type="text" disabled id="author" name="author"
                                    value="{{ $News['author'] }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="published_date" class="form-label">Published Date</label>
                                <input class="form-control" type="text" disabled id="published_date"
                                    name="published_date" value="{{ \Carbon\Carbon::parse($News['published_date'])->format('d-m-Y') }}" />
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="category" class="form-label">Category</label>
                                <input class="form-control" type="text" disabled id="category" name="category"
                                    value="{{ $News->category->name }}" />
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="description" class="form-label">Description</label>
                                <div class="form-control">
                                    {!! html_entity_decode($News['description']) !!}
                                </div>
                            </div>
                            <div class="mt-2">
                                <a href="{{ route('admin.news.edit', $News->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Back</a>
                            </div>
                        </div>
                    </div>
                    <!-- /Account -->
                </div>
            </div>
        </div>
    </div>
@stop
