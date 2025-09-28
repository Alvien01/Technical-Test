@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Login</h2>
    <form method="POST" action="{{ route('login.post') }}">
        @csrf
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required autofocus>
        </div>
        <div class="form-group mt-2">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-primary mt-3">Login</button>
    </form>
</div>
@endsection