@extends('template.main')

@section('css')
    
@endsection

@section('contenido')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            @yield('content')
        </div>
    </div>
</div>

@if(isset($acusaciones))
@else
    @isset($idCarpeta)
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title text-center">@yield('titulo-tabla')</h5>
                    </div>
                    @yield('tabla')
                </div>
            </div>
        </div>
    @endif
@endif


@endsection

@section('pilaScripts')
    <script src="{{asset('js/scriptsform.js')}}"></script>    
    @stack('scripts')
@endsection