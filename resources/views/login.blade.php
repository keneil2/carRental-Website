<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@if($errors->any())
   <div class="error" >
     <p class="ErrorMessage"> {{$errors->first()}}</p>
   </div>
   @endif
    <form action="{{route("loginUser")}}" method="POST">
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
</body>
</html>