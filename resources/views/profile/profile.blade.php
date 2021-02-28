@extends('layouts.app')

@section('content')
<div class="container-fluid mt-3">
    <div class="row justify-content-center">
        <div class="col-md-5">
			<div class="card card-widget widget-user">
			  <div class="widget-user-header text-white">
			    <!-- <h3 class="widget-user-username text-right">{{$user->Siswa->name}}</h3> -->
			    <h5 class="widget-user-desc text-right">
			    	<a href="{{Route('profileEdit')}}"><i class="fas fa-edit text-white"></i></a>
			    </h5>
			  </div>
			  <div class="widget-user-image">
			    <img class="img-circle elevation-2" src="{{ asset('images/').'/'.$user->avatar }}" alt="User Avatar">
			  </div>
			  <div class="card-body">
			  	<div class="text-center">
			  		<h3 class="mb-0">{{$user->Siswa->name}}</h3>
					<h5 style="font-weight: 400;">{{$user->Siswa->jurusan}} angkatan {{$user->Siswa->angkatan}}</h5>
			  	</div>
			  </div>
			</div>
			<div class="card">
			  <div class="card-header">
			  	<div class="card-title">About Me</div>
			  </div>
			  <div class="card-body">
			  	<b><i class="fas fa-user"></i> {{$user->Profession->profession}}</b>
		    	<div>{{$user->Siswa->deskripsi}}</div>
		    	<a href="http://{{$user->Siswa->link}}">{{$user->Siswa->link}}</a>
			  </div>
			</div>
		</div>
		<div class="col-md-7">
			<div class="card" style="box-shadow: none;">
				<div class="card-header p-2">
					<ul class="nav nav-pills">
					  <li class="nav-item"><a class="nav-link active" href="#Profesi" data-toggle="tab">Profesi</a></li>
					  <li class="nav-item"><a class="nav-link" href="#Prestasi" data-toggle="tab">Prestasi</a></li>
					  <li class="nav-item"><a class="nav-link" href="#Pengalaman" data-toggle="tab">Pengalaman</a></li>
					</ul>
				</div>
				<div class="card-body">
                  <div class="tab-content">
<div class="tab-pane active" id="Profesi">
    <div class="timeline timeline-inverse">
    	<div class="time-label">
        	<i class="far fa-clock bg-primary" style="position: inherit;"></i>
	    </div>
	    @foreach($user->ProfessionTrash as $profession)
      <div>
        <span class="date bg-purple">
          {{$profession->created_at->format('d-m-Y')}}
        </span>
        <div class="timeline-item">
          <h3 class="timeline-header">{{$user->Siswa->name}} has Changed Job</h3>
          <div class="timeline-body">
          	{{$user->Siswa->name}} mulai {{$profession->profession}} di {{$profession->lokasi}}
          </div>
        </div>
      </div>
      @endforeach
      <div>
        <i class="far fa-clock bg-gray"></i>
      </div>
    </div>
</div>

<div class="tab-pane" id="Prestasi">
	@forelse($user->Achievement as $prestasi)
		<div class="callout callout-danger">
	      <h6><i class="fas fa-user"></i> {{$prestasi->rank}}</h6>
	      <div>{{$prestasi->title}} tingkat {{$prestasi->tingkat}} Tahun {{$prestasi->tahun}}</div>
			<form method="post" action="{{route('profile')}}" class="d-inline-flex">
			  @csrf
			  @method('delete')
			  <input type="hidden" name="id" value="{{$prestasi->id}}">
			  <button type="submit" class="text-danger bg-transparent p-0" style="border: none;">delete</button>
			</form>
	    </div>
	@empty
		<h4 class="text-secondary text-center my-4">Tidak Ada Prestasi</h4>
	@endforelse
	<div style="cursor: pointer;" class="text-center" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus"></i></div>

	<div class="modal fade" id="modal-default">
		<div class="modal-dialog">
		  <div class="modal-content">
		  	<form method="post" action="{{Route('profile')}}">
		  		@csrf
		    <div class="modal-header">
		      <h4 class="modal-title">Tambah Prestasi</h4>
		      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		        <span aria-hidden="true">&times;</span>
		      </button>
		    </div>
		    <div class="modal-body">
		      <div class="form-group">
                <label for="lomba">Nama Lomba</label>
                <input type="text" name="title" class="form-control" id="lomba" required>
              </div>
		      <div class="form-group">
                <label for="Tingkat">Tingkat</label>
                <select name="tingkat" class="form-control" id="Tingkat">
                	<option value="Kecamatan">Kecamatan</option>
                	<option value="Kabupaten">Kabupaten</option>
                	<option value="Provinsi">Provinsi</option>
                	<option value="Nasional">Nasional</option>
                	<option value="Internasional">Internasional</option>
                </select>
              </div>
		      <div class="form-group">
                <label for="Peringkat">Peringkat</label>
                <select name="rank" class="form-control" id="Tingkat">
                	<option value="Peserta">Peserta</option>
                	<option value="Juara 3">Juara 3</option>
                	<option value="Juara 2">Juara 2</option>
                	<option value="Juara 1">Juara 1</option>
                </select>
              </div>
		      <div class="form-group">
                <label for="Tahun">Tahun di Selenggarakan</label>
                <select name="tahun" class="form-control" id="Tahun">
                	@for($i=date('Y'); $i > 1995; $i--)
                	<option value="{{$i}}">{{$i}}</option>
                	@endfor
                </select>
              </div>
		    </div>
		    <div class="modal-footer justify-content-between">
		      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      <button type="submit" class="btn btn-primary">Save changes</button>
		    </div>
		    </form>
		  </div>
		  <!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
