@extends('template.form')

@section('title', 'Actas de hechos')
@section('content')
<div class="row no-gutters">
    <div class="col-12">
        <div class="boxtwo">
            <div class="row">
                <div id="app" class="col-12">
                    <registro :sistema="'uat'" :tipo="'actashechos'" usuario="{{Auth::user()->id}}"></registro>
                </div>
            </div>
        </div>
    </div>
</div>
	
@endsection