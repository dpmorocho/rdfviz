<!DOCTYPE html >
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/jumbotron-narrow.css">
    <link rel="stylesheet" type="text/css" href="css/starter-template.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <title>Visualizador de datos</title>
    <style type="text/css">
        @media screen {
            @font-face {
	            font-family: 'CC-ICONS';
	            font-style: normal;
	            font-weight: normal;
	            src: url('http://mirrors.creativecommons.org/presskit/cc-icons.ttf') format('truetype');
            }

            span.cc {
	            font-family: 'CC-ICONS';
	            color: #ABB3AC;
            }
        }
    </style>
</head>
<body>

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="./">Inicio</a></li>
            <li role="presentation" ><a href="consultas.php">Consultas</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gráficos<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="tabla.php">Consulta x1</a></li>
                  <li><a href="barra.php">Consulta x2</a></li>
                  <li><a href="#">Consulta x3</a></li>
                  <li><a href="#">Consulta x4</a></li>
                </ul>
            </li>
          </ul>
        </nav>
        <h3 class="text-muted">Dataviz</h3>
      </div>

      <div class="jumbotron">
        <p class="lead">Información descriptiva del proyecto.</p>
        <p><a class="btn btn-lg btn-success" href="consultas.php" role="button">Consultas Sparql</a></p>
        <!-- <p><a class="btn btn-lg btn-success" href="#" role="button"><a href="http://play.google.com" target="_blank"><img src="img/gplay.png" class="img-responsive" alt="Responsive image" ></a></a></p> -->
      </div>

      <footer class="footer">
        <p><span class="cc">C</span> 2017 Dataviz</p>
      </footer>

    </div>
  </body>
</html>