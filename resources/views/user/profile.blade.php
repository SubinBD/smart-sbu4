@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">User Profile</h3>
                </div>
                <div class="card-body">
                    @if ($user)
                        <div class="text-center mb-4">
                            @if ($user->image)
                                <img src="{{ asset('storage/' . $user->image) }}" alt="Profile Image" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                            @else
                                <img src="{{ asset('vendor/adminlte/dist/img/default-150x150.png') }}" alt="Default Profile Image" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                            @endif
                        </div>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Name</b> <a class="float-right">{{ $user->name }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Role</b> <a class="float-right">{{ ucfirst($user->role) }}</a>
                            </li>
                            @if ($user->phone)
                            <li class="list-group-item">
                                <b>Phone</b> <a class="float-right">{{ $user->phone }}</a>
                            </li>
                            @endif
                            @if ($user->employee_id)
                            <li class="list-group-item">
                                <b>Employee ID</b> <a class="float-right">{{ $user->employee_id }}</a>
                            </li>
                            @endif
                            @if ($user->position)
                            <li class="list-group-item">
                                <b>Position</b> <a class="float-right">{{ $user->position }}</a>
                            </li>
                            @endif
                            @if ($user->division)
                            <li class="list-group-item">
                                <b>Division</b> <a class="float-right">{{ $user->division }}</a>
                            </li>
                            @endif
                            @if ($user->district)
                            <li class="list-group-item">
                                <b>District</b> <a class="float-right">{{ $user->district }}</a>
                            </li>
                            @endif
                            @if ($user->upozila)
                            <li class="list-group-item">
                                <b>Upozila</b> <a class="float-right">{{ $user->upozila }}</a>
                            </li>
                            @endif
                            @if ($user->region)
                            <li class="list-group-item">
                                <b>Region</b> <a class="float-right">{{ $user->region }}</a>
                            </li>
                            @endif
                            {{-- Managers --}}
                            @if ($user->nsm) <li class="list-group-item"><b>NSM</b> <a class="float-right">{{ $user->nsm }}</a></li> @endif
                            @if ($user->csm) <li class="list-group-item"><b>CSM</b> <a class="float-right">{{ $user->csm }}</a></li> @endif
                            @if ($user->rsm) <li class="list-group-item"><b>RSM</b> <a class="float-right">{{ $user->rsm }}</a></li> @endif
                            @if ($user->asm) <li class="list-group-item"><b>ASM</b> <a class="float-right">{{ $user->asm }}</a></li> @endif
                            @if ($user->tsm) <li class="list-group-item"><b>TSM</b> <a class="float-right">{{ $user->tsm }}</a></li> @endif
                            @if ($user->sr) <li class="list-group-item"><b>SR</b> <a class="float-right">{{ $user->sr }}</a></li> @endif
                            @if ($user->retailer) <li class="list-group-item"><b>Retailer</b> <a class="float-right">{{ $user->retailer }}</a></li> @endif
                            @if ($user->distributor) <li class="list-group-item"><b>Distributor</b> <a class="float-right">{{ $user->distributor }}</a></li> @endif
                        </ul>
                        {{-- Add an edit button --}}
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-outline-primary btn-block"><b>Edit Profile (Admin Only)</b></a>
                    @else
                        <p class="text-center">User not found or not logged in.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
