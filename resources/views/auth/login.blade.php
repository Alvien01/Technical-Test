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
            <div class="input-group">
                <input type="password" name="password" id="password" class="form-control" required>
                <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                    👁
                </button>
            </div>
        </div>

        <button class="btn btn-primary mt-3">Login</button>
    </form>
</div>
@push('scripts')
<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordInput = document.getElementById('password');
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.textContent = type === 'password' ? '👁' : '🙈';
    });
</script>
@endpush
@endsection
