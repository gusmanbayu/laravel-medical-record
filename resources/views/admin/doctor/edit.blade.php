@extends('layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fa-solid fa-user-doctor"></i> Doctor</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="float-left">Edit Doctor</h4>
            <a href="{{ route('doctor.index') }}" class="btn btn-primary float-right mx-2">
                <i class="fa fa-arrow-left text-white-50"></i> Back
            </a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('doctor.update', $doctor->id) }}" class="row g-3">
                @csrf
                @method('PUT')
                <div class="col-md-6 mb-2">
                    <label for="polyclinic_id" class="form-label">{{ __('Polyclinic') }}</label>
                    <select id="polyclinic_id" class="form-select form-control" name="polyclinic_id">
                        <option>Polyclinic Choose...</option>
                        @foreach ($polyclinic as $polyclinics)
                            <option value="{{ $polyclinics->id }}"
                                {{ $polyclinics->id == $doctor->polyclinic_id ? 'selected' : '' }}>
                                {{ $polyclinics->name }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="col-md-6 mb-2">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                    <input type="text" value="{{ $doctor->name }}" name="name" class="form-control" id="name" autofocus>
                </div>
                <div class="col-md-6">
                    <label for="practice_license" class="form-label">{{ __('Practice License') }}</label>
                    <input type="text" value="{{ $doctor->practice_license }}" class="form-control"
                        id="practice_license" name="practice_license">
                </div>
                <div class="col-md-6 mb-2">
                    <label for="place_birth" class="form-label">{{ __('Birth Place') }}</label>
                    <input type="text" value="{{ $doctor->place_birth }}" class="form-control" id="place_birth"
                        name="place_birth">
                </div>
                <div class="col-md-4">
                    <label for="phone_number" class="form-label">{{ __('Phone No.') }}</label>
                    <input type="number" value="{{ $doctor->phone_number }}" class="form-control" id="phone_number"
                        name="phone_number">
                </div>
                <div class="col-md-8 mb-2">
                    <label for="address" class="form-label">{{ __('Address') }}</label>
                    <input type="text" value="{{ $doctor->address }}" class="form-control" id="address" name="address">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success float-right"><i class="fa fa-save text-white-50"></i>
                        Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
