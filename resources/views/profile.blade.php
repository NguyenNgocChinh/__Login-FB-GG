@extends('layout')

@section('content')

    <div class="card" style="min-width: 50rem">
        <div class="card-header">
            Information User
        </div>
        <div class="card-body">
            <img src="{{\Illuminate\Support\Facades\Auth::user()->avatar_origin}}" class="rounded-circle my-4">
            <h5 class="card-title">{{\Illuminate\Support\Facades\Auth::user()->name}}</h5>
            <p class="card-text">Email: {{\Illuminate\Support\Facades\Auth::user()->email}}</p>
            <a href="/logout" class="btn btn-warning">Logout</a>
        </div>
    </div>

@endsection
