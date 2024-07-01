<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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
        <form method="get" action="{{ route('show.employee.report') }}">
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
                    <label for="supplierName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="supplierName" name="supplierName">
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
    </div>
</div>

<h1 style="text-align: center;">Employees Records</h1>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="flex-shrink-0 p-3 sidebar">
                <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                    <span class="fs-5 fw-semibold text-primary">{{ __("Inventory Management System") }}</span>
                </a>
                <ul class="list-unstyled ps-0">
                    <li class="mb-1">
                        <a href="{{ route('product.create') }}">
                            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                                Product
                            </button>
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="{{ route('purchase.create') }}">
                            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                                Purchase
                            </button>
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="{{ route('sale.create') }}">
                            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                                Sale
                            </button>
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="{{ route('employee.create') }}">
                            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                                Employee
                            </button>
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="{{route('expense.create')}}"><button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                            Expenses
                        </button></a>
                    </li>
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                            Reports
                        </button>
                        <div class="collapse" id="orders-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="{{ route('show.purchases') }}" class="link-dark rounded">Purchases</a></li>
                                <li><a href="{{ route('show.sales') }}" class="link-dark rounded">Sales</a></li>
                                <li><a href="{{ route('show.employees') }}" class="link-dark rounded">Employees</a></li>
                                <li><a href="{{ route('show.expenses') }}" class="link-dark rounded">Expenses</a></li>
                                <li><a href="{{ route('show.entities') }}" class="link-dark rounded">Entities</a></li>
                            </ul>
                        </div>
                    </li>
                    
                </ul>
            </div>
        </div>

        <!-- Table Column -->
        <div class="col-md-8 margin-top-custom">
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
                        @foreach($cruds as $crud)
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
                                <td><strong style="color: red;">£{{ $totalAmount }}</strong></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
