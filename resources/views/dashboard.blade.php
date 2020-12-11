@extends('layouts.app')

@section('title')Профиль пользователя {{ \Illuminate\Support\Facades\Auth::user()->name }}@endsection
