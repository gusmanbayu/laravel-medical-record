@extends('layouts.main-doctor')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <h1 class="h3 mb-0 text-gray-800"><i class="fa-solid fa-hospital-dashboard"></i>Medical Check</h1>

    </div>
    <div class="card col-lg-8 shadow mb-4 mx-auto">
        <div class="card-header">
            <h4 class="mb-0 text-gray-800 float-left">Medical Check Up</h4>
            <a href="{{ route('doctor-user.dashboard') }}" class="btn btn-primary float-right">Back</a>
        </div>
        @include('sweetalert::alert')
        <div class="card-body">
            <form method="POST" action="{{ route('doctor-user.medicalSave', $medical->id) }}" class="row g-3">
                @csrf
                @method('PUT')
                <div class="col-md-12 mb-2">
                    <label for="patient_id" class="form-label">{{ __('Patient') }}</label>
                    <input type="text" class="form-control" value="{{ $medical->patient->name }}" readonly>
                    <input type="hidden" value="{{ $medical->patient_id }}" name="patient_id"
                        class="form-control @error('date') is-invalid @enderror" id="date" autofocus>
                    @error('patient_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12 mb-2">
                    <label for="date" class="form-label">{{ __('Date') }}</label>
                    <input type="text" name="date" class="form-control @error('date') is-invalid @enderror" id="date"
                        value="{{ Date('Y-m-d') }}" autofocus readonly>
                    @error('date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12 mb-2">
                    <label for="complaint" class="form-label">{{ __('Complaint') }}</label>
                    <input type="text" name="complaint" class="form-control @error('complaint') is-invalid @enderror"
                        id="complaint" value="{{ $medical->complaint }}" autofocus>
                    @error('complaint')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12 mb-2">
                    <label for="diagnose" class="form-label">{{ __('Diagnose') }}</label>
                    <input type="text" name="diagnose" class="form-control @error('diagnose') is-invalid @enderror"
                        id="diagnose" value="{{ $medical->diagnose }}" autofocus>
                    @error('diagnose')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="col-md-12 mb-2">
                    <label for="action_id" class="form-label">{{ __('Action') }}</label>
                    <select id="action_id" class="form-select form-control @error('action_id') is-invalid @enderror"
                        name="action_id">
                        <option></option>
                        @foreach ($action as $actions)
                            <option value="{{ $actions->id }}"
                                {{ $actions->id == $medical->action_id ? 'selected' : '' }}>{{ $actions->action }}
                            </option>
                        @endforeach
                    </select>
                    @error('action_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12 mb-2">
                    <label for="recipe" class="form-label">{{ __('Recipe') }}</label>
                    <input type="text" class="form-control @error('recipe') is-invalid @enderror" id="recipe"
                        value="{{ $medical->recipe }}" name="recipe">
                    @error('recipe')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-12 mb-2">
                    <label for="medicine_id" class="form-label">{{ __('Medicine') }}</label>
                    <select id="medicine_id" class="form-select form-control @error('medicine_id') is-invalid @enderror"
                        name="medicine_id">
                        <option></option>
                        @foreach ($medicine as $medicines)
                            <option value="{{ $medicines->id }} "
                                {{ $medicines->id == $medical->medicine_id ? 'selected' : '' }}>{{ $medicines->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('medicine_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12 mb-2">
                    <label for="status" class="form-label">{{ __('Status') }}</label>
                    <select id="status" class="form-select form-control @error('status') is-invalid @enderror"
                        name="status">
                        <option value="0"> Check Done</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12 mb-2">
                    <label for="description" class="form-label">{{ __('Description') }}</label>
                    <textarea name="description" class="form-control" id="" cols="10" rows="5">{{ $medical->description }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class=" col-12">
                    <button type="submit" class="btn btn-success float-right"><i class="fa fa-save text-white-50"></i>
                        Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
