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
        <h6 class="card-title">Portofolio Management</h6>
        <p class="text-muted mb-3">Portofolio<code>.table</code></p>
        <div class="table-responsive">
            <a href="{{ route('backend.porto.add') }}" class="button-like">Add Portofolio</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Judul</th>
                            <th>Link</th>
                            <th>Image</th>
                            <th>Deskripsi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
            @foreach ($porto as $key => $item)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->link }}</td>
                <td>
                    <img src="{{ asset('uploads/porto/' . $item->image) }}" alt="Img" style="width:70px; height:70px;">
                </td>
                <td>{{ $item->description }}</td>
                <td>
                    <a href="{{ route('backend.porto.edit', ['id' => $item->id]) }}" class="btn btn-inverse-warning">Edit</a>
                    <a href="{{ route('backend.porto.delete', ['id' => $item->id]) }}" class="btn btn-inverse-danger" id="delete">Delete</a>
                </td>
                </tr>
            @endforeach
                    </tbody>
                </table>
        </div>
    </div>
  </div>
@endsection