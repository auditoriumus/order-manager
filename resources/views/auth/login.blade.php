@extends('layouts.app')

@section('content')
<form action="{{ route('login') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">{{ __('auth.Email') }}</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="{{ old('email') }}">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">{{ __('auth.Password') }}</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="remember_me">
        <label class="form-check-label" for="remember_me">{{ __('auth.Remember me') }}</label>
    </div>
    <div class="mb-3">
        @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                {{ __('auth.Forgot your password?') }}
            </a>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">{{ __('auth.Login') }}</button>
</form>
@endsection
