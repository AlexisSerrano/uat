@extends('template.form')
@section('title', 'Oficio a Centro de atención a víctimas')
@section('content')
{!! Form::open(['route' => 'store.oficioCavd', 'method' => 'POST'])  !!} 
<div class="card">  
    <div class="card-body">
        <div class="row">
    <div class="col-4">
        <div class="form-group">
            {!! Form::label('unidadCavd', 'Unidad a la que se dirige el oficio:', ['class' => 'col-form-label-sm']) !!}
            {!! Form::text('unidadCavd', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Unidad a la que se dirige el oficio']) !!}
        </div>
    </div>
    
    <div class="col-4">
            <div class="form-group">
                {!! Form::label('victima3', 'Víctima/Ofendido', ['class' => 'col-form-label-sm']) !!}
                {!! Form::select('victima3', $victimas,null,['class' => ' js-example-basic-multiple' ,'multiple'=>'multiple'   ]) !!}
            </div>
    </div>
</div>	
    </div>
</div>

<div class="col text-right">

        <button class="btn btn-primary">Imprimir Oficio</button>
</div>

@endsection
@push('scripts')
<script>
  $(document).ready(function() {
      $('#victima3').select2({
             selectOnClose: true
                  });
       
      
  });
//     $('.js-example-basic-multiple').select2();
    
//     $("#victima3").onclick(function(event){
 
//             

// });
// });
</script>
@endpush