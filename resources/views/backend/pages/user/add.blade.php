@extends('backend.layouts.admin_layout')
@section('main')
    @include('backend.partials.message')
  <div class="card">
    <div class="card-header">
        <div class="h3">Add User</div>
    </div>
    <div class="card-body">
        <form action="{{ route('backend.user.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="form-group"><label for="nama">Name<span class="text-danger">*</span></label>
                    <input type="text" name="name" id="nama" class="form-control"></div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-group"><label for="nama">Role<span class="text-danger">*</span></label>
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
                    <div class="form-group"><label for="e">Email<span class="text-danger">*</span></label>
                    <input type="email" name="email" id="e" class="form-control"></div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-group"><label for="p">Password<span class="text-danger">*</span></label>
                    <input type="password" name="password" id="p" class="form-control"></div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="d-flex"><button class="btn btn-primary">Save</button></div>
                </div>
            </div>
        </form>
    </div>
    <div class=""></div>
</div>
@endsection