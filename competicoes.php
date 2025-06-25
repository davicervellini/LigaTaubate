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

  <style type="text/css" media="print">
    @page {
      size: landscape;
    }
  </style>

  <script>
    function printResults() {
      const content = document.getElementById("tabela-resultados")
      const pri = document.getElementById("tabela-resultados-print").contentWindow
      pri.document.open()
      pri.document.write(content.innerHTML)
      pri.document.close()
      pri.focus()
      pri.print()
    }
  </script>



</head>

<body class="template-soccer">



  <div class="site-wrapper clearfix">

    <div class="site-overlay"></div>





    <!-- Header

    ================================================== -->

    <?php include "menu.php"; ?>



    <!-- Page Heading

    ================================================== -->

    <div class="page-heading">

      <div class="container">

        <div class="row">

          <div class="col-md-10 col-md-offset-1">

            <img src="assets/images/label/jogos.png" alt="">

          </div>

        </div>

      </div>

    </div>

    <!-- Content

    ================================================== -->





    <?php require "cms/core/model.php"; ?>

    <?php require "cms/models/campeonatos.php"; ?>

    <?php $camp = new campeonatos(); ?>









    <nav class="content-filter">

      <div class="container">

        <a href="#" class="content-filter__toggle"></a>



        <ul class="content-filter__list">



          <?php $campeonato_id = (isset($_GET["camp"]) && $_GET["camp"] != "") ? $_GET["camp"] : 0; ?>

          <?php $temporada = (isset($_GET["temporada"]) && $_GET["temporada"] != "") ? $_GET["temporada"] : 2025; ?>

          <?php $grupo = (isset($_GET["grupo"])  && $_GET["grupo"] != "") ? $_GET["grupo"] : "A"; ?>




          <?php $rodada = (isset($_GET["rodada"])  && $_GET["rodada"] != "") ? $_GET["rodada"] : 1; ?>

          <?php $clube = (isset($_GET["clube"])   && $_GET["clube"] != "") ? $_GET["clube"] : false; ?>



          <?php // link ativo content-filter__item--active 
          ?>

          <?php foreach ($camp->getAll('all', $temporada, "FIELD(campeonato_id, '181', '180', '171', '168', '173', '176', '177', '175', '169', '170', '178', '174', '166', '167'),") as $campeonato) { ?>



            <?php if ($campeonato_id == 0) {
              $campeonato_id = $campeonato["campeonato_id"];
            } ?>





            <li class="<?php if ($campeonato["campeonato_id"] == $campeonato_id) {
                          echo "content-filter__item--active";
                        } ?>">
              <a href="
                  ?camp=<?php echo $campeonato["campeonato_id"]; ?>&temporada=<?php echo $temporada; ?>" class="content-filter__link">
                <small>
                  <?php echo $campeonato["descricao"]; ?>
                </small>
                <?php echo $campeonato["nome"]; ?>
              </a>
            </li>















          <?php } ?>



          <?php /*

              

              <li class="content-filter__item content-filter__item--active"><a href="#" class="content-filter__link"><small>Campeonato João Batista da Silva</small>1º Divisão</a></li>

              <li class="content-filter__item "><a href="#" class="content-filter__link"><small>Campeonato João Batista da Silva</small>2º Divisão</a></li>

              <li class="content-filter__item "><a href="#" class="content-filter__link"><small>Campeonato João Batista da Silva</small>3º Divisão</a></li>

              <li class="content-filter__item "><a href="#" class="content-filter__link"><small>Campeonato João Batista da Silva</small>40 Veteranos</a></li>

              <li class="content-filter__item "><a href="#" class="content-filter__link"><small>Campeonato João Batista da Silva</small>50 Veteranos</a></li>

              <li class="content-filter__item "><a href="#" class="content-filter__link"><small>Campeonato João Batista da Silva</small>60 Veteranos</a></li>              

              */ ?>





        </ul>

      </div>

    </nav>











    <br><br>



    <div class="site-content">

      <div class="container">

        <?php
        if ($campeonato_id == 75) {
        ?>
          <div class="row">
            <div class="col-md-12">
              <a href="./assets/images/Tabela Campeonato Juvenil 2022.pdf" target="_blank" style="font-weight: bold; font-size: 1.7rem; cursor: pointer; width: 100%; text-align: right; display: block; margin-bottom: 2rem;">
                Tabela Sub 17 2022 - BAIXE AQUI
              </a>
            </div>
          </div>
        <?php
        }
        if ($campeonato_id == 72) {
        ?>
          <div class="row">
            <div class="col-md-12">
              <a href="./assets/images/Tabela Campeonato Amador da Primeira Divisão 2022-2.pdf" target="_blank" style="font-weight: bold; font-size: 1.7rem; cursor: pointer; width: 100%; text-align: right; display: block; margin-bottom: 2rem;">
                Tabela Amador 1ª Divisão 2022 - BAIXE AQUI
              </a>
            </div>
          </div>
        <?php
        }
        if ($campeonato_id == 73) {
        ?>
          <div class="row">
            <div class="col-md-12">
              <a href="./assets/images/Tabela Campeonato Amador Segunda Divisão Grupo A - Temporada 2022.pdf" target="_blank" style="font-weight: bold; font-size: 1.7rem; cursor: pointer; width: 100%; text-align: right; display: block; margin-bottom: 2rem;">
                Tabela Amador 2ª Divisão 2022 (Grupo A) - BAIXE AQUI
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <a href="./assets/images/Tabela Campeonato Amador Segunda Divisão Grupo B - Temporada 2022.pdf" target="_blank" style="font-weight: bold; font-size: 1.7rem; cursor: pointer; width: 100%; text-align: right; display: block; margin-bottom: 2rem;">
                Tabela Amador 2ª Divisão 2022 (Grupo B) - BAIXE AQUI
              </a>
            </div>
          </div>
        <?php
        }
        if ($campeonato_id == 80) {
        ?>
          <div class="row">
            <div class="col-md-12">
              <a href="./assets/images/Tabela Oficial Campeonato Veterano de 40 anos - Temporada 2022.pdf" target="_blank" style="font-weight: bold; font-size: 1.7rem; cursor: pointer; width: 100%; text-align: right; display: block; margin-bottom: 2rem;">
                Tabela Veterano de 40 anos 2022 - BAIXE AQUI
              </a>
            </div>
          </div>
        <?php
        }
        if ($campeonato_id == 81) {
        ?>
          <div class="row">
            <div class="col-md-12">
              <a href="./assets/images/Tabela do Campeonato Veterano de 50 anos - Temporada 2022.pdf" target="_blank" style="font-weight: bold; font-size: 1.7rem; cursor: pointer; width: 100%; text-align: right; display: block; margin-bottom: 2rem;">
                Tabela Veterano de 50 anos 2022 - BAIXE AQUI
              </a>
            </div>
          </div>
        <?php
        }
        if ($campeonato_id == 82) {
        ?>
          <div class="row">
            <div class="col-md-12">
              <a href="./assets/images/Tabela Completa do Campeonato Veteranos de 60 anos - Temporada 2022.pdf" target="_blank" style="font-weight: bold; font-size: 1.7rem; cursor: pointer; width: 100%; text-align: right; display: block; margin-bottom: 2rem;">
                Tabela Veterano de 60 anos 2022 - BAIXE AQUI
              </a>
            </div>
          </div>
        <?php
        }
        if ($campeonato_id == 92) {
        ?>
          <div class="row">
            <div class="col-md-12">
              <a href="./assets/images/Tabela do XXXIII Torneio Renato Braga 2022.pdf" target="_blank" style="font-weight: bold; font-size: 1.7rem; cursor: pointer; width: 100%; text-align: right; display: block; margin-bottom: 2rem;">
                Tabela 1ª fase Renato Braga 2022 - BAIXE AQUI
              </a>
            </div>
          </div>
        <?php
        }
        if ($campeonato_id == 93) {
        ?>
          <div class="row">
            <div class="col-md-12">
              <a href="./assets/images/Tabela Completa - Copa LMFT Série Prata 2022.pdf" target="_blank" style="font-weight: bold; font-size: 1.7rem; cursor: pointer; width: 100%; text-align: right; display: block; margin-bottom: 2rem;">
                Tabela Completa Copa LMFT Série Prata 2022 - BAIXE AQUI
              </a>
            </div>
          </div>
        <?php
        }
        if ($campeonato_id == 96) {
        ?>
          <div class="row">
            <div class="col-md-12">
              <a href="./assets/images/Tabela Oficial Campeonatos Sub 13 e Sub 15 - Temporada 2022.pdf" target="_blank" style="font-weight: bold; font-size: 1.7rem; cursor: pointer; width: 100%; text-align: right; display: block; margin-bottom: 2rem;">
                Tabela Sub 15 - 2022 - BAIXE AQUI
              </a>
            </div>
          </div>
        <?php
        }
        if ($campeonato_id == 97) {
        ?>
          <div class="row">
            <div class="col-md-12">
              <a href="./assets/images/Tabela Oficial Campeonatos Sub 13 e Sub 15 - Temporada 2022.pdf" target="_blank" style="font-weight: bold; font-size: 1.7rem; cursor: pointer; width: 100%; text-align: right; display: block; margin-bottom: 2rem;">
                Tabela Sub 13 - 2022 - BAIXE AQUI
              </a>
            </div>
          </div>
        <?php
        }
        ?>
        <?php
        if ($campeonato_id == 116) {
        ?>
          <div class="row">
            <div class="col-md-12">
              <a href="./assets/images/Tabela do Campeonato Renato Braga de 2023.pdf" target="_blank" style="font-weight: bold; font-size: 1.7rem; cursor: pointer; width: 100%; text-align: right; display: block; margin-bottom: 2rem;">
                Tabela 1ª fase Renato Braga 2023 - BAIXE AQUI
              </a>
            </div>
          </div>
        <?php
        }
        ?>
        <?php
        if ($campeonato_id == 113) {
        ?>
          <div class="row">
            <div class="col-md-12">
              <a href="./assets/images/Tabela do Campeonato Veterano 60 anos de 2023.pdf" target="_blank" style="font-weight: bold; font-size: 1.7rem; cursor: pointer; width: 100%; text-align: right; display: block; margin-bottom: 2rem;">
                Tabela Veterano de 60 anos 2023 - BAIXE AQUI
              </a>
            </div>
          </div>
        <?php
        }
        ?>
        <?php
        if ($campeonato_id == 111) {
        ?>
          <div class="row">
            <div class="col-md-12">
              <a href="./assets/images/Tabela do Campeonato Amador da 1 Diviso de 2023.pdf" target="_blank" style="font-weight: bold; font-size: 1.7rem; cursor: pointer; width: 100%; text-align: right; display: block; margin-bottom: 2rem;">
                Tabela Amador 1° Divisão - BAIXE AQUI
              </a>
            </div>
          </div>
        <?php
        }
        ?>
        <?php
        if ($campeonato_id == 114) {
        ?>
          <div class="row">
            <div class="col-md-12">
              <a href="./assets/images/Tabela do Campeonato Veterano 50 anos de 2023.pdf" target="_blank" style="font-weight: bold; font-size: 1.7rem; cursor: pointer; width: 100%; text-align: right; display: block; margin-bottom: 2rem;">
                Tabela Veterano de 50 anos 2023 - BAIXE AQUI
              </a>
            </div>
          </div>
        <?php
        }
        ?>
        <?php
        if ($campeonato_id == 122) {
        ?>
          <div class="row">
            <div class="col-md-12">
              <a href="./assets/images/Tabela do Campeonato Sub 17 - Juvenil de 2023.pdf" target="_blank" style="font-weight: bold; font-size: 1.7rem; cursor: pointer; width: 100%; text-align: right; display: block; margin-bottom: 2rem;">
                Tabela Juvenil Sub 17 - BAIXE AQUI
              </a>
            </div>
          </div>
        <?php
        }
        ?>
        <?php
        if ($campeonato_id == 120) {
        ?>
          <div class="row">
            <div class="col-md-12">
              <a href="./assets/images/Tabela do Grupo A do Campeonato Amador da 2 Diviso de 2023.pdf" target="_blank" style="font-weight: bold; font-size: 1.7rem; cursor: pointer; width: 100%; text-align: right; display: block; margin-bottom: 2rem;">
                Tabela do Grupo A Campeonato Amador 2° Divisão- BAIXE AQUI
              </a>
              <a href="./assets/images/Tabela do Grupo B do Campeonato Amador da 2 Diviso de 2023.pdf" target="_blank" style="font-weight: bold; font-size: 1.7rem; cursor: pointer; width: 100%; text-align: right; display: block; margin-bottom: 2rem;">
                Tabela do Grupo B Campeonato Amador 2° Divisão- BAIXE AQUI
              </a>
            </div>
          </div>
        <?php
        }
        ?>
        <?php
        if ($campeonato_id == 124) {
        ?>
          <div class="row">
            <div class="col-md-12">
              <a href="./assets/images/Tabela do Campeonato Veterano 40 anos de 2023.pdf" target="_blank" style="font-weight: bold; font-size: 1.7rem; cursor: pointer; width: 100%; text-align: right; display: block; margin-bottom: 2rem;">
                Tabela Veterano de 40 anos 2023 - BAIXE AQUI
              </a>
            </div>
          </div>
        <?php
        }
        ?>
        <?php
        if ($campeonato_id == 125) {
        ?>
          <div class="row">
            <div class="col-md-12">
              <a href="./assets/images/Tabela do Campeonato Sub 13 de 2023.pdf" target="_blank" style="font-weight: bold; font-size: 1.7rem; cursor: pointer; width: 100%; text-align: right; display: block; margin-bottom: 2rem;">
                Tabela Sub 13 - BAIXE AQUI
              </a>
            </div>
          </div>
        <?php
        }
        ?>
        <?php
        if ($campeonato_id == 126) {
        ?>
          <div class="row">
            <div class="col-md-12">
              <a href="./assets/images/Tabela do Campeonato Sub 15 de 2023.pdf" target="_blank" style="font-weight: bold; font-size: 1.7rem; cursor: pointer; width: 100%; text-align: right; display: block; margin-bottom: 2rem;">
                Tabela Sub 15 - BAIXE AQUI
              </a>
            </div>
          </div>
        <?php
        }
        ?>
        <?php
        if ($campeonato_id == 123) {
        ?>
          <div class="row">
            <div class="col-md-12">
              <a href="./assets/images/Tabela do Campeonato Amador da 3 Diviso de 2023.pdf" target="_blank" style="font-weight: bold; font-size: 1.7rem; cursor: pointer; width: 100%; text-align: right; display: block; margin-bottom: 2rem;">
                Tabela Campeonato Amador da 3ª Divisão - BAIXE AQUI
              </a>
            </div>
          </div>
        <?php
        }
        ?>
        <?php
        if ($campeonato_id == 130) {
        ?>
          <div class="row">
            <div class="col-md-12">
              <a href="./assets/images/Tabela da IV Copa das Minas de 2023.pdf" target="_blank" style="font-weight: bold; font-size: 1.7rem; cursor: pointer; width: 100%; text-align: right; display: block; margin-bottom: 2rem;">
                Tabela IV Copa das Minas 2023 - BAIXE AQUI
              </a>
            </div>
          </div>
        <?php
        }
        ?>
        <?php
        if ($campeonato_id == 138) {
        ?>
          <div class="row">
            <div class="col-md-12">
              <a href="./assets/images/Tabela da V Copa das Minas de 2023.pdf" target="_blank" style="font-weight: bold; font-size: 1.7rem; cursor: pointer; width: 100%; text-align: right; display: block; margin-bottom: 2rem;">
                Tabela V Copa das Minas 2023 - BAIXE AQUI
              </a>
            </div>
          </div>
        <?php
        }
        ?>
        <?php
        if ($campeonato_id == 140) {
        ?>
          <div class="row">
            <div class="col-md-12">
              <a href="./assets/images/tabelas/2024/Tabela do XXXV Torneio Renato Braga Temporada 2024.pdf" target="_blank" style="font-weight: bold; font-size: 1.7rem; cursor: pointer; width: 100%; text-align: right; display: block; margin-bottom: 2rem;">
                Tabela do XXXV Torneio Renato Braga 2024
              </a>
            </div>
          </div>
        <?php
        }
        ?>
        <?php
        if ($campeonato_id == 142) {
        ?>
          <div class="row">
            <div class="col-md-12">
              <a href="./assets/images/tabelas/2024/Tabela do Campeonato Sub 20 Temporada 2024.pdf" target="_blank" style="font-weight: bold; font-size: 1.7rem; cursor: pointer; width: 100%; text-align: right; display: block; margin-bottom: 2rem;">
                Tabela Campeonato Sub 20 - 2024 - BAIXE AQUI
              </a>
            </div>
          </div>
        <?php
        }
        ?>
        <?php
        if ($campeonato_id == 141) {
        ?>
          <div class="row">
            <div class="col-md-12">
              <a href="./assets/images/tabelas/2024/Tabela da Copa LMFT Srie Prata Temporada 2024.pdf" target="_blank" style="font-weight: bold; font-size: 1.7rem; cursor: pointer; width: 100%; text-align: right; display: block; margin-bottom: 2rem;">
                Tabela da Copa LMFT Série Prata 2024
              </a>
            </div>
          </div>
        <?php
        }
        ?>
        <?php
        if ($campeonato_id == 143) {
        ?>
          <div class="row">
            <div class="col-md-12">
              <a href="./assets/images/tabelas/2024/Tabela do Campeonato Veterano de 50 anos - Temporada 2024.pdf" target="_blank" style="font-weight: bold; font-size: 1.7rem; cursor: pointer; width: 100%; text-align: right; display: block; margin-bottom: 2rem;">
                Tabela do Campeonato Veterano de 50 anos - Temporada 2024 - BAIXE AQUI
              </a>
            </div>
          </div>
        <?php
        }
        ?>
        <?php
        if ($campeonato_id == 144) {
        ?>
          <div class="row">
            <div class="col-md-12">
              <a href="./assets/images/tabelas/2024/Tabela do Campeonato Veterano de 60 anos - Temporada 2024.pdf" target="_blank" style="font-weight: bold; font-size: 1.7rem; cursor: pointer; width: 100%; text-align: right; display: block; margin-bottom: 2rem;">
                Tabela do Campeonato Veterano de 60 anos - Temporada 2024 - BAIXE AQUI
              </a>
            </div>
          </div>
        <?php
        }
        ?>
        <?php
        if ($campeonato_id == 145) {
        ?>
          <div class="row">
            <div class="col-md-12">
              <a href="./assets/images/tabelas/2024/Tabela do Campeonato Amador da Primeira Diviso Temporada 2024.pdf" target="_blank" style="font-weight: bold; font-size: 1.7rem; cursor: pointer; width: 100%; text-align: right; display: block; margin-bottom: 2rem;">
                Tabela do Campeonato Amador da Primeira Divisão Temporada 2024
              </a>
            </div>
          </div>
        <?php
        }
        ?>
        <?php
        if ($campeonato_id == 146) {
        ?>
          <div class="row">
            <div class="col-md-12">
              <a href="./assets/images/tabelas/2024/Tabela do Campeonato SUB 17 Temporada 2024.pdf" target="_blank" style="font-weight: bold; font-size: 1.7rem; cursor: pointer; width: 100%; text-align: right; display: block; margin-bottom: 2rem;">
                Tabela do Campeonato SUB 17 Temporada 2024
              </a>
            </div>
          </div>
        <?php
        }
        ?>
        <?php
        if ($campeonato_id == 148) {
        ?>
          <div class="row">
            <div class="col-md-12">
              <a href="./assets/images/tabelas/2024/Tabela do Grupo A do Campeonato Amador da Segunda Diviso Temporada 2024.pdf" target="_blank" style="font-weight: bold; font-size: 1.3rem; cursor: pointer; width: 100%; text-align: right; display: block; margin-bottom: 2rem;">
                Tabela do Grupo A do Campeonato Amador da Segunda Divisão Temporada 2024
              </a>
              <a href="./assets/images/tabelas/2024/Tabela do Grupo B do Campeonato Amador da Segunda Diviso Temporada 2024.pdf" target="_blank" style="font-weight: bold; font-size: 1.3rem; cursor: pointer; width: 100%; text-align: right; display: block; margin-bottom: 2rem;">
                Tabela do Grupo B do Campeonato Amador da Segunda Divisão Temporada 2024
              </a>
            </div>
          </div>
        <?php
        }
        ?>
        <?php
        if ($campeonato_id == 153) {
        ?>
          <div class="row">
            <div class="col-md-12">
              <a href="./assets/images/tabelas/2024/Tabela do Campeonato Veterano de 40 anos - Temporada 2024.pdf" target="_blank" style="font-weight: bold; font-size: 1.7rem; cursor: pointer; width: 100%; text-align: right; display: block; margin-bottom: 2rem;">
                Tabela do Campeonato Veterano 40 anos
              </a>
            </div>
          </div>
        <?php
        }
        ?>

        <div class="row">


          <!-- RODADA / TABELA DE JOGOS-->

          <div class="col-md-9 col-md-push-3">
            <header class="card__header card__header--has-filter" style="background: #f5f7f9">
              <h4>Tabela de Jogos</h4>
              <ul class="category-filter category-filter--featured">
                <?php /*
                  <li class="category-filter__item"><a href="#" class="category-filter__link" data-category="posts__item--category-1">1º Fase</a></li>
                  <li class="category-filter__item"><a href="#" class="category-filter__link" data-category="posts__item--category-2">2º Fase</a></li>
                  <li class="category-filter__item"><a href="#" class="category-filter__link" data-category="posts__item--category-3">Semi Finais</a></li>
                  <li class="category-filter__item"><a href="#" class="category-filter__link category-filter__link" data-category="posts__item--category-4">Final</a></li>
                  */ ?>
                <?php $grupos = $camp->getClassificacaoById($campeonato_id); ?>
                <?php if ($grupos != NULL && count($grupos) > 1) { ?>
                  <?php foreach ($camp->getClassificacaoById($campeonato_id) as $campeonato) { ?>
                    <?php //var_dump($campeonato["grupo"]);
                    ?>
                    <li class="category-filter__item"><a href="?camp=<?php echo $campeonato["campeonato_id"]; ?>&temporada=<?php echo $temporada; ?>&grupo=<?php echo $campeonato["grupo"]; ?>&rodada=<?php echo $rodada; ?>" class="category-filter__link <?php if ($campeonato["grupo"] == $grupo) {
                                                                                                                                                                                                                                                              echo "category-filter__link--active";
                                                                                                                                                                                                                                                            } ?>" data-category="posts__item--category-1">Grupo <?php echo $campeonato["grupo"]; ?></a></li>
                  <?php } ?>
                <?php } ?>
              </ul>
            </header>
            <!-- Team Latest Results -->
            <div class="card card--has-table" style="margin-top: 50px;">
              <div class="card__content">
                <div class="row">
                  <div class="col-md-12">
                    <a onclick="printResults()" style="background: #c01818; color: #FFF; font-size: 1.5rem; padding: .4rem 2rem; border-radius: 8px; font-weight: bold; margin: 1rem 0; display: inline-block; cursor: pointer;">
                      Imprimir resultados
                    </a>
                  </div>
                  <div class="col-md-12">
                    <small>Recomendamos imprimir no modo paisagem</small>
                  </div>
                </div>
                <iframe id="tabela-resultados-print" style="height: 0px; width: 0px; position: 'absolute'"></iframe>
                <div class="table-responsive" id="tabela-resultados">
                  <table class="table table-hover">
                    <tbody>
                      <?php $controle = 1; ?>
                      <?php
                      $mes["01"] = "Janeiro";
                      $mes["02"] = "Fevereiro";
                      $mes["03"] = "Março";
                      $mes["04"] = "Abril";
                      $mes["05"] = "Maio";
                      $mes["06"] = "Junho";
                      $mes["07"] = "Julho";
                      $mes["08"] = "Agosto";
                      $mes["09"] = "Setembro";
                      $mes["10"] = "Outubro";
                      $mes["11"] = "Novembro";
                      $mes["12"] = "Dezembro";
                      ?>
                      <?php if (!is_numeric($rodada)) {
                        $grupo = false;
                      } ?>

                      <?php $jogos = $camp->getJogosByCampeonatoId($campeonato_id, false, $grupo, $rodada, $clube); ?>

                      <?php if (count($jogos) == 0) { ?>
                        Não há jogos cadastrados no momento
                      <?php } ?>

                      <?php foreach ($jogos as $j) { ?>
                        <?php
                        $anexosJogo = $camp->getJogoAnexos($j['jogo_id']);
                        ?>
                        <?php if ($controle == 1) { ?>
                          <header>
                            <span style="font-size:20px; font-weight: 800;"><?php echo $j["rodada_descricao"]; ?></span><br>
                            <span style="font-size:16px; font-weight: 500;"><i> <?php echo date('d', strtotime($j["data"])) . " de " . $mes[date('m', strtotime($j["data"]))]; ?> <?php echo date('Y', strtotime($j["data"])); ?></i></span>
                          </header>
                        <?php } ?>
                        <?php $controle++; ?>
                        <tr style="border-bottom: 1px solid rgba(232,232,232,0.9)">
                          <td style="text-align: right; width: 8%; vertical-align: middle;"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date('H:i', strtotime($j["hora"])); ?> </td>
                          <td style="text-align: right; font-size: 13px; font-weight: bold; width: 25%; vertical-align: middle; text-transform: uppercase"><?php echo $j["clube_1"]; ?></td>
                          <td style="text-align: right; width: 5%; vertical-align: middle;">
                            <figure>
                              <?php if ($j["escudo_clube_1"] != "") { ?>
                                <img src="https://www.ligataubate.com.br/cms/assets/images/escudos/<?php echo $j["escudo_clube_1"]; ?>" width="40" />
                              <?php } else { ?>
                                <img src="assets/images/samples/logos/pirates_shield.png" alt="" width="40">
                              <?php } ?>
                            </figure>
                          </td>
                          <?php if ($j["realizado"] == 1) { ?>
                            <td style="text-align: center; font-size: 22px; font-weight: bold; padding: 15px;width: 15%">
                              <span style="border: 1px solid rgba(232,232,232,0.9); padding-bottom: 3px; padding-left: 7px; padding-right: 7px; padding-top: 3px; font-size: 13px;"><?php echo $j["result_clube_1"]; ?> </span>
                              <span style="padding: 3px;color:rgba(232,232,232,0.9); font-size: 10px;">vs</span>
                              <span style="border: 1px solid rgba(232,232,232,0.9); padding-bottom: 3px; padding-left: 7px; padding-right: 7px; padding-top: 3px; font-size: 13px;"><?php echo $j["result_clube_2"]; ?> </span>
                              <?php if ($j["penal_clube_1"] > 0 || $j["penal_clube_2"] > 0) { ?>
                                <br />
                                <span style="border: 1px solid rgba(232,232,232,0.9); padding-bottom: 3px; padding-left: 7px; padding-right: 7px; padding-top: 3px; font-size: 13px;"> <?php echo $j["penal_clube_1"]; ?> </span>
                                <span style="padding: 3px;color:rgba(232,232,232,0.9); font-size: 10px;">vs</span>
                                <span style="border: 1px solid rgba(232,232,232,0.9); padding-bottom: 3px; padding-left: 7px; padding-right: 7px; padding-top: 3px; font-size: 13px;"> <?php echo $j["penal_clube_2"]; ?> </span>
                              <?php } ?>
                            </td>
                          <?php } else { ?>
                            <td style="text-align: center; font-size: 22px; font-weight: bold; padding: 15px;width: 15%">
                              <span style="padding: 3px;color:rgba(232,232,232,0.9)">vs</span>
                            </td>
                          <?php } ?>
                          <td style="text-align: right; width: 5%; vertical-align: middle;">
                            <figure>
                              <?php if ($j["escudo_clube_2"] != "") { ?>
                                <img src="https://www.ligataubate.com.br/cms/assets/images/escudos/<?php echo $j["escudo_clube_2"]; ?>" width="40" />
                              <?php } else { ?>
                                <img src="assets/images/samples/logos/pirates_shield.png" alt="" width="40">
                              <?php } ?>
                            </figure>
                          </td>
                          <td style="text-align: left; font-size: 13px; font-weight: bold; padding-top: 20px; padding-right: 20px; padding-bottom: 20px; width: 25%; text-transform: uppercase"><?php echo $j["clube_2"]; ?></td>
                          <td style="text-align: right; width: 18%; vertical-align: middle;">Local: <?php echo $j["estadio"]; ?></td>
                        </tr>
                        <?php if ($j["obs"]) { ?> <tr>
                            <td colspan="7"> <?php echo $j["obs"]; ?> </td>
                          </tr> <?php } ?>
                        <?php if (sizeof($anexosJogo) > 0) { ?>
                          <tr>
                            <td colspan="7">
                              <?php foreach ($anexosJogo as $anexo) { ?>
                                <a href="<?= "https://www.ligataubate.com.br/cms/assets/images/sumulas/" . $j['jogo_id'] . "/" . $anexo['foto'] ?>" target="_blank" style="margin-right: .7rem;">Anexo (<?= $anexo['ord'] ?>)</a>
                              <?php } ?>
                            </td>
                          </tr>
                        <?php } ?>
                      <?php } ?>
                      <?php /*
                  <tr style="border-bottom: 1px solid rgba(232,232,232,0.9)">
                    <td style="text-align: right; width: 5%; vertical-align: middle;">10h30</td>
                    <td style="text-align: right; font-size: 15px; font-weight: bold; width: 25%; vertical-align: middle;">União Operária</td>
                    <td style="text-align: right; width: 5%; vertical-align: middle;">
                        <figure>
                          <img src="assets/images/samples/logos/sharks_shield.png" alt="">
                        </figure>
                    </td>
                    <td style="text-align: center; font-size: 22px; font-weight: bold; padding: 15px;width: 15%">		
                         <span style="border: 1px solid rgba(232,232,232,0.9); padding-bottom: 3px; padding-left: 7px; padding-right: 7px; padding-top: 3px;">3</span>
						 <span style="padding: 3px;color:rgba(232,232,232,0.9)">vs</span>
                         <span style="border: 1px solid rgba(232,232,232,0.9); padding-bottom: 3px; padding-left: 7px; padding-right: 7px; padding-top: 3px;">2</span>
                    </td>
                    <td style="text-align: right; width: 5%; vertical-align: middle;">
                        <figure>
                          <img src="assets/images/samples/logos/sharks_shield.png" alt="">
                        </figure>
                    </td>
                    <td style="text-align: left; font-size: 15px; font-weight: bold; padding-top: 20px; padding-right: 20px; padding-bottom: 20px; width: 25%">União Operária</td>
                    <td style="text-align: right; width: 18%; vertical-align: middle;">Local: União Operária</td>
                  </tr>
                  <tr style="border-bottom: 1px solid rgba(232,232,232,0.9)">
                    <td style="text-align: right; width: 5%; vertical-align: middle;">10h30</td>
                    <td style="text-align: right; font-size: 15px; font-weight: bold; width: 25%; vertical-align: middle;">União Operária</td>
                    <td style="text-align: right; width: 5%; vertical-align: middle;">
                        <figure>
                          <img src="assets/images/samples/logos/sharks_shield.png" alt="">
                        </figure>
                    </td>
                    <td style="text-align: center; font-size: 22px; font-weight: bold; padding: 15px;width: 15%">		
                         <span style="border: 1px solid rgba(232,232,232,0.9); padding-bottom: 3px; padding-left: 7px; padding-right: 7px; padding-top: 3px;">3</span>
						 <span style="padding: 3px;color:rgba(232,232,232,0.9)">vs</span>
                         <span style="border: 1px solid rgba(232,232,232,0.9); padding-bottom: 3px; padding-left: 7px; padding-right: 7px; padding-top: 3px;">2</span>
                    </td>
                    <td style="text-align: right; width: 5%; vertical-align: middle;">
                        <figure>
                          <img src="assets/images/samples/logos/sharks_shield.png" alt="">
                        </figure>
                    </td>
                    <td style="text-align: left; font-size: 15px; font-weight: bold; padding-top: 20px; padding-right: 20px; padding-bottom: 20px; width: 25%">União Operária</td>
                    <td style="text-align: right; width: 18%; vertical-align: middle;">Local: União Operária</td>
                  </tr>
                  <tr style="border-bottom: 1px solid rgba(232,232,232,0.9)">
                    <td style="text-align: right; width: 5%; vertical-align: middle;">10h30</td>
                    <td style="text-align: right; font-size: 15px; font-weight: bold; width: 25%; vertical-align: middle;">União Operária</td>
                    <td style="text-align: right; width: 5%; vertical-align: middle;">
                        <figure>
                          <img src="assets/images/samples/logos/sharks_shield.png" alt="">
                        </figure>
                    </td>
                    <td style="text-align: center; font-size: 22px; font-weight: bold; padding: 15px;width: 15%">		
                         <span style="border: 1px solid rgba(232,232,232,0.9); padding-bottom: 3px; padding-left: 7px; padding-right: 7px; padding-top: 3px;">3</span>
						 <span style="padding: 3px;color:rgba(232,232,232,0.9)">vs</span>
                         <span style="border: 1px solid rgba(232,232,232,0.9); padding-bottom: 3px; padding-left: 7px; padding-right: 7px; padding-top: 3px;">2</span>
                    </td>
                    <td style="text-align: right; width: 5%; vertical-align: middle;">
                        <figure>
                          <img src="assets/images/samples/logos/sharks_shield.png" alt="">
                        </figure>
                    </td>
                    <td style="text-align: left; font-size: 15px; font-weight: bold; padding-top: 20px; padding-right: 20px; padding-bottom: 20px; width: 25%">União Operária</td>
                    <td style="text-align: right; width: 18%; vertical-align: middle;">Local: União Operária</td>
                  </tr>
                  <tr style="border-bottom: 1px solid rgba(232,232,232,0.9)">
                    <td style="text-align: right; width: 5%; vertical-align: middle;">10h30</td>
                    <td style="text-align: right; font-size: 15px; font-weight: bold; width: 25%; vertical-align: middle;">União Operária</td>
                    <td style="text-align: right; width: 5%; vertical-align: middle;">
                        <figure>
                          <img src="assets/images/samples/logos/sharks_shield.png" alt="">
                        </figure>
                    </td>
                    <td style="text-align: center; font-size: 22px; font-weight: bold; padding: 15px;width: 15%">		
                         <span style="border: 1px solid rgba(232,232,232,0.9); padding-bottom: 3px; padding-left: 7px; padding-right: 7px; padding-top: 3px;">3</span>
						 <span style="padding: 3px;color:rgba(232,232,232,0.9)">vs</span>
                         <span style="border: 1px solid rgba(232,232,232,0.9); padding-bottom: 3px; padding-left: 7px; padding-right: 7px; padding-top: 3px;">2</span>
                    </td>
                    <td style="text-align: right; width: 5%; vertical-align: middle;">
                        <figure>
                          <img src="assets/images/samples/logos/sharks_shield.png" alt="">
                        </figure>
                    </td>
                    <td style="text-align: left; font-size: 15px; font-weight: bold; padding-top: 20px; padding-right: 20px; padding-bottom: 20px; width: 25%">União Operária</td>
                    <td style="text-align: right; width: 18%; vertical-align: middle;">Local: União Operária</td>
                  </tr>
                  */ ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <!-- Team Latest Results / End -->





          </div>







          <!-- Sidebar -->

          <div class="sidebar sidebar--shop col-md-3 col-md-pull-9">



            <!-- Widget: CAMPEONATO -->

            <aside class="widget card widget--sidebar widget_categories">

              <div class="widget__content card__content">



                <div class="form-group">

                  <label class="control-label" for="review-stars">Filtrar por temporada</label>

                  <select name="review-stars" id="review-stars" class="form-control" style="text-transform: uppercase; color:#000000; font-weight: bold;" onchange="window.location='?temporada='+this.value">
                    <option value=""> Selecione uma temporada</option>
                    <option value="2025" <?php echo ($temporada === '2025') ? 'selected' : ''; ?>> 2025 </option>
                    <option value="2024" <?php echo ($temporada === '2024') ? 'selected' : ''; ?>> 2024 </option>
                    <option value="2023" <?php echo ($temporada === '2023') ? 'selected' : ''; ?>> 2023 </option>
                    <option value="2022" <?php echo ($temporada == '2022') ? 'selected' : ''; ?>> 2022 </option>
                    <option value="2021" <?php echo ($temporada == '2021') ? 'selected' : ''; ?>> 2021 </option>
                    <option value="2020" <?php echo ($temporada == '2020') ? 'selected' : ''; ?>> 2020 </option>
                    <option value="2019" <?php echo ($temporada == '2019') ? 'selected' : ''; ?>> 2019 </option>
                    <option value="2018" <?php echo ($temporada == '2018') ? 'selected' : ''; ?>> 2018 </option>
                    <option value="2017" <?php echo ($temporada == '2017') ? 'selected' : ''; ?>> 2017 </option>
                  </select>
                </div>



                <div class="form-group">

                  <label class="control-label" for="review-stars">Filtrar por Rodada</label>

                  <select name="review-stars" id="review-stars" class="form-control" style="text-transform: uppercase; color:#000000; font-weight: bold;" onchange="window.location='?camp=<?php echo $campeonato_id; ?>&temporada=<?php echo $temporada; ?>&grupo=<?php echo $grupo; ?>&rodada='+this.value+'<?php if ($clube) {
                                                                                                                                                                                                                                                                                                                echo "&clube=" . $clube;
                                                                                                                                                                                                                                                                                                              } ?>'">
                    <option value=""> Selecione uma rodada </option>



                    <?php
                    foreach ($camp->getRodadasByCampeonatoId($campeonato_id) as $r) { ?>



                      <?php if ($j["rodada"] === $r["rodada"]) {
                      ?>



                        <option selected value="<?php echo $r["rodada"]; ?>"> <?php echo $r["rodada_descricao"]; ?> - <?php echo date('d/m/Y', strtotime($r["data"])); ?> </option>



                      <?php } else { ?>



                        <option value="<?php echo $r["rodada"]; ?>"> <?php echo $r["rodada_descricao"]; ?> - <?php echo date('d/m/Y', strtotime($r["data"])); ?> </option>



                      <?php } ?>



                    <?php } ?>



                    <?php /*

                          <option value="5">Rodada 1</option>

                          <option value="4">Rodada 2</option>

                          <option value="3">Rodada 3</option>

                          <option value="2">Rodada 4</option>

                          <option value="1">Rodada 5</option>

                          */ ?>

                  </select>

                </div>



                <div class="form-group">

                  <label class="control-label" for="review-stars">Filtrar por Clube</label>

                  <select name="review-stars" id="review-stars" class="form-control" style="text-transform: uppercase; color:#000000; font-weight: bold;" onchange="window.location='?camp=<?php echo $campeonato_id; ?>&temporada=<?php echo $temporada; ?>&grupo=<?php echo $grupo; ?>&rodada=<?php echo $rodada; ?>&clube='+this.value">



                    <option value=""> Selecione um clube </option>



                    <?php //foreach($camp->getClubesByCampeonatoId($campeonato_id) as $c){
                    ?>

                    <?php foreach ($camp->getClubesByCampeonatoIdAndGrupo($campeonato_id, $grupo) as $c) { ?>



                      <?php if ($clube == $c["clube_id"]) { ?>



                        <option selected value="<?php echo $c["clube_id"]; ?>"> <?php echo $c["nickname"]; ?> </option>



                      <?php } else { ?>



                        <option value="<?php echo $c["clube_id"]; ?>"> <?php echo $c["nickname"]; ?> </option>



                      <?php } ?>





                    <?php } ?>



                    <?php /*

                          <option value="5">União Operária</option>

                          <option value="4">Esplanada</option>

                          <option value="3">Vila São Geraldo</option>

                          <option value="2">Vila São José</option>

                          <option value="1">XV de Novembro</option>

                          */ ?>





                  </select>

                </div>



                <?php switch ($campeonato_id) {

                  case 63:

                    $regulamento = '<a href="assets/images/RGE 60.pdf" "target="_blank" >REGULAMENTO</a>';

                    break;



                  case 62:

                    $regulamento = '<a href="assets/images/RGE 50 anos.pdf" "target="_blank" >REGULAMENTO</a>';

                    break;



                    // case 66:



                    // break;



                    // case 60:



                    // break;



                    // case 58:



                    // break;



                  case 56:

                    $regulamento = '<a href="assets/images/RGE Primeira Divisão.pdf" "target="_blank" >REGULAMENTO</a>';

                    break;



                    // case 57:



                    // break;



                  case 55:

                    $regulamento = '<a href="assets/images/RGE Sub 20.pdf" "target="_blank" >REGULAMENTO</a>';

                    break;



                    // case 65:



                    // break;



                  case 64:

                    $regulamento = '<a href="assets/images/RGE%20sub%2013.pdf" "target="_blank" >REGULAMENTO</a>';

                    break;



                  default:

                    $regulamento = "";

                    break;
                } ?>



                <ul class="widget__list">



                  <!-- <li><a href="assets/images/RGC - 14.03.19.pdf" title="Regulamento Geral - Assembleia 14-03-2019" target="_blank">REGULAMENTO GERAL</a></li> -->

                  <li><?php echo $regulamento; ?></li>







                </ul>





              </div>

            </aside>

            <!-- Widget: CAMPEONATO -->







          </div>

          <!-- Sidebar / End -->



        </div>







        <h1></h1>







        <div class="row">







          <!-- RODADA / TABELA DE JOGOS-->

          <div class="col-md-12">









            <header class="card__header card__header--has-filter" style="background: #f5f7f9">

              <h4>Classificação</h4>



              <ul class="category-filter category-filter--featured">





                <?php $grupos = $camp->getClassificacaoById($campeonato_id); ?>

                <?php if (count($grupos) > 1) { ?>

                  <?php if ($campeonato_id != 52) { // correção temporaria
                  ?>

                    <li class="category-filter__item"><a href="?camp=<?php echo $campeonato_id; ?>&temporada=<?php echo $temporada; ?>&grupo=geral" class="category-filter__link <?php if ($grupo == "geral") {
                                                                                                                                                                                    echo "category-filter__link--active";
                                                                                                                                                                                  } ?>" data-category="posts__item--category-1">Geral</a></li>

                  <?php } ?>



                  <?php foreach ($camp->getClassificacaoById($campeonato_id) as $campeonato) { ?>



                    <?php //var_dump($campeonato["grupo"]);
                    ?>

                    <li class="category-filter__item"><a href="?camp=<?php echo $campeonato["campeonato_id"]; ?>&temporada=<?php echo $temporada; ?>&grupo=<?php echo $campeonato["grupo"]; ?>" class="category-filter__link <?php if ($campeonato["grupo"] == $grupo) {
                                                                                                                                                                                                                                echo "category-filter__link--active";
                                                                                                                                                                                                                              } ?>" data-category="posts__item--category-1">Grupo <?php echo $campeonato["grupo"]; ?></a></li>



                  <?php } ?>

                <?php } ?>





                <?php /*

                  <li class="category-filter__item "><a href="#" class="category-filter__link" data-category="posts__item--category-1">1º Fase</a></li>

                  

                  <li class="category-filter__item"><a href="#" class="category-filter__link" data-category="posts__item--category-2">2º Fase</a></li>

                  

                  <li class="category-filter__item"><a href="#" class="category-filter__link" data-category="posts__item--category-3">Semi Finais</a></li>

                  

                  <li class="category-filter__item"><a href="#" class="category-filter__link category-filter__link" data-category="posts__item--category-4">Final</a></li>

                  

                */ ?>



              </ul>



            </header>





            <div class="card card--has-table">

              <div class="card__content">

                <div class="table-responsive">

                  <table class="table table-hover table-standings table-standings--full table-standings--full-soccer">

                    <thead>

                      <tr>

                        <th class="team-standings__pos"></th>

                        <th class="team-standings__team">Times</th>

                        <th class="team-standings__played">P</th>

                        <th class="team-standings__win">J</th>

                        <th class="team-standings__lose">V</th>

                        <th class="team-standings__drawn">E</th>

                        <th class="team-standings__goals-for">D</th>

                        <th class="team-standings__goals-against">GP</th>

                        <th class="team-standings__goals-diff">GC</th>

                        <th class="team-standings__total-points">SG</th>

                        <th class="team-standings__points-diff">Aprov. %</th>

                      </tr>

                    </thead>

                    <tbody>



                      <?php $ord = 1; ?>



                      <?php foreach ($camp->getClubesByCampeonatoIdAndGrupo($campeonato_id, $grupo) as $classificacao) { ?>



                        <tr>

                          <td class="team-standings__pos"><b><?php echo $ord;
                                                              $ord++; ?></b></td>

                          <td class="team-standings__team">

                            <div class="team-meta">

                              <figure class="team-meta__logo" style="width: 22px; padding: 2px;">

                                <?php if ($classificacao["escudo"] != "") { ?>

                                  <img src="https://www.ligataubate.com.br/cms/assets/images/escudos/<?php echo $classificacao["escudo"]; ?>" />

                                <?php } else { ?>

                                  <img src="assets/images/samples/logos/pirates_shield.png" alt="">

                                <?php } ?>

                              </figure>

                              <div class="team-meta__info">

                                <h6 class="team-meta__name" style="font-size: 12px; font-weight: 600; text-transform: uppercase"><?php echo $classificacao["nickname"]; ?></h6>

                              </div>

                            </div>

                          </td>

                          <td class="team-standings__played" style="font-weight: 600; font-size: 13px"><?php echo $classificacao["PG"]; ?></td>

                          <td class="team-standings__win" style="font-weight: 600; color:rgba(49,49,49,0.7)"><?php echo $classificacao["J"]; ?></td>

                          <td class="team-standings__lose" style="font-weight: 600; color:rgba(49,49,49,0.7)"><?php echo $classificacao["V"]; ?></td>

                          <td class="team-standings__drawn" style="font-weight: 600; color:rgba(49,49,49,0.7)"><?php echo $classificacao["E"]; ?></td>

                          <td class="team-standings__goals-for" style="font-weight: 600; color:rgba(49,49,49,0.7)"><?php echo $classificacao["D"]; ?></td>

                          <td class="team-standings__goals-against" style="font-weight: 600; color:rgba(49,49,49,0.7)"><?php echo $classificacao["GP"]; ?></td>

                          <td class="team-standings__goals-diff" style="font-weight: 600; color:rgba(49,49,49,0.7)"><?php echo $classificacao["GC"]; ?></td>

                          <td class="team-standings__total-points" style="font-weight: 600; color:rgba(49,49,49,0.7)"><?php echo $classificacao["S"]; ?></td>

                          <td class="team-standings__points-diff" style="font-weight: 600; color:rgba(49,49,49,0.7)"><?php echo $classificacao["AP"]; ?></td>

                        </tr>



                      <?php } ?>





                      <?php



                      /*

                  <tr>

                    <td class="team-standings__pos"><b>01</b></td>

                    <td class="team-standings__team">

                      <div class="team-meta">

                        <figure class="team-meta__logo">

                          <img src="assets/images/samples/logos/pirates_shield.png" alt="">

                        </figure>

                        <div class="team-meta__info">

                          <h6 class="team-meta__name">União Operária</h6>

                        </div>

                      </div>

                    </td>

                    <td class="team-standings__played">30</td>

                    <td class="team-standings__win">10</td>

                    <td class="team-standings__lose">10</td>

                    <td class="team-standings__drawn">0</td>

                    <td class="team-standings__goals-for">0</td>

                    <td class="team-standings__goals-against">52</td>

                    <td class="team-standings__goals-diff">17</td>

                    <td class="team-standings__total-points">+18</td>

                    <td class="team-standings__points-diff">100%</td>

                  </tr>

                  <tr>

                    <td class="team-standings__pos"><b>01</b></td>

                    <td class="team-standings__team">

                      <div class="team-meta">

                        <figure class="team-meta__logo">

                          <img src="assets/images/samples/logos/pirates_shield.png" alt="">

                        </figure>

                        <div class="team-meta__info">

                          <h6 class="team-meta__name">União Operária</h6>

                        </div>

                      </div>

                    </td>

                    <td class="team-standings__played">30</td>

                    <td class="team-standings__win">10</td>

                    <td class="team-standings__lose">10</td>

                    <td class="team-standings__drawn">0</td>

                    <td class="team-standings__goals-for">0</td>

                    <td class="team-standings__goals-against">52</td>

                    <td class="team-standings__goals-diff">17</td>

                    <td class="team-standings__total-points">+18</td>

                    <td class="team-standings__points-diff">100%</td>

                  </tr>

                  <tr>

                    <td class="team-standings__pos"><b>01</b></td>

                    <td class="team-standings__team">

                      <div class="team-meta">

                        <figure class="team-meta__logo">

                          <img src="assets/images/samples/logos/pirates_shield.png" alt="">

                        </figure>

                        <div class="team-meta__info">

                          <h6 class="team-meta__name">União Operária</h6>

                        </div>

                      </div>

                    </td>

                    <td class="team-standings__played">30</td>

                    <td class="team-standings__win">10</td>

                    <td class="team-standings__lose">10</td>

                    <td class="team-standings__drawn">0</td>

                    <td class="team-standings__goals-for">0</td>

                    <td class="team-standings__goals-against">52</td>

                    <td class="team-standings__goals-diff">17</td>

                    <td class="team-standings__total-points">+18</td>

                    <td class="team-standings__points-diff">100%</td>

                  </tr>

                  <tr>

                    <td class="team-standings__pos"><b>01</b></td>

                    <td class="team-standings__team">

                      <div class="team-meta">

                        <figure class="team-meta__logo">

                          <img src="assets/images/samples/logos/pirates_shield.png" alt="">

                        </figure>

                        <div class="team-meta__info">

                          <h6 class="team-meta__name">União Operária</h6>

                        </div>

                      </div>

                    </td>

                    <td class="team-standings__played">30</td>

                    <td class="team-standings__win">10</td>

                    <td class="team-standings__lose">10</td>

                    <td class="team-standings__drawn">0</td>

                    <td class="team-standings__goals-for">0</td>

                    <td class="team-standings__goals-against">52</td>

                    <td class="team-standings__goals-diff">17</td>

                    <td class="team-standings__total-points">+18</td>

                    <td class="team-standings__points-diff">100%</td>

                  </tr>

                      */ ?>



                    </tbody>

                  </table>

                </div>

              </div>

            </div>



          </div>













        </div>





        <div class="row">





          <!-- RODADA / TABELA DE JOGOS-->

          <div class="col-md-8">



            <header class="card__header card__header--has-filter" style="background: #f5f7f9">

              <h4>Artilharia</h4>





            </header>





            <div class="card card--has-table" style="height:500px;overflow:auto">

              <div class="card__content">

                <div class="table-responsive">

                  <table class="table table-hover table-standings table-standings--full table-standings--full-soccer">

                    <thead>

                      <tr>



                        <th></th>

                        <th class="team-standings__played">Jogador</th>

                        <th class="team-standings__points-diff">Gols</th>

                        <th class="team-standings__team">Time</th>

                      </tr>

                    </thead>

                    <tbody>





                      <?php $ocorrencias = $camp->getOcorrenciasByCampeonatoId($campeonato_id, $clube); ?>





                      <?php $posicao = 1; ?>



                      <?php if (isset($ocorrencias)) { ?>



                        <?php foreach ($ocorrencias as $ocorrencia) { ?>







                          <?php if ($ocorrencia["ref"] == "gol") { ?>



                            <?php //var_dump($ocorrencia);
                            ?>





                            <?php if (!$clube || ($ocorrencia["clube_id"] == $clube)) { ?>

                              <tr>

                                <td class="team-standings__pos"><b><?php echo $posicao; ?></b></td>





                                <td class="team-standings__played" style="font-weight: 600; font-size: 12px; text-transform: uppercase; text-align: left; color:rgba(49,49,49,0.7)">
                                  <img src="../cms/assets/images/atletas/<?= $ocorrencia['foto'] ?>" alt="Foto do atleta" class="fotoAtleta" />
                                  <?php echo strtoupper($ocorrencia["atleta"]); ?>
                                </td>



                                <td class="team-standings__points-diff" style="font-weight: 600; font-size: 12px"><?php echo $ocorrencia["qde"]; ?></td>



                                <td class="team-standings__team">

                                  <div class="team-meta">

                                    <figure class="team-meta__logo" style="width: 22px; padding: 2px;">

                                      <?php if ($ocorrencia["escudo"] != "") { ?>

                                        <img src="https://www.ligataubate.com.br/cms/assets/images/escudos/<?php echo $ocorrencia["escudo"]; ?>" />

                                      <?php } else { ?>

                                        <img src="assets/images/samples/logos/pirates_shield.png" alt="">

                                      <?php } ?>

                                    </figure>

                                    <div class="team-meta__info">

                                      <h6 class="team-meta__name" style="font-weight: 600; color:rgba(49,49,49,0.7)"><?php echo strtoupper($ocorrencia["clube"]); ?></h6>

                                    </div>

                                  </div>

                                </td>



                              </tr>

                            <?php } ?>





                            <?php $posicao++; ?>



                          <?php } ?>







                        <?php } ?>

                      <?php } else { ?>



                        <tr>

                          <td colspan="4"> Não temos informações ainda para este campeonato :(</td>

                        </tr>



                      <?php } ?>













                      <?php /*

                  <tr>

                    <td class="team-standings__pos"><b>01</b></td>

                    <td class="team-standings__team">

                      <div class="team-meta">

                        <figure class="team-meta__logo">

                          <img src="assets/images/samples/logos/pirates_shield.png" alt="">

                        </figure>

                        <div class="team-meta__info">

                          <h6 class="team-meta__name">União Operária</h6>

                        </div>

                      </div>

                    </td>

                    <td class="team-standings__played">Renato Antunes</td>

                    <td class="team-standings__points-diff">18</td>

                  </tr>

                  <tr>

                    <td class="team-standings__pos"><b>01</b></td>

                    <td class="team-standings__team">

                      <div class="team-meta">

                        <figure class="team-meta__logo">

                          <img src="assets/images/samples/logos/pirates_shield.png" alt="">

                        </figure>

                        <div class="team-meta__info">

                          <h6 class="team-meta__name">União Operária</h6>

                        </div>

                      </div>

                    </td>

                    <td class="team-standings__played">Renato Antunes</td>

                    <td class="team-standings__points-diff">18</td>

                  </tr>

                  <tr>

                    <td class="team-standings__pos"><b>01</b></td>

                    <td class="team-standings__team">

                      <div class="team-meta">

                        <figure class="team-meta__logo">

                          <img src="assets/images/samples/logos/pirates_shield.png" alt="">

                        </figure>

                        <div class="team-meta__info">

                          <h6 class="team-meta__name">União Operária</h6>

                        </div>

                      </div>

                    </td>

                    <td class="team-standings__played">Renato Antunes</td>

                    <td class="team-standings__points-diff">18</td>

                  </tr>



                  */ ?>



                    </tbody>

                  </table>

                </div>

              </div>

            </div>



          </div>





          <?php /*



                   <!-- RODADA / TABELA DE JOGOS-->

          <div class="col-md-6">

            

              <header class="card__header card__header--has-filter" style="background: #f5f7f9">

                <h4>Cartões</h4>

                                

                                

              </header>





    <div class="card card--has-table" style="height:500px;overflow:auto">

          <div class="card__content">

            <div class="table-responsive">

              <table class="table table-hover table-standings table-standings--full table-standings--full-soccer">

                <thead>

                  <tr>

                    <th class="team-standings__pos"></th>

                    <th class="team-standings__team">Time</th>

                    <th class="team-standings__played">Jogador</th>

                    <th class="team-standings__points-diff">Cartões</th>

                  </tr>

                </thead>

                <tbody>

                 



                 <?php $ocorrencias = $camp->getOcorrenciasByCampeonatoId($campeonato_id);?>





                  <?php $posicao = 1;?>





                  <?php if(isset($ocorrencias)){?>



                  <?php foreach($ocorrencias as $ocorrencia){?>



               



                    <?php if($ocorrencia["ref"]=="cartao_amarelo"){?>



                     <?php //var_dump($ocorrencia);?>





                      <?php if(!$clube || ($ocorrencia["clube_id"]==$clube)){?>

                  <tr>

                    <td class="team-standings__pos"><b><?php echo $posicao;?></b></td>

                    <td class="team-standings__team">

                      <div class="team-meta">

                        <figure class="team-meta__logo">

                           <?php if($ocorrencia["escudo"]!=""){?> 

                          <img src="http://www.ligataubate.com.br/cms/assets/images/escudos/<?php echo $ocorrencia["escudo"];?>" />

                          <?php } else{ ?>

                           <img src="assets/images/samples/logos/pirates_shield.png" alt="">

                          <?php } ?>

                        </figure>

                        <div class="team-meta__info">

                          <h6 class="team-meta__name"><?php echo strtoupper ($ocorrencia["clube"]);?></h6>

                        </div>

                      </div>

                    </td>

                    <td class="team-standings__played"><?php echo strtoupper ($ocorrencia["atleta"]);?></td>

                    <td class="team-standings__points-diff"><?php echo $ocorrencia["qde"];?></td>

                  </tr>



                   <?php } ?>





                    <?php $posicao++;?>

                    <?php } ?>







                  <?php } ?>

                  <?php } else{?>



                  <tr>

                    <td colspan="4"> Não temos informações ainda para este campeonato :(</td>

                  </tr>



                  <?php } ?>

                  

                </tbody>

              </table>

            </div>

          </div>

        </div>

                      

             </div>



             */ ?>







        </div><!--end row artilharia-->



      </div>

    </div>





    <!-- Footer

    ================================================== -->



    <?php include "footer.php"; ?>

    <!-- Footer / End -->





  </div>



  <!-- Javascript Files

  ================================================== -->

  <!-- Core JS -->

  <?php /*

  <script src="assets/vendor/jquery/jquery.min.js"></script>

  <!--<script src="assets/js/core-min.js"></script>-->



  <!-- Vendor JS -->

  <script src="assets/vendor/twitter/jquery.twitter.js"></script>



  <!-- Template JS -->

  <script src="assets/js/init.js"></script>

  <script src="assets/js/custom.js"></script>



  */ ?>



</body>



</html>