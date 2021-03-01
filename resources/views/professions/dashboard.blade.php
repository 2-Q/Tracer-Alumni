@extends('layouts.base')
    @component('components.navdash')
        
    @endcomponent
<style>
    a {
        background-color: white;
    }
    a:hover {
        background-color: #00C2D9;
    }
</style>
@section('body')
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-3">
            <div class="list-group">
                <a style="text-decoration: none;color:#666" href="/professions/table" class="list-group-item ">My Professions</a>
                <a style="text-decoration: none;color:#666" href="/professions/create" class="list-group-item">Upload a Professions</a>
              </div>
        </div>
        <div class="col-md-9">
            @yield('create')
        </div>
    </div>
</div>


@endsection