<br>
<div class="card">
     <div class="card-header">
        <h6>Vehiculos</h6>
     </div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <th>Delito</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Placas</th> 
                <th>Tipo Vehiculo</th>
                <th>Color</th>
                <th>Opciones</th>                               
            </thead>
            <tbody>
                @if(count($vehiculos)==0)
                    <tr><td colspan="7" class="text-center">Sin registros</td></tr>
                @else
                    @foreach($vehiculos as $vehiculo)
                            <tr id="{{$vehiculo->id}}">
                            <td>{{ $vehiculo->delito.' '.$vehiculo->desagregacion1.' '.$vehiculo->desagregacion2 }}</td>
                            <td>{{ $vehiculo->marca }}</td>
                            <td>{{ $vehiculo->modelo }}</td>
                            <td>{{ $vehiculo->placas }}</td>   
                            <td>{{ $vehiculo->tipovehiculo }}</td>
                            <td>{{ $vehiculo->color }}</td> 
                            {{-- <a href="{{ url('agregar-abogado/'.$abogado->id.'/eliminar')}}" title="Eliminar Registro" class="btn btn-secondary ">
                            <i class="fa fa-times"></i></td>   --}}
                            <td> 
                                @if(is_null(session('terminada')))
                          
                                <button type="button" class="btn btn-default   btn-xs  btn-modal" title="Editar registro"  value={{$vehiculo->id}} ><i class="fa fa-edit"></i></button>
                                <a data-vehiculo-id={{$vehiculo->id}} title="Eliminar Registro" class="deleteBtn btn btn-secondary btn-simple btn-xs">
                                    <i class="fa fa-times"></i>
                        </a>
                                @endif             
                            </td>
                                                            
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="myModal1" role="dialog">
     <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                    <h4 class="modal-title">Actualizar</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div> 

              <!-- FORMULARIO -->
                <form class="modalForm" id="mediformu">
        
                        <!--Contenido del modal-->
                        <div class="modal-body">
                                <input class="form-control" type="text" id="idr" name="idr" hidden >
                            <div class="form-group">

                                <div class="row">
                                    <div class="col-4">
                                            <div class="form-group">
                                                {!! Form::label('idTipifDelito', 'Delito', ['class' => 'col-form-label-sm']) !!}
                                                <select name="idTipifDelito" id="idTipifDelito1" class="form-control form-control-sm" required>
                                                        <option value="">Seleccione un delito</option>
                                                        @foreach($tipifdelitos as $tipifdelito)
                                                        <option value="{{ $tipifdelito->id }}">{{ $tipifdelito->delito." ".$tipifdelito->desagregacion1." ".$tipifdelito->desagregacion2}}</option>
                                                        @endforeach
                                                    </select>
                                                     {{-- {!! Form::select('delito1', $tipifdelitos,['class' => 'form-control form-control-sm', 'data-validation'=>'required' ,'id'=>"delito1"]) !!} --}}
                                            </div>
                                        </div>
                                        
                                        <div class="col-4">
                                            <div class="form-group">
                                                {!! Form::label('placas', 'Placas', ['class' => 'col-form-label-sm']) !!}
                                                {!! Form::text('placas',  null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese las placas', 'id'=>'placasv' ]) !!}	
                                                {{-- <input class="form-control" type="text" id="placas"  name="tipo_medi" placeholder="Tipo de medida" > --}}
                                                
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                {!! Form::label('idEstado', 'Entidad federativa', ['class' => 'col-form-label-sm']) !!}
                                                {!! Form::select('idEstado', $estados, '30', ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una entidad federativa' ,'id'=>'estadov' ]) !!}
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                {!! Form::label('idMarca', 'Marca', ['class' => 'col-form-label-sm']) !!}
                                                {!! Form::select('idMarca', $marcas, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una marca', 'id'=>'marcav']) !!}
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                {!! Form::label('idSubmarca', 'Submarca', ['class' => 'col-form-label-sm']) !!}
                                                {!! Form::select('idSubmarca',   ['' => 'Seleccione una submarca'], null, ['class' => 'form-control form-control-sm',  'id'=>'submarcav']) !!}
                                            </div>
                                        </div>
                                        
                                        <div class="col-2">
                                            <div class="form-group">
                                                {!! Form::label('modelo', 'Modelo', ['class' => 'col-form-label-sm']) !!}
                                                {!! Form::number('modelo', 0, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el modelo', 'id'=>'modelov']) !!}
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                {!! Form::label('idColor', 'Color', ['class' => 'col-form-label-sm']) !!}
                                                {!! Form::select('idColor', $colores, 25, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione un color', 'id'=>'colorv']) !!}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                {!! Form::label('nrpv', 'NRPV', ['class' => 'col-form-label-sm']) !!}
                                                {!! Form::text('nrpv', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el NRPV', 'id'=>'nrpvv']) !!}	
                                                        
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                {!! Form::label('numSerie', 'Número de serie', ['class' => 'col-form-label-sm']) !!}
                                                {!! Form::text('numSerie', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el número de serie', 'id'=>'numseriev']) !!}	
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                {!! Form::label('numMotor', 'Número de motor', ['class' => 'col-form-label-sm']) !!}
                                                {!! Form::text('numMotor', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el número de motor', 'id'=>'motorv']) !!}	
                                        </div>
                                        </div>
                                        
                                        <div class="col-4">
                                            <div class="form-group">
                                                {!! Form::label('permiso', 'Permiso', ['class' => 'col-form-label-sm']) !!}
                                                {!! Form::text('permiso', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el permiso', 'id'=>'permisov']) !!}	
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                {!! Form::label('idClaseVehiculo', 'Clase de vehículo', ['class' => 'col-form-label-sm']) !!}
                                                {!! Form::select('idClaseVehiculo', $clasesveh, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una clase de vehículo','id'=>'idclase' ]) !!}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                {!! Form::label('idTipoVehiculo', 'Tipo de vehículo', ['class' => 'col-form-label-sm']) !!}
                                                {!! Form::select('idTipoVehiculo', ['' => 'Seleccione un tipo de vehículo'], null, ['class' => 'form-control form-control-sm','id'=>'tipovv']) !!}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                {!! Form::label('idTipoUso', 'Tipo de uso', ['class' => 'col-form-label-sm']) !!}
                                                {!! Form::select('idTipoUso', $tiposuso, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione un tipo de uso', 'id'=>'tipousov']) !!}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                {!! Form::label('idProcedencia', 'Procedencia', ['class' => 'col-form-label-sm']) !!}
                                                {!! Form::select('idProcedencia', $procedencias, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione procedencia', 'id'=>'procev']) !!}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                {!! Form::label('idAseguradora', 'Aseguradora', ['class' => 'col-form-label-sm']) !!}
                                                {!! Form::select('idAseguradora', $aseguradoras, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una aseguradora',  'id'=>'asegurav']) !!}
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                {!! Form::label('senasPartic', 'Señas particulares', ['class' => 'col-form-label-sm']) !!}
                                                {!! Form::textarea('senasPartic', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese las señas particulares','rows' => '3',  'id'=>'senasv', 'data-validation'=>'length', 'data-validation-length'=>'15-5000']) !!}
                                            </div>
                                        </div>
                                </div>
                                         <!--Final del modal-->
                                        <div class="modal-footer">
                                             <button type="button" id="guardar" class="btn btn-success btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Editar</button>
                                        </div>
                
                            </div>
                        </div>
                </form>
                    <!-- FORMULARIO - END -->
        </div>
    </div>
</div>

@push('scripts')
   <script> 
        $(document).ready(function() {
            
            //  DenuncianteId = $(this).attr("data-denunciante-id");
            // alert("ok");
            $(".deleteBtn").on("click", function(e) {
                var id = $(this).data("vehiculo-id");
            e.preventDefault()
                swal({
                    // console.log(id);
                    title: "¿Está seguro de eliminarlo?",
                    text: "¡No podrá recuperar este registro!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Si, ¡Eliminarlo!",
                    cancelButtonText: "No, ¡Cancelar!",
                    closeOnConfirm: true,
                    closeOnCancel: true },
                    function(isConfirm){
                if (isConfirm) {
                    window.location.href=route('delete.vehiculo',id);
                }
        });
        });
        });
  </script>  
  <script src="{{asset('js/ajaxVehiculo.js')}}"></script>
 
@endpush
    



