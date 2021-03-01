@extends('professions.dashboard')
@section('create')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6"><H2>My Vacancies</H2></div>
                <div class="col-md-6"><h2>{{ $count }}</h2></div>
            </div>
        </div>
    </div>
@endsection