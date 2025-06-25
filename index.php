<?php include "funcoes.php"; ?>
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
    .horario-container {
      margin-bottom: 1em;
      background: #F6F6F6;
      padding: 0.8em;
    }

    .horario-title {
      font-size: 1.3em;
      font-weight: 700;
      color: #c01818;
      margin: 0rem 0rem 1rem 0rem;
    }

    .horario-text {
      font-size: 1em;
      color: black;
      margin: 0rem 0rem 0rem 0rem;
    }

    .only-phone {
      display: inline;
    }

    .only-desktop {
      display: none;
    }

    @media only screen and (min-width: 991px) {
      .banner-home {
        display: none;
      }
    }

    @media only screen and (min-width: 968px) {
      .horario-title {
        font-size: 1.3em;
        font-weight: 700;
        color: #c01818;
        margin: 0rem 0rem 1rem 0rem;
      }

      .horario-text {
        font-size: 1em;
        color: black;
        margin: 0rem 0rem 0rem 0rem;
      }

      .only-phone {
        display: none;
      }

      .only-desktop {
        display: inline;
      }

    }
  </style>

</head>

<body class="template-soccer">
  <div class="site-wrapper clearfix">
    <div class="site-overlay"></div>
    <!-- Header
    ================================================== -->
    <?php include "menu.php"; ?>
    <div class="header__top-bar clearfix" style="background-color:#fff; padding-top: 15px; display:none">
      <div class="container" style="border-bottom: 2px solid #D1D1D1">
        <ul class="col-lg-12 col-md-12 col-xs-12" style=" list-style: none; text-align: center;">
          <li style="padding: 1px;">
            <a href="#"><img src="assets/images/clubes/thumb/abaete.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Abaeté"></a>
            <a href="#"><img src="assets/images/clubes/thumb/atletico-tremembe.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Atlético Tremembé"></a>
            <a href="#"><img src="assets/images/clubes/thumb/baroneza.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Baroneza"></a>
            <a href="#"><img src="assets/images/clubes/thumb/belem.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Belém"></a>
            <a href="#"><img src="assets/images/clubes/thumb/brasileirinho.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Brasileirinho"></a>
            <a href="#"><img src="assets/images/clubes/thumb/camaroes.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Camarões"></a>
            <a href="#"><img src="assets/images/clubes/thumb/cecap.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Cecap"></a>
            <a href="#"><img src="assets/images/clubes/thumb/esplanada.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Esplanada"></a>
            <a href="#"><img src="assets/images/clubes/thumb/flamenguinho.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Flamenguinho"></a>
            <a href="#"><img src="assets/images/clubes/thumb/gurilandia.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Gurilândia"></a>
            <a href="#"><img src="assets/images/clubes/thumb/independencia.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Independência"></a>
            <a href="#"><img src="assets/images/clubes/thumb/ipanema.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Ipanema"></a>
            <a href="#"><img src="assets/images/clubes/thumb/Juventus.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Juventus"></a>
            <a href="#"><img src="assets/images/clubes/thumb/marlene-miranda.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Marlene Miranda"></a>
            <a href="#"><img src="assets/images/clubes/thumb/mourisco.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Mourisco"></a>
            <a href="#"><img src="assets/images/clubes/thumb/nova-america.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nova América"></a>
            <a href="#"><img src="assets/images/clubes/thumb/operario.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Operário"></a>
            <a href="#"><img src="assets/images/clubes/thumb/parque-sao-luiz.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Parque São Luiz"></a>
            <a href="#"><img src="assets/images/clubes/thumb/parque-urupes.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Parque Urupês"></a>
            <a href="#"><img src="assets/images/clubes/thumb/rodoviario.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Rodoviário"></a>
            <a href="#"><img src="assets/images/clubes/thumb/uniao.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="União"></a>
            <a href="#"><img src="assets/images/clubes/thumb/vila-albina.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Vila Albina"></a>
            <!--<a href="#"><img src="assets/images/clubes/thumb/vila-nogueira.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Vila Nogueira"></a>-->
            <a href="#"><img src="assets/images/clubes/thumb/vila-sao-geraldo.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Vila São Geraldo"></a>
            <a href="#"><img src="assets/images/clubes/thumb/vila-sao-jose.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Vila São José"></a>
            <a href="#"><img src="assets/images/clubes/thumb/xv-de-novembro.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Xv de Novembro"></a>
            <a href="clubes"><img src="assets/images/clubes/thumb/todos.jpg" alt=""></a>
          </li>
        </ul>
      </div>
    </div>

    <!-- TABELA DE JOGOS
      <div class="header__top-bar clearfix">
        <div class="container">

    <ul class="nav nav-tabs nav-justified widget-tabbed__nav" role="tablist">
                    <li role="presentation" class="active"><a href="#widget-tabbed-newest" aria-controls="widget-tabbed-newest" role="tab" data-toggle="tab" aria-expanded="true">Taubateano A1</a></li>
                    <li role="presentation" class=""><a href="#widget-tabbed-commented" aria-controls="widget-tabbed-commented" role="tab" data-toggle="tab" aria-expanded="false">Taubateano A2</a></li>
                    <li role="presentation" class=""><a href="#widget-tabbed-popular" aria-controls="widget-tabbed-popular" role="tab" data-toggle="tab" aria-expanded="false">Taubateano A3</a></li>
                    <li role="presentation" class="active"><a href="#widget-tabbed-newest" aria-controls="widget-tabbed-newest" role="tab" data-toggle="tab" aria-expanded="true">Taubateano A1</a></li>
                    <li role="presentation" class=""><a href="#widget-tabbed-commented" aria-controls="widget-tabbed-commented" role="tab" data-toggle="tab" aria-expanded="false">Taubateano A2</a></li>
                    <li role="presentation" class=""><a href="#widget-tabbed-popular" aria-controls="widget-tabbed-popular" role="tab" data-toggle="tab" aria-expanded="false">Taubateano A3</a></li>
                  </ul>       
        
        </div>
      </div>
    -->

    <!-- Content
    ================================================== -->
    <div class="site-content" style="margin-top: 20px;">
      <div class="container">
        <!-- <div class="row">
          <div class="col-md-12 banner-home" style="margin-bottom: 1.5rem;">
            <img src="./assets/images/banner/new-capa-2023.jpg" alt="Liga Taubaté - 2023" style="width: 100%; max-height: 280px; object-fit: cover;" />
          </div>
        </div> -->
        <div class="row">
          <!-- Content -->
          <div class="content col-md-8">
            <!-- Notícias Destaques Slider -->
            <div class="card card--clean">
              <div class="card__content">
                <?php require "cms/core/model.php"; ?>
                <?php
                require "cms/models/usuarios.php";
                $usuario = new usuarios();
                $usuario->registrarAcesso();
                ?>
                <?php require "cms/models/noticias.php"; ?>
                <?php $not = new noticias(); ?>
                <!-- Slider -->
                <div class="slick posts posts--slider-featured posts-slider">
                  <?php foreach ($not->get(1, 4) as $noticia) { ?>
                    <div class="posts__item posts__item--category-1">
                      <a href="noticia.php?url=<?php echo $noticia["url"]; ?>" class="posts__link-wrapper">
                        <figure class="posts__thumb">
                          <?php if ($noticia["foto_principal"] == "") { ?>
                            <img width="800" src="https://ligataubate.com.br/assets/images/soccer/logo.png" alt="<?php echo $noticia["titulo"]; ?>">
                          <?php } else { ?>
                            <img width="800" src="https://www.ligataubate.com.br/cms/assets/images/noticias/<?php echo $noticia["foto_principal"]; ?>" alt="<?php echo $noticia["titulo"]; ?>">
                          <?php } ?>

                        </figure>
                        <div class="posts__inner">
                          <div class="posts__cat">
                            <span class="label posts__cat-label"><?php echo $noticia["categoria_titulo"]; ?></span>
                          </div>
                          <h6 class="posts__title" style="font-size: 24px;"><?php echo $noticia["titulo"]; ?></h6>

                        </div>
                      </a>
                    </div>

                  <?php } ?>

                </div>
                <!-- Slider / End -->

              </div>
            </div>
            <!-- Notícias Destaques Slider / End -->


            <!-- Notícias -->
            <div class="posts posts--cards post-grid row">

              <?php foreach ($not->get(2, 4) as $noticia) { ?>

                <div class="post-grid__item col-sm-6">
                  <div class="posts__item posts__item--card posts__item--category-1 card">
                    <figure class="posts__thumb">
                      <div class="posts__cat">
                        <span class="label posts__cat-label"> <?php echo $noticia["categoria_titulo"]; ?> </span>
                      </div>
                      <a href="noticia.php?url=<?php echo $noticia["url"]; ?>">
                        <?php if ($noticia["foto_principal"] == "") { ?>
                          <img src="https://www.ligataubate.com.br/assets/images/media.png" alt="<?php echo $noticia["titulo"]; ?>">
                        <?php } else { ?>
                          <img src="https://www.ligataubate.com.br/cms/assets/images/noticias/<?php echo $noticia["foto_principal"]; ?>" alt="<?php echo $noticia["titulo"]; ?>">
                        <?php } ?>
                      </a>
                    </figure>

                    <div class="posts__cat">
                      <span class="label posts__cat-label"> <?php echo $noticia["categoria_titulo"]; ?> </span>
                    </div>

                    <div class="posts__inner card__content">
                      <time datetime="" class="posts__date"><?php echo dataAbreviada($noticia["date_add"]); ?></time>

                      <h6 class="posts__title" style="font-size: 18px;"><a href="noticia.php?url=<?php echo $noticia["url"]; ?>"><?php echo $noticia["titulo"]; ?></a></h6>
                      <div class="posts__excerpt">
                        <?php //echo limitarTexto($noticia["corpo"], 150); 
                        ?>
                      </div>
                    </div>
                  </div>
                </div>

              <?php } ?>

            </div>
            <!-- Notícias / End -->

            <!-- Propaganda Banner -->
            <!-- <div class="" style="margin-bottom: 20px;">
        <a href="https://www.facebook.com/pg/fullfitnesstrainer" target="_blank"><img src="assets/images/parceiros/banner3.png" title="
