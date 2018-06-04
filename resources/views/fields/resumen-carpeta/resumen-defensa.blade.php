<div class="card-header">
        <div class="row">
            <div class="col text-left"><h5>Defensa</h5></div>
            <div class="col text-right">
                <a class="btn btn-secondary" >Ampliaciones <i class="fa fa-plus-square" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <card class="card-body">
        <div class="table-responsive">
            
            <table class="table table-hover">
                <thead>
                    <th>Nombre</th>
                    <th>Defiende a</th>                                
                </thead>
                <tbody>
                    {{-- @if(count($defensas)==0)
                        <tr><td colspan="2" class="text-center">Sin registros</td></tr> --}}
                        
                        <tr>
                            {{-- <td>{{ $defensa->nombres." ".$defensa->primerAp." ".$defensa->segundoAp }}</td>
                            <td>{{ $defensa->nombres2." ".$defensa->primerAp2." ".$defensa->segundoAp2 }}</td>                              --}}
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </card>