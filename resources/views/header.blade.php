<!DOCTYPE html>
<html lang="en">
<?php
  use App\Models\Country;
  $countries = Country::with('tours')->has('tours')->get();
?>

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Third navbar example">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav me-auto mb-2 mb-sm-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Adventour</a>
          </li>

        <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle show" href="#" data-bs-toggle="dropdown" aria-expanded="false">Countries</a>
            <ul class="dropdown-menu show" data-bs-popper="static">
            <?php
                foreach($countries as $country):
            ?>
            <li><a class="dropdown-item" href="/country/{{$country->id}}">{{$country->name}}</a></li>
            <?php
                endforeach
            ?>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link active" href="/travelpack">Package</a>
        </li>

        <li class="nav-item">
            <a class="nav-link active" href="/about">About</a>
          </li>

        <li class="nav-item">
            <a class="nav-link active" href="/contact">Contact</a>
        </li>

        @auth
        @if(Auth::check() == true)
          @if(Auth::user()->role == 'admin')
          <li class="nav-item">
            <a class="nav-link active" href="/adminhome">Admin</a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link active" href="/profile">Profile</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" href="/cart">Cart</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" href="/history">History</a>
          </li>
        @endif

        @else
        <li class="nav-item">
            <a class="nav-link active" href="/login">Login</a>
          </li>
        <li class="nav-item">
            <a class="nav-link active" href="/register">Register</a>
        </li>
        @endif
        </ul>

      </div>
    </div>
  </nav>


</body>
</html>
