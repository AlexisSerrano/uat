{{-- tipo de persona --}}
<div id="persona">
    <div class="card">
            <div class="card-header" style="text-align: center;">
                    <div class="form-group">
                            <label class="col-form-label col-form-label-sm" for="formGroupExampleInput">Selecciona una opción</label>
                            <div class="clearfix"></div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label col-form-label col-form-label-sm">
                                    <input class="form-check-input" type="radio" id="tipoDenunciado1" name="tipoDenunciado" value="1" required> Q.R.R.
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label col-form-label col-form-label-sm">
                                    <input class="form-check-input" type="radio" id="tipoDenunciado2" name="tipoDenunciado" value="2" required> Conoce al denunciado
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label col-form-label col-form-label-sm">
                                    <input class="form-check-input" type="radio" id="tipoDenunciado3" name="tipoDenunciado" value="3" required> Por comparecencia
                                </label>
                            </div>
                        </div>
                    </div>

    </div>
</div>


{{-- quien resulte responsable --}}
<div id="qrr" class="">
    <div class="card" id="datosPer">
        <div class="card-header"><h5 class="mb-0 text-center">Quien resulte responsable</h5></div></div>
            <div>
            <div class="form-group">
                <div class="col-md-10">
            {!! Form::label('nombresQ', 'Nombre', ['class' => 'col-form-label-sm']) !!}
            {!! Form::text('nombresQ', "QUIEN RESULTE RESPONSABLE", ['class' => 'form-control form-control-sm', 'readonly']) !!}
            </div>
    </div>
</div>
</div>

{{-- denunciado conocido --}}
<div id="conocido">
     <div class="card" id="datosPer">
        <div class="card-header"><h5 class="mb-0 text-center">Datos del denunciado</h5></div>
            <div class="boxtwo">
                <div class="col-12 persona-conocido" style="text-align:center;">
                    <div class="row">
                        {{-- empresa o persona --}}
                         @include('orientador.denunciado.fields.tipo-persona')
                    </div>
                </div>
                {{-- datos de persona conocida --}}
                <div id="persona-conocida">
                @include('orientador.denunciado.fields.conocido-personales')
                </div>
                {{-- datos de empresa--}}
                <div id="empresa-conocida">
                    @include('orientador.denunciado.fields.conocido-empresa')
                </div>
            </div>
      </div>
</div>
    
{{-- por comparecencia --}}

    <div class="comparecencia" id="divconparecencia">
        <div class="card" >
            <div class="card-header"><h5 class="mb-0 text-center">Por comparecencia</h5></div>
                <div class="boxtwo">
                        <div class="row">
                                {{-- empresa/persona --}}
                            @include('orientador.denunciado.fields.tipo-persona2')
                        </div>
                    
                    {{-- datos personales de persona por comparecencia --}}
                    <div id="persona-comparecencia">
                        
                        @include('orientador.denunciado.fields.comparecencia-persona')
                    </div>
                      {{-- datos personales de empresa por comparecencia --}}
                    <div id="empresa-comparecencia">

                            @include('orientador.denunciado.fields.comparecencia-empresa')
                    </div>
                </div>
             </div>
         </div>

    