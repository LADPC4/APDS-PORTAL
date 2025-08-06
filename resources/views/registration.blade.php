<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('registercheck') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Enter Your Name"><br>
        <input type="email" name="email" placeholder="Enter Your Email"><br>
        <input type="password" name="password" placeholder="Enter Your Password"><br>
        <input type="submit" name="signup" value="signup"><br>

    </form>
</body>
</html>