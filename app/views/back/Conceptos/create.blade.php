@extends('back.layout')
@section('content')
		<h1>Agregar Conceptos</h1>

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

		     {{ Form::open(['url'=>'/dashboard/conceptos/store','method'=>'post']) }} <!--formulario de usuario registrarse-->
		
		
			<div class="form-group">
                    {{ Form::label('nombre','Nombre') }}
					{{ Form::text('nombre',Input::old('nombre') ,['class'=>'form-control', 'placeholder'=>'Ingrese  Nombre'] ) }}
		
			</div >
			
			<div class="form-group">
				 {{ Form::label('descripcion','Descripcion') }}
				{{ Form::textarea('descripcion',Input::old('descripcion'),['class'=>'form-control', 'placeholder'=>'Ingrese La Dirección'] ) }}	
			</div >
			<div class="form-group">
                    {{ Form::label('tipo','Tipo') }}
					{{ Form::select('tipo',['Ingreso'=>'Ingreso' ,'Egreso'=>'Egreso' ] ,'Elija Opcion',['class'=>'form-control'] ) }}	
				</div >
	        {{ Form::submit('Guardar',['class'=>'btn btn-primary'] )}}
			{{ HTML::link('/dashboard/conceptos' , '<<Atras',['class'=>'btn btn-danger'] ) }}
			
			{{ Form::close() }}
		</div>



@stop