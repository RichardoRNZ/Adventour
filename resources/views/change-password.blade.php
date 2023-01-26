@extends('Components.main')
@section('content')
    <div class="editprof1">
        <div class="editprof3">
            <p>Change Password</p>
        </div>

        <form action="{{ route('change-password') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="editprof2">
                <div class="form-outline">
                    <input type="password" id="form12" class="form-control" name="old_password" />
                    <label class="form-label" for="form12">Old Password</label>
                </div>
                <div class="form-outline">
                    <input type="password" id="form12" class="form-control" name="new_password" />
                    <label class="form-label" for="form12">New Password</label>
                </div>

                <div class="form-outline">
                    <input type="password" id="form12" class="form-control" name="confirm_password" />
                    <label class="form-label" for="form12">Confirm Password</label>
                </div>
                <br>
                <button class="btn">Submit</button>
            </div>

        </form>
    </div>
@endsection
