@extends('template.form')
@section('title', 'Oficio a Centro de atención a víctimas')
@section('content')
{!! Form::open(['route' => 'store.oficioCavd', 'method' => 'POST'])  !!} 
<div class="card">  
    <div class="card-body">
        <div class="row">
    <div class="col-4">
        <div class="form-group">
            {!! Form::label('dirigidoA', 'Dirigido a:', ['class' => 'col-form-label-sm']) !!}
            {!! Form::text('dirigidoA', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Persona a la que se dirige el oficio']) !!}
        </div>
    </div>
    
    <div class="col-4">
            <div class="form-group">
                {!! Form::label('victima3', 'Víctima/Ofendido', ['class' => 'col-form-label-sm']) !!}
                {!! Form::select('victima3', $victimas,null,['class' => 'form-control form-control-sm js-example-basic-multiple', 'data-validation'=>'required', 'multiple'=>'multiple']) !!}
            </div>
    </div>
</div>	
    </div>
</div>

<div class="col text-right">

        <button class="btn btn-primary">Imprimir Oficio</button>
</div>

@endsection
<script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>