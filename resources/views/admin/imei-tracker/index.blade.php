@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card mt-2">
                <div class="card-header">
                    <h3 class="card-title">IMEI Tracker List</h3>
                    <div class="card-tools d-flex align-items-center">
                        {{-- Search Form --}}
                        <form action="{{ route('admin.imei-tracker.index') }}" method="GET" class="me-3">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="Search" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <a href="{{ route('admin.imei-tracker.create') }}" class="btn btn-primary btn-sm me-2">Add New Entry</a>
                        <a href="{{ route('admin.imei-tracker.export') }}" class="btn btn-outline-success btn-sm me-1">Export IMEI Trackers</a>
                        <a href="{{ route('admin.imei-tracker.template') }}" class="btn btn-outline-secondary btn-sm me-4">Download Template</a>
                        {{-- Import Form --}}
                        <form action="{{ route('admin.imei-tracker.import') }}" method="POST" enctype="multipart/form-data" class="me-4 bg-light shadow-sm p-1">
                            @csrf
                            <div class="input-group input-group-sm" style="width: 300px;">
                                <input type="file" name="file" class="form-control" required>
                                <button type="submit" class="btn btn-outline-info">Import IMEI Trackers</button>
                            </div>
                        </form>
                        {{-- Remove All Entries Button --}}
                        <form action="{{ route('admin.imei-tracker.truncate') }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you absolutely sure you want to remove ALL IMEI Tracker entries? This action cannot be undone.')">Remove All Entries</button>
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
                                            $link = route('admin.imei-tracker.index', $params);

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
                                    <th>{!! sortableHeader('imei_tac_1', 'IMEI TAC 1', $sort_by, $sort_order, $search) !!}</th>
                                    <th>{!! sortableHeader('imei_1', 'IMEI 1', $sort_by, $sort_order, $search) !!}</th>
                                    <th>{!! sortableHeader('marketing_name', 'Marketing Name', $sort_by, $sort_order, $search) !!}</th>
                                    <th>{!! sortableHeader('send_to_btrc_at', 'Send to BTRC At', $sort_by, $sort_order, $search) !!}</th>
                                    <th>{!! sortableHeader('btrc_update_status', 'BTRC Update Status', $sort_by, $sort_order, $search) !!}</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($imeiTrackers as $tracker)
                                <tr>
                                    <td>{{ $loop->iteration + ($imeiTrackers->currentPage() - 1) * $imeiTrackers->perPage() }}</td>
                                    <td>{{ $tracker->imei_tac_1 }}</td>
                                    <td>{{ $tracker->imei_1 }}</td>
                                    <td>{{ $tracker->marketing_name }}</td>
                                    <td>{{ $tracker->send_to_btrc_at ? $tracker->send_to_btrc_at->format('Y-m-d H:i:s') : 'N/A' }}</td>
                                    <td>{{ $tracker->btrc_update_status }}</td>
                                    <td>
                                        <a href="{{ route('admin.imei-tracker.edit', $tracker->id) }}" class="btn btn-info btn-sm">Edit</a>
                                        <form action="{{ route('admin.imei-tracker.destroy', $tracker->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No IMEI Tracker entries found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {{ $imeiTrackers->links('vendor.pagination.bootstrap-5') }}
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