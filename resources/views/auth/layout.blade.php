<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="{{asset('images/Logo-KainKu.png')}}" type="">
<link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
  <title>Kainku</title>
  <style>
    body {
        background-image: url({{asset('images/batikBG.jpeg')}});
        background-size: cover;
        font-family: Arial, sans-serif;
        display: flex;
    }

    .login-container {
      max-width: 400px;
      margin: auto;
      padding: 40px;
      justify-content: center;
    align-items: center;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      position: absolute;
      top: 50%;
        left: 50%;
    transform: translate(-50%, -50%);
    }

    .login-container h1 {
      text-align: center;
      margin-bottom: 30px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .form-group .submit-btn {
      width: 100%;
      padding: 10px;
      background-color: #4caf50;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .form-group .submit-btn:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>

@yield('content')

</body>
</html>
