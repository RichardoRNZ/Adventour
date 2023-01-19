@include('header')

<?php
use App\Models\Tour;
$t = Tour::where('tours.country_id', '=', $country->id)->get();
?>

<div class="center1">
<div class="text1">
    <h3>{{$country->name}}</h3>
</div> 

<div class="text2"> 
<div class="row row-cols-4 row-cols-md-5 g-4">
@foreach($t as $tour)
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
</div>

</div>

</body>
</html>