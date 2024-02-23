@extends('backend.layouts.admin_layout')
@section('main')
<style>
.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
    }
    .rate:not(:checked) > input {
    position:absolute;
    display: none;
    }
    .rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
    }
    .rated:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
    }
    .rate:not(:checked) > label:before {
    content: '★ ';
    }
    .rate > input:checked ~ label {
    color: #ffc700;
    }
    .rate:not(:checked) > label:hover,
    .rate:not(:checked) > label:hover ~ label {
    color: #deb217;
    }
    .rate > input:checked + label:hover,
    .rate > input:checked + label:hover ~ label,
    .rate > input:checked ~ label:hover,
    .rate > input:checked ~ label:hover ~ label,
    .rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
    }
    .star-rating-complete{
       color: #c59b08;
    }
    .rating-container .form-control:hover, .rating-container .form-control:focus{
    background: #fff;
    border: 1px solid #ced4da;
    }
    .rating-container textarea:focus, .rating-container input:focus {
    color: #000;
    }
    .rated {
    float: left;
    height: 46px;
    padding: 0 10px;
    }
    .rated:not(:checked) > input {
    position:absolute;
    display: none;
    }
    .rated:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ffc700;
    }
    .rated:not(:checked) > label:before {
    content: '★ ';
    }
    .rated > input:checked ~ label {
    color: #ffc700;
    }
    .rated:not(:checked) > label:hover,
    .rated:not(:checked) > label:hover ~ label {
    color: #deb217;
    }
    .rated > input:checked + label:hover,
    .rated > input:checked + label:hover ~ label,
    .rated > input:checked ~ label:hover,
    .rated > input:checked ~ label:hover ~ label,
    .rated > label:hover ~ input:checked ~ label {
    color: #c59b08;
    }
</style>
  <div class="card">
    <div class="card-header">  
   {{-- @if(!empty($testi->rating))
    <div class="container">
        <div class="row">
            <div class="col mt-4">
                    <p class="font-weight-bold ">Review</p>
                    <div class="form-group row">
                    <div class="col">
                        <div class="rated">
                        @for($i=1; $i<=$testi->rating; $i++)
                            {{-- <input type="radio" id="star{{$i}}" class="rate" name="rating" testi="5"/> --}}
                            {{-- <label class="star-rating-complete" title="text">{{$i}} stars</label>
                        @endfor
                        </div>
                    </div>
                    </div>
                    <div class="form-group row mt-4">
                    <div class="col">
                        <p>{{ $testi->testimoni }}</p>
                    </div>
                    </div>
            </div>
        </div>
        </div>
    @else --}}
    <div class="container">
        <div class="row">
            <div class="col mt-4">
                @if (Session::get('status'))
                    <div class="alert alert-info">{{ Session::get('status') }}</div>
                @endif
                <form class="py-2 px-4" action="{{ route('backend.testi.store') }}" style="box-shadow: 0 0 10px 0 #ddd;" method="POST" autocomplete="off" enctype="multipart/form-data">
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
                            <div class="form-group"><label for="i">Image</label>
                            <input type="file" name="image_testi" id="i" class="form-control"></div>
                            @error('image_testi')
                                <span class="invalid-feedback">{{ $message }}</span>
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
                    <div class="mt-3 text-right">
                    <button class="btn btn-sm py-2 px-3 btn-info" type="submit">Submit
                    </button>
                    </div>
                </form>
            </div>
        </div>
        </div>
        {{-- @endif --}}
    <div class=""></div>
</div>
@endsection