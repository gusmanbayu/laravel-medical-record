@extends('layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fa-solid fa-house-chimney-medical"></i> Visit</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="float-left">Edit Visit</h4>
            <a href="{{ route('visit.index') }}" class="btn btn-primary float-right mx-2">
                <i class="fa fa-arrow-left text-white-50"></i> Back
            </a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('visit.update', $visit->id) }}" class="row g-3">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <label for="patient_id" class="form-label">{{ __('Patient') }}</label>
                    <select id="patient_id" class="form-select form-control" name="patient_id">
                        <option>Patient Choose...</option>
                        @foreach ($patients as $patient)
                            <option value="{{ $patient->id }}"
                                {{ $patient->id == $visit->patient_id ? 'selected' : '' }}>
                                {{ $patient->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-2">
                    <label for="doctor_id" class="form-label">{{ __('Doctor') }}</label>
                    <select id="doctor_id" class="form-select form-control" name="doctor_id">
                        <option>Doctor Choose...</option>
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}" {{ $doctor->id == $visit->doctor_id ? 'selected' : '' }}>
                                {{ $doctor->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-2">
                    <label for="date" class="form-label">{{ __('Visit Date') }}</label>
                    <input type="date" value="{{ $visit->date }}" name="date" class="form-control" id="date">
                </div>
                <div class="col-md-6 mb-2">
                    <label for="date" class="form-label">{{ __('Visit Hours') }}</label>
                    <input type="time" value="{{ $visit->hours }}" name="hours" class="form-control" id="hours">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success float-right"><i class="fa fa-save text-white-50"></i>
                        Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
