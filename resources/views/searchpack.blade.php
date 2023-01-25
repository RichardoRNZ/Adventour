@php
    use App\Http\Controllers\MainController;
    use Illuminate\Support\Str;

@endphp
@extends('Components.main')
@section('content')
    <!-- Jumbotron -->
    <section class="travel-pack">
        <div class="travel-container">
            <div class="jumbotron bg-image p-5 text-center shadow-1-strong rounded mb-5 text-white">
                <h1 class="mt-3 h2">Travel Arround The World With Adventour</h1>
            </div>
            <div class="row">
                <div class="result">
                    <h3>Search result for : {{ $search }}</h3>
                </div>
                @foreach ($tours as $tour)
                    @php
                        $image = MainController::imageAdapter($tour->image);
                    @endphp

                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card" style="width: 18rem;">
                            @if (Str::contains($image, 'storage/'))
                                <img class="card-img-top" src="{{ asset($image) }}">
                            @else
                                <img class="card-img-top" src="{{ $tour->image }}" alt="Card image cap">
                            @endif
                            <div class="card-body">
                                <div class="product-title">
                                    <h4>{{ $tour->name }}</h4>
                                </div>
                                <h5 class="product-price">IDR. {{ $tour->price }}</h5>

                                <div class="detail-button">
                                    <a href="{{ route('tour.detail', $tour->id) }}">Detail Product</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="pagination">
                {{ $tours->links() }}
            </div>
        </div>
    </section>
    <!-- Jumbotron -->
@endsection
