@extends('layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fa-solid fa-hospital-user"></i> Patient</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="float-left">Add Patient</h4>
            <a href="{{ route('patient.index') }}" class="btn btn-primary float-right mx-2">
                <i class="fa fa-arrow-left text-white-50"></i> Back
            </a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('patient.update', $patient->id) }}" class="row g-3">
                @csrf
                @method('PUT')
                <div class="col-md-6 mb-2">
                    <label for="id_card" class="form-label">{{ __('Id Card') }}</label>
                    <input type="text" value="{{ $patient->id_card }}" name="id_card" class="form-control" id="id_card"
                        autofocus>
                </div>
                <div class="col-md-6">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                    <input type="text" value="{{ $patient->name }}" class="form-control" id="name" name="name">
                </div>
                <div class="col-md-6 mb-2">
                    <label for="inputState" class="form-label">{{ __('Religion') }}</label>
                    <select id="inputState" class="form-select form-control" name="religion">
                        <option value="{{ $patient->religion }}">
                            {{ $patient->religion }}</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Protestan">Protestan</option>
                        <option value="Budha">Budha</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="name" class="form-label">{{ __('Birtday') }}</label>
                    <input type="date" value="{{ $patient->datebirth }}" class="form-control" id="datebirth"
                        name="datebirth">
                </div>
                <div class="col-md-4 mb-2">
                    <label for="address" class="form-label">{{ __('Phone Number') }}</label>
                    <input type="number" value="{{ $patient->phone_number }}" class="form-control" id="phone_number"
                        name="phone_number">
                </div>
                <div class="col-md-4">
                    <label for="inputCity" class="form-label">{{ __('Family Name') }}</label>
                    <input type="text" value="{{ $patient->family_name }}" class="form-control" id="family_name"
                        name="family_name">
                </div>
                <div class="col-md-4">
                    <label for="inputCity" class="form-label">{{ __('Family Relationship') }}</label>
                    <input type="text" value="{{ $patient->family_relationship }}" class="form-control"
                        id="family_relationship" name="family_relationship">
                </div>
                <div class="col-12 mb-2">
                    <label for="address" class="form-label">{{ __('Address') }}</label>
                    <input type="text" value="{{ $patient->address }}" class="form-control" id="address"
                        name="address">
                </div>
                <div class="col-md-6">
                    <fieldset class="row mb-3">
                        <label class="col-form-label col-sm-2 pt-0">Gender</label>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gender" value="male"
                                    {{ $patient->gender == 'Male' ? ' checked' : '' }}>
                                <label class="form-check-label" for="gridRadios1">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gender" value="female"
                                    {{ $patient->gender == 'Female' ? ' checked' : '' }}>
                                <label class="form-check-label" for="gridRadios2">
                                    Female
                                </label>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success float-right"><i class="fa fa-save text-white-50"></i>
                        Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
