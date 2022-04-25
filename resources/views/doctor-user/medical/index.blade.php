@extends('layouts.main-doctor')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <h1 class="h3 mb-0 text-gray-800"><i class="fa-solid fa-book-medical"></i> Medical Record</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    <div class="card shadow mb-4">
        @include('sweetalert::alert')
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Patient</th>
                            <th>Diagnose</th>
                            <th>Doctor</th>
                            <th>Action</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Patient</th>
                            <th>Diagnose</th>
                            <th>Doctor</th>
                            <th>Action</th>
                            <th>Manage</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                            $no = 0;
                        @endphp
                        @foreach ($medicals as $medical)
                            @php
                                $no++;
                            @endphp
                            @if (!empty($medical->action->action))
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $medical->patient->name }}</td>
                                    <td>{{ $medical->diagnose }}</td>
                                    <td>{{ $medical->user->name }}</td>
                                    <td>{{ $medical->action->action }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <a href="{{ route('doctor-user.medicalShow', $medical->id) }}"
                                                class="btn btn-outline-primary"><i class="fa fa-book"></i></a>
                                            <a href="{{ route('doctor-user.medicalCheck', $medical->id) }}"
                                                class="btn btn-outline-primary"><i class="fa fa-edit"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
