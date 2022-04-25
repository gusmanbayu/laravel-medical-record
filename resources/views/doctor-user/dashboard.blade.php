@extends('layouts.main-doctor')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <h1 class="h3 mb-0 text-gray-800"><i class="fa-solid fa-hospital-dashboard"></i>Dashboard</h1>

    </div>


    @include('sweetalert::alert')
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Patient</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $patient_totals }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hospital-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @foreach ($visits as $visit)
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </symbol>
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
            </symbol>
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </symbol>
        </svg>
        <div class="alert alert-primary d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                <use xlink:href="#info-fill" />
            </svg>
            &nbsp;
            <div> Jadwal Kunjungan Pasien Atas Nama <strong> {{ $visit->patient->name }}, </strong>
                {{ date('d M Y', strtotime($visit->date)) }} Pada Pukul {{ $visit->hours }}</div>
        </div>
    @endforeach
    <div class="row col-lg-12">
        @foreach ($medicals as $medical)
            <div class="card shadow border-left-info col-md-5 mb-2 mr-3">
                <div class="card-header">
                    <h6>Medical Check Up
                        <span class="badge bg-info text-light">
                            @if ($medical->status == 1)
                                Active
                            @endif
                        </span>
                    </h6>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $medical->patient->name }}</h5>
                    <dl class="row">
                        <dt class="col-sm-4">Doctor</dt>
                        <dd class="col-sm-8">{{ $medical->user->doctor->name }}</dd>
                        <dt class="col-sm-4">Date</dt>
                        <dd class="col-sm-8">{{ date('d M Y', strtotime($medical->date)) }}</dd>
                    </dl>
                    <a href="{{ route('doctor-user.medicalCheck', $medical->id) }}"
                        class="btn btn-info float-right">Check</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
