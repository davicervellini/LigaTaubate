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

  <?php foreach ($sumulas as $sumula) { ?>
    <?php

    $comissao = array();


    ?>
    <page size="A4">


      <table width="98%" border="0" cellspacing="0" cellpadding="0" style="border: none;">
        <tbody>
          <tr>
            <td style="text-align: center"><img src="https://www.ligataubate.com.br/cms/assets/images/logotipo.png" alt="Liga de Taubaté" width="50px"></td>
            <td style="font-size: 16px; font-weight: bold; text-align: left;">LIGA MUNICIPAL DE FUTEBOL DE TAUBATÉ <br> SÚMULA DA PARTIDA</td>
            <td style="text-align: left;"><b>JOGO:</b> <?php echo $sumula["jogo"]["jogo_id"]; ?></td>
          </tr>
        </tbody>
      </table>

      <br>

      <!-- INFORMAÇÃO CAMPEONATO -->
      <table width="98%" border="1" cellspacing="0" cellpadding="2" style="margin-top: -10px">
        <tbody>
          <tr>
            <td width="12%">Campeonato:</td>
            <td colspan="5"> <?php echo $sumula["jogo"]["campeonato"]; ?> / <?php echo $sumula["jogo"]["temporada"]; ?> </td>

          </tr>
          <tr style="background-color: hsla(0,0%,64%,0.1)">
            <td>Jogo:</td>
            <td width="22%"> <?php echo $sumula["jogo"]["clube_1_completo"]; ?> </td>
            <td width="4%"></td>
            <td width="2%">
              <center>x</center>
            </td>
            <td width="4%"></td>
            <td width="22%"> <?php echo $sumula["jogo"]["clube_2_completo"]; ?></td>

          </tr>
          <tr>
            <td colspan="6">
              Data: <?php echo date('d/m/Y', strtotime($sumula["jogo"]["data"])); ?> &nbsp;&nbsp;&nbsp;&nbsp;
              | &nbsp;&nbsp;&nbsp;&nbsp; Horário: <?php echo date('H:i', strtotime($sumula["jogo"]["hora"])); ?> &nbsp;&nbsp;&nbsp;&nbsp;
              | &nbsp;&nbsp;&nbsp;&nbsp; Grupo: <?php echo $sumula["jogo"]["grupo"]; ?> &nbsp;&nbsp;&nbsp;&nbsp;
              | &nbsp;&nbsp;&nbsp;&nbsp; Rodada: <?php echo $sumula["jogo"]["rodada"]; ?> </td>
          </tr>
          <tr style="background-color: hsla(0,0%,64%,0.1)">
            <td> Estádio</td>
            <td colspan="5"> <?php echo $sumula["jogo"]["estadio"]; ?></td>
          </tr>
        </tbody>
      </table>

      <br>

      <!-- ARBITRAGEM -->
      <table width="98%" border="1" cellspacing="0" cellpadding="2" style="margin-top:-12px; margin-bottom: 8px">
        <tbody>
          <tr>
            <td colspan="4" style="background-color:hsla(194,11%,63%,0.5); color: #000; text-align: center;"><b>EQUIPE DE ARBITRAGEM</b></td>
          </tr>
          <tr>
            <td width="15%">Árbitro</td>
            <td width="50%"><?php echo $sumula["jogo"]["arbitro"]; ?></td>
            <td width="35%">Ass.:&nbsp;</td>
          </tr>
          <tr style="background-color: hsla(0,0%,64%,0.1)">
            <td>Árb. Assistente 1</td>
            <td> <?php echo $sumula["jogo"]["auxiliar_1"]; ?> </td>
            <td>Ass.:&nbsp;</td>
          </tr>
          <tr>
            <td>Árb. Assistente 2</td>
            <td> <?php echo $sumula["jogo"]["auxiliar_2"]; ?> </td>
            <td>Ass.:</td>
          </tr>
          <!--
    <tr>
      <td><b>Quarto Árbitro</b></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><b>Árbitro Assist Adic 1</b></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><b>Árbitro Assist Adic 2</b></td>
      <td>&nbsp;</td>
    </tr>
    -->
          <tr style="background-color: hsla(0,0%,64%,0.1)">
            <td>Representante</td>
            <td> <?php echo $sumula["jogo"]["representante"]; ?> </td>
            <td>Ass.:&nbsp;</td>
          </tr>

        </tbody>
      </table>

      <!-- CRONOLOGIA -->
      <table width="98%" border="1" cellspacing="0" cellpadding="2">
        <tbody>
          <!-- <tr>
            <td colspan="8" style="background-color:hsla(194,11%,63%,0.5); color: #000; text-align: center;"><b>CRONOLOGIA</b></td>
          </tr> -->
          <tr>
            <td colspan="8" style="background-color:hsla(194,11%,63%,0.3); color: #000; text-align: center; border-right: none;">
              <div style="display:flex; align-items:center; justify-content: space-between; gap: 12px">
                <span style="margin-left: 64px"><b>1º Tempo </b></span>
                <span><b>CRONOLOGIA </b></span>
                <span style="margin-right: 64px"><b>2º Tempo </b></span>
              </div>
            </td>
            <!-- <td colspan="4" style="background-color:hsla(194,11%,63%,0.3); color: #000; text-align: center; border-left: none;"><b>2º Tempo</b></td> -->
          </tr>
          <tr style="background-color: hsla(0,0%,64%,0.1)">
            <td width="22%">Entrada do mandante:</td>
            <td width="8%">&nbsp;</td>
            <td width="10%">Atraso:</td>
            <td width="10%">&nbsp;</td>
            <td width="21%">Entrada do mandante:</td>
            <td width="8%">&nbsp;</td>
            <td width="11%">Atraso:</td>
            <td width="10%">&nbsp;</td>
          </tr>
          <tr>
            <td>Entrada do visitante:</td>
            <td>&nbsp;</td>
            <td>Atraso:</td>
            <td>&nbsp;</td>
            <td>Entrada do visitante:</td>
            <td>&nbsp;</td>
            <td>Atraso:</td>
            <td>&nbsp;</td>
          </tr>
          <tr style="background-color: hsla(0,0%,64%,0.1)">
            <td>Início 1º Tempo:</td>
            <td>&nbsp;</td>
            <td>Atraso:</td>
            <td>&nbsp;</td>
            <td>Início do 2º Tempo:</td>
            <td>&nbsp;</td>
            <td>Atraso:</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Término do 1º Tempo:</td>
            <td>&nbsp;</td>
            <td>Acréscimo:</td>
            <td>&nbsp;</td>
            <td>Término do 2º Tempo:</td>
            <td>&nbsp;</td>
            <td>Acréscimo:</td>
            <td>&nbsp;</td>
          </tr>
          <!-- <tr style="background-color: hsla(0,0%,64%,0.1)">
      <td colspan="4">Resultado do 1º Tempo: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; x &nbsp;</td>
      <td colspan="4">Resultado Final: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; x &nbsp;</td>
    </tr>
    <tr>
      <td colspan="8">
        <p style="font-size: 12px; text-align: justify;">Informar o motivo dos acréscimos e atrasos: </p>
    <p style="padding: 8px; border-bottom:1px solid hsla(0,0%,0%,1.00);"></p>
        <p style="padding: 8px; border-bottom:1px solid hsla(0,0%,0%,1.00);"></p>
        <br>

   </td>
    </tr>-->
        </tbody>
      </table>

      <br>

      <!-- JOGADORES / EQUIPES -->
      <table width="100%" border="1" cellspacing="0" cellpadding="0" style="margin-top: -12px">
        <tbody>
          <tr>
            <td colspan="8" style="background-color:hsla(194,11%,63%,0.5); color: #000; text-align: center;"><b>RELAÇÃO DOS ATLETAS</b></td>
          </tr>
          <tr>
            <td colspan="4" style="background-color:hsla(194,11%,63%,0.3); color: #000; text-align: center;width:50%;"><b> <?php echo $sumula["jogo"]["clube_1_completo"]; ?> <!--Equipe A--></b></td>
            <!-- <td rowspan="23">&nbsp;</td> -->
            <td colspan="4" style="background-color:hsla(194,11%,63%,0.3); color: #000; text-align: center;width:50%;"><b> <?php echo $sumula["jogo"]["clube_2_completo"]; ?> <!--Equipe B--></b></td>
          </tr>


          <tr>
            <td valign="top" colspan="4">

              <table width="100%" border="1" cellspacing="0" cellpadding="0">

                <tr>
                  <td width="10%" style="text-align: center">Nº</td>
                  <td width="70%" style="text-align: center">Nome Completo</td>
                  <!-- <td width="7%" style="text-align: center">C.A</td>
                  <td width="7%" style="text-align: center">C.V</td> -->
                  <td width="10%" style="text-align: center">Gols</td>
                  <td width="10%" style="text-align: center">Sub.</td>
                  <!--<td style="text-align: center"><b>Nº Reg.</b></td>-->
                </tr>

                <?php $controle = 1; ?>

                <?php $casa = array(); ?>

                <?php foreach ($sumula["inscricoes"] as $inscricao) { ?>

                  <?php if (array_key_exists("casa", $inscricao["atletas"])) { ?>

                    <?php /*COMISSÃO*/

                    if ($inscricao["atletas"]["casa"]["funcao"] == "Técnico") {
                      $comissao["tecnico_casa"] = $inscricao["atletas"]["casa"]["nome"];
                    }
                    if ($inscricao["atletas"]["casa"]["funcao"] == "Massagista") {
                      $comissao["massagista_casa"] = $inscricao["atletas"]["casa"]["nome"];
                    }
                    if ($inscricao["atletas"]["casa"]["funcao"] == "Auxiliar Técnico") {
                      $comissao["auxiliar_tecnico_casa"] = $inscricao["atletas"]["casa"]["nome"];
                    }
                    if ($inscricao["atletas"]["casa"]["funcao"] == "Preparador Físico") {
                      $comissao["preparador_fisico_casa"] = $inscricao["atletas"]["casa"]["nome"];
                    }

                    ?>



                    <?php if ($inscricao["atletas"]["casa"]["funcao"] == "Atleta") { ?>

                      <?php array_push($casa, strtoupper($inscricao["atletas"]["casa"]["nome"])); ?>

                      <?php $controle++; ?>

                    <?php } ?>

                  <?php } ?>

                <?php } ?>



                <?php asort($casa); ?>

                <?php foreach ($casa as $cs) { ?>

                  <tr style="background-color: hsla(0,0%,64%,0.1)">

                    <?php //if(array_key_exists("visitante", $inscricao["atletas"])){
                    ?>

                    <td>&nbsp;</td>
                    <td style="font-size: 11px;"><?php echo substr($cs, 0, 35); ?></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <!-- <td>&nbsp;</td>
                    <td>&nbsp;</td> -->

                  </tr>

                <?php } ?>


                <?php for ($x = $controle; $x <= 22; $x++) { //CORREÇÃO PARA PREENCHER AS LINHAS VAZIAS 
                ?>

                  <tr style="background-color: hsla(0,0%,64%,0.1)">

                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>

                  </tr>

                <?php } ?>



              </table>
            </td>


            <td valign="top" colspan="4">


              <table width="100%" border="1" cellspacing="0" cellpadding="0">

                <tr>
                  <td width="10%" style="text-align: center">Nº</td>
                  <td width="70%" style="text-align: center;">Nome Completo</td>
                  <td width="10%" style="text-align: center">Gols</td>
                  <td width="10%" style="text-align: center">Sub.</td>
                  <!-- <td width="7%" style="text-align: center">C.A</td>
                  <td width="7%" style="text-align: center">C.V</td> -->
                  <!--<td style="text-align: center"><b>Nº Reg.</b></td>-->

                </tr>

                <?php $controle = 1; ?>

                <?php $visitante = array(); ?>

                <?php foreach ($sumula["inscricoes"] as $inscricao) { ?>



                  <?php if (array_key_exists("visitante", $inscricao["atletas"])) { ?>



                    <?php /*COMISSÃO*/

                    if ($inscricao["atletas"]["visitante"]["funcao"] == "Técnico") {
                      $comissao["tecnico_visitante"] = $inscricao["atletas"]["visitante"]["nome"];
                    }
                    if ($inscricao["atletas"]["visitante"]["funcao"] == "Massagista") {
                      $comissao["massagista_visitante"] = $inscricao["atletas"]["visitante"]["nome"];
                    }
                    if ($inscricao["atletas"]["visitante"]["funcao"] == "Auxiliar Técnico") {
                      $comissao["auxiliar_tecnico_visitante"] = $inscricao["atletas"]["visitante"]["nome"];
                    }
                    if ($inscricao["atletas"]["visitante"]["funcao"] == "Preparador Físico") {
                      $comissao["preparador_fisico_visitante"] = $inscricao["atletas"]["visitante"]["nome"];
                    }

                    ?>





                    <?php if ($inscricao["atletas"]["visitante"]["funcao"] == "Atleta") { ?>

                      <?php array_push($visitante, strtoupper($inscricao["atletas"]["visitante"]["nome"])); ?>

                      <?php $controle++; ?>

                    <?php } ?>

                  <?php } ?>

                <?php } ?>



                <?php asort($visitante); ?>

                <?php foreach ($visitante as $vs) { ?>

                  <tr style="background-color: hsla(0,0%,64%,0.1)">

                    <?php //if(array_key_exists("visitante", $inscricao["atletas"])){
                    ?>

                    <td>&nbsp;</td>
                    <td style="font-size: 11px;"><?php echo substr($vs, 0, 35); ?></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <!-- <td>&nbsp;</td>
                    <td>&nbsp;</td> -->

                  </tr>

                <?php } ?>




                <?php for ($x = $controle; $x <= 22; $x++) { //CORREÇÃO PARA PREENCHER AS LINHAS VAZIAS 
                ?>

                  <tr style="background-color: hsla(0,0%,64%,0.1)">

                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>

                  </tr>

                <?php } ?>


              </table>

            </td>


          </tr>


          <!--21 linhas-->




        </tbody>
      </table>

      <br>

      <table width="98%" border="1" cellspacing="0" cellpadding="2" style="margin-top: -12px">
        <tbody>
          <tr>
            <td colspan="8" style="background-color:hsla(194,11%,63%,0.5); color: #000; text-align: center;"><b>COMISSÃO TÉCNICA</b></td>
          </tr>
          <tr>
            <td colspan="4" style="background-color:hsla(194,11%,63%,0.3); color: #000; text-align: center;width:50%;"><b><?php echo $sumula["jogo"]["clube_1_completo"]; ?> <!--Equipe A--></b></td>
            <td colspan="4" style="background-color:hsla(194,11%,63%,0.3); color: #000; text-align: center;width:50%;"><b><?php echo $sumula["jogo"]["clube_2_completo"]; ?> <!--Equipe B--></b></td>
          </tr>

          <tr>
            <td width="17%">Técnico:</td>
            <td colspan="3"> <?php echo (isset($comissao["tecnico_casa"])) ? $comissao["tecnico_casa"] : ''; ?> </td>
            <td width="16%">Técnico:</td>
            <td width="34%" colspan="3"> <?php echo (isset($comissao["tecnico_visitante"])) ? $comissao["tecnico_visitante"] : ''; ?> </td>
          </tr>
          <tr style="background-color: hsla(0,0%,64%,0.1)">
            <td>Auxiliar Técnico:</td>
            <td colspan="3"> <?php echo (isset($comissao["auxiliar_tecnico_casa"])) ? $comissao["auxiliar_tecnico_casa"] : ''; ?> </td>
            <td>Auxiliar Técnico:</td>
            <td colspan="3"> <?php echo (isset($comissao["auxiliar_tecnico_visitante"])) ? $comissao["auxiliar_tecnico_visitante"] : ''; ?> </td>
          </tr>
          <tr>
            <td>Preparador Físico:</td>
            <td colspan="3"> <?php echo (isset($comissao["preparador_fisico_casa"])) ? $comissao["preparador_fisico_casa"] : ''; ?> </td>
            <td>Preparador Físico:</td>
            <td colspan="3"> <?php echo (isset($comissao["preparador_fisico_visitante"])) ? $comissao["preparador_fisico_visitante"] : ''; ?> </td>
          </tr>
          <tr style="background-color: hsla(0,0%,64%,0.1)">
            <td>Massagista:</td>
            <td colspan="3"> <?php echo (isset($comissao["massagista_casa"])) ? $comissao["massagista_casa"] : ''; ?> </td>
            <td>Massagista:</td>
            <td colspan="3"> <?php echo (isset($comissao["massagista_visitante"])) ? $comissao["massagista_visitante"] : ''; ?> </td>
          </tr>
        </tbody>

      </table>
      <table width="98%" border="1" cellspacing="0" cellpadding="2" style="margin-top: 4px">
        <tbody>
          <tr>
            <td height="60px">
              <div style="display:flex; align-items:flex-start; height: 100%">
                <span>
                  Observação:
                </span>
              </div>
            </td>
          </tr>
        </tbody>
      </table>

    </page>

    <?/*
<page size="A4">

  <!-- COMISSÃO TÉCNICA -->
<br>

  <!-- GOLS 
  <table width="98%" border="1" cellspacing="0" cellpadding="2">
  <tbody>
    <tr>
      <td colspan="6" style="background-color:hsla(194,11%,63%,0.5); color: #000; text-align: center;"><b>GOLS</b></td>
    </tr>
    
    <tr>
      <td width="13%" style="text-align: center">Tempo</td>
      <td width="6%" style="text-align: center">1T/2T</td>
      <td width="5%" style="text-align: center">Nº</td>
      <td width="6%" style="text-align: center">Tipo</td>
      <td width="46%" style="text-align: center">Nome do Atleta</td>  
      <td width="24%" style="text-align: center">Equipe</td>      
    </tr>
    
    <tr style="background-color: hsla(0,0%,64%,0.1)">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td>      
      <td>&nbsp;</td>    
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td> 
      <td>&nbsp;</td>         
    </tr>
    <tr style="background-color: hsla(0,0%,64%,0.1)">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td>      
      <td>&nbsp;</td>    
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td> 
      <td>&nbsp;</td>         
    </tr>
    <tr style="background-color: hsla(0,0%,64%,0.1)">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td>      
      <td>&nbsp;</td>    
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td> 
      <td>&nbsp;</td>         
    </tr>
    <tr style="background-color: hsla(0,0%,64%,0.1)">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td>      
      <td>&nbsp;</td>    
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td> 
      <td>&nbsp;</td>         
    </tr>
    <tr style="background-color: hsla(0,0%,64%,0.1)">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td>      
      <td>&nbsp;</td>    
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td> 
      <td>&nbsp;</td>         
    </tr>
    <tr style="background-color: hsla(0,0%,64%,0.1)">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td>      
      <td>&nbsp;</td>    
    </tr>
       
    <tr>
      <td  colspan="6"><b>NR</b> - Gol Normal | <b>C</b> - Gol Contra | <b>F</b> - Gol de Falta | <b>P</b> - Gol de Pênalti</td>
    </tr>
    
    
  </tbody>
</table>-->

<br>

  <!-- SUBSTITUIÇÕES 
  <table width="98%" border="1" cellspacing="0" cellpadding="2">
  <tbody>
    <tr>
      <td colspan="5" style="background-color:hsla(194,11%,63%,0.5); color: #000; text-align: center;"><b>SUBSTITUIÇÕES</b></td>
    </tr>
    
    <tr>
      <td width="17%" style="text-align: center">Tempo</td>
      <td width="9%" style="text-align: center">1T/2T</td>
      <td width="28%" style="text-align: center">Equipe</td>
      <td width="23%" style="text-align: center">Entrou</td>
      <td width="23%" style="text-align: center">Saiu</td>  
    </tr>
    
    <tr style="background-color: hsla(0,0%,64%,0.1)">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td>      
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td> 
    </tr>
    <tr style="background-color: hsla(0,0%,64%,0.1)">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td>      

    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td> 
    </tr>
    <tr style="background-color: hsla(0,0%,64%,0.1)">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td>      
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td> 
    </tr>
    <tr style="background-color: hsla(0,0%,64%,0.1)">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td>      
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td> 
    </tr>
    <tr style="background-color: hsla(0,0%,64%,0.1)">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td>      
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td> 
    </tr>
    <tr style="background-color: hsla(0,0%,64%,0.1)">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td>      

    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td> 
    </tr>
    
    
    
  </tbody>
</table>-->
<br>

  </page>

<?/*
<page size="A4">
  
  <!-- JOGADORES ADVERTIDOS -->
<table width="98%" border="1" cellspacing="0" cellpadding="0">
  <tbody>
   <tr>
     <td colspan="10" style="background-color:hsla(194,11%,63%,0.5); color: #000; text-align: center;"><b>JODADORES ADVERTIDOS COM CARTÃO AMARELO E/OU EXPULSOS</b></td>
   </tr>
    <tr>
      <td width="4%" height="38" rowspan="3" style="text-align: center">Nº</td>
      <td width="31%" rowspan="3" style="text-align: center">Nome dos Jogadores</td>
      <td width="4%" rowspan="3" style="text-align: center">CA</td>
      <td colspan="2" rowspan="2" style="text-align: center">CV</td>
      <td width="4%" height="38" rowspan="3" style="text-align: center">Nº</td>
      <td width="31%" rowspan="3" style="text-align: center">Nome dos Jogadores</td>
      <td width="4%" rowspan="3" style="text-align: center">CA</td>
      <td colspan="2" style="text-align: center">CV</td>
    </tr>
    <tr>
      <td width="6%" rowspan="2" style="text-align: center">2ºCA</td>
      <td width="5%" rowspan="2" style="text-align: center">CVD</td>
    </tr>
    <tr>
      <td width="6%" style="text-align: center">2ºCA</td>
      <td width="5%" style="text-align: center">CVD</td>
      </tr>
      
    <tr style="background-color: hsla(0,0%,64%,0.1)">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td>       
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td>       
    </tr>
    <tr style="background-color: hsla(0,0%,64%,0.1)">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td>       
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td>       
    </tr>
    <tr style="background-color: hsla(0,0%,64%,0.1)">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td>       
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td>       
    </tr>
    <tr style="background-color: hsla(0,0%,64%,0.1)">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td>       
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td>       
    </tr>
    <tr style="background-color: hsla(0,0%,64%,0.1)">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>  
      <td>&nbsp;</td>       
    </tr>

  </tbody>
</table>

<br>

  <!-- RELATÓRIO DO ÁRBITRO -->
<table width="98%" border="1" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td style="background-color:hsla(194,11%,63%,0.5); color: #000; text-align: center;"><b>EXPULSÕES E/OU INCIDENTES, CONDUTAS, SERVIÇOS E OUTROS</b></td>
    </tr>
    <tr>
      <td>
      <p style="font-size: 12px; text-align: justify;">Ocorrendo expulsões de jogadores relatar na mesma ordem utilizada para as advertências, ou seja, período(1T/2T), minuto, código da expulsão, nº do jogador, equipe e os motivos. A descrição deve ser objetiva e os motivos expostos de forma clara. Outras anormalidades devem ser mencionadas, tais como: estado das instalações (árbitros e jogadores), gramado, iluminação, conduta dos jogadores, integrantes das comissões técnicas, atuação dos gandulas, do público, policiamento, serviço médico, inclusive ambulância, segurança. Infomar quando não ocorrer pagamento das despesas da arbitragem e outros fatos dignos de registro. Se houver necessidade de complementar este relatório elaborar documento adicional e enviar como anexo.</p>

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
    <br>
   
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
      <td style="text-align: center">Capitão da Equipe <b>A</b></td>
      <td style="text-align: center">Árbitro</td>
      <td style="text-align: center">Capitão da Equipe <b>B</b></td>
    </tr>
  </tbody>
</table>


</page>
*/ ?>
    <?/*
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
      <td style="background-color:hsla(194,11%,63%,0.5); color: #000; text-align: center;"><b>RELATÓRIO DO OBSERVADOR DA PARTIDA</b></td>
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
      <td style="text-align: center">Nome Completo</td>
      <td style="text-align: center">CPF</td>
      <td style="text-align: center">Assinatura</td>
    </tr>
  </tbody>
</table>


</page>

*/ ?>

  <?php unset($comissao);
  } ?>



</body>

</html>

<script>
  window.print();
</script>