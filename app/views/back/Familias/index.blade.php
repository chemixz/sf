@extends('back.layout')
@section('content')

            <?php echo "<pre>"?>
              <?php print_r($familias->foto)  ?> 
            <?php echo "</pre>" ?>

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
                 {{ Form::open(['url'=>'/dashboard/familia/update/'.$familias->id,'method'=>'post', 'file'=>true, 'enctype' => 'multipart/form-data']) }}
				
                <div class="form-group">  
                <input type="file" name="foto" id="foto" value='input::old('foto')'>    
                </div>
                <div class="form-group">
                    <img src="{{URL::to('/')}}/uploads/images/{{$familias->foto}}" alt="{{$familias->nombre}}" title="{{$familias->nombre}}" calss="img-responsive">
                </div>
                <div class="form-group">  
                    {{ Form::label('nombre','Nombre') }}
                    {{ Form::text('nombre',$familias->nombre ,['class'=>'form-control', 'placeholder'=>'Ingrese el nombre de la Familia'] ) }}
                </div>

				<div class="form-group">
                    {{ Form::label('dirección','Dirección') }}
					{{ Form::textarea('dirección',$familias->dirección ,['class'=>'form-control', 'placeholder'=>'Ingrese La Dirección'] ) }}	
				</div>
                <div class="form-group">
                    {{ Form::label('telf','Telefono') }}
					{{ Form::text('telf',$familias->telf ,['class'=>'form-control', 'placeholder'=>'Ingrese telefono '] ) }}	
				</div>
				<div class="form-group">
                    {{ Form::label('estatus','Estatus') }}
					{{ Form::select('estatus',['Activo'=>'Activo' ,'Inactivo'=>'Inactivo' ] ,$familias->estatus,['class'=>'form-control'] ) }}	
				</div >
             	{{ Form::hidden('usuario_id' ,Session::get('id') ) }}
				
                {{ Form::submit('Guardar',['class'=>'btn btn-primary'] )}}
				{{ HTML::link('/dashboard' , 'Atras',['class'=>'btn btn-danger'] ) }}
				
				{{ Form::close() }}
    		</div>
    



@stop