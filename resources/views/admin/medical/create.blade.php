@extends('layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fa-solid fa-book-medical"></i> Medical Record</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="float-left">Add Medical Record</h4>
            <a href="{{ route('medical.index') }}" class="btn btn-primary float-right mx-2">
                <i class="fa fa-arrow-left text-white-50"></i> Back
            </a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('medical.store') }}" class="row g-3">
                @csrf
                <input type="hidden" name="status" value="1">
                <div class="col-md-6 mb-2">
                    <label for="patient_id" class="form-label">{{ __('Patient') }}</label>
                    <select id="patient_id" class="form-select form-control @error('patient_id') is-invalid @enderror"
                        name="patient_id">
                        <option></option>
                        @foreach ($patients as $patient)
                            <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                        @endforeach
                    </select>
                    @error('patient_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <label for="date" class="form-label">{{ __('Date') }}</label>
                    <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" id="date"
                        value="{{ old('date') }}" autofocus>
                    @error('date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                @can('isAdmin')
                    <div class="col-md-6 mb-2">
                        <label for="complaint" class="form-label">{{ __('Complaint') }}</label>
                        <input type="text" name="complaint" class="form-control @error('complaint') is-invalid @enderror"
                            id="complaint" value="{{ old('complaint') }}" autofocus>
                        @error('complaint')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="diagnose" class="form-label">{{ __('Diagnose') }}</label>
                        <input type="text" name="diagnose" class="form-control @error('diagnose') is-invalid @enderror"
                            id="diagnose" value="{{ old('diagnose') }}" autofocus>
                        @error('diagnose')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="action_id" class="form-label">{{ __('Action') }}</label>
                        <select id="action_id" class="form-select form-control @error('action_id') is-invalid @enderror"
                            name="action_id">
                            <option></option>
                            @foreach ($actions as $action)
                                <option value="{{ $action->id }}">{{ $action->action }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="recipe" class="form-label">{{ __('Recipe') }}</label>
                        <input type="text" class="form-control @error('recipe') is-invalid @enderror" id="recipe"
                            value="{{ old('recipe') }}" name="recipe">
                        @error('recipe')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="medicine_id" class="form-label">{{ __('Medicine') }}</label>
                        <select id="medicine_id" class="form-select form-control @error('medicine_id') is-invalid @enderror"
                            name="medicine_id">
                            <option></option>
                            @foreach ($medicines as $medicine)
                                <option value="{{ $medicine->id }} ">{{ $medicine->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('medicine_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="description" class="form-label">{{ __('Description') }}</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                            value="{{ old('description') }}" name="description">
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                @endcan
                <div class="col-md-6 mb-2">
                    <label for="user_id" class="form-label">{{ __('Doctor') }}</label>
                    <select id="user_id" class="form-select form-control @error('user_id') is-invalid @enderror"
                        name="user_id">
                        <option></option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
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
