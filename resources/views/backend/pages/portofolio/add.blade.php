@extends('backend.layouts.admin_layout')
@section('main')
    @include('backend.partials.message')

<div class="sidebar-adjustable">
  <div class="card">
    <div class="card-header">
        <div class="h3">Add Portofolio</div>
    </div>
    <div class="card-body">
        <form action="{{ route('backend.porto.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-12">
                    <div class="form-group"><label for="nama">Judul<span class="text-danger">*</span></label>
                    <input type="text" name="judul" id="nama" class="form-control"></div>
                    @error('judul')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-group"><label for="e">Link<span class="text-danger">*</span></label>
                    <input type="text" name="link" id="e" class="form-control"></div>
                    @error('link')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-group"><label for="p">Deskripsi<span class="text-danger">*</span></label>
                    <input type="text" name="description" id="p" class="form-control"></div>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="i">Image<span class="text-danger">*</span></label>
                        <input type="file" name="image" id="i" class="form-control">
                    </div>
                    <div class="preview-image mt-2"></div>
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="d-flex" style="margin-top: 20px"><button class="btn btn-primary">Save</button></div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>

<script>
    $(document).ready(function(){
        $('#i').change(function(){
            previewImage(this);
        });
    });

    function previewImage(input) {
        var preview = $('.preview-image');
        preview.html('');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                var img = $('<img>').attr('src', e.target.result).addClass('img-thumbnail').css({'width': '300px', 'height': '150px'});
                preview.append(img);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection