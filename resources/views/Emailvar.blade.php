<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email verification </title>
</head>
<body>
    <form action="{{route("Emailvar.post")}}" method="POST">
    @if (session()->has("fail"))
        {{session()->get("fail")}}
    @endif
    @csrf
    please Enter the Verification code you got in your email :
<input type="text" name="code" placeholder="Please enter var code">
<button type="submit">send code</button>
@if(session()->has("username"))
    {{session()->get("username")}}
    {{session()->get("varCode")}}
@endif

</form>
</body>
</html>