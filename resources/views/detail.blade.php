@extends('Components.main')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Detail Package</title>
</head>
<body>

<?php
use App\Models\Tourdetail;
$tourdetails = Tourdetail::where('tour_id', '=', $tour->id)->get();
?>

<div class = "text2">
<img class="img-top" src="{{Storage::url($tour->image)}}" height="350px" width="350px">
<h3>{{$tour->name}}</h3>
<p>Description: {{$tour->description}}</p>
<p>Price: Rp {{$tour->price}}</p>

<div class="hotel">
<img class="img-top" src="{{Storage::url($tour->hotels->image)}}" height="350px" width="350px">
<h3>{{$tour->hotels->name}}</h3>
<p>City: {{$tour->hotels->city}}</p>
<p>Description: {{$tour->hotels->description}}</p>
</div>

<div class="restaurant">
<img class="img-top" src="{{Storage::url($tour->restaurants->image)}}" height="350px" width="350px">
<h3>{{$tour->restaurants->name}}</h3>
<p>City: {{$tour->restaurants->city}}</p>
<p>Description: {{$tour->restaurants->description}}</p>
</div>

<h3>Places to Visit</h3>

<div class="row row-cols-4 row-cols-md-5 g-4">
@foreach($tourdetails as $tourdetail)
<div class="col">
    <div class="card" style="width: 100%; height: 100%;">
      <img src="{{Storage::url($tourdetail->image)}}" class="card-img-top" height="150px" width="150px" alt="Card image cap">
      <div class="card-body d-flex flex-column">
      <h5 class="card-title">{{$tourdetail->name}}</h5>
      <p class="card-text">{{$tourdetail->description}}</p>

      </div>
    </div>
  </div>
@endforeach
</div>


@auth
@if(Auth::check() == true)
<form action="/cartadd" method="POST" enctype="multipart/form-data">
@csrf
<input type="hidden" class="user_id" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
<input type="hidden" class="tour_id" name="tour_id" id="tour_id" value="{{ $tour->id }}">
<div class="form-group">
              <label for="quantity">Quantity</label>
              <input type="number" class="form-control" name="quantity" id="quantity">
</div>
    <button class="btn btn-primary">Book Now</button>
</form>

<div class="error-msg">
@if($errors->any())
    <strong>{{$errors->first()}}</strong>
@endif
</div>

@endif
@else
<br>
@endif
</div>

</body>
</html>
@endsection
