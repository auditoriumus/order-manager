@extends('layouts.app')

@section('content')
    <form action="{{ route('password.email') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('auth.Email') }}</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <p>{{ __('auth.No problem') }}</p>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('auth.Email Password Reset Link') }}</button>
    </form>
@endsection

