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
      	Pengaturan Profile
      </h3>
    </div>
    <div class="py-3">
      <div class="justify-content-center d-flex pb-1">
        <img src="{{ asset('images/').'/'.$user->avatar }}" class="img-circle elevation-2" style="width: 90px;">
      </div>
      <div class="text-center text-primary" data-toggle="modal" data-target="#modal-default" style="cursor: pointer;">Ganti Foto Profile</div>
    </div>



    <form role="form" method="post" action="{{route('profileEdit')}}">
    	@csrf
      <div class="card-body">
        <div class="form-group">
          <label for="about">Profesi</label>
          <div class="row">
            <div class="col-md-6">
              <select class="form-control" name="profession" required>
                <option>Profesi</option>
                <option value="Melanjutakan Belajar" {{$user['Profession']['profession']=='Melanjutakan Belajar' ? 'selected' : ''}}>Ke Jenjang Lanjutan</option>
                <option value="Menjadi Wirausaha" {{$user['Profession']['profession']=='Menjadi Wirausaha' ? 'selected' : ''}}>Wirausaha</option>
                <option value="Bekerja" {{$user['Profession']['profession']=='Bekerja' ? 'selected' : ''}}>Pegawai (Negeri/Swasta)</option>
              </select>
            </div>
            <div class="col-md-6">
              <input type="text" name="lokasi" placeholder="Tempat Bekerja" class="form-control" value="{{$user->Profession->lokasi}}" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="description">Deskripsi</label>
          <textarea name="deskripsi" class="form-control" id="description" placeholder="Deskripsi">{{$user->Siswa->deskripsi}}</textarea>
        </div>
        <div class="form-group">
          <label for="link">Link Terkait</label>
          <input name="link" type="text" class="form-control" id="link" placeholder="Link Informasi Lebih Lanjut Tentang Anda" value="{{$user->Siswa->link}}">
        </div>
      </div>

      <div class="card-footer d-flex" style="align-items: center;">
        <div>
          <a href="{{route('profile')}}">Cancel</a>
          <button type="submit" class="ml-2 btn btn-primary">Submit</button>
        </div>
        <div class="ml-auto">
          <a href="{{Route('profilePassword')}}" style="font-size: 14px; text-decoration: underline;"> <i class="fas fa-key"></i>Ganti Password</a>
        </div>
      </div>
    </form>
  </div>
      </div>
  </div>
</div>
@endsection

@section('js')

      <div id="modal-default" class="modal hide fade in" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pilih Foto Profile</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
<div class="text-center">
  <img  style="width: 300px;"  id='output'><br><br>
  <div>Pilih foto dari Perangkat Anda</div>
  <label for="img" class="border px-2 py-1 bg-light">klik di sini</label>
</div>


<script>
  var readURL= function(event) {
    var input = event.target;
    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('output');
      output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
  };
</script>


            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <form method="post" action="{{Route('profileEdit')}}"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type='file' id="img" accept='image/*' onchange='readURL(event)' style="display: none;" name="gambar">
                <button type="submit" class="btn btn-primary">Save changes</button>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
@endsection
