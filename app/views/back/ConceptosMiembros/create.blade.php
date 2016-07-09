@extends('back.layout')
@section('content')
		<h2>Agregar Conceptos para -> {{$miembro->nombre}} {{$miembro->apellido}}</h2>

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
			
		    {{ Form::open(['url'=>'/dashboard/conceptosmiembros/store/'.$miembro->id,'method'=>'post']) }} <!--formulario de usuario registrarse-->
		
		
			<div class="form-group">
				
                {{ Form::label('monto','Monto') }}
				{{ Form::text('monto',Input::old('monto') ,['class'=>'form-control', 'placeholder'=>'Ingrese  monto'] ) }}
		
			</div >
			
			<div class="form-group">
				{{ Form::label('descripcion','Descripción') }}
				{{ Form::textarea('descripcion',Input::old('descripcion'),['class'=>'form-control', 'placeholder'=>'Ingrese La descripcion'] ) }}	
			</div >
			<div class="form-group">
                {{ Form::label('concepto_id','Concepto') }}	
				 <select class="form-control" name="concepto_id">
	                <option></option>
	              
	                @foreach ($conceptos as $Con)
	                    <option value='{{ $Con->id }}'> {{ $Con->nombre }} </option>
	                @endforeach  
	             </select>
					
			</div >
			{{ Form::hidden('miembro_id' ,$miembro->id) }}
	        {{ Form::submit('Guardar',['class'=>'btn btn-primary'] )}}
			{{ HTML::link('/dashboard/conceptosmiembros/'.$miembro->id , '<<Atras',['class'=>'btn btn-danger'] ) }}
			
			{{ Form::close() }}
		</div>



@stop