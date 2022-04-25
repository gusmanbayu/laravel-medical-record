<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Medical Record PDF</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 12px;
        }

        td {
            padding: 2px;
        }

    </style>
</head>

<body>
    <h4>
        <center> Medical Record </center>
    </h4>
    <table style="width:100%">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Doctor</th>
            <th>Complaint</th>
            <th>Diagnose</th>
            <th>Action</th>
            <th>Description</th>
            <th>Date</th>
        </tr>
        @php
            $no = 0;
        @endphp
        @foreach ($medicals as $medical)
            @php
                $no++;
            @endphp
            <tr>
                <td>{{ $no }}</td>
                <td>{{ $medical->patient->name }}</td>
                <td>{{ $medical->user->doctor->name }}</td>
                <td>{{ $medical->complaint }}</td>
                <td>{{ $medical->diagnose }}</td>
                <td>
                    @if (!empty($medical->action->action))
                        {{ $medical->action->action }}
                    @endif
                </td>
                <td>{{ $medical->description }}</td>
                <td>{{ date('d M Y', strtotime($medical->date)) }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
