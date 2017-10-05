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
      var endpoint = 'http://dbpedia.org/sparql'
      var sparql = d3.select("#sparql").property("value")
      d3sparql.query(endpoint, sparql, render)
    }
    function render(json) {
      var config = {
        "label_x": "Prefectura",
        "label_y": "Area",
        "var_x": "pref",
        "var_y": "area",
        "width":  1200,  // canvas width
        "height": 700,  // canvas height
        "margin":  200,  // canvas margin
        "selector": "#result"
      }
      d3sparql.barchart(json, config)
      d3sparql.toggle()
    }
    function toggle() {
      d3sparql.toggle()
    }
    </script>
    <style>
    .bar:hover {
      fill: brown;
    }
    </style>
    <title>Barra de Datos - DATAVIZ</title>
  </head>
<body onload="exec();">

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" ><a href="./">Inicio</a></li>
            <li role="presentation" ><a href="consultas.php">Consultas</a></li>
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

    <div id="query" style="margin: 10px">
      <h1>Barra de datos</h1>
      <form class="form-inline">
        <div class="input-append">
          <button class="btn" type="button" onclick="toggle()">Mostrar consulta</button>
        </div>
      </form>
      <textarea id="sparql" class="span9" rows=15 style="width:80%;">
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
PREFIX yago: <http://dbpedia.org/class/yago/>
PREFIX dbpedia-owl: <http://dbpedia.org/ontology/>

SELECT ?pref ?area
WHERE {
  ?s a yago:WikicatPrefecturesOfJapan ;
     rdfs:label ?pref ;
     dbpedia-owl:areaTotal ?area_total .
  FILTER (lang(?pref) = 'en')
  BIND ((?area_total / 1000 / 1000) AS ?area)
}
ORDER BY DESC(?area)
      </textarea>
    </div>
    <div id="result"></div>
<footer class="footer">
        <p><span class="cc">C</span> 2017 Dataviz</p>
      </footer>

    </div>
  </body>
</html>
