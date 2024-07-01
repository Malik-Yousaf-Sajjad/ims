<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <style>
        .margin-top-custom {
            margin-top: 20px; /* Adjust this value as needed */
        }
    </style>
</head>
<body style="margin-left:10px; background-color: lightgrey">
<h1 style="text-align: center;">{{$report}}</h1>
<div class="container-fluid margin-top-custom">
    <div style="text-align: center;">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover" style="margin: auto; width: 100%; font-size: large; background-color: white">
                <thead class="table-dark text-center">
                    <tr>
                        <th>{{$entity}}</th>
                        @php
                            $start = \Carbon\Carbon::parse($startDate);
                            $end = \Carbon\Carbon::parse($endDate);
                        @endphp
                        @for($date = $start; $date->lte($end); $date->addDay())
                            <th>{{ $date->format('Y-m-d') }}</th>
                        @endfor
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($groupedData as $supplier => $data)
                    <tr>
                        <td>{{ $supplier }}</td>
                        @php
                            $rowTotal = 0;
                            $start = \Carbon\Carbon::parse($startDate);
                            $end = \Carbon\Carbon::parse($endDate);
                        @endphp
                        @for($date = $start; $date->lte($end); $date->addDay())
                            @php
                                $dateFormatted = $date->format('Y-m-d');
                                $dateTotal = $data['dates'][$dateFormatted] ?? 0;
                                $rowTotal += $dateTotal;
                            @endphp
                            <td>£{{ $dateTotal }}</td>
                        @endfor
                        <td>£{{ $rowTotal }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td class="text-center"><strong>Total Amount:</strong></td>
                        @php
                            $start = \Carbon\Carbon::parse($startDate);
                            $end = \Carbon\Carbon::parse($endDate);
                            $grandTotal = 0;
                        @endphp
                        @for($date = $start; $date->lte($end); $date->addDay())
                            @php
                                $dateFormatted = $date->format('Y-m-d');
                                $dateTotal = $cruds->where('date', $dateFormatted)->sum($column);
                                $grandTotal += $dateTotal;
                            @endphp
                            <td><strong>£{{ $dateTotal }}</strong></td>
                        @endfor
                        <td><strong>£{{ $grandTotal }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
