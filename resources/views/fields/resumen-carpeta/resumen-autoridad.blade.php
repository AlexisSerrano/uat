<div class="row">
        <div class="col-4">
                <div class="form-group">
                    {!! Form::label('nombres', 'Nombre: ', ['class' => 'col-form-label-sm detalle ']) !!}
                    {!!Form::label('nombre',null ,['class'=> 'col-form-label-sm '])!!}
                    {!!Form::label('primerAp',null ,['class'=> 'col-form-label-sm '])!!}
                    {!!Form::label('segundoAp',null ,['class'=> 'col-form-label-sm '])!!}
                </div>
            </div>  
            <div class="col-4">
                <div class="form-group">
                    {!! Form::label('sexo', 'Sexo: ', ['class' => 'col-form-label-sm detalle'])!!}
                    {!!Form::label('nombre',null ,['class'=> 'col-form-label-sm '])!!}
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    {!! Form::label('rfc', 'R.F.C.: ', ['class' => 'col-form-label-sm detalle']) !!}
                    {!!Form::label('SUBP940208Q15' ,null,['class'=> 'col-form-label-sm '])!!}
                </div>
            </div>
            <div class="col-4">
                    <div class="form-group">
                        {!! Form::label('curp', 'C.U.R.P.: ', ['class' => 'col-form-label-sm detalle']) !!}
                        {!!Form::label('curp',null ,['class'=> 'col-form-label-sm '])!!}
                    </div>
                </div>
            <div class="col-4">
                    <div class="form-group">
                        {!! Form::label('fechaNacimiento', 'Fecha de nacimiento: ', ['class' => 'col-form-label-sm detalle']) !!}
                        {!!Form::label('02/02/02',null ,['class'=> 'col-form-label-sm '])!!}	
                    </div>
                </div>
                <div class="col-4">
                        <div class="form-group">
                            {!! Form::label('nacionalidad', 'nacionalidad: ', ['class' => 'col-form-label-sm detalle']) !!}
                            {!!Form::label('nacionalidad',null ,['class'=> 'col-form-label-sm '])!!}
                        </div>
                    </div>
        <div class="col-4">
            <div class="form-group">
                {!! Form::label('telefono1', 'Teléfono: ', ['class' => 'col-form-label-sm detalle']) !!}
                {!!Form::label('8413060',null ,['class'=> 'col-form-label-sm '])!!}
            </div>
        </div>
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
                    {!! Form::label('docIdentificacion', 'Documento de identificación: ', ['class' => 'col-form-label-sm detalle']) !!}
                    {!!Form::label('nombre',null ,['class'=> 'col-form-label-sm '])!!}
                </div>
            </div>
        
            <div class="col-4">
                <div class="form-group">
                    {!! Form::label('numDocIdentificacion', 'Núm. identificación: ', ['class' => 'col-form-label-sm detalle']) !!}
                    {!!Form::label('doc',null ,['class'=> 'col-form-label-sm '])!!}
                </div>
            </div>
        
            <div class="col-4">
                <div class="form-group">
                    {!! Form::label('idRazon', 'Razón:', ['class' => 'col-form-label-sm detalle']) !!}
                    {!!Form::label('razon',null ,['class'=> 'col-form-label-sm '])!!}
                </div>
            </div>
            {{-- terminan datos generales de persona --}}
    
            <div class="col-4">
                    <div class="form-group">
                        {!! Form::label('etnia', 'Etnia:', ['class' => 'col-form-label-sm detalle']) !!}
                        {!!Form::label('Etnia',null ,['class'=> 'col-form-label-sm '])!!}
                    </div>
                </div>
            <div class="col-4">
                    <div class="form-group">
                        {!! Form::label('lengua', 'Lengua:', ['class' => 'col-form-label-sm detalle']) !!}
                        {!!Form::label('Lengua',null ,['class'=> 'col-form-label-sm '])!!}
                </div>
            </div>
            <div class="col-4">
                    <div class="form-group">
                    {!! Form::label('ocupacion', 'Ocupacion:', ['class' => 'col-form-label-sm detalle']) !!}
                    {!!Form::label('ocupacion',null ,['class'=> 'col-form-label-sm '])!!}
                </div>
            </div>
            <div class="col-4">
                    <div class="form-group">
                    {!! Form::label('estCivil', 'Estado civil:', ['class' => 'col-form-label-sm detalle']) !!}
                    {!!Form::label('casado',null ,['class'=> 'col-form-label-sm '])!!}
                </div>
            </div>
            <div class="col-4">
                    <div class="form-group">
                    {!! Form::label('religion', 'Religion', ['class' => 'col-form-label-sm detalle']) !!}
                    {!!Form::label('religion',null ,['class'=> 'col-form-label-sm '])!!}
                </div>
            </div>
            <div class="col-4">
                    <div class="form-group">
                    {!! Form::label('escolaridad', 'Escolaridad', ['class' => 'col-form-label-sm detalle']) !!}
                    {!!Form::label('escolaridad',null ,['class'=> 'col-form-label-sm '])!!}
                </div>
            </div>
            <div class="col-12" style="text-align:center">
                    <p><h5 class="detalle">Dirección del trabajo</p></h5></div>
                    <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('lugarTrabajo', 'Lugar', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('lugarTrabajo', null, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('telefonoTrabajo', 'Teléfono', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('telefonoTrabajo', null, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>
                        <div class="col-12">
                                <div class="form-group">
                                    {!! Form::label('direccionTrabajo', 'Direccion del trabajo', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!! Form::label('entidadFederativa', null, ['class' => 'col-form-label-sm']) !!}
                                    {!! Form::label('municipio',null , ['class' => 'col-form-label-sm ']) !!}
                                    {!! Form::label('localidad', null, ['class' => 'col-form-label-sm']) !!}
                                    {!! Form::label('colonia', null, ['class' => 'col-form-label-sm']) !!}
            
                                </div>
                            </div>
                            <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('calle', 'Calle. ', ['class' => 'col-form-label-sm detalle']) !!}
                                        {!! Form::label('12', null, ['class' => 'col-form-label-sm']) !!}
                                    </div>
                                </div>
                                <div class="col-2">
                                        <div class="form-group">
                                            {!! Form::label('cp', 'CP', ['class' => 'col-form-label-sm detalle']) !!}
                                            {!! Form::label('12', null, ['class' => 'col-form-label-sm']) !!}
                                        </div>
                                    </div>
                            <div class="col-2">
                                    <div class="form-group">
                                        {!! Form::label('num.Ext', 'Núm.Ext. ', ['class' => 'col-form-label-sm detalle']) !!}
                                        {!! Form::label('12', null, ['class' => 'col-form-label-sm']) !!}
                                    </div>
                                </div>
                                <div class="col-2">
                                        <div class="form-group">
                                            {!! Form::label('num.Int', 'Núm.Int. ', ['class' => 'col-form-label-sm detalle']) !!}
                                            {!! Form::label('12', null, ['class' => 'col-form-label-sm']) !!}
                                        </div>
                                    </div>
                                    <div class="col-12" style="text-align:center">
                                            <p><h5 class="detalle">Datos de autoridad</p></h5></div>
                                    <div class="col-4">
                                            <div class="form-group">
                                                {!! Form::label('antiguedad', 'Antigüedad (Años)', ['class' => 'col-form-label-sm detalle']) !!}
                                                {!! Form::label('antiguedad', null, ['class' => 'col-form-label-sm']) !!}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                {!! Form::label('rango', 'Rango', ['class' => 'col-form-label-sm detalle']) !!}
                                                {!! Form::label('rango', null,['class' => 'col-form-label-sm']) !!}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                {!! Form::label('horarioLaboral', 'Horario laboral', ['class' => 'col-form-label-sm detalle']) !!}
                                                {!! Form::label('horarioLaboral', null, ['class' => 'col-form-label-sm']) !!}
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                {!! Form::label('narracion', 'Narración', ['class' => 'col-form-label-sm detalle']) !!}
                                                {!! Form::label('narracion', null, ['class' => 'col-form-label-sm']) !!}
                                            </div>
                                        </div>	
</div>