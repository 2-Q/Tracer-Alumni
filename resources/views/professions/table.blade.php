@extends('professions.dashboard')
@section('title', 'Dashboard')
@section('create')
<table class="table">
  <thead>
    <tr>
      {{--  <th scope="col">No</th>  --}}
      <th scope="col">Thumbnail</th>
      <th scope="col">Nama Pekerjaan</th>
      <th scope="col">Nama Perusahaan</th>
      <th scope="col">Options</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($professions as $index => $pr)
    @if(auth()->user()->is($pr->author))
    
    <tr>
      
      {{--  <th scope="row">{{ $professions->count() * ($professions->currentPage() - 1) + $loop->iteration}}</th>  --}}
      <td><img src="{{ asset('Storage/'.$pr->thumbnail) }}" alt="" width="70"></td>
      <td>{{ $pr->name }}</td>
      <td>{{ $pr->company }}</td>
      <td>
        <a href="/professions/{{ $pr->slug }}/edit"><button class="btn btn-success"><i class="fas fa-edit"></i></button></a>
        <a href="/professions/{{ $pr->slug }}/detail"><button class="btn btn-primary"><i class="fas fa-info"></i></button></a>
        
        <button hidden>{{--  <a href="/professions/{{ $pr->slug }}/delete"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a>  --}}
        <form action="/professions/{{ $pr->slug }}/delete" method="post">
          @csrf
          @method("delete")
          <button class="btn btn-danger" onclick="return confirm('APAKAH YAKIN?')" class="btn btn-link dropdown-item " type="submit"><i class="fas fa-trash"></i></button>
        </form>
      </button>
      </td>
    </tr>
    @endif
    @empty
          <div class="col-7">
              <div class="alert alert-info ">
                  Saat ini belum ada lowongan pekerjaan
              </div>
          </div>
          
    @endforelse
  </tbody>
</table>
@if(auth()->user()->is($pr->author))
<div class="row">
  <div class="col"></div>
  <div class="col">{{ $professions->links() }}</div>
  <div class="col"></div>
</div>
@endif
@endsection