@extends('Components.main')
@section('content')
<section class="transaction-history">
    <div class="card" id="history-menu">
        <div class="card-header">My Order</div>
        <div class="card-body">
            <div class="row g-2">

                <div class="col-md-2">
                    <form action="{{route('filter')}}" method="GET">
                  <div class="form-floating">

                    <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example" name="filter">
                        <option value="transaction_date">Transaction Date</option>
                        <option value="booking_date">Ticket Date</option>
                    </select>
                      <label for="floatingSelectGrid">Filter</label>
                  </div>
                </div>
                <div class="col-md-2">

                  <div class="form-floating">
                    <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example" name="sort">
                      <option value="desc">Newest to Oldest</option>
                      <option value="asc">Oldest to Newest</option>

                    </select>
                    <label for="floatingSelectGrid">Sort</label>
                  </div>
                </div>
                <div class="col-md-2">
                    <button class="btn" id="apply">Apply</button>
                    <a href="{{route('history')}}" class="btn"  id="reset">Reset</a>
                </div>
            </form>
              </div>
        </div>
      </div>
      @foreach ($items as $item)
      <div class="card" id="ticket-detail">
        <div class="card-body">
          <h5 class="card-title">Booking Code : {{$item->transactions->booking_code}}</h5>
            @foreach ($item->getTour as $tour)
            <h5 id="Package-name">{{$tour->name}}</h5>
            @endforeach
          <h6>{{$item->quantity}} Ticket(s) | Valid On {{$item->transactions->booking_date}}</h6>
          <h6>Transaction Date : {{$item->transaction_date}}</h6>
          <h6>Total Paid : IDR. {{$item->price}}</h6>


        </div>
      </div>
      @endforeach
</section>
@endsection
