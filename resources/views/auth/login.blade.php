@extends('layouts.auth')
@section('content')
    <main class="form-signin w-100 m-auto">
        <form action="{{ route('proseslogin') }}" method="POST">
            @csrf
            <div class="text-center">
                <img class="mb-4" src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" alt=""
                    width="72" height="57">
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
            </div>
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                <label for="floatingInput">Email address</label>
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="rememberme">
                <label class="form-check-label" for="flexCheckDefault">
                    Remember me
                </label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
        </form>
    </main>
@endsection
