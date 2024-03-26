@extends('backend.layouts.admin_layout')
@section('main')
    @include('backend.partials.message')
<div class="sidebar-adjustable">
  <div class="card">
    <div class="card-header">
        <div class="h3">Edit User</div>
    </div>
    <div class="card-body">
        <form action="{{ route('backend.user.update', ['id' => $user->id]) }}" method="post">
            @csrf
            <input type="hidden" value="{{ $user->id }}">
            <div class="row">
                <div class="col-12">
                    <div class="form-group"><label for="nama">Name</label>
                    <input type="text" name="name" id="nama" class="form-control" value="{{ $user->name }}"></div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-group"><label for="nama">Role</label>
                    <select class="form-control" name="role_id" id="">
                        <option selected disabled>Select Role</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('role_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-group"><label for="e">Email</label>
                    <input type="email" name="email" id="e" class="form-control" value="{{ $user->email }}"></div>
                </div>
                @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                <div class="col-12">
                    <div class="d-flex" style="margin-top: 20px"><button class="btn btn-primary">Save</button></div>
                </div>
            </div>
        </form>
    </div>
   </div>
</div>
@endsection