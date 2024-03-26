@extends('backend.layouts.admin_layout')
@section('main')
    @include('backend.partials.message')
    
    <div class="sidebar-adjustable">
        <div class="card">
          <div class="card-header">
              <div class="h3">Edit Testimoni</div>
          </div>
          <div class="card-body">
                    <form class="py-2 px-4" action="{{ route('backend.testi.update', ['id'=>$tes->id]) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        {{ csrf_field() }}
                
                            <div class="col-12">
                                <div class="form-group"><label for="nama">Name</label>
                                <input type="text" name="name" id="nama" class="form-control" value="{{ $tes->name }}"></div>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                
                            </div>
                            <div class="col-12">
                                <div class="form-group"><label for="c">Company</label>
                                <input type="text" name="company" id="c" class="form-control" value="{{ $tes->company }}"></div>
                                @error('company')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                @if($tes->image_testi)
                                    <br>
                                    <img src="{{ asset('uploads/testi/' . $tes->image_testi) }}" alt="Image" style="max-width: 200px;" id="current-image">
                                @endif
                                <div class="form-group"><label for="i">Image</label>
                                <input type="file" name="image_testi" id="i" class="form-control"></div>
                                @error('image_testi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <p class="font-weight-bold ">Rating</p>
                            <div class="form-group row">
                            <div class="col">
                            <div class="rate">
                                <input type="radio" id="star5" class="rate" name="rating" value="5" {{ isset($tes->rating) && $tes->rating == 5 ? 'checked' : '' }}/>
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" class="rate" name="rating" value="4" {{ isset($tes->rating) && $tes->rating == 4 ? 'checked' : '' }}/>
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" class="rate" name="rating" value="3" {{ isset($tes->rating) && $tes->rating == 3 ? 'checked' : '' }}/>
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" class="rate" name="rating" value="2" {{ isset($tes->rating) && $tes->rating == 2 ? 'checked' : '' }}>
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" class="rate" name="rating" value="1" {{ isset($tes->rating) && $tes->rating == 1 ? 'checked' : '' }}/>
                                <label for="star1" title="text">1 star</label>
                            </div>
                        </div>
                        </div>
                        <div class="form-group row mt-4">
                        <div class="col">
                            <textarea class="form-control" name="testimoni" rows="6 " placeholder="Write Your Testimoni" maxlength="200">{{ $tes->testimoni }}</textarea>
                            @error('testimoni')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex" style="margin-top: 20px"><button class="btn btn-primary">Save</button></div>
                        </div>
                    </form>
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
                var preview = $('#current-image');
                preview.html('');
        
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
        
                    reader.onload = function(e) {
                        var img = $('<img>').attr('src', e.target.result).addClass('img-thumbnail').css({'max-width': '200px', 'height': 'auto'});
                        preview.attr('src', e.target.result);
                    }
        
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
        
@endsection
