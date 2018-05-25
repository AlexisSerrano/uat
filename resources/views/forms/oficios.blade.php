@extends('template.form')
@section('title','Oficios')
@section('content')
    @include('fields.errores')
 <div class="col">
    <div class="row">
        <div class="col-9">
            <div class="card">
                 <div class="card-header"><h6>Nuevo oficio</h1></div>
                    <div class="card-body">
                        <div class="form-group">
                            {!! Form::label('oficio', 'Oficio', ['class' => 'col-form-label-sm']) !!}
                            {!! Form::text('oficio', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el nombre del oficio','data-validation'=>'required' ]) !!}
                        </div>
                    {{--  <div class="form-group">
                        <div class="col-12">
                            <div class="col-12">
                                <label for="header" class="col-form-label-sm">Encabezado</label>
                                <textarea name="header" id="encabezado" cols="30" rows="10" class="form-control form-control-sm ckeditor"data-validation="required" ></textarea>
                            </div>
                        </div>
                    </div>  --}}
                    <div class="form-group">
                        <label for="contenido" class="col-form-label-sm">Contenido del documento</label>
                        <textarea name="contenido" id="contenido" cols="30" rows="30" class="form-control form-control-sm" data-validation="required"></textarea>
                    </div>
                    {{--  <div class="form-group">
                        <div class="col-12">
                            <div class="col-12">
                                <label for="piePagina" class="col-form-label-sm">Pie de pagina</label>
                                <textarea name="piePagina" id="narracion" cols="30" rows="10" class="form-control form-control-sm" data-validation="required"></textarea>
                            </div>
                        </div>
                    </div>  --}}
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header"><h6>Oficios guardados</h1></div>
                    <div class="col-12"  >
                        <br>
                        <div>
                            <button id="guardarOficio" class="btn btn-primary btn-block"> Guardar nuevo oficio </button>   
                        </div>
                        <br>    
                        <div style="height: 400px;  width: 215px; overflow: auto;">
                            <div class=" panel panel-default">
                                <div class="panel-body">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Oficios guardados</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($oficios as $oficio)
                                            <tr>
                                                <td class="btn btn-primary itemoficio" width="100%"><span id="{{$oficio->id}}">{{$oficio->nombre}}</span></td>
                                            </tr>
                                            @empty
                                            
                                            @endforelse
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
$(".itemoficio").on("click", function(){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        async: false,
        url : "../getOficio",
        data : {'id':{{$oficio->id}} },
        type : 'POST',
        success : function(data) {
            $("#contenido").val(data[0].contenido);
        }
    });
});
$("#guardarOficio").on("click", function(){
    var contenido = $("#contenido").val();
    var nombre = $("#oficio").val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        async: false,
        url : "../addOficio",
        data : {'nombre':nombre, 'contenido':contenido },
        type : 'POST',
        success : function(data) {
            if(data){
                var URLactual = window.location;
                window.location.replace(URLactual);
            }
            else{

            }
        }
    });
});
</script>
@endpush