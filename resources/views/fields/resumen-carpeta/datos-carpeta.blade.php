@extends('fields.resumen-carpeta.resumen-carpeta')
@section('detalle')
<div class="col-10">
        <div class="card">
            <div class="card-header">
                    <div class="row">
                            <div class="col text-left"><h5>Datos de la carpeta</h5></div>
                            <ul class="nav nav-tabs" id="myTab" aria-orientation="vertical" role="tablist">
                               <li>
                                    <a href="{{ route("tabla.oficios",session('carpeta'))}}" title="Oficios para impresión" class="btn btn-secondary">Oficios <i class="fa fa-font"></i></a>
                               </li>
                            </ul>
                    </div>
            </div>
        </div>
                <table class="table table-striped" style="text-align:rigth;">
                    <thead class="table-secondary">
                        <th>Fecha de inicio de la carpeta</th>
                        <th>Fiscal que atendió</th>
                        <th>Unidad en la que se inició la carpeta</th> 
                        <th>Observaciones</th>                              
                    </thead>
                    <tbody>
                        <tr>        
                            <td>{!! Form::label('fecha', Jenssegers\Date\Date::parse($carpeta->fechaInicio)->format('l j \\d\\e F \\d\\e Y') , ['class' => 'col-form-label-sm']) !!}</td>
                            <td>{{$carpeta->fiscalAtendio}}</td>
                            <td>{{$carpeta->descripcion}}</td> 
                            <td>{{$carpeta->descripcionHechos}}</td>                                                          
                        </tr>
                    </tbody>
                </table>
        
    </div>
 
@endsection
     






{{-- <div class="row">
    <div class="col-4">
        <div class="form-group">
            {!! Form::label('fecha2', 'Fecha de inicio de la carpeta:', ['class' => 'col-form-label-sm detalle']) !!}
            <p>
                {!! Form::label('fecha', Jenssegers\Date\Date::parse($carpeta->fechaInicio)->format('l j \\d\\e F \\d\\e Y') , ['class' => 'col-form-label-sm']) !!}
            </p>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            {!! Form::label('fiscalAtendio', 'Fiscal que atendió:', ['class' => 'necesario col-form-label-sm detalle']) !!}
            <p>
                {!! Form::label('fiscalAtendio',$carpeta->fiscalAtendio, ['class' => '  col-form-label-sm ']) !!}
            </p>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            {!! Form::label('unidadCarpeta', 'Unidad en la que se inició la carpeta:', ['class' => 'necesario col-form-label-sm detalle']) !!}
            <p>
                {!! Form::label('unidadCarpeta',$carpeta->descripcion, ['class' => 'col-form-label-sm']) !!}
            </p>
        </div>
    </div>
    @if (Request::is('resumen'))
        <div class="col-12">
            <div class="form-group">
                {!! Form::label('unidadCarpeta', 'Observaciones por parte del fiscal:', ['class' => 'necesario col-form-label-sm detalle']) !!}
                <p>
                    {!! Form::label('unidadCarpeta',$carpeta->descripcionHechos, ['class' => 'col-form-label-sm']) !!}
                </p>
            </div>
        </div>
    @endif
    
</div>
     --}}