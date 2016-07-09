@extends('back.layout')
@section('content')
	<h3>Miembros de la Familia {{ !empty($familia[0]->nombre) ? $familia[0]->nombre : 'No se han agregado datos de la familia' }}</h3>
		<div class="row">
			<div class="col-sm-12">
				@if (!empty($familia[0]->nombre))
				<a href="{{URL::to('/dashboard/miembros/create/')}}" class="btn btn-success" alt="Agregar Miembro Familiar" title="Agregar Miembro Familiar">
					<span class="glyphicon glyphicon-edit"></span>&nbsp; Agregar Miembro Familiar
				</a>
				@else
				<a href="{{URL::to('/dashboard/familia')}}" class="btn btn-danger" alt="Agregar datos de Familia" title="Agregar datos de Familia">
					<span class="glyphicon glyphicon-edit"></span>&nbsp; Agregar datos de Familia
				</a>
				@endif
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

					@if (count($miembros)>0)

					<table class="table">
						<thead>
							<tr>
								<th width="15%">Foto</th>
								<th width="15%">Nombre</th>
								<th width="15%">Apellido</th>
								<th width="15%">Parentesco</th>
								<th width="10%">Estatus</th>
								<th width="15%" class="text-right" >Acciones</th>
							</tr>
						</thead>	

						<tbody>
					@foreach ($miembros as $m)
						<tr>
							<td><img src="{{URL::to('/')}}/uploads/images/{{$m->foto}}" alt="{{$m->nombre}} {{$m->apellido}}" title="{{$m->nombre}} {{$m->apellido}}" class="img-responsive antigua-foto"></td>
							<td>{{$m->nombre}}</td>
							<td>{{$m->apellido}}</td>
							<td>{{$m->parentesco}}</td>
							<td>{{$m->estatus}}</td>
							<td class="text-right">
								<a href="{{URL::to('/dashboard/miembros/edit') }}/{{ $m->id }}" class="btn btn-primary" alt="Modificar" title="Modificar" >
									<span class="glyphicon glyphicon-edit"></span>
								</a>
								
								<a href="{{URL::to('/dashboard/miembros/metas/')}}/{{$m->id}}" class="btn btn-info" alt="Metas" title="Metas" >
									<span class="glyphicon glyphicon-bookmark"></span>
								</a>
								<a href="{{URL::to('/dashboard/conceptosmiembros') }}/{{$m->id}}" class="btn btn-warning" alt="Presupuesto Mensual" title="Presupuesto Mensual" >
									<span class="glyphicon glyphicon-usd"></span>
								</a>
								<a href="{{URL::to('/dashboard/miembros/destroy')}}/{{$m->id}}" class="btn btn-danger eliminar" alt="Eliminar" title="Eliminar">
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