@extends('layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <h1 class="h3 mb-0 text-gray-800"><i class="fa-solid fa-hospital-user"></i> Patient</h1>
    </div>
    <div class="card shadow mb-4 border-left-primary">
        <div class="card-header py-3">
            <h4 class="float-left">Patient Detail</h4>
            <a href="/patient" class="btn btn-primary float-right">
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
                        Id Card
                    </td>
                    <td>
                        {{ $patients->id_card }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Name
                    </td>
                    <td>
                        {{ $patients->name }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Gender
                    </td>
                    <td>
                        {{ $patients->gender }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Religion
                    </td>
                    <td>
                        {{ $patients->religion }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Address
                    </td>
                    <td>
                        {{ $patients->address }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Birtday
                    </td>
                    <td>
                        {{ $patients->datebirth }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Phone Number
                    </td>
                    <td>
                        {{ $patients->phone_number }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Family Name
                    </td>
                    <td>
                        {{ $patients->family_name }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Family Relation
                    </td>
                    <td>
                        {{ $patients->family_relationship }}
                    </td>
                </tr>
            </table>

            <a href="{{ route('patient.edit', $patients->id) }}" class="btn btn-outline-primary float-right"><i
                    class="fa fa-edit"></i> Edit</a>
        </div>
    </div>
@endsection
