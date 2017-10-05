<!DOCTYPE html >
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/jumbotron-narrow.css">
    <link rel="stylesheet" type="text/css" href="css/starter-template.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<script src="js/d3.v3.min.js"></script>
    <script src="js/d3sparql.js"></script>
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
    
    <script>
    function exec() {
      var endpoint = d3.select("#endpoint").property("value")
      var sparql = d3.select("#sparql").property("value")
      d3sparql.query(endpoint, sparql, render)
      d3sparql.toggle()
    }
    function render(json) {
      var config = {
        "selector": "#result"
      }
      d3sparql.htmltable(json, config)
    }
    function toggle() {
      d3sparql.toggle()
    }
    </script>
</head>
<body onload="exec();">

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="./">Inicio</a></li>
            <li role="presentation" ><a href="consultas.php">Consultas</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gráficos<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Consulta x1</a></li>
                  <li><a href="#">Consulta x2</a></li>
                  <li><a href="#">Consulta x3</a></li>
                  <li><a href="#">Consulta x4</a></li>
                </ul>
            </li>
          </ul>
        </nav>
        <h3 class="text-muted">Dataviz</h3>
      </div>

    <div id="query" style="margin: 10px">
      <h1>Tabla de datos</h1>
      <form class="form-inline">
        <label>SPARQL endpoint:</label>
        <div class="input-append">
          <input id="endpoint" class="span5" value="http://togostanza.org/sparql" type="text">
          <button class="btn" type="button" onclick="exec()">Consultar</button>
          <button class="btn" type="button" onclick="toggle()">Mostrar Consulta</button>
        </div>
      </form>
      <textarea id="sparql" class="span9" rows=15 style="width:80%;">

      </textarea>
    </div>
    <div id="result"></div>

      <footer class="footer">
        <p><span class="cc">C</span> 2017 Dataviz</p>
      </footer>

    </div>
  </body>
</html>
