@extends('back.layout')
@section('content')
		<h1>Editar Metas -> {{$meta->miembro->nombre}} {{$meta->miembro->apellido}} </h1>

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

		     {{ Form::open(['url'=>'/dashboard/miembros/metas/update/'.$meta->id,'method'=>'post']) }} <!--formulario de usuario registrarse-->
		
			<div class="form-group">
                    	{{ Form::label('prioridad','Prioridad') }}
                    	<input class="form-control"  type="number" id="prioridad" name="prioridad" value="{{$meta->prioridad}}" step="1" min="1" max="{{ $maxP }}" required>
                          <input type="hidden" name="maxP" value="{{ $maxP }}">	
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
				{{ Form::textarea('descripcion',$meta->descripcion ,['class'=>'form-control', 'placeholder'=>'Ingrese  descripción'] ) }}
			</div >
			<div class="form-group">
				 {{ Form::label('metabs','Meta en Bsf') }}
				{{ Form::text('metabs',$meta->metabs,['class'=>'form-control', 'placeholder'=>'Ingrese Meta en Bsf'] ) }}	
			</div >
			<div class="form-group">
                    	{{ Form::label('fecha_limite','Tipo') }}
				{{ Form::text('fecha_limite',$meta->fecha_limite,['class'=>'form-control','id'=>'fecha', 'placeholder'=>'Ingrese Fecha Limite'] ) }}
			</div >
			
	        	{{ Form::submit('Guardar',['class'=>'btn btn-primary'] )}}
			{{ HTML::link('/dashboard/miembros/metas/'.$meta->miembro->id , '<<Atras',['class'=>'btn btn-danger'] ) }}
			{{ Form::close() }}
		</div>
  


@stop