@extends('layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fa-solid fa-house-medical"></i> Polyclinic</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="float-left">Edit Polyclinic</h4>
            <a href="{{ route('polyclinic.index') }}" class="btn btn-primary float-right mx-2">
                <i class="fa fa-arrow-left text-white-50"></i> Back
            </a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('polyclinic.update', $polyclinic->id) }}" class="row g-3">
                @csrf
                @method('PUT')
                <div class="col-md-6 mb-2">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                    <input type="text" value="{{ $polyclinic->name }}" class="form-control" id="name" name="name">
                </div>
                <div class="col-md-2 mb-2">
                    <label for="floor_number" class="form-label">{{ __('Floor No.') }}</label>
                    <input type="number" class="form-control" value="{{ $polyclinic->floor_number }}" id="floor_number"
                        min="1" name="floor_number">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success float-right"><i class="fa fa-save text-white-50"></i>
                        Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
