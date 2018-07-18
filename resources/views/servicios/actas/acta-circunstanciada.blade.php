@extends('template.form')

@section('title', 'Actas Circunstanciadas')
@section('content')
<div class="row no-gutters">
    <div class="col-12">
        <div class="boxtwo">
            <div class="row">
                <div id="app" class="col-12">
                    <registro :sistema="'uat'" :tipo="'actascircunstanciadas'" usuario="{{Auth::user()->id}}"></registro>
                </div>
            </div>
        </div>
    </div>
</div>
	
@endsection