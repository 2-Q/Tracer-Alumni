@extends('layouts.base')

@section('body')
    @component('components.navbar')
    @endcomponent
    <div class="mt-4">
        @yield('content')
    </div>
@endsection