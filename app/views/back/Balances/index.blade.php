@extends('back.layout')
@section('content')

	<h3>Familia {{ !empty($familia[0]->nombre) ? $familia[0]->nombre : 'No se han agregado datos de la familia' }}</h3>
		<div class="row">
			<div class="col-sm-12">
				@if (empty($familia[0]->nombre))
					<a href="{{URL::to('/dashboard/familia')}}" class="btn btn-danger" alt="Agregar datos de Familia" title="Agregar datos de Familia">
						<span class="glyphicon glyphicon-edit"></span>&nbsp; Agregar datos de Familia
					</a>
				@endif
					<a href="{{URL::to('/dashboard')}}" class="btn btn-warning" alt="Agregar Miembro Familiar" title="Agregar Miembro Familiar">
						<span class="glyphicon glyphicon-chevron-left"></span>&nbsp; Atras
					</a>
			</div>
                    <div class="col-sm-12">&nbsp;</div>
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
      @if (!empty($familia[0]->nombre))
        <div class="col-sm-4">
          <div class="panel panel-primary">
            <div class="panel-heading"><h4 class='text-center'>Balance Familiar</h4></div>
              <div class="panel-body">
		    <img src="{{URL::to('/')}}/uploads/images/{{$familia[0]->foto}}" alt="{{ $familia[0]->nombre }}" title="{{ $familia[0]->nombre }}" class="img-responsive">
              <table class="table table-stripped" >
                <thead>
                <tr>
                  <th ><span class="phead">Ingresos </span></th>
                  <th >Egresos</th>
                  <th >Patrimonio</th>
                </tr>
                </thead>  
                <tbody class='text-center'>
                <tr>
                  <td>{{ $datosFamilia['Ingresos'] }} </td>
                  <td>{{ $datosFamilia['Egresos'] }} </td>
                  <td>
                    @if ($datosFamilia['Patrimonio']>0)
                      <span class='pmayor'>{{ $datosFamilia['Patrimonio'] }}</span>
                    @else
                      <span class='pmenor'>{{ $datosFamilia['Patrimonio'] }}</span>
                    @endif
                    
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>


        <div class="col-sm-8">
          <div class="panel panel-primary">
        <div class="panel-heading"><h4 class='text-center'>Miembros</h4></div>
              <div class="panel-body">
    <table class="table table-stripped">
      <thead>
      <tr>
        <th >Miembro</th>
        <th >Ingresos</th>
        <th >Egresos</th>
        <th >Patrimonio</th>
      </tr>
      </thead>  
      <tbody class='text-center'>
                    
      @if ($datosFamilia['MiembrosI'])
          <?php 
            $inc=1;
          ?>                        
                      @foreach ( $datosFamilia['MiembrosI'] as $miembro)
                            <tr>
                              <?php 

                                $acumI=0;   

                                  foreach ($miembro->conceptos as $c) 
                                  {
                                    $acumI += $c->pivot->monto;
                                  }

                                  $acumE=0;   

                                  foreach ($datosFamilia['MiembrosE']  as $concepto)
                                  {
                                    if ($concepto->id == $miembro->id ) {
                                      foreach ($concepto->conceptos as $c) 
                                      {
                                        $acumE += $c->pivot->monto;
                                      }
                                    }
                                  }
                               ?>
                               <table class="panel-group" id="accordion" width="100%">
                                   <tr>
                                   <td>
                                     
                                     <div class="panel panel-default">
                                       <div class="panel-heading">
                                         <h4 class="panel-title">
                                           <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$inc}}">
                                             <span>{{ $miembro->nombre }}</span>
                                             <span>{{ $acumI }}</span>
                                             <span>{{ $acumE }}</span>
                                             <span class="{{ $acumI - $acumE > 0 ? 'pmayor' : 'pmenor' }}">{{ $patrimonio = $acumI - $acumE }}</span>
                                           </a>
                                         </h4>
                                       </div>
                                       <div id="collapse{{$inc}}" class="panel-collapse collapse">
                                         <div class="panel-body">
                                           <table class="table table-stripped">
                                              <thead>
                                                <tr>
                                                  <th width="30%">Meta</th>
                                                  <th>Monto</th>
                                                  <th>Fecha Límite</th>
                                                  <th>BsF. Acumulado</th>
                                                  <th>Cumple</th>
                                                </tr>
                                              </thead>
                                              @foreach ($miembro->metas as $meta)
                                                <tbody>
                                                  <tr>
                                                    <td>
                                                      {{$meta->descripcion}}
                                                    </td>
                                                    <td>
                                                      {{ number_format($meta->metabs,2, ",",".") }} <strong>Bsf:</strong>
                                                    </td>
                                                    <td>
                                                      {{Datemanager::date2normal($meta->fecha_limite)}}
                                                    </td>

                                                      <?php 
                                                        $calculo = ($patrimonio*$meta->prioridad/100) * Datemanager::CalcularMeses($meta->created_at,$meta->fecha_limite) ;
                                                      ?>
                                                    <td>
                                                      {{ number_format($calculo,2, ",",".") }} <strong>Bsf</strong>
                                                    </td>
                                                    <td class="{{ $calculo <=  $meta->metabs ? 'pmenor' : 'pmayor' }}">
                                                      {{ $calculo <=  $meta->metabs ? 'No' : 'Sí' }}
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              @endforeach
                                           </table>
                                         </div>
                                       </div>
                                     </div>
                                   </td>
                                   </tr>
                               </table>
                               <?php $inc++ ?>
                      @endforeach
                      <tr >
                        
                      </tr> 
                  @endif
			</tbody>
		</table>
	</div>
    </div>
</div>
@endif	
				
		</div>
	
@endsection