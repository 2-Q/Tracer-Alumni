@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">
        <a href="{{route('profile')}}">
        	<i class="fas fa-arrow-left text-dark mr-1"></i>
        </a>
      	Ganti Password
      </h3>
    </div>
      <div class="card-body">
      	<div id="skin1">
			<div style="min-height: 220px;">
				<div class="form-group">
		          <label for="new">New Password</label>
		          <input name="password" type="text" class="form-control" id="new" placeholder="New Password">
		          <small class="text-secondary"><i class="fas fa-exclamation-triangle"></i> Password minimal 8 karakter</small>
		        </div>
		        <div class="form-group">
		          <label for="confirm">Confirm Password</label>
		          <input type="text" class="form-control" id="confirm" placeholder="Confirm Password">
		        </div>
		        <div class="notif-danger">Sandi Tidak Valid</div>
			</div>
			<button class="btn btn-primary float-right" id="next">Next</button>
      	</div>
		<div id="skin2">
			<div style="min-height: 220px;">
		        <div class="form-group">
		          <label for="old">Old Password</label>
		          <input type="text" class="form-control" id="old" placeholder="Your Old Password">
		        </div>
		        <div class="notif-danger">Sandi Tidak Valid</div>
			</div>
			<div id="back" class="text-primary float-left" style="cursor: pointer; padding: 0.375rem 0.75rem;">Back</div>
	      	<button class="btn btn-primary float-right" id="submit">Submit</button>
		</div>
	  </div>
  </div>
  		</div>
  	</div>
</div>
@endsection

@section('js')
<script>
	
$(document).ready(function () {
	$("#next").click(function() {
		newPass = $("#new").val();
		if (newPass.length > 7 && newPass == $("#confirm").val()) {
			$('.notif-danger').hide();
			$("#skin1").hide();
			$("#skin2").show();
		}else{
			$('.notif-danger').fadeIn();
		}
	});
	$("#back").click(function() {
		$("#skin2").hide();
		$("#skin1").show();
	});
	$("#submit").click(function() {
		if ($("#old").val() != '') {
			old = $("#old").val();
			$.ajax({
		        url: "{{Route('profilePassword')}}",
		        type: "POST",
		        data:{
		          newPass: newPass,
		          oldPass: old,
		          _token:'{{csrf_token()}}'
		        },
		        success:function(response) {
		        	if (response) {
		        		location.href="{{Route('profile')}}"
		        	}else{
		        		console.log(response)
		        		$('.notif-danger').fadeIn();
		        	}
		        }
	      	})
		}else{
			$('.notif-danger').fadeIn();
		}
	});

})
</script>
@endsection

@section('css')
<style>
	.notif-danger{
		display: none;
	    padding: .2rem 0;
	    margin: .5rem ;
	    background-color: #dc35453b;
	    color: #ff0018;
	    text-align: center;
	}
	#skin2{
		display: none;
	}
</style>
@endsection