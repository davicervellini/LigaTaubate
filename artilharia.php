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
			<img src="assets/images/label/jogos.png" alt="">
          </div>
        </div>
      </div>
    </div>   
    <!-- Content
    ================================================== -->


<?php require "cms/core/model.php";?>
<?php require "cms/models/campeonatos.php";?>
<?php $camp = new campeonatos();?>

<nav class="content-filter">
          <div class="container">
            <a href="#" class="content-filter__toggle"></a>
            <ul class="content-filter__list">

              <?php $campeonato_id = (isset($_GET["camp"]))? $_GET["camp"] : 42;?>
              <?php //$grupo = (isset($_GET["grupo"]))? $_GET["grupo"] : "A";?>
              <?php $clube = (isset($_GET["clube"])   && $_GET["clube"]!="")? $_GET["clube"] : false;?>

              <?php // link ativo content-filter__item--active ?>
              <?php foreach($camp->getAll() as $campeonato){?>


              <li class="content-filter__item <?php if($campeonato["campeonato_id"]==$campeonato_id){echo "content-filter__item--active";}?>"><a href="?camp=<?php echo $campeonato["campeonato_id"];?>" class="content-filter__link"><small><?php echo $campeonato["descricao"];?></small><?php echo $campeonato["nome"];?></a></li>
             

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

        <div class="row">

         
         
          <!-- RODADA / TABELA DE JOGOS-->
          <div class="col-md-9 col-md-push-3">
            
              <header class="card__header card__header--has-filter" style="background: #f5f7f9">
                <h4>Artilharia</h4>
                                
                                
              </header>


    <div class="card card--has-table" style="height:500px;overflow:auto">
          <div class="card__content">
            <div class="table-responsive">
              <table class="table table-hover table-standings table-standings--full table-standings--full-soccer">
                <thead>
                  <tr>
                    
                    <th class="team-standings__played">Jogador</th>
                    <th class="team-standings__points-diff">Gols</th>
                    <th class="team-standings__team">Time</th>
                  </tr>
                </thead>
                <tbody>


                  <?php $ocorrencias = $camp->getOcorrenciasByCampeonatoId($campeonato_id, $clube);?>


                  <?php $posicao = 1;?>

                  <?php if(isset($ocorrencias)){?>

                  <?php foreach($ocorrencias as $ocorrencia){?>

               

                    <?php if($ocorrencia["ref"]=="gol"){?>

                     <?php //var_dump($ocorrencia);?>


                  <?php if(!$clube || ($ocorrencia["clube_id"]==$clube)){?>
                  <tr>
                   <td class="team-standings__pos"><b><?php echo $posicao;?></b></td>
                    
                    
                    <td class="team-standings__played" style="font-weight: 600; font-size: 12px; text-transform: uppercase; text-align: left; color:rgba(49,49,49,0.7)"><?php echo strtoupper ($ocorrencia["atleta"]);?></td>
                    
                    <td class="team-standings__points-diff" style="font-weight: 600; font-size: 12px"><?php echo $ocorrencia["qde"];?></td>
                    
                    <td class="team-standings__team">
                      <div class="team-meta">
                        <figure class="team-meta__logo" style="width: 22px; padding: 2px;">
                           <?php if($ocorrencia["escudo"]!=""){?> 
                          <img src="http://www.ligataubate.com.br/cms/assets/images/escudos/<?php echo $ocorrencia["escudo"];?>" />
                          <?php } else{ ?>
                           <img src="assets/images/samples/logos/pirates_shield.png" alt="">
                          <?php } ?>
                        </figure>
                        <div class="team-meta__info">
                          <h6 class="team-meta__name" style="font-weight: 600; color:rgba(49,49,49,0.7)"><?php echo strtoupper ($ocorrencia["clube"]);?></h6>
                        </div>
                      </div>
                    </td>
                    
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

         
         
          <!-- Sidebar -->
          <div class="sidebar sidebar--shop col-md-3 col-md-pull-9">

            <!-- Widget: CAMPEONATO -->
            <aside class="widget card widget--sidebar widget_categories">
              <div class="widget__content card__content">
              
			     <?php /*

           <div class="form-group">
                        <label class="control-label" for="review-stars">Filtar por Rodada</label>
                        <select name="review-stars" id="review-stars" class="form-control">
                          <option value="5">Rodada 1</option>
                          <option value="4">Rodada 2</option>
                          <option value="3">Rodada 3</option>
                          <option value="2">Rodada 4</option>
                          <option value="1">Rodada 5</option>
                        </select>
          </div> */ ?>
                      
           <div class="form-group">
                        <label class="control-label" for="review-stars">Filtrar por Clube</label>
                        <select name="review-stars" id="review-stars" class="form-control" style="text-transform: uppercase; color:#000000; font-weight: bold;" onchange="window.location='?camp=<?php echo $campeonato_id;?>&clube='+this.value">

                          <option value=""> - </option>

                          <?php foreach($camp->getClubesByCampeonatoId($campeonato_id) as $c){?>
                          <?php //foreach($camp->getClubesByCampeonatoIdAndGrupo($campeonato_id, $grupo) as $c){?>

                          <?php if($clube==$c["clube_id"]){?>

                          <option selected value="<?php echo $c["clube_id"];?>"> <?php echo $c["nickname"];?> </option>

                          <?php } else{?>

                          <option value="<?php echo $c["clube_id"];?>"> <?php echo $c["nickname"];?> </option>

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
                      
                 <ul class="widget__list">
                  <li><a href="jogos?camp=<?php echo $campeonato_id;?>">  JOGOS </a></li>
                  <li><a href="classificacao?camp=<?php echo $campeonato_id;?>">  CLASSIFICAÇÃO </a></li>
                  <li><a href="artilharia?camp=<?php echo $campeonato_id;?>"> <font color='#c01818'> ARTILHARIA </font> </a></li>

                  <!--<li><a href="cartoes-amarelos?camp=<?php echo $campeonato_id;?>">Cartões Amarelos</a></li>

                  <li><a href="cartoes-vermelhos?camp=<?php echo $campeonato_id;?>">Cartões Vermelhos</a></li>-->



                </ul>
              </div>
            </aside>
            <!-- Widget: CAMPEONATO -->

            

          </div>
          <!-- Sidebar / End -->

        </div>

      </div>
    </div>   


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

  <!-- Vendor JS -->
  <script src="assets/vendor/twitter/jquery.twitter.js"></script>

  <!-- Template JS -->
  <script src="assets/js/init.js"></script>
  <script src="assets/js/custom.js"></script>

  </body>
  </html>
