@extends('back.layout')
@section('content')
		<h1>Agregar Metas -> {{$miembro->nombre}}</h1>
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
		
		     {{ Form::open(['url'=>'/dashboard/miembros/metas/store/'.$miembro->id,'method'=>'post']) }} <!--formulario de usuario registrarse-->
			<div class="form-group">
                    	{{ Form::label('prioridad','Prioridad') }}
                    	<input type="number" id="prioridad" name="prioridad" value="{{ Input::old('prioridad') }}" min="1" max="{{ $maxP }}" required>
                          <input type="hidden" name="maxP" value="{{ $maxP }}">
                    	<!-- <div class="rateit" data-rateit-backingfld="#prioridad" data-rateit-resetable="true"  data-rateit-ispreset="true"
                    	    data-rateit-min="0" data-rateit-max="10" data-rateit-step="1" >
                    	</div> -->
			</div >
                    <div role="alert" class="alert alert-{{ $maxP > 0 ? 'warning' : 'danger' }}">
                      <strong>Nota:</strong> 
                      @if ($maxP > 0)
                        Aún queda un porcentaje de {{ $maxP }}% para su asignación.
                      @else
                        No queda porcentaje de presupuesto para asignación
                      @endif

                    </div>

			<div class="form-group">
                {{ Form::label('descripcion','Descripción') }}
				{{ Form::textarea('descripcion',Input::old('descripcion') ,['class'=>'form-control', 'placeholder'=>'Ingrese  descripción'] ) }}
	
			</div >
			<div class="form-group">
				{{ Form::label('metabs','Metas En Bsf') }}
				{{ Form::text('metabs',Input::old('metabs'),['class'=>'form-control', 'placeholder'=>'Ingrese En Bsf'] ) }}	
			</div >
			<div class="form-group">
                {{ Form::label('fecha_limite','Fecha Limite') }}
				{{ Form::text('fecha_limite',Input::old('fecha_limite') ,['class'=>'form-control','id'=>'fecha', 'placeholder'=>'Ingrese Fecha Limite'] ) }}
			</div >
			{{ Form::hidden('miembro_id' ,$miembro->id) }}
	        {{ Form::submit('Guardar',['class'=>'btn btn-primary'] )}}
			{{ HTML::link('/dashboard/miembros/metas/'.$miembro->id , '<<Atras',['class'=>'btn btn-danger'] ) }}
			
			{{ Form::close() }}
		</div>



@stop