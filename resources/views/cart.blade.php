@include('header')
<html>
<head>
<h3>My Cart</h3>
</head>

<?php $total = 0; ?>

<body>
<div class="row row-cols-4 row-cols-md-5 g-4">
@foreach($cart as $c => $item)
<div class="col">
    <div class="card" style="width: 100%; height: 100%;">
      <img src="{{Storage::url($item['image'])}}" class="card-img-top" height="150px" width="150px" alt="Card image cap">
      <div class="card-body d-flex flex-column">
      <h5 class="card-title">{{$item['name']}}</h5>
      <p class="card-text">Quantity: {{$item['quantity']}}</p>

    <?php $subtotal = $item['subtotal'] ?>
    <?php $total += $subtotal; ?>

      <p class="card-text">Total Price: IDR {{ $subtotal }}</p>

    <form action="{{route('delete-item')}}" method="GET">
        @csrf
        <input type="hidden" name="id" value="{{$c}}">
    <button class="btn btn-danger">Remove</button>
    </form>
      </div>
    </div>
  </div>
  @endforeach
  <br>
  <div class="card-footer">
    <p class="card-text">Total Price: IDR {{ $total }}</p>
  </div>
</div>

<?php
  use Carbon\Carbon;
  $currentTime = Carbon::now()->format('Y-m-d H:i:s');
?>
<form action="/transaction" method="POST" enctype="multipart/form-data">
@csrf
<input type="hidden" class="user_id" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
<input type="hidden" name="currenttime" id="currenttime" value="{{ $currentTime }}">
<button class="btn btn-primary">Purchase</button>
</form>

</body>

</html>
