@extends('layout')

@section('content')
<div class="kotak_login">
		<p class="tulisan_login"><strong>Sign In</strong></p>
 
		<form action= "{{ route('login') }}" method="POST">
			<label>Username</label>
			<input type="text" name="username" class="form_login" placeholder="Username atau email ..">
 
			<label>Password</label>
			<input type="text" name="password" class="form_login" placeholder="Password ..">
 
			<input type="submit" class="tombol_login" value="LOGIN">
			<a href="register">don't have an account yet, sign up here !</a>
		</form>
		
	</div> 
@endsection