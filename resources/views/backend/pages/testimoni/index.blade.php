@extends('backend.layouts.admin_layout')
@section('main')
    @include('backend.partials.message')
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
        <h6 class="card-title">Testimoni Management</h6>
        <p class="text-muted mb-3">Testimoni<code>.table</code></p>
        <div class="table-responsive">
            <a href="{{ route('backend.testi.add') }}" class="button-like">Add Testimoni</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Company</th>
                            <th>Rating</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
            @foreach ($testi as $key => $item)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->company }}</td>
                <td>{{ $item->rating }}</td>
                <td>
                    <a href="{{ route('backend.testi.show', ['id' => $item->id]) }}" class="btn btn-inverse-warning">Show</a>
                    <a href="{{ route('backend.testi.edit', ['id' => $item->id]) }}" class="btn btn-inverse-warning">Edit</a>
                    <a href="{{ route('backend.testi.delete', ['id' => $item->id]) }}" class="btn btn-inverse-danger" id="delete">Delete</a>
                </td>
                </tr>
            @endforeach
                    </tbody>
                </table>
        </div>
    </div>
  </div>
@endsection