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

    </style>
</head>
<body style="margin-left:10px; background-color: lightgrey">
<form class="row g-3" method="Post" action="{{route('employee.update',$crud->id)}}">  
@method('PATCH')     
 @csrf     
 <div class="col-md-10">
    <label for="name" class="form-label">Name</label>
    <!-- <input type="text" class="form-control" id="supplier" name="name" value="{{$crud->name}}"> -->
    <select class="form-select" id="name" name="name">
            <option>{{$crud->name}} </option>
            @foreach($products as $product)
            @if ($product->employee)
                    <option value="{{ $product->employee }}">{{ $product->employee }}</option>
            @endif
            @endforeach
    </select>
  </div>

  <div class="col-md-10">
    <label for="date" class="form-label">Date</label>
    <input type="text" class="form-control" id="date" name="date" value="{{$crud->date}}">
  </div>
  <div class="col-md-10">
    <label for="working_hours" class="form-label">Working Hours</label>
    <input type="number" class="form-control" id="working_hours" name="working_hours" value="{{$crud->working_hours}}">
  </div>
  <div class="col-md-10">
    <label for="pay" class="form-label">Pay</label>
    <input type="number" class="form-control no-spinner" id="pay" name="pay" value="{{$crud->pay}}">
  </div>
  <div class="col-12 d-flex justify-content-center">
    <button type="submit" class="btn btn-primary custom-button">Update</button>
  </div>
  
</form>  
  
</body>
</html>