@extends('layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <h1 class="h3 mb-0 text-gray-800"><i class="fa-solid fa-flask-vial"></i> Laboratory</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="float-left">Add Laboratory</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('laboratory.store') }}" class="row g-3">
                @csrf
                <div class="col-md-6 mb-2">
                    <label for="medical_id" class="form-label">{{ __('Medical') }}</label>
                    <select id="medical_id" class="form-select form-control @error('medical_id') is-invalid @enderror"
                        name="medical_id">
                        <option></option>
                        @foreach ($medicals as $medical)
                            <option value="{{ $medical->id }}">{{ $medical->patient->name }}</option>
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
                        id="lab_result">
                    @error('lab_result')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12 mb-2">
                    <label for="description" class="form-label">{{ __('Description') }}</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                        rows="8"></textarea>
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
    <div class="card shadow mb-4">
        @include('sweetalert::alert')
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Medical</th>
                            <th>Lab Result</th>
                            <th>Description</th>
                            <th>Setting</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Medical</th>
                            <th>Lab Result</th>
                            <th>Description</th>
                            <th>Setting</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                            $no = 0;
                        @endphp
                        @foreach ($laboratories as $laboratory)
                            @php
                                $no++;
                            @endphp
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $laboratory->medical->patient->name }}</td>
                                <td>{{ $laboratory->lab_result }}</td>
                                <td>{{ $laboratory->description }}</td>
                                <td>
                                    <form action="{{ route('laboratory.destroy', $laboratory->id) }}" method="POST">
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <a href="{{ route('laboratory.edit', $laboratory->id) }}"
                                                class="btn btn-outline-primary"><i class="fa fa-edit"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-primary show_confirm"
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
