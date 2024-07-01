<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script>
         function showProductDetails() {
            var select = document.getElementById('product_id');
            var productId = select.options[select.selectedIndex].getAttribute('data-product-id');
            console.log(productId);
            var hiddenInput = document.getElementById('hidden_product_id');

            
            if (select.value !== "other") {
                if (productId) {
                hiddenInput.value = productId;
                console.log(hiddenInput);
                hiddenInput.style.display = 'none'; // Make the hidden input visible
                hiddenInput.type = 'text';
            } else {
                hiddenInput.value = '';
                hiddenInput.style.display = 'none'; // Hide the input if no product is selected
            }
            }
            else {
                hiddenInput.value = '';
                hiddenInput.style.display = 'none';
                window.location.href = "{{ route($productRoute) }}";
            }
    }

    function total() {
            var qty = document.getElementById('qty').value;
            var unitPrice = document.getElementById('unit-price').value;
            var totalPrice = 0;

            if (qty && unitPrice) {
                totalPrice = qty * unitPrice;
            }

            document.getElementById('total-price').value = totalPrice.toFixed(2);
        }
    </script>
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
                    <!-- <li class="border-top my-3"></li>
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                            Account
                        </button>
                        <div class="collapse" id="account-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="#" class="link-dark rounded">New...</a></li>
                                <li><a href="#" class="link-dark rounded">Profile</a></li>
                                <li><a href="#" class="link-dark rounded">Settings</a></li>
                                <li><a href="#" class="link-dark rounded">Sign out</a></li>
                            </ul>
                        </div>
                    </li> -->
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="content">
                <?php
                $mytime = new DateTime();
                ?>
                <div class="col-md-10">
                    <h1>{{$message}}</h1>
                </div>
                <form class="row g-3" method="post" action="{{ route($routeName) }}">
                    @csrf
                    <div class="col-md-10">
                        <label class="form-label">{{$supplier}} <span style="color: red;">*</span> </label>
                        <!-- <input type="text" class="form-control" id="supplier" name="supplier"> -->
                        @if ($supplier == 'Supplier')
                        <select class="form-select" id="supplier" name="supplier" onchange="showProductDetails()" required>
                        <option>Select a {{$supplier}} </option>
                            @foreach($products as $product)
                            @if ($product->supplier)
                                <option value="{{ $product->supplier }}" data-product-id="{{$product->id}}">{{ $product->supplier }}</option>
                            @endif
                            @endforeach
                        </select>
                        @else
                        <select class="form-select" id="supplier" name="supplier" onchange="showProductDetails()" required>
                        <option>Select a {{$supplier}} </option>
                            @foreach($products as $product)
                            @if ($product->customer)
                                <option value="{{ $product->customer }}" data-product-id="{{$product->id}}">{{ $product->customer }}</option>
                            @endif
                            @endforeach
                        </select>
                        @endif
                    </div>

                    <div class="col-md-10">
                    <label class="form-label">Categories <span style="color: red;">*</span> </label>
                        <select class="form-select" id="product_id" name="product_id" required>
                        @if($supplier == 'Customer')
                        <!-- <option>Select a Category</option> -->
                            @foreach($products as $product)
                            @if($product->product_name != 'Invoice' && $product->product_name != 'invoice' && $product->product_name != 'INVOICE')
                            @if ($product->product_name)
                                <option value="{{ $product->id }}" data-product-id="{{$product->id}}">{{ $product->product_name }}</option>
                                @endif
                                @endif
                                @endforeach
                            <!-- <option value="1000" data-product-id="other">Other</option> -->
                            @else
                            @foreach($products as $product)
                            @if($product->product_name == 'Invoice' || $product->product_name == 'invoice' || $product->product_name == 'INVOICE')
                            <option value="{{ $product->id }}" data-product-id="{{ $product->id }}">{{ $product->product_name }}</option>
                            @endif
                            @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="col-md-10">
                        <!-- <label for="product_id" class="form-label">Product ID</label> -->
                        <input type="hidden" class="form-control" id="hidden_product_id" name="hidden_product_id">
                    </div>
                    <div class="col-md-10">
                        <label for="date" class="form-label">Date <span style="color: red;">*</span> </label>
                        <input type="text" class="form-control" id="date" name="date" value="{{$mytime->format('Y-m-d')}}" required>
                    </div>
                    <div class="col-md-10">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                    </div>
                    <div class="col-md-3">
                        <label for="qty" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="qty" name="qty" oninput="total()">
                    </div>
                    <div class="col-md-3">
                        <label for="unit-price" class="form-label">Unit Price</label>
                        <input type="number" class="form-control no-spinner" id="unit-price" name="unit_price" placeholder="00.00" oninput="total()">
                    </div>
                    <div class="col-md-4">
                        <label for="total-price" class="form-label">Total Price <span style="color: red;">*</span> </label>
                        <input type="number" class="form-control no-spinner" id="total-price" name="total_price" placeholder="00.00" required>
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
