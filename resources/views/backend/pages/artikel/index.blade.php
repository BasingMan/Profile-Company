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
        <h6 class="card-title">Article Management</h6>
        <p class="text-muted mb-3">article<code>.table</code></p>
        <div class="table-responsive">
            <a href="{{ route('backend.art.add') }}" class="button-like">Add Article</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Header</th>
                            <th>Image</th>
                            <th>Date</th>
                            <th>Preview Text</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
            @foreach ($art as $key => $item)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $item->header }}</td>
                <td>
                    <img src="{{ asset('uploads/art/' . $item->image_art) }}" alt="Img" style="width:70px; height:70px;">
                </td>
                <td>{{ $item->tgl }}</td>
                <td>
                    <a href="{{ route('backend.art.show', ['id' => $item->id]) }}" class="btn btn-inverse-warning">Show</a>
                    <a href="{{ route('backend.art.edit', ['id' => $item->id]) }}" class="btn btn-inverse-warning">Edit</a>
                    <a href="{{ route('backend.art.delete', ['id' => $item->id]) }}" class="btn btn-inverse-danger" id="delete">Delete</a>
                </td>
                </tr>
            @endforeach
                    </tbody>
                </table>
        </div>
    </div>
  </div>
@endsection