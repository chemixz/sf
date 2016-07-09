@extends('back.layout')


@section('content')

          
      <div class="container menuboton text-center "> <!-- div q contiene los menu boton -->
        <div class="col-sm-12">
          <h3>¡Pagina de Inicios</h3>
        </div>
        <div class="form-group ">
            <a class="btn btn-warning" href="{{URL::to('/')}}/dashboard/familia">
              <span class="glyphicon glyphicon-home"></span>
              <p><strong>Familia</strong></p>
            </a>
            <a class="btn btn-primary" href="{{URL::to('/')}}/dashboard/miembros">
              <span class="glyphicon glyphicon-user"></span>
              <p><strong> Miembros</strong></p>
            </a>
        </div>
    <!--   <div class="form-group">
              <a class="btn btn-warning" href="{{URL::to('/')}}/dashboard/metas">
                <span class="glyphicon glyphicon-road"></span>
                <p><strong>Metas</strong></p>
              </a>
              <a class="btn btn-primary" href="{{URL::to('/')}}/dashboard/conceptos">
                <span class="glyphicon glyphicon-euro"></span>
                <p><strong>Conceptos</strong></p>
              </a>
            
          </div> -->
        <div class="form-group">
          <a class="btn btn-warning" href="{{URL::to('/')}}/dashboard/balance">
              <span class="glyphicon glyphicon-shopping-cart"></span>
              <p><strong>Balance</strong></p>
          </a>
          <a class="btn btn-primary" href="{{URL::to('/')}}/dashboard/indice">
              <span class="glyphicon glyphicon-stats"></span>
              <p><strong> Ínidice</strong></p>
          </a>
        </div>      
      </div>
       
@stop
