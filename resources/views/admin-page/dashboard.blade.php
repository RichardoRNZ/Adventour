@php
    use App\Http\Controllers\AdminController;
    $user = AdminController::countUser();
    $pack = AdminController::countPack();
    $hotel = AdminController::countHotel();
    $restaurant = AdminController::countRestaurant();
    $transaction = AdminController::countTransaction();
    $country = AdminController::countCountry();
@endphp
@extends('Components.main')
@section('content')
    <section class="dashboard">
        @include('Components.sidebar')
        <div class="col-md-12" id="admin-content">
            <h3><i class="fas fa-chart-line"></i> Dashboard</h3>
            <div class="row">
                <div class="card bg-dark ml-1 mt-4 text-white " style="width: 18rem;">

                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-users mr-2"></i>
                        </div>
                        <h5 class="card-title">Users</h5>
                        <div class="display-4">
                            {{$user}}
                        </div>
                        <a href="{{route('customers')}}">
                            <p class="card-text text-white">View Detail</p>
                        </a>

                    </div>
                </div>


                <div class="card bg-dark ml-3 mt-4 text-white " style="width: 18rem;">

                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-briefcase mr-2"></i>
                        </div>
                        <h5 class="card-title">Travel Pack</h5>
                        <div class="display-4">
                            {{$pack}}
                        </div>
                        <a href="{{route('tours')}}">
                            <p class="card-text text-white">View Detail</p>
                        </a>

                    </div>
                </div>
                <div class="card bg-dark ml-3 mt-4 text-white " style="width: 18rem;">

                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-hotel mr-2"></i>
                        </div>
                        <h5 class="card-title">Hotel Patners</h5>
                        <div class="display-4">
                            {{$hotel}}
                        </div>
                        <a href="{{route('hotels')}}">
                            <p class="card-text text-white">View Detail</p>
                        </a>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card bg-dark ml-1 mt-4 text-white " style="width: 18rem;">

                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-utensils mr-2"></i>
                        </div>
                        <h5 class="card-title">Restaurant Patners</h5>
                        <div class="display-4">
                            {{$restaurant}}
                        </div>
                        <a href="{{route('view-restaurant')}}">
                            <p class="card-text text-white">View Detail</p>
                        </a>

                    </div>
                </div>


                <div class="card bg-dark ml-3 mt-4 text-white " style="width: 18rem;">

                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-file-invoice mr-2"></i>
                        </div>
                        <h5 class="card-title">Transactions</h5>
                        <div class="display-4">
                            {{$transaction}}
                        </div>
                        <a href="{{route('view-transactions')}}">
                            <p class="card-text text-white">View Detail</p>
                        </a>

                    </div>
                </div>
                <div class="card bg-dark ml-3 mt-4 text-white " style="width: 18rem;">

                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-globe-asia mr-2"></i>
                        </div>
                        <h5 class="card-title">Countries</h5>
                        <div class="display-4">
                            {{$country}}
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
