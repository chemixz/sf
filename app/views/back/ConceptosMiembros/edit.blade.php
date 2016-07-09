@extends('back.layout')
@section('content')
		<h2>Editar Concepto de -> {{$conceptomiembro->miembro->nombre}} {{$conceptomiembro->miembro->apellido}}</h2>

		<div class="col-sm-4 col-md-offset-4"><!--parte IZQUIERDA-->
			@if(Session::has('message'))  <!--muestra mesaje de suceso que viene del homecontrol-->
                <div class="alert alert-{{ Session::get('class') }} fade in">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                    <p>  {{ Session::get('message') }} </p>
                </div>
            @endif
	        @if($errors->has())               
	             <div class="alert alert-danger fade in">
	             <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
	             @foreach($errors->all() as $error)
	                <p>{{ $error  }}</p>
	             @endforeach
		         </div>
	        @endif
			  <!--los campos pasan al home control dnd seran validados  y en usuario.php son ingresados ala bd-->
				
		     	{{ Form::open(['url'=>'/dashboard/conceptosmiembros/update/'.$conceptomiembro->id,'method'=>'post']) }} <!--formulario de usuario registrarse-->
		
		
			<div class="form-group">
                {{ Form::label('monto','Monto') }}
				{{ Form::text('monto',$conceptomiembro->monto ,['class'=>'form-control', 'placeholder'=>'Ingrese  Nombre'] ) }}
			</div >
			<div class="form-group">
				{{ Form::label('descripcion','Descripción') }}
				{{ Form::textarea('descripcion',$conceptomiembro->descripcion,['class'=>'form-control', 'placeholder'=>'Ingrese La Dirección'] ) }}	
			</div >
			<div class="form-group">
                {{ Form::label('concepto_id','Concepto') }}	
			 <?php foreach ($conceptos as $concepto): ?>
			 	<?php $c[$concepto->id] = $concepto->nombre ?>	
			 <?php endforeach ?>			 
			{{ Form::select('concepto_id', $c,$conceptomiembro->concepto_id,['class'=>'form-control'] ) }}
			</div>
	        {{ Form::submit('Guardar',['class'=>'btn btn-primary'] )}}
			{{ HTML::link('/dashboard/conceptosmiembros/'.$conceptomiembro->miembro->id , '<<Atras',['class'=>'btn btn-danger'] ) }}
			
			{{ Form::close() }}
		</div>



@stop