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

<div class="sidebar-adjustable">
<div class="card">
    <div class="card-body">
        <h6 class="card-title">User Management</h6>
        <p class="text-muted mb-3">User<code>.table</code></p>
        <div class="table-responsive">
            <a href="{{ route('backend.user.add') }}" class="button-like">Add User</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
            @foreach ($data as $key => $item)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->role->name ?? 'No Role'}}</td>
                <td>{{ $item->email }}</td>
                <td>
                    <a href="{{ route('backend.user.edit', ['id' => $item->id]) }}" class="btn btn-inverse-warning">Edit</a>
                    <a href="{{ route('backend.user.delete', ['id' => $item->id]) }}" class="btn btn-inverse-danger delete-link" >Delete</a>
                </td>
                </tr>
            @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination justify-content-center mt-5" >
            {{ $data->links('pagination::bootstrap-4') }}
        </div>
    </div>
  </div>
</div>


  <script>
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('delete-link')) {
            event.preventDefault();
            confirmDelete(event.target.getAttribute('href'));
        }
    });

    function confirmDelete(deleteUrl) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = deleteUrl;
            }
        });
    }

</script>
@endsection