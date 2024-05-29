<link rel="stylesheet" href="{{asset("css/nav.css")}}">
<nav>
    <h3>JOBIO</h3>
    @auth
    <ul>
        <li><a href="">home</a></li>
        <li><a href="#">Jobs</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Page</a></li>
    </ul> 
    @endauth
    @guest
<div class="nav-right"> 

    <a href="{{route("Signup")}}">Register</a>
    <a href="{{route("userlogin")}}">Login</a>

</div>
    @endguest
    
   
</nav>