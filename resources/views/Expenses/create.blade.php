<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <style>
        .no-spinner::-webkit-outer-spin-button,
        .no-spinner::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
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
                        <!-- <div class="collapse" id="home-collapse" style="">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="{{route('purchase.create')}}" class="link-dark rounded">Overview</a></li>
                                <li><a href="#" class="link-dark rounded">Updates</a></li>
                                <li><a href="#" class="link-dark rounded">Reports</a></li>
                            </ul>
                        </div> -->
                    </li>
                    <li class="mb-1">
                    <a href="{{route('sale.create')}}"><button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                            Sale
                        </button></a>
                        <!-- <div class="collapse" id="dashboard-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="{{route('purchase.create')}}" class="link-dark rounded">Overview</a></li>
                                <li><a href="#" class="link-dark rounded">Weekly</a></li>
                                <li><a href="#" class="link-dark rounded">Monthly</a></li>
                                <li><a href="#" class="link-dark rounded">Annually</a></li>
                            </ul>
                        </div> -->
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
                                <li><a href="{{ route('show.expenses') }}" class="link-dark rounded">Expenses</a></li>
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
                    <h1>Expenses</h1>
                </div>
                <form class="row g-3" method="post" action="{{ route('expense.store') }}">
                    @csrf
                    <!-- <div class="col-md-10">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div> -->
                    <div class="col-md-10">
                        <label for="date" class="form-label">Date <span style="color: red;">*</span> </label>
                        <input type="text" class="form-control" id="date" name="date" value="{{$mytime->format('Y-m-d')}}" required>
                    </div>
                    <div class="col-md-10">
                        <label for="expenses" class="form-label">Category <span style="color: red;">*</span> </label>
                        <input type="text" class="form-control" id="expenses" name="expenses" required>
                    </div>
                    <!-- <div class="col-md-10">
                    <label class="form-label">Expense Categories</label>
                        <select class="form-select" id="expenses" name="expenses">
                            <option value="electricity">Electricity</option>
                            <option value="gas">Gas</option>
                            <option value="grocery">Grocery</option>
                            <option value="other">Other</option>
                        </select>
                    </div> -->
                    <div class="col-md-10">
                        <label for="amount" class="form-label">Amount <span style="color: red;">*</span> </label>
                        <input type="number" class="form-control no-spinner" id="amount" name="amount" placeholder="00.00" required>
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
