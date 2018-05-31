@extends('template.form')
@section('title','Resumen de la carpeta')
@section('content')
    @include('fields.errores')
 <div class="col">
    <div class="row">
        <div class="col-9">
            <div class="card">
                 <div class="card-header"><h6>Carpeta numero: </h1></div>
                    <div class="card-body">
                        
                    
                    
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header"><h6>Elementos de la carpeta</h1></div>
                    <div class="col-12"  >  
                        <div style="width: 215px; overflow: auto;">
                            <div class=" panel panel-default">
                                <div class="panel-body">
                                    <table class="table table-hover">
                                        <tbody>
                                            {{-- @forelse($oficios as $oficio) --}}
                                            <tr>
                                                {{-- <td class="btn btn-primary itemoficio" width="100%" id="{{$oficio->id}}"><span>{{$oficio->nombre}}</span></td> --}}
                                            </tr>
                                            {{-- @empty --}}
                                            
                                            {{-- @endforelse --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
@endsection
@push('scripts')
<script>

</script>
@endpush