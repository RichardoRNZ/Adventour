@php
    use App\Http\Controllers\MainController;
    $countries = MainController::getCountries();
@endphp
@extends('Components.main')
@section('content')
<section class="manage-hotels">
    @include('Components.sidebar')
    <div class="col-md-12" id="admin-content">
        <h3><i class="fas fa-utensils"></i> Manage Restaurant</h3>
    </div>
    <div class="col-md-12" id="admin-content">
        <button type="button" class="btn" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
            Add Restaurant Patners
        </button>
    </div>
    <div class="col-md-12" id="admin-content">
        <div class="item-table">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Restaurant ID</th>
                        <th scope="col">Restaurant Name</th>
                        <th scope="col">Country Name</th>
                        <th scope="col">City</th>
                        <th scope="col">Description</th>
                        <th colspan="2" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($restaurants as $restaurant)


                        <tr>
                            <th scope="row">{{$restaurant->id}}</th>
                            <td>{{$restaurant->name}}</td>
                            <td>{{$restaurant->countries->name}}</td>
                            <td>{{$restaurant->city}}</td>
                            <td>{{$restaurant->description}}</td>
                            <td><a id="edit-restaurant" data-id="{{ $restaurant->id }}" data-name="{{ $restaurant->name }}" data-country="{{$restaurant->country_id}}"
                                data-description="{{ $restaurant->description }}" data-city="{{$restaurant->city}}"><i class="fas fa-edit bg-success p-2 text-white rounded"></i></a></td>
                            <td>
                                <form action="{{route('delete-restaurant')}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id" value="{{$restaurant->id}}">
                                    <button  style="background: none; border:none;"><i
                                            class="fas fa-trash-alt bg-danger p-2 text-white rounded"></i></button>
                                </form>
                            </td>

                        </tr>
                        @endforeach

                </tbody>
            </table>
        </div>
    </div>
    {{-- end content --}}
    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Tour Pack Info</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('add-restaurant')}}" method="POST" enctype="multipart/form-data"
                        class="modal-form">
                        @csrf

                            <div class="form-floating" id="without-group">

                                <select class="form-select" id="floatingSelectGrid"
                                    aria-label="Floating label select example" name="country_id">
                                    <option disabled selected></option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelectGrid">Country Name</label>
                            </div>


                        <div class="form-outline">
                            <input type="text" id="form12" class="form-control" name="restaurant_name" />
                            <label class="form-label" for="form12">restaurant Name</label>
                        </div>
                        <div class="form-outline">
                            <input type="text" id="form12" class="form-control" name="restaurant_city" />
                            <label class="form-label" for="form12">City</label>
                        </div>
                        <div class="form-outline">
                            <textarea class="form-control" id="textAreaExample" rows="4" name="restaurant_description"></textarea>
                            <label class="form-label" for="textAreaExample">restaurant Description</label>
                        </div>
                        <label for="image" class="file-label">Image File Upload</label>
                        <input type="file" name="image" id="">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Add restaurant</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade " id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Restaurant Info</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('edit-restaurant')}}" method="POST" enctype="multipart/form-data"
                        class="modal-form">
                        @csrf
                            <input type="hidden" name="id" id="hotel_Id">
                            <div class="form-floating" id="without-group">

                                <select class="form-select"
                                    aria-label="Floating label select example" name="country_id" id="country">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelectGrid">Country Name</label>
                            </div>


                        <div class="form-outline">
                            <input type="text" id="name" class="form-control" name="restaurant_name" />
                            <label class="form-label" for="form12">Restaurant Name</label>
                        </div>
                        <div class="form-outline">
                            <input type="text" id="city" class="form-control" name="restaurant_city" />
                            <label class="form-label" for="form12">City</label>
                        </div>
                        <div class="form-outline">
                            <textarea class="form-control" id="description" rows="4" name="restaurant_description"></textarea>
                            <label class="form-label" for="textAreaExample">Restaurant Description</label>
                        </div>
                        <label for="image" class="file-label">Image File Upload</label>
                        <input type="file" name="image" id="">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Add Pack</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>

<script>
$(document).on("click", "#edit-restaurant", function() {
    let id = $(this).data('id');

    let name = $(this).data('name');
    let city = $(this).data('city');
    let country = $(this).data('country');
    let description = $(this).data('description');

    $("#city").val(city);
    $("#hotel_Id").val(id);
    $("#name").val(name);
    $("#country").val(country);
    $('#description').val(description);
    $('#editModal').modal('show');



})
</script>
@endsection
