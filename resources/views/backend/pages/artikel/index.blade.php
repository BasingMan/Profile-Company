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

    .pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    list-style: none;
    padding: 0;
    }

    .pagination li {
        margin: 0 5px;
    }

    .pagination a {
        display: inline-block;
        padding: 8px 16px;
        text-decoration: none;
        color: #333;
        background-color: #f5f5f5;
        border: 1px solid #ddd;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .pagination a:hover {
        background-color: #ddd;
    }

    .pagination .active a {
        background-color: #007bff;
        color: #fff;
    }
</style>

<div class="sidebar-adjustable">
    <div class="card-container">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Article Management</h6>
            <p class="text-muted mb-3">article<code>.table</code></p>
            <div class="table-responsive">
                <a href="{{ route('backend.art.add') }}" class="button-like">Add Article</a>
                <table id="articleTable" class="table dataTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Header</th>
                            <th>Image</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($art->isEmpty())
                            <tr>
                                <td colspan="6" style="text-align: center">Article is empty</td>
                            </tr>
                        @else
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
                                    <a href="{{ route('backend.art.delete', ['id' => $item->id]) }}" class="btn btn-inverse-danger delete-link" id="delete">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                @if(!$art->isEmpty())
                    <div class="pagination justify-content-center mt-5">
                        {{ $art->links('pagination::bootstrap-4') }}
                    </div>
                @endif
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
