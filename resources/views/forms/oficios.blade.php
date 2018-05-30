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
                    <div class="form-group">
                        <label for="contenido" class="col-form-label-sm">Contenido del documento</label>
                        <textarea name="contenido" id="contenido" class="form-control form-control-sm ckeditor" data-validation="required"></textarea>
                    </div>
                    <div>
                        <button id="guardarOficio" class="btn btn-primary btn-block"> Guardar nuevo oficio </button>   
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header"><h6>Oficios guardados</h1></div>
                    <div class="col-12"  >  
                        <div style="width: 215px; overflow: auto;">
                            <div class=" panel panel-default">
                                <div class="panel-body">
                                    <table class="table table-hover">
                                        <tbody>
                                            @forelse($oficios as $oficio)
                                            <tr>
                                                <td class="btn btn-primary itemoficio" width="100%" id="{{$oficio->id}}"><span>{{$oficio->nombre}}</span></td>
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
            console.log(data);
            CKEDITOR.instances['contenido'].setData(data[0].contenido);
        }
    });
});
$("#guardarOficio").on("click", function(){
    var conten = CKEDITOR.instances['contenido'].getData();
    var nombre = $("#oficio").val();
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