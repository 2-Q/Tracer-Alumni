
@extends('layouts.app')
@section('title', 'Lowongan - Bursa Kerja Khusus STMJ')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <img style="max-width: 600px; max-height: 600px"  src="{{ asset('Storage/'.$professions->thumbnail) }}"  alt="...">
                            <table class="table table-sm mt-4">
                                <tr>
                                  <th scope="col">Nama Pekerjaan </th>
                                  <td> : {{ $professions->name }}</td>
                                </tr>
                                <tr>
                                  <th scope="col">Nama Perusahaan</th>
                                  <td> : {{ $professions->company }}</td>
                                </tr>
                                <tr>
                                  <th scope="col">Persyaratan</th>
                                  <td> : {{ $professions->requirtmen }}</td>
                                </tr>
                                <tr>
                                  <th scope="col">Deskripsi</th>
                                  <td> : {{ $professions->about }}</td>
                                </tr>
                                <tr>
                                  <th scope="col">Hubungi</th>
                                  <td> : {{ $professions->contactperson }}</td>
                                </tr>
                            </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <ul class="list-group">
                <li class="list-group-item active" aria-current="true">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li>
              </ul>
        </div>
    </div>
    
</div>
@endsection