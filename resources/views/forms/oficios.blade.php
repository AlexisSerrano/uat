@extends('template.form')
@section('title','Oficios')
@section('content')
    @include('fields.errores')
 <div class="col">
    <div class="row">
        <div class="col-sm-12 col-md-9">
            <div class="card">
                 <div class="card-header"><h6>Nuevo oficio</h1></div>
                    <div class="card-body">
                        <div class="form-group">
                            {!! Form::label('oficio', 'Oficio', ['class' => 'col-form-label-sm']) !!}
                            {!! Form::text('oficio', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el nombre del oficio','data-validation'=>'required' ]) !!}
                        </div>
                    <div class="form-group">
                        <label for="contenido" class="col-form-label-sm">Contenido del documento</label>
                        <textarea name="contenido" id="contenido" class="form-control form-control-sm ckeditor" data-validation="required"></textarea>
                    </div>
                    <div class="form-group">
                        <button id="guardarOficio" class="btn btn-primary btns"> Guardar nuevo oficio </button>
                        <button id="editarOficio" class="btn btn-primary btns"> Editar oficio </button>   
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="card">
                <div class="card-header"><h6>Oficios guardados</h1></div>
                    <div class="col-12"  >    
                        <div class=" panel panel-default">
                            <div class="panel-body">
                                <table class="table table-hover tableOficios">
                                    <tbody id="listaOficios" >
                                        @forelse($oficios as $oficio)
                                        <tr>
                                            <td class="btn btn-primary itemoficio" id="{{$oficio->id}}"><span>{{$oficio->nombre}}</span></td>
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
</div>
@endsection
<style>
    .btns{
        margin-top:20px; 
        width:49%;
    }
    .itemoficio{
        width:100%;
    }
    .tableOficios{
        margin-top: 5px;
    }
</style>
@push('scripts')
<script>
var oficio = '';
$("#listaOficios").on("click", ".itemoficio", function(){
    var id = $(this).attr("id");
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        async: false,
        url: route('getOficio'),
        data : {'id':id },
        type : 'POST',
        success : function(data) {
            CKEDITOR.instances['contenido'].setData(data[0].contenido);
            $("#oficio").val(data[0].nombre);
            oficio = id;
        }
    });
});
$("#guardarOficio").on("click", function(){
    var conten = CKEDITOR.instances['contenido'].getData();
    var nombre = $("#oficio").val();
    if(valida(conten, nombre)){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            async: false,
            url: route("addOficio"),
            data : {'nombre':nombre, 'contenido':conten },
            type : 'POST',
            success : function(data) {
                if(data){
                    CKEDITOR.instances['contenido'].setData("");
                    var item = '<tr><td class="btn btn-primary itemoficio" width="100%" id="'+data.id+'"><span>'+data.nombre+'</span></td></tr>';
                    $("#listaOficios").append(item);
                    $("#oficio").val("");
                    oficio="";
                    swal("Oficio agregado satisfactoriamente");
                }
                else{

                }
            }
        });
    }
});
$("#editarOficio").on("click", function(){
    var conten = CKEDITOR.instances['contenido'].getData();
    var nombre = $("#oficio").val();
    if(oficio!=''){
        if(valida(conten, nombre)){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                async: false,
                url: route("updateOficio"),
                data : {'nombre':nombre, 'contenido':conten, 'id':oficio },
                type : 'POST',
                success : function(data) {
                    if(data){
                        CKEDITOR.instances['contenido'].setData("");
                        $("#oficio").val("");
                        $("#"+oficio).html("<span>"+nombre+"</span>")
                        swal("Oficio modificado satisfactoriamente");
                    }
                    else{

                    }
                }
            });
        }
        
    }
    else{
        swal("Seleccione un oficio para editar");
    }
});
function valida(conten, nombre){
    var bandera = true;
    if(conten==''&&nombre==''){
        swal("Introduzca el nombre y contenido del oficio");
        bandera = false;
    }
    else if(conten==''){
        swal("Introduzca el contenido del oficio");
        bandera = false;
    }
    else if(nombre==''){
        swal("Introduzca el nombre del oficio");
        bandera = false;
    }
    return bandera;
}
</script>
@endpush