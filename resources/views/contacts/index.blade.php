@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card mt-2">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">All Contacts</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        @forelse ($users as $user)
                            <div class="col-md-3">
                                <div class="card m-6 mb-4 shadow">
                                    <div class="card-body bg-light text-info text-center">
                                        <img class="img-circle elevation-2 mb-2 rounded-circle" src="{{ $user->image ? asset('storage/' . $user->image) : asset('vendor/adminlte/dist/img/default-150x150.png') }}" alt="User Avatar" style="width: 100px; height: 100px; object-fit: cover;">
                                        <h4 class="mb-1">{{ $user->name }}</h4>
                                        <p class="text-info">{{ $user->position ?? 'N/A' }}</p>
                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item bg-info text-white">
                                                <b>Email</b> <span class="float-right">{{ $user->email }}</span>
                                            </li>
                                            <li class="list-group-item bg-info text-white">
                                                <b>Phone</b> <span class="float-right">{{ $user->phone ?? 'N/A' }}</span>
                                            </li>
                                            <li class="list-group-item bg-info text-white">
                                                <b>Role</b> <span class="float-right">{{ ucfirst($user->role) }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <p class="text-center">No contacts found.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
