@extends('layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fa-solid fa-syringe"></i> Action</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="float-left">Edit Action</h4>
            <a href="{{ route('action.index') }}" class="btn btn-primary float-right mx-2">
                <i class="fa fa-arrow-left text-white-50"></i> Back
            </a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('action.update', $action->id) }}" class="row g-3">
                @csrf
                @method('PUT')
                <div class="col-md-6 mb-2">
                    <label for="action" class="form-label">{{ __('Action') }}</label>
                    <input type="text" value="{{ $action->action }}" class="form-control" id="action" name="action">
                </div>
                <div class="col-md-8 mb-2">
                    <label for="description" class="form-label">{{ __('Description') }}</label>
                    <textarea class="form-control" id="description" name="description" rows="10">{{ $action->description }}</textarea>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success float-right"><i class="fa fa-save text-white-50"></i>
                        Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
