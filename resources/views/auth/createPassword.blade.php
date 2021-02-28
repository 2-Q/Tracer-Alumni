<div id="coverPassword">
	<div class="text-center mb-5">
        <h5>Kata Sandi</h5>
        <div class="px-4">Buatlah Kata Sandi Yang Mudah Anda Ingat</div>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input id="password" type="password" class="form-control" placeholder="Password">
        <small class="notif">Kata Sandi minimal memilik 8 karakter</small>
        <br>
        <label for="confirmPassword" class="mt-3">Confirm Password</label>
        <input id="confirmPassword" type="password" class="form-control" placeholder="Confirm Password">
        <div id="notifPassword"></div>
    </div>
    <div class=" pb-5 mt-4">
        <div onclick="submitPassword()" style="cursor: pointer;" class="btn px-4 btn-primary float-right">
            Next
        </div>
    </div>
</div>
<!-- <div id="coverToken" style="display: none;">
	<div class="text-center mb-5">
        <h5>Masukkan Token</h5>
        <div class="px-4">Masukkan Token Yang Telah DI Berikan Oleh pihak SMKN 1 JENPO kepada Anda</div>
    </div>
    <div class="form-group">
        <label for="token">Token</label>
        <input id="token" type="text" class="form-control" placeholder="Token">
        <div id="notifToken"></div>
    </div>
    <div class=" pb-5 mt-4">
        <div onclick="submitToken()" style="cursor: pointer;" class="btn px-4 btn-primary float-right">
            Submit
        </div>
    </div>
</div> -->


    <script>
    	// function submitPassword() {
    		// password=$("#password").val();
    		// confirmPassword=$("#confirmPassword").val();
    		// if (password.length > 7 && password == confirmPassword) {
    		// 	$("#coverPassword").hide();
    		// 	$("#coverToken").show();
    		// }else{
    		// 	$("#notifPassword").html("<small><strong class='text-danger'>*Password Tidak Valid</strong></small>");          
    		// }
    	// }
    	// function submitToken() {
     //            $.ajax({
     //                url: "{{Route('register')}}",
     //                type: "POST",
     //                data:{
     //                  password: password,
     //                  token:$("#token").val(),
     //                  _token:'{{csrf_token()}}',
     //                  _method: 'PATCH',
     //                },
     //                success:function(response) {
     //                    if (response) {
     //                        location.href="{{Route('register')}}"
     //                    }else{
    	// 		$("#notifToken").html("<small><strong class='text-danger'>*Password Tidak Valid</strong></small>");
			  //           }
     //                }
     //            })
    	// }


        function submitPassword() {
            password=$("#password").val();
            confirmPassword=$("#confirmPassword").val();
            if (password.length > 7 && password == confirmPassword) {
                $.ajax({
                    url: "{{Route('register')}}",
                    type: "POST",
                    data:{
                      password: password,
                      _token:'{{csrf_token()}}',
                      _method: 'PATCH',
                    },
                    success:function(response) {
                        if (response) {
                            location.href="{{Route('register')}}"
                        }else{
                $("#notifToken").html("<small><strong class='text-danger'>*Password Tidak Valid</strong></small>");
                        }
                    }
                })
            }else{
             $("#notifPassword").html("<small><strong class='text-danger'>*Password Tidak Valid</strong></small>");          
            }
        }
    </script>