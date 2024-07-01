<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .error-container {
            background-color: #ffdddd;
            color: #d8000c;
            padding: 20px;
            border: 1px solid #d8000c;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 400px;
            margin: auto;
            animation: shake 0.5s;
        }
        .error-container h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .error-container p {
            font-size: 18px;
            margin: 0;
        }
        @keyframes shake {
            0% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            50% { transform: translateX(5px); }
            75% { transform: translateX(-5px); }
            100% { transform: translateX(0); }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <h1>Error</h1>
        <p>{{ $message }}</p>
    </div>
</body>
</html>
