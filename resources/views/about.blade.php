<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management System</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Full height of viewport */
            margin: 0;
            background-color: #f8f9fa; /* Light grey background */
        }
        .footer {
            height: 100px;
            line-height: 100px;
            background-color: #343a40; /* Dark grey footer */
            color: white;
            text-align: center;
        }
        .navbar-custom {
            background-color: #6f42c1; /* Purple navbar */
        }
        .info-section {
            padding: 50px 0;
            text-align: center;
            width: 100%;
            flex: 1; /* Take remaining vertical space */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .info-content {
            background-color: #303f9f; /* Dark blue background */
            color: white;
            padding: 20px;
            border-radius: 10px;
            max-width: 800px; /* Optional: Adjust max-width as needed */
            width: 100%;
            margin: 20px; /* Optional: Adjust margin as needed */
            text-align: justify; /* Optional: Justify text */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand text-white" href="/">Inventory Management</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="/">Home <span class="sr-only">(current)</span></a>
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

    <div class="info-section">
        <h1>About Dixy</h1>
        <div class="info-content">
            <h2>At Dixy, we have something to stimulate every taste bud! We are known for our variety and the healthy options on our menu. As well as serving juicy, tender, crispy coated chicken using our unique blend of spices, our menu also offers grilled chicken, a variety of fresh salads, desserts, and other side dishes. At head office the company employs expert chefs to create and test its recipes, ensuring that the Dixy menu is the best it can possibly be.</h2>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <span class="text-muted">© 2024 Inventory Management System</span>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
