@extends('layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <h1 class="h3 mb-0 text-gray-800"><i class="fa-solid fa-hospital-user"></i> Patient</h1>
        <form action="{{ route('search.patient') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="search" placeholder="Search.." value="{{ old('search') }}">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> </button>
            </div>


        </form>
    </div>

    <div class="row">

        <div class="col-md-12">
            <div class="mb-3">
                <a href="{{ route('patient.create') }}" class="btn btn-primary">
                    Add New Patient
                </a>
            </div>
        </div>

        @include('sweetalert::alert')
    </div>
    <div class="row">
        @forelse ($patients as $patient)
            <div class="col-md-12 mb-3">
                <div class="card border-dark">
                    <div class="card-body">
                        <h5 class="card-title text-primary text-uppercase">
                            <strong>
                                {{ $patient->name }}
                            </strong>
                        </h5>
                        <div class="row mb-4">
                            <div class="col-md-3 d-flex">
                                <div>
                                    <small>Id Card :</small>
                                    <br>
                                    <strong>{{ $patient->id_card }}</strong>
                                </div>
                            </div>
                            <div class="col-md-3 d-flex">
                                <div>
                                    <small>Family Name :</small>
                                    <br>
                                    <strong>{{ $patient->family_name }}</strong>
                                </div>
                            </div>
                            <div class="col-md-3 d-flex">
                                <div>
                                    <small>Phone No :</small>
                                    <br>
                                    <strong>{{ $patient->phone_number }}</strong>
                                </div>
                            </div>
                            <div class="col-md-3 d-flex">
                                <div>
                                    <small>Address :</small>
                                    <br>
                                    <strong>{{ $patient->address }}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="float-right">
                            <form action="{{ route('patient.destroy', $patient->id) }}" method="POST">
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="{{ route('patient.show', $patient->id) }}" class="btn btn-outline-primary"><i
                                            class="fa fa-book"></i></a>
                                    <a href="{{ route('patient.edit', $patient->id) }}"
                                        class="btn btn-outline-primary"><i class="fa fa-edit"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    @if (!$patient->medical->count())
                                        <button type="submit" class="btn btn-outline-primary show_confirm"
                                            data-toggle="tooltip">
                                            <i class="fa fa-trash"></i></button>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-12 text-center">
                <em>'Data Not Found'</em>
            </div>
        @endforelse

        <div class="col-md-12">
            <div class="float-left">
                <p class="float-left"><small> Page No. {{ $patients->currentPage() }}</small></p>
            </div>
            <div class="float-right">
                <p class="float-right"><small>{{ $patients->links() }}</small></p>
            </div>
        </div>
    </div>

    {{-- <div class="card shadow mb-4">

        <a href="{{ route('patient.create') }}" class="btn btn-primary float-right">
            Add New Patient
        </a>

        @include('sweetalert::alert')

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>

                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Manage</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                            $no = 0;
                        @endphp
                        @foreach ($patients as $patient)
                            @php
                                $no++;
                            @endphp
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $patient->name }}</td>
                                <td>{{ $patient->gender }}</td>
                                <td>{{ $patient->phone_number }}</td>
                                <td>{{ $patient->address }}</td>
                                <td>
                                    <form action="{{ route('patient.destroy', $patient->id) }}" method="POST">
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <a href="{{ route('patient.show', $patient->id) }}"
                                                class="btn btn-outline-primary"><i class="fa fa-book"></i></a>
                                            <a href="{{ route('patient.edit', $patient->id) }}"
                                                class="btn btn-outline-primary"><i class="fa fa-edit"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            @if (!$patient->medical->count())
                                                <button type="submit" class="btn btn-outline-primary show_confirm"
                                                    data-toggle="tooltip">
                                                    <i class="fa fa-trash"></i></button>
                                            @endif
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div> --}}
@endsection
