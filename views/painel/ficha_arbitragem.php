
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
  
   <link href="https://www.ligataubate.com.br/cms/assets/css/style-arbitragem.css" rel="stylesheet">

</head>
<body>

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
<?php foreach($arbitros as $arbitro){?>

<page size="A4">
	
	<div class="topo">
		
		<div style="margin: 0 auto; padding: 20px; width: 90%; height: 100px;">
		
			<div style="width: 20%; float: left; text-align: center; padding-left: 20px;">
			<img src="https://www.ligataubate.com.br/cms/assets/images/logotipo.png" alt="Liga de Taubaté" width="100px">
			</div>
			
			<div style="width: 70%;float: left; padding-left:10px; font-size: 25px; font-weight: bold; spa; line-height: 30px; text-align: center; padding-top: 20px;">
			LIGA MUNICIPAL DE FUTEBOL DE TAUBATÉ
			</div>
			
			<div style="width: 70%;float: left; padding-left:10px; font-size: 14px; font-weight: 500; line-height: 30px; text-align: center">
			Filiada à F.P.F - Rodoviária Velha - Sala 4 - CNPJ 60.125.101/0001-10
			</div>
			
			
		</div>
		
	</div>
	
	<div style="margin: 0 auto; padding: 10px; width: 90%; height: auto;">
	<h2 style="text-align: left"> FICHA DE INSCRIÇÃO DE ÁRBITROS </h2>
	</div>
	
	<div style="padding: 10px; width: 95%; height: 0px; z-index: 9999">
	
		<div style="width: 4cm; height: 5cm; background: #7B7B7B; float: right; margin-right: 30px; margin-bottom: -320px; margin-top: -130px; border: 1px solid #BDBDBD; border-radius: 5px;">
			<?php if($arbitro["foto"]!=""){?>

      <img src="https://www.ligataubate.com.br/cms/assets/images/arbitros/<?php echo $arbitro["foto"];?>" height="100%" />

      <?php } ?>
		</div>
	
	</div>
	
<table width="95%" border="0" cellspacing="0" cellpadding="10" style="margin-top: -25px;">
  <tbody>
   
    <tr>
      <td colspan="3">&nbsp;</td>
      <td colspan="3">&nbsp;</td>
    </tr>
   
    <tr>
      <td colspan="6" class="borda-linha"><b>Função:</b>
      <?php echo $arbitro["funcao"];?>
      </td>

    </tr>
    
    
       
    <tr>
      <td colspan="6" class="borda-linha"><b>Nome do Árbitro:</b> <?php echo $arbitro["nome"];?> </td>
    </tr>
    
    <tr>
      <td colspan="2" class="borda-linha"><b>Data de Nascimento:</b> <?php echo date('d/m/Y', strtotime($arbitro["nascimento"]));?> </td>
      <td colspan="2" class="borda-linha"><b>&nbsp;</b></td>
      <td colspan="2" class="borda-linha"><b>&nbsp;</b></td>
    </tr>
    
    <tr>
      <td colspan="2" class="borda-linha"><b>RG:</b> <?php echo $arbitro["rg"];?> </td>
      <td colspan="4" class="borda-linha"><b>CPF:</b> <?php echo $arbitro["cpf"];?></td>
    </tr>
    
    <tr>
      <td colspan="6" class="borda-linha"><b>Endereço:</b> <?php echo $arbitro["endereco"];?> </td>
    </tr>

    <tr>
      <td colspan="6" class="borda-linha"><b>Contato:</b> <?php echo $arbitro["telefone"];?> </td>
    </tr>
    <tr>
      <td colspan="6" class="borda-linha"><b>Contato:</b> <?php echo $arbitro["whatsapp"];?> </td>
    </tr>

    <tr>
      <td colspan="4" class="borda-linha"><b>Bairro:</b> <?php echo $arbitro["bairro"];?> </td>
      <td colspan="2" class="borda-linha"><b>Número:</b> <?php echo $arbitro["numero"];?> </td>
    </tr>


    <tr>
      <td colspan="4" class="borda-linha"><b>Cidade:</b> <?php echo $arbitro["cidade"];?></td>
      <td colspan="2" class="borda-linha"><b>Estado:</b> <?php echo $arbitro["estado"];?> </td>
      
    </tr>

    <tr>
      <td colspan="6" class="borda-linha">&nbsp;</td>
    </tr>

    <tr>
      <td colspan="6" class="borda-linha">&nbsp;</td>
    </tr>
    
    
    <tr>
      <td colspan="6" class="borda-linha">&nbsp;</td>
    </tr>
    
    <tr>
      <td colspan="6" class="borda-linha">&nbsp;</td>
    </tr>
    
    <tr>
      <td colspan="6" class="borda-linha">&nbsp;</td>
    </tr>
    
    <tr>
      <td colspan="3">&nbsp;</td>
      <td colspan="3">&nbsp;</td>
    </tr>
     
    <tr>
      <td colspan="3">&nbsp;</td>
      <td colspan="3">&nbsp;</td>
    </tr>
     
    <tr>
      <td colspan="3">&nbsp;</td>
      <td colspan="3">&nbsp;</td>
    </tr>
     
     
     <tr>
      <td colspan="2">&nbsp;</td>
      <td colspan="4" class="assinatura-atleta"><b>Assinatura do Árbitro</b></td>
    </tr>
    
    <tr>
      <td colspan="3">&nbsp;</td>
      <td colspan="3">&nbsp;</td>
    </tr>
     
    <tr>
      <td colspan="3">&nbsp;</td>
      <td colspan="3">&nbsp;</td>
    </tr>
               
    <tr>
      <td colspan="3">&nbsp;</td>
      <td colspan="3">&nbsp;</td>
    </tr>
     
     <tr>
      <td colspan="2">&nbsp;</td>
      <td colspan="4" class="assinatura-atleta"><b>Assinatura do Presidente da LMFT</b></td>
    </tr>                
  
    
    <tr>
      <td colspan="3">&nbsp;</td>
      <td colspan="3">&nbsp;</td>
    </tr>
   
    
    <tr>
	 <td colspan="3"> <i> Em Taubaté, <?php echo date('d');?> de <?php echo $mes[date('m')];?> de <?php echo date('Y');?>.</i></td>
    </tr>
    
        
                
  </tbody>
</table>
	
</page>

<?php } ?>
	
	
  </body>
  </html>
<script>
window.print();
</script>