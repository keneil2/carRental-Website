<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if ($errors->any())
    {{$errors->first()}}
    @endif
    @if (session()->has("fail"))
          {{session()->get("fail")}}
    @endif
     <form action="{{route("admin.login.post")}}" method="POST">
     @csrf
    <input type="text" placeholder="please Enter Username" name="username">
    <input type="password" name="password" placeholder="please Enter Password">
    <button type="submit">Login</button>
    </form>
</body>
</html>
@php
    echo "hello";
@endphp