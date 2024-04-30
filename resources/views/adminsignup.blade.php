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
    <form action="" method="POST">
        @csrf
        <input type="text" name="username" placeholder="please enter your Username">
        <input type="password" name="password" placeholder="please enter your Password">
        <input type="password" name="password_confirmation" placeholder="please retpye your password">
        <button type="submit">signup</button>
    </form>
</body>
</html>