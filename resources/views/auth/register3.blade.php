@extends('layouts.app')

@section('content')
<div class="vertical-align-wrap">
	<div class="vertical-align-middle">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body px-4" id="load">
                    <div class="mt-4 mb-5 text-center" style="font-size: 25px; font-weight: 300;">Buat Akun</div>
                    <div id="myCover">
                        <div class="mb-4 px-4">
                            <!-- <h5 class="m-0">Masukkan NISN Anda</h5> -->
                            <div>Silakan Masukkan NISN dan Tahun Kelulusan Anda untuk melanjutkan Proses Registrasi</div>
                        </div>
<div class="row justify-content-center">
	<div class="col-md-10">
                        <div class="my-2">
                            <!-- <label for="nisn">NISN</label> -->
                            <input id="nisn" placeholder="NISN" type="number" class="form-control">
                            <!-- <small class="text-danger">Ini Notif</small> -->
                            <div id="notifNISN">
                            	<br>
                            </div>
                        </div>
                        <div class="my-2">
                            <!-- <label for="tahunLulus">Tahun Lulus</label> -->
                            <input placeholder="Tahun Lulus" id="tahunLulus" type="number" class="form-control">
                            <div id="notifTahunLulus">
                            	<br>
                            </div>
                        </div>
                        <div class="pb-5 px-5">
                            <div onclick="submitNISN()" style="cursor: pointer;" class="btn btn-primary btn-block">
                                Next
                            </div>
                        </div>
	</div>
</div>
                    </div>           
                </div>
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
    #myCover{
    	padding-top: 1rem;
    }
</style>
@endsection
@section('js')
<script>
    function submitNISN() {
    	nisn = $('#nisn').val();
    	tahunLulus = $('#tahunLulus').val();
    	aku=false;
		$("#notifTahunLulus").html('<br>');
		$("#notifNISN").html('<br>');
        switch (true) {
			case nisn == '':
				$("#notifNISN").html('<small class="text-danger">Data Tidak Boleh Kosong</small>');
				break;
			case tahunLulus == '':
				$("#notifTahunLulus").html('<small class="text-danger">Data Tidak Boleh Kosong</small>');
				break;	
			default:
				aku=true;
				break;
		}
		    if (aku) {	    	
                $.ajax({
                    url: "{{Route('register')}}",
                    type: "POST",
                    data:{
                      nisn: nisn,
                      tahunLulus: tahunLulus,
                      _token:'{{csrf_token()}}',
                      _method: 'PUT',
                    },
                    success:function(response) {
                        if (response) {
                            // $("#myCover").html(response);
                            console.log(response)
                        }else{
                            console.log(response)
							$("#notifTahunLulus").html('<small class="text-danger">Data Tidak Valid</small>');
                        }
                    }
                })
            }
    }
</script>
@endsection