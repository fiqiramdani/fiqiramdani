@extends('layout')

@section('content')
<br>
    <form action="/store" method="POST" style="max-width: 500px; margin: auto;">
    <!-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif -->
    <!-- untuk mengirim data ke controller yang nantinya di tampung oleh Request $request -->
    @csrf
        <div class="d-flex flex-column">
            <strong><label style="color: black;">Title</label></strong>
            <input type="text" name="tittle">
            @error('tittle')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-flex flex-column">
            <strong><label style="color: black;">Date</label></strong>
            <input type="date" name="date">
            @error('date')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-flex flex-column" >
            <strong><label style="color: black;">Description</label></strong>
            <textarea name="description" id="" cols="30" rows="10"></textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <button type="submit" class="tombol_login">Kirim</button>
    </form>
@endsection