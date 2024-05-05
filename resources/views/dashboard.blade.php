<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/') }}">
    <title>DashBoard</title>
</head>

<body>
    <nav>
        <h1>admin Tools</h1>
        <div>
            <li><a href="#">Dashboard</a></li>
            <li> <a href="#">edit Profile</a></li>
            <li><a href="#">Manage Jobs</a></li>
            <li><a href="#">Manage Jobs</a></li>
            <li><a href="#">Candidates</a></li>
            <li><a href="#">Change Password</a></li>
        </div>
        <div class="insights">
            <li><a href="">Inbox</a></li>
            <li><a href="">Notifications</a></li>
            <li><a href="">username</a></li>
        </div>
    </nav>
    <section>
        <h1>WELCOME TO THE DASHBOARD USERNAME</h1>
    </section>
   <form action="{{route("logout")}}" method="POST">
   @csrf
   <button>Logout</button>
   </form>
</body>

</html>
