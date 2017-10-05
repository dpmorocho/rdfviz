<?php
    require_once "vendor/easyrdf/easyrdf/lib/EasyRdf.php";
    require_once "vendor/easyrdf/easyrdf/lib/html_tag_helpers.php";

    if (get_magic_quotes_gpc() and isset($_REQUEST['query'])) {
        $_REQUEST['query'] = stripslashes($_REQUEST['query']);
    }
?>
<html>
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
  	<style type="text/css">
	    .error {
	      width: 35em;
	      border: 2px red solid;
	      padding: 1em;
	      margin: 0.5em;
	      background-color: #E6E6E6;
    	}
  	</style>
</head>
<body>

<div style="margin: 0.5em">
</div>

<body>

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" ><a href="./">Inicio</a></li>
            <li role="presentation" class="active"><a href="consultas.php">Consultas</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gráficos<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="tabla.php">Tabla</a></li>
                  <li><a href="barra.php">Barra</a></li>
                  <li><a href="#">Consulta x3</a></li>
                  <li><a href="#">Consulta x4</a></li>
                </ul>
            </li>
          </ul>
        </nav>
        <h3 class="text-muted">Dataviz</h3>
      </div>

      <div class="jumbotron">
       <p class="lead">Consulte sobre la ontología:</p>
        <?php
		    print form_tag();
		    print text_area_tag('query', "SELECT * WHERE {\n  ?s ?p ?o\n}\nLIMIT 10", array('rows' => 10, 'cols' => 80)).'<br />';
		    print submit_tag('enviar', 'Enviar');
		    print form_end_tag();
		?>
      </div>
      <?php
      if (isset($_REQUEST['query'])) {
		      $endpoint = 'https://dbpedia.org/sparql';
		      $sparql = new EasyRdf_Sparql_Client($endpoint);
		      try {
		          $results = $sparql->query($_REQUEST['query']);
		              print "<pre>".htmlspecialchars($results->dump('text'))."</pre>";
		      } catch (Exception $e) {
		          print "<div class='error'>".$e->getMessage()."</div>\n";
		      }
		    }
		?>
      <footer class="footer">
        <p><span class="cc">C</span> 2017 Dataviz</p>
      </footer>

    </div>
  </body>
</html>