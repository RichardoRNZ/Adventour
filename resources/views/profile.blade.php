@include('header')
<html>
<head>
</head>

<body>
<h3>Profile</h3>

@auth
<div class="text1">
Name <br>
{{Auth::user()->name}} <br>

<br> Email <br>
{{Auth::user()->email}} <br>

<form action="/logout" method="get">
            <input type="submit" value="Logout">
</form>
@else
<p>Login first</p>
@endif

</body>

</html>