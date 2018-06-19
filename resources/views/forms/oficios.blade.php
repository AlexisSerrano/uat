@extends('template.form')
@section('title','Oficios')
@section('content')
    @include('fields.errores')
 <div class="col">
    <div class="row">
        <div class="col-sm-12 col-md-9">
            <div class="card contoficio">
                <div class="card-header"><h6>Nuevo oficio</h6>
                    <br>
                    <nav>
                        <div class="nav nav-pills" id="pills-tab" role="tablist">            
                            <a class="nav-link  " id="pills-encab-tab" data-toggle="pill" href="#pills-encab" role="tab" aria-controls="pills-encab" aria-selected="true">Encabezado</a>
                            <a class="nav-link active " id="pills-content-tab" data-toggle="pill" href="#pills-content" role="tab" aria-controls="pills-content" aria-selected="false">Contenido</a>
                            <a class="nav-link" id="pills-pie-tab" data-toggle="pill" href="#pills-pie" role="tab" aria-controls="pills-pie" aria-selected="false">Pie</a>
                        </div>
                    </nav>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        {!! Form::label('oficio', 'Oficio', ['class' => 'col-form-label-sm']) !!}
                        {!! Form::text('oficio', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el nombre del oficio','data-validation'=>'required' ]) !!}
                    </div>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane" id="pills-encab" role="tabpanel" aria-labelledby="encab-tab" style="height:70%;">
                            <div class="form-group margindown">
                                <label for="encabezado" class="col-form-label-sm">Encabezado</label>
                                <textarea name="encabezado" id="encabezado" class="form-control form-control-sm ckeditor" data-validation="required"></textarea>
                            </div>
                        </div>
                        <div class="tab-pane show active" id="pills-content" role="tabpanel" aria-labelledby="pills-content-tab" style="height:70%;">
                            <div class="form-group margindown">
                                <label for="contenido" class="col-form-label-sm">Contenido</label>
                                <textarea name="contenido" id="contenido" class="form-control form-control-sm ckeditor" data-validation="required"></textarea>
                            </div>
                        </div>
                        <div class="tab-pane " id="pills-pie" role="tabpanel" aria-labelledby="pills-pie-tab" style="height:70%;">
                            <div class="form-group margindown">
                                <label for="pie" class="col-form-label-sm">Pie</label>
                                <textarea name="pie" id="pie" class="form-control form-control-sm ckeditor" data-validation="required"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <button id="guardarOficio" class="btn btn-primary btns"> Guardar nuevo oficio </button>
                            <button id="editarOficio" class="btn btn-primary btns"> Editar oficio </button>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header"><h6>Oficios guardados</h1></div>
                        {{-- <div class="">  --}}
                        <div class=" panel panel-default scroll">
                            <div class="panel-body">
                                <table class="table tableOficios">
                                    <tbody id="listaOficios" >
                                        @forelse($oficios as $oficio)
                                        <tr>
                                            <td style="padding:0;text-align:left;">
                                            <a style="width:100%;text-align:center; font-size:12px; color:black" class="btn btn-default  itemoficio" id="{{$oficio->id}}"><span>{{$oficio->nombre}}</span></a>
                                            </td>
                                        </tr>
                                        @empty
                                        
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- </div>  --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 <style>
    .btns{
        margin-top:80px; 
        width:39%;
    }
    .contoficio{
        height: 1300px;
    }
    .tableOficios{
        margin-top: 5px;
        overflow: scroll;
        width:100%;
       
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
            CKEDITOR.instances['encabezado'].setData(data[0].encabezado);
            CKEDITOR.instances['pie'].setData(data[0].pie);
            $("#oficio").val(data[0].nombre);
            oficio = id;
        }
    });
});
$("#guardarOficio").on("click", function(){
    var encabezado = CKEDITOR.instances['encabezado'].getData();
    var conten = CKEDITOR.instances['contenido'].getData();
    var pie = CKEDITOR.instances['pie'].getData();
    var nombre = $("#oficio").val();
    if(valida(conten, nombre)){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            async: false,
            url: route("addOficio"),
            data : {'nombre':nombre, 'contenido':conten, 'encabezado':encabezado, 'pie':pie },
            type : 'POST',
            success : function(data) {
                if(data){
                    CKEDITOR.instances['encabezado'].setData("");
                    CKEDITOR.instances['contenido'].setData("");
                    CKEDITOR.instances['pie'].setData("");
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
    var encabezado = CKEDITOR.instances['encabezado'].getData();
    var pie = CKEDITOR.instances['pie'].getData();
    var nombre = $("#oficio").val();
    if(oficio!=''){
        if(valida(conten, nombre)){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                async: false,
                url: route("updateOficio"),
                data : {'nombre':nombre, 'contenido':conten, 'id':oficio, 'encabezado':encabezado, 'pie':pie },
                type : 'POST',
                success : function(data) {
                    if(data){
                        CKEDITOR.instances['contenido'].setData("");
                        CKEDITOR.instances['encabezado'].setData("");
                        CKEDITOR.instances['pie'].setData("");
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