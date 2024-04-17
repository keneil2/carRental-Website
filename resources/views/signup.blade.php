<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset("css/signup.css")}}">
    <title>Document</title>
</head>
<body>
   <div class="container">
   @if($errors->any())
   <div class="error" >
     <p class="ErrorMessage"> {{$errors->first()}}</p>
   </div>
   @endif
   <div class="signupForm">

 <form action="" method="POST">
   <h1>Sign Up </h1>
 @csrf
 <label for="Username">Username</label>   <input type="text" name="Username" placeholder="Enter Your Username"><br>
  <label for="Email">Email</label>  <input type="Email" name="Email" placeholder="Enter Your Email"><br>
  <label for="Pwd">Password</label>  <input type="password" name="Pwd" placeholder="Enter Your Username"><br>
    <button>Signup up</button>
 </form>
 </div> 
 <div class="booking"> 
   <div></div>
   <h2><b>Book a car></b></h2>
<p>Down the street or across the country, 
   find the perfect vehicle for your next
    adventure.</p>
    <img class="car_key" src="{{asset("images/open-hand.png")}}" >
</div>
 <div class="host">
 <img class="car_document" src="{{asset("images/car-key.png")}}" alt="car key">
 <h2><b>Book a car></b></h2>
<p>Down the street or across the country, 
   find the perfect vehicle for your next
    adventure.</p>
 
 </div>
 </div>

</body>
</html>