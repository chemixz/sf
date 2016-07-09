@extends('front.layout')


@section('content')


        <div class="col-sm-7">
                {{ HTML::image( 'assets/img/estadistica.jpg', 'Sistema de Finanzas Familiar', [ 'class' => 'img-responsive', 'title' => 'Sistema de Finanzas Familiar' ] ) }}
        </div>
        <div class="col-sm-5">
          <h2>
            ¡Regístrate ya!
          </h2>


          @if(Session::has('message'))  <!--muestra mesaje de suceso que viene del homecontrol-->
                <div class="alert alert-{{ Session::get('class') }} fade in">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">X</button>
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


                {{ Form::open( [ 'url' => '/home/login','method' => 'post' ] ) }}
                <!-- <form role="form" action="/home/login" method="post"> -->
                  <div class="form-group">
                    {{ Form::label('email', 'Correo Electrónico' ) }}
                    {{ Form::email( 'email' , null , [ 'class' => 'form-control', 'placeholder' => 'Ingrese su email' ] ) }}
                  </div>
                  <div class="form-group">
                    {{ Form::label( 'clave', 'Contraseña' ) }}
                    {{ Form::password( 'clave' , [ 'class' => 'form-control', 'placeholder' => 'Ingrese su clave' ] ) }}
                  </div>
                  <p>
                    {{ HTML::link( '/home/forgot', '¿Olvidaste tu clave?' , [ 'class' => '' ] ) }}
                  </p>
                  
                  {{ Form::submit( 'Entrar' , [ 'class' => 'btn btn-primary' ] ) }}
                  {{ HTML::link( '/home/registrese', 'Regístrese' , [ 'class' => 'btn btn-danger' ] ) }}

                {{ Form::close() }}
            </div>

@stop