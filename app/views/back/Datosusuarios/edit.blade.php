@extends('back.layout')
@section('content')
		<h2>{{$usuario->nombre}} {{$usuario->apellido}} / Editar Datos </h2>

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
			
			
		
		     {{ Form::open(['url'=>'/dashboard/misdatos/update/'.$usuario->id,'method'=>'post']) }} <!--formulario de usuario registrarse-->
			
			<div class="form-group">  
	            {{ Form::label('nombre','Nombre') }}
	            {{ Form::text('nombre',$usuario->nombre ,['class'=>'form-control', 'placeholder'=>'Ingrese nombre del miembro'] ) }}
	        </div>
	        <div class="form-group">
	            {{ Form::label('email','Correo Electronico') }}
				{{ Form::email('email',$usuario->email ,['class'=>'form-control', 'placeholder'=>'login@ejemplo.com'] ) }}
			</div>
			<div class="form-group">
	            {{ Form::label('estatus','Estatus') }}
				{{ Form::select('estatus',['Activo'=>'Actvo','Inactivo'=>'Inactivo'],'$usuario->estatus',['class'=>'form-control'] ) }}
			</div >
	     	{{ Form::hidden('id' ,$usuario->id ) }}
	        {{ Form::submit('Guardar',['class'=>'btn btn-primary'] )}}
			{{ HTML::link('/dashboard/misdatos/'.$usuario->id , '<<Atras',['class'=>'btn btn-danger'] ) }}
			
			{{ Form::close() }}
		</div>
		



@stop