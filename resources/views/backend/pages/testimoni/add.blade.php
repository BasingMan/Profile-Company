@extends('backend.layouts.admin_layout')
@section('main')
    @include('backend.partials.message')

    <div class="sidebar-adjustable">
        <div class="card">
          <div class="card-header">
              <div class="h3">Add Testimoni</div>
          </div>
          <div class="card-body">
                <form class="py-2 px-4" action="{{ route('backend.testi.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                    {{ csrf_field() }}
            
                        <div class="col-12">
                            <div class="form-group"><label for="nama">Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" id="nama" class="form-control"></div>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group"><label for="c">Company<span class="text-danger">*</span></label>
                            <input type="text" name="company" id="c" class="form-control"></div>
                            @error('company')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="i">Image</label>
                                <input type="file" name="image_testi" id="i" class="form-control">
                            </div>
                            <div class="preview-image mt-2"></div>
                            @error('image_testi')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <p class="font-weight-bold ">Rating<span class="text-danger">*</span></p>
                        <div class="form-group row">
                        <div class="col">
                        <div class="rate">
                            <input type="radio" id="star5" class="rate" name="rating" value="5"/>
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" checked id="star4" class="rate" name="rating" value="4"/>
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" class="rate" name="rating" value="3"/>
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" class="rate" name="rating" value="2">
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" class="rate" name="rating" value="1"/>
                            <label for="star1" title="text">1 star</label>
                        </div>
                    </div>
                    </div>
                    <div class="form-group row mt-4">
                    <div class="col">
                        <label for="testimoni">Testimoni<span class="text-danger">*</span></label>
                        <textarea class="form-control" name="testimoni" rows="6 " placeholder="Write Your Testimoni" maxlength="200"></textarea>
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