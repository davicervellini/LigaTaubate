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

  <link rel="shortcut icon" href="https://ligataubate.com.br/assets/images/soccer/favicons/favicon-152.png">

  <link rel="apple-touch-icon" sizes="120x120" href="https://ligataubate.com.br/assets/images/soccer/favicons/favicon-152.png">

  <link rel="apple-touch-icon" sizes="152x152" href="https://ligataubate.com.br/assets/images/soccer/favicons/favicon-152.png">



  <!-- Mobile Specific Metas

  ================================================== -->

  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">



  <!-- Google Web Fonts

  ================================================== -->

  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">



  <link href="<?php echo BASE; ?>assets/css/style-carteirinha.css" rel="stylesheet">



</head>

<body>



  <?php



  // var_dump($carteirinhas);



  $paginas = ceil(count($carteirinhas) / 8);



  if ($paginas < 1) {

    $paginas = 1;
  }



  $registros = count($carteirinhas);



  $inicio = 0;



  ?>

  <?php for ($pg = 1; $pg <= $paginas; $pg++) { ?>



    <?php $limite = 0; ?>



    <page size="A4">





      <!--<div class="topo">

    

    <div style="margin: 0 auto; padding: 20px; width: 90%; height: 100px;">

    

      <div style="width: 20%; float: left; text-align: center; padding-left: 20px;">

      <img src="assets/images/logotipo.png" alt="Liga de Taubaté" width="100px">

      </div>

      

      <div style="width: 70%;float: left; padding-left:10px; font-size: 25px; font-weight: bold; spa; line-height: 30px; text-align: center; padding-top: 20px;">

      LIGA MUNICIPAL DE FUTEBOL DE TAUBATÉ

      </div>

      

      <div style="width: 70%;float: left; padding-left:10px; font-size: 14px; font-weight: 500; line-height: 30px; text-align: center">

      Filiada à F.P.F - Rodoviária Velha - Sala 4 - CNPJ 60.125.101/0001-10

      </div>

      

      

    </div>

    

  </div>-->





      <table width="90%" border="0" cellspacing="12" cellpadding="0" style="margin-top: -5px; margin-left: -7px;">

        <tbody>





          <?php for ($reg = $inicio; $reg < $registros; $reg++) { ?>



            <?php if ($reg % 2 == 0) { ?>



              <tr>
                <td>



                <?php } else { ?>



                <td>



                <?php } ?>



                <div class="carterinha">



                  <div class="borda-foto">

                    <div class="foto-atleta">



                      <?php if ($carteirinhas[$reg]["foto"] == "") { ?>

                        <img src="https://www.ligataubate.com.br/cms/assets/images/no_photo_male.jpg" width="100%" height="100%">

                      <?php } else { ?>

                        <img src="https://www.ligataubate.com.br/cms/assets/images/atletas/<?php echo $carteirinhas[$reg]["foto"]; ?>?<?php echo md5(time()); ?>" width="100%" height="100%">

                      <?php } ?>

                    </div>

                  </div>



                  <div class="topo-carterinha">

                    <div style="font-size: 10.5px; font-weight: bold; text-align: center;line-height: 13px;">LIGA MUNICIPAL DE FUTEBOL DE TAUBATÉ </div>





                    <!--<div style="font-size: 10px; font-weight: 700; text-align: center; line-height: 15px;">Fundada em 18 de novembro de 1942        

      </div>-->



                    <div style="font-size: 10px; font-weight: 700; text-align: center;line-height: 13px;"><i>Filiada à Federação Paulista de Futebol</i>

                    </div>



                    <div style="font-size: 10px; font-weight: 700; text-align: center;line-height: 13px;"><i>CNPJ 60.125.101/0001-10</i></div>





                  </div>

                  <br><br><br>

                  <div class="meio-carterinha">

                    <div style="font-size: 9.5px; font-weight: bold; text-align: left;line-height: 13px;">Clube</div>



                    <div style="font-size: 10px; font-weight: bold; text-align: left; line-height: 13px; text-transform: uppercase"><?php echo $carteirinhas[$reg]["clube_nome"]; ?>

                    </div>



                    <div style="font-size: 11.5px; font-weight: bold; text-align: left;line-height: 15px;">Nome</div>



                    <div style="font-size: 12px; font-weight: bold; text-align: left; line-height: 13px; text-transform: uppercase"><?php //echo  substr($carteirinhas[$reg]["nome"], 0, 30);
                                                                                                                                    ?> <?php echo $carteirinhas[$reg]["nome"]; ?>

                    </div>



                  </div>



                  <div class="meio-carterinha2">









                    <?php /* removido 21/04/2018

      <div style="font-size: 11.5px; font-weight: bold; text-align: left;line-height: 13px; width: 50%">Campeonato</div>



      <div style="font-size: 12px; font-weight: bold; text-align: left; line-height: 13px; text-transform: uppercase;"><?php echo $carteirinhas[$reg]["campeonato_nome"];?>      

      </div>

    



      <div style="font-size: 11.5px; font-weight: bold; text-align: left;line-height: 13px; width: 50%">Registro</div>



      <div style="font-size: 12px; font-weight: bold; text-align: left; line-height: 13px; text-transform: uppercase;  "><?php echo $carteirinhas[$reg]["atleta_id"];?>    

      </div>  



      */



                    ?>





                    <div style="font-size: 11.5px; font-weight: bold; text-align: left;line-height: 13px; width: 50%">RG</div>



                    <div style="font-size: 12px; font-weight: bold; text-align: left; line-height: 13px; text-transform: uppercase;"><?php echo $carteirinhas[$reg]["rg"]; ?>

                    </div>



                    <div style="font-size: 11.5px; font-weight: bold; text-align: left;line-height: 13px; width: 50%">CPF</div>



                    <div style="font-size: 12px; font-weight: bold; text-align: left; line-height: 13px; text-transform: uppercase;  "><?php echo $carteirinhas[$reg]["cpf"]; ?>

                    </div>



                  </div>



                  <div class="meio-carterinha2">



                    <?php /*

      <div style="font-size: 11.5px; font-weight: bold; text-align: left;line-height: 13px; width: 50%">RG</div>



      <div style="font-size: 12px; font-weight: bold; text-align: left; line-height: 13px; text-transform: uppercase;"><?php echo $carteirinhas[$reg]["rg"];?>  

      </div>



      <div style="font-size: 11.5px; font-weight: bold; text-align: left;line-height: 13px; width: 50%">CPF</div>



      <div style="font-size: 12px; font-weight: bold; text-align: left; line-height: 13px; text-transform: uppercase;  "><?php echo $carteirinhas[$reg]["cpf"];?>    

      </div>  



      */ ?>



                  </div>



                  <div class="nome-carterinha">

                    <?php /*21/04/2018

      <div style="font-size: 11.5px; font-weight: bold; text-align: left;line-height: 15px;">Nome</div>



      <div style="font-size: 12px; font-weight: bold; text-align: left; line-height: 13px; text-transform: uppercase"><?php echo  substr($carteirinhas[$reg]["nome"], 0, 30);?>

      </div>



      */ ?>





                  </div>



                  <div class="meio-carterinha2">

                    <div style="font-size: 11.5px; font-weight: bold; text-align: left;line-height: 13px;">Data de Nascimento</div>



                    <div style="font-size: 12px; font-weight: bold; text-align: left; line-height: 13px; text-transform: uppercase"><?php echo date('d/m/Y', strtotime($carteirinhas[$reg]["nascimento"])); ?>

                    </div>



                  </div>





                  <div class="meio-carterinha2">

                    <div style="font-size: 11.5px; font-weight: bold; text-align: left;line-height: 13px;"> Função </div>



                    <div style="font-size: 12px; font-weight: bold; text-align: left; line-height: 15px; text-transform: uppercase"> <?php echo substr($carteirinhas[$reg]["funcao"], 0, 12); ?>.

                    </div>



                  </div>





                  <div class="meio-carterinha2">

                    <div style="font-size: 11.5px; font-weight: bold; text-align: left;line-height: 13px;">Registro</div>



                    <div style="font-size: 12px; font-weight: bold; text-align: left; line-height: 13px; text-transform: uppercase"><?php echo $carteirinhas[$reg]["atleta_id"]; ?>

                    </div>



                  </div>


                  <div class="meio-carterinha2">
                    <div style="font-size: 10px; font-weight: bold; text-align: left; line-height: 13px; text-transform: uppercase">Validade: 31/12/<?php echo date('Y') ?>
                    </div>
                  </div>



                  <div style="position:relative;top:-40px" class="img-liga"><img src="<?php echo BASE; ?>assets/images/logotipo.png" alt="Liga de Taubaté" width="70px"></div>





                </div>



                <?php if ($limite == 7) {

                  break;
                } ?>



                <?php $limite++; ?>



              <?php } ?>





        </tbody>

      </table>



      <?php $inicio = $reg + 1; ?>

    </page>

  <?php } ?>



  <script>
    print();
  </script>

</body>

</html>