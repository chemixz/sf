@extends('back.layout')
@section('content')
	<h3> {{ !empty($familia[0]->nombre) ? $familia[0]->nombre : 'No se han agregado datos de la familia' }}</h3>
		<div class="row">
			<div class="col-sm-12">
				@if (!empty($familia[0]->nombre))
					<h2>Entro en Indices</h2>
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
                    <div id="chart1" style="height:600px"></div>
                  </div>
			</div>
	
@endsection