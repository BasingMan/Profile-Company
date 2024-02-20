@extends('backend.layouts.admin_layout')
@section('main')
  <div class="card">
    <div class="card-header">
        <div class="h3">Add Slider</div>
    </div>
    <div class="card-body">
        <form action="{{ route('backend.slider.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-12">
                    <div class="form-group"><label for="nama">Title</label>
                    <input type="text" name="title" id="nama" class="form-control"></div>
                </div>
                <div class="col-12">
                    <div class="form-group"><label for="e">Subtitle</label>
                    <input type="text" name="subtitle" id="e" class="form-control"></div>
                </div>
                <div class="col-12">
                    <div class="form-group"><label for="p">link</label>
                    <input type="text" name="link" id="p" class="form-control"></div>
                </div>
                <div class="col-12">
                    <div class="form-group"><label for="i">Image</label>
                    <input type="file" name="gambar" id="i" class="form-control"></div>
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