<?php require_once('incs/settings.inc.php'); ?>
<?php require_once('incs/routes.inc.php'); ?>
<?php getSubPage(); ?>
<?php $page = getPage(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.ico">

    <title><?= $page['title'] . ' | ' . $siteName?></title>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="<?=$basePath?>resources/js/bootstrap.min.js"></script>
    
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="<?=$basePath?>resources/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="<?=$basePath?>resources/css/justified-nav.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php
      $addCSS = $page['addCSS'];
      $addJS = $page['addJS'];

      foreach ($addCSS as $style) {
        if(file_exists('resources/css/'.$style))
          echo "<link rel=\"stylesheet\" href=\"".$basePath."resources/css/$style\" />\n";
      }
      foreach ($addJS as $js) {
        if(file_exists('resources/js/'.$js))
          echo "<script src=\"".$basePath."resources/js/$js\"></script>\n";
      }
    ?>
  </head>

  <body>

    <div class="container">
        <!-- #header-->
        <?php include('templates/header.tpl.php'); ?>
        <!-- / #header-->
        <!-- #content-->
        <div class="content">
          <?php include('pages/'.$page['content']) ?>
        </div>
        <!-- / #content-->
      <!-- #footer-->
      <?php include('templates/footer.tpl.php'); ?>
      <!-- / #footer-->

    </div><!-- /.container -->
  </body>
</html>