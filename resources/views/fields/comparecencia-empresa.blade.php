 {{-- empresa comparecencia --}}

 <div class="col-12" id="personaMoral">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    {!! Form::label('nombres3', 'Nombre', ['class' => 'col-form-label-sm']) !!}
    {!! Form::text('nombres2', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el nombre', 'required','data-validation'=>'custom' ,'data-validation-regexp'=>'^(([A-ZÁÉÑÍÓÚ]|[0-9])(-|,|.|\s)*){1,100}$']) !!}
                </div>
            </div>
            {{-- caompo solo habilitado para comparecencia-empresa --}}
            <div class="col-6">
                <div class="form-group">
                    {!! Form::label('fechaAltaEmpresa', 'Fecha de alta de Persona Moral', ['class' => 'col-form-label-sm']) !!}<div class="input-group date" id="fechaAlta" data-target-input="nearest">
                        {!! Form::text('fechaAltaEmpresa', null, ['class' => 'form-control form-control-sm datetimepicker-input', 'data-target' => '#fechaAlta', 'data-toggle' => 'datetimepicker', 'placeholder' => 'AAAA-MM-DD','data-validation'=>'date', 'data-validation-format'=>'yyyy-mm-dd']) !!}
                        <div class="input-group-append" data-target="#fechaAlta" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row no-gutters">
                    <div class="col-7">
                        {!! Form::label('rfc3', 'R.F.C.', ['class' => 'col-form-label-sm']) !!}
                        {!! Form::text('rfc2', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el R.F.C.', 'required','data-validation'=>'custom' ,'data-validation-regexp'=>'^([A-Z,Ñ,&]{3}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))$']) !!}
                    </div>

                </div>
            </div>
             {{-- caompo solo habilitado para comparecencia-empresa --}}
            <div class="col-6">
                <div class="form-group">
                    {!! Form::label('representanteLegal', 'Representante legal', ['class' => 'col-form-label-sm']) !!}
                    {!! Form::text('representanteLegal', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el nombre del representante legal','data-validation'=>'custom' ,'data-validation-regexp'=>'^([A-ZÁÉÑÍÓÚ]|[\s]|[.]){1,300}$']) !!}

                </div>
            </div>
        </div>
    </div>
