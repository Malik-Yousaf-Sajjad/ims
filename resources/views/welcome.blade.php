<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management System</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .footer {
            height: 100px;
            line-height: 100px;
            background-color: #343a40;
            color: white;
        }
        .navbar-custom {
            background-color: #6f42c1;
        }
        .center-text {
            /* background-color: white; */
            /* color: white; */
            text-align: center;
            width: 100%;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 90vh; /* Adjusted height to fit without overlapping footer */
            overflow: hidden;
            position: relative;
        }
        .center-text img {
            width: auto;
            height: 100%;
            max-width: 100%;
            object-fit: cover;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .center-content {
            position: relative;
            z-index: 1;
            margin-top: 20px;
        }
        .container-fluid {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px 0;
        }
        .button-row {
            margin: 0;
            padding: 0;
        }
        .btn {
            margin: 5px 0;
            width: 200px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand text-white" href="#">Inventory Management</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-white" href="/about">About <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Reports
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('show.purchases')}}">Purchase</a>
                        <a class="dropdown-item" href="{{route('show.sales')}}">Sale</a>
                        <a class="dropdown-item" href="{{route('show.employees')}}">Employee</a>
                        <a class="dropdown-item" href="{{route('show.expenses')}}">Expenses</a>
                        <a class="dropdown-item" href="{{route('show.entities')}}">Entities</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="center-text">
        <img src="{{ asset('dixy.png') }}" alt="Background Image" class="img-fluid">
        <!-- <div class="center-content">
            <a href="/about" class="btn btn-primary">Learn More</a>
        </div> -->
    </div>

    <div class="container-fluid">
        <div class="row w-100 justify-content-center button-row">
            <div class="col-md-3 d-flex justify-content-center">
                <a href="{{ route('product.create') }}" class="btn btn-primary btn-lg w-100 text-center">Product</a>
            </div>
            <div class="col-md-3 d-flex justify-content-center">
                <a href="{{ route('purchase.create') }}" class="btn btn-primary btn-lg w-100 text-center">Purchase</a>
            </div>
        </div>
        <div class="row w-100 justify-content-center button-row">
            <div class="col-md-3 d-flex justify-content-center">
                <a href="{{ route('sale.create') }}" class="btn btn-primary btn-lg w-100 text-center">Sale</a>
            </div>
            <div class="col-md-3 d-flex justify-content-center">
                <a href="{{ route('employee.create') }}" class="btn btn-primary btn-lg w-100 text-center">Employee</a>
            </div>
        </div>
        <div class="row w-100 justify-content-center button-row">
            <div class="col-md-3 d-flex justify-content-center">
                <a href="{{ route('expense.create') }}" class="btn btn-primary btn-lg w-100 text-center">Expenses</a>
            </div>
        </div>
    </div>

    <footer class="footer text-center">
        <span class="text-muted">© 2024 Inventory Management System</span>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
