@if ($message = Session::get('success'))
    <script>
        alert('{{ $message }}');
    </script>
@endif
@error('name')
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{ $message }}</strong>
    </div>
@enderror
@error('email')
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{ $message }}</strong>
    </div>
@enderror
@error('password')
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{ $message }}</strong>
    </div>
@enderror
