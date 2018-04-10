<div class="card-body boxone">
        <DIV class="row">
            <div class="col-12">
                    <h6 style="text-align:center">Providencias precautorias y/o protección</h6>
                    <div class="table">
                            <table class="table table-striped">
                                <thead>
                                    <th>Tipo de medida</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Final</th>
                                    <th>Ejecuta</th>
                                    <th>Persona</th>
                                    <th>Observaciones</th>
                                </thead>
                                <tbody>
                                    {{-- @if(count($medidasProteccion)==0) --}}
                                        {{-- <tr><td colspan="7" class="text-center">Sin registros</td></tr> --}}
                                    {{-- @else
                                        @foreach($medidasProteccion as $medidasProteccion) --}}
                                            <tr>
                                                <td>medida</td>
                                                <td>20/25/12</td>
                                                <td>20/05/12</td>
                                                <td>ejecuta</td>
                                                <td>persona</td>
                                                <td>Obsercaciones</td>
                                            </tr>
                                </tbody>
                            </table>
                        </div>

            </div>
        </DIV>
</div>
