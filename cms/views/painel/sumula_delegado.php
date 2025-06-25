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
  
   <link href="https://www.ligataubate.com.br/cms/assets/css/style-sumula.css" rel="stylesheet">

</head>
<body>

<?php foreach($sumulas as $sumula){?>

<page size="A4">
  
<br>
  
  <table width="98%" border="0" cellspacing="0" cellpadding="0" style="border: none;">
  <tbody>
    <tr>
      <td style="text-align: center"><img src="https://www.ligataubate.com.br/cms/assets/images/logotipo.png" alt="Liga de Taubaté" width="50px"></td>
      <td style="font-size: 22px; font-weight: bold;line-height: 30px; text-align: center;">LIGA MUNICIPAL DE FUTEBOL DE TAUBATÉ <br> SÚMULA E RELATÓRIO DA PARTIDA</td>
      <td style="text-align: left;"><b>JOGO:</b> <?php echo $sumula["jogo"]["jogo_id"];?> </td>
    </tr>
  </tbody>
</table>

<br>
  
  <!-- INFORMAÇÃO CAMPEONATO -->
  <table width="98%" border="1" cellspacing="0" cellpadding="2">
  <tbody>
    <tr>
      <td width="12%">Campeonato:</td>
      <td colspan="3"> <?php echo $sumula["jogo"]["campeonato"];?></td>
      <td width="9%">Rodada:</td>
      <td width="30%"><?php echo $sumula["jogo"]["rodada"];?></td>
    </tr>
    <tr style="background-color: hsla(0,0%,64%,0.1)">
      <td>Jogo:</td>
      <td colspan="3"> <?php echo $sumula["jogo"]["clube_1_completo"];?> X <?php echo $sumula["jogo"]["clube_2_completo"];?> </td>
      <td>Grupo:</td>
      <td> <?php echo $sumula["jogo"]["grupo"];?> </td>
    </tr>
    <tr>
      <td> Data:</td>
      <td colspan="3"> <?php echo date('d/m/Y', strtotime($sumula["jogo"]["data"]));?> </td>
      <td>Horário:</td>
      <td> <?php echo date('H:i', strtotime($sumula["jogo"]["hora"]));?> </td>
    </tr>
    <tr style="background-color: hsla(0,0%,64%,0.1)">
      <td> Estádio</td>
      <td colspan="5"> <?php echo $sumula["jogo"]["estadio"];?> </td>
    </tr>
  </tbody>
</table>

<br>


  <!-- RELATÓRIO DO DELEGADO -->
<table width="98%" border="1" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td style="background-color:hsla(194,11%,63%,0.5); color: #000; text-align: center;"><b>RELATÓRIO DO DELEGADO DA PARTIDA</b></td>
    </tr>
    <tr>
      <td>

    <p style="padding: 8px; border-bottom:1px solid hsla(0,0%,0%,1.00);"></p>
        <p style="padding: 8px; border-bottom:1px solid hsla(0,0%,0%,1.00);"></p>
        <p style="padding: 8px; border-bottom:1px solid hsla(0,0%,0%,1.00);"></p>
        <p style="padding: 8px; border-bottom:1px solid hsla(0,0%,0%,1.00);"></p>
        <p style="padding: 8px; border-bottom:1px solid hsla(0,0%,0%,1.00);"></p>
        <p style="padding: 8px; border-bottom:1px solid hsla(0,0%,0%,1.00);"></p>
        <p style="padding: 8px; border-bottom:1px solid hsla(0,0%,0%,1.00);"></p>
        <p style="padding: 8px; border-bottom:1px solid hsla(0,0%,0%,1.00);"></p>
        <p style="padding: 8px; border-bottom:1px solid hsla(0,0%,0%,1.00);"></p>
        <p style="padding: 8px; border-bottom:1px solid hsla(0,0%,0%,1.00);"></p>
        <p style="padding: 8px; border-bottom:1px solid hsla(0,0%,0%,1.00);"></p>
        <p style="padding: 8px; border-bottom:1px solid hsla(0,0%,0%,1.00);"></p>
        <p style="padding: 8px; border-bottom:1px solid hsla(0,0%,0%,1.00);"></p>
        <p style="padding: 8px; border-bottom:1px solid hsla(0,0%,0%,1.00);"></p>
        <p style="padding: 8px; border-bottom:1px solid hsla(0,0%,0%,1.00);"></p>
        <p style="padding: 8px; border-bottom:1px solid hsla(0,0%,0%,1.00);"></p>
        <p style="padding: 8px; border-bottom:1px solid hsla(0,0%,0%,1.00);"></p>
        <p style="padding: 8px; border-bottom:1px solid hsla(0,0%,0%,1.00);"></p>
        <p style="padding: 8px; border-bottom:1px solid hsla(0,0%,0%,1.00);"></p>
        <p style="padding: 8px; border-bottom:1px solid hsla(0,0%,0%,1.00);"></p>
        <p style="padding: 8px; border-bottom:1px solid hsla(0,0%,0%,1.00);"></p>
        <p style="padding: 8px; border-bottom:1px solid hsla(0,0%,0%,1.00);"></p>
        <p style="padding: 8px; border-bottom:1px solid hsla(0,0%,0%,1.00);"></p>
        <p style="padding: 8px; border-bottom:1px solid hsla(0,0%,0%,1.00);"></p>
        <p style="padding: 8px; border-bottom:1px solid hsla(0,0%,0%,1.00);"></p>
   
      </td>
    </tr>
  </tbody>
</table>


<br>

<!-- ASSINATURA -->

<table width="98%" border="1" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td colspan="3" style="background-color:hsla(194,11%,63%,0.5); color: #000; text-align: center;"><b>ASSINATURAS</b></td>
    </tr>
    <tr>
      <td width="33%">&nbsp;<br><br></td>
      <td width="33%">&nbsp;<br><br></td>
      <td width="33%">&nbsp;<br><br></td>
    </tr>
    <tr>
      <td style="text-align: center">Data</td>
      <td style="text-align: center">Horário</td>
      <td style="text-align: center">Delegado</td>
    </tr>
  </tbody>
</table>


</page>


<?php } ?>

	
	
  </body>
  </html>
