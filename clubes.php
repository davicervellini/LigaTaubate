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
    .clube-escudo {
      margin: 1em;
      border: 2px solid #ffcf00;
      padding: 5px;
      width: 70%;
    }

    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
      margin-bottom: 2rem;
    }

    td,
    th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
  </style>
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
            <img src="assets/images/label/clubes.png" alt="">
          </div>
        </div>

        <div class="row">
          <div class="col-md-3 col-md-offset-9">
            <h5><a href="campeoes.php">Ver todos os Campeões</a></h5>
          </div>
        </div>
      </div>
    </div>
    <!-- Content
    ================================================== -->
    <div class="site-content">
      <div class="container">
        <!-- Single Product Tabbed Content -->
        <div class="product-tabs row">
          <!-- Nav tabs -->
          <div class="col-md-3">
            <div class="card">
              <div class="card__content">
                <nav class="df-account-navigation">
                  <ul>
                    <li role="presentation" class="df-account-navigation__link df-account-navigation__link">
                      <a href="#tab-filiados-ativos" role="tab" data-toggle="tab"><i class="icon-options-vertical" aria-hidden="true" style="color:#c01818"></i> FILIADOS ATIVOS</a>
                    </li>
                    <li role="presentation" class="df-account-navigation__link df-account-navigation__link">
                      <a href="#tab-sub9" role="tab" data-toggle="tab"><i class="icon-options-vertical" aria-hidden="true" style="color:#c01818"></i> SUB 9</a>
                    </li>
                    <li role="presentation" class="df-account-navigation__link df-account-navigation__link">
                      <a href="#tab-sub11" role="tab" data-toggle="tab"><i class="icon-options-vertical" aria-hidden="true" style="color:#c01818"></i> SUB 11</a>
                    </li>
                    <li role="presentation" class="df-account-navigation__link df-account-navigation__link">
                      <a href="#tab-sub13" role="tab" data-toggle="tab"><i class="icon-options-vertical" aria-hidden="true" style="color:#c01818"></i> SUB 13</a>
                    </li>
                    <li role="presentation" class="df-account-navigation__link df-account-navigation__link">
                      <a href="#tab-sub15" role="tab" data-toggle="tab"><i class="icon-options-vertical" aria-hidden="true" style="color:#c01818"></i> SUB 15</a>
                    </li>
                    <li role="presentation" class="df-account-navigation__link df-account-navigation__link">
                      <a href="#tab-sub17" role="tab" data-toggle="tab"><i class="icon-options-vertical" aria-hidden="true" style="color:#c01818"></i> SUB 17</a>
                    </li>
                    <li role="presentation" class="df-account-navigation__link df-account-navigation__link">
                      <a href="#tab-sub20" role="tab" data-toggle="tab"><i class="icon-options-vertical" aria-hidden="true" style="color:#c01818"></i> SUB 20</a>
                    </li>
                    <li role="presentation" class="active">
                      <a href="#tab-primeira" role="tab" data-toggle="tab"><i class="icon-options-vertical" aria-hidden="true" style="color:#c01818"></i> 1º Divisão</a>
                    </li>
                    <li role="presentation" class="df-account-navigation__link df-account-navigation__link">
                      <a href="#tab-segunda" role="tab" data-toggle="tab"><i class="icon-options-vertical" aria-hidden="true" style="color:#c01818"></i> 2º Divisão</a>
                    </li>
                    <li role="presentation" class="df-account-navigation__link df-account-navigation__link">
                      <a href="#tab-terceira" role="tab" data-toggle="tab"><i class="icon-options-vertical" aria-hidden="true" style="color:#c01818"></i> 3º Divisão</a>
                    </li>
                    <li role="presentation" class="df-account-navigation__link df-account-navigation__link">
                      <a href="#tab-vet40" role="tab" data-toggle="tab"><i class="icon-options-vertical" aria-hidden="true" style="color:#c01818"></i> Veterano 40</a>
                    </li>
                    <li role="presentation" class="df-account-navigation__link df-account-navigation__link">
                      <a href="#tab-vet50" role="tab" data-toggle="tab"><i class="icon-options-vertical" aria-hidden="true" style="color:#c01818"></i> Veterano 50</a>
                    </li>
                    <li role="presentation" class="df-account-navigation__link df-account-navigation__link">
                      <a href="#tab-vet60" role="tab" data-toggle="tab"><i class="icon-options-vertical" aria-hidden="true" style="color:#c01818"></i> Veterano 60</a>
                    </li>
                    <li role="presentation" class="df-account-navigation__link df-account-navigation__link">
                      <a href="#tab-feminino" role="tab" data-toggle="tab"><i class="icon-options-vertical" aria-hidden="true" style="color:#c01818"></i> Feminino</a>
                    </li>
                    <li role="presentation" class="df-account-navigation__link df-account-navigation__link">
                      <a href="#tab-renatobraga" role="tab" data-toggle="tab"><i class="icon-options-vertical" aria-hidden="true" style="color:#c01818"></i> Renato Braga</a>
                    </li>
                    <li role="presentation" class="df-account-navigation__link df-account-navigation__link">
                      <a href="#tab-inativos" role="tab" data-toggle="tab"><i class="icon-options-vertical" aria-hidden="true" style="color:#c01818"></i> Inativos</a>
                    </li>
                    <li role="presentation" class="df-account-navigation__link df-account-navigation__link">
                      <a href="#tab-extintos" role="tab" data-toggle="tab"><i class="icon-options-vertical" aria-hidden="true" style="color:#c01818"></i> Extintos</a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
          <!-- Nav tabs / End -->
          <div class="col-md-9">
            <div class="tab-content">

              <div role="tabpanel" class="tab-pane fade" id="tab-filiados-ativos">
                <div class="card">
                  <div class="card__content">
                    <h3>FILIADOS ATIVOS</h3>

                    <table>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>AA Jardim Jaraguá</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>AA Parque Aeroporto</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>AA Parque São Luiz</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>AA Rodoviário CJ</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>5</td>
                          <td>AA São Gonçalo</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>6</td>
                          <td>AA Vila Albina</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>7</td>
                          <td>AE Cecap</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>8</td>
                          <td>AE Chácara Flórida</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>9</td>
                          <td>AE Vila Nogueira</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>10</td>
                          <td>AE Vila São Geraldo</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>11</td>
                          <td>Atlético Bonfin FC</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>12</td>
                          <td>Baronesa FC</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>13</td>
                          <td>Básico FC</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>14</td>
                          <td>Brooklyn FC</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>15</td>
                          <td>Brother's SC</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>16</td>
                          <td>C Atlético Cecap</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>17</td>
                          <td>CA Boca Junior JÁ</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>18</td>
                          <td>CA Gurilândia</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>19</td>
                          <td>CA Juventus</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>20</td>
                          <td>CA Maria Augusta</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>21</td>
                          <td>CAM 13 de Maio</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>22</td>
                          <td>Centro Esportivo Taubaté</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>23</td>
                          <td>EC Abaeté</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>24</td>
                          <td>EC Água Quente</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>25</td>
                          <td>EC Alto São Pedro</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>26</td>
                          <td>EC Belém</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>27</td>
                          <td>EC Esplanada Santa Terezinha</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>28</td>
                          <td>EC Flamenguinho TN</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>29</td>
                          <td>EC Internacional</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>30</td>
                          <td>EC Ipanema</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>31</td>
                          <td>EC Mourisco</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>32</td>
                          <td>EC Quiririm</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>33</td>
                          <td>EC VII de Março</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>34</td>
                          <td>EC Vila São José</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>35</td>
                          <td>EC XV de Novembro</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>36</td>
                          <td>Estoril City FC</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>37</td>
                          <td>Garça EC</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>38</td>
                          <td>GE Nova América</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>39</td>
                          <td>GRM Sitio Santo Antônio</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>40</td>
                          <td>Guerreiros Água Quente FC</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>41</td>
                          <td>Inter Zurk FC</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>42</td>
                          <td>Marlene Miranda FC</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>43</td>
                          <td>Olympique de Taubaté FC</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>44</td>
                          <td>Rodoviário FC</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>45</td>
                          <td>SE Esplanada</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>46</td>
                          <td>SE Fonte Imaculada</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>47</td>
                          <td>SE Independência</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>48</td>
                          <td>SE Parque Urupês</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>49</td>
                          <td>Sem Noção FC</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>50</td>
                          <td>ST Monaco FC</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>51</td>
                          <td>Texas FC</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>52</td>
                          <td>Três Marias FC</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>53</td>
                          <td>União Operária FC</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>54</td>
                          <td>Unidos da Vila FC</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>55</td>
                          <td>Unidos São Gonçalo FC</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>56</td>
                          <td>Vila Bela EC</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>57</td>
                          <td>Vila N. S. das Graças FC</td>
                          <td>Ativo</td>
                        </tr>
                        <tr>
                          <td>58</td>
                          <td>Volkswagen CT</td>
                          <td>Ativo</td>
                        </tr>
                      </tbody>
                    </table>


                  </div>
                </div>

              </div>

              <div role="tabpanel" class="tab-pane fade" id="tab-sub9">
                <div class="card">
                  <div class="card__content">
                    <h3>SUB 9</h3>
                    <div class="card card--clean">
                      <div class="card__content">
                        <ul class="products products--grid products--grid-condensed products--grid-light">
                          <!-- <li class="product__item card">
                                <div class="product__img">
                                  <div class="product__img-holder">
                                    <a href="#"><img class="clube-escudo" src="assets/images/clubes/3-divisao/AA Rodoviário Cidade Jardim.jpg" alt="AA Rodoviário Cidade Jardim" title="AA Rodoviário Cidade Jardim"></a>
                                  </div>
                                </div>
                                <div class="product__content card__content">
                                  <header class="product__header">
                                    <div class="product__header-inner">
                                      <a href="#"><h2 class="product__title">AA Rodoviário Cidade Jardim</h2></a>
                                    </div>
                                  </header>
                                </div>
                            </li> -->
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>

              </div>



              <div role="tabpanel" class="tab-pane fade" id="tab-sub11">

                <div class="card">

                  <div class="card__content">

                    <h3>SUB 11</h3>



                    <div class="card card--clean">

                      <div class="card__content">

                        <ul class="products products--grid products--grid-condensed products--grid-light">

                          <li class="product__item card">

                            <!-- <div class="product__img">

                                  <div class="product__img-holder">

                                    <a href="#"><img class="clube-escudo" src="assets/images/clubes/3-divisao/AA Rodoviário Cidade Jardim.jpg" alt="AA Rodoviário Cidade Jardim" title="AA Rodoviário Cidade Jardim"></a>

                                  </div>

                                </div>



                                <div class="product__content card__content">

                                  <header class="product__header">

                                    <div class="product__header-inner">

                                      <a href="#"><h2 class="product__title">AA Rodoviário Cidade Jardim</h2></a>

                                    </div>

                                  </header>

                                </div> -->

                          </li>

                        </ul>

                      </div>

                    </div>

                  </div>

                </div>

              </div>



              <div role="tabpanel" class="tab-pane fade" id="tab-sub13">

                <div class="card">

                  <div class="card__content">

                    <h3>SUB 13</h3>



                    <div class="card card--clean">

                      <div class="card__content">

                        <ul class="products products--grid products--grid-condensed products--grid-light">

                          <li class="product__item card">

                            <!-- <div class="product__img">

                                  <div class="product__img-holder">

                                    <a href="#"><img class="clube-escudo" src="assets/images/clubes/3-divisao/AA Rodoviário Cidade Jardim.jpg" alt="AA Rodoviário Cidade Jardim" title="AA Rodoviário Cidade Jardim"></a>

                                  </div>

                                </div>



                                <div class="product__content card__content">

                                  <header class="product__header">

                                    <div class="product__header-inner">

                                      <a href="#"><h2 class="product__title">AA Rodoviário Cidade Jardim</h2></a>

                                    </div>

                                  </header>

                                </div> -->

                          </li>

                        </ul>

                      </div>

                    </div>

                  </div>

                </div>

              </div>



              <div role="tabpanel" class="tab-pane fade" id="tab-sub15">

                <div class="card">

                  <div class="card__content">

                    <h3>SUB 15</h3>



                    <div class="card card--clean">

                      <div class="card__content">

                        <ul class="products products--grid products--grid-condensed products--grid-light">

                          <li class="product__item card">

                            <!-- <div class="product__img">

                                  <div class="product__img-holder">

                                    <a href="#"><img class="clube-escudo" src="assets/images/clubes/3-divisao/AA Rodoviário Cidade Jardim.jpg" alt="AA Rodoviário Cidade Jardim" title="AA Rodoviário Cidade Jardim"></a>

                                  </div>

                                </div>



                                <div class="product__content card__content">

                                  <header class="product__header">

                                    <div class="product__header-inner">

                                      <a href="#"><h2 class="product__title">AA Rodoviário Cidade Jardim</h2></a>

                                    </div>

                                  </header>

                                </div> -->

                          </li>

                        </ul>

                      </div>

                    </div>

                  </div>

                </div>

              </div>



              <div role="tabpanel" class="tab-pane fade" id="tab-sub17">
                <div class="card">
                  <div class="card__content">
                    <h3>SUB 17</h3>
                    <div class="card card--clean">
                      <div class="card__content">
                        <ul class="products products--grid products--grid-condensed products--grid-light">

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/sub17/AA Parque Aeroporto.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">AA Parque Aeroporto.jpeg</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/sub17/AA Vila Albina.jpg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">AA Vila Albina</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/sub17/AE Cecap.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">AE Cecap</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/sub17/AE Vila São Geraldo.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">AE Vila São Geraldo</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/sub17/CA Juventus.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">CA Juventus</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/sub17/EC Ipanema.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">EC Ipanema</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/sub17/EC Mourisco.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">EC Mourisco</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/sub17/EC Vila São José.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">EC Vila São José</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/sub17/EC XV de Novembro.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">EC XV de Novembro</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/sub17/EC Água Quente.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">EC Água Quente</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/sub17/Unidos São Gonçalo FC.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">Unidos São Gonçalo FC</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/sub17/União Operária FC.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">União Operária FC.jpeg</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>



              <div role="tabpanel" class="tab-pane fade" id="tab-sub20">
                <div class="card">
                  <div class="card__content">
                    <h3>SUB 20</h3>
                    <div class="card card--clean">
                      <div class="card__content">
                        <ul class="products products--grid products--grid-condensed products--grid-light">

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/sub20/AA São Gonçalo.jpeg" alt=""></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">AA São Gonçalo</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/sub20/AE Cecap.jpeg" alt=""></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">AE Cecap</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/sub20/AE Vila São Geraldo.jpeg" alt=""></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">AE Vila São Geraldo</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/sub20/CA Boca Junior Jardim América.jpeg" alt=""></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">CA Boca Junior Jardim América</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/sub20/CA Juventus.jpeg" alt=""></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">CA Juventus</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/sub20/EC XV de Novembro.jpeg" alt=""></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">EC XV de Novembro</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/sub20/Rodoviário FC.jpeg" alt=""></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">Rodoviário FC</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/sub20/Unidos São Gonçalo FC.jpeg" alt=""></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">Unidos São Gonçalo FC.jpeg</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>



              <div role="tabpanel" class="tab-pane fade active in" id="tab-primeira">
                <div class="card">
                  <div class="card__content">
                    <h3>PRIMEIRA DIVISÃO</h3>
                    <div class="card card--clean">
                      <div class="card__content">
                        <ul class="products products--grid products--grid-condensed products--grid-light">

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <img class="clube-escudo" src="assets/images/clubes/2025/divisao1/AA Parque Aeroporto.jpeg" alt="">
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <h2 class="product__title">AA Parque Aeroporto</h2>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <img class="clube-escudo" src="assets/images/clubes/2025/divisao1/AA Parque São Luiz.jpeg" alt="">
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <h2 class="product__title">AA Parque São Luiz</h2>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <img class="clube-escudo" src="assets/images/clubes/2025/divisao1/AE Vila São Geraldo.jpeg" alt="">
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <h2 class="product__title">AE Vila São Geraldo</h2>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <img class="clube-escudo" src="assets/images/clubes/2025/divisao1/C Atlético Cecap.jpeg" alt="">
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <h2 class="product__title">C Atlético Cecap</h2>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <img class="clube-escudo" src="assets/images/clubes/2025/divisao1/CA Juventus.jpeg" alt="">
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <h2 class="product__title">CA Juventus</h2>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <img class="clube-escudo" src="assets/images/clubes/2025/divisao1/EC Ipanema.jpeg" alt="">
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <h2 class="product__title">EC Ipanema</h2>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <img class="clube-escudo" src="assets/images/clubes/2025/divisao1/EC Mourisco.jpeg" alt="">
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <h2 class="product__title">EC Mourisco</h2>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <img class="clube-escudo" src="assets/images/clubes/2025/divisao1/EC Vila São José.jpeg" alt="">
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <h2 class="product__title">EC Vila São José</h2>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <img class="clube-escudo" src="assets/images/clubes/2025/divisao1/EC XV de Novembro.jpeg" alt="">
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <h2 class="product__title">EC XV de Novembro</h2>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <img class="clube-escudo" src="assets/images/clubes/2025/divisao1/EC Água Quente.jpeg" alt="">
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <h2 class="product__title">EC Água Quente</h2>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <img class="clube-escudo" src="assets/images/clubes/2025/divisao1/Unidos São Gonçalo FC.jpeg" alt="">
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <h2 class="product__title">Unidos São Gonçalo FC</h2>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <img class="clube-escudo" src="assets/images/clubes/2025/divisao1/União Operária FC.jpeg" alt="">
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <h2 class="product__title">União Operária FC</h2>
                                </div>
                              </header>
                            </div>
                          </li>

                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>



              <div role="tabpanel" class="tab-pane fade" id="tab-segunda">
                <div class="card">
                  <div class="card__content">
                    <h3>SEGUNDA DIVISÃO</h3>
                    <div class="card card--clean">
                      <div class="card__content">
                        <ul class="products products--grid products--grid-condensed products--grid-light">
                          <li class="product__item card">

                            <div class="product__img">
                              <div class="product__img-holder">
                                <img class="clube-escudo" src="assets/images/clubes/2025/divisao2/AA Jardim Jaraguá.jpg" alt="AA Parque Aeroporto">
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">AA Jardim Jaraguá</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <img class="clube-escudo" src="assets/images/clubes/2025/divisao2/AA Rodoviário Cidade Jardim.jpeg" alt="AA Rodovirio Cidade Jardim">
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">AA Rodoviário Cidade Jardim</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <img class="clube-escudo" src="assets/images/clubes/2025/divisao2/AA São Gonçalo.jpeg" alt="AA São Gonçalo">
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">AA São Gonçalo</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <img class="clube-escudo" src="assets/images/clubes/2025/divisao2/AE Vila Nogueira.jpeg" alt="AE Vila Nogueira">
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">AE Vila Nogueira</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <img class="clube-escudo" src="assets/images/clubes/2025/divisao2/Atlético Bonfim FC.jpeg" alt="Atlético Bonfim FC">
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">Atlético Bonfim FC</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <img class="clube-escudo" src="assets/images/clubes/2025/divisao2/Brooklyn FC.jpeg" alt="Brooklyn FC">
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">Brooklyn FC</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <img class="clube-escudo" src="assets/images/clubes/2025/divisao2/CA Gurilândia.jpeg" alt="CA Boca Júnior Jardim América">
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">CA Gurilândia</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <img class="clube-escudo" src="assets/images/clubes/2025/divisao2/CAM 13 de Maio.jpeg" alt="CA Gurilândia">
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">CAM 13 de Maio</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <img class="clube-escudo" src="assets/images/clubes/2025/divisao2/EC Belém de Taubaté.jpeg" alt="CA Juventus">
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">EC Belém de Taubaté</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <img class="clube-escudo" src="assets/images/clubes/2025/divisao2/EC Flamenguinho Terra Nova.jpeg" alt="CAM 13 de Maio">
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">EC Flamenguinho Terra Nova</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <img class="clube-escudo" src="assets/images/clubes/2025/divisao2/EC Internacional.png" alt="EC Belém de Taubaté">
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">EC Internacional</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <img class="clube-escudo" src="assets/images/clubes/2025/divisao2/Estoril City FC.jpeg" alt="EC Flamenguinho Terra Nova">
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">Estoril City FC</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <img class="clube-escudo" src="assets/images/clubes/2025/divisao2/GE Nova América.jpeg" alt="Estoril City FC">
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">GE Nova América.jpeg</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <img class="clube-escudo" src="assets/images/clubes/2025/divisao2/Inter Zurk FC.jpeg" alt="GE Nova América">
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">Inter Zurk FC</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <img class="clube-escudo" src="assets/images/clubes/2025/divisao2/Rodoviário FC.jpeg" alt="GRM Sítio Santo Antônio">
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">Rodoviário FC</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <img class="clube-escudo" src="assets/images/clubes/2025/divisao2/SE Fonte Imaculada.jpeg" alt="Inter Zurk FC">
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">SE Fonte Imaculada</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <img class="clube-escudo" src="assets/images/clubes/2025/divisao2/SE Parque Urupês.jpeg" alt="Rodovirio FC">
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">SE Parque Urupês</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <img class="clube-escudo" src="assets/images/clubes/2025/divisao2/Unidos da Vila FC.jpeg" alt="SE Parque Urupês">
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">Unidos da Vila FC</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <img class="clube-escudo" src="assets/images/clubes/2025/divisao2/Unidos Marlene Miranda FC.jpeg" alt="Unidos Marlene Miranda FC">
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">Unidos Marlene Miranda FC</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <img class="clube-escudo" src="assets/images/clubes/2025/divisao2/Vila Nossa Senhora das Graças FC.jpeg" alt="Unidos da Vila FC">
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">Vila Nossa Senhora das Graças FC.jpeg</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>



              <div role="tabpanel" class="tab-pane fade" id="tab-terceira">
                <div class="card">
                  <div class="card__content">
                    <h3>TERCEIRA DIVISÃO</h3>
                    <div class="card card--clean">
                      <div class="card__content">
                        <ul class="products products--grid products--grid-condensed products--grid-light">

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/divisao3/AA Vila Albina.jpg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">AA Vila Albina</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/divisao3/AE Cecap.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">AE Cecap</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/divisao3/AE Chácara Flórida.jpg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">AE Chácara Flórida</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/divisao3/Baronesa FC.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">Baronesa FC</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/divisao3/Brother's SC.jpg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">Brother's SC</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/divisao3/Básico FC.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">Básico FC</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/divisao3/CA Boca Junior Jardim América.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">CA Boca Junior Jardim América</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/divisao3/EC Abaeté.jpg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">EC Abaeté</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/divisao3/EC Alto São Pedro.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">EC Alto São Pedro</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/divisao3/EC Esplanada Santa Terezinha.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">EC Esplanada Santa Terezinha</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/divisao3/EC VII de Março.jpg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">EC VII de Março</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/divisao3/GRM Sitío Santo Antônio.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">GRM Sitío Santo Antônio</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/divisao3/Guerreiros Água Quente FC.jpg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">Guerreiros Água Quente FC</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/divisao3/Olympique Taubaté FC.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">Olympique Taubaté FC</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/divisao3/SE Esplanada.jpg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">SE Esplanada</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/divisao3/SE Independência.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">SE Independência</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/divisao3/Sem Noção FC.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">Sem Noção FC</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/divisao3/Texas FC.jpg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">Texas FC</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/divisao3/Três Marias FC.jpg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">Três Marias FC</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/divisao3/Vila Bela EC.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">Vila Bela EC</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>



              <div role="tabpanel" class="tab-pane fade" id="tab-vet40">
                <div class="card">
                  <div class="card__content">
                    <h3>VETERANO 40</h3>
                    <div class="card card--clean">
                      <div class="card__content">
                        <ul class="products products--grid products--grid-condensed products--grid-light">

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/40/AA Parque Aeroporto.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">
                                      AA Parque Aeroporto
                                    </h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/40/AE Cecap.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">
                                      AE Cecap
                                    </h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/40/CA Juventus.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">
                                      CA Juventus
                                    </h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/40/EC Belém de Taubaté.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">
                                      EC Belém de Taubaté
                                    </h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/40/EC Esplanada Santa Terezinha.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">
                                      EC Esplanada Santa Terezinha
                                    </h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/40/EC Flamenguinho Terra Nova.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">
                                      EC Flamenguinho Terra Nova
                                    </h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/40/EC Mourisco.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">
                                      EC Mourisco
                                    </h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/40/EC Quiririm.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">
                                      EC Quiririm
                                    </h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/40/EC Vila São José.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">
                                      EC Vila São José
                                    </h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/40/União Operária FC.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">
                                      União Operária FC
                                    </h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>



              <div role="tabpanel" class="tab-pane fade" id="tab-vet50">
                <div class="card">
                  <div class="card__content">
                    <h3>VETERANO 50</h3>
                    <div class="card card--clean">
                      <div class="card__content">
                        <ul class="products products--grid products--grid-condensed products--grid-light">

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/veteranos50/AA Jardim Jaraguá.jpg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">AA Jardim Jaraguá</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/veteranos50/CA Maria Augusta.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">CA Maria Augusta</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/veteranos50/CAM de Maio.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">CAM de Maio</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/veteranos50/EC Flamenguinho Terra Nova.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">EC Flamenguinho Terra Nova</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/veteranos50/EC Mourisco.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">EC Mourisco</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/veteranos50/EC Quiririm.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">EC Quiririm</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/veteranos50/EC Vila São José.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">EC Vila São José</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/veteranos50/Garça EC.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">Garça EC</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/veteranos50/GE Nova América.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">GE Nova América</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/veteranos50/União Operária FC.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">União Operária FC</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


              <div role="tabpanel" class="tab-pane fade" id="tab-vet60">
                <div class="card">
                  <div class="card__content">
                    <h3>VETERANO 60</h3>
                    <div class="card card--clean">
                      <div class="card__content">
                        <ul class="products products--grid products--grid-condensed products--grid-light">

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/veteranos60/AA Jardim Jaraguá.jpg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">AA Jardim Jaraguá</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/veteranos60/AE Vila Nogueira.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <e class="product__title">AE Vila Nogueira</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/veteranos60/AE Vila São Geraldo.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <e class="product__title">AE Vila São Geraldo</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/veteranos60/CA Maria Augusta.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <e class="product__title">CA Maria Augusta</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/veteranos60/CAM de Maio.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <e class="product__title">CAM de Maio</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/veteranos60/EC Belém de Taubaté.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <e class="product__title">EC Belém de Taubaté</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/veteranos60/EC Ipanema.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <e class="product__title">EC Ipanema</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/veteranos60/Garça EC.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <e class="product__title">Garça EC</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/veteranos60/GE Nova América.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <e class="product__title">GE Nova América</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/veteranos60/União Operária FC.jpeg"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <e class="product__title">União Operária FC</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>



              <div role="tabpanel" class="tab-pane fade" id="tab-feminino">

                <div class="card">

                  <div class="card__content">

                    <h3>Feminino</h3>



                    <div class="card card--clean">

                      <div class="card__content">

                        <ul class="products products--grid products--grid-condensed products--grid-light">

                          <li class="product__item card">

                            <!-- <div class="product__img">

                                  <div class="product__img-holder">

                                    <a href="#"><img class="clube-escudo" src="assets/images/clubes/3-divisao/AA Rodoviário Cidade Jardim.jpg" alt="AA Rodoviário Cidade Jardim" title="AA Rodoviário Cidade Jardim"></a>

                                  </div>

                                </div>



                                <div class="product__content card__content">

                                  <header class="product__header">

                                    <div class="product__header-inner">

                                      <a href="#"><h2 class="product__title">AA Rodoviário Cidade Jardim</h2></a>

                                    </div>

                                  </header>

                                </div> -->

                          </li>

                        </ul>

                      </div>

                    </div>

                  </div>

                </div>

              </div>



              <div role="tabpanel" class="tab-pane fade" id="tab-renatobraga">
                <div class="card">
                  <div class="card__content">
                    <h3>RENATO BRAGA</h3>
                    <div class="card card--clean">
                      <div class="card__content">
                        <ul class="products products--grid products--grid-condensed products--grid-light">

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/renatobraga/AA Parque São Luiz.jpeg" alt=""></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">AA Parque São Luiz</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/renatobraga/AA Rodoviário Cidade Jardim.jpeg" alt=""></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">AA Rodoviário Cidade Jardim</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/renatobraga/AA São Gonçalo.jpeg" alt=""></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">AA São Gonçalo</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/renatobraga/CA Gurilândia.jpeg" alt=""></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">CA Gurilândia</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/renatobraga/CA Juventus.jpeg" alt=""></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">CA Juventus</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/renatobraga/EC Internacional.jpeg" alt=""></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">EC Internacional</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/renatobraga/EC Mourisco.jpeg" alt=""></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">EC Mourisco</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/renatobraga/EC Água Quente.jpeg" alt=""></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">EC Água Quente</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/renatobraga/SE Parque Urupês.jpeg" alt=""></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">SE Parque Urupês</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/renatobraga/Unidos Marlene Miranda FC.jpeg" alt=""></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">Unidos Marlene Miranda FC</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/2025/renatobraga/Unidos São Gonçalo FC.jpeg" alt=""></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">Unidos São Gonçalo FC</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>

                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>



              <div role="tabpanel" class="tab-pane fade" id="tab-inativos">
                <div class="card">
                  <div class="card__content">
                    <h3>INATIVOS</h3>
                    <div class="card card--clean">
                      <div class="card__content">
                        <ul class="products products--grid products--grid-condensed products--grid-light">
                          <!-- <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/inativos/AA Vila Albina.jpg" alt="AA Vila Albina" title="AA Vila Albina"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">AA Vila Albina</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li> -->
                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/inativos/Atlético Nacional FC.jpg" alt="Atlético Nacional FC" title="Atlético Nacional FC"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">Atlético Nacional FC</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>
                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/inativos/Cata Cata Jaraguá FC.jpg" alt="Cata Cata Jaraguá FC" title="Cata Cata Jaraguá FC"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">Cata Cata Jaraguá FC</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>
                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/inativos/Clube Atlético Tremembé.jpg" alt="Clube Atlético Tremembé" title="Clube Atlético Tremembé"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">Clube Atlético Tremembé</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>
                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/inativos/Comando Parque Sâo Luiz FC.jpg" alt="Comando Parque São Luiz FC" title="Comando Parque São Luiz FC"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">Comando Parque São Luiz FC</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>
                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/inativos/Granja Santa Terezinha FC.jpg" alt="Granja Santa Terezinha FC" title="Granja Santa Terezinha FC"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">Granja Santa Terezinha FC</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>
                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/inativos/Lyon FC.jpg" alt="Lyon FC" title="Lyon FC"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">Lyon FC</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>
                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/inativos/Palestra Brasil FC.jpg" alt="Palestra Brasil FC" title="Palestra Brasil FC"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">Palestra Brasil FC</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>
                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/inativos/Ressaca FC.jpg" alt="Ressaca FC" title="Ressaca FC"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">Ressaca FC</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>
                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/inativos/Universo FC.jpg" alt="Universo FC" title="Universo FC"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">Universo FC</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div role="tabpanel" class="tab-pane fade" id="tab-extintos">
                <div class="card">
                  <div class="card__content">
                    <h3>EXTINTOS</h3>
                    <div class="card card--clean">
                      <div class="card__content">
                        <ul class="products products--grid products--grid-condensed products--grid-light">
                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/extintos/Guerreiros FC.jpg" alt="Guerreiros FC" title="Guerreiros FC"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">Guerreiros FC</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>
                          <li class="product__item card">
                            <div class="product__img">
                              <div class="product__img-holder">
                                <a href="#"><img class="clube-escudo" src="assets/images/clubes/extintos/SE_Abaete.jpeg" alt="S.E. Abaeté" title="S.E. Abaeté"></a>
                              </div>
                            </div>
                            <div class="product__content card__content">
                              <header class="product__header">
                                <div class="product__header-inner">
                                  <a href="#">
                                    <h2 class="product__title">S.E. Abaeté</h2>
                                  </a>
                                </div>
                              </header>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>



          </div> <!-- fim do col-md-9 -->

        </div>

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



  <!--<script src="assets/js/core-min.js"></script>-->







  <!-- Vendor JS -->



  <script src="assets/vendor/twitter/jquery.twitter.js"></script>







  <!-- Template JS -->



  <script src="assets/js/init.js"></script>



  <script src="assets/js/custom.js"></script>







</body>



</html>