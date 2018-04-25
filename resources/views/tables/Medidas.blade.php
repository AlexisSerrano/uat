<h6>Medidas</h6>
<div class="table">
    <table class="table table-striped">
        <thead>
                <th width="25%">Tipo de medida</th>
                <th>Fecha inicio</th>
                <th>Fecha final</th>
                <th>Ejecuta</th>
                <th>Persona</th>
                <th>Observaciones</th>
                <th>Opciones</th>                             
        </thead>
        <tbody>
            @if(count($TablaProvidencia)==0)
                <tr><td colspan="7" class="text-center">Sin registros</td></tr>
            @else
                @foreach($TablaProvidencia as $provide)
                    <tr id="{{$provide->id}}">
                        <td class="providencia">{{ $provide->providencia}}</td>
                        <td class="fechainicio">{{ $provide->fechainicio }}</td>  
                        <td class="fechafin">{{ $provide->fechafin }}</td>  
                        <td class="ejecutor">{{ $provide->ejecutor }}</td>  
                        <td class="persona">{{ $provide->persona }}</td>  
                        <td class="observacion">{{ $provide->observacion }}</td>  
                        <td>
                                <a href="{{ url('agregar-medidas/'.$provide->id.'/eliminar')}}" title="Eliminar Registro" class="btn btn-secondary btn-simple btn-xs">
                                <i class="fa fa-times"></i></a>
                                <button type="button" class="btn btn-secundary btn-simple btn-xs  btn-modal" value={{$provide->id}} ><i class="fa fa-edit"></i></button>
                                    
                        </td>                           
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>



<div id="myModal1" class="modal fade" role="dialog">
    <div class="col-12">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content"> 
            <!--Cabecera del modal-->
            <div class="modal-header">
                <h4 class="modal-title">Actualizar</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div> 
      
              <!-- FORMULARIO -->
              <form class="modalForm" id="mediformu">
      
                <!--Contenido del modal-->
                <div class="modal-body">
                        <input class="form-control" type="text" id="idr" name="idr" hidden>
                  <div class="form-group">
                    <div class="col-xm-6">
                            {!! Form::label('tipoProvidencia1', 'Tipo de providencia precautoria', ['class' => 'col-form-label-sm']) !!}
                            {!! Form::select('tipoProvidencia1', $providencias,null,['class' => 'form-control form-control-sm', 'data-validation'=>'required', 'id'=>'tipoProvidencia1']) !!}
                    {{-- <input class="form-control" type="text" id="tipo_medida" name="tipo_medida" placeholder="Tipo de medida" > --}}
                    </div>



                  </div>
      
                  <div class="form-group">
                    <div class="col-xm-6">
                            {!! Form::label('fechaInicio1', 'Fecha inicial', ['class' => 'col-form-label-sm']) !!}
                            <div class="input-group date" id="fechaInicio11" data-target-input="nearest">
                                {{-- {!! Form::text('fechaInicio', null, ['class' => 'form-control form-control-sm datetimepicker-input', 'data-target' => '#fechaInicio','data-validation'=>'required', 'placeholder' => 'DD/MM/AAAA']) !!} --}}
        
                                        <input type="date" id="fechaInicio1" name="fechaInicio1" class="form-control form-control-sm", data-validation="birthdate">
                    {{-- <input class="form-control " type="text" id="fecha_inicio" name="fecha_inicio" placeholder="Fecha Inicio"> --}}
                    </div>
                  </div>
                  <div class="form-group">
                        <div class="col-xm-6">
                                {!! Form::label('fechaFinal1', 'Fecha final', ['class' => 'col-form-label-sm']) !!}
                                <div class="input-group date" id="fechaFinal11" data-target-input="nearest">
                                    {{-- {!! Form::text('fechaFinal', null, ['class' => 'form-control form-control-sm datetimepicker-input', 'data-target' => '#fechaFinal','data-validation'=>'required', 'placeholder' => 'DD/MM/AAAA']) !!} --}}
                                
                                            <input type="date" id="fechaFinal1" name="fechaFinal1" class="form-control form-control-sm", data-validation="birthdate" >
                        </div>
                      </div>
          
                      <div class="form-group">
                        <div class="col-xm-6">
                                {!! Form::label('quienEjecuta1', 'Quién ejecuta', ['class' => 'col-form-label-sm']) !!}
                                {!! Form::select('quienEjecuta1', $ejecutores ,null,['class' => 'form-control form-control-sm', 'data-validation'=>'required' ,'id'=>"quienEjecuta1"]) !!}
                        {{-- <input class="form-control " type="text" id="ejecuta" name="ejecuta" placeholder="Ejecuta"> --}}
                        </div>
                      </div>
                      <div class="form-group">
                            <div class="col-xm-6">
                                    {!! Form::label('victima1', 'Victima', ['class' => 'col-form-label-sm']) !!}
                                    {!! Form::select('victima1', $victimas,null,['class' => 'form-control form-control-sm', 'data-validation'=>'required' ,'id'=>"victima1"]) !!}
                            {{-- <input class="form-control" type="text" id="persona" name="Persona" placeholder="Persona" > --}}
                            </div>
                          </div>
              
                          <div class="form-group">
                            <div class="col-xm-6">
                                    {!! Form::label('observaciones1', 'Observaciones', ['class' => 'col-form-label-sm']) !!}		
                                    {{-- <textarea name="ObservacionesM" id="ObservacionesM" cols="15" rows="5" class="form-control form-control-sm", data-validation= "required"></textarea>     --}}
                            <input class="form-control " type="text" id="observaciones1" cols="15" rows="5" name="observaciones" placeholder="Observaciones">
                            </div>
                          </div>
                </div> 
                <!--Final del modal-->
                <div class="modal-footer">
                  <button type="button" id="guardar" class="btn btn-success btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Guar</button>
                </div>
      
             </form>
             <!-- FORMULARIO - END -->
      
          </div>
        </div>
      </div>
    </div>
<script>
 
</script>