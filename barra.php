<!DOCTYPE html>
<meta charset="utf-8">
<html>
  <head>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="js/d3.v3.min.js"></script>
    <script src="js/d3sparql.js"></script>
    <script>
    function exec() {
      var endpoint = d3.select("#endpoint").property("value")
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
  <body>
    <div id="query" style="margin: 10px">
      <h1>Gráfica de barras</h1>
      <form class="form-inline">
        <label>SPARQL endpoint:</label>
        <div class="input-append">
          <input id="endpoint" class="span5" value="http://dbpedia.org/sparql" type="text">
          <button class="btn" type="button" onclick="exec()">Consultar</button>
          <button class="btn" type="button" onclick="toggle()">Ocultar Texto</button>
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
  </body>
</html>
