@extends('layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fa-solid fa-flask-vial"></i> Laboratory</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="float-left">Edit Laboratory</h4>
            <a href="{{ route('laboratory.index') }}" class="btn btn-primary float-right mx-2">
                <i class="fa fa-arrow-left text-white-50"></i> Back
            </a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('laboratory.update', $laboratory->id) }}" class="row g-3">
                @csrf
                @method('PUT')
                <div class="col-md-6 mb-2">
                    <label for="medical_id" class="form-label">{{ __('Medical') }}</label>
                    <select id="medical_id" class="form-select form-control @error('medical_id') is-invalid @enderror"
                        name="medical_id">
                        <option></option>
                        @foreach ($medical as $medical)
                            <option value="{{ $medical->id }}"
                                {{ $medical->id == $laboratory->medical_id ? 'selected' : '' }}>
                                {{ $medical->patient->name }}</option>
                        @endforeach
                    </select>
                    @error('medical_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12 mb-2">
                    <label for="lab_result" class="form-label">{{ __('Lab Result') }}</label>
                    <input type="text" name="lab_result" class="form-control @error('lab_result') is-invalid @enderror"
                        id="lab_result" value="{{ $laboratory->lab_result }}">
                    @error('lab_result')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12 mb-2">
                    <label for="description" class="form-label">{{ __('Description') }}</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                        rows="8">{{ $laboratory->description }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success float-right"><i class="fa fa-save text-white-50"></i>
                        Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
