@extends('Components.main')
@section('content')
    @php
        $user = Auth::user();
    @endphp
    @auth
        <div class="editprof1">
            <div class="editprof3">
                <p>Profile Settings</p>
            </div>

            <form action="{{ route('edit-profile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="editprof2">
                    <div class="form-outline">
                        <input type="text" id="form12" class="form-control" value="{{ $user->name }}" name="name" />
                        <label class="form-label" for="form12">User Name</label>
                    </div>

                    <div class="form-outline">
                        <input type="email" id="form12" class="form-control" value="{{ $user->email }}" name="email" />
                        <label class="form-label" for="form12">User Email</label>
                    </div>
                    <div class="form-group-editprof">
                        <label for="image">Profile Picture</label>
                        <input type="file" class="form-control" name="image" id="avatar">
                    </div>
                    <br>
                    <button class="btn">Submit</button>
                </div>

            </form>
        </div>
    @else
        <p>login first</p>
        @endif
    @endsection
