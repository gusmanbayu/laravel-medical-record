@extends('layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fa-solid fa-pills"></i> Medicine</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="float-left">Add Medicine</h4>
            <a href="{{ route('medicine.index') }}" class="btn btn-primary float-right mx-2">
                <i class="fa fa-arrow-left text-white-50"></i> Back
            </a>
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('medicine.store') }}" class="row g-3 needs-validation">
                @csrf
                <table class="table table-borderless" id="dynamicTable">
                    <tr>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Size</th>
                        <th>Price/pcs (Rp)</th>
                        <th>Manage</th>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" class="form-control @error('medicine.*.name') is-invalid @enderror" id="name"
                                name="medicine[0][name]" required>
                            @error('medicine.*.name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </td>
                        <td><input type="number" min="1"
                                class="form-control @error('medicine.*.amount') is-invalid @enderror" id="amount"
                                name="medicine[0][amount]" required>
                            @error('medicine.*.amount')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </td>
                        <td><input type="text" min="1" class="form-control @error('medicine.*.size') is-invalid @enderror"
                                id="size" name="medicine[0][size]" required>
                            @error('medicine.*.size')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </td>
                        <td><input type="number" min="1"
                                class="form-control @error('medicine.*.price') is-invalid @enderror"
                                name="medicine[0][price]" required>
                            @error('medicine.*.price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </td>
                        <td><button type="button" name="add" id="add" class="btn btn-success"><i
                                    class="fa fa-plus"></i></button></td>
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
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Size</th>
                            <th>Price/pcs (Rp)</th>
                            <th>Grand Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Size</th>
                            <th>Price/pcs (Rp)</th>
                            <th>Grand Total</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                            $no = 0;
                        @endphp
                        @foreach ($medicines as $medicine)
                            @php
                                $no++;
                            @endphp
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $medicine->name }}</td>
                                <td>{{ $medicine->amount }}</td>
                                <td>{{ $medicine->size }}</td>
                                <td>{{ $medicine->price }}</td>
                                <td>{{ $medicine->price * $medicine->amount }}</td>
                                <td>
                                    <form action="{{ route('medicine.destroy', $medicine->id) }}" method="POST">
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <a href="{{ route('medicine.edit', $medicine->id) }}"
                                                class="btn btn-outline-primary"><i class="fa fa-edit"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-primary">
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

            $("#dynamicTable").append('<tr><td><input type="text" class="form-control" id="name" name="medicine[' +
                i +
                '][name]"></td><td><input type="number" min="1" class="form-control" id="amount" name="medicine[' +
                i +
                '][amount]"></td><td><input type="text" min="1" class="form-control" id="size" name="medicine[' +
                i + '][size]"></td> <td><input type="number" min="1" class="form-control" name="medicine[' + i +
                '][price]"></td><td><button type="button" class="btn btn-danger remove-tr"><i class="fa fa-trash"></i></button></td></tr>'
            );
        });

        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });
    </script>
@endsection
