@extends('back.layout')
@section('content')
	<h3>Presupuesto Mensual del miembro -> {{$miembro->nombre}} {{$miembro->apellido}}</h3>
		
		<div class="row">
			<div class="col-sm-12">
				<a href="{{URL::to('/dashboard/conceptosmiembros/create/')}}/{{ $miembro->id }}" class="btn btn-success" alt="Agregar Concepto" title="Agregar Concepto">
					<span class="glyphicon glyphicon-edit"></span>&nbsp; Agregar Concepto 
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

					@if (count($conceptomiembro)>0)

					<table class="table">
						<thead>
							<tr>
								<th width="20%">Monto</th>
								<th width="20%">Descripción</th>
								<th width="20%">Concepto</th>
								<th width="20%" class="text-right">Acciones</th>
							</tr>
						</thead>	
					@foreach ($conceptomiembro as $CM)
						<tbody>
					
						<tr>
						
							<td>{{$CM->monto}}</td>
							<td>{{$CM->descripcion}}</td>
							<td>
								@if ($CM->concepto->tipo=='Egreso')
									<span class='pmenor'>
										{{$CM->concepto->nombre}}
									</span>
								@else
									<span class='pmayor'>
										{{$CM->concepto->nombre}}
									</span>
								@endif
								
							</td>
							<td class="text-right">
								<a href="{{URL::to('/dashboard/conceptosmiembros/edit') }}/{{ $CM->id }}" class="btn btn-primary" alt="Modificar" title="Modificar" id="modificar" >
									<span class="glyphicon glyphicon-edit"></span>
								</a>
								<a href="{{URL::to('/dashboard/conceptosmiembros/destroy') }}/{{ $CM->id }}" class="btn btn-danger eliminar" alt="Eliminar" title="Eliminar" >
									<span class="glyphicon glyphicon-trash"></span>
								</a>
								
							</td>
						</tr>
						
					@endforeach
						</tbody>
					</table>
					@else
						<h3>No hay Conceptos Creados Para Este Miembro</h3>
					@endif

						
				</div>
			</div>
	
@endsection