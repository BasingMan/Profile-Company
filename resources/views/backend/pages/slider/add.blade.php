@extends('backend.layouts.admin_layout')
@section('main')
    @include('backend.partials.message')
  <div class="card">
    <div class="card-header">
        <div class="h3">Add Slider</div>
    </div>
    <div class="card-body">
        <form action="{{ route('backend.slider.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-12">
                    <div class="form-group"><label for="nama">Title<span class="text-danger">*</span></label>
                    <input type="text" name="title" id="nama" class="form-control"></div>
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-group"><label for="e">Subtitle<span class="text-danger">*</span></label>
                    <input type="text" name="subtitle" id="e" class="form-control"></div>
                    @error('subtitle')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-group"><label for="p">link<span class="text-danger">*</span></label>
                    <input type="text" name="link" id="p" class="form-control"></div>
                    @error('link')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-group"><label for="i">Image<span class="text-danger">*</span></label>
                    <input type="file" name="gambar" id="i" class="form-control"></div>
                    @error('gambar')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="d-flex"><button class="btn btn-primary">Save</button></div>
                </div>
            </div>
        </form>
    </div>
    <div class=""></div>
</div>
@endsection