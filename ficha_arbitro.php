<!DOCTYPE html>
<html lang="pt-br">

<head>

  <!-- Basic Page Needs
  ================================================== -->
  <title>Cadastro de Árbitro</title>
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
    <?php include "cms/models/arbitragem.php"; ?>
    <?php include "cms/models/atletas.php"; ?>
    <?php $arbitragem = new arbitragem(); ?>
    <?php
      if(isset($_POST['nome'])) {
        $arbitragem->addViaPublicForm($_POST);
        unset($_POST);
        
        ?>
          <script>
            alert("Cadastro feito com sucesso");
            window.location.href = "index.php"
          </script>
        <?php
      }
    ?>
    <!-- Page Heading
    ================================================== -->
    <div class="page-heading">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <h1 style="margin-bottom: 0rem;">Cadastro de árbitro</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- Content
    ================================================== -->
    <div class="site-content">
      <div class="container">

        <form method="POST" action="ficha_arbitro.php">
            <div class="row" style="margin-bottom: 1rem;">
                <div class="col-sm-3" style="margin-bottom: 1rem;">
                    <label>Nome completo</label>
                    <input class="form-control" name="nome" id="nome" required />
                </div>
                <div class="col-sm-3" style="margin-bottom: 1rem;">
                    <label>Data de nascimento</label>
                    <input class="form-control" name="nascimento" id="nascimento" type="date" required />
                </div>
                <div class="col-sm-3" style="margin-bottom: 1rem;">
                    <label>RG</label>
                    <input class="form-control" name="rg" id="rg" type="tel" required />
                </div>
                <div class="col-sm-3" style="margin-bottom: 1rem;">
                    <label>CPF</label>
                    <input class="form-control" name="cpf" id="cpf" type="tel" required />
                </div>
                <div class="col-sm-3" style="margin-bottom: 1rem;">
                    <label>Escolaridade</label>
                    <select class="form-control" name="escolaridade" id="escolaridade" required>
                        <option value="Fundamental incompleto">Fundamental incompleto</option>
                        <option value="Fundamental completo">Fundamental completo</option>
                        <option value="Médio incompleto">Médio incompleto</option>
                        <option value="Médio completo">Médio completo</option>
                        <option value="Superior incompleto">Superior incompleto</option>
                        <option value="Superior completo">Superior completo</option>
                    </select>
                </div>
                <div class="col-sm-3" style="margin-bottom: 1rem;">
                    <label>Nome do pai</label>
                    <input class="form-control" name="nome_pai" id="nome_pai" required />
                </div>
                <div class="col-sm-3" style="margin-bottom: 1rem;">
                    <label>Nome da mãe</label>
                    <input class="form-control" name="nome_mae" id="nome_mae" required />
                </div>
                <div class="col-sm-3" style="margin-bottom: 1rem;">
                    <label>Endereço</label>
                    <input class="form-control" name="endereco" id="endereco" required />
                </div>
                <div class="col-sm-3" style="margin-bottom: 1rem;">
                    <label>Número</label>
                    <input class="form-control" name="numero" id="numero" required />
                </div>
                <div class="col-sm-3" style="margin-bottom: 1rem;">
                    <label>Bairro</label>
                    <input class="form-control" name="bairro" id="bairro" required/>
                </div>
                <div class="col-sm-3" style="margin-bottom: 1rem;">
                    <label>Cidade</label>
                    <input class="form-control" name="cidade" id="cidade" required />
                </div>
                <div class="col-sm-3" style="margin-bottom: 1rem;">
                    <label>Estado</label>
                    <input class="form-control" name="estado" id="estado" required />
                </div>
                <div class="col-sm-3" style="margin-bottom: 1rem;">
                    <label>CEP</label>
                    <input class="form-control" name="cep" id="cep" type="tel" required />
                </div>
                <div class="col-sm-3" style="margin-bottom: 1rem;">
                    <label>E-mail</label>
                    <input class="form-control" name="email" id="email" type="email" required />
                </div>
                <div class="col-sm-3" style="margin-bottom: 1rem;">
                    <label>Celular</label>
                    <input class="form-control" name="telefone" id="telefone" type="tel" required />
                </div>
                <div class="col-sm-3" style="margin-bottom: 1rem;">
                    <label>WhatsApp</label>
                    <input class="form-control" name="whatsapp" id="whatsapp" type="tel" required />
                </div>
                <div class="col-sm-3" style="margin-bottom: 1rem;">
                    <label>Função</label>
                    <select class="form-control" name="funcao" id="funcao" required>
                        <option value="Árbitro e Assistente">Árbitro e Assistente</option>
                        <option value="Árbitro">Árbitro</option>
                        <option value="Assistente">Assistente</option>
                        <option value="Representante">Representante</option>
                    </select>
                </div>
            </div>
            <div class="row" style="margin-bottom: 2rem;">
                <div class="col-sm-2">
                    <input type="submit" class="btn btn-primary" value="Enviar" />
                </div>
            </div>
        </form>
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
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js" integrity="sha512-6Jym48dWwVjfmvB0Hu3/4jn4TODd6uvkxdi9GNbBHwZ4nGcRxJUCaTkL3pVY6XUQABqFo3T58EMXFQztbjvAFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Vendor JS -->
  <script src="assets/vendor/twitter/jquery.twitter.js"></script>

  <!-- Template JS -->
  <script src="assets/js/init.js"></script>
  <script src="assets/js/custom.js"></script>

</body>

</html>