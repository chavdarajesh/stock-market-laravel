@extends('admin.layouts.main')
@section('title', 'View Contact Enquiry')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-md-12">

                <div class="card mb-4">
                    <h5 class="card-header">View Contact Enquiry</h5>
                    <hr class="my-0" />
                    <div class="card-body">
                        <input type="hidden" name="id" value="{{ $CareerMessage->id }}">

                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="name" class="form-label">Name</label>
                                <input class="form-control" type="text" id="name" name="name"
                                    value="{{ $CareerMessage->name }}" disabled />
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="email" class="form-label">E-mail</label>
                                <input class="form-control" type="text" id="email" name="email"
                                    value="{{ $CareerMessage->email }}" disabled />
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="phone" class="form-label">Phone</label>
                                <input class="form-control" type="text" id="phone" name="phone"
                                    value="{{ $CareerMessage->phone }}" disabled />
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="state" class="form-label">State</label>
                                <input class="form-control" type="text" id="state" name="state"
                                    value="{{ $CareerMessage->state }}" disabled />
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="city" class="form-label">City</label>
                                <input class="form-control" type="text" id="city" name="city"
                                    value="{{ $CareerMessage->city }}" disabled />
                            </div>

                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="subject">Resume</label>
                                <div class="input-group input-group-merge">
                                   <a target="_blank" class="form-control" href="{{ asset($CareerMessage->resume) }}">Open</a>
                                </div>
                            </div>


                            <div class="mb-3 col-md-12">
                                <label for="message" class="form-label">Message</label>
                                <textarea name="message" id="message" rows="3" class="form-control" disabled> {{ $CareerMessage->message }}</textarea>
                            </div>

                        </div>
                        <div class="mt-2">
                            <a href="{{ route('admin.career.messages.index') }}"><button type="submit"
                                    class="btn btn-secondary me-2">Back</button></a>
                        </div>

                    </div>
                    <!-- /Account -->
                </div>
            </div>
        </div>
    </div>
@stop
