@extends('layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <h1 class="h3 mb-0 text-gray-800"><i class="fa-solid fa-house-medical"></i> Polyclinic</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="float-left">Add Polyclinic</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('polyclinic.store') }}" class="row g-3 needs-validation">
                @csrf
                <table class="table table-borderless" id="dynamicTable">
                    <tr>
                        <th>Name</th>
                        <th>Floor No.</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" class="form-control @error('polyclinic.*.name') is-invalid @enderror"
                                id="name" name="polyclinic[0][name]" autofocus required>
                            @error('polyclinic.*.name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </td>

                        <td>
                            <input type="number"
                                class="form-control @error('polyclinic.*.floor_number') is-invalid @enderror"
                                id="floor_number" min="1" value="0" name="polyclinic[0][floor_number]" required>
                            @error('polyclinic.*.floor_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </td>
                        <td><button type="button" name="add" id="add" class="btn btn-success"><i class="fa fa-plus"></i>
                            </button></td>
                    </tr>
                </table>
                <div class="col-12">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save text-white-50"></i>
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
                            <th>Polyclinic</th>
                            <th>Floor No.</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Polyclinic</th>
                            <th>Floor No.</th>
                            <th>Manage</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                            $no = 0;
                        @endphp
                        @foreach ($polyclinics as $polyclinic)
                            @php
                                $no++;
                            @endphp
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $polyclinic->name }}</td>
                                <td>{{ $polyclinic->floor_number }}</td>
                                <td>
                                    <form action="{{ route('polyclinic.destroy', $polyclinic->id) }}" method="POST">
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <a href="{{ route('polyclinic.edit', $polyclinic->id) }}"
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
    <script type="text/javascript">
        var i = 0;

        $("#add").click(function() {

            ++i;

            $("#dynamicTable").append(
                ' <tr><td><input type="text" class="form-control" id="name" name="polyclinic[' +
                i +
                '][name]" required></td><td><input type="number" class="form-control" id="floor_number" min="1" value="0" name="polyclinic[' +
                i +
                '][floor_number]" required></td><td><button type="button" class="btn btn-danger remove-tr"><i class="fa fa-trash"></i></button></td></tr>'
            );
        });

        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });
    </script>
@endsection
