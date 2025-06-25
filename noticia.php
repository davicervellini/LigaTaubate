<?php include "funcoes.php";?>
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
  
  
  <!-- LIGHTBOX -->
  <link rel="stylesheet" href="assets/lightbox/dist/css/lightbox.min.css">


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
    <div class="site-overlay"></div>


    <!-- Header
    ================================================== -->

<?php include "menu.php";?>
<?php require "cms/core/model.php";?>
<?php require "cms/models/noticias.php";?>
<?php $not = new noticias();?>
<?php $noticia = $not->getByUrl($_GET["url"]);?>
<?php if(!$noticia){?>
<script> window.location = 'https://www.ligataubate.com.br/'; </script>
<?php } ?>

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

        <div class="row">
          <!-- Content -->
          <div class="content col-md-8">

            <!-- Article -->
            <article class="card card--lg post post--single">
              
              <figure class="post__thumbnail">
                <?php if($noticia["foto_principal"]==""){?>
                <img src="https://ligataubate.com.br/assets/images/soccer/logo.png" alt="<?php echo $noticia["titulo"];?>">
                <?php } else{ ?>
                <img src="https://www.ligataubate.com.br/cms/assets/images/noticias/<?php echo $noticia["foto_principal"];?>" alt="<?php echo $noticia["titulo"];?>">
                <?php } ?>
                
              </figure>


              <?php /*

              <!-- Post Meta - Side -->
              <div class="post__meta-block post__meta-block--side">

                <!-- Social Sharing -->
                <ul class="social-links social-links--btn">
                  <li class="social-links__item">
                    <a href="#" class="social-links__link social-links__link--fb"><i class="fa fa-facebook"></i></a>
                  </li>
                  <li class="social-links__item">
                    <a href="#" class="social-links__link social-links__link--twitter"><i class="fa fa-twitter"></i></a>
                  </li>
                  <li class="social-links__item">
                    <a href="#" class="social-links__link social-links__link--gplus"><i class="fa fa-google-plus"></i></a>
                  </li>
                </ul>
                <!-- Social Sharing / End -->

              </div>
              <!-- Post Meta - Side / End -->

              */ ?>

              <div class="card__content">

                <div class="post__category">
                  <span class="label posts__cat-label"><?php echo $noticia["categoria_titulo"];?></span>
                </div>
                <header class="post__header">
                  <h2 class="post__title"><?php echo $noticia["titulo"];?></h2>
                  <ul class="post__meta meta">
                    <li class="meta__item meta__item--date"><time datetime="2017-08-23"><?php echo dataAbreviada($noticia["date_add"]);?></time></li>
                    <!-- <li class="meta__item meta__item--views hidden-md hidden-lg">2369</li>
                    <li class="meta__item meta__item--likes hidden-md hidden-lg"><a href="#"><i class="meta-like icon-heart"></i> 530</a></li>
                    <li class="meta__item meta__item--comments hidden-md hidden-lg"><a href="#">18</a></li> -->
                  </ul>
                </header>

                <div class="post__content">
                  <?php echo $noticia["corpo"];?>

                </div>

                <?php if(!empty($noticia["video_youtube"])){?>

                <h3> Vídeo </h3>

                <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $noticia['video_youtube'];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                <?php } ?>

                <?php require "cms/models/fotos.php";?>
                <?php $fot = new fotos();?>
                <?php $fotos = $fot->getByRefId('noticia', $noticia["noticia_id"]);?>


                <?php if(!empty($fotos)){?>
                <h3> Galeria </h3>

                <?php foreach($fotos as $foto){?>

 
                   <a class="example-image-link" href="https://www.ligataubate.com.br/cms/assets/images/galerias/<?php echo $foto['foto'];?>" data-lightbox="galeria" data-title="">
                   <img class="example-image" src="https://www.ligataubate.com.br/cms/assets/images/galerias/<?php echo $foto['foto'];?>" width="150" />
                   </a>

                <?php } ?>
                <?php } ?>


              </div>
            </article>
            <!-- Article / End -->

            <!-- Related Posts -->
            <div class="post-related">
              <div class="card">
                <div class="card__header">
                  <h4>Notícias Relacionadas</h4>
                </div>
              </div>


              <div class="row posts--cards">
            
              <?php $noticias_relacionadas = $not->getByCategoriaId($noticia["categoria_id"],$noticia["noticia_id"],2);?>
              <?php if(empty($noticias_relacionadas)){ echo "Não existem notícias relacionadas ainda!";} ?>
              <?php foreach($noticias_relacionadas as $not_relacionada){?>
                
                <div class="col-md-6">
                  <!-- Prev Post -->
                  <div class="posts__item posts__item--card posts__item--category-2 card">
                    <figure class="posts__thumb">
                      <div class="posts__cat">
                        <span class="label posts__cat-label"> <?php echo $not_relacionada["categoria_titulo"];?> </span>
                      </div>
                      <a href="noticia.php?url=<?php echo $not_relacionada["url"];?>">

                        <?php if($not_relacionada["foto_principal"]==""){?>
                        <img src="https://www.ligataubate.com.br/assets/images/media.png" alt="<?php echo $not_relacionada["titulo"];?>">
                        <?php } else { ?>
                        <img src="https://www.ligataubate.com.br/cms/assets/images/noticias/<?php echo $not_relacionada["foto_principal"];?>" alt="">
                        <?php } ?>

                      </a>
                    </figure>
                    <div class="posts__inner card__content">
                      <time datetime="2016-08-23" class="posts__date"><?php echo dataAbreviada($noticia["date_add"]);?></time>
                      <h6 class="posts__title"><a href="noticia.php?url=<?php echo $not_relacionada["url"];?>"><?php echo $not_relacionada["titulo"];?></a></h6>
                    </div>
                    <?php /*
                    <footer class="posts__footer card__footer">
                      <div class="post-author">
                        <figure class="post-author__avatar">
                          <img src="" alt="Post Author Avatar">
                        </figure>
                        
                        <div class="post-author__info">
                          <h4 class="post-author__name">Jessica Hoops</h4>
                        </div>
                         
                      </div>
                      
                      <ul class="post__meta meta">
                        <li class="meta__item meta__item--views">2369</li>
                        <li class="meta__item meta__item--likes"><a href="#"><i class="meta-like icon-heart"></i> 530</a></li>
                        <li class="meta__item meta__item--comments"><a href="#">18</a></li>
                      </ul>
                      
                    </footer>
                     */ ?>
                  </div>
                  <!-- Prev Post / End -->
                </div>

                <?php } ?>

                <?php /*
                <div class="col-md-6">
                  <!-- Next Post -->
                  <div class="posts__item posts__item--card posts__item--category-1 card">
                    <figure class="posts__thumb">
                      <div class="posts__cat">
                        <span class="label posts__cat-label">The Team</span>
                      </div>
                      <a href="#"><img src="assets/images/samples/post-img2.jpg" alt=""></a>
                    </figure>
                    <div class="posts__inner card__content">
                      <a href="#" class="posts__cta"></a>
                      <time datetime="2016-08-23" class="posts__date">August 23rd, 2016</time>
                      <h6 class="posts__title"><a href="#">Cheerleader tryouts will start next Friday at 5PM</a></h6>
                    </div>
                    <footer class="posts__footer card__footer">
                      <div class="post-author">
                        <figure class="post-author__avatar">
                          <img src="assets/images/samples/avatar-2.jpg" alt="Post Author Avatar">
                        </figure>
                        <div class="post-author__info">
                          <h4 class="post-author__name">Jessica Hoops</h4>
                        </div>
                      </div>
                      <ul class="post__meta meta">
                        <li class="meta__item meta__item--views">2369</li>
                        <li class="meta__item meta__item--likes"><a href="#"><i class="meta-like icon-heart"></i> 530</a></li>
                        <li class="meta__item meta__item--comments"><a href="#">18</a></li>
                      </ul>
                    </footer>
                  </div>
                  <!-- Next Post / End -->
                </div>
                */ ?>

              </div>
            </div>
            <!-- Related Posts / End -->
                       

          </div>
          <!-- Content / End -->

          <!-- Sidebar -->
          <div id="sidebar" class="sidebar col-md-4">

           
           <!-- <aside class="widget card widget--sidebar widget-player widget-player--soccer" style="margin-top: -10px;">
        <a href="#"><img src="assets/images/parceiros/banner2.png" title="Anália &amp; Silva"></a>
            </aside>   -->
            
                            
            <!-- Widget: Popular News -->
            <aside class="widget widget--sidebar card widget-popular-posts">
              <div class="widget__title card__header">
                <h4>Últimas notícias</h4>
              </div>
              <div class="widget__content card__content">
                <ul class="posts posts--simple-list">
                 
                  <?php foreach($not->get(NULL, 6) as $noticia) { ?>

                  <li class="posts__item posts__item--category-2">
                    <figure class="posts__thumb">
                      <a href="noticia.php?url=<?php echo $noticia["url"];?>"> 

                        <?php if($noticia["foto_principal"]==""){?>
                        <img width="100" src="https://ligataubate.com.br/assets/images/soccer/logo.png" alt="<?php echo $not_relacionada["titulo"];?>">
                        <?php } else { ?>
                        <img width="100" src="https://www.ligataubate.com.br/cms/assets/images/noticias/<?php echo $noticia["foto_principal"];?>" alt="">
                        <?php } ?>
                      </a>
                    </figure>
                    <div class="posts__inner">
                      <div class="posts__cat">
                        <span class="label posts__cat-label"><?php echo $noticia["categoria_titulo"];?></span>
                      </div>
                      <h6 class="posts__title"><a href="noticia.php?url=<?php echo $noticia["url"];?>"><?php echo $noticia["titulo"];?></a></h6>
                      <time datetime="<?php echo $noticia["date_add"];?>" class="posts__date"><?php echo dataAbreviada($noticia["date_add"]);?></time>
                    </div>
                  </li>

                  <?php } ?>

                  

                </ul>
              </div>
            </aside>
            <!-- Widget: Popular News / End -->
            
            <?php /*


            <!-- Widget: Tag Cloud -->
            <aside class="widget widget--sidebar card widget-tagcloud">
              <div class="widget__title card__header">
                <h4>Tag Cloud</h4>
              </div>
              <div class="widget__content card__content">
                <div class="tagcloud">
                  <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">PLAYOFFS</a>
                  <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">ALCHEMISTS</a>
                  <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">INJURIES</a>
                  <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">TEAM</a>
                  <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">INCORPORATIONS</a>
                  <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">UNIFORMS</a>
                  <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">CHAMPIONS</a>
                  <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">PROFESSIONAL</a>
                  <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">COACH</a>
                  <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">STADIUM</a>
                  <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">NEWS</a>
                  <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">PLAYERS</a>
                  <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">WOMEN DIVISION</a>
                  <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">AWARDS</a>
                </div>
              </div>
            </aside>
            <!-- Widget: Tag Cloud / End -->
            

            <!-- Widget: Banner -->
            <aside class="widget card widget--sidebar widget-banner">
              <div class="widget__title card__header">
                <h4>Advertisement</h4>
              </div>
              <div class="widget__content card__content">
                <figure class="widget-banner__img">
                  <a href="https://themeforest.net/item/the-alchemists-sports-news-html-template/19106722?ref=dan_fisher"><img src="assets/images/samples/banner.jpg" alt="Banner"></a>
                </figure>
              </div>
            </aside>
            <!-- Widget: Banner / End -->
            

            <!-- Widget: Trending News -->
            <aside class="widget widget--sidebar card widget-tabbed">
              <div class="widget__title card__header">
                <h4>Top Trending News</h4>
              </div>
              <div class="widget__content card__content">
                <div class="widget-tabbed__tabs">
                  <!-- Widget Tabs -->
                  <ul class="nav nav-tabs nav-justified widget-tabbed__nav" role="tablist">
                    <li role="presentation" class="active"><a href="#widget-tabbed-newest" aria-controls="widget-tabbed-newest" role="tab" data-toggle="tab">Newest</a></li>
                    <li role="presentation"><a href="#widget-tabbed-commented" aria-controls="widget-tabbed-commented" role="tab" data-toggle="tab">Most Commented</a></li>
                    <li role="presentation"><a href="#widget-tabbed-popular" aria-controls="widget-tabbed-popular" role="tab" data-toggle="tab">Popular</a></li>
                  </ul>
            
                  <!-- Widget Tab panes -->
                  <div class="tab-content widget-tabbed__tab-content">
                    <!-- Newest -->
                    <div role="tabpanel" class="tab-pane fade in active" id="widget-tabbed-newest">
                      <ul class="posts posts--simple-list">
                        <li class="posts__item posts__item--category-1">
                          <div class="posts__inner">
                            <div class="posts__cat">
                              <span class="label posts__cat-label">The Team</span>
                            </div>
                            <h6 class="posts__title"><a href="#">Jake Dribbler Announced that he is retiring next mnonth</a></h6>
                            <time datetime="2016-08-23" class="posts__date">August 23rd, 2016</time>
                            <div class="posts__excerpt">
                              Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </div>
                          </div>
                        </li>
                        <li class="posts__item posts__item--category-1">
                          <div class="posts__inner">
                            <div class="posts__cat">
                              <span class="label posts__cat-label">The Team</span>
                            </div>
                            <h6 class="posts__title"><a href="#">The Alchemists news coach is bringin a new shooting guard</a></h6>
                            <time datetime="2016-08-23" class="posts__date">August 23rd, 2016</time>
                            <div class="posts__excerpt">
                              Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </div>
                          </div>
                        </li>
                        <li class="posts__item posts__item--category-1">
                          <div class="posts__inner">
                            <div class="posts__cat">
                              <span class="label posts__cat-label">The Team</span>
                            </div>
                            <h6 class="posts__title"><a href="#">This Saturday starts the intensive training for the Final</a></h6>
                            <time datetime="2016-08-23" class="posts__date">August 23rd, 2016</time>
                            <div class="posts__excerpt">
                              Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </div>
                          </div>
                        </li>
                        <li class="posts__item posts__item--category-3">
                          <div class="posts__inner">
                            <div class="posts__cat">
                              <span class="label posts__cat-label">Playoffs</span>
                            </div>
                            <h6 class="posts__title"><a href="#">New York Islanders are now flying to California for the big game</a></h6>
                            <time datetime="2016-08-23" class="posts__date">August 23rd, 2016</time>
                            <div class="posts__excerpt">
                              Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </div>
                          </div>
                        </li>
                        <li class="posts__item posts__item--category-1">
                          <div class="posts__inner">
                            <div class="posts__cat">
                              <span class="label posts__cat-label">The Team</span>
                            </div>
                            <h6 class="posts__title"><a href="#">The Female Division is growing strong after their third game</a></h6>
                            <time datetime="2016-08-23" class="posts__date">August 23rd, 2016</time>
                            <div class="posts__excerpt">
                              Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                    <!-- Commented -->
                    <div role="tabpanel" class="tab-pane fade" id="widget-tabbed-commented">
                      <ul class="posts posts--simple-list">
                        <li class="posts__item posts__item--category-3">
                          <div class="posts__inner">
                            <div class="posts__cat">
                              <span class="label posts__cat-label">Playoffs</span>
                            </div>
                            <h6 class="posts__title"><a href="#">New York Islanders are now flying to California for the big game</a></h6>
                            <time datetime="2016-08-23" class="posts__date">August 23rd, 2016</time>
                            <div class="posts__excerpt">
                              Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </div>
                          </div>
                        </li>
                        <li class="posts__item posts__item--category-1">
                          <div class="posts__inner">
                            <div class="posts__cat">
                              <span class="label posts__cat-label">The Team</span>
                            </div>
                            <h6 class="posts__title"><a href="#">The Female Division is growing strong after their third game</a></h6>
                            <time datetime="2016-08-23" class="posts__date">August 23rd, 2016</time>
                            <div class="posts__excerpt">
                              Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </div>
                          </div>
                        </li>
                        <li class="posts__item posts__item--category-1">
                          <div class="posts__inner">
                            <div class="posts__cat">
                              <span class="label posts__cat-label">The Team</span>
                            </div>
                            <h6 class="posts__title"><a href="#">The Alchemists news coach is bringin a new shooting guard</a></h6>
                            <time datetime="2016-08-23" class="posts__date">August 23rd, 2016</time>
                            <div class="posts__excerpt">
                              Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </div>
                          </div>
                        </li>
                        <li class="posts__item posts__item--category-1">
                          <div class="posts__inner">
                            <div class="posts__cat">
                              <span class="label posts__cat-label">The Team</span>
                            </div>
                            <h6 class="posts__title"><a href="#">This Saturday starts the intensive training for the Final</a></h6>
                            <time datetime="2016-08-23" class="posts__date">August 23rd, 2016</time>
                            <div class="posts__excerpt">
                              Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </div>
                          </div>
                        </li>
                        <li class="posts__item posts__item--category-1">
                          <div class="posts__inner">
                            <div class="posts__cat">
                              <span class="label posts__cat-label">The Team</span>
                            </div>
                            <h6 class="posts__title"><a href="#">Jake Dribbler Announced that he is retiring next mnonth</a></h6>
                            <time datetime="2016-08-23" class="posts__date">August 23rd, 2016</time>
                            <div class="posts__excerpt">
                              Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                    <!-- Popular -->
                    <div role="tabpanel" class="tab-pane fade" id="widget-tabbed-popular">
                      <ul class="posts posts--simple-list">
                        <li class="posts__item posts__item--category-1">
                          <div class="posts__inner">
                            <div class="posts__cat">
                              <span class="label posts__cat-label">The Team</span>
                            </div>
                            <h6 class="posts__title"><a href="#">The Alchemists news coach is bringin a new shooting guard</a></h6>
                            <time datetime="2016-08-23" class="posts__date">August 23rd, 2016</time>
                            <div class="posts__excerpt">
                              Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </div>
                          </div>
                        </li>
                        <li class="posts__item posts__item--category-1">
                          <div class="posts__inner">
                            <div class="posts__cat">
                              <span class="label posts__cat-label">The Team</span>
                            </div>
                            <h6 class="posts__title"><a href="#">This Saturday starts the intensive training for the Final</a></h6>
                            <time datetime="2016-08-23" class="posts__date">August 23rd, 2016</time>
                            <div class="posts__excerpt">
                              Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </div>
                          </div>
                        </li>
                        <li class="posts__item posts__item--category-1">
                          <div class="posts__inner">
                            <div class="posts__cat">
                              <span class="label posts__cat-label">The Team</span>
                            </div>
                            <h6 class="posts__title"><a href="#">Jake Dribbler Announced that he is retiring next mnonth</a></h6>
                            <time datetime="2016-08-23" class="posts__date">August 23rd, 2016</time>
                            <div class="posts__excerpt">
                              Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </div>
                          </div>
                        </li>
                        <li class="posts__item posts__item--category-1">
                          <div class="posts__inner">
                            <div class="posts__cat">
                              <span class="label posts__cat-label">The Team</span>
                            </div>
                            <h6 class="posts__title"><a href="#">The Female Division is growing strong after their third game</a></h6>
                            <time datetime="2016-08-23" class="posts__date">August 23rd, 2016</time>
                            <div class="posts__excerpt">
                              Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </div>
                          </div>
                        </li>
                        <li class="posts__item posts__item--category-3">
                          <div class="posts__inner">
                            <div class="posts__cat">
                              <span class="label posts__cat-label">Playoffs</span>
                            </div>
                            <h6 class="posts__title"><a href="#">New York Islanders are now flying to California for the big game</a></h6>
                            <time datetime="2016-08-23" class="posts__date">August 23rd, 2016</time>
                            <div class="posts__excerpt">
                              Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
            
                </div>
              </div>
            </aside>
            <!-- Widget: Trending News / End -->

            */ ?>
            
            
            
          </div>
          <!-- Sidebar / End -->
        </div>

      </div>
    </div>    
        
   <!-- Content / End -->

    <!-- Footer
    ================================================== -->
    
<?php include "footer.php";?>
    
    <!-- Footer / End -->


  </div>

  <!-- Javascript Files
  ================================================== -->
  <!-- Core JS -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <!--<script src="assets/js/core-min.js"></script>-->
  
  <!-- LIGHTBOX -->
  <script src="assets/lightbox/dist/js/lightbox-plus-jquery.min.js"></script>
  
  <!-- Vendor JS -->
  <script src="assets/vendor/twitter/jquery.twitter.js"></script>

  <!-- Template JS -->
  <script src="assets/js/init.js"></script>
  <script src="assets/js/custom.js"></script>

  </body>
  </html>
