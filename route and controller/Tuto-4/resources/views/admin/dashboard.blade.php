@extends('layouts.app')

@section('title', 'Login')

@section('content')
@include('partials.flash-message')
<div class="container mt-5">
    <h1>Welcome to the Dashboard</h1>
    <a href="/logout" class="btn btn-danger mt-3">Logout</a>
</div>
@endsection