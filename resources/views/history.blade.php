@include('header')
<html>
<head>
<h3>Transaction History</h3>
</head>

<?php 
$total = 0; 
$totalqty = 0; 
use App\Models\Transaction;
?>

<body>
<div class="card">
@foreach($items as $item)
<?php
    $details = Transaction::join('transactionheaders', 'transactions.transactionheader_id', '=', 'transactionheaders.id')->where('transactions.transactionheader_id', '=', $item->id)->get();
?>
<h3>{{$item->transaction_timestamp}}</h3>
<div class="card-body">
<table class="table">
<thead>
    <tr>
      <th>Name</th>
      <th>Quantity</th>
      <th>Sub Price</th>
    </tr>
  </thead>

  <tbody>
  
  @foreach($details as $detail)
  <?php 
  $subtotal = $detail->price*$detail->quantity; ?>
  <tr>
  <td> {{$detail->tours->name}} </td>
  <td> {{$detail->quantity}} </td>
  <td> IDR {{$subtotal}} </td>
  </tr>

  <?php
    $totalqty += $detail->quantity;
    $total += $subtotal; 
  ?>
    @endforeach
  <tr>
  <td><h6>Total</h6></td>
  <td><h6>{{$totalqty}} Item(s)</h6></td>
  <td><h6>IDR {{$total}}</h6></td>
  </tr>
  </tbody>

</table>

</div>
@endforeach
</div>

</body>

</html>