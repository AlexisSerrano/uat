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
                    <tr>
                        <td>{{ $provide->providencia}}</td>
                        <td>{{ $provide->fechainicio }}</td>  
                        <td>{{ $provide->fechafin }}</td>  
                        <td>{{ $provide->ejecutor }}</td>  
                        <td>{{ $provide->persona }}</td>  
                        <td>{{ $provide->observacion }}</td>  
                        <td>
                                <a href="{{ url('agregar-medidas/'.$provide->id.'/eliminar')}}" type="button" rel="tooltip" title="Eliminar Registro" class="btn btn-success btn-simple btn-xs">
                                <i class="fa fa-remove"></i></a>
                                <button type="button" class="btn btn-success btn-simple btn-xs" value={{$provide->id}} data-toggle="modal" data-target="#myModal1"><i class="fa fa-edit"></i></button>
                                    
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
              <h4 class="modal-title">Nuevo Trabajo</h4>
            </div> 
      
              <!-- FORMULARIO -->
              <form action="#" class="modalForm">
      
                <!--Contenido del modal-->
                <div class="modal-body">
      
                  <div class="form-group">
                    <div class="col-xm-6">
                    <input class="form-control" type="text" id="txt_nombre" name="txt_nombre" placeholder="Nombre del trabajo" >
                    </div>
                  </div>
      
                  <div class="form-group">
                    <div class="col-xm-6">
                    <input class="form-control " type="text" id="txt_costo" name="txt_costo" placeholder="Costo">
                    </div>
                  </div>
                </div> 
                <!--Final del modal-->
                <div class="modal-footer">
                  <button type="submit" id="guardar" class="btn btn-success btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Guardar</button>
                </div>
      
             </form>
             <!-- FORMULARIO - END -->
      
          </div>
        </div>
      </div>

