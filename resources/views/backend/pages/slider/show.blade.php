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
                <table class="table">
                    <thead>
                        <tr>
                            <th>Subtitle</th>
                            <th>Link</th>
                        </tr>
                    </thead>
                    <tbody>
            <tr>
                <td>{{ $slider->subtitle }}</td>
                <td>{{ $slider->link }}</td>
            </tr>
                    </tbody>
                </table>
                <a href="{{ route('backend.slider.index') }}" class="button-like">Back</a>
        </div>
    </div>
  </div>
@endsection