@extends('layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <h1 class="h3 mb-0 text-gray-800"><i class="fa-solid fa-hospital-user"></i> Medical</h1>
    </div>
    <div class="card shadow mb-4 border-left-primary">
        <div class="card-header py-3">
            <h4 class="float-left">Medical Detail</h4>
            <a href="{{ route('medical.index') }}" class="btn btn-primary float-right">
                <i class="fa fa-arrow-left text-white-50"></i>
                Back
            </a>

        </div>
        <div class="card-body">
            <div class="float-right"><em>Check Date : {{ date('d, F Y', strtotime($medicals->date)) }}</em></div>
            <table class="table table-hover">
                <tr>
                    <th colspan="2" class="text-center table-primary">
                        <h5>Medical Data</h5>
                    </th>
                </tr>
                <tr>
                    <td>
                        Patient
                    </td>
                    <td>
                        {{ $medicals->patient->name }}
                    </td>
                </tr>

                <tr>
                    <td>
                        Doctor
                    </td>
                    <td>
                        {{ $medicals->user->name }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Complaint
                    </td>
                    <td>
                        {{ $medicals->complaint }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Diagnose
                    </td>
                    <td>
                        {{ $medicals->diagnose }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Recipe
                    </td>
                    <td>
                        {{ $medicals->recipe }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Action
                    </td>
                    <td>
                        @if (!empty($medicals->action_id))
                            {{ $medicals->action->action }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Medicine
                    </td>
                    <td>
                        @if (!empty($medicals->medicine_id))
                            {{ $medicals->medicine->name }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Description
                    </td>
                    <td>
                        {{ $medicals->description }}
                    </td>
                </tr>
            </table>

            <a href="{{ route('medical.edit', $medicals->id) }}" class="btn btn-outline-primary float-right"><i
                    class="fa fa-edit"></i> Edit</a>
        </div>
    </div>
@endsection
