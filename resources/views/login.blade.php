<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset("css/login.css")}}">
    <title>Login page</title>
</head>
<body>
<div>
@if($errors->any())
   <div class="error" >
     <p class="ErrorMessage"> {{$errors->first()}}</p>
   </div>
   @endif
    <form action="{{route("login")}}" method="POST">
    @csrf 
      <p> @if(Session::has("fail"))
        {{Session::get("fail")}}
        @endif

        @if(Session::has("success"))
        {{Session::get("success")}}
        @endif
      </p>
        <input type="text" placehoder="please Enter Your Email" name="email" value="{{old("email")}}">
        <input type="password" placeholder="please Enter your Password" name="password" value="{{old("password")}}">
        <button>Sign In</button>
    </form>
    </div>
</body>
</html>