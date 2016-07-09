@extends('front.layout')


@section('content')

    		<div class="col-sm-7"> <!--parte derecha-->
    			 {{ HTML::image('assets/img/jusuarios.png' ,'Sistema de Finanzas Familiar', ['class'=>'img-responsive','title'=> 'Sistemas de finanzs Familiar' ] ) }}
    		</div>

    		<div class="col-sm-5"><!--parte IZQUIERDA-->
    			<h3>
                    Registros de usuarios
                </h3>

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

			     {{ Form::open(array('url'=>'/home/guardarregistro','method'=>'post')) }} <!--formulario de usuario registrarse-->
					<div class="form-group">  
                         {{ Form::label('nombre','Nombre') }}
                         {{ Form::text('nombre',Input::old('nombre') ,['class'=>'form-control', 'placeholder'=>'Ingrese su Nombre'] ) }}
                    </div>
                    

                    <div class="form-group">
                        {{ Form::label('email','Correo Electronico') }}
						{{ Form::email('email',Input::old('email') ,['class'=>'form-control', 'placeholder'=>'Ingrese su email'] ) }}	
					</div>

					<div class="form-group">
                        {{ Form::label('clave','Contrasena') }}
                        {{ Form::password('clave',['class'=>'form-control', 'placeholder'=>'Ingrese su clave'] ) }}
						
					</div>
                    <div class="form-group">
                        {{ Form::label('cclave','Confirmar su clave') }}
                        {{ Form::password('cclave',['class'=>'form-control', 'placeholder'=>'Confirmar su clave'] ) }}
                        
                    </div>
                    {{ Form::submit('Guardar',['class'=>'btn btn-primary'] )}}
					{{ HTML::link('/' , '<<Atras',['class'=>'btn btn-danger'] ) }}
					
				{{ Form::close() }}
    		</div>
    	
@stop