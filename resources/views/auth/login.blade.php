@extends('layouts.welcome')

@section('content')
<main class="login-form my-5">
    <div class="cotainer">
        <div class="row justify-content-center p-3">
            <div class="col-md-4">
                <div class="card shadow-box">
                    <h3 class="card-header text-center bg-body txt-shadow fw-bold">Login</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login.custom') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email" class="form-control" name="email" required
                                    autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>

                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Signin</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                For successful login, you need:
                <ul>
                    <li>Fill in all the information</li>
                    <li>Enter the correct information</li>
                    <li>
Select remember if you don't want to log in again next time</li>
                </ul>
                Wish you have the best web experience !
            </div>
        </div>
    </div>
</main>
@endsection