Academia Full Fitness Trainer"></a>
            </div> -->
            <!-- Propaganda Banner / End -->

            <!-- Notícias Curtas -->
            <div class="row">
              <!-- <div class="col-sm-12">

                <header class="card__header">
                  <h3 style="margin-bottom: -10px;">Mais Notícias</h3>
                </header>

                <div class="card">
                  <div class="card__content">
                    <ul class="posts posts--simple-list">

                      <?php foreach ($not->get(3, 3) as $noticia) { ?>

                        <li class="posts__item posts__item--category-1">
                          <figure class="posts__thumb">
                            <a href="noticia.php?url=<?php echo $noticia["url"]; ?>">
                              <?php if ($noticia["foto_principal"] == "") { ?>
                                <img src="http://www.ligataubate.com.br/assets/images/pequena.png" alt="<?php echo $noticia["titulo"]; ?>">
                              <?php } else { ?>
                                <img src="http://www.ligataubate.com.br/cms/assets/images/noticias/<?php echo $noticia["foto_principal"]; ?>" width="200" alt="">
                              <?php } ?>
                            </a>
                          </figure>
                          <div class="posts__inner">
                            <div class="posts__cat">
                              <span class="label posts__cat-label"> <?php echo $noticia["categoria_titulo"]; ?></span>
                              &nbsp;
                              <time datetime="2016-08-23" class="posts__date" style="color: #BBBBBB; font-weight: 500; padding-bottom: 10px; margin-top: -3px; font-size: 1.1rem;"><?php echo dataAbreviada($noticia["date_add"]); ?></time>
                            </div>
                            <h6 class="posts__title" style="font-size: 2rem;"><a href="noticia.php?url=<?php echo $noticia["url"]; ?>"><?php echo $noticia["titulo"]; ?></a></h6>

                          </div>
                          <div class="">
                            <?php //echo limitarTexto($noticia["corpo"], 150); 
                            ?>
                          </div>
                        </li>

                      <?php } ?>



                    </ul>
                  </div>
                </div>
              </div> -->

              <?php /*
              <div class="col-sm-6">
                <div class="card">
                  <div class="card__content">
                    <ul class="posts posts--simple-list">
                      <li class="posts__item posts__item--category-1">
                        <figure class="posts__thumb">
                          <a href="#"><img src="assets/images/samples/post-img22-xs.jpg" alt=""></a>
                        </figure>
                        <div class="posts__inner">
                          <div class="posts__cat">
                            <span class="label posts__cat-label">1º Divisão</span>
                          </div>
                          <h6 class="posts__title"><a href="#">Título da notícia a ser inserido</a></h6>
                          <time datetime="2016-08-23" class="posts__date">26 de janeiro de 2017</time>
                        </div>
                        <div class="posts__excerpt posts__excerpt--space-sm">
                          Texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto.
                        </div>
                      </li>
                      <li class="posts__item posts__item--category-1">
                        <figure class="posts__thumb">
                          <a href="#"><img src="assets/images/samples/post-img22-xs.jpg" alt=""></a>
                        </figure>
                        <div class="posts__inner">
                          <div class="posts__cat">
                            <span class="label posts__cat-label">1º Divisão</span>
                          </div>
                          <h6 class="posts__title"><a href="#">Título da notícia a ser inserido</a></h6>
                          <time datetime="2016-08-23" class="posts__date">26 de janeiro de 2017</time>
                        </div>
                        <div class="posts__excerpt posts__excerpt--space-sm">
                          Texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto.
                        </div>
                      </li>
                      <li class="posts__item posts__item--category-1">
                        <figure class="posts__thumb">
                          <a href="#"><img src="assets/images/samples/post-img22-xs.jpg" alt=""></a>
                        </figure>
                        <div class="posts__inner">
                          <div class="posts__cat">
                            <span class="label posts__cat-label">1º Divisão</span>
                          </div>
                          <h6 class="posts__title"><a href="#">Título da notícia a ser inserido</a></h6>
                          <time datetime="2016-08-23" class="posts__date">26 de janeiro de 2017</time>
                        </div>
                        <div class="posts__excerpt posts__excerpt--space-sm">
                          Texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto.
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div> */ ?>
            </div>
            <!-- Notícias Curtas / End -->

            <!-- Sessão de Classificacao -->
            <!--<?php require "cms/models/campeonatos.php"; ?>

            <?php $camp = new campeonatos(); ?>

            <div class="col-md-12">

              <?php $campeonato_id = (isset($_GET["camp"]) && $_GET["camp"] != "") ? $_GET["camp"] : 111; ?>

              <?php $temporada = (isset($_GET["temporada"]) && $_GET["temporada"] != "") ? $_GET["temporada"] : 2023; ?>

              <?php $grupo = (isset($_GET["grupo"])  && $_GET["grupo"] != "") ? $_GET["grupo"] : "A"; ?>




              <?php $rodada = (isset($_GET["rodada"])  && $_GET["rodada"] != "") ? $_GET["rodada"] : 1; ?>

              <?php $clube = (isset($_GET["clube"])   && $_GET["clube"] != "") ? $_GET["clube"] : false; ?>








              <header class="card__header card__header--has-filter" style="background: #f5f7f9">

                <h4>Classificação - Campeonato Amador 1ª Divisão</h4>



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




                      <li class="category-filter__item"><a href="?camp=<?php echo $campeonato["campeonato_id"]; ?>&temporada=<?php echo $temporada; ?>&grupo=<?php echo $campeonato["grupo"]; ?>" class="category-filter__link <?php if ($campeonato["grupo"] == $grupo) {
                                                                                                                                                                                                                                  echo "category-filter__link--active";
                                                                                                                                                                                                                                } ?>" data-category="posts__item--category-1">Grupo <?php echo $campeonato["grupo"]; ?></a></li>



                    <?php } ?>

                  <?php } ?>







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

                                    <img src="http://www.ligataubate.com.br/cms/assets/images/escudos/<?php echo $classificacao["escudo"]; ?>" />

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


                      </tbody>

                    </table>

                  </div>

                </div>

              </div>



            </div> -->

            <!-- Final da Sessão de Classificacao -->

            <!-- Propaganda Banner -->
            <div class="widget__title card__header card__header--has-btn" style="background-color:#ECECEC; margin-bottom: 2em;">
              <h4>Parceiros <?php echo date('Y') ?></h4>
            </div>
            <div class="card" style="margin-bottom: 20px; text-align: center;">
              <!-- <img src="assets/images/parceiros/2020/Dr José Renan Medeiros.jpg" style="margin-right: 1em;" width="200" alt="Dr José Renan Medeiros"> -->
              <!-- <img src="assets/images/parceiros/2020/Leonardo-Zuin.png" style="margin-right: 1em; width: 120px;" width="200" alt="Leonardo Zuin"> -->
              <!-- <img src="assets/images/parceiros/2022/MariaJoao.jpeg" style="margin-right: 1em;" width="200" alt="Maria João">
              <img src="assets/images/parceiros/2022/logo-travelex.png" style="margin-right: 1em;" width="150" alt="Confidence">
              <img src="assets/images/parceiros/2022/Congelatto.jpeg" style="margin-right: 1em;" width="150" alt="Congelatto"> -->
              <!-- <img src="assets/images/parceiros/2023/jo-engenharia.jpeg" style="margin-right: 1em;" width="150" alt="Jo Engenharia"> -->
              <!-- <img src="assets/images/parceiros/2023/jbonfa.jpeg" style="margin-right: 1em;" width="150" alt="jbonfa"> -->
              <img src="assets/images/parceiros/2023/vertex.jpeg" style="margin-right: 1em;" width="150" alt="vertex">
              <!-- <img src="assets/images/parceiros/2023/rocco.jpeg" style="margin-right: 1em;" width="150" alt="rocco"> -->
              <img src="assets/images/parceiros/2023/portal-do-jogado.jpeg" style="margin-right: 1em;" width="150" alt="Portal do Jogadô">
              <img src="assets/images/patrocinio/logo-limpar-diarista.png" style="margin-right: 1em;" width="150" alt="Limpar Diarista">





            </div>
            <!-- Propaganda Banner / End -->
          </div>
          <!-- Content / End -->

          <!-- Sidebar -->
          <div id="sidebar" class="sidebar col-md-4">

            <!--<ul class="nav nav-tabs nav-justified widget-tabbed__nav" role="tablist">
                    <li role="presentation" class="active"><a href="#widget-tabbed-newest" aria-controls="widget-tabbed-newest" role="tab" data-toggle="tab" aria-expanded="true">TAUBATEANO A1</a></li>
                    <li role="presentation" class=""><a href="#widget-tabbed-commented" aria-controls="widget-tabbed-commented" role="tab" data-toggle="tab" aria-expanded="false">TAUBATEANO A2</a></li>
                    <li role="presentation" class=""><a href="#widget-tabbed-popular" aria-controls="widget-tabbed-popular" role="tab" data-toggle="tab" aria-expanded="false">TAUBATEANO A3</a></li>
         </ul>-->

            <!-- Widget: Classificação 
            <aside class="widget card widget--sidebar widget-standings" style="border-top: 4px solid #B30205; border-bottom: 0px solid #B1B1B1">
              <div class="widget__title card__header card__header--has-btn" style="background-color:#ECECEC">
                <h4>Primeira Divisão 2017</h4>
                <a href="#" class="btn btn-default btn-outline btn-xs card-header__button">Classificação</a>
               <img src="assets/images/label/Thumb-tag-home.png" alt="Classificação">
              </div>
              <div class="widget__content card__content">
                <div class="table-responsive">
                  <table class="table table-hover table-standings">
                    <thead>
                      <tr>
                        <th>Classificação</th>
                        <th>PTS</th>
                        <th>V</th>
                        <th>E</th>
                        <th>D</th>
                      </tr>
                    </thead>
                    
                    <tbody>
                      <tr>
                        <td>
                          <div class="team-meta">
                            <figure class="team-meta__logo">
                              <img src="assets/images/clubes/thumb/vila-sao-geraldo.jpg" alt="" width="30">
                            </figure>
                            <div class="team-meta__info">
                              <h6 class="team-meta__name">A.E. Vila São Geraldo</h6>
                            </div>
                          </div>
                        </td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                      </tr>
                      
                      <tr>
                        <td>
                          <div class="team-meta">
                            <figure class="team-meta__logo">
                              <img src="assets/images/clubes/thumb/sem-foto.jpg" alt="" width="30">
                            </figure>
                            <div class="team-meta__info">
                              <h6 class="team-meta__name">Atlético Nacional F.C</h6>
                            </div>
                          </div>
                        </td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                      </tr>
                      
                      <tr>
                        <td>
                          <div class="team-meta">
                            <figure class="team-meta__logo">
                              <img src="assets/images/clubes/thumb/brasileirinho.jpg" alt="" width="30">
                            </figure>
                            <div class="team-meta__info">
                              <h6 class="team-meta__name">Brasileirinho F.C</h6>
                            </div>
                          </div>
                        </td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                      </tr>
                      
                      <tr>
                        <td>
                          <div class="team-meta">
                            <figure class="team-meta__logo">
                              <img src="assets/images/clubes/thumb/atletico-tremembe.jpg" alt="" width="30">
                            </figure>
                            <div class="team-meta__info">
                              <h6 class="team-meta__name">C.A. Tremembé</h6>

                            </div>
                          </div>
                        </td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                      </tr>
                      
                      <tr>
                        <td>
                          <div class="team-meta">
                            <figure class="team-meta__logo">
                              <img src="assets/images/clubes/thumb/Juventus.jpg" alt="" width="30">
                            </figure>
                            <div class="team-meta__info">
                              <h6 class="team-meta__name">C.A. Juventus</h6>
                            </div>
                          </div>
                        </td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                      </tr>
                      
                      <tr>
                        <td>
                          <div class="team-meta">
                            <figure class="team-meta__logo">
                              <img src="assets/images/clubes/thumb/uniao.jpg" alt="" width="30">
                            </figure>
                            <div class="team-meta__info">
                              <h6 class="team-meta__name">E.C. União Operária</h6>
                            </div>
                          </div>
                        </td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                      </tr>
                      
                      <tr>
                        <td>
                          <div class="team-meta">
                            <figure class="team-meta__logo">
                              <img src="assets/images/clubes/thumb/vila-sao-jose.jpg" alt="" width="30">
                            </figure>
                            <div class="team-meta__info">
                              <h6 class="team-meta__name">E.C. Vila São José</h6>
                            </div>
                          </div>
                        </td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                      </tr>
                      
                      <tr>
                        <td>
                          <div class="team-meta">
                            <figure class="team-meta__logo">
                              <img src="assets/images/clubes/thumb/xv-de-novembro.jpg" alt="" width="30">
                            </figure>
                            <div class="team-meta__info">
                              <h6 class="team-meta__name">E.C. XV de Novembro</h6>
                            </div>
                          </div>
                        </td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                      </tr>
                     
                      <tr>
                        <td>
                          <div class="team-meta">
                            <figure class="team-meta__logo">
                              <img src="assets/images/clubes/thumb/nova-america.jpg" alt="" width="30">
                            </figure>
                            <div class="team-meta__info">
                              <h6 class="team-meta__name">G.E. Nova América</h6>
                            </div>
                          </div>
                        </td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                      </tr>
                      
                      <tr>
                        <td>
                          <div class="team-meta">
                            <figure class="team-meta__logo">
                              <img src="assets/images/clubes/thumb/independencia.jpg" alt="" width="30">
                            </figure>
                            <div class="team-meta__info">
                              <h6 class="team-meta__name">S.E. Independência</h6>
                            </div>
                          </div>
                        </td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                      </tr>

                    </tbody>
                    
                    <thead>
                      <tr>
                        <td colspan="6">PTS = Pontos | V = Vitória | E = Empate | D = Derrota</td>
                      </tr>
                    </thead>

                  </table>
                </div>
              </div>
            </aside>
            <!-- Widget: Classificação / End -->

            <!-- Widget: Banner Promocional -->
            <?php /*
            <aside class="widget card widget--sidebar widget-player widget-player--soccer">
        <a href="http://conceitoconsorcio.com.br/" target="_blank"><img src="assets/images/parceiros/conceito.png" title="Conceito Consórcio"></a>

            </aside>            <!-- Widget: Banner Promocional / End -->
            */ ?>


            <!-- Widget: Informativos -->
            <aside class="widget widget--sidebar card widget-tabbed borderInformativos">
              <div class="horario-container only-desktop" style="background: transparent">
                <p class="horario-title"><b>Horário de funcionamento</b></p>
                <p class="horario-text">
                  <b>Secretaria:</b> Terça-feira e quinta-feira: 18h30 às 20h00<br />
                  <b>Presidência:</b> Terça-feira e quinta-feira: 18h30 às 19h30<br />
                  <!-- <b>Estamos de férias</b> retornamos no dia 14 de janeiro de 2025. <br /> -->
                </p>

                <!-- <p class="horario-text"><b>Obrigatório o uso de máscara</b></p> -->
                <!-- <p class="horario-text"><b>Atendimento presencial suspenso, qualquer dúvida, enviar e-mail no comunicacao@ligataubate.com.br</b></p> -->
              </div>
              <div class="horario-container only-desktop" style="background: transparent">
                <p class="horario-title"><b>Endereço</b></p>
                <p class="horario-text">Parque Dr. Barbosa de Oliveira, 34 - Rodoviária Velha</p>
                <p class="horario-text">Sobre Loja - Sala 02</p>
              </div>

              <div class="widget__title card__header card__header--has-btn" style="background-color:#ECECEC; margin: 1rem 0rem;">
                <h6 style="margin: 0rem 0rem 0rem 0rem;"><a href="/bid">Boletim Informativo Diário (BID Liga)</a></h6>
              </div>

              <div class="widget__title card__header card__header--has-btn" style="background-color:#ECECEC">
                <h4>Informativo LMFT</h4>
              </div>

              <ul class="nav nav-tabs nav-justified nav-product-tabs" role="tablist">
                <li class="nav-item active"><a class="nav-link" href="#tab-informativos-corrente" role="tab" data-toggle="tab" aria-selected="false" style="font-size: 0.7em;"><b><?php echo traduzMes((string)date('m')); ?></b></a></li>
                <li class="nav-item"><a class="nav-link" href="#tab-informativos-1" role="tab" data-toggle="tab" aria-selected="false" style="font-size: 0.7em;"><?php echo traduzMesAnterior("-1"); ?></a></li>
                <li class="nav-item"><a class="nav-link" href="#tab-informativos-2" role="tab" data-toggle="tab" aria-selected="false" style="font-size: 0.7em;"><?php echo traduzMesAnterior("-2"); ?></a></li>
                <li class="nav-item"><a class="nav-link" href="#tab-informativos-3" role="tab" data-toggle="tab" aria-selected="false" style="font-size: 0.7em;"><?php echo traduzMesAnterior("-3"); ?></a></li>
                <!-- <li class="nav-item"><a class="nav-link" href="#tab-informativos-4" role="tab" data-toggle="tab" aria-selected="false" style="font-size: 0.7em;"><?php echo traduzMesAnterior("-4"); ?></a></li>
                <li class="nav-item"><a class="nav-link" href="#tab-informativos-5" role="tab" data-toggle="tab" aria-selected="false" style="font-size: 0.7em;"><?php echo traduzMesAnterior("-5"); ?></a></li>
                <li class="nav-item"><a class="nav-link" href="#tab-informativos-6" role="tab" data-toggle="tab" aria-selected="false" style="font-size: 0.7em;"><?php echo traduzMesAnterior("-6"); ?></a></li> -->
                <li class="nav-item"><a class="nav-link" href="#tab-informativos-antigos" role="tab" data-toggle="tab" aria-selected="false" style="font-size: 0.7em;">Mais antigos</a></li>
              </ul>

              <div class="widget__content card__content">
                <div class="widget-tabbed__tabs">
                  <!-- Widget Tab panes -->
                  <div class="tab-content widget-tabbed__tab-content">
                    <!-- Mês corrente -->
                    <div role="tabpanel" class="tab-pane fade in active" id="tab-informativos-corrente">
                      <ul class="posts posts--simple-list">
                        <?php require "cms/models/informativos.php"; ?>
                        <?php $inf = new informativos(); ?>
                        <?php foreach ($inf->getByMes("corrente") as $informativo) { ?>
                          <li class="posts__item posts__item--category-1">
                            <div class="posts__inner">
                              <div class="posts__cat">
                                <span class="label posts__cat-label"><?php echo $informativo["categoria_titulo"]; ?></span> &nbsp; <time datetime="" class="posts__date" style="color: #BBBBBB; font-weight: 500; padding-bottom: 10px; margin-top: -3px;"><?php echo dataAbreviada($informativo["date_add"]); ?></time>
                              </div>
                              <a href="informativo.php?url=<?php echo $informativo["url"]; ?>">
                                <h6 class="posts__title"> <?php echo $informativo["titulo"]; ?> </h6>
                              </a>
                            </div>
                          </li>
                        <?php } ?>
                        <li class="posts__item posts__item--category-1">Não há mais informativos para mostrar por enquanto.</li>
                      </ul>
                    </div>

                    <!-- Último mês -->
                    <div role="tabpanel" class="tab-pane fade in" id="tab-informativos-1">
                      <ul class="posts posts--simple-list">
                        <?php $inf = new informativos(); ?>
                        <?php foreach ($inf->getByMes("-1") as $informativo) { ?>
                          <li class="posts__item posts__item--category-1">
                            <div class="posts__inner">
                              <div class="posts__cat">
                                <span class="label posts__cat-label"><?php echo $informativo["categoria_titulo"]; ?></span> &nbsp; <time datetime="" class="posts__date" style="color: #BBBBBB; font-weight: 500; padding-bottom: 10px; margin-top: -3px;"><?php echo dataAbreviada($informativo["date_add"]); ?></time>
                              </div>
                              <a href="informativo.php?url=<?php echo $informativo["url"]; ?>">
                                <h6 class="posts__title"> <?php echo $informativo["titulo"]; ?> </h6>
                              </a>
                            </div>
                          </li>
                        <?php } ?>
                        <li class="posts__item posts__item--category-1">Não há mais informativos para mostrar por enquanto.</li>
                      </ul>
                    </div>

                    <!-- Penúltimo mês -->
                    <div role="tabpanel" class="tab-pane fade in" id="tab-informativos-2">
                      <ul class="posts posts--simple-list">
                        <?php $inf = new informativos(); ?>
                        <?php foreach ($inf->getByMes("-2") as $informativo) { ?>
                          <li class="posts__item posts__item--category-1">
                            <div class="posts__inner">
                              <div class="posts__cat">
                                <span class="label posts__cat-label"><?php echo $informativo["categoria_titulo"]; ?></span> &nbsp; <time datetime="" class="posts__date" style="color: #BBBBBB; font-weight: 500; padding-bottom: 10px; margin-top: -3px;"><?php echo dataAbreviada($informativo["date_add"]); ?></time>
                              </div>
                              <a href="informativo.php?url=<?php echo $informativo["url"]; ?>">
                                <h6 class="posts__title"> <?php echo $informativo["titulo"]; ?> </h6>
                              </a>
                            </div>
                          </li>
                        <?php } ?>
                        <li class="posts__item posts__item--category-1">Não há mais informativos para mostrar por enquanto.</li>
                      </ul>
                    </div>

                    <!-- Antepenúltimo mês -->
                    <div role="tabpanel" class="tab-pane fade in" id="tab-informativos-3">
                      <ul class="posts posts--simple-list">
                        <?php $inf = new informativos(); ?>
                        <?php foreach ($inf->getByMes("-3") as $informativo) { ?>
                          <li class="posts__item posts__item--category-1">
                            <div class="posts__inner">
                              <div class="posts__cat">
                                <span class="label posts__cat-label"><?php echo $informativo["categoria_titulo"]; ?></span> &nbsp; <time datetime="" class="posts__date" style="color: #BBBBBB; font-weight: 500; padding-bottom: 10px; margin-top: -3px;"><?php echo dataAbreviada($informativo["date_add"]); ?></time>
                              </div>
                              <a href="informativo.php?url=<?php echo $informativo["url"]; ?>">
                                <h6 class="posts__title"> <?php echo $informativo["titulo"]; ?> </h6>
                              </a>
                            </div>
                          </li>
                        <?php } ?>
                        <li class="posts__item posts__item--category-1">Não há mais informativos para mostrar por enquanto.</li>
                      </ul>
                    </div>

                    <!-- Antigos mês -->
                    <div role="tabpanel" class="tab-pane fade in" id="tab-informativos-antigos">
                      <ul class="posts posts--simple-list">
                        <?php $inf = new informativos(); ?>
                        <?php foreach ($inf->getByMes("antigos") as $informativo) { ?>
                          <li class="posts__item posts__item--category-1">
                            <div class="posts__inner">
                              <div class="posts__cat">
                                <span class="label posts__cat-label"><?php echo $informativo["categoria_titulo"]; ?></span> &nbsp; <time datetime="" class="posts__date" style="color: #BBBBBB; font-weight: 500; padding-bottom: 10px; margin-top: -3px;"><?php echo dataAbreviada($informativo["date_add"]); ?></time>
                              </div>
                              <a href="informativo.php?url=<?php echo $informativo["url"]; ?>">
                                <h6 class="posts__title"> <?php echo $informativo["titulo"]; ?> </h6>
                              </a>
                            </div>
                          </li>
                        <?php } ?>
                        <li class="posts__item posts__item--category-1">Não há mais informativos para mostrar por enquanto.</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div style="text-align: center; margin-top: 2em; display:flex; flex-direction: column; align-items: center; justify-content: center; gap: 8px;">
                <div class="widget__title card__header card__header--has-btn" style="background-color:#ECECEC">
                  <h4>PATROCÍNIOS EXCLUSIVOS <?php echo date('Y'); ?></h4>
                </div>
                <img src="assets/images/parceiros/2025/marca_tau_nova_vertical_cor.png" style="margin-right: 1em;" width="250" title="PMT">
                <!-- <img src="assets/images/patrocinio/logo-betnacional.png" style="margin-right: 1em;" width="100" title="Bet Nacional">
                <img src="assets/images/patrocinio/logo-engenharia.png" style="margin-right: 1em;" width="100" title="Pereira e Moura"> -->
              </div>
              <div style="text-align: center; margin-top: 2em;">
                <div class="widget__title card__header card__header--has-btn" style="background-color:#ECECEC">
                  <h4>LIGA FILIADA A FPF</h4>
                </div>
                <img src="assets/images/logo-fpf.png" style="margin-right: 1em; margin-top: 1rem;" alt="Federação Paulista de Futebol" width="150" title="Federação Paulista de Futebol">
              </div>
              <!-- <div class="horario-container only-phone">
                <p class="horario-title"><b>Horário de funcionamento</b></p>
                <p class="horario-text"><u>Secretaria</u>: Terças, quartas e quintas feiras das 09h as 13h</p>
                <p class="horario-text"><u>Secretaria</u>: Terças e quintas feiras das 18h30 às 20h</p>
                <p class="horario-text"><u>Presidência</u>: Terças e quintas feiras das 18h30 às 19h30</p>
                <p class="horario-text"><b>Obrigatório o uso de máscara</b></p>
              </div>
              <div class="horario-container only-phone">
                <p class="horario-title"><b>Endereço</b></p>
                <p class="horario-text">Parque Dr. Barbosa de Oliveira, 34 - Rodoviária Velha</p>
                <p class="horario-text">Sobre Loja - Sala 02</p>
              </div> -->
            </aside>
            <!-- Widget: Informativos / End -->


            <!-- Widget: Próxima Partida 
    <aside class="widget card widget--sidebar widget-results">
            <div class="widget__title card__header card__header--has-btn">
            <h4>Jogos - Resultados</h4>
            <a href="#" class="btn btn-default btn-outline btn-xs card-header__button">Tabela</a>
            </div>
            <div class="widget__content card__content">
            <ul class="widget-results__list">

              <li class="widget-results__item">
              <h5 class="widget-results__title">Domingo, 26 de janeiro</h5>
              <div class="widget-results__content">
                <div class="widget-results__team widget-results__team--first">
                <figure class="widget-results__team-logo">
                  <img src="assets/images/soccer/logos/alchemists_s_shield.png" alt="">
                </figure>
                <div class="widget-results__team-details">
                  <h5 class="widget-results__team-name">Time 1</h5>
                </div>
                </div>
                <div class="widget-results__result">
                <div class="widget-results__score">
                  <span class="widget-results__score-winner">2</span> - <span class="widget-results__score-loser">0</span>
                  <div class="widget-results__status">Esplanada</div>
                </div>
                </div>
                <div class="widget-results__team widget-results__team--second">
                <figure class="widget-results__team-logo">
                  <img src="assets/images/soccer/logos/alchemists_s_shield.png" alt="">
                </figure>
                <div class="widget-results__team-details">
                  <h5 class="widget-results__team-name">Time 2</h5>
                </div>
                </div>
              </div>
              </li>

              
              <li class="widget-results__item">
              <div class="widget-results__content">
                <div class="widget-results__team widget-results__team--first">
                <figure class="widget-results__team-logo">
                  <img src="assets/images/soccer/logos/alchemists_s_shield.png" alt="">
                </figure>
                <div class="widget-results__team-details">
                  <h5 class="widget-results__team-name">Time 1</h5>
                </div>
                </div>
                <div class="widget-results__result">
                <div class="widget-results__score">
                  <span class="widget-results__score-winner">2</span> - <span class="widget-results__score-loser">0</span>
                  <div class="widget-results__status">Esplanada</div>
                </div>
                </div>
                <div class="widget-results__team widget-results__team--second">
                <figure class="widget-results__team-logo">
                  <img src="assets/images/soccer/logos/alchemists_s_shield.png" alt="">
                </figure>
                <div class="widget-results__team-details">
                  <h5 class="widget-results__team-name">Time 2</h5>
                </div>
                </div>
              </div>
              </li>

              
              
              <li class="widget-results__item">
              <div class="widget-results__content">
                <div class="widget-results__team widget-results__team--first">
                <figure class="widget-results__team-logo">
                  <img src="assets/images/soccer/logos/alchemists_s_shield.png" alt="">
                </figure>
                <div class="widget-results__team-details">
                  <h5 class="widget-results__team-name">Time 1</h5>
                </div>
                </div>
                <div class="widget-results__result">
                <div class="widget-results__score">
                  <span class="widget-results__score-winner">2</span> - <span class="widget-results__score-loser">0</span>
                  <div class="widget-results__status">Esplanada</div>
                </div>
                </div>
                <div class="widget-results__team widget-results__team--second">
                <figure class="widget-results__team-logo">
                  <img src="assets/images/soccer/logos/alchemists_s_shield.png" alt="">
                </figure>
                <div class="widget-results__team-details">
                  <h5 class="widget-results__team-name">Time 2</h5>
                </div>
                </div>
              </div>
              </li>

              
              
              <li class="widget-results__item">
              <div class="widget-results__content">
                <div class="widget-results__team widget-results__team--first">
                <figure class="widget-results__team-logo">
                  <img src="assets/images/soccer/logos/alchemists_s_shield.png" alt="">
                </figure>
                <div class="widget-results__team-details">
                  <h5 class="widget-results__team-name">Time 1</h5>
                </div>
                </div>
                <div class="widget-results__result">
                <div class="widget-results__score">
                  <span class="widget-results__score-winner">2</span> - <span class="widget-results__score-loser">0</span>
                  <div class="widget-results__status">Esplanada</div>
                </div>
                </div>
                <div class="widget-results__team widget-results__team--second">
                <figure class="widget-results__team-logo">
                  <img src="assets/images/soccer/logos/alchemists_s_shield.png" alt="">
                </figure>
                <div class="widget-results__team-details">
                  <h5 class="widget-results__team-name">Time 2</h5>
                </div>
                </div>
              </div>
              </li>

              
              
              <li class="widget-results__item">
              <div class="widget-results__content">
                <div class="widget-results__team widget-results__team--first">
                <figure class="widget-results__team-logo">
                  <img src="assets/images/soccer/logos/alchemists_s_shield.png" alt="">
                </figure>
                <div class="widget-results__team-details">
                  <h5 class="widget-results__team-name">Time 1</h5>
                </div>
                </div>
                <div class="widget-results__result">
                <div class="widget-results__score">
                  <span class="widget-results__score-winner">2</span> - <span class="widget-results__score-loser">0</span>
                  <div class="widget-results__status">Esplanada</div>
                </div>
                </div>
                <div class="widget-results__team widget-results__team--second">
                <figure class="widget-results__team-logo">
                  <img src="assets/images/soccer/logos/alchemists_s_shield.png" alt="">
                </figure>
                <div class="widget-results__team-details">
                  <h5 class="widget-results__team-name">Time 2</h5>
                </div>
                </div>
              </div>
              </li>
  
              
              
              <li class="widget-results__item">
              <div class="widget-results__content">
                <div class="widget-results__team widget-results__team--first">
                <figure class="widget-results__team-logo">
                  <img src="assets/images/soccer/logos/alchemists_s_shield.png" alt="">
                </figure>
                <div class="widget-results__team-details">
                  <h5 class="widget-results__team-name">Time 1</h5>
                </div>
                </div>
                <div class="widget-results__result">
                <div class="widget-results__score">
                  <span class="widget-results__score-winner">2</span> - <span class="widget-results__score-loser">0</span>
                  <div class="widget-results__status">Esplanada</div>
                </div>
                </div>
                <div class="widget-results__team widget-results__team--second">
                <figure class="widget-results__team-logo">
                  <img src="assets/images/soccer/logos/alchemists_s_shield.png" alt="">
                </figure>
                <div class="widget-results__team-details">
                  <h5 class="widget-results__team-name">Time 2</h5>
                </div>
                </div>
              </div>
              </li>

              
              
              <li class="widget-results__item">
              <div class="widget-results__content">
                <div class="widget-results__team widget-results__team--first">
                <figure class="widget-results__team-logo">
                  <img src="assets/images/soccer/logos/alchemists_s_shield.png" alt="">
                </figure>
                <div class="widget-results__team-details">
                  <h5 class="widget-results__team-name">Time 1</h5>
                </div>
                </div>
                <div class="widget-results__result">
                <div class="widget-results__score">
                  <span class="widget-results__score-winner">2</span> - <span class="widget-results__score-loser">0</span>
                  <div class="widget-results__status">Esplanada</div>
                </div>
                </div>
                <div class="widget-results__team widget-results__team--second">
                <figure class="widget-results__team-logo">
                  <img src="assets/images/soccer/logos/alchemists_s_shield.png" alt="">
                </figure>
                <div class="widget-results__team-details">
                  <h5 class="widget-results__team-name">Time 2</h5>
                </div>
                </div>
              </div>
              </li>

            </ul>
            </div>
          </aside>
            <!-- Widget: Próxima Partida / End -->
            <?php /*
            <aside class="widget card widget--sidebar widget-player widget-player--soccer">
        <a href="#"><img src="assets/images/parceiros/banner2.png" title="Anália & Silva"></a>

            </aside>
            */ ?>
            <!-- Widget: Banner Promocional -->
            <!-- <aside class="widget card widget--sidebar widget-player widget-player--soccer">
        <a href="http://www.diprimauniformes.com" target="_blank"><img src="assets/images/parceiros/banner1.png" title="Diprima Uniformes"></a>

            </aside> -->
            <?php /*
            <aside class="widget card widget--sidebar widget-player widget-player--soccer">
        <img src="assets/images/parceiros/dentista.jpg" title="Consultório Odontológico">

            </aside>
            */ ?>

            <!-- Widget: Banner Promocional / End -->


          </div>
          <!-- Sidebar / End -->
        </div>

      </div>
    </div>

    <!-- Content / End -->

    <!-- Footer
    ================================================== -->
    <?php include "footer.php"; ?>
    <!-- Footer / End -->



  </div>

  <!-- Javascript Files
  ================================================== -->
  <!-- Core JS -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/js/core-min.js"></script>

  <!-- Vendor JS -->
  <script src="assets/vendor/twitter/jquery.twitter.js"></script>

  <!-- Template JS -->
  <script src="assets/js/init.js"></script>
  <!--<script src="assets/js/custom.js"></script>-->

