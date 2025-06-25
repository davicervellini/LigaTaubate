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

</head>

<body class="template-soccer">

  <div class="site-wrapper clearfix">


    <!-- Header
    ================================================== -->

    <?php include "menu.php"; ?>


    <!-- Page Heading
    ================================================== -->
    <div class="page-heading">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <img src="assets/images/label/arbitragem.png" alt="">
          </div>
        </div>
      </div>
    </div>
    <!-- Content
    ================================================== -->

    <div class="site-content">
      <div class="container">

        <!-- Single ARBITRAGEM Tabbed Content -->
        <div class="product-tabs row">
          <!--<div class="col-md-3">

            <!--<div class="card">
              <div class="card__content">
                <nav class="df-account-navigation">
                  <ul>
                    <li role="presentation" class="active df-account-navigation__link">
                      <a href="#tab-aosarbitros" role="tab" data-toggle="tab"><i class="icon-options-vertical" aria-hidden="true" style="color:#c01818"></i> Informações</a>
                    </li>
                    <li role="presentation" class="df-account-navigation__link">
                      <a href="#tab-arbitros" role="tab" data-toggle="tab"><i class="icon-options-vertical" aria-hidden="true" style="color:#c01818"></i> Árbitros</a>
                    </li>
                    <li role="presentation" class="df-account-navigation__link df-account-navigation__link">
                      <a href="#tab-escalas" role="tab" data-toggle="tab"><i class="icon-options-vertical" aria-hidden="true" style="color:#c01818"></i> Escalas</a>
                    </li>

                  </ul>
                </nav>
              </div>
            </div>-->
        </div>


        <div class="col-md-12">
          <!-- Tab panes -->
          <div class="tab-content">


            <!-- Tab: Árbitros -->
            <div>

              <div class="card">
                <div class="card__content">
                  <!-- <h4>ÁRBITROS CADASTRADOS</h4>-->

                  <!-- Presidente -->
                  <div class="col-md-12">

                    <!-- Grid -->
                    <div class="card card--clean">
                      <div class="card__content">

                        <!-- Presidente -->
                        <?php require "cms/core/model.php"; ?>
                        <?php require "cms/models/arbitragem.php"; ?>
                        <?php $not = new arbitragem(); ?>

                        <div class="row" style="margin-bottom: 1rem;">
                          <div class="col-12">
                            <h5>Filtros</h5>
                          </div>
                          <div class="col-sm-3">
                            <select class="form-control" name="ano" id="ano">
                              <option value="">Ano de cadastro</option>
                              <?php
                              for($ano = 2017; $ano <= date('Y'); $ano++) {
                                $selected = '';

                                if(isset($_GET['ano']) && $_GET['ano'] == $ano) {
                                  $selected = 'selected';
                                } else if (!$_GET['ano'] && $ano == date('Y')) {
                                  $selected = 'selected';
                                }

                                ?>
                                  <option value="<?= $ano; ?>" <?php echo $selected ?> >
                                    <?= $ano; ?>
                                  </option>
                                <?php
                              }
                              ?>
                            </select>
                          </div>
                          <div class="col-sm-3">
                            <input class="form-control" name="nome" id="nome" placeholder="Nome"
                              value="<?php if(isset($_GET['nome'])) { echo $_GET['nome']; } else { echo ''; } ?>" />
                          </div>
                          <div class="col-sm-2">
                            <input type="button" class="btn btn-primary" value="Filtrar" 
                              onclick="searchArbitros();" />
                          </div>
                          <div class="col-sm-2">
                            <input type="button" class="btn btn-primary" value="Limpar filtros" 
                              onclick="searchArbitros(true);" />
                          </div>
                        </div>

                        <ul class="products products--grid products--grid-condensed products--grid-light">
                          <?php 
                            if(isset($_GET['ano']) || isset($_GET['nome'])) {
                              if(!$_GET['ano']) $_GET['ano'] = date('Y');

                              $arbitros = $not->getByFilters(
                                $_GET['ano'], 
                                $_GET['nome'],
                                false
                              );
                            } else {
                              $arbitros = $not->getByFilters(
                                date('Y'), 
                                '',
                                false
                              );
                            }

                            if(sizeof($arbitros) < 1) {
                              ?>
                                <h3>Nenhum árbitro cadastrado no ano selecionado.</h3>
                              <?php
                            }
                          ?>
                          
                          <?php foreach ($arbitros as $arbitragem) {
                            if ($arbitragem['foto']) {
                              $foto = "cms/assets/images/arbitros/" . $arbitragem['foto'];
                            } else {
                              $foto = "assets/images/presidentes/sem-foto.png";
                            }
                          ?>

                            <!-- #1 -->

                            <li class="product__item card" style="display: flex; justify-content: start; align-items: center;">

                              <div class="product__img">
                                <div class="product__img-holder">
                                  <img src="<?php echo $foto; ?>" width="120" alt="">
                                </div>
                              </div>

                              <div class="product__content card__content">

                                <header class="product__header">
                                  <div class="product__header-inner">
                                    <span class="product__category"> <?php echo $arbitragem['funcao']; ?> </span>
                                    <h2 class="product__title"> <?php echo $arbitragem['nome']; ?> </h2>
                                  </div>
                                </header>
                              </div>
                            </li>

                          <?php } ?>
                          <!-- #1 / End -->

                        </ul>

                        <!-- Presidente / End -->
                      </div>
                    </div>
                    <!-- Grid / End -->

                  </div>
                  <!-- Presidente / End -->

                </div>
              </div>


            </div>
            <!-- Tab: Árbitros / End -->



          </div>
          <!-- Tab panes / End -->
        </div>
      </div>
      <!-- Single ARBITRAGEM Tabbed Content / End -->

    </div>
  </div>


  <!-- Content / End -->

  <!-- Footer
    ================================================== -->

  <?php include "footer.php"; ?>

  <!-- Footer / End -->

  </div>

  <script>
    function searchArbitros(clean = false) {
      if(clean) {
        window.location.href = "arbitragem.php"
        return
      }

      let ano = document.getElementById('ano').value
      let nome = document.getElementById('nome').value

      if(ano || nome) {
        window.location.href = "?ano=" + ano + "&nome=" + nome
      }
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