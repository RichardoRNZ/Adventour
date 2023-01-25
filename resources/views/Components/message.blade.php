@if ($message = Session::get('success'))
    <script>
        alert('{{ $message }}');
    </script>
@endif
