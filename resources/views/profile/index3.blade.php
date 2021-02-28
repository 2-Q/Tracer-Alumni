@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
	<div class="card card-widget widget-user">
	  <div class="widget-user-header bg-info">
	    <h3 style=" font-weight: 300; margin-bottom: 0px;">{{$user->Siswa->name}}</h3>
	    <h5>{{$user->Siswa->jurusan}} Angkatan {{$user->Siswa->angkatan}}</h5>
	  </div>
	  <div class="widget-user-image">
	    <img class="img-circle elevation-2" src="{{ asset('images/').'/'.$user->avatar }}" alt="User Avatar">
	  </div>
	  <div class="card-body">
	  	<div class="text-center"><a href="{{Route('profileEdit')}}">settings profil</a></div>
	  	<div><i class="fas fa-crown text-warning"></i> 0</div>
	    <h6 class="m-0 my-2">{{$user->Siswa->melanjutkan}}</h6>
    	<div>{{$user->Siswa->deskripsi}}</div>
    	<a href="http://{{$user->Siswa->link}}">{{$user->Siswa->link}}</a>
	  </div>
	</div>
		</div>
	</div>
</div>
@endsection

@section('css')
<style>
	.card{
		box-shadow: none;
		border: 1px solid #dee2e6;
	}
	.widget-user .card-body {
		padding-top: 40px;
	}
</style>
@endsection
