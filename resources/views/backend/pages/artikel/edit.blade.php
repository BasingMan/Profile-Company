@extends('backend.layouts.admin_layout')
@section('main')

{{-- CKEDITOR --}}
<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js">
</script>

<style>
    .ck-editor__editable{
        min-height: 100px;
    }
</style>

  <div class="card">
    <div class="card-header">
        <div class="h3">Add Article</div>
    </div>
    <div class="card-body">
        <form action="{{ route('backend.art.update', ['id' => $art->id]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-12">
                    <div class="form-group"><label for="nama">Header</label>
                    <input type="text" name="header" id="nama" class="form-control" value="{{ $art->header }}"></div>
                    @error('header')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-group"><label for="p">Date</label>
                    <input type="date" name="tgl" id="p" class="form-control" value="{{ $art->tgl }}"></div>
                    @error('tgl')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-group"><label for="i">Image</label>
                    <input type="file" name="image_art" id="i" class="form-control"></div>
                    @error('image_art')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-group"><label for="article">Article</label>
                    <textarea name="article" id="editor" cols="30" rows="10">{{ $art->article }}</textarea>
                    @error('article')
                        <span class="text-danger">{{ $message }}</span>
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

{{-- ckeditor --}}
<script>
	ClassicEditor
		.create( document.querySelector( '#editor' ) )
		.catch( error => {
			console.error( error );
		} );
</script>

@endsection