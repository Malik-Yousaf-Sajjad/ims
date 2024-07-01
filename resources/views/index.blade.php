<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<h1 style="text-align: center;"> {{$heading}} </h1>
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
                        <button class="btn btn-toggle align-items-center rounded collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#reports-collapse" aria-expanded="false" aria-controls="reports-collapse">
                            Reports
                        </button>
                        <div class="collapse" id="reports-collapse">
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

        <!-- Table -->
        <div class="col-md-8 margin-top-custom">
            <div style="text-align: center;">
                <table class="table table-bordered" style="margin: auto; width: 100%; font-size: large; background-color: white">
                    <thead>
                        <tr>
                            <!-- <td>ID</td>
                            <td>Product ID</td> -->
                            <td>{{$supplier}}</td>
                            <td>Category</td>
                            <td>Date</td>
                            <td>Description</td>
                            <td>Quantity</td>
                            <td>Unit Price</td>
                            <td>Total Price</td>
                            <td colspan="2">Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cruds as $crud)
                        <tr>
                            <!-- <td>{{ $crud->id }}</td>
                            <td>{{ $crud->product_id }}</td> -->
                            <td>{{ $crud->supplier }}</td>
                            <td>{{ $crud->category }}</td>
                            <td>{{ $crud->date }}</td>
                            <td>{{ $crud->description }}</td>
                            <td>{{ $crud->qty }}</td>
                            <td>{{ $crud->unit_price }}</td>
                            <td>{{ $crud->total_price }}</td>
                            <td>
                                <form action="{{ route($editRouteName, $crud->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route($deleteRouteName, $crud->id) }}" method="GET">
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Edit</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
