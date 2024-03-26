@extends('backend.layouts.admin_layout')
@section('main')

<style>
    .large-card {
        height: 400px;
        width: 800px; 
        margin: 0 auto; 
        margin-top: 50px;

    }

    .large-card .card-body h1 {
        margin-top: 15%
        
    }
</style>

<div class="sidebar-adjustable">
    <div class="card">
        <div class="large-card">
            <div class="card-body">
                <h1 style="text-align: center">Welcome To Profile Company CMS</h1>
            </div>
        </div>
    </div>
</div> 
@endsection