</div>

<div class="tab-pane" id="Pengalaman">
	@forelse($user->Pengalaman as $pengalaman)
		<div class="callout callout-success">
	      <h6>Sebagai {{$pengalaman->sebagai}} di Acara {{$pengalaman->title}} Pada Tahun {{$pengalaman->tahun}}</h6>
	      <div>{{$pengalaman->keterangan}}</div>
			<form method="post" action="{{route('profile')}}" class="d-inline-flex">
			  @csrf
			  @method('PATCH')
			  <input type="hidden" name="id" value="{{$pengalaman->id}}">
			  <button type="submit" class="text-danger bg-transparent p-0" style="border: none;">delete</button>
			</form>
	    </div>
	@empty
		<h4 class="text-secondary text-center my-4">Tidak Ada Pengalaman</h4>
	@endforelse
	<div style="cursor: pointer;" class="text-center" data-toggle="modal" data-target="#modal-pengalaman"><i class="fas fa-plus"></i></div>

	<div class="modal fade" id="modal-pengalaman">
		<div class="modal-dialog">
		  <div class="modal-content">
		  	<form method="post" action="{{Route('profile')}}">
		  		@csrf
		  		@method('PUT')
		    <div class="modal-header">
		      <h4 class="modal-title">Tambah Prestasi</h4>
		      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		        <span aria-hidden="true">&times;</span>
		      </button>
		    </div>
		    <div class="modal-body">
		      <div class="form-group">
                <label for="lomba">Nama Kegiatan</label>
                <input type="text" name="title" class="form-control" id="lomba" required>
              </div>
		      <div class="form-group">
                <label for="Penyelenggara">Penyelenggara</label>
                <input type="text" name="penyelenggara" class="form-control" id="Penyelenggara" required>
              </div>
		      <div class="form-group">
                <label for="sebagai">Peran</label>
                <input name="sebagai" type="text" name="title" class="form-control" id="sebagai" required>
              </div>
		      <div class="form-group">
                <label for="Tahun">Tahun di Selenggarakan</label>
                <select name="tahun" class="form-control" id="Tahun">
                	@for($i=date('Y'); $i > 1995; $i--)
                	<option value="{{$i}}">{{$i}}</option>
                	@endfor
                </select>
              </div>
		      <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" name="title" class="form-control" id="keterangan"></textarea>
              </div>
		    </div>
		    <div class="modal-footer justify-content-between">
		      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      <button type="submit" class="btn btn-primary">Save changes</button>
		    </div>
		    </form>
		  </div>
		  <!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
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
<style>
	.widget-user .card-body {
		padding-top: 48px;
	}
	.timeline div .timeline-item{
		margin-left: 120px;
		margin-right: 0;
		border: none;
		box-shadow: 7px 7px 3px rgb(0 0 0 / 7%);
	}
	.timeline div{
		margin-right: 0;
	}
	.timeline div .date{
		position: absolute;
		top: 5px;
		padding: 2px 4px;
		border-radius: 4px;
		font-size: 13px;
		font-weight: 700;
	}
	.timeline div .timeline-item::before {
		content: '\f0d9';
	    font-family: 'Font Awesome 5 Free';
	    font-weight: 1000;
	    font-size: 66px;
	    position: absolute;
	    left: -23px;
	    top: -30px;
	    color: #f8f9fa;
	}
	.widget-user-header{
		background: url("{{asset('plugins/images/photo1.png')}}") center center;
	}
	.card-header{
		padding: 0.5rem 1.25rem;
	}
</style>
@endsection
