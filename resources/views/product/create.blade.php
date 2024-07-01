<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <style>
        
        .custom-button {
            width: 200px; 
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

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="flex-shrink-0 p-3 sidebar">
                <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                    <!-- <svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"></use></svg> -->
                    <span class="fs-5 fw-semibold text-primary">{{__("Inventory Management System")}}</span>
                </a>
                <ul class="list-unstyled ps-0">
                    <li class="mb-1">
                        <a href="{{route('product.create')}}"><button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                            Product
                        </button></a>
                    </li>
                    <li class="mb-1">
                    <a href="{{route('purchase.create')}}"><button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                            Purchase
                        </button></a>
                    </li>
                    <li class="mb-1">
                    <a href="{{route('sale.create')}}"><button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                            Sale
                        </button></a>
                    </li>
                    <li class="mb-1">
                        <a href="{{route('employee.create')}}"><button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                            Emplyee
                        </button></a>
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
                        <div class="collapse" id="orders-collapse" style="">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="{{route('show.purchases')}}" class="link-dark rounded">Purchases</a></li>
                                <li><a href="{{route('show.sales')}}" class="link-dark rounded">Sales</a></li>
                                <li><a href="{{route('show.employees')}}" class="link-dark rounded">Eployees</a></li>
                                <li><a href="{{ route('show.employees') }}" class="link-dark rounded">Expenses</a></li>
                                <li><a href="{{ route('show.entities') }}" class="link-dark rounded">Entities</a></li>
                            </ul>
                        </div>
                    </li>
                    
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="content">
                <?php
                $mytime = new DateTime();
                ?>
                <div class="col-md-10">
                    <h1>Product</h1>
                </div>
                <form class="row g-3" method="post" action="{{ route('product.store') }}">
                    @csrf
                    <div class="col-md-10">
                        <label for="product_name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name">
                    </div>
                    <div class="col-md-10">
                        <label for="supplier" class="form-label">Supplier</label>
                        <input type="text" class="form-control" id="supplier" name="supplier">
                    </div>
                    <div class="col-md-10">
                        <label for="customer" class="form-label">Customer</label>
                        <input type="text" class="form-control" id="customer" name="customer">
                    </div>
                    <div class="col-md-10">
                    <label for="employee" class="form-label">Employee</label>
                        <input type="text" class="form-control" id="employee" name="employee">
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary custom-button">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
