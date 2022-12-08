@extends('layout')
@section('content')
    @if (Session::get('addTodo'))
        <div class="alert alert-success">
            {{ Session::get('addTodo') }}
        </div>
    @endif 
<br>
<div class="dashboard">
    <h1>Selamat Datang di Halaman Dashboard</h1>
    <div class="wowo">
    <br>
    <h5>Username : {{ auth()->user()->username }}</h5>
    <h5>Email : {{ auth()->user()->email }}</h5>  
    
</div>
</div>


@if(session('isGuest'))
<h2>
    <b>
        <i>
            {{ session('isGuest') }}
        </i>
    </b>
</h2>
@endif
@endsection