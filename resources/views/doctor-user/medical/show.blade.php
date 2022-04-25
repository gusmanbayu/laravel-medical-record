@extends('layouts.main-doctor')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

    </div>
    <div class="card col-md-5 mx-auto border-dark text-dark">
        <div class="card-header">
            {{ __('Medical Record') }}
            <div class="float-right"><em> {{ date('d M Y', strtotime($medicals->date)) }}</em></div>
        </div>
        <div class="card-body">
            <h5 class="card-title"><strong>{{ $medicals->patient->name }}</strong></h5>
            <ul class="list-inline">
                <li class="list-inline-item">Doctor</li>
                <li class="list-inline-item">: {{ $medicals->user->doctor->name }}</li>
            </ul>
            <ul class="list-inline">
                <li class="list-inline-item">Complaint</li>
                <li class="list-inline-item">: {{ $medicals->complaint }}</li>
            </ul>
            <ul class="list-inline">
                <li class="list-inline-item">Diagnose</li>
                <li class="list-inline-item">: {{ $medicals->diagnose }}</li>
            </ul>
            <ul class="list-inline">
                <li class="list-inline-item">Action</li>
                @if ($medicals->action)
                    <li class="list-inline-item">: {{ $medicals->action->action }}</li>
                @endif
            </ul>
            <ul class="list-inline">
                <li class="list-inline-item">Recipe</li>
                <li class="list-inline-item">: {{ $medicals->recipe }}</li>
            </ul>
            <ul class="list-inline">
                <li class="list-inline-item">Medicine</li>
                @if ($medicals->medicine)
                    <li class="list-inline-item">: {{ $medicals->medicine->name }}</li>
                @endif
            </ul>
            <ul class="list-inline">
                <li class="list-inline-item">Description</li>
                <li class="list-inline-item">: {{ $medicals->description }}</li>
            </ul>
            <div class="float-right">
                <a href="{{ route('doctor-user.medicalIndex') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

    </div>
@endsection
