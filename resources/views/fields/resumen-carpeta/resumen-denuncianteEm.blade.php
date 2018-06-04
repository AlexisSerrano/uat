<div class="card-header">
        <div class="row">
            <div class="col text-left"><h5>Denunciante</h5></div>
            <div class="col text-right">
                <a class="btn btn-secondary" >Ampliaciones <i class="fa fa-plus-square" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <card class="card-body">
        <div class="row">
            <div class="col-8">
                <div class="form-group">
                    {!! Form::label('nombres2', 'Nombre', ['class' => 'detalle col-form-label-sm']) !!}
                    {!! Form::label('nombres2', null, ['class' => ' col-form-label-sm']) !!}
                </div>
            </div>
        
            <div class="col-8">
                    <div class="form-group">
                        {!! Form::label('fechaAltaEmpresa', 'Fecha de alta de la empresa', ['class' => 'detalle col-form-label-sm']) !!}
                        {{-- <input type="date" id="fechaAltaEmpresa" value="{{fechaNac}}" name="fechaNacimiento" class="col-form-label-sm" data-validation="required"> --}}
                        {!! Form::label('fechaNacimiento',null , ['class' => 'col-form-label-sm']) !!} 	
                    </div>
                </div>
        
            <div class="col-4">
                <div class="form-group">
                            {!! Form::label('rfc2', 'R.F.C.', ['class' => ' detalle col-form-label-sm']) !!}
                            {!! Form::label('rfc2', null, ['class' => 'col-form-label-sm']) !!}
                </div>
            </div>
        
            <div class="col-4">
                <div class="form-group">
                    {!! Form::label('representanteLegal', 'Representante legal', ['class' => 'detalle col-form-label-sm']) !!}
                    {!! Form::label('representanteLegal',  null, ['class' => 'col-form-label-sm']) !!}
                </div>
            </div>
            <div class="col-12" style="text-align:center">
                <p><h5 class="detalle">Dirección</p></h5></div>
                <div class="col-4">
                    <div class="form-group">
                        {!! Form::label('idEstado', 'Entidad federativa: ', ['class' => 'col-form-label-sm detalle']) !!}
                        {!!Form::label('veracruz',null ,['class'=> 'col-form-label-sm '])!!}
                        
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        {!! Form::label('idMunicipio', 'Municipio: ', ['class' => 'col-form-label-sm detalle']) !!}
                        {!!Form::label('municipio',null ,['class'=> 'col-form-label-sm '])!!}
                        
                    </div>
                </div>
            
                <div class="col-4">
                    <div class="form-group">
                        {!! Form::label('idLocalidad', 'Localidad: ', ['class' => 'col-form-label-sm detalle']) !!}
                        {!!Form::label('localidad',null ,['class'=> 'col-form-label-sm '])!!}
                    </div>
                </div>
                        
                <!--Codigo Postal-->
                <div class="col-4">
                    <div class="form-group">
                        {!! Form::label('cp', 'Código postal :', ['class' => 'col-form-label-sm detalle ']) !!}
                        {!!Form::label('nombre',null ,['class'=> 'col-form-label-sm '])!!}
                    </div>
                </div>
            
                    <!--colonia-->
                <div class="col-4">
                    <div class="form-group">
                        {!! Form::label('idColonia', 'Colonia: ', ['class' => 'col-form-label-sm detalle']) !!}
                        {!!Form::label('colonia',null ,['class'=> 'col-form-label-sm '])!!}
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        {!! Form::label('calle', 'Calle: ', ['class' => 'col-form-label-sm detalle']) !!}
                        {!!Form::label('calle',null ,['class'=> 'col-form-label-sm '])!!}
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        {!! Form::label('numExterno', 'Núm.: ', ['class' => 'col-form-label-sm detalle']) !!}
                        {!!Form::label('15',null,['class'=> 'col-form-label-sm '])!!}
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        {!! Form::label('numInterno1', 'Núm.Int.: ', ['class' => 'col-form-label-sm detalle']) !!}
                        {!!Form::label('12',null ,['class'=> 'col-form-label-sm '])!!}
                    </div>
                </div>
                <div class="col-12" style="text-align:center">
                    <p><h5 class="detalle">Domicilio para notificaciones</p></h5></div>
                    <div class="col-4">
                        <div class="form-group">
                            {!! Form::label('idEstado', 'Entidad federativa: ', ['class' => 'col-form-label-sm detalle']) !!}
                            {!!Form::label('veracruz',null ,['class'=> 'col-form-label-sm '])!!}
                            
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            {!! Form::label('idMunicipio', 'Municipio: ', ['class' => 'col-form-label-sm detalle']) !!}
                            {!!Form::label('municipio',null ,['class'=> 'col-form-label-sm '])!!}
                            
                        </div>
                    </div>
                
                    <div class="col-4">
                        <div class="form-group">
                            {!! Form::label('idLocalidad', 'Localidad: ', ['class' => 'col-form-label-sm detalle']) !!}
                            {!!Form::label('localidad',null ,['class'=> 'col-form-label-sm '])!!}
                        </div>
                    </div>
                            
                    <!--Codigo Postal-->
                    <div class="col-4">
                        <div class="form-group">
                            {!! Form::label('cp', 'Código postal :', ['class' => 'col-form-label-sm detalle ']) !!}
                            {!!Form::label('nombre',null ,['class'=> 'col-form-label-sm '])!!}
                        </div>
                    </div>
                
                        <!--colonia-->
                    <div class="col-4">
                        <div class="form-group">
                            {!! Form::label('idColonia', 'Colonia: ', ['class' => 'col-form-label-sm detalle']) !!}
                            {!!Form::label('colonia',null ,['class'=> 'col-form-label-sm '])!!}
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            {!! Form::label('calle', 'Calle: ', ['class' => 'col-form-label-sm detalle']) !!}
                            {!!Form::label('calle',null ,['class'=> 'col-form-label-sm '])!!}
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            {!! Form::label('numExterno', 'Núm.: ', ['class' => 'col-form-label-sm detalle']) !!}
                            {!!Form::label('15',null,['class'=> 'col-form-label-sm '])!!}
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            {!! Form::label('numInterno1', 'Núm.Int.: ', ['class' => 'col-form-label-sm detalle']) !!}
                            {!!Form::label('12',null ,['class'=> 'col-form-label-sm '])!!}
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            {!! Form::label('correo', 'Correo', ['class' => ' detalle col-form-label-sm']) !!}
                            {!! Form::label('correo', null, ['class' => 'col-form-label-sm']) !!}
                        </div>
                    </div>
        
        </div>
    </card>
