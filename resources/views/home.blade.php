<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    @include("layouts.nav")
    <h1>HOME PAGE</h1>
    @if (session()->has("userId"))
        {{session()->get("userId")}}
    @endif
</body>
</html>