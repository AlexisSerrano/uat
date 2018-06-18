@extends('template.form')
@section('title', 'Oficio a Centro de atención a víctimas')
@section('content')
{!! Form::open(['route' => 'store.oficioCavd', 'method' => 'POST'])  !!} 
<div class="card">  
    <div class="card-body">
        <div class="row">
    <div class="col-4">
        <div class="form-group">
			{!! Form::label('idCavd', 'Unidad', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('idCavd', $catalogo, null, ['class' => 'delito form-control form-control-sm select2', 'placeholder' => 'Seleccione una unidad', 'required']) !!}
		</div>
	</div>
    
    <select name="idDenunciante"  class="form-control form-control-sm" required>
        <option value="">Seleccione una victima u ofendido</option>
        @foreach($victimas2 as $victima)
        <option value="{{ $victima->id }}">{{ $victima->nombres." ".$victima->primerAp." ".$victima->segundoAp }}</option>
        @endforeach
    </select>
</div>	
    </div>
</div>

<div class="col text-right">

        <button class="btn btn-primary">guadar</button>
</div>

@endsection

{{-- @push('scripts')
<script>
  $(".form-control form-control-sm").select2({
    placeholder: "Seleccione una victima u ofendido"
});  
</script>
@endpush --}}

