@extends('layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fa-solid fa-pills"></i> Medicine</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="float-left">Edit Medicine</h4>
            <a href="{{ route('medicine.index') }}" class="btn btn-primary float-right mx-2">
                <i class="fa fa-arrow-left text-white-50"></i> Back
            </a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('medicine.update', $medicine->id) }}" class="row g-3">
                @csrf
                @method('PUT')
                <div class="col-md-4 mb-2">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                    <input type="text" class="form-control" value="{{ $medicine->name }}" id="name" name="name">
                </div>
                <div class="col-md-2 mb-2">
                    <label for="amount" class="form-label">{{ __('Amount') }}</label>
                    <input type="number" min="1" value="{{ $medicine->amount }}" class="form-control" id="amount"
                        name="amount">
                </div>
                <div class="col-md-2 mb-2">
                    <label for="size" class="form-label">{{ __('Size') }}</label>
                    <input type="text" value="{{ $medicine->size }}" class="form-control" id="size" name="size">
                </div>
                <div class="col-md-4 mb-2">
                    <label for="price" class="form-label">{{ __('Price') }}</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="number" value="{{ $medicine->price }}" min="1" class="form-control" name="price">
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success float-right"><i class="fa fa-save text-white-50"></i>
                        Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
