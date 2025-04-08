@extends('layouts.app')
@section('title', 'User Profile')
@section('content')

@section('content')
    <div class="card card-body" id="user-profile">
        <h3 class="my-1">User Account Details</h3>
        <div class="row">
            <div class="col-md-6 col-12 order-1 order-md-2 text-center">
                <img src="{{ asset('images/default_pic.jpg') }}" height="120" alt="">
            </div>
            <div class="col-md-6 col-12 order-2 order-md-1">
                <table class="table">
                    <tr>
                        <th>Full Name</th>
                        <td>: System Admin</td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td>: Super Admin</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>: {{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>: 01952266533</td>
                    </tr>
                    <tr>
                        <th>Organization</th>
                        <td>: Shah Amanat Railway Super Market</td>
                    </tr>
                    <tr>
                        <th>Designation</th>
                        <td>: Accounts</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>: 445, Ice Factory Road, Chittagong</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="card" id="change-password">
        <div class="card-body">
            <h3 class="my-1">Change Password</h3>
            <form action="{{ route('user.change-password') }}" method="POST">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row mb-2 form-group">
                    <label class="col-form-label col-3 text-end">Current Password</label>
                    <div class="col-6">
                        <input type="password" class="form-control @error('old_password') is-invalid @enderror"
                            name="old_password" required placeholder="Current Password" />
                    </div>
                </div>
                <div class="row mb-2 form-group">
                    <label class="col-form-label col-3 text-end">New Password</label>
                    <div class="col-6">
                        <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                            name="new_password" required placeholder="New Password" />
                    </div>
                </div>
                <div class="row mb-2 form-group">
                    <label class="col-form-label col-3 text-end">Repeat Password</label>
                    <div class="col-6">
                        <input type="password" class="form-control @error('type') is-invalid @enderror"
                            name="repeat_password" required placeholder="Repeat Password" />
                    </div>
                </div>
                <div class="text-center form-group mt-3">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-danger">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
