@extends('layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <h1 class="h3 mb-0 text-gray-800"><i class="fa-solid fa-house-chimney-medical"></i> Visit</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="float-left">Add Visit</h4>
            <a href="{{ route('visit.index') }}" class="btn btn-primary float-right mx-2">
                <i class="fa fa-arrow-left text-white-50"></i> Back
            </a>
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('visit.store') }}" class="row g-3 needs-validation">
                @csrf
                <div class="col-md-6">
                    <label for="patient_id" class="form-label">{{ __('Patient') }}</label>
                    <select id="patient_id" class="form-select form-control @error('patient_id') is-invalid @enderror"
                        name="patient_id" required>
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
                    <label for="doctor_id" class="form-label">{{ __('Doctor') }}</label>
                    <select id="doctor_id" class="form-select form-control @error('doctor_id') is-invalid @enderror"
                        name="doctor_id" required>
                        <option></option>
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                        @endforeach
                    </select>
                    @error('doctor_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <label for="date" class="form-label">{{ __('Visit Date') }}</label>
                    <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" id="date"
                        required>
                    @error('date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <label for="date" class="form-label">{{ __('Visit Hours') }}</label>
                    <input type="time" name="hours" class="form-control @error('hours') is-invalid @enderror" id="hours"
                        required>
                    @error('hours')
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
    <div class="card shadow mb-4">
        @include('sweetalert::alert')
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Patient</th>
                            <th>Doctor</th>
                            <th>Visit Date</th>
                            <th>Visit Hours</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Patient</th>
                            <th>Doctor</th>
                            <th>Visit Date</th>
                            <th>Visit Hours</th>
                            <th>Manage</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                            $no = 0;
                        @endphp
                        @foreach ($visits as $visit)
                            @php
                                $no++;
                            @endphp
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $visit->patient->name }}</td>
                                <td>{{ $visit->doctor->name }}</td>
                                <td>{{ $visit->date }}</td>
                                <td>{{ $visit->hours }}</td>
                                <td>
                                    <form action="{{ route('visit.destroy', $visit->id) }}" method="POST">
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <a href="{{ route('visit.edit', $visit->id) }}"
                                                class="btn btn-outline-primary"><i class="fa fa-edit"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-outline-primary show_confirm"
                                                data-toggle="tooltip">
                                                <i class="fa fa-trash"></i></button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
