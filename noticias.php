<?php include "funcoes.php";?>
<?php
  $last90Days = date_create(date('Y-m-d'));
  date_sub($last90Days, date_interval_create_from_date_string('90 days'));
  $dateI = $_GET['dateI'] ? $_GET['dateI'] : date_format($last90Days, 'Y-m-d');
  $dateF = $_GET['dateF'] ? $_GET['dateF'] : date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <title>Liga Municipal de Futebol de Taubaté</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="A Liga Municipal de Futebol de Taubaté é a entidade responsável por dirigir o futebol da cidade de Taubaté, promovendo e realizando competições nas mais diferentes categorias (base, amador e veterano) do esporte.">
  <meta name="author" content="Grupo Vergueiro">
  <meta name="keywords" content="Liga Taubaté Futebol">

  <!-- Favicons
  ================================================== -->
  <link rel="shortcut icon" href="assets/images/soccer/favicons/favicon-120.png">
  <link rel="apple-touch-icon" sizes="120x120" href="assets/images/soccer/favicons/favicon-120.png">
  <link rel="apple-touch-icon" sizes="152x152" href="assets/images/soccer/favicons/favicon-152.png">

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">

  <!-- Google Web Fonts
  ================================================== -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CSource+Sans+Pro:400,700" rel="stylesheet">

  <!-- CSS
  ================================================== -->
  <!-- Preloader CSS 
  <link href="assets/css/preloader.css" rel="stylesheet">-->

  <!-- Vendor CSS -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/fonts/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
  <link href="assets/vendor/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
  <link href="assets/vendor/slick/slick.css" rel="stylesheet">

  <!-- Template CSS-->
  <link href="assets/css/content.css" rel="stylesheet">
  <link href="assets/css/components.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Custom CSS-->
  <link href="assets/css/custom.css" rel="stylesheet">

  <style>
    .news-img {
      width: 170px;
      min-width: 170px;
      max-width: 170px;
      height: 170px;
      min-height: 170px;
      max-height: 170px;
      border-radius: 10px;
    }
  </style>

</head>
<body class="template-soccer">
  <div class="site-wrapper clearfix">
    <div class="site-overlay"></div>
    <!-- Header
    ================================================== -->
<?php include "menu.php";?>
    <!-- Page Heading
    ================================================== -->
    <div class="page-heading">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
      <img src="assets/images/label/noticias.png" alt="">
          </div>
        </div>
      </div>
    </div>   
    <!-- Content
    ================================================== -->
<div class="site-content">
    <div class="container">
      <?php require "cms/core/model.php";?>
      <?php require "cms/models/noticias.php";?>
      <?php require "cms/models/categorias.php";?>

      <?php $not = new noticias(); ?>
      <?php $categoriaClass = new categorias(); ?>
      <?php $categorias = $categoriaClass->get(); ?>

      <div class="row">
        <div class="col-md-3">
          <label>Categoria</label>
          <select id="categoria" class="form-control form-control-sm" style="color: black;">
            <option value="">Todas</option>
            <?php foreach($categorias as $categoria) { ?>
              <option value="<?= $categoria["categoria_id"] ?>" <?= $_GET['category'] === $categoria["categoria_id"] ? "selected" : "" ?>>
                <?= strtoupper($categoria["titulo"]) ?>
              </option>
            <?php } ?>
          </select>
        </div>
        <div class="col-md-3">
          <label>Data inicial</label>
          <input id="dateI" type="date" value="<?= $dateI ?>" class="form-control form-control-sm" />
        </div>
        <div class="col-md-3">
          <label>Data final</label>
          <input id="dateF" type="date" value="<?= $dateF ?>" class="form-control form-control-sm" />
        </div>
        <div class="col-md-3">
          <button class="btn btn-primary" onclick="filter()">Filtrar</button>
          <button class="btn btn-danger" onclick="filter(true)" style="margin-top: .5rem;">Limpar filtros</button>
        </div>
      </div>

        <?php foreach ($not->getFiltered($_GET['category'], $_GET['dateI'], $_GET['dateF']) as $noticia) { ?>
        <div class="row" style="margin-top: 2em;">
          <?php if($noticia["foto_principal"]) { ?>
          <div class="col-md-2">
            <figure class="posts__thumb">
              <div class="posts__cat">
                <span class="label posts__cat-label"><?php echo $noticia["categoria_titulo"];?></span>
              </div>
              <a href="noticia.php?url=<?php echo $noticia["url"];?>">               
                <img src="http://www.ligataubate.com.br/cms/assets/images/noticias/<?php echo $noticia['foto_principal'];?>" 
                alt="<?= $noticia["titulo"] ?>" class="news-img">
              </a>
            </figure>
          </div>
          <?php } ?>

          <div class="col-md-9">
            <time datetime="2016-08-23" class="posts__date"><b><?php echo $noticia["categoria_titulo"]; ?></b> - <?php echo dataAbreviada($noticia["date_add"]);?></time>
            <h4 class="posts__title" style="font-size: 1.5em;"><a href="noticia.php?url=<?php echo $noticia['url'];?>"><?php echo $noticia["titulo"];?></a></h4>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
    <!-- Content / End -->
    <!-- Footer
    ================================================== -->
<?php include "footer.php";?>
    <!-- Footer / End -->
  <!-- Javascript Files
  ================================================== -->
  <!-- Core JS -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <!--<script src="assets/js/core-min.js"></script>-->
  <!-- Vendor JS -->
  <script src="assets/vendor/twitter/jquery.twitter.js"></script>
<!-- Template JS -->
  <script src="assets/js/init.js"></script>
  <script src="assets/js/custom.js"></script>

  <script>
    function filter(clean = false) {
      if(clean) {
        window.location.href = "?"
        return
      }

      const category = document.getElementById("categoria").value
      const dateI = document.getElementById("dateI").value
      const dateF = document.getElementById("dateF").value

      window.location.href = "?category=" + category + "&dateI=" + dateI + "&dateF=" + dateF
    }
  </script>
  </body>
  </html>
