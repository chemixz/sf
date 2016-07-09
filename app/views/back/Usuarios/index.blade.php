@extends('back.layout')
@section('content')
	<h1>Usuarios</h1>
		
		<div class="row">
			
			<div class="col-sm-12">
				<!-- <a href="{{URL::to('/dashboard/miembros/create/')}}" class="btn btn-success" alt="Agregar Miembro Familiar" title="Agregar Miembro Familiar">
					<span class="glyphicon glyphicon-edit"></span>&nbsp; Agregar Miembro Familiar
				</a> -->
				<a href="{{URL::to('/dashboard')}}" class="btn btn-warning" alt="Agregar Miembro Familiar" title="Agregar Miembro Familiar">
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

					@if (count($usuarios)>0)

					<table class="table">
						<thead>
							<tr>
								<th width="15%">Nombre</th>
								<th width="15%">Email</th>
								<th width="15%">Rol</th>
								<th width="15%">Estatus</th>
								<th width="40%"  class="text-right">Acciones</th>
							</tr>
						</thead>	

						<tbody>
					@foreach ($usuarios as $Us)
						<tr>
							<td>{{$Us->nombre}}</td>
							<td>{{$Us->email}}</td>
							<td>{{$Us->rol}}</td>
							<td>{{$Us->estatus}}</td>
							<td class="text-right">
								<a href="{{URL::to('/dashboard/usuarios/resetear') }}/{{ $Us->id }}" class="btn btn-success cclave" alt="Default Password" title="Default Password">
									<span class="glyphicon glyphicon-refresh"></span>
								</a>
								<a href="{{URL::to('/dashboard/usuarios/edit') }}/{{ $Us->id }}" class="btn btn-primary" alt="Modificar" title="Modificar" >
									<span class="glyphicon glyphicon-edit"></span>
								</a>
							
								<a href="{{URL::to('/dashboard/usuarios/destroy')}}/{{$Us->id}}" class="btn btn-danger eliminar" alt="Eliminar" title="Eliminar">
									<span class="glyphicon glyphicon-trash"></span>
								</a>
							</td>
						</tr>
						
					@endforeach
						</tbody>
					</table>
					@else
						<h3>No hay Miembros Registrados</h3>
					@endif

						
				</div>
			</div>
	
@endsection