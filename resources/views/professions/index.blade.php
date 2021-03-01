@extends('layouts.app')
@section('title', 'Lowongan - Bursa Kerja Khusus STMJ')
@section('content')
<div class="container">
<div class="row">
    {{-- left --}}
    <div class="col-md-9">
      {{--  <h2 class="mb-4 border-bottom">Semua Pekerjaan</h2>  --}}
      @forelse ($professions as $pr)

        <div class="card mb-3" style="max-width: 1000px; ">
            <div class="row g-0">
              <div class="col-md-4">
                <img style="max-width: 253px;max-height:253px;" src="{{ asset('Storage/'.$pr->thumbnail) }}"  alt="...">
              </div>
              <div class="col-md-7">
                <div class="card-body">
                  <a href="/professions/{{ $pr->slug }}"><h4 style="background-color: white;" class="card-title">{{ $pr->name }}</h4></a>
                  <p class="card-text">{{ Str::limit($pr->about, 100) }}</p>
                  <p class="card-text"><small class="text-muted">Last updated {{ $pr ->created_at->diffForHumans() }}</small></p>
                  <div class="text-secondary">
                    Publish by {{ $pr->author->name }}
                </div>
                </div>
              </div>
              <div class="col-md-1">
                {{-- OPTIONS --}}
                <div class="dropdown">
                  <a class="btn btn-sm " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i>
                  </a>
                
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      @if(auth()->user()->is($pr->author))
                      <a class="dropdown-item" href="/professions/{{ $pr->slug }}/edit">Edit Post</a>
                      @endif
                    <a class="dropdown-item" href="#">Copy Link</a>
                    <a class="dropdown-item" href="#">Share</a>
                    <a style="color: red" class="dropdown-item" href="#">Report</a>
                  </div>
                </div>
                {{-- ENDOPTIONS --}}
              </div>
            </div>
          </div>
          @empty
          <div class="col-7">
              <div class="alert alert-info ">
                  Saat ini belum ada lowongan pekerjaan
              </div>
          </div>
      @endforelse
      <div class="row">
        <div class="col-sm">
        </div>
        <div class="col-sm">
            {{ $professions->links() }}
        </div>
        <div class="col-sm">
        </div>
      </div>
    </div>
    {{-- endleft --}}
    {{-- right --}}
    <div class="col-md-3">
        <ul class="list-group">
            <li class="list-group-item active" aria-current="true">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Morbi leo risus</li>
            <li class="list-group-item">Porta ac consectetur ac</li>
            <li class="list-group-item">Vestibulum at eros</li>
          </ul>
    </div>
    {{-- endright --}}
</div>
</div>
     
@endsection