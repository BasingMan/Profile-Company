@extends('backend.layouts.admin_layout')
@section('main')
    @include('backend.partials.message')
<div class="sidebar-adjustable">
  <div class="card">
    <div class="card-header">
        <div class="h3">Edit Service</div>
    </div>
    <div class="card-body">
        <form action="{{ route('backend.ser.update', ['id' => $ser->id]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
        
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="nama">Title</label>
                        <input type="text" name="title" id="nama" class="form-control" placeholder="Title..." value="{{ old('title', $ser->title) }}">
                    </div>
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="e">Service</label>
                        <input type="text" name="text" id="e" class="form-control" maxlength="70" placeholder="70 Character MAX" value="{{ old('text', $ser->text) }}">
                    </div>
                    @error('text')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="i">Image</label>
                        <div class="current-image">
                            @if($ser->image_ser)
                                <br>
                                <img src="{{ asset('uploads/ser/' . $ser->image_ser) }}" alt="Image" style="max-width: 200px;">
                            @endif
                        </div>
                        <input type="file" name="image_ser" id="i" class="form-control">
                    </div>
                    @error('image_ser')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="d-flex" style="margin-top: 20px">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
  </div>
</div>

<script>
    $(document).ready(function(){
        displayCurrentImage();

        $('#i').change(function(){
            previewImage(this);
        });
    });

    function displayCurrentImage() {
        var currentImage = $('.current-image');
        var preview = $('.preview-image');
        preview.html('');

        if (currentImage.find('img').attr('src')) {
            preview.append(currentImage.find('img').clone().removeClass('current-image').addClass('img-thumbnail'));
        }
    }

    function previewImage(input) {
        var preview = $('.preview-image');
        preview.html('');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                var img = $('<img>').attr('src', e.target.result).addClass('img-thumbnail').css({'width': '200px', 'height': 'auto'});
                preview.append(img);

                $('.current-image').html(img.clone());
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection