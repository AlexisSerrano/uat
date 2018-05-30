@php
$barra = getNavCaso();
@endphp
<style>
	.badge-info {
    color: #0a0a0a;
    background-color: #dda61d;
}
</style>
<div class="btn-group col">
	<a href="{{route('new.denunciante')}}" class="{{$barra['denunciante']}} form-control">Denunciante <span class="badge badge-info right">{{$barra['cdenunciante']}}</span></a>
	<a href="{{route('new.denunciado')}}" class="{{$barra['denunciado']}} form-control">Denunciado <span class="badge badge-info right">{{$barra['cdenunciado']}}</span></a>
	<a href="{{route('new.abogado')}}" class="{{$barra['abogado']}} form-control">Abogado <span class="badge badge-info right">{{$barra['cabogado']}}</span></a>
	<a href="{{route('new.autoridad')}}"  class="{{$barra['autoridad']}} form-control">Autoridad <span class="badge badge-info right">{{$barra['cautoridad']}}</span></a>
	<a href="{{route('new.delito')}}" class="{{$barra['delitos']}} form-control">Delitos <span class="badge badge-info right">{{$barra['cdelitos']}}</span></a>
	<a href="{{route('new.acusacion')}}" class="{{$barra['acusaciones']}} form-control">Acusaciones <span class="badge badge-info right">{{$barra['cacusaciones']}}</span></a>
	<a href="{{route('new.defensa')}}"  class="{{$barra['defensa']}} form-control">Defensa <span class="badge badge-info right">{{$barra['cdefensa']}}</span></a>
    <a href="{{route('observaciones')}}" class="{{$barra['hechos']}} form-control">Observaciones </a>
    {{-- <a href="{{route('descripcionHechos')}}" class="{{$barra['hechos']}} form-control">Descripción de hechos {{$barra['chechos']}}</a> --}}
	{{-- <a href="{{url('medidas')}}" class="{{$barra['medidas']}} form-control" <span class="badge badge-info right">>Medidas de protección {{$barra['cmedidas']}}</a> --}}
	@if(session('terminada')==null)
	<a href="{{route('terminar.caso')}}" class="form-control btn btn-secondary">Finalizar</a>
	@else	
	<a href="{{route('salir.caso')}}" class="form-control btn btn-secondary">Salir</a>
	@endif
</div>
 