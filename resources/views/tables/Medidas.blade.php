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
                                <a href="{{ url('agregar-medidas/'.$provide->id.'/eliminar')}}" type="button" rel="tooltip" title="Eliminar Registro" class="btn btn-success btn-simple btn-xs">
                                <i class="fa fa-remove"></i></a>
                                <button type="button" class="btn btn-success btn-simple btn-xs btn-modal" value={{$provide->id}} ><i class="fa fa-edit"></i></button>
                                    
                        </td>                           
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>



<div id="myModal1" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
          <!-- Modal content-->
          <div class="modal-content"> 
            <!--Cabecera del modal-->
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Actualizar</h4>
            </div> 
      
              <!-- FORMULARIO -->
              <form class="modalForm" id="mediformu">
      
                <!--Contenido del modal-->
                <div class="modal-body">
                        <input class="form-control" type="text" id="idr" name="idr" hidden>
                  <div class="form-group">
                    <div class="col-xm-6">
                    <input class="form-control" type="text" id="tipo_medida" name="tipo_medida" placeholder="Tipo de medida" >
                    </div>
                  </div>
      
                  <div class="form-group">
                    <div class="col-xm-6">
                    <input class="form-control " type="text" id="fecha_inicio" name="fecha_inicio" placeholder="Fecha Inicio">
                    </div>
                  </div>
                  <div class="form-group">
                        <div class="col-xm-6">
                        <input class="form-control" type="text" id="fecha_final" name="fecha_final" placeholder="Fecha Final" >
                        </div>
                      </div>
          
                      <div class="form-group">
                        <div class="col-xm-6">
                        <input class="form-control " type="text" id="ejecuta" name="ejecuta" placeholder="Ejecuta">
                        </div>
                      </div>
                      <div class="form-group">
                            <div class="col-xm-6">
                            <input class="form-control" type="text" id="persona" name="Persona" placeholder="Persona" >
                            </div>
                          </div>
              
                          <div class="form-group">
                            <div class="col-xm-6">
                            <input class="form-control " type="text" id="observaciones" name="observaciones" placeholder="Observaciones">
                            </div>
                          </div>
                </div> 
                <!--Final del modal-->
                <div class="modal-footer">
                  <button type="button" id="guardar" class="btn btn-success btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Guardar</button>
                </div>
      
             </form>
             <!-- FORMULARIO - END -->
      
          </div>
        </div>
      </div>

<script>
 
</script>