

        {{-- empresa --}}

        <div class="col-12" id="personaMoral">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            {!! Form::label('nombres2', 'Nombre', ['class' => 'col-form-label-sm']) !!}
            {!! Form::text('nombres2', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el nombre', 'required','data-validation'=>'custom' ,'data-validation-regexp'=>'^(([A-ZÁÉÑÍÓÚ]|[0-9])(-|,|.|\s)*){1,100}$']) !!}
                        </div>
                    </div>
                    
                    <div class="col-6">
                        <div class="row no-gutters">
                            
                                {!! Form::label('rfc2', 'R.F.C.', ['class' => 'col-form-label-sm']) !!}
                                {!! Form::text('rfc2', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el R.F.C.', 'required','data-validation'=>'custom' ,'data-validation-regexp'=>'^([A-Z,Ñ,&]{3}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))$']) !!}
                           
    
                        </div>
                    </div>
                </div>
            </div>
