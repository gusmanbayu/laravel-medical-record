@extends('layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <h1 class="h3 mb-0 text-gray-800"><i class="fa-solid fa-syringe"></i> Action</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="float-left">Add Action</h4>
            <a href="{{ route('action.index') }}" class="btn btn-primary float-right mx-2">
                <i class="fa fa-arrow-left text-white-50"></i> Back
            </a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('action.store') }}" class="row g-3">
                @csrf
                <div class="col-md-6 mb-2">
                    <label for="action" class="form-label">{{ __('Action') }}</label>
                    <input type="text" class="form-control" id="action" name="action">
                </div>
                <div class="col-md-12 mb-2">
                    <label for="description" class="form-label">{{ __('Description') }}</label>
                    <textarea class="form-control" id="description" name="description" rows="8"></textarea>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success float-right"><i class="fa fa-save text-white-50"></i>
                        Save</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card shadow mb-4">
        @include('sweetalert::alert')
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Action</th>
                            <th>Description</th>
                            <th>Setting</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Action</th>
                            <th>Description</th>
                            <th>Setting</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                            $no = 0;
                        @endphp
                        @foreach ($actions as $action)
                            @php
                                $no++;
                            @endphp
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $action->action }}</td>
                                <td>{{ $action->description }}</td>
                                <td>
                                    <form action="{{ route('action.destroy', $action->id) }}" method="POST">
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <a href="{{ route('action.edit', $action->id) }}"
                                                class="btn btn-outline-primary"><i class="fa fa-edit"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-primary show_confirm"
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
