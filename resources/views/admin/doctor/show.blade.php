@extends('layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <h1 class="h3 mb-0 text-gray-800"><i class="fa-solid fa-user-doctor"></i> Doctor</h1>
    </div>
    <div class="card shadow mb-4 border-left-primary">
        <div class="card-header py-3">
            <h4 class="float-left">Doctor Detail</h4>
            <a href="/doctor" class="btn btn-primary float-right">
                <i class="fa fa-arrow-left text-white-50"></i>
                Back
            </a>

        </div>
        <div class="card-body">
            <table class="table table-hover">
                <tr>
                    <th colspan="2" class="text-center table-primary">
                        <h5>Personal Data</h5>
                    </th>
                </tr>
                <tr>
                    <td>
                        Name
                    </td>
                    <td>
                        {{ $doctors->name }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Polyclinic
                    </td>
                    <td>
                        {{ $doctors->polyclinic->name }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Practice License
                    </td>
                    <td>
                        {{ $doctors->practice_license }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Birth Place
                    </td>
                    <td>
                        {{ $doctors->place_birth }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Phone Number
                    </td>
                    <td>
                        {{ $doctors->phone_number }}
                    </td>
                </tr>
                <tr>
                    <td>
                        E-Mail
                    </td>
                    <td>
                        {{ $doctors->user->email }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Address
                    </td>
                    <td>
                        {{ $doctors->address }}
                    </td>
                </tr>
            </table>

            <a href="{{ route('doctor.edit', $doctors->id) }}" class="btn btn-outline-primary float-right"><i
                    class="fa fa-edit"></i> Edit</a>

        </div>
    </div>
@endsection
