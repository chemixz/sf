@extends('back.layout')
@section('content')
	<h1>Datos De {{$usuario->nombre}} {{$usuario->apellido}}</h1>
		
		<div class="row">
			<div class="col-sm-12">
				
				<a href="{{URL::to('/dashboard/')}}" class="btn btn-warning" alt="Atras" title="Atras">
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

					

					<table class="table">
						<thead>
							<tr>
								<th width="30%">Nombre</th>
								<th width="30%">Email</th>
								<!-- <th width="15%">Rol</th> -->
								<th width="30%">Estatus</th>
								<th width="10%" class="text-right">Acciones</th>
							</tr>
						</thead>	

						<tbody>
			
						<tr>
							
							<td>{{$usuario->nombre}}</td>
							<td>{{$usuario->email}}</td>
							<!-- <td>{{$usuario->rol}}</td> -->
							<td>{{$usuario->estatus}}</td>
							<td class="text-right">
								<a href="{{URL::to('/dashboard/misdatos/editpassword') }}/{{ $usuario->id }}" class="btn btn-success" alt="Cambiar Mi clave" title="Cambiar Mi clave" >
									<span class="glyphicon glyphicon-refresh"></span>
								</a>
								<a href="{{URL::to('/dashboard/misdatos/edit') }}/{{ $usuario->id }}" class="btn btn-primary" alt="Modificar" title="Modificar" >
									<span class="glyphicon glyphicon-edit"></span>
								</a>
								<!-- <a href="{{URL::to('/dashboard/usuarios/misdatos/destroy')}}/{{$usuario->id}}" class="btn btn-danger" alt="Eliminar" title="Eliminar" id="eliminar">
									<span class="glyphicon glyphicon-trash"></span>
								</a> -->
							</td>
						</tr>
						
			
						</tbody>
					</table>
				

						
				</div>
			</div>
	
@endsection