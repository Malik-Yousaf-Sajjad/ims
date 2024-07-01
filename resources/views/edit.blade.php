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
            var select = document.getElementById('supplier');
            var productId = select.options[select.selectedIndex].getAttribute('data-product-id');
            console.log(productId);
            var hiddenInput = document.getElementById('hidden_product_id');

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

    </style>
</head>
<body style="margin-left:10px; background-color: lightgrey">
<form class="row g-3" method="Post" action="{{route($routeName,$crud->id)}}">  
@method('PATCH')     
 @csrf 

  <div class="col-md-10">
      <label class="form-label">{{$supplier}} <span style="color: red;">*</span> </label>
      @if ($supplier == 'Supplier')
            <select class="form-select" id="supplier" name="supplier" onchange="showProductDetails()">
            @foreach($products as $product)
                    @if($product->id == $crud->product_id)
                    <!-- @if ($product->supplier) -->
                            <option value="{{$crud->supplier}}" data-product-id="{{$product->id}}">{{$crud->supplier}}</option>
                    <!-- @endif -->
                    @else
                <!-- <option value="{{ $product->id }}" data-product-id="{{$product->id}}">{{ $product->customer }}</option> -->
                    @endif
                    @endforeach
                    @foreach($products as $product)
                    @if ($product->supplier)
                            <option value="{{$product->supplier}}" data-product-id="{{$product->id}}">{{$product->supplier}}</option>
                    @endif

                    @endforeach
            </select>
            @else
            <select class="form-select" id="supplier" name="supplier" onchange="showProductDetails()">
                    @foreach($products as $product)
                    @if($product->id == $crud->product_id)
                    <!-- @if ($product->customer) -->
                            <option value="{{$crud->supplier}}" data-product-id="{{$product->id}}">{{$crud->supplier}}</option>
                    <!-- @endif -->
                    @else
                <!-- <option value="{{ $product->id }}" data-product-id="{{$product->id}}">{{ $product->customer }}</option> -->
                    @endif
                    @endforeach
                    @foreach($products as $product)
                    @if ($product->customer)
                            <option value="{{$product->customer}}" data-product-id="{{$product->id}}">{{$product->customer}}</option>
                    @endif
                    @endforeach
            </select>
            @endif

  </div>
  
  <div class="col-md-10">
  <label class="form-label">Category <span style="color: red;">*</span> </label>
    <select class="form-select" id="product_id" name="product_id" >
        @foreach($products as $product)
        @if($product->product_name == 'Invoice' || $product->product_name == 'invoice' || $product->product_name == 'INVOICE')
        <!-- @if($crud->product_id == $product->id) -->
                <option value="{{ $product->id }}" data-product-id="{{$product->id}}">{{ $product->product_name }}</option>
            @else
                <!-- <option value="{{ $product->id }}" data-product-id="{{$product->id}}">{{ $product->product_name }}</option> -->
            @endif
            <!-- @endif -->
        @endforeach


        @if($supplier == 'Customer')
        @foreach($products as $product)
        <!-- @if($crud->product_id == $product->id) -->
        <!-- @if($product->product_name != 'Invoice' && $product->product_name != 'invoice' && $product->product_name != 'INVOICE') -->
                <option value="{{ $product->id }}" data-product-id="{{$product->id}}">{{ $product->product_name }}</option>
        <!-- @endif -->
        <!-- @endif -->
        @endforeach
        @foreach($products as $product)

        @if($product->product_name != 'Invoice' && $product->product_name != 'invoice' && $product->product_name != 'INVOICE')
        @if($product->product_name)
                <option value="{{ $product->id }}" data-product-id="{{$product->id}}">{{ $product->product_name }}</option>
        @endif
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
    <input type="text" class="form-control" id="date" name="date" value="{{$crud->date}}" required>
  </div>
  <div class="col-md-10">
  <label for="description" class="form-label">Description</label>
  <textarea class="form-control" id="description" rows="3" name="description">{{$crud->description}}</textarea>
  </div>
  <div class="col-md-3">
    <label for="qty" class="form-label">Quantity</label>
    <input type="number" class="form-control" id="qty" name="qty" value="{{$crud->qty}}">
  </div>
  <div class="col-md-3">
    <label for="unit-price" class="form-label">Unit Price</label>
    <input type="number" class="form-control no-spinner" id="unit-price" name="unit_price" value="{{$crud->unit_price}}">
    </div>
  <div class="col-md-4">
    <label for="total-price" class="form-label">Total Price <span style="color: red;">*</span> </label>
    <input type="number" class="form-control no-spinner" id="total-price" name="total_price" value="{{$crud->total_price}}" required>
  </div>
  <div class="col-12 d-flex justify-content-center">
    <button type="submit" class="btn btn-primary custom-button">Update</button>
  </div>
  
</form>  
  
</body>
</html>