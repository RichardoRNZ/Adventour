@extends('Components.main')
@section('content')
    <!-- Jumbotron -->
   <section class="travel-pack">
    <div class="travel-container">
        @foreach ($country as $Country)

        <div class="jumbotron-country bg-image p-5 text-center shadow-1-strong rounded mb-5 text-white">


                <h1 class="mt-3 h2 text-uppercase">{{$Country->name}}</h1>
            </div>
            <div class="row">
                @foreach ($Country->tours as $tour)


                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="product-card" style="width: 18rem;">
                        <img class="card-img-top" src="{{$tour->image}}" alt="Card image cap">
                        <div class="card-body">
                            <div class="product-title">
                                <h4>{{$tour->name}}</h4>
                            </div>
                            <h5 class="product-price">IDR. {{$tour->price}}</h5>

                            <div class="detail-button">
                                <a href="{{route('tour.detail',$tour->id)}}">Detail Product</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endforeach
            </div>
            {{-- <div class="pagination">
                {{ $tours->links() }}
            </div> --}}
    </div>
   </section>
    <!-- Jumbotron -->
@endsection
