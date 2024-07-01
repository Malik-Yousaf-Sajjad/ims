<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sale Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <style>
        .margin-top-custom {
            margin-top: 20px; /* Adjust this value as needed */
        }
        .sidebar {
            background-color: white;
            width: 280px;
            margin-top: 20px;
        }
        .content {
            background-color: lightgrey;
            padding: 10px;
        }
    </style>
</head>
<body style="margin-left:10px; background-color: lightgrey">
<!-- Toggle Button -->
<div class="container-fluid mb-3">
    <div class="d-flex justify-content-end mt-3">
        <button class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#formFields" aria-expanded="false" aria-controls="formFields">
            Filter
        </button>
    </div>
</div>

<!-- Collapsible Form Fields -->
<div class="collapse" id="formFields">
    <div class="container-fluid">
        <form method="get" action="{{ route('show.entities.report') }}">
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="fromDate" class="form-label">From</label>
                    <input type="date" class="form-control" id="fromDate" name="fromDate">
                </div>
                <div class="col-md-3">
                    <label for="toDate" class="form-label">To</label>
                    <input type="date" class="form-control" id="toDate" name="toDate">
                </div>
                <div class="col-md-3">
                    <label for="customerName" class="form-label">Customer Name</label>
                    <input type="text" class="form-control" id="customerName" name="customerName">
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
    </div>
</div>

        <!-- Content Column -->
<div class="col-md-12">
    <!-- Purchase Records Table -->
    <h1 style="text-align: center;">Purchase Records</h1>
    <div class="margin-top-custom" style="margin-left: 20px; margin-right: 20px;">
        <div style="text-align: center;">
            <table class="table table-bordered table-striped table-hover" style="margin: auto; width: 100%; font-size: large; background-color: white">
                <thead class="table-dark text-center">
                    <tr>
                        <td>Supplier</td>
                        <td>Category</td>
                        <td>Date</td>
                        <td>Description</td>
                        <td>Quantity</td>
                        <td>Unit Price</td>
                        <td>Total Price</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($purchase['cruds'] as $crud)
                        <tr>
                            <td>{{ $crud->supplier }}</td>
                            <td>{{ $crud->category }}</td>
                            <td>{{ $crud->date }}</td>
                            <td>{{ $crud->description }}</td>
                            <td>{{ $crud->qty }}</td>
                            <td>£{{ $crud->unit_price ?? 0 }}</td>
                            <td>£{{ $crud->total_price ?? 0 }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="6" style="text-align: right;"><strong>Total Amount:</strong></td>
                        <td><strong style="color: red;">£{{ $purchase['totalAmount'] }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Sale Records Table -->
    <h1 style="text-align: center;">Sale Records</h1>
    <div class="margin-top-custom" style="margin-left: 20px; margin-right: 20px;">
        <div style="text-align: center;">
            <table class="table table-bordered table-striped table-hover" style="margin: auto; width: 100%; font-size: large; background-color: white">
                <thead class="table-dark text-center">
                    <tr>
                        <td>Customer</td>
                        <td>Category</td>
                        <td>Date</td>
                        <td>Description</td>
                        <td>Quantity</td>
                        <td>Unit Price</td>
                        <td>Total Price</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sale['cruds'] as $crud)
                        <tr>
                            <td>{{ $crud->supplier }}</td>
                            <td>{{ $crud->category }}</td>
                            <td>{{ $crud->date }}</td>
                            <td>{{ $crud->description }}</td>
                            <td>{{ $crud->qty }}</td>
                            <td>£{{ $crud->unit_price ?? 0 }}</td>
                            <td>£{{ $crud->total_price ?? 0 }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="6" style="text-align: right;"><strong>Total Amount:</strong></td>
                        <td><strong style="color: red;">£{{ $sale['totalAmount'] }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Employee Records Table -->
    <h1 style="text-align: center;">Employee Records</h1>
    <div class="margin-top-custom" style="margin-left: 20px; margin-right: 20px;">
        <div style="text-align: center;">
            <table class="table table-bordered table-striped table-hover" style="margin: auto; width: 100%; font-size: large; background-color: white">
                <thead class="table-dark text-center">
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Date</td>
                        <td>Working Hours</td>
                        <td>Pay</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employee['cruds'] as $crud)
                        <tr>
                            <td>{{ $crud->id }}</td>
                            <td>{{ $crud->name }}</td>
                            <td>{{ $crud->date }}</td>
                            <td>{{ $crud->working_hours }}</td>
                            <td>£{{ $crud->pay ?? 0 }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" style="text-align: right;"><strong>Total Amount:</strong></td>
                        <td><strong style="color: red;">£{{ $employee['totalAmount'] }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <h1 style="text-align: center;">Expense Records</h1>
    <div class="margin-top-custom" style="margin-left: 20px; margin-right: 20px;">
        <div style="text-align: center;">
            <table class="table table-bordered table-striped table-hover" style="margin: auto; width: 100%; font-size: large; background-color: white">
                <thead class="table-dark text-center">
                    <tr>
                        <td>ID</td>
                        <td>Date</td>
                        <td>Expense</td>
                        <td>Amount</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($expense['cruds'] as $crud)
                        <tr>
                            <td>{{ $crud->id }}</td>
                            <td>{{ $crud->date }}</td>
                            <td>{{ $crud->expenses }}</td>
                            <td>£{{ $crud->amount ?? 0 }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" style="text-align: right;"><strong>Total Amount:</strong></td>
                        <td><strong style="color: red;">£{{ $expense['totalAmount'] }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
