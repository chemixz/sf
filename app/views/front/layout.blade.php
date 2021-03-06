<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--adapta la pantalla-->
    <title>Sistema de finanzas familiar</title>

	{{ HTML::style ('assets/css/bootstrap.min.css', array ('media'=>'screen')) }}
	{{ HTML::style ('assets/css/estilos.css',array ('media'=>'screen')) }}
    <!-- Bootstrap -->
    <!--<link href="css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <div class="container principal"> <!--contenedor principal -->
    	<header class="col-sm-12 text-center">  <!--un header o titulo 12 columna -->
    		<h1>Sistema de finanzas familiar</h1>
    	</header>
    	<div class="col-sm-12"> <!--div prisipal que contiene la parte izq y derecha que  son traidos por yield(content) desde /front registrarse y login-->
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
    {{ HTML::script('assets/js/bootstrap.min.js') }}
    <!-- Include all compiled plugins (below), or include individual files as needed -->
 
  </body>
</html>
