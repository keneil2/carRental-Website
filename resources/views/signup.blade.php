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

  

   <div class="signupForm">
   
   <form action="" method="POST">
   <h1>Create an account</h1>
   @if($errors->any())
   <div class="error">
     <p class="ErrorMessage"> {{$errors->first()}}</p>
   </div>
   @endif
 
 @csrf
 <label for="Username">Username</label><br>   <input type="text" name="Username" placeholder="Enter Your Username" value="{{old("Username")}}"><br>
  <label for="Email">Email</label><br>  <input type="Email" name="Email" placeholder="Enter Your Email" value="{{old("Emial")}}"><br>
  <label for="Pwd">Password</label> <br> <input type="password" name="Pwd" placeholder="Enter Your Username" value="{{old("Pwd")}}"><br>
  <p>want to host jobs?<a href="/adminSignup"> signup here</a></p>
    <button>Signup up</button>
 </form>
 </div> 
 <div class="hero"> 
   <div>
    <h2><b>Connecting Talent with Opportunity: Your Path to Success Starts Here</b></h2>
    <p>
" 
Find your dream job, explore new horizons, and take the next step in your professional journey with us. 
Whether you're a seasoned professional or just starting out, we're here to help you discover, apply, and succeed in the job market. 
Join us today and let's build your future together!"</p>
   </div>
</div>
   

</body>
</html>