@extends('backend.layouts.admin_layout')

@section('main')
    @include('backend.partials.message')
    <div class="card">
        <div class="card-header">
            <div class="h3">Pengaturan</div>
            <hr>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.pengaturan.update') }}" method="post" id="pengaturan">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group mb-3">
                        <label for="website_name">Website Name : </label>
                        <input type="text" class="form-control" value="{{ $data['website_name'] }}" name="website_name">
                    </div>
                    <div class="form-group mb-3">
                        <label for="url">Url : </label>
                        <input type="text" class="form-control" value="{{ $data['url'] }}" name="url">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Email : </label>
                        <input type="text" class="form-control" value="{{ $data['email'] }}" name="email">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Phone : </label>
                        <input type="text" class="form-control" value="{{ $data['phone'] }}" name="phone">
                    </div>
                    <div class="form-group mb-3">
                        <label for="address">Address : </label>
                        <textarea name="address" id="" cols="30" rows="3" class="form-control" form="pengaturan">
                            {{ $data['address'] }}
                        </textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="about_us">About Us</label>
                        <textarea name="about_us" form="pengaturan" cols="30" rows="10" class="form-control">
                            {{ $data['about_us'] }}
                        </textarea>
                    </div>
                    <hr>
                    <h3>Social Media</h3>
                    <hr>
                    <div class="form-group mb-3">
                        <label for="">Twitter : </label>
                        <input type="text" class="form-control" name="twitter" value="{{ $data['twitter'] }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Facebook : </label>
                        <input type="text" class="form-control" name="facebook" value="{{ $data['facebook'] }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Instagram : </label>
                        <input type="text" class="form-control" name="instagram" value="{{ $data['instagram'] }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Skype : </label>
                        <input type="text" class="form-control" name="skype" value="{{ $data['skype'] }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Linkedin : </label>
                        <input type="text" class="form-control" name="linkedin" value="{{ $data['linkedin'] }}">
                    </div>
                    <div class="form-group d-flex justify-content-end"><button class="btn btn-primary">Save</button></div>

                </div>
            </form>
        </div>
    </div>
@endsection
