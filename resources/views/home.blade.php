<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env("App Name")}}</title>
</head>
<body>
  <x-navbar/>
    <h1>HOME PAGE</h1>
    @if (session()->has("userId"))
        {{session()->get("userId")}}
    @endif

    
</body>
</html>