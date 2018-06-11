@extends('template.form')
@section('title', 'Acuerdo para Fiscal Distrito')
@include('fields.errores')
@section('content')
{!! Form::open(['route' => 'store.oficioDistrito', 'method' => 'POST'])  !!} 
<div class="row">
    <div class="col">
        <div class="card">
            <div class="col-8">
                <div class="form-group">
                    {!! Form::label('unidadOficios', 'Unidad a la que va dirigido', ['class' => 'col-form-label-sm']) !!}
                    {!! Form::select('unidadOficios', $unidad,null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el nombre del fiscal', 'data-validation'=>'required']) !!}
                </div>
            </div>
            <div class="col-8">
                <div class="form-group">
                    {!! Form::label('fiscalC', 'Fiscal Coordinador', ['class' => 'col-form-label-sm']) !!}
                    {!! Form::select('fiscalC',['' => 'Seleccione un fical'], null, ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
                </div>
            </div>
            <div class="col-8">
                    <div class="form-group">
                        {!! Form::label('fiscalDistrito', 'Fiscal de distrito', ['class' => 'col-form-label-sm']) !!}
                        {!! Form::select('fiscalDistrito',['' => 'Seleccione un fical'],null, ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
                    </div>
                </div>
                
        </div>
        <div class="col text-right">

                <button class="btn btn-primary">Imprimir Oficio</button>
            </div>
    </div>
</div>



@endsection
@push('scripts')
	<script src="{{ asset('js/oficios-selects.js') }}"></script>
    @endpush

	