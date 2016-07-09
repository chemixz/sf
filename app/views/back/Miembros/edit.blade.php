@extends('back.layout')
@section('content')
		<h1>Editar Miembro -> {{$miembro->nombre}}</h1>

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
		
		     {{ Form::open(['url'=>'/dashboard/miembros/update/'.$miembro->id,'method'=>'post', 'file'=>true, 'enctype' => 'multipart/form-data']) }}
			<div class="form-group">  
				<input type="file" name="foto" id="foto" value='input::old('foto')'>	
	        </div>
        	<div class="form-group">
        		<img src="{{URL::to('/')}}/uploads/images/{{$miembro->foto}}" alt="{{$miembro->nombre}} {{$miembro->apellido}}" title="{{$miembro->nombre}} {{$miembro->apellido}}" calss="img-responsive">
        	</div>
			<div class="form-group">  
	            {{ Form::label('nombre','Nombre') }}
	            {{ Form::text('nombre',$miembro->nombre ,['class'=>'form-control', 'placeholder'=>'Ingrese nombre del miembro'] ) }}
	     
	        </div>

			<div class="form-group">
	            {{ Form::label('apellido','Apellido') }}
				 {{ Form::text('apellido',$miembro->apellido ,['class'=>'form-control', 'placeholder'=>'Ingrese apellido del miembro'] ) }}
			</div>
	        <div class="form-group">
	            {{ Form::label('email','Correo Electronico') }}
				{{ Form::email('email',$miembro->email ,['class'=>'form-control', 'placeholder'=>'login@ejemplo.com'] ) }}
			</div>
			<div class="form-group">
	            {{ Form::label('telf','Telefono') }}
				{{ Form::text('telf',$miembro->telf ,['class'=>'form-control', 'placeholder'=>'12345678'] ) }}
			</div >
			<div class="form-group">
	            {{ Form::label('parentesco','Parentesco') }}

			{{ Form::select('parentesco',['Padre'=> 'Padre','Madre'=>'Madre','Hij@'=>'Hij@','Herman@'=>'Herman@','Prim@'=>'Prim@','Ti@'=>'Ti@','Abuel@'=>'Abuel@','Otro'=>'Otro'],$miembro->parentesco,['class'=>'form-control'] ) }}
			
			</div >
			<div class="form-group">
	            {{ Form::label('estatus','Estatus') }}
			
			{{ Form::select('estatus',['Activo'=> 'Actvo','Inactivo'=>'Inactivo'],$miembro->estatus,['class'=>'form-control'] ) }}
			
			</div >
	     	{{ Form::hidden('familia_id' ,Session::get('familia_id') ) }}
	        {{ Form::submit('Guardar',['class'=>'btn btn-primary'] )}}
			{{ HTML::link('/dashboard/miembros' , '<<Atras',['class'=>'btn btn-danger'] ) }}
			
			{{ Form::close() }}
		</div>
		



@stop