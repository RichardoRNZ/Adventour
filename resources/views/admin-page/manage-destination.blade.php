@extends('Components.main')
@section('content')
    <section class="manage-hotels">
        @include('Components.sidebar')
        <div class="col-md-12" id="admin-content">
            <h3><i class="fa-solid fa-map-location"></i> Manage Tour Destination</h3>
        </div>
        <div class="col-md-12" id="admin-content">
            <button type="button" class="btn" data-mdb-toggle="modal" data-mdb-target="#exampleModal2">
                Add Tour Destination
            </button>
        </div>
        <div class="col-md-12" id="admin-content">
            <div class="item-table">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Destination ID</th>
                            <th scope="col">Destination Name</th>
                            <th scope="col">Destination Description</th>
                            <th colspan="2" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($destination as $item)
                            @php
                                $tour = $item->tours->name;
                                $pack_id = $item->tour_id;
                            @endphp
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td><a id="edit-destination" data-id="{{ $item->id }}" data-name="{{ $item->name }}"
                                        data-description="{{ $item->description }}" data-mdb-toggle="tooltip" title="Edit Destination"><i
                                            class="fas fa-edit bg-success p-2 text-white rounded"></i></a></td>
                                <td>
                                    <form action="{{ route('delete-destination') }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <button style="background: none; border:none;" data-mdb-toggle="tooltip" title="Delete Destination"><i
                                                class="fas fa-trash-alt bg-danger p-2 text-white rounded"></i></button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade " id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Tour Destination</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('add-destination') }}" method="POST" enctype="multipart/form-data"
                            class="modal-form">
                            @csrf
                            <input type="hidden" name="tour_id" value="{{ $pack_id }}">
                            <div class="form-outline">
                                <input type="text" id="form12" class="form-control" value="{{ $tour }}"
                                    disabled />
                                <label class="form-label" for="form12">Tour Pack</label>
                            </div>
                            <div class="form-outline">
                                <input type="text" id="form12" class="form-control" name="name" required />
                                <label class="form-label" for="form12">Place Name</label>
                            </div>
                            <div class="form-outline">
                                <textarea class="form-control" id="textAreaExample" rows="4" name="description" required></textarea>
                                <label class="form-label" for="textAreaExample">Place Description</label>
                            </div>
                            <label for="image" class="file-label">Image File Upload</label>
                            <input type="file" name="image" id="" required>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button class="btn btn-primary">Add Destination</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade " id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Tour Destination</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('edit-destination') }}" method="POST" enctype="multipart/form-data"
                            class="modal-form">
                            @csrf
                            <input type="hidden" name="id" id="destination_Id">
                            <input type="hidden" name="tour_id" value="{{ $pack_id }}">
                            <div class="form-outline">
                                <input type="text" id="form12" class="form-control" value="{{ $tour }}"
                                    disabled />
                                <label class="form-label" for="form12">Tour Pack</label>
                            </div>
                            <div class="form-outline">
                                <input type="text" id="name" class="form-control" name="name" required />
                                <label class="form-label" for="form12">Place Name</label>
                            </div>
                            <div class="form-outline">
                                <textarea class="form-control" id="description" rows="4" name="description" required></textarea>
                                <label class="form-label" for="textAreaExample">Place Description</label>
                            </div>
                            <label for="image" class="file-label">Image File Upload</label>
                            <input type="file" name="image" id=""required>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button class="btn btn-primary">Save Changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
