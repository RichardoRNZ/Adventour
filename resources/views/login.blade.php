@extends('Components.main')
@section('content')

    <body id="login">
        <div class="container" id="container">
            <div class="form-container register-container">
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <h1>Register</h1>
                    <div class="social-container">
                        <a href="{{ route('google_login') }}"><i class="fab fa-google"></i></a>
                    </div>
                    <input type="text" name="name" id="" placeholder="Username" required>
                    <input type="email" placeholder="Email" name="email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button>Register</button>
                </form>
            </div>
            <div class="form-container login-container">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <h1>Login</h1>
                    <div class="social-container">
                        <a href="{{ route('google_login') }}"><i class="fab fa-google"></i></a>
                    </div>
                    <input type="email" placeholder="Email" name="email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <a href="{{route('change-password')}}">Forgot Password</a>
                    <button>Login</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome Back!</h1>
                        <p>Please login with your account</p>
                        <button class="ghost" id="signIn" onclick="RemoveRightPanel()">Login</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Hello, Friend!</h1>
                        <p>Come and join with us</p>
                        <button class="ghost" id="signUp" onclick="AddRightPanel()">Register</button>
                    </div>
                </div>
            </div>
        </div>

    </body>
@endsection
