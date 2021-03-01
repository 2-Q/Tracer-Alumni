@extends('professions.dashboard')
@section('create')
<img  src="{{ asset('Storage/'.$professions->thumbnail) }}" width="600" height="290" alt="...">
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
@endsection