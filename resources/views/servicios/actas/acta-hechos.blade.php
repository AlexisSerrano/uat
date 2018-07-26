@extends('template.form')

@section('title', 'Actas de hechos')
@section('content')
<div class="row no-gutters">
    <div class="col-12">
        <div class="boxtwo">
            <div class="row">
                <div id="app" class="col-12">
                    <registro :sistema="'uat'" :tipo="'actashechos'" usuario="{{Auth::user()->id}}"></registro>
                </div>
            </div>
            <div class="text-right col">
                @if (isset($acta->statusCola))
                <a href="{{route('devolver',$acta->id)}}" title="" class="btn btn-secondary">Devolver turno</a>
                @else
                <a href="{{route('actaspendientes')}}" title="" class="btn btn-secondary">Regresar</a>
                @endif
            </div>   
        </div>
    </div>
</div>
	
@endsection