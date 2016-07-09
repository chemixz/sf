@extends('back.layout')
@section('content')
	<h1>Metas -> {{$miembro->nombre }} {{$miembro->apellido }}</h1>
		
		<div class="row">
			<div class="col-sm-12">
				<a href="{{URL::to('/dashboard/miembros/metas/create')}}/{{ $miembro->id }}"  class="btn btn-success" alt="Agregar Meta" title="Agregar Meta ">
					<span class="glyphicon glyphicon-edit"></span>&nbsp;  Agregar Meta 
				</a>
				<a href="{{URL::to('/dashboard/miembros')}}" class="btn btn-warning" alt="Atras" title="Atras">
					<span class="glyphicon glyphicon-chevron-left"></span>&nbsp; Atras 
				</a>
			</div>
			
			<div class="col-sm-12">
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

			</div>
			<div class="col-sm-12">

					@if (count($metas)>0)

					<table class="table">
						<thead>
							<tr>
								<th width="20%">Prioridad</th>
								<th width="40%">Descripción</th>
								<th width="10%">Metas Bf</th>
								<th width="10%">Fecha Limite</th>
								<th width="20%" class="text-right">Acciones</th>
							</tr>
						</thead>	
						<tbody>
					@foreach ($metas as $M)
						<tr>
							<td>
								<div class="rateit" data-rateit-step="0.1" data-rateit-min="0" data-rateit-max="10" data-rateit-value="{{$M->prioridad/10}}" data-rateit-ispreset="true" data-rateit-readonly="true"></div>&nbsp;&nbsp;<strong>{{$M->prioridad}}%</strong>
							</td>
							<td>{{$M->descripcion}}</td>
							<td>{{$M->metabs}}</td>
							<td>{{$M->fecha_limite}}</td>
							<td class="text-right">
								<a href="{{URL::to('/dashboard/miembros/metas/edit') }}/{{ $M->id }}/{{ $miembro->id }}" class="btn btn-primary" alt="Modificar" title="Modificar" id="modificar" >
									<span class="glyphicon glyphicon-edit"></span>
								</a>
								<a href="{{URL::to('/dashboard/miembros/metas/destroy') }}/{{ $M->id }}" class="btn btn-danger" alt="Eliminar eliminar" title="Eliminar" >
									<span class="glyphicon glyphicon-trash"></span>
								</a>
								
							</td>
						</tr>
					@endforeach
						</tbody>
					</table>
					@else
						<h3>No hay Metas Creadas</h3>
					@endif

						
				</div>
			</div>
	
@endsection