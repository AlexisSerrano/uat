@extends('template.form')
@section('title', 'Primera invitación')
@section('content')
{{-- {!! Form::open(['route' => '', 'method' => 'POST'])  !!}  --}}
<div class="card">  
    <div class="card-body">
        <div class="row">
            <div class="col-6">
            {!! Form::label('idDenunciante', 'Seleccione al investigado', ['class' => 'col-form-label-sm']) !!}
            <select name="idDenunciante"  class="form-control form-control-sm" required>
                <option value="">Seleccione al investigado</option>
                {{-- @foreach($victimas2 as $victima)
                <option value="{{ $victima->id }}">{{ $victima->nombres." ".$victima->primerAp." ".$victima->segundoAp }}</option>
                @endforeach --}}
            </select>
            </div>
            <div class="col-2">
                    <div class="form-group">
                        {!! Form::label('fechaInvitacion', 'Fecha de invitación', ['class' => 'col-form-label-sm']) !!}
                            {!! Form::date('fechaInvitacion',null , ['class' => 'form-control form-control-sm ', 'data-target' => '#fechaInvitacion', 'required', 'placeholder' => 'AAAA/MM/DD']) !!} 
                             
                    </div>
                </div>
                <div class="col-2">
                        <div class="form-group">
                            {!! Form::label('horaInvitacion', 'Hora', ['class' => 'col-form-label-sm']) !!}
                            <div class="input-group date" id="horadeli" data-target-input="nearest">
                                {!! Form::text('horaInvitacion',  'hora', ['class' => 'form-control form-control-sm', 'data-target' => '#horadeli', 'required', 'placeholder' => '00:00', 'id'=>'horaInvitacion']) !!}
                                <div class="input-group-addon" data-target="#horadeli">
                                    <div class="input-group-text"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

        </div>	
    </div>
</div>

<div class="col text-right">
    <button class="btn btn-primary">Imprimir</button>
</div>

@endsection
