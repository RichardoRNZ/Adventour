@extends('Components.main')
@section('content')
    <section class="banner">
        @if (empty($cart) || count($cart) == 0)
            <h1>Ticket Is Empty! Lets Go Shopping :)</h1>
        @else
            <div class="card-container">
                <div class="card-content">
                    <h3>Booking Form</h3>
                    <form action="{{ route('transaction') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <input type="date" name="date" id="">
                            <input type="" name="phone" id="" placeholder="Phone Number">
                        </div>
                        <div class="form-row">
                            <select name="gender" id="">
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                            </select>
                            <input type="text" name="name" id="" placeholder="Name"
                                value="{{ Auth::user()->name }}">
                        </div>
                        <div class="form-row">
                            <input type="email" name="" id="" placeholder="Email"
                                value="{{ Auth::user()->email }}">
                        </div>
                        <div class="form-row">
                            <button>BOOK</button>
                        </div>
                    </form>

                </div>
                <div class="detail-transaction">
                    <h3>Booking Detail</h3>
                    @foreach ($cart as $c => $item)
                        <div class="package-detail">
                            <img src="{{ asset($item['image']) }}" alt="">
                            <h6>{{ $item['name'] }}</h6>
                        </div>
                        <div class="tour-detail">
                            <h6>{{ $item['name'] }} Ticket</h6>
                        </div>
                        <div class="ticket-quantity">
                            <h6>{{ $item['quantity'] }} Ticket</h6>

                            <h6>{{ $item['quantity'] }} Person</h6>
                        </div>
                        <div class="total-price">
                            <h4 id="title-total">Total Price</h4>
                            <h4 id="total-price">{{ $item['subtotal'] }}</h4>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </section>

@endsection
