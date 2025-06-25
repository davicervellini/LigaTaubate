<!DOCTYPE html>
<html lang="pt-br">

<head>

  <!-- Basic Page Needs
  ================================================== -->
  <title>BID - Liga Municipal de Futebol de Taubaté</title>
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
    .image {
      width: 100%;

      border: 1px solid #ffcf00;
    }

    .bid-member-name {
      color: #ffcf00;
      text-transform: uppercase;
    }

    .year {
      color: #FFCF00;
      margin-top: 2em;
    }

    .member-container {
      padding: 1rem;
    }

    .member-container img {
      width: 120px;
      height: 120px;
      border-radius: 60px;
      margin-bottom: .7rem;
    }

    .member-container h5,
    h6,
    p,
    small {
      margin: 0rem 0rem .4rem 0rem;
    }
  </style>

</head>

<body class="template-soccer">

  <div class="site-wrapper clearfix">
    <div class="site-overlay"></div>
    <!-- Header
    ================================================== -->
    <?php include "menu.php"; ?>
    <?php require "cms/core/model.php"; ?>
    <?php include "cms/models/clubes.php"; ?>
    <?php include "cms/models/atletas.php"; ?>
    <?php $clubes = new clubes(); ?>
    <?php $atletas = new atletas(); ?>
    <?php $clubesArray = $clubes->get(); ?>

    <?php
    $date = isset($_GET['date']) ? $_GET['date'] : "";
    $name = isset($_GET['name']) ? $_GET['name'] : "";
    $clube_id = isset($_GET['clube']) ? $_GET['clube'] : "";
    $status = isset($_GET['status']) ? $_GET['status'] : "";

    $results = $atletas->getBID($date, $name, $clube_id, $status);

    ?>
    <!-- Page Heading
    ================================================== -->
    <div class="page-heading">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <h1 style="margin-bottom: 0rem;">BID Liga</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- Content
    ================================================== -->
    <div class="site-content">
      <div class="container">

        <div class="row" style="margin-bottom: 1rem;">
          <div class="col-12">
            <h5>Pesquisa</h5>
          </div>
          <div class="col-sm-3">
            <label>Data de publicação</label>
            <input class="form-control" name="date" type="date" id="data" value="<?= isset($_GET['date']) ? $_GET['date'] : date('Y-m-d') ?>" />
          </div>
          <div class="col-sm-3">
            <label>Nome do(a) atleta</label>
            <input class="form-control" name="nome" id="nome" value="<?= isset($_GET['name']) ? $_GET['name'] : "" ?>" />
          </div>
          <div class="col-sm-3">
            <label>Clube</label>
            <select class="form-control" name="clube" id="clube">
              <option value="" selected>Selecione clube</option>
              <?php
              foreach ($clubesArray as $clube) {
              ?>
                <option value="<?= $clube['clube_id']; ?>" <?php if (isset($_GET['clube']) && $_GET['clube'] == $clube['clube_id']) {
                                                              echo 'selected';
                                                            } ?>><?= strtoupper($clube['nome']); ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="col-sm-3">
            <label>Situação</label>
            <select class="form-control" name="status" id="status">
              <option value="" selected>Selecione situação</option>
              <option value="1" <?php if (isset($_GET['status']) && $_GET['status'] == '1') {
                                  echo 'selected';
                                } ?>>Apto</option>
              <option value="0" <?php if (isset($_GET['status']) && $_GET['status'] == '0') {
                                  echo 'selected';
                                } ?>>Não apto</option>
            </select>
          </div>
        </div>
        <div class="row" style="margin-bottom: 2rem;">
          <div class="col-sm-2">
            <input type="button" class="btn btn-primary" value="Pesquisar" onclick="searchBID();" />
          </div>
          <div class="col-sm-2">
            <input type="button" class="btn btn-primary" value="Limpar filtros" onclick="cleanSearch();" />
          </div>
        </div>

        <div class="row">
          <?php
          if(sizeof($results) < 1) {
            ?>
              <h2>Sem resultados encontrados</h2>
            <?php
          }
          foreach ($results as $result) {
          ?>
            <div class="col-md-6 member-container">
              <div class="row">
                <div class="col-sm-3">
                  <img src="cms/assets/images/atletas/<?= $result['foto']; ?>" alt="<?= $result['nome'] ?>" />
                </div>
                <div class="col-sm-9">
                  <h5 class="bid-member-name"><?= $result['nome'] ?></h5>
                  <h6>Clube: <?= $result['clube'] ?></h6>
                  <h6>Campeonato: <?= $result['campeonato'] ?></h6>
                  <p>Situação: <b><?= $result['status'] == 1 ? "APTO" : "INAPTO"; ?></b></p>

                  <!-- <small>Data de atualização: <?= $result['data_atualizacao']; ?></small> -->
                  <br /><small>Data de publicação: <?= $result['data']; ?></small>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>

    </div>
    <!-- Footer
    ================================================== -->
    <?php include "footer.php"; ?>
    <!-- Footer / End -->
  </div>

  <script>
    function searchBID() {
      let date = document.getElementById('data').value
      let name = document.getElementById('nome').value
      let clube = document.getElementById('clube').value
      let status = document.getElementById('status').value

      window.location.href = "bid.php?date=" + date + "&name=" + name + "&clube=" + clube + "&status=" + status
    }

    function cleanSearch() {
      window.location.href = "bid.php"
    }
  </script>

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

</body>

</html>