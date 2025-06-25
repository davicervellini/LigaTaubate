<!-- Header
    ================================================== -->
<!-- Header Mobile -->
<div class="header-mobile clearfix" id="header-mobile">
  <div class="header-mobile__logo">
    <!-- <a href="http://ligataubate.com.br"><img src="assets/images/soccer/LMFT rosa.jpg" alt="Liga Taubaté" style="width:150px" class="header-mobile__logo-img"></a> -->
    <a href="http://ligataubate.com.br"><img src="assets/images/soccer/logo_blue.png" alt="Liga Taubaté" style="width:150px" class="header-mobile__logo-img"></a>
  </div>
  <div class="header-mobile__inner">
    <a id="header-mobile__toggle" class="burger-menu-icon"><span class="burger-menu-icon__line"></span></a>
  </div>
</div>

<div class="header__top-bar clearfix">
  <div class="container">
    <!-- Account Navigation -->
    <ul class="nav-account">
      <li class="nav-account__item">
        <a href="https://www.facebook.com/ligafuteboltaubate" target="_blank"><img src="assets/images/icon-facebook.png" width="20" style="margin-top: -5px;"></a>
        &nbsp;&nbsp;
        <a href="https://www.instagram.com/ligataubate/" target="_blank"><img src="assets/images/icon-instagram.png" width="20" style="margin-top: -5px;"></a>
      </li>
      <!--<li class="nav-account__item" >
            <a href="#" data-toggle="modal" data-target="#modal-login-register-tabs">
            <i class="icon-user"></i> ACESSAR PAINEL</a>
            </li>-->
      <!-- <li class="nav-account__item"><i class="fa fa-phone"></i> (12) 3432-0269</li> -->
      <li class="nav-account__item"><i class="fa fa-envelope" style="color: white;"></i> <a href="faleconosco.php" style="color: white;">FALE CONOSCO</a></li>
    </ul>
    <!-- Account Navigation / End -->
  </div>
</div>
<!-- Header Desktop -->
<header class="header">
  <!-- Header Primary -->
  <div class="header__primary" style="padding-bottom: 50px;">
    <div class="container">
      <div class="header__primary-inner">
        <!-- Header Logo -->
        <div class="header-logo" style="margin-bottom:-48px;">
          <!-- <a href="index"><img src="assets/images/soccer/LMFT rosa.jpg" alt="Liga Taubaté" style="width:150px" class="header-logo__img"></a> -->
          <a href="index"><img src="assets/images/soccer/logo_blue.png" alt="Liga Taubaté" style="width:150px" class="header-logo__img"></a>
        </div>
        <!-- Header Logo / End -->
        <!-- Main Navigation -->
        <nav class="main-nav clearfix" style="margin-top: -20px;">
          <ul class="main-nav__list">
            <li class=""><a href="index">Home</a></li>
            <li class=""><a href="liga">A Liga</a></li>
            <li class=""><a href="clubes">Clubes</a></li>
            <!--<li class=""><a href="#">Campeonatos</a></li>-->
            <li><a href="competicoes?temporada=2025">Competições</a></li>
            <li class=""><a href="arbitragem">Arbitragem</a></li>
            <li class=""><a href="estadios">Estádios</a></li>
            <li class=""><a href="noticias">Notícias</a></li>
            <li class=""><a href="cdd">CDD</a></li>
            <li class=""><a href="historiaJogadores">Histórias</a></li>
            <!-- <li class=""><a href="#">Social</a></li> -->
            <li class=""><a href="acervo">Acervo</a></li>
            <li class=""><a href="lie.php">LIE</a></li>
            <!-- <li class=""><a href="assets/images/CBJD - FPF.pdf" target="_blank">CBJD</a></li> -->
          </ul>
          <!-- <ul class="main-nav__list">
                <li class=""><a href="liga.php?documentos=true&circular=true">Circular</a></li>
                <li class=""><a href="liga.php?documentos=true&portaria=true">Portaria</a></li>
                <li class=""><a href="liga.php?documentos=true&resolucao=true">Resoluções</a></li>
                <li class=""><a href="liga.php?regulamentos=true">Regulamentos</a></li>
                <li class=""><a href="assets/images/CBJD - FPF.pdf" target="_blank">CBJD</a></li>
              </ul> -->
        </nav>
        <!-- Main Navigation / End -->
        <div class="subtitle-liga-new">
          <p style="color:white">A CASA DO FUTEBOL AMADOR TAUBATEANO</p>
        </div>

      </div>
    </div>
  </div>
  <!-- Header Primary / End -->
</header>
<!-- Header / End -->
<div id="pg-black" class="pignose-popup">
  <div class="item_header">
    <span class="txt_title">ESCOLHA O CAMPEONATO</span>
    <a href="#" class="btn_close"><img src="assets/modal_jogos/demo/img/icon_close.gif" alt="Fechar" /></a>
  </div>
  <div class="item_content">
    <div class="form-group">
      <select name="review-stars" id="review-stars" class="form-control">
        <option value="5">1º DIVISÃO</option>
        <option value="4">2º DIVISÃO</option>
        <option value="3">3º DIVISÃO</option>
        <option value="2">40 VETERANOS</option>
        <option value="1">50 VETERANOS</option>
      </select>
    </div>
  </div>
</div>
<!-- Javascript Files
  ================================================== -->
<!-- Core JS -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<!--<script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>-->
<script src="assets/js/core-min.js"></script>
<!-- Vendor JS -->
<script src="assets/vendor/twitter/jquery.twitter.js"></script>
<!-- Template JS -->
<!--<script src="assets/js/init.js"></script>
  <script src="assets/js/custom.js"></script>-->
<link rel="stylesheet" href="assets/modal_jogos/src/css/pignose.popup.css" />
<style>
  .pignose-popup {
    /*font-family: 'Raleway', 'helvetica', 'sans-serif';*/
  }

  .pignose-popup pre {
    margin: 0;
    padding: 0;
    background-color: transparent;
    border: none;
    text-align: center;
  }

  .pignose-popup pre code,
  .pignose-popup pre code span {
    /*font-family: 'Raleway', 'helvetica', 'sans-serif' !important;*/
    font-size: 115%;
  }

  .subtitle-liga-new {
    position: absolute;
    top: 42px;
    left: 0;
    color: #D8BD6B;
    top: 100%;
    transform: translateX(50%);
  }

  .subtitle-liga-new p {
    font-size: 24px;
    font-weight: bold;
    letter-spacing: 5px;
  }

  @media (max-width: 1024px) {
    .subtitle-liga-new {
      top: 94px;
      transform: translateX(30%);
    }

    .main-nav__list {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: center;
    }

  }

  @media(max-width: 991px) {
    .subtitle-liga-new {
      display: none;
    }
  }
</style>
<script type="text/javascript" src="assets/modal_jogos/src/js/pignose.popup.js"></script>
<!--<link rel="stylesheet" type="text/css" href="assets/modal_jogos/src/css/pignose.popup.min.css" />-->
<link rel="stylesheet" type="text/css" href="assets/modal_jogos/src/css/pignose.popup.css" />
<script type="text/javascript">
  $(function() {
    $('.button.pg-black').bind('click', function(event) {
      event.preventDefault();
      $('#pg-black').pignosePopup({
        theme: 'black'
      });
    });
  });
</script>
</body>

</html>