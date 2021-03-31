@extends('layouts.app')

@section('content')
    <form action="{{ route('register') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('auth.Name') }}</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required autofocus>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('auth.Email') }}</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="{{ old('email') }}" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('auth.Password') }}</label>
            <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password">
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">{{ __('auth.Confirm Password') }}</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>
        <div class="mb-3">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('auth.Already registered?') }}
            </a>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('auth.Register') }}</button>
    </form>
@endsection

