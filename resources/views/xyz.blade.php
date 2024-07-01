<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entity Reports</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .margin-top-custom {
            margin-top: 20px; /* Adjust this value as needed */
        }
    </style>
</head>
<body style="margin-left:10px; background-color: lightgrey">

@foreach (['purchase', 'category', 'employee', 'expense'] as $reportType)
    @php
        $reportData = $$reportType;
    @endphp

    <h1 style="text-align: center;">{{ $reportData['report'] }}</h1>
    <div class="container-fluid margin-top-custom">
        <div style="text-align: center;">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" style="margin: auto; width: 100%; font-size: large; background-color: white">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>{{ $reportData['entity'] }}</th>
                            @php
                                $start = \Carbon\Carbon::parse($reportData['startDate']);
                                $end = \Carbon\Carbon::parse($reportData['endDate']);
                            @endphp
                            @for($date = $start; $date->lte($end); $date->addDay())
                                <th>{{ $date->format('Y-m-d') }}</th>
                            @endfor
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reportData['groupedData'] as $entity => $data)
                        <tr>
                            <td>{{ $entity }}</td>
                            @php
                                $rowTotal = 0;
                                $start = \Carbon\Carbon::parse($reportData['startDate']);
                                $end = \Carbon\Carbon::parse($reportData['endDate']);
                            @endphp
                            @for($date = $start; $date->lte($end); $date->addDay())
                                @php
                                    $dateFormatted = $date->format('Y-m-d');
                                    $dateTotal = $data['dates'][$dateFormatted] ?? 0;
                                    $rowTotal += $dateTotal;
                                @endphp
                                <td>£{{ number_format($dateTotal, 2) }}</td>
                            @endfor
                            <td>£{{ number_format($rowTotal, 2) }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td class="text-center"><strong>Total Amount:</strong></td>
                            @php
                                $start = \Carbon\Carbon::parse($reportData['startDate']);
                                $end = \Carbon\Carbon::parse($reportData['endDate']);
                                $grandTotal = 0;
                            @endphp
                            @for($date = $start; $date->lte($end); $date->addDay())
                                @php
                                    $dateFormatted = $date->format('Y-m-d');
                                    $dateTotal = $reportData['cruds']->where('date', $dateFormatted)->sum($reportData['column']);
                                    $grandTotal += $dateTotal;
                                @endphp
                                <td><strong>£{{ number_format($dateTotal, 2) }}</strong></td>
                            @endfor
                            <td><strong>£{{ number_format($grandTotal, 2) }}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endforeach

</body>
</html>
