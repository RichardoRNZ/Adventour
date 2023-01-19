@include('header')
<html>
<head>
<h1>Register</h1>
</head>

<body>
<form action="/registeruser" method="POST" enctype="multipart/form-data">
@csrf

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>

<button class="btn btn-primary">Register</button>
</form>

<div class="error-msg">
@if($errors->any())
    <strong>{{$errors->first()}}</strong>
@endif
</div>

</body>
</html>