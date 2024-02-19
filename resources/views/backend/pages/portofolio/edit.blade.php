@extends('backend.layouts.admin_layout')
@section('main')
  <div class="card">
    <div class="card-header">
        <div class="h3">Add Portofolio</div>
    </div>
    <div class="card-body">
        <form action="{{ route('backend.update', ['id'=>$portofolio->id]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-12">
                    <div class="form-group"><label for="nama">Judul</label>
                    <input type="text" name="judul" id="nama" class="form-control" value="{{ $portofolio->judul }}"></div>
                </div>
                <div class="col-12">
                    <div class="form-group"><label for="e">Link</label>
                    <input type="text" name="link" id="e" class="form-control" value="{{ $portofolio->link }}"></div>
                </div>
                <div class="col-12">
                    <div class="form-group"><label for="p">Deskripsi</label>
                    <input type="text" name="description" id="p" class="form-control" value="{{ $portofolio->description }}"></div>
                </div>
                <div class="col-12">
                    <div class="form-group"><label for="nama">Image</label>
                    <input type="file" name="image" id="nama" class="form-control"></div>
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