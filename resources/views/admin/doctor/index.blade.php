@extends('layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <h1 class="h3 mb-0 text-gray-800"><i class="fa-solid fa-user-doctor"></i> Doctor</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('doctor.create') }}" class="btn btn-primary float-right">
                Add New Doctor
            </a>

        </div>
        @include('sweetalert::alert')
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Practice Licensi</th>
                            <th>Phone No.</th>
                            <th>Polyclinic</th>
                            <th>Address</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Practice Licensi</th>
                            <th>Phone No.</th>
                            <th>Polyclinic</th>
                            <th>Address</th>
                            <th>Manage</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                            $no = 0;
                        @endphp
                        @foreach ($doctors as $doctor)
                            @php
                                $no++;
                            @endphp
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $doctor->name }}</td>
                                <td>{{ $doctor->practice_license }}</td>
                                <td>{{ $doctor->phone_number }}</td>
                                <td>{{ $doctor->polyclinic->name }}</td>
                                <td>{{ $doctor->address }}</td>
                                <td>
                                    <form action="{{ route('doctor.destroy', $doctor->id) }}" method="POST">
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <a href="{{ route('doctor.show', $doctor->id) }}"
                                                class="btn btn-outline-primary"><i class="fa fa-book"></i></a>
                                            <a href="{{ route('doctor.edit', $doctor->id) }}"
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