</body>

</html>


<?php

function traduzMes($mes)
{
  switch ($mes) {
    case "01":
      return 'Janeiro/' . date('Y');
      break;
    case "02":
      return 'Fevereiro/' . date('Y');
      break;
    case "03":
      return 'Março/' . date('Y');
      break;
    case "04":
      return 'Abril/' . date('Y');
      break;
    case "05":
      return 'Maio/' . date('Y');
      break;
    case "06":
      return 'Junho/' . date('Y');
      break;
    case "07":
      return 'Julho/' . date('Y');
      break;
    case "08":
      return 'Agosto/' . date('Y');
      break;
    case "09":
      return 'Setembro/' . date('Y');
      break;
    case "10":
      return 'Outubro/' . date('Y');
      break;
    case "11":
      return 'Novembro/' . date('Y');
      break;
    case "12":
      return 'Dezembro/' . date('Y');
      break;
    default:
      return "Mês";
      break;
  }
}

function traduzMesAnterior($mes)
{
  if ($mes == "-1") {
    if (date('m') == "01") {
      return 'Dezembro/' . (date('Y') - 1);
    } else {
      return traduzMes(date('m') - 1);
    }
  } else if ($mes == "-2") {
    if (date('m') == "01") {
      return 'Novembro/' . (date('Y') - 1);
    } else if (date('m') == "02") {
      return 'Dezembro/' . (date('Y') - 1);
    } else {
      return traduzMes(date('m') - 2);
    }
  } else if ($mes == "-3") {
    if (date('m') == "01") {
      return 'Outubro/' . (date('Y') - 1);
    } else if (date('m') == "02") {
      return 'Novembro/' . (date('Y') - 1);
    } else if (date('m') == "03") {
      return 'Dezembro/' . (date('Y') - 1);
    } else {
      return traduzMes(date('m') - 3);
    }
  } else if ($mes == "-4") {
    if (date('m') == "01") {
      return 'Setembro/' . (date('Y') - 1);
    } else if (date('m') == "02") {
      return 'Outubro/' . (date('Y') - 1);
    } else if (date('m') == "03") {
      return 'Novembro/' . (date('Y') - 1);
    } else if (date('m') == "04") {
      return 'Dezembro/' . (date('Y') - 1);
    } else {
      return traduzMes(date('m') - 4);
    }
  } else if ($mes == "-5") {
    if (date('m') == "01") {
      return 'Agosto/' . (date('Y') - 1);
    } else if (date('m') == "02") {
      return 'Setembro/' . (date('Y') - 1);
    } else if (date('m') == "03") {
      return 'Outubro/' . (date('Y') - 1);
    } else if (date('m') == "04") {
      return 'Novembro/' . (date('Y') - 1);
    } else if (date('m') == "05") {
      return 'Dezembro/' . (date('Y') - 1);
    } else {
      return traduzMes(date('m') - 5);
    }
  } else if ($mes == "-6") {
    if (date('m') == "01") {
      return 'Julho/' . (date('Y') - 1);
    } else if (date('m') == "02") {
      return 'Agosto/' . (date('Y') - 1);
    } else if (date('m') == "03") {
      return 'Setembro/' . (date('Y') - 1);
    } else if (date('m') == "04") {
      return 'Outubro/' . (date('Y') - 1);
    } else if (date('m') == "05") {
      return 'Novembro/' . (date('Y') - 1);
    } else if (date('m') == "06") {
      return 'Dezembro/' . (date('Y') - 1);
    } else {
      return traduzMes(date('m') - 6);
    }
  }
}


?>