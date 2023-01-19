@include('header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Packages</title>
</head>
<body>

<form action="/searchpack" class="col-5">
<div class="d-flex">
<input type="search" class="form-control" name="search" id="search" placeholder="Package Name">
<button class="btn btn-primary" type="submit">Search</button>
</div>
</form>

<div class="row row-cols-4 row-cols-md-5 g-4">
@foreach($tours as $tour)
<div class="col">  
    <div class="card" style="width: 100%; height: 100%;">
      <img src="{{Storage::url($tour->image)}}" class="card-img-top" height="150px" width="150px" alt="Card image cap">
      <div class="card-body d-flex flex-column">
      <h5 class="card-title">{{$tour->name}}</h5>
      <p class="card-text">{{$tour->description}}</p>
      
      <a href="{{route('tour.detail',$tour->id)}}" class="btn btn-primary mt-auto">Detail</a>
        
      </div>
    </div>
  </div>
@endforeach
</div>
</body>
</html>