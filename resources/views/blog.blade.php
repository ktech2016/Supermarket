<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{background-color: red;}
    </style>
</head>
<body>
    <h1>WELCOME TO MY BLOG</h1>
    <a href="{{url('/')}}">Home</a> |
    <a href="{{url('/services')}}">Services</a> |
    <a href="{{url('/blog')}}">Blog</a> |
    <a href="{{route('rate')}}">Contact</a>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum vel, tempora sunt rem ea quibusdam?</p>
</body>
</html>