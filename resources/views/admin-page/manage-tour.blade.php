@php
    use App\Http\Controllers\MainController;
    $countries = MainController::getCountries();
    $hotels = MainController::getHotel();
    $restaurants = MainController::getRestaurant();
    $tours = MainController::getTourPack();
@endphp
@extends('Components.main')
@section('content')
    <section class="manage-hotels">
        @include('Components.sidebar')
        <div class="col-md-12" id="admin-content">
            <h3><i class="fas fa-briefcase"></i> Manage Tour Pack</h3>
        </div>
        <div class="col-md-12" id="admin-content">
            <button type="button" class="btn" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                Add Tour Pack
            </button>

        </div>

        <div class="col-md-12" id="admin-content">
            <div class="item-table">
                <table class="table" id="datatable">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Tour Pack ID</th>
                            <th scope="col">Tour Pack Name</th>
                            <th scope="col">Country Name</th>
                            <th scope="col">Hotel Patner</th>
                            <th scope="col">Restaurant Patner</th>
                            <th scope="col">Price</th>
                            <th scope="col">Description</th>
                            <th scope="col">Place</th>
                            <th colspan="2" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($packs as $pack)
                            <tr>
                                <th scope="row">{{ $pack->id }}</th>
                                <td>{{ $pack->name }}</td>
                                <td>{{ $pack->countries->name }}</td>
                                <td>{{ $pack->hotels->name }}</td>
                                <td>{{ $pack->restaurants->name }}</td>
                                <td>IDR. {{ $pack->price }}</td>
                                <td>{{ $pack->description }}</td>
                                <td> <a href="{{ route('destination', ['id' => $pack->id]) }}" class="btn">
                                        View Destination

                                    </a></td>

                                <td><a id="edit-tour" data-id="{{ $pack->id }}" data-name="{{ $pack->name }}"
                                        data-country="{{ $pack->country_id }}" data-hotel="{{ $pack->hotel_id }}"
                                        data-restaurant="{{ $pack->restaurant_id }}"
                                        data-description="{{ $pack->description }}" data-price="{{ $pack->price }}"
                                        data-image="{{ $pack->image }}" data-mdb-toggle="tooltip" title="Edit Tour">
                                        <i class="fas fa-edit bg-success p-2 text-white rounded"></i></a></td>
                                <td>
                                    <form action="{{ route('delete-tour') }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="id" value="{{ $pack->id }}">
                                        <button style="background: none; border:none;"><i
                                                class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-mdb-toggle="tooltip" title="Delete Tour"></i></button>
                                    </form>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Tour Pack Info</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('add-pack') }}" method="POST" enctype="multipart/form-data"
                            class="modal-form">
                            @csrf
                            <div class="form-group">
                                <div class="form-floating">

                                    <select class="form-select" id="floatingSelectGrid"
                                        aria-label="Floating label select example" name="country_id" required>
                                        <option disabled selected></option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelectGrid">Country Name</label>
                                </div>
                                <div class="form-floating">

                                    <select class="form-select" id="floatingSelectGrid"
                                        aria-label="Floating label select example" name="hotel_id" required>
                                        <option disabled selected></option>
                                        @foreach ($hotels as $hotel)
                                            <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelectGrid">Hotel Name</label>
                                </div>
                                <div class="form-floating">

                                    <select class="form-select" id="floatingSelectGrid" required
                                        aria-label="Floating label select example" name="restaurant_id">
                                        <option disabled selected></option>
                                        @foreach ($restaurants as $restaurant)
                                            <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelectGrid">Restaurant Name</label>
                                </div>

                            </div>
                            <div class="form-outline">
                                <input type="text" id="form12" class="form-control" name="tour_name" required />
                                <label class="form-label" for="form12">Tour Pack Name</label>
                            </div>
                            <div class="form-outline">
                                <input type="number" id="form12" class="form-control" name="tour_price" required />
                                <label class="form-label" for="form12">Price</label>
                            </div>
                            <div class="form-outline">
                                <textarea class="form-control" id="textAreaExample" rows="4" name="tour_description" required></textarea>
                                <label class="form-label" for="textAreaExample">Tour Pack Description</label>
                            </div>
                            <label for="image" class="file-label">Image File Upload</label>
                            <input type="file" name="image" id="" required>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button class="btn btn-primary">Add Pack</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade " id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Tour Pack Info</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('edit-tour') }}" method="POST" enctype="multipart/form-data"
                            class="modal-form">
                            @csrf

                            <input type="hidden" name="id" id="tour_Id">

                            <div class="form-group">
                                <div class="form-floating">

                                    <select class="form-select" id="floatingSelectGrid"
                                        aria-label="Floating label select example" name="country_id" id="country"
                                        required>

                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelectGrid">Country Name</label>
                                </div>
                                <div class="form-floating">

                                    <select class="form-select" aria-label="Floating label select example"
                                        name="hotel_id" id="hotel" required>
                                        @foreach ($hotels as $hotel)
                                            <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="hotel">Hotel Name</label>
                                </div>
                                <div class="form-floating">

                                    <select class="form-select" aria-label="Floating label select example"
                                        name="restaurant_id" id="restaurant" required>

                                        @foreach ($restaurants as $restaurant)
                                            <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelectGrid">Restaurant Name</label>
                                </div>

                            </div>
                            <div class="form-outline">
                                <input type="text" class="form-control" name="tour_name" id="name" required
                                    value="" />
                                <label class="form-label" for="name">Tour Pack Name</label>
                            </div>
                            <div class="form-outline">
                                <input type="number" class="form-control" name="tour_price" id="price" required />
                                <label class="form-label" for="price">Price</label>
                            </div>
                            <div class="form-outline">
                                <textarea class="form-control" rows="4" name="tour_description" id="description" required></textarea>
                                <label class="form-label" for="description">Tour Pack Description</label>
                            </div>
                            <label for="image" class="file-label">Image File Upload</label>
                            <input type="file" name="image" id="" required>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



@endsection
