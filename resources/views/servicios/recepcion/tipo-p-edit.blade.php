 <!---tipo de persona-->
        <div class="col-md-4 mb-3">
            <label class="col-form-labe "  for="formGroupExampleInput" >¿Es empresa?</label>
            <div class="clearfix"></div>
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="">
                    {{ Form::radio('esEmpresa', 1, $preregistro->esEmpresa,['class'=>"form-check-input"]) }}
                    <!--input class="form-check-input" type="radio" id="esEmpresa1" name="esEmpresa" value= required--> Sí
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label col-form-label col-form-label-sm">
                    {{ Form::radio('esEmpresa', 0, $preregistro->esEmpresa, ['class'=>"form-check-input"]) }}
                    <!--input class="form-check-input" type="radio" id="esEmpresa2" name="esEmpresa" value="0" required--> No
                </label>
            </div>
            <div class="invalid-feedback">
                Debe seleccionar alguno.
            </div>
        </div>