<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--adapta la pantalla-->
    <title>Sistema de finanzas familiar</title>

	{{ HTML::style ('assets/css/bootstrap.min.css', array ('media'=>'screen')) }}
      {{ HTML::style ('assets/css/sunny/jquery-ui-1.10.4.custom.min.css',array ('media'=>'screen')) }}
      {{ HTML::style ('assets/css/rateit.css',array ('media'=>'screen')) }}
      {{ HTML::style ('assets/css/estilos.css',array ('media'=>'screen')) }}
	{{ HTML::style ('assets/css/jquery.jqplot.min.css',array ('media'=>'screen')) }}
  
  </head>
  <body>
    <div class="container principal"> <!--contenedor principal -->
    	<header class="col-sm-12 text-center">  <!--un header o titulo 12 columna -->
    		<h1>Sistema de finanzas familiar</h1>
    	</header>
    	<div class="col-sm-12"> <!--div prisipal que contiene la parte izq y derecha que  son traidos por yield(content) desde /front registrarse y login-->
            <div class="col-sm-12">
              

              <nav role="navigation" class="navbar">
                <div class="container-fluid">
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                    <button data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" class="navbar-toggle" type="button">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a href="{{URL::to('/dashboard') }}" class="navbar-brand">
                      Bienvenido <span class="joinsession">{{ Session::get('email') }}</span> 
                    </a>
                  </div>

                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                      @if (Session::get('rol') == 'Administrador')
                      <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Herramientas <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li>
                            <!-- <a href="#">Hace Algo 1</a> -->
                            {{ HTML::link( '/dashboard/conceptos', 'Conceptos' , null ) }} 
                          </li>
                          <li class="divider"></li>
                          <li>
                            {{ HTML::link( '/dashboard/usuarios', 'Usuarios' , null ) }} 
                          </li>
                           <li class="divider"></li>
                          <li>
                            {{ HTML::link( '/dashboard/lfamilias', 'Familias' , null ) }} 
                          </li>
                        </ul>
                      </li>
                      @endif

                      <li>
                        <p class="nav navbar-text"> 
                          <a href="{{URL::to('/dashboard/misdatos') }}/{{ Session::get('id') }}" class="navbar-link">
                            <span class="glyphicon glyphicon-user"></span>&nbsp; Datos Personales
                          </a>
                        </p>
                      </li>
                      {{ HTML::link( '/logout', 'Salir' , [ 'class' => 'btn btn-danger navbar-btn' ] ) }} 
                    </ul>
                  </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
              </nav>
            </div>
    		@yield('content')  <!--con e sto se visualiza lo q esta en /front y /back-->
    	</div> <!--fin izq - der-->
    	<footer class="col-sm-12 text-center">  <!--pie de pagina-->
    		<p>
    			Desarrollado por: <a href="http://facebook.com/garces.jme.b" target="_blank">Garces José Miguel</a>
    		</p>

    	
      </footer>
    </div>  <!--fin   - contenedor principal -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    {{ HTML::script('assets/js/jquery-1.11.0.min.js') }}
   
    {{ HTML::script('assets/js/jquery-ui-1.10.4.min.js') }}
 
    {{ HTML::script('assets/js/bootstrap.min.js') }}
    {{ HTML::script('assets/js/jquery.rateit.min.js') }}

    {{ HTML::script('assets/js/jquery.jqplot.min.js',['class'=>'include']) }}
    {{ HTML::script('assets/js/jqplot.pieRenderer.min.js',['class'=>'include']) }}
    {{ HTML::script('assets/js/jqplot.donutRenderer.min.js',['class'=>'include']) }}
    
    {{ HTML::script('assets/js/scripts.js') }}


  
   
  </body>
</html>
