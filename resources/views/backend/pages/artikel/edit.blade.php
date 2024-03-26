@extends('backend.layouts.admin_layout')
@section('main')
    @include('backend.partials.message')
{{-- CKEDITOR --}}
<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js">
</script>

<style>
    .ck-editor__editable{
        min-height: 100px;
    }
</style>

<div class="sidebar-adjustable">
  <div class="card">
    <div class="card-header">
        <div class="h3">Edit Article</div>
    </div>
        <div class="card-body">
            <form action="{{ route('backend.art.update', ['id' => $art->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-12">
                        <div class="form-group"><label for="nama">Header<span class="text-danger">*</span></label>
                        <input type="text" name="header" id="nama" class="form-control" value="{{ $art->header }}"></div>
                        @error('header')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="p">Date<span class="text-danger">*</span></label>
                            <input type="text" name="tgl" id="tgl" class="form-control" value="{{ old('tgl', \Carbon\Carbon::parse($art->tgl)->format('d M Y')) }}" readonly>
                            <input type="hidden" id="tgl_hidden" value="{{ \Carbon\Carbon::parse($art->tgl)->format('Y-m-d') }}">
                        </div>
                        @error('tgl')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12">
                        @if($art->image_art)
                            <br>
                            <img src="{{ asset('uploads/art/' . $art->image_art) }}" alt="Image" style="max-width: 200px;" class="current-image">
                        @endif
                        <div class="form-group"><label for="i">Image<span class="text-danger">*</span></label>
                        <input type="file" name="image_art" id="i" class="form-control"></div>
                        @error('image_art')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <div class="form-group"><label for="article">Article<span class="text-danger">*</span></label>
                        <textarea name="article" id="editor" cols="30" rows="10">{{ $art->article }}</textarea>
                        @error('article')
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


{{-- ckeditor --}}
<script>
	ClassicEditor
		.create( document.querySelector( '#editor' ) )
		.catch( error => {
			console.error( error );
		} );
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var hiddenDate = document.getElementById("tgl_hidden").value;
        document.getElementById("tgl").value = hiddenDate;
    });
</script>

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