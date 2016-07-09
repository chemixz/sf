@extends('back.layout')
@section('content')
		<h2>{{$usuario->nombre}} {{$usuario->apellido}} / Cambiar Contraseña </h2>

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
			
			
		
		     {{ Form::open(['url'=>'/dashboard/misdatos/updatepassword/'.$usuario->id,'method'=>'post']) }} <!--formulario de usuario registrarse-->
			
			<div class="form-group">
                    {{ Form::label( 'aclave', 'Actual Contraseña' ) }}
                    {{ Form::password( 'aclave' , [ 'class' => 'form-control', 'placeholder' => 'Ingrese su clave Actual' ] ) }}
            </div>
	      	<div class="form-group">
                    {{ Form::label( 'nclave', 'Nueva Contraseña' ) }}
                    {{ Form::password( 'nclave' , [ 'class' => 'form-control', 'placeholder' => 'Ingrese su nueva clave' ] ) }}
            </div>
            <div class="form-group">
                    {{ Form::label( 'cclave', 'Confirmar Contraseña' ) }}
                    {{ Form::password( 'cclave' , [ 'class' => 'form-control', 'placeholder' => 'Confirmar su nueva clave' ] ) }}
            </div>
	     	{{ Form::hidden('id' ,$usuario->id ) }}
	        {{ Form::submit('Guardar',['class'=>'btn btn-primary'] )}}
			{{ HTML::link('/dashboard/misdatos/'.$usuario->id , '<<Atras',['class'=>'btn btn-danger'] ) }}
			
			{{ Form::close() }}
		</div>
		



@stop