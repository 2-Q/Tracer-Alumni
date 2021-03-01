@extends('layouts.base')

@section('body')
    @component('components.navbar')
    @endcomponent
    @component('components.nav')
    @endcomponent
    @component('components.carousel')
    @endcomponent

 

    <div class="mt-4">
        @yield('content')
    </div>
    @component('components.footer')
        
    @endcomponent
@endsection
