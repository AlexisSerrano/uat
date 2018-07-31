@php
$barra = getNavCaso();
@endphp

@section('css')
    <style>
        .active1{
            background: #8e8e8e;
            color: #000000;
        }
    </style>
@endsection

{{-- <div class="col-2"> --}}
    <div class="card">
        <div class="card-header"><h6>Elementos de la carpeta</h1></div>
            <div class=" panel panel-default">
                <div class="panel-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td style="padding:0;text-align:left;">
                                    <a style="width:100%;text-align:left;" class="{{ Request::is( 'resumen/datosCarpeta') ? 'active1' : '' }} active btn btn-default datosCarpeta" href="{{route('resumen.datosCarpeta')}}">
                                        Datos de la carpeta 
                                </td>
                            </tr>
                            {{-- @forelse($oficios as $oficio) --}}
                            @if($barra['cdenunciante']>0)
                            <tr>
                                <td style="padding:0;text-align:left;">
                                    <a style="width:100%;text-align:left;" class="{{ Request::is( 'resumen/denunciante') ? 'active1' : '' }} btn btn-default denunciante" href="{{route('resumen.denunciante')}}">
                                    <span class="badge badge-info right">{{$barra['cdenunciante']}}</span> Victima u ofendido 
                                </td>
                            </tr>
                            @endisset
                            @if($barra['cdenunciado']>0)
                            <tr>
                                <td style="padding:0; text-align:left;">
                                    <a style="width:100%;text-align:left;" class="{{ Request::is( 'resumen/denunciado') ? 'active1' : '' }} btn btn-default denunciado" href="{{route('resumen.denunciado')}}">
                                    <span class="badge badge-info left">{{$barra['cdenunciado']}}</span> Investigado </a>
                                </td>
                            </tr>
                            @endisset
                            @if($barra['cabogado']>0)
                            <tr>
                                <td style="padding:0;text-align:left;">
                                    <a style="width:100%;text-align:left;" class="{{ Request::is( 'resumen/abogado') ? 'active1' : '' }} btn btn-default abogado" href="{{route('resumen.abogado')}}">
                                    <span class="badge badge-info right">{{$barra['cabogado']}}</span> Abogado </a>
                                </td>
                            </tr>
                            @endisset
                            @if($barra['cautoridad']>0)
                            <tr>
                                <td style="padding:0;text-align:left;">
                                    <a style="width:100%;text-align:left;" class="{{ Request::is( 'resumen/autoridad') ? 'active1' : '' }} btn btn-default autoridad" href="{{route('resumen.autoridad')}}">
                                        <span class="badge badge-info right">{{$barra['cautoridad']}}</span> Autoridad 
                                    </a>
                                </td>
                            </tr>
                            @endisset
                            @if($barra['cdelitos']>0)
                            <tr>
                                <td style="padding:0;text-align:left;">
                                    <a style="width:100%;text-align:left;" class="{{ Request::is( 'resumen/delito') ? 'active1' : '' }} btn btn-default delitos" href="{{route('resumen.delito')}}">
                                        <span class="badge badge-info right">{{$barra['cdelitos']}}</span> Delitos
                                    </a>
                                </td>
                            </tr>
                            @endisset
                            @if($barra['cacusaciones']>0)
                            <tr>
                                <td style="padding:0;text-align:left;">
                                    <a style="width:100%;text-align:left;" class="{{ Request::is( 'resumen/acusaciones') ? 'active1' : '' }} btn btn-default acusaciones" href="{{route('resumen.acusaciones')}}">
                                        <span class="badge badge-info right">{{$barra['cacusaciones']}}</span> Denuncias
                                    </a>
                                </td>
                            </tr>
                            @endisset
                            @if($barra['cdefensa']>0)
                            <tr>
                                <td style="padding:0;text-align:left;">
                                    <a style="width:100%;text-align:left;" class="{{ Request::is( 'resumen/defensa') ? 'active1' : '' }} btn btn-default defensa" href="{{route('resumen.defensa')}}">
                                        <span class="badge badge-info right">{{$barra['cdefensa']}}</span> Defensa
                                    </a>
                                </td>
                            </tr>
                            @endisset
                            @if($barra['cvehiculos']>0)
                            <tr>
                                <td style="padding:0;text-align:left;">
                                    <a style="width:100%;text-align:left;" class="{{ Request::is( 'resumen/vehiculo') ? 'active1' : '' }} btn btn-default vehiculos" href="{{route('resumen.vehiculo')}}">
                                        <span class="badge badge-info right">{{$barra['cvehiculos']}}</span> Vehiculos
                                    </a>
                                </td>
                            </tr>
                            @endisset
                            {{-- @if($barra['chechos']>0)
                            <tr>
                                <td style="padding:0;text-align:left;">
                                    <a style="width:100%;text-align:center;" class="{{ Request::is( 'resumen/observaciones') ? 'active1' : '' }} btn btn-default observaciones" href="{{route('resumen.observaciones')}}">
                                        Observaciones
                                    </a>
                                </td>
                            </tr>
                            @endisset --}}
                            {{-- @empty --}}

                            {{-- @endforelse --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
{{-- </div> --}}
    
            
            
