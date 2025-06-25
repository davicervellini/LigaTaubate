<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Liga Municipal de Futebol de Taubaté</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="A Liga Municipal de Futebol de Taubaté é a entidade responsável por dirigir o futebol da cidade de Taubaté, promovendo e realizando competições nas mais diferentes categorias (base, amador e veterano) do esporte.">
  <meta name="author" content="Grupo Vergueiro">
  <meta name="keywords" content="Liga Taubaté Futebol">
  <link rel="shortcut icon" href="assets/images/soccer/favicons/favicon-120.png">
  <link rel="apple-touch-icon" sizes="120x120" href="assets/images/soccer/favicons/favicon-120.png">
  <link rel="apple-touch-icon" sizes="152x152" href="assets/images/soccer/favicons/favicon-152.png">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CSource+Sans+Pro:400,700" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/fonts/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
  <link href="assets/vendor/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
  <link href="assets/vendor/slick/slick.css" rel="stylesheet">
  <link href="assets/css/content.css" rel="stylesheet">
  <link href="assets/css/components.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/custom.css" rel="stylesheet">
</head>
<body class="template-soccer">
  <div class="site-wrapper clearfix">
    <div class="site-overlay"></div>
    <?php include "menu.php";?>  
    <?php require "cms/core/model.php";?>
    <?php require "cms/models/atletas.php";?>
    <?php require "cms/models/clubes.php";?>
    <?php $atletas = new atletas(); ?>
    <?php $clubes = new clubes(); ?>
    
    <div class="site-content">
      <div class="container">
        <div class="page-heading">
          <div class="container">
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <h1>Elenco dos clubes</h1>
              </div>
            </div>
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <label>Selecione o clube</label>
                <select id="clube_id" onchange="reloadPage()">
                  <?php if(!$_GET['id']) { ?>
                    <option value="">Selecione um clube</option>
                  <?php } ?>
                  <?php foreach($clubes->get() as $clube) { ?>
                    <option value="<?= $clube['clube_id'] ?>" <?php if($clube['clube_id'] == $_GET['id']) echo 'selected' ?>><?= $clube['nome'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="row" style="text-align: center; margin-left: 25%;">
            <?php foreach ($atletas->getByClubeIdYear($_GET['id'], "2019") as $atleta) {
              $foto = $atleta['foto'] ? 'cms/assets/images/atletas/'.$atleta['foto'] : 'assets/images/presidentes/sem-foto.png';
            ?>
            <div class="col-md">
                <div class="card card--clean">
                <div class="card__content">
                    <ul class="products products--list">
                        <li class="product__item product__item--color-1 card">
                        <div class="product__img">
                            <div class="product__img-holder">
                            <img src="<?php echo $foto; ?>" width="100" alt="">
                            </div>
                        </div>
                        <div class="product__content card__content">
                            <header class="product__header">
                            <div class="product__header-inner">
                                <div class="product__category" style="font-size: 12px;"><b><?php echo $atleta['nome']; ?></b></div>
                                <div class="product__category"><?php echo $atleta['inscricoes'][0]['campeonato']; ?></div>
                                <div class="product__category"><?php echo $atleta['inscricoes'][0]['temporada']; ?></div>
                            </div>
                            </header>
                        </div>
                        </li>    
                    </ul>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>  
</div> 
</div>
<?php include "footer.php";?>
  </div>
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/twitter/jquery.twitter.js"></script>
  <script src="assets/js/init.js"></script>
  <script src="assets/js/custom.js"></script>
  <script>
    function reloadPage() {
      const clube_id = document.getElementById('clube_id').value

      window.location.href = "?id=" + clube_id
    }
  </script>
  </body>
  </html>
