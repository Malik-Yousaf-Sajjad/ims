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

    </style>
</head>
<body style="margin-left:10px; background-color: lightgrey">
<form class="row g-3" method="Post" action="{{route('product.update',$crud->id)}}">  
@method('PATCH')     
 @csrf     
 <div class="col-md-10">
    <label for="product_name" class="form-label">Category Name</label>
    <input type="text" class="form-control" id="product_name" name="product_name" value="{{$crud->product_name}}">
 </div>

 <div class="col-md-10">
    <label for="supplier" class="form-label">Supplier</label>
    <input type="text" class="form-control" id="supplier" name="supplier" value="{{$crud->supplier}}">
 </div>

 <div class="col-md-10">
    <label for="customer" class="form-label">Customer</label>
    <input type="text" class="form-control" id="customer" name="customer" value="{{$crud->customer}}">
 </div>

 <div class="col-md-10">
    <label for="employee" class="form-label">Employee</label>
    <input type="text" class="form-control" id="employee" name="employee" value="{{$crud->employee}}">
 </div>
  <div class="col-md-10">
  <div class="col-12 d-flex justify-content-center">
    <button type="submit" class="btn btn-primary custom-button">Update</button>
  </div>
  
</form>  
  
</body>
</html>