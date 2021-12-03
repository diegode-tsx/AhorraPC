<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            font-family: sans-serif;;
        }

        h1{
            font-family: sans-serif;
            color: #E71D36;
        }

        .token{
            padding: 10px 25px;
            border: 2px solid #E71D36;
            border-radius: 10px;
        }
   </style>
</head>
<body>
    <h1>Correo electronico para restaurar la contraseña</h1>
    <h2>Este es tu codigo de reestablecimiento.</h2>
    <strong class="token">{{$token}}</strong>
</body>
</html>