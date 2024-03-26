@extends('backend.layouts.admin_layout')

@section('main')
    @include('backend.partials.message')

<div class="sidebar-adjustable">
    <div class="card">
        <div class="card-header">
            <div class="h3">Logo</div>
            <hr>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="current-logo">
                        {{-- @dd($logo) --}}
                        @if($logo)
                            <h3>Current Logo</h3>
                                <img src="{{ asset('uploads/logo/' . $logo->logo_image) }}" alt="Current Logo" class="img-thumbnail" style="width: 300px; height: 150px;">                            
                        @else
                            <p>No logo uploaded.</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('backend.logo.update') }}" method="post" id="logo" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="i">New Logo</label>
                            <input type="file" name="logo_image" id="i" class="form-control">
                        </div>
                        <div class="preview-image mt-2"></div>
                        @error('logo_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="form-group mt-2">
                            <button class="btn btn-primary">Save</button>
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
