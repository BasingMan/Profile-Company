@extends('backend.layouts.admin_layout')
@section('main')
    @include('backend.partials.message')
<div class="sidebar-adjustable">
  <div class="card">
    <div class="card-header">
        <div class="h3">Edit Banner</div>
    </div>
    <div class="card-body">
        <form action="{{ route('backend.slider.update', ['id' => $slider->id]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-12">
                    <div class="form-group"><label for="nama">Title</label>
                    <input type="text" name="title" id="nama" class="form-control" value="{{ $slider->title }}"></div>
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-group"><label for="e">Subtitle</label>
                    <input type="text" name="subtitle" id="e" class="form-control" value="{{ $slider->subtitle }}"></div>
                    @error('subtitle')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="i">Image</label>
                        @if($slider->gambar)
                            <br>
                            <img src="{{ asset('uploads/slider/' . $slider->gambar) }}" alt="Image" style="max-width: 300px;" class="current-image">
                        @endif
                        <input type="file" name="gambar" id="i" class="form-control">
                    </div>
                    @error('gambar')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="d-flex" style="margin-top: 20px"><button class="btn btn-primary">Save</button></div>
                </div>
            </div>
        </form>
    </div>
    <div class=""></div>
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

        if (currentImage.attr('src')) {
            preview.append(currentImage.clone().removeClass('current-image').addClass('img-thumbnail'));
        }
    }

    function previewImage(input) {
        var preview = $('.preview-image');
        preview.html('');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                var img = $('<img>').attr('src', e.target.result).addClass('img-thumbnail').css({'width': '300px', 'height': '150px'});
                preview.append(img);

                $('.current-image').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection
