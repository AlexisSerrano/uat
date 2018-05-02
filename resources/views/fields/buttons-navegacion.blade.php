@php
$barra = getNavCaso();
@endphp
<div class="btn-group col">
	<a href="{{route('new.denunciante')}}" class="{{$barra['denunciante']}} form-control">Denunciante {{$barra['cdenunciante']}}</a>
	<a href="{{route('new.denunciado')}}" class="{{$barra['denunciado']}} form-control">Denunciado {{$barra['cdenunciado']}}</a>
	<a href="{{route('new.abogado')}}" class="{{$barra['abogado']}} form-control">Abogado {{$barra['cabogado']}}</a>
	<a href="{{route('new.autoridad')}}"  class="{{$barra['autoridad']}} form-control">Autoridad {{$barra['cautoridad']}}</a>
	<a href="{{route('new.delito')}}" class="{{$barra['delitos']}} form-control">Delitos {{$barra['cdelitos']}}</a>
	<a href="{{route('new.acusacion')}}" class="{{$barra['acusaciones']}} form-control">Acusaciones {{$barra['cacusaciones']}}</a>
	<a href="{{route('new.defensa')}}"  class="{{$barra['defensa']}} form-control">Defensa {{$barra['cdefensa']}}</a>
    <a href="{{route('narracion')}}" class="{{$barra['hechos']}} form-control">Descripción de hechos {{$barra['chechos']}}</a>
    <a href="{{url('medidas')}}" class="{{$barra['medidas']}} form-control">Medidas de protección {{$barra['cmedidas']}}</a>
</div>
 