<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset("css/login.css")}}">
    <title>Login page</title>
</head>
<body>
<div class="loginform">
 @if($errors->any())
   <div class="error" >
     <p class="ErrorMessage"> {{$errors->first()}}</p>
   </div>
   @endif 


    <form action="{{route("login")}}" method="POST">
    @csrf 
<!--      
        @if ($errors->any())
        <p>  {{$errors->first()}}</p>
        @endif -->

        @if (session()->has("fail"))
        
            <p class="ErrorMessage">{{session()->get("fail")}}</p>
         @endif

      <label for="email">Email</label><br>
        <input type="text" placeholder="please Enter Your Email" name="email" value="{{old("email")}}"><br>
        <label for="password">Password</label>
        <input type="password" placeholder="please Enter your Password" name="password" value="{{old("password")}}"><br>
        <p>admin?<a href="/adminLogin"> click here</a></p>
        <button>Sign In</button>
    </form>
    </div>
    <div class="hero"> 
   <div>
    <h2><b>Connecting Talent with Opportunity: Your Path to Success Starts Here</b></h2>
    <p>
"Find your dream job, explore new horizons, and take the next step in your professional journey with us. 
Whether you're a seasoned professional or just starting out, we're here to help you discover, apply, and succeed in the job market. 
Join us today and let's build your future together!"</p>
   </div>
  </div>
</body>
</html>