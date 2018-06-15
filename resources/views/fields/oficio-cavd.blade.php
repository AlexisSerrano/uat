@extends('template.form')
@section('title', 'Oficio a Centro de atención a víctimas')
@section('content')
{!! Form::open(['route' => 'store.oficioCavd', 'method' => 'POST'])  !!} 
<div class="card">  
    <div class="card-body">
        <div class="row">
    {{-- <div class="col-4">
        <div class="form-group">
            {!! Form::label('dirigidoA', 'Dirigido a:', ['class' => 'col-form-label-sm']) !!}
            {!! Form::text('dirigidoA', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Persona a la que se dirige el oficio']) !!}
        </div>
    </div> --}}
    
    <select name="idDenunciante[]" id="idDenunciante" multiple="multiple" class="form-control form-control-sm" required>
        <option value="">Seleccione una victima u ofendido</option>
        @foreach($victimas2 as $victima)
        <option value="{{ $victima->id }}">{{ $victima->nombres." ".$victima->primerAp." ".$victima->segundoAp }}</option>
        @endforeach
    </select>
</div>	
    </div>
</div>

<div class="col text-right">

        <button class="btn btn-primary">Imprimir Oficio</button>
</div>

@endsection