@extends('template.form')
@section('title','Oficios')
@section('content')

    @include('fields.errores')
    {!!Form::open()!!}
 <div class="col">
    <div class="row">
        <div class="col-9">
            <div class="card">
                 <div class="card-header"><h6>Nuevo oficio</h1></div>
                    <div class="card-body">
                    <div class="col">
                            <div class="form-group">
                                {!! Form::label('oficio', 'Oficio', ['class' => 'col-form-label-sm']) !!}
                                {!! Form::text('oficio', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el nombre del oficio','data-validation'=>'required' ]) !!}
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                {!! Form::label('etiqueta', 'Etiqueta', ['class' => 'col-form-label-sm']) !!}
                                {!! Form::text('etiqueta', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese la etiqueta', 'data-validation'=>'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                                <div class="col-12">
                                    <div class="col-12">
                                        <label for="header" class="col-form-label-sm">Encabezado</label>
                                        <textarea name="header" id="encabezado" cols="30" rows="10" class="form-control form-control-sm"data-validation="required" ></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-12">
                                    <div class="col-12">
                                        <label for="contenido" class="col-form-label-sm">Contenido del documento</label>
                                        <textarea name="contenido" id="contenido" cols="30" rows="10" class="form-control form-control-sm" data-validation="required"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-12">
                                    <div class="col-12">
                                        <label for="piePagina" class="col-form-label-sm">Pie de pagina</label>
                                        <textarea name="piePagina" id="narracion" cols="30" rows="10" class="form-control form-control-sm" data-validation="required"></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            {{-- <div class="col-6 text-left">
                                {!!Form::submit('Guardar',array('class' => 'btn btn-primary','id'=>'guardarDenunciante'))!!}
                            </div> --}}
                    </div>


            </div>

        </div>
         <div class="col-3">
             <div class="card">
                <div class="card-header"><h6>Oficios guardados</h1></div>
                    {{-- <div class="card-body"> --}}
                            <div class="col-12"  >
                                <br>
                                <div>
                                    <button id="guardarOficio" class="btn btn-primary btn-block"> Guardar nuevo oficio </button>
                                    
                                </div>
                                <br>    
                                <div style="height: 200px;  width: 210px; overflow: auto;">
                                <div class=" panel panel-default">
                                    <div class="panel-body">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th >Oficios guardados</th>
                                              
                                                    {{-- <th class="col-xs-2">Editar</th> --}}
                                                 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr  >
                                                    <td class=" btn btn-prumary"  >helloasndasd</td>
                                                   
                                                    {{-- <td class="col-xs-2"><i class="fa fa-pencil" aria-hidden="true"></i></td> --}}
                                                   
                                                </tr>
                                           
                                                <tr>
                                                        <td class="btn btn-prumary">helloasndasd</td>
                                                       
                                                        
                                                </tr>
                                                <tr>
                                                        <td class="btn btn-prumary">helloasndasd</td>
                                                       
                                                        
                                                </tr>
                                                <tr>
                                                        <td class="btn btn-prumary">helloasndasd</td>
                                                        
                                                        
                                                </tr>
                                                <tr>
                                                        <td class="btn btn-prumary">helloasndasd</td>
                                                       
                                                        
                                                </tr>
                                                
                                            
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>
                                    <style> 



                                </style>
                                   

                                  
                                </div>
                    {{-- </div> --}}
            </div>
        </div>
    </div>

    
    {!!Form::close()!!}

@endsection