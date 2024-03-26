@extends('backend.layouts.admin_layout')
@section('main')
    @include('backend.partials.message')
<div class="sidebar-adjustable">
  <div class="card">
    <div class="card-header">
        <div class="h3">Add Service</div>
    </div>
    <div class="card-body">
        <form action="{{ route('backend.ser.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-12">
                    <div class="form-group"><label for="nama">Title<span class="text-danger">*</span></label>
                    <input type="text" name="title" id="nama" class="form-control" placeholder="Title..."></div>
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-group"><label for="e">Service<span class="text-danger">*</span></label>
                    <input type="text" name="text" id="e" class="form-control" maxlength="70" placeholder="70 Character MAX"></div>
                    @error('text')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="i">Image<span class="text-danger">*</span></label>
                        <input type="file" name="image_ser" id="i" class="form-control">
                    </div>
                    <div class="preview-image mt-2"></div>
                    @error('image_ser')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="d-flex" style="margin-top: 20px"><button class="btn btn-primary">Save</button></div>
                </div>
            </div>
        </form>
    </div>
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
