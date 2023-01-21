@extends('Components.main')
@section('content')

    <body id="detail-page">
        <section class="travel-detail">
            <div class="detail-container">
                @foreach ($tour as $t)
                    <div class="jumbotron-detail bg-image p-5 text-center shadow-1-strong rounded mb-5 text-white">
                        <h1 class="mt-3 h2">{{ $t->name }}</h1>
                        <p>{{ $t->description }}</p>
                    </div>

                    <div class="card mb-8">
                        <div class="row g-0">
                            <div class="col-md-8">
                                <div class="card-body" id="long-card-body">
                                    <h5 class="card-title" id="long-card-title">{{ $t->hotels->name }}</h5>
                                    <p class="card-text" id="long-card-text">
                                        {{ $t->hotels->description }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="{{ $t->hotels->image }}" alt="Trendy Pants and Shoes"
                                    class="img-fluid rounded-start" />
                            </div>
                        </div>
                    </div>
                    <div class="card mb-8">
                        <div class="row g-0">
                            <div class="col-md-8">
                                <div class="card-body" id="long-card-body">
                                    <h5 class="card-title" id="long-card-title">{{ $t->restaurants->name }}</h5>
                                    <p class="card-text" id="long-card-text">
                                        {{ $t->restaurants->description }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="{{ $t->restaurants->image }}" alt="Trendy Pants and Shoes"
                                    class="img-fluid rounded-start" />
                            </div>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @foreach ($t->tourdetails as $detail)
                            <div class="col">
                                <div class="card h-100">
                                    <img src="{{ $detail->image }}" class="card-img-top" alt="Hollywood Sign on The Hill"
                                        id="place-card" />
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $detail->name }}</h5>
                                        <p class="card-text">
                                            {{ $detail->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @auth
                    @if (Auth::user()->role == 'customer')
                        <!-- Button trigger modal -->
                        <!-- Button trigger modal -->
                        <button type="button" class="btn" data-mdb-toggle="modal" data-mdb-target="#exampleModal" id="booking-button">
                            Book Now
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Booking Confirmation</h5>
                                        <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('add-to-cart')}}" method="get">
                                            @csrf
                                        <div class="detail-tour">
                                            <label for="">Tour Pack A</label>
                                            <img src="{{$t->image}}" alt="">

                                        </div>
                                            <div class="form-info">
                                                Number of Ticket
                                            </div>
                                          <div class="quantity">
                                            <label for="">IDR {{$t->price}}/pack</label>
                                            <span id="plus" class="btn" onclick="IncreaseItem()">+</span>
                                            <input type="number" name="quantity" id="quantity" value="1">
                                            <span id="minus" class="btn" onclick="DecreaseItem()">-</span>
                                            <input type="hidden" name="id" value="{{$t->id}}">
                                          </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                                        <button class="btn" id="submit-btn">Save changes</button>
                                    </div>
                                </form>


                                </div>
                            </div>
                        </div>
                    @endif
                @endauth
                @endforeach

            </div>
        </section>
    </body>
@endsection
