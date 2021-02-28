@extends('layouts.app')

@section('content')
<div class="vertical-align-wrap">
    <div class="vertical-align-middle">
<div class="container">
    <div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card card-primary">
			  <div class="card-header">
			    <h3 class="card-title">Form Pendataan Alumni</h3>
			  </div>
			  <form role="form" method="post">
			  	@csrf
			    <div class="card-body">
			      <div class="form-group">
			        <label for="name">Nama Lengkap</label>
			        <input required name="name" type="text" class="form-control" id="name">
			      </div>
<!-- 			      <div class="row">
			      	<div class="col-md-7">
			      		<div class="form-group">
							<label for="TL">Tanggal Lahir</label>
							<input required name="TL" type="date" class="form-control" id="TL">
						</div>
			      	</div>
			      	<div class="col-md-5 pl-5">
			      	  <div class="form-group">
			            <label>Jenis Kelamin</label>
			            <div class="">
			            	<div class="form-check">
			                  <input required class="form-check-input" type="radio" value="L" name="kelamin">
			                  <label class="form-check-label">Laki-laki</label>
			                </div>
			                <div class="form-check">
			                  <input required class="form-check-input" type="radio" value="P" name="kelamin">
			                  <label class="form-check-label">Perempuan</label>
			                </div>
			            </div>
			          </div>
			      	</div>
			      </div> -->
			      <div class="form-group">
			        <label for="NISN">NISN</label>
			        <input required name="nisn" type="number" class="form-control" id="NISN">
			      </div>
			      <div class="row">
			      	<div class="col-md-6">
			      	  <div class="form-group">
			            <label for="tahunLulus">Tahun Lulus</label>
			            <input required name="tahunLulus" type="number" min="1945" max="{{date('Y')}}" step="1" class="form-control" id="tahunLulus">
			          </div>
			      	</div>
			      	<div class="col-md-6">
			      	  <div class="form-group">
			            <label>Jurusan</label>
			            <select name="jurusan" class="form-control">
			              <option></option>
			              <option value="RPL">RPL</option>
			              <option value="DPIB">DPIB</option>
			              <option value="OI">OI</option>
			              <option value="EI">EI</option>
			            </select>
			          </div>
			      	</div>
			      </div>                  
			    </div>
			    <div class="card-footer bg-white">
			      <div class="float-left text-secondary" style="font-weight: bold; font-style: italic;">STMJ'55</div>
			      <button type="submit" class=" float-right btn btn-primary mb-2">Submit</button>
			    </div>
			  </form>
			</div>
		</div>
    </div>
</div>
	</div>
</div>
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/login/login.css') }}">
<style>
    body{
        background-image: linear-gradient(to bottom right,#32cafe,#9f78ff);
    }
    .bg-navbar{
        background-color: transparent;
    }
</style>
@endsection
@section('js')

@endsection