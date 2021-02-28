@extends('layouts.app')

@section('content')
<div class="vertical-align-wrap">
	<div class="vertical-align-middle">
		<div class="auth-box ">
			<div class="left">
				<div class="content">
					<div class="mb-5">
						<div class="m-0" style="font-size: 25px; font-weight: 600;">Tracer</div>
						<p>Login to Your Account</p>
					</div>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div>
            <input type="number" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="NISN" required autofocus>
            @error('email')
                <span class="invalid-feedback float-left" role="alert">
                    <strong><i class="fas fa-exclamation-triangle"></i> {{ $message }}</strong>
                </span>
            @else
            	<br>
            @enderror
    </div>
    <div>
            <input type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required>
            @error('password')
                <span class="invalid-feedback float-left" role="alert">
                    <strong><i class="fas fa-exclamation-triangle"></i> {{ $message }}</strong>
                </span>
            @else
            	<br>
            @enderror
    </div><button type="submit" class="btn btn-block btn-primary">Masuk</button>
</form>
				</div>
			</div>
			<div class="right">
				<div class="overlay"></div>
				<div class="content text" >
					<div class="logo">
						<!-- <img src="" alt="logo-kpu" style="height: 90px;"> -->
						<div style="height: 90px; width: 90px; background-color: gray;"></div>
						<div class="ml-3">
							<div style="font-size: 25px; font-weight: 600; height: 30px;">BK SMKN 1 JENPO</div>
							<div>Karena BK itu Mudah dan Menyenangkan</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/login/login.css') }}">
<style>
	body{
        background-image: linear-gradient(to bottom right,#32cafe,#9f78ff);

        /*background-image: linear-gradient(to bottom right, #17a2b8,#32cafe,#9f78ff);*/
    }
    .bg-navbar{
        background-color: transparent;
    }
</style>
@endsection