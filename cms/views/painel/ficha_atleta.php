<?php session_start(); ?>
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

  <link href="https://www.ligataubate.com.br/cms/assets/css/style-ficha.css" rel="stylesheet">

  <?php foreach ($inscricoes as $inscricao) { ?>
    <page size="A4">

      <div class="topo">

        <div style="margin: 0 auto; padding: 20px; width: 90%; height: 100px;">

          <div style="width: 20%; float: left; text-align: center; padding-left: 20px;">
            <img src="https://www.ligataubate.com.br/cms/assets/images/logotipo.png" alt="Liga de Taubaté" width="100px">
          </div>

          <div style="width: 70%;float: left; padding-left:10px; font-size: 25px; font-weight: bold; line-height: 30px; text-align: center; padding-top: 20px;">
            LIGA MUNICIPAL DE FUTEBOL DE TAUBATÉ
          </div>

          <!-- <div style="width: 70%;float: left; padding-left:10px; font-size: 14px; font-weight: 500; line-height: 30px; text-align: center">
			Filiada à F.P.F - Rodoviária Velha - Sala 4 - CNPJ 60.125.101/0001-10
			</div> -->


        </div>

      </div>

      <div style="margin: 0 auto; padding: 10px; width: 90%; height: auto;">
        <h2 style="text-align: left"> FICHA DE INSCRIÇÃO DE ATLETA </h2>
      </div>

      <div style="padding: 10px; width: 95%; height: 0px; z-index: 9999">

        <div style="width: 4cm; height: 5cm; float: right; margin-right: 30px; margin-bottom: -320px; margin-top: -130px; border: 1px solid; border-radius: 5px;">

          <?php if ($inscricao["foto"] != "") { ?>
            <img src="https://www.ligataubate.com.br/cms/assets/images/atletas/<?php echo $inscricao["foto"]; ?>?<?php echo md5(time()); ?>" width="100%" height="100%" />
          <?php } else { ?>

            <div style="padding:80px 60px"> 3X4 </div>

          <?php } ?>
        </div>

      </div>

      <table width="95%" border="0" cellspacing="0" cellpadding="9" style="margin-top: -25px;">
        <tbody>

          <tr>
            <td colspan="6" class="borda-linha"><b>Campeonato:</b> <?php echo $inscricao["campeonato_nome"]; ?>

            </td>

          </tr>

          <tr>
            <td class="borda-linha"><b>Clube Filiado:</b> <?php echo $clube["nome"]; ?></td>

            <td colspan="5" class="borda-linha">&nbsp;</td>
          </tr>

          <tr>
            <td class="borda-linha" colspan="4"><b>Nome do Atleta:</b> <?php echo $inscricao["nome"]; ?> </td>
            <td colspan="2" class="borda-linha"><b>Contato:</b> <?php echo $inscricao["celular"]; ?> </td>
          </tr>
          <tr>
            <td class="borda-linha" colspan="4"><b>Apelido:</b> <?php echo $inscricao["apelido"]; ?> </td>
          </tr>

          <tr>
            <td colspan="2" class="borda-linha"><b>Data de Nascimento:</b> <?php echo date('d/m/Y', strtotime($inscricao["nascimento"])); ?> </td>
            <td colspan="2" class="borda-linha"><b>Natural de:</b> <?php echo $inscricao["natural_cidade"]; ?> </td>
            <td colspan="2" class="borda-linha"><b>Estado:</b> <?php echo $inscricao["natural_estado"]; ?> </td>
          </tr>

          <tr>
            <td colspan="2" class="borda-linha"><b>RG:</b> <?php echo $inscricao["rg"]; ?></td>
            <td colspan="4" class="borda-linha"><b>CPF:</b> <?php echo $inscricao["cpf"]; ?></td>
          </tr>

          <tr>
            <td colspan="6" class="borda-linha"><b>Endereço:</b> <?php echo $inscricao["endereco"]; ?> </td>
          </tr>
          <tr>
            <td colspan="6" class="borda-linha"> <b> Bairro: </b> <?php echo $inscricao["bairro"]; ?> - <?php echo $inscricao["cidade"]; ?>/<?php echo $inscricao["estado"]; ?> </td>
          </tr>

          <tr>
            <td colspan="6" class="borda-linha"><b> Cep: </b> <?php echo $inscricao["cep"]; ?> </td>
          </tr>



          <tr>
            <td class="borda-linha" colspan="6"><b>Nome do Pai:</b> <?php echo $inscricao["nome_pai"]; ?></td>
          </tr>

          <tr>
            <td class="borda-linha" colspan="6"><b>Nome da Mãe:</b> <?php echo $inscricao["nome_mae"]; ?></td>
          </tr>

          <tr>
            <td colspan="3" class="borda-linha"><b>Vem solicitar sua inscrição para temporada de </b> <?php echo $inscricao["temporada"]; ?></td>
            <td colspan="3" class="borda-linha">&nbsp;</td>
          </tr>

          <tr>
            <td colspan="6" style="text-align: justify;">
              Autorizo a divulgação de minha imagem nas diferentes mídias das quais a Liga Municipal de Futebol de Taubaté fizer uso, seja por foto, vídeo, entrevistas e/ou outro meio de divulgação.

            </td>
          </tr>


          <tr>
            <td colspan="3">&nbsp;</td>
            <td colspan="3">&nbsp;</td>
          </tr>

          <tr>
            <td colspan="2">&nbsp;</td>
            <!-- <td colspan="4" class="assinatura-atleta"><b>Assinatura do Atleta</b></td> -->
            <td colspan="4" class="assinatura-atleta"><b>
              Assinatura do 
              <?php 
              switch($inscricao["funcao"]) {
                case "Atleta":
                  echo "Atleta";
                  break;
                case "Auxiliar Técnico":
                  echo "Auxiliar Técnico";
                  break;
                case "Técnico":
                  echo "Técnico";
                  break;
                case "Massagista":
                  echo "Massagista";
                  break;
                case "Preparador Físico":
                  echo "Preparador Físico";
                  break;
                default:
                  echo "";
                  break;
              }
           
              
              ?>
            </b>
          </td>

          </tr>

          <tr>
            <td colspan="6" style="text-align: justify;">Responsabilizo-me pela veracidade das informações constantes deste formulário, pela identidade do atleta acima por serem verdadeiros, atesto ainda a <b><i>fotografia</i></b> é a do atleta, cujo inscrição esta sendo solicitada.

            </td>
          </tr>


          <tr>
            <td colspan="3">&nbsp;</td>
            <td colspan="3">&nbsp;</td>
          </tr>

          <tr>
            <td colspan="2">&nbsp;</td>
            <td colspan="4" class="assinatura-atleta"><b>Assinatura do Presidente ou Diretor do Clube</b></td>
          </tr>

          <tr>
            <td colspan="6" style="text-align: justify;">

              <span style="visibility:<?php verifica_idade($inscricao["nascimento"], $inscricao["atleta_id"]); ?>">

                Eu, _______________________________________________________________ , RG: ________________________________, autorizo meu filho Data de Nascimento: <?php echo date('d/m/Y', strtotime($inscricao["nascimento"])); ?> e RG: <?php echo $inscricao["rg"]; ?>, filiado a Liga Municipal de Futebol de Taubaté, a disputar o campeonato, na Cidade de Taubaté/SP.

              </span>

            </td>
          </tr>

          <tr>
            <td colspan="3">&nbsp;</td>
            <td colspan="3">&nbsp;</td>
          </tr>

          <tr>
            <td colspan="2">&nbsp;</td>
            <td colspan="4" class="assinatura-atleta" style="visibility:<?php verifica_idade($inscricao["nascimento"], $inscricao["atleta_id"]); ?>">

              <span style="visibility:<?php verifica_idade($inscricao["nascimento"], $inscricao["atleta_id"]); ?>">

                <b>Assinatura do Responsável</b>
            </td>

            </span>


          </tr>

          <tr>
            <td colspan="6" style="text-align: justify; font-size: .65rem;">A FALSIFICAÇÃO DE ASSINATURA IMPLICA NO CRIME DE FALSIFICAÇÃO DE DOCUMENTO NOS TERMOS DO ART 297 E 298 DO CP, COM PENA DE RECLUSÃO DE 1 À 5 ANOS E MULTA PARA O INFRATOR.</td>
          </tr>

          <tr>
            <td colspan="3"> <i> Em Taubaté, <?php echo date('d'); ?> de <?php echo mes(date('m')); ?> de <?php echo date('Y'); ?>.</i></td>
          </tr>

        </tbody>
      </table>

    </page>

    <page size="A4">

      <table width="95%" border="0" cellspacing="0" cellpadding="10">
        <thead>
          <tr>
            <td>
              <h2 style="text-align: center"> Questionário de prontidão para Atividade Física (PAR-Q)</h2>
            </td>
          </tr>
          <tr>
            <td>
              <p style="font-size: 12px">
                Este questionário tem o objetivo de identificar a necessidade de avaliação por um médico antes do inicio da atividade física. Caso você responda "SIM" a uma ou mais perguntas, converse com seu médico
                ANTES de aumentar seu nível atual de atividade física. Mencione este questionário e as perguntas as quais você respondeu "SIM"
              </p>
            </td>
          </tr>
        </thead>
        <tbody style="margin-top: -12px">
          <tr>
            <td>
              <p>Por Favor, assinale <strong>"SIM"</strong> ou <strong>"NÃO"</strong> para as seguintes perguntas</p>
            </td>
          </tr>
          <tr>
            <td>
              <p>1 - Algum médico já disse que você possui algum problema do coração e que só deveria praticar
                atividade fisica supervisionada por profissionais de saúde?</p>
              <span>(&nbsp;&nbsp;&nbsp;) SIM</span> <span>(&nbsp;&nbsp;&nbsp;) NÃO</span>
            </td>
          </tr>
          <tr>
            <td>
              <p>2 - Você sente dores no peito quando pratica atividade física?
                atividade fisica supervisionada por profissionais de saúde?</p>
              <span>(&nbsp;&nbsp;&nbsp;) SIM</span> <span>(&nbsp;&nbsp;&nbsp;) NÃO</span>
            </td>
          </tr>
          <tr>
            <td>
              <p>3 - No ultimo mês você sentiu dores no peito quando praticou atividade física?</p>
              <span>(&nbsp;&nbsp;&nbsp;) SIM</span> <span>(&nbsp;&nbsp;&nbsp;) NÃO</span>
            </td>
          </tr>
          <tr>
            <td>
              <p>4 - Você apresenta desequilíbrio devido à tontura e/ou perda de consciência?</p>
              <span>(&nbsp;&nbsp;&nbsp;) SIM</span> <span>(&nbsp;&nbsp;&nbsp;) NÃO</span>
            </td>
          </tr>
          <tr>
            <td>
              <p>5 - Você possui algum problema ósseo ou articular que poderia ser piorado pela atividade física?</p>
              <span>(&nbsp;&nbsp;&nbsp;) SIM</span> <span>(&nbsp;&nbsp;&nbsp;) NÃO</span>
            </td>
          </tr>
          <tr>
            <td>
              <p>6 - Você toma atualmente algum medicamento para pressão arterial e/ou problema do coração?</p>
              <span>(&nbsp;&nbsp;&nbsp;) SIM</span> <span>(&nbsp;&nbsp;&nbsp;) NÃO</span>
            </td>
          </tr>
          <tr>
            <td>
              <p>7 - Sabe de alguma outra razão pela qual você não deve praticar atividade física?</p>
              <span>(&nbsp;&nbsp;&nbsp;) SIM</span> <span>(&nbsp;&nbsp;&nbsp;) NÃO</span>
            </td>
          </tr>
          <tr>
            <td>
              Se você respondeu "sim" para mais de um alternativa, leia e assine o termo de responsabilidade para pratica de atividade física.
            </td>
          </tr>
          <tr>
            <td>
              <strong style="font-size: 12px">
                Termo de responsabilidade para pratica de atividade física e participação nos campeonatos realizados em <?php echo date('Y'); ?> pela Liga Municipal de Futebol de Taubaté.
              </strong>
            </td>
          </tr>
          <tr>
            <td>
              <p style="font-size: 12px">
                Estou ciente de que é recomendável conversar com um médico antes de aumentar meu nível atual de pratica de atividade física, por ter respondido SIM a uma ou mais perguntas do "Questionário de prontidão para Atividade física" (PAR-Q). Assumo plena responsabilidade por qualquer atividade física praticada e na participação dos campeonatos realizados em <?php echo date('Y'); ?> pela Liga Municipal de Futebol de Taubaté sem o atendimento a essa recomendação.
              </p>
            </td>
          </tr>
          <tr>
            <td>
              <p>Nome completo:</p> <span>_________________________________________________</span>
            </td>
          </tr>
          <tr>
            <td>
              <p>Data de nascimento:</p> <span>____/_____/________</span>
            </td>
          </tr>
          <tr>
            <td>
              <p>Assinatura:</p> <span>__________________________________________</span>
            </td>

          </tr>
          <tr>
            <td>
              <p>Data</p> <span>____/_____/________</span>
            </td>
          </tr>
          <tr>
            <td> <i> Em Taubaté, <?php echo date('d'); ?> de <?php echo mes(date('m')); ?> de <?php echo date('Y'); ?>.</i></td>
          </tr>
        </tbody>

      </table>


    </page>

  <?php } ?>


  <?php

  function verifica_idade($data, $atleta)
  {

    // Separa em dia, mês e ano
    list($ano, $mes, $dia) = explode('-', $data);

    // Descobre que dia é hoje e retorna a unix timestamp
    $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
    // Descobre a unix timestamp da data de nascimento do fulano
    $nascimento = mktime(0, 0, 0, $mes, $dia, $ano);

    // Depois apenas fazemos o cálculo já citado :)
    $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

    if ($idade < 18) {
      echo "visible";
    } else {
      echo "hidden";
    }
  }

  function mes($data)
  {
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

    echo $mes[$data];
  }

  ?>

  <script>
    print();
  </script>