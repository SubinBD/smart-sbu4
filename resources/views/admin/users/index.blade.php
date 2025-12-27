@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card mt-2">
                <div class="card-header">
                    <h3 class="card-title">User List</h3>
                    
                    <div class="card-tools d-flex align-items-center">
                        
                        {{-- Search Form --}}
                        <form action="{{ route('admin.users.index') }}" method="GET" class="me-3">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="Search" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                        {{-- Add New User Button --}}
                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm me-4">Add New User</a>

                        {{-- Export Button --}}
                        <a href="{{ route('admin.users.export') }}" class="btn btn-outline-success btn-sm me-1 ms-4">Export Users</a>

                        {{-- Import Form --}}
                        <form action="{{ route('admin.users.import') }}" method="POST" enctype="multipart/form-data" class="me-4 bg-light shadow-sm p-1">
                            @csrf
                            <div class="input-group input-group-sm" style="width: 300px;">
                                <input type="file" name="file" class="form-control" required>
                                <button type="submit" class="btn btn-outline-info">Import Users</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    {{-- Helper function to generate sortable links --}}
                                    @php
                                        function sortableHeader($column, $title, $currentSortBy, $currentSortOrder, $search) {
                                            $newSortOrder = ($currentSortBy == $column && $currentSortOrder == 'asc') ? 'desc' : 'asc';
                                            $params = array_filter(['sort_by' => $column, 'sort_order' => $newSortOrder, 'search' => $search]);
                                            $link = route('admin.users.index', $params);

                                            $icon = '';
                                            if ($currentSortBy == $column) {
                                                $icon = $currentSortOrder == 'asc' ? '<i class="fas fa-arrow-up"></i>' : '<i class="fas fa-arrow-down"></i>';
                                            } else {
                                                $icon = '<i class="fas fa-sort" style="opacity: 0.3;"></i>';
                                            }

                                            return $title . ' <a href="'. $link .'">'. $icon .'</a>';
                                        }
                                    @endphp

                                <th>#</th>
                                <th>{!! sortableHeader('name', 'Name', $sort_by, $sort_order, $search) !!}</th>
                                <th>{!! sortableHeader('email', 'Email', $sort_by, $sort_order, $search) !!}</th>
                                <th>{!! sortableHeader('phone', 'Phone', $sort_by, $sort_order, $search) !!}</th>
                                <th>{!! sortableHeader('employee_id', 'Employee ID', $sort_by, $sort_order, $search) !!}</th>
                                <th>{!! sortableHeader('position', 'Position', $sort_by, $sort_order, $search) !!}</th>
                                <th>{!! sortableHeader('role', 'Role', $sort_by, $sort_order, $search) !!}</th>

                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->employee_id }}</td>
                                <td>{{ $user->position }}</td>
                                <td>{{ $user->role }}</td>

                                <td>
                                    <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('vendor/adminlte/dist/img/default-150x150.png') }}" alt="User Image" width="50" class="img-circle elevation-2">
                                </td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-outline-primary btn-sm me-2 ms-3">Edit</a>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {{ $users->links('vendor.pagination.bootstrap-5') }} <!-- Using Laravel's default BS5 pagination view -->
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
@endsection