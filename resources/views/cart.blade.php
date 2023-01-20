@extends('Components.main')
@section('content')
<section class="banner">
    <div class="card-container">
        <div class="card-content">
            <h3>Booking Form</h3>
            <form action="">
                <div class="form-row">
                    <input type="date" name="" id="">
                    <input type="number" name="" id="" placeholder="Phone Number">
                </div>
                <div class="form-row">
                    <select name="" id="">
                        <option value="">Mr</option>
                        <option value="">Mrs</option>
                    </select>
                    <input type="text" name="" id="" placeholder="Name">
                </div>
                <div class="form-row">
                    <input type="email" name="" id="" placeholder="Email">
                </div>
                <div class="form-row">
                    <button>BOOK</button>
                </div>
            </form>

        </div>
        <div class="detail-transaction">
            <h3>Booking Detail</h3>

        <div class="package-detail">
            <img src="{{asset('asset/images/travel.jpg')}}" alt="">
            <h6>Japan Package</h6>
        </div>
        <div class="tour-detail">
           <h6>Mountain Fuji Trip</h6>
        </div>
        <div class="ticket-quantity">
           <h6>2 Ticket</h6>

           <h6>2 Person</h6>
        </div>
        <div class="total-price">
            <h4 id="title-total">Total Price</h4>
            <h4 id="total-price">1240000</h4>
        </div>
    </div>
    </div>
</section>

@endsection
