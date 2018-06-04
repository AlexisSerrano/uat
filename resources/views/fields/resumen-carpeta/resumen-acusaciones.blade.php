@extends('fields.resumen-carpeta.resumen-carpeta')
@section('detalle')
                   
<div class="card">
<div class="card-header">
    <div class="row">
        <div class="col text-left"><h5>Acusaciones</h5></div>
        <div class="col text-right">
            <a class="btn btn-secondary" >Ampliaciones <i class="fa fa-plus-square" aria-hidden="true"></i></a>
        </div>
    </div>
</div>
<card class="card-body">
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <th>Denunciante</th>
                        <th>Delito</th>
                        <th>Denunciado</th>
                    </thead>
                    <tbody>
                        {{-- @if(count($acusaciones)==0)
                            <tr><td colspan="4  " class="text-center">Sin registros</td></tr> --}}
                            
                            <tr>
                                {{-- <td>{{ $acusacion->nombres." ".$acusacion->primerAp." ".$acusacion->segundoAp }}</td>
                                <td>{{ $acusacion->delito }}</td>
                                    <td>{{ $acusacion->nombres2." ".$acusacion->primerAp2." ".$acusacion->segundoAp2 }}</td> --}}
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </card>
    </div>
        @endsection

