@extends('backend.layouts.admin_layout')
@section('main')
    @include('backend.partials.message')
<div class="sidebar-adjustable">
  <div class="card">
    <div class="card-header">
        <div class="h3">Edit Portofolio</div>
    </div>
    <div class="card-body">
        <form action="{{ route('backend.porto.update', ['id'=>$portofolio->id]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="nama">Judul<span class="text-danger">*</span></label>
                        <input type="text" name="judul" id="nama" class="form-control" value="{{ $portofolio->judul }}">
                    </div>
                    @error('judul')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="e">Link<span class="text-danger">*</span></label>
                        <input type="text" name="link" id="e" class="form-control" value="{{ $portofolio->link }}">
                    </div>
                    @error('link')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="p">Deskripsi<span class="text-danger">*</span></label>
                        <input type="text" name="description" id="p" class="form-control" maxlength="100" value="{{ $portofolio->description }}">
                    </div>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="image">Image<span class="text-danger">*</span></label>
                        <div class="current-image">
                            @if($portofolio->image)
                                <br>
                                <img src="{{ asset('uploads/porto/' . $portofolio->image) }}" alt="Image" style="max-width: 200px;">
                            @endif
                        </div>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    @error('image')
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

        $('#image').change(function(){
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
                var img = $('<img>').attr('src', e.target.result).addClass('img-thumbnail').css({'max-width': '200px', 'height': 'auto'});
                preview.append(img);

                $('.current-image').html(img.clone());
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
