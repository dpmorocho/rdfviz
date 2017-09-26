<?php
    require_once "vendor/easyrdf/easyrdf/lib/EasyRdf.php";
    require_once "vendor/easyrdf/easyrdf/lib/html_tag_helpers.php";

    if (get_magic_quotes_gpc() and isset($_REQUEST['query'])) {
        $_REQUEST['query'] = stripslashes($_REQUEST['query']);
    }
?>
<html>
<head>
  <title>Consultas SPARQL - DATAVIZ</title>
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
<h1>Formulario de Consultas</h1>

<div style="margin: 0.5em">
  <?php
    print form_tag();
    print label_tag('endpoint');
    print text_field_tag('endpoint', "http://dbpedia.org/sparql", array('size'=>80)).'<br />';
    /*print "<code>";
    foreach(EasyRdf_Namespace::namespaces() as $prefix => $uri) {
        print "PREFIX $prefix: &lt;".htmlspecialchars($uri)."&gt;<br />\n";
    }
    print "</code>";
    */
    print text_area_tag('query', "SELECT * WHERE {\n  ?s ?p ?o\n}\nLIMIT 10", array('rows' => 10, 'cols' => 80)).'<br />';
    print check_box_tag('text') . label_tag('text', 'Texto Plano').'<br />';
    print reset_tag('limpiar', 'Limpiar') . submit_tag('enviar', 'Enviar');
    print form_end_tag();
  ?>
</div>

<?php
  if (isset($_REQUEST['endpoint']) and isset($_REQUEST['query'])) {
      $sparql = new EasyRdf_Sparql_Client($_REQUEST['endpoint']);
      try {
          $results = $sparql->query($_REQUEST['query']);
          if (isset($_REQUEST['text'])) {
              print "<pre>".htmlspecialchars($results->dump('text'))."</pre>";
          } else {
              print $results->dump('html');
          }
      } catch (Exception $e) {
          print "<div class='error'>".$e->getMessage()."</div>\n";
      }
  }
?>

</body>
</html>