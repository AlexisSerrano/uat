<br>
<div class="card">
        <div class="card-header">
            <h6>Defensas</h6>
        </div>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <th>Nombre</th>
            <th>Defiende a</th>                                
        </thead>
        <tbody>
            @if(count($defensas)==0)
                <tr><td colspan="2" class="text-center">Sin registros</td></tr>
            @else
                @foreach($defensas as $defensa)
                    <tr>
                        <td>{{ $defensa->nombres." ".$defensa->primerAp." ".$defensa->segundoAp }}</td>
                        <td>{{ $defensa->nombres2." ".$defensa->primerAp2." ".$defensa->segundoAp2 }}</td>                             
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
</div>