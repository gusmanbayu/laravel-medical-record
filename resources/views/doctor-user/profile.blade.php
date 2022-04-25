@extends('layouts.main-doctor')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <h1 class="h3 mb-0 text-gray-800"><i class="fa-solid fa-user"></i> Doctor Profile</h1>
    </div>

    <div class="col-md-8 mb-4 mx-auto">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-header">

                <a href="{{ route('operator.dashboard') }}" class="btn btn-primary float-right mx-2">
                    <i class="fa fa-arrow-left text-white-50"></i> Back
                </a>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">Name</dt>
                    <dd class="col-sm-9">{{ Auth::user()->name }}</dd>
                    <dt class="col-sm-3">E-Mail</dt>
                    <dd class="col-sm-9">{{ Auth::user()->email }}</dd>
                    <dt class="col-sm-3">Role</dt>
                    <dd class="col-sm-9"><span class="badge bg-primary text-light">{{ Auth::user()->role }}</span>
                    </dd>
                </dl>

            </div>
            <div class="card-footer">
                <p class="float-left"><small><em>Created At : {{ Auth::user()->created_at }}</em></small></p>
                <a href="{{ route('doctor-user.doctorPassword') }}" class="btn btn-success float-right">Change
                    Password</a>
            </div>
        </div>
    </div>
@endsection
