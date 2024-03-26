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
            <div class="h3">Add Article</div>
        </div>
            <div class="card-body">
                <form action="{{ route('backend.art.store') }}" method="post" enctype="multipart/form-data" class="sidebar-adjustable">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group"><label for="nama">Header<span class="text-danger">*</span></label>
                            <input type="text" name="header" id="nama" class="form-control"></div>
                            @error('header')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group"><label for="p">Date<span class="text-danger">*</span></label>
                            <input type="date" name="tgl" id="p" class="form-control"></div>
                            @error('tgl')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="i">Image<span class="text-danger">*</span></label>
                                <input type="file" name="image_art" id="i" class="form-control">
                            </div>
                            <div class="preview-image mt-2"></div>
                            @error('image_art')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group"><label for="article">Article<span class="text-danger">*</span></label>
                            <textarea name="article" id="editor" cols="30" rows="10"></textarea>
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