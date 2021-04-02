@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Login</h1>
            <form>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="row mt-4">
            <div class="col-6">
                <a href="/auth/facebook"><button type="button" class="btn btn-primary w-100">Login with Facebook</button></a>
            </div>
            <div class="col-6">
                <a href="/auth/google"><button type="button" class="btn btn-danger w-100">Login with Google</button></a>
            </div>
        </div>
    </div>


@endsection
