@extends('backend.layouts.admin_layout')
@section('main')
<style>
   
    .button-like {
        display: inline-block;
        padding: 10px 20px; 
        background-color: #007bff;
        color: #fff; 
        text-decoration: none; 
        border-radius: 5px;
        border: none; 
        cursor: pointer; 
    }

    .button-like:hover {
        background-color: #47fdf4; 
    }
</style>
<div class="card">
    <div class="card-body">
        <h6 class="card-title">Slider Management</h6>
        <p class="text-muted mb-3">Slider<code>.table</code></p>
        <div class="table-responsive">
            <a href="{{ route('backend.slider.add') }}" class="button-like">Add Slider</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Image</th>
                            <th>Link</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
            @foreach ($slider as $key => $item)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->subtitle }}</td>
                <td>
                    <img src="{{ asset($item->gambar) }}" alt="Img" style="width:70px; height:70px;">
                </td>
                <td>{{ $item->link }}</td>
                <td>
                    <a href="{{ route('backend.slider.edit', ['id' => $item->id]) }}" class="btn btn-inverse-warning">Edit</a>
                    <a href="{{ route('backend.slider.delete', ['id' => $item->id]) }}" class="btn btn-inverse-danger" id="delete">Delete</a>
                </td>
                </tr>
            @endforeach
                    </tbody>
                </table>
        </div>
    </div>
  </div>
@endsection