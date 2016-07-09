@extends('back.layout')
@section('content')
	<h1>Conceptos</h1>
		
		<div class="row">
			<div class="col-sm-12">
				<a href="{{URL::to('/dashboard/conceptos/create/')}}" class="btn btn-success" alt="Agregar Concepto" title="Agregar Concepto">
					<span class="glyphicon glyphicon-edit"></span>&nbsp; Agregar Concepto 
				</a>
				<a href="{{URL::to('/dashboard')}}" class="btn btn-warning" alt="Atras" title="Atras">
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

					@if (count($conceptos)>0)

					<table class="table">
						<thead>
							<tr>
								<th width="25%">Nombre</th>
								<th width="25%">Tipo</th>
								<th width="25%" class="text-right">Acciones</th>
							</tr>
						</thead>	
					@foreach ($conceptos as $C)
						<tbody>
					
						<tr>
						
							<td>{{$C->nombre}}</td>
							<td>{{$C->tipo}}</td>
							<td class="text-right">
								<a href="{{URL::to('/dashboard/conceptos/edit') }}/{{ $C->id }}" class="btn btn-primary" alt="Modificar" title="Modificar" id="modificar" >
									<span class="glyphicon glyphicon-edit"></span>
								</a>
								<a href="{{URL::to('/dashboard/conceptos/destroy') }}/{{ $C->id }}" class="btn btn-danger eliminar" alt="Eliminar" title="Eliminar" >
									<span class="glyphicon glyphicon-trash"></span>
								</a>
								
							</td>
						</tr>
						
					@endforeach
						</tbody>
					</table>
					@else
						<h3>No hay Conceptos Registrados</h3>
					@endif

						
				</div>
			</div>
	
@endsection