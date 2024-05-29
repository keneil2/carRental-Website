<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/') }}">
    <title>DashBoard</title>
</head>

<body>
   <x-navbar></x-navbar>
    <section>
        <h1>WELCOME TO THE DASHBOARD USERNAME</h1>
    </section>
   <form action="{{route("logout")}}" method="POST">
   @csrf
   <button>Logout</button>
   </form>
</body>

</html>
