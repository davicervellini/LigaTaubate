<?php if (isset($_SESSION["msg"])) { ?>
  <div style="color: white; font-size: 1.5rem; font-weight: bold; padding: 2rem; background: red;"> <?php echo $_SESSION["msg"]; ?> </div>
<?php unset($_SESSION["msg"]);
} ?>

<?php if (isset($_SESSION["msg_erro_cpf"])) { ?>
  <div style="color: white; font-size: 1.5rem; font-weight: bold; padding: 2rem; background: red;"> <?php echo $_SESSION["msg_erro_cpf"]; ?> </div>
<?php unset($_SESSION["msg_erro_cpf"]);
} ?>

<?php if (isset($_SESSION["msg_erro_limit_tec"])) { ?>
  <div style="color: white; font-size: 1.5rem; font-weight: bold; padding: 2rem; background: red;"> <?php echo $_SESSION["msg_erro_limit_tec"]; ?> </div>
<?php unset($_SESSION["msg_erro_cpf"]);
} ?>

<?php if (isset($_SESSION["msg_erro_limit_atlet"])) { ?>
  <div style="color: white; font-size: 1.5rem; font-weight: bold; padding: 2rem; background: red;"> <?php echo $_SESSION["msg_erro_limit_atlet"]; ?> </div>
<?php unset($_SESSION["msg_erro_cpf"]);
} ?>

<?php if (isset($_SESSION["msg_erro_limit_aux"])) { ?>
  <div style="color: white; font-size: 1.5rem; font-weight: bold; padding: 2rem; background: red;"> <?php echo $_SESSION["msg_erro_limit_aux"]; ?> </div>
<?php unset($_SESSION["msg_erro_cpf"]);
} ?>

<?php if (isset($_SESSION["msg_erro_limit_mass"])) { ?>
  <div style="color: white; font-size: 1.5rem; font-weight: bold; padding: 2rem; background: red;"> <?php echo $_SESSION["msg_erro_limit_mass"]; ?> </div>
<?php unset($_SESSION["msg_erro_cpf"]);
} ?>

<?php if (isset($_SESSION["msg_erro_limit_prep"])) { ?>
  <div style="color: white; font-size: 1.5rem; font-weight: bold; padding: 2rem; background: red;"> <?php echo $_SESSION["msg_erro_limit_prep"]; ?> </div>
<?php unset($_SESSION["msg_erro_cpf"]);
} ?>

<?php if (isset($_SESSION["msg_cpf_invalido"])) { ?>
  <div style="color: white; font-size: 1.5rem; font-weight: bold; padding: 2rem; background: red;"> <?php echo $_SESSION["msg_cpf_invalido"]; ?> </div>
<?php unset($_SESSION["msg_erro_cpf"]);
} ?>



<?php
$atletas = new atletas();

if (isset($_GET['publishBID'])) {
  $atletas->publishBID($_GET['atleta_id'], $_GET['status'], $_GET['campeonato_id'], $_GET['clube_id']);
?>
  <script>
    window.location.href = 'https://www.ligataubate.com.br/cms/painel/atleta_add/0/' + <?= $_GET['atleta_id']; ?>
  </script>
<?php
}

if (isset($_GET['hideAllBID'])) {
  $atletas->hideAllPersonBID($_GET['atleta_id']);
?>
  <script>
    window.location.href = 'https://www.ligataubate.com.br/cms/painel/atleta_add/0/' + <?= $_GET['atleta_id']; ?>
  </script>
<?php
}
?>

<!--
  MASCARA DE ENTRADA
-->
<script>
  jQuery(function($) {

    $("#nascimento").mask("99/99/9999");
    $("#cref").mask("999999-A/AA");
    $("#cpf").mask("999.999.999-99");
    $("#cep").mask("99999-999");
    $("#celular").mask("99999-9999");

  });
</script>

<!-- TITULO DA PÁGINA -->
<h3 class="page-title">ATLETAS <small><i class="fa fa-angle-double-right"></i> Cadastro de Atletas </small>



  <?php if ($atleta_id != 0) { ?>


    <span style="float:right">

      <select name="insricao" id="inscricao">

        <option value=""> Inscrições ativas </option>

        <?php foreach ($inscricao_info as $insc) { ?>

          <option value="<?php echo $insc["clube_id"]; ?>/<?php echo $insc["campeonato_id"]; ?>/<?php echo $insc["atleta_id"]; ?>"> <?php echo $insc["campeonato_nome"]; ?> / <?php echo $insc["temporada"]; ?> - <?php echo $insc["clube_nickname"]; ?></option>

        <?php } ?>

      </select>


      <a target="_blank" onclick="javascript: if(inscricao.value!=''){window.open('<?php BASE; ?>/cms/painel/inscricao/'+inscricao.value);}else{return false;}"> Ficha </a>

      <?php if ((string)$_SESSION['email'] == 'presidente@ligataubate.com.br' || (string)$_SESSION['email'] == 'leonardosoareszuin@gmail.com') { ?>
        |

        <a target="_blank" onclick="javascript: if(inscricao.value!=''){window.open('<?php BASE; ?>/cms/painel/carteirinha/'+inscricao.value);}else{return false;}"> Carteirinha </a>

        |

        <a target="_blank" onclick="javascript: if(inscricao.value!=''){ f=window.confirm('Deseja realmente remover esta inscrição?'); if(f==true){ window.location = '<?php BASE; ?>/cms/painel/inscricao/'+inscricao.value+'/remover' ;}else{return false;}} else{ return false; }"> Remover </a>

      <?php } ?>

    </span>
  <?php } ?>

</h3>

<div class="row">
  <div class="col-md-10">

    <!-- BEGIN VALIDATION STATES-->
    <div class="portlet light portlet-fit portlet-form bordered">
      <div class="portlet-title">
        <div class="caption">
          <i class=" icon-layers font-green"></i>
          <span class="caption-subject font-green sbold uppercase">Cadastro de Atletas</span>
        </div>
      </div>

      <div class="portlet-body">

        <!-- INICIO DO FORMULÁRIO-->
        <form class="form-horizontal" id="form_atleta" method="post" enctype="multipart/form-data" action="atleta_add">
          <input type="hidden" name="atleta_id" value="<?php echo $atleta_id; ?>" />

          <div class="form-body">
            <div class="alert alert-danger display-hide">
              <button class="close" data-close="alert"></button> Você tem alguns erros de formulário. Por favor verifique abaixo.
            </div>
            <div class="alert alert-success display-hide">
              <button class="close" data-close="alert"></button> A validação do formulário é bem-sucedida!
            </div>

            <!-- CAMPOS DO FORMULÁRIO -->

            <?php $URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>

            <?php if ($atleta_id != 0 && ((string)$_SESSION['email'] == 'presidente@ligataubate.com.br') || (string)$_SESSION['email'] == 'leonardosoareszuin@gmail.com') {

              $lastBID = $atletas->getBIDByPersonID($atleta_id);
              if ($lastBID) {
                $bid_data_atualizacao = $lastBID['data_atualizacao'];
                $bid_status = $lastBID['status'];

                if ($lastBID['status'] == 0) $bid_status = "INAPTO";
                else if ($lastBID['status'] == 1) $bid_status = "ATIVO";
                else if ($lastBID['status'] == 2) $bid_status = "LIBERADO";
                else if ($lastBID['status'] == 3) $bid_status = "TRAVADO";
                else if ($lastBID['status'] == 4) $bid_status = "SUSPENSO CDD";
                else if ($lastBID['status'] == 5) $bid_status = "FOTO FORA DO PADRÃO";
                else if ($lastBID['status'] == 6) $bid_status = "AGUARDANDO INSCRIÇÃO FPF";
              } else {
                $bid_data_atualizacao = "Nunca publicado";
                $bid_status = "Nenhuma";
              }

            ?>
              <div class="form-group form-md-line-input">
                <label class="col-md-2 control-label"><b>Publicação no BID</b></label>
                <div class="col-md-3">
                  <select class="form-control" id="campeonato_id_bid">
                    <option value="" selected>Selecione inscrição</option>
                    <?php foreach ($inscricao_info as $insc) { ?>
                      <option value="<?php echo $insc["campeonato_id"]; ?>/<?php echo $insc["clube_id"]; ?>"> <?php echo $insc["campeonato_nome"]; ?> / <?php echo $insc["temporada"]; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-md-2">
                  <select class="form-control" id="bid_status">
                    <option value="" selected>Selecione situação</option>
                    <option value="1">APTO</option>
                    <option value="0">INAPTO</option>
                    <option value="2">LIBERADO</option>
                    <option value="3">TRAVADO</option>
                    <option value="4">SUSPENSO CDD</option>
                    <option value="5">FOTO FORA DO PADRÃO</option>
                    <option value="6">AGUARDANDO INSCRIÇÃO FPF</option>

                  </select>
                </div>
                <div class="col-md-2">
                  <button type="button" class="dt-button buttons-print btn dark" onclick="publishBID()">Publicar agora</button>
                </div>
                <div class="col-md-3">
                  <label>Última publicação em: <?= $bid_data_atualizacao; ?> - Situação: <?= $bid_status; ?> - <?= $lastBID['exibir_publico'] ? "Visível" : "Oculto" ?></label>
                </div>

                <input type="hidden" id="bid_atleta_id" value="<?= $atleta_id; ?>" />
              </div>
              <div class="form-group form-md-line-input">
                <label class="col-md-2 control-label"><b>Ocultar BID</b></label>

                <div class="col-md-2">
                  <button type="button" class="dt-button buttons-print btn dark" onclick="hideBID()">Ocultar todos os registros</button>
                </div>
              </div>
            <?php } ?>

            <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="cpf">
                <span class="required">*</span> CPF :
              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" placeholder="111.222.333-44" name="cpf" id="cpf" value="<?php echo $cpf; ?>" <?php if (isset($cpf) && $cpf != "") {
                                                                                                                                        echo "disabled";
                                                                                                                                      } ?> required /> <span id="status_atleta"></span>
                <div class="form-control-focus"> </div>
                <span class="help-block">Informe o CPF sem números e traços.</span>
              </div>
            </div>


            <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="funcao">
                <span class="required">*</span> Função :
              </label>
              <div class="col-md-9">
                <select class="form-control" name="funcao" id="funcao" required style="text-transform: uppercase" onchange="verifica_funcao(this.value)">

                  <?php if (isset($funcao) && $funcao != "") { ?>
                    <option value="<?php echo $funcao; ?>" selected='selected'> <?php echo $funcao; ?> </option>

                  <?php } else { ?>
                    <option value='' selected='selected'> --- Selecione a função --- </option>
                  <?php } ?>
                  <?php
                  if (isset($funcao))
                  ?>

                  <option value="Técnico">Técnico</option>
                  <option value="Auxiliar Técnico">Auxiliar Técnico</option>
                  <option value="Massagista">Massagista</option>
                  <option value="Preparador Físico">Preparador Físico</option>
                  <option value="Atleta">Atleta</option>

                </select>
                <div class="form-control-focus"></div>
                <span class="help-block"></span>
              </div>
            </div>

            <p align="right"><input type="button" onclick="verifica_atleta(cpf.value,funcao.value,'<?php echo $URL_ATUAL; ?>')" class="dt-button buttons-print btn dark btn-outline" value="Verificar cadastro" /></p>





            <div class="form-group form-md-line-input">

              <label class="col-md-3 control-label" for="nome">
                <span class="required">*</span> Nome :
              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $nome; ?>" style="text-transform: uppercase" required />
                <div class="form-control-focus"> </div>
                <span class="help-block">Informe o nome completo.</span>
              </div>
            </div>

            <div class="form-group form-md-line-input">

              <label class="col-md-3 control-label" for="nome">
                <span class="required">*</span> Apelido:
              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="apelido" id="apelido" value="<?php echo $apelido; ?>" style="text-transform: uppercase" required />
                <div class="form-control-focus"> </div>
                <span class="help-block">Informe o apelido.</span>
              </div>
            </div>

            <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="nascimento">
                <span class="required">*</span> Nascimento :
              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" placeholder="dd/mm/aaaa" name="nascimento" id="nascimento" value="<?php if ($nascimento !== '') : echo $nascimento;
                                                                                                                          endif; ?>" required />
                <div class="form-control-focus"></div>
                <span class="help-block">Informe a data no formato dd/mm/aaaa</span>
              </div>
            </div>





            <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="foto">Foto (3x4) :</label>
              <div class="col-md-9">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                  <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 250px;">
                    <?php if (isset($foto) && $foto != "") { ?>
                      <img src="<?php echo BASE; ?>assets/images/atletas/<?php echo $foto; ?>?<?php echo md5(time()); ?>" width="200" />
                      <input type="hidden" name="foto_id" value="<?php echo $foto; ?>" />
                    <?php } ?>
                  </div>

                  <?php if ($atleta_id != 0) { ?>
                    <a align="left" href="<?php echo BASE; ?>/painel/atleta_add/<?php echo $clube_info["clube_id"]; ?>/<?php echo $atleta_id; ?>/<?php echo $foto; ?>"> Girar imagem </a>
                  <?php } ?>
                  <div>

                    <span class="btn red btn-outline btn-file">
                      <span class="fileinput-new"> Selecionar Imagem </span>
                      <span class="fileinput-exists"> Alterar Imagem </span>
                      <?php if ($atleta_id != 0) { ?>
                        <input type="file" name="foto" id="foto" onchange="alert('Aguarde até o carregamento da imagem');form_atleta.submit();">
                      <?php } else { ?>
                        <input type="file" name="foto" id="foto">
                      <?php } ?>
                    </span>
                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remover Imagem </a>
                  </div>
                </div>

              </div>



            </div>



            <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="clube_id">
                <span class="required">*</span> Clube vinculado :
              </label>
              <div class="col-md-9">
                <select class="form-control" name="clube_id" id="clube_id" style="text-transform: uppercase" required>
                  <?php if (isset($clube_info["clube_id"]) && $clube_info["clube_id"] != "") { ?>
                    <option value="<?php echo $clube_info["clube_id"]; ?>"> <?php echo $clube_info["nome"]; ?> </option>
                  <?php } else { ?>
                    <option value=""> --- Selecione o clube --- </option>
                  <?php } ?>

                  <?php if (is_array($clubes[0])) { ?>
                    <?php foreach ($clubes as $clube) { ?>
                      <option value="<?php echo $clube["clube_id"]; ?>"> <?php echo $clube["nome"]; ?> </option>
                    <?php } ?>
                  <?php } ?>
                </select>
                <div class="form-control-focus"></div>
              </div>
            </div>

            <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="campeonato_id">
                <?php
                if ($atleta_id) {
                ?>
                  Adicionar Campeonato :
                <?php
                } else {
                ?>
                  <span class="required">*</span> Campeonato :
                <?php
                }
                ?>
              </label>
              <div class="col-md-9">
                <?php
                $included_camps = array();
                if ($atleta_id) {
                ?>
                  <h4>Campeonatos já inclusos:</h4>
                  <?php
                  foreach ($inscricao_info as $inscricao_info_item) {
                    array_push($included_camps, $inscricao_info_item["campeonato_id"]);

                  ?>
                    <h5>- <?php echo $inscricao_info_item["campeonato_nome"]; ?> - Clube: <?php echo $inscricao_info_item["clube_nickname"]; ?></h5>
                <?php
                  }
                }
                ?>
                <select class="form-control" name="campeonato_id" id="campeonato_id" style="text-transform: uppercase" <?php if (!$atleta_id) echo 'required'; ?>>
                  <option selected>- Selecione -</option>
                  <?php foreach ($campeonatos as $campeonato) {
                    if (
                      $campeonato["temporada"] == date('Y') &&
                      $campeonato["status"] != 0 &&
                      !in_array($campeonato["campeonato_id"], $included_camps)
                    ) {
                  ?>
                      <option value="<?php echo $campeonato["campeonato_id"]; ?>"> <?php echo $campeonato["nome"]; ?> </option>
                  <?php }
                  } ?>
                </select>
                <div class="form-control-focus"></div>
              </div>
            </div>


            <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="estrangeiro">
                <span class="required"></span>
              </label>
              <div class="col-md-9">
                <input type="checkbox" name="estrangeiro" id="estrangeiro" onclick="muda_campo()" /> <label for="estrangeiro"> Estrangeiro </label>
                <div class="form-control-focus"></div>
                <span class="help-block"></span>
              </div>
            </div>

            <script language="javascript">
              function muda_campo() {


                if (document.getElementById("estrangeiro").checked == true) {
                  document.getElementById('natural').innerHTML = '<input type="text" class="form-control" name="natural_estado" id="natural_estado" />';
                } else {
                  document.getElementById('natural').innerHTML = '<select class="form-control" name="natural_estado" id="natural_estado" required style="text-transform:uppercase;"><option value=""> --- Selecione o estado --- </option><option value="Acre">Acre</option><option value="Alagoas">Alagoas</option><option value="Amapá">Amapá</option><option value="Amazonas">Amazonas</option> <option value="Bahia">Bahia</option> <option value="Ceará">Ceará</option><option value="Distrito Federal">Distrito Federal</option><option value="Espírito Santo">Espírito Santo</option> <option value="Goiás">Goiás</option><option value="Maranhão">Maranhão</option><option value="Mato Grosso">Mato Grosso</option><option value="Mato Grosso do Sul">Mato Grosso do Sul</option><option value="Minas Gerais">Minas Gerais</option><option value="Pará">Pará</option><option value="Paraíba">Paraíba</option><option value="Paraná">Paraná</option><option value="Pernambuco">Pernambuco</option><option value="Piauí">Piauí</option><option value="Rio de Janeiro">Rio de Janeiro</option><option value="Rio Grande do Norte">Rio Grande do Norte</option><option value="Rio Grande do Sul">Rio Grande do Sul</option><option value="Rondônia">Rondônia</option><option value="Roraima">Roraima</option><option value="Santa Catarina">Santa Catarina</option><option value="São Paulo">São Paulo</option><option value="Sergipe">Sergipe</option><option value="Tocantins">Tocantins</option></select>';
                }

              }
            </script>


            <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="natural_cidade">
                <span></span> E-mail:
              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>" />
                <div class="form-control-focus"></div>
                <span class="help-block">Informe o e-mail do atleta.</span>
              </div>
            </div>


            <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="natural_cidade">
                <span></span> Celular :
              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="celular" id="celular" value="<?php echo $celular; ?>" />
                <div class="form-control-focus"></div>
                <span class="help-block">Informe o celular do atleta.</span>
              </div>
            </div>


            <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="natural_cidade">
                <span class="required">*</span> Cidade (Naturalidade) :
              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="natural_cidade" id="natural_cidade" value="<?php echo $natural_cidade; ?>" style="text-transform: uppercase" required />
                <div class="form-control-focus"></div>
                <span class="help-block">Informe a cidade natal do atleta.</span>
              </div>
            </div>

            <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="natural_estado">
                <span class="required">*</span> Estado (UF) :
              </label>
              <div class="col-md-9" id="natural">
                <select class="form-control" name="natural_estado" id="natural_estado" required style="text-transform:uppercase;">
                  <option value=""> --- Selecione o estado --- </option>
                  <option value="<?php echo $natural_estado; ?>" selected="selected"><?php echo $natural_estado; ?></option>
                  <option value="Acre">Acre</option>
                  <option value="Alagoas">Alagoas</option>
                  <option value="Amapá">Amapá</option>
                  <option value="Amazonas">Amazonas</option>
                  <option value="Bahia">Bahia</option>
                  <option value="Ceará">Ceará</option>
                  <option value="Distrito Federal">Distrito Federal</option>
                  <option value="Espírito Santo">Espírito Santo</option>
                  <option value="Goiás">Goiás</option>
                  <option value="Maranhão">Maranhão</option>
                  <option value="Mato Grosso">Mato Grosso</option>
                  <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                  <option value="Minas Gerais">Minas Gerais</option>
                  <option value="Pará">Pará</option>
                  <option value="Paraíba">Paraíba</option>
                  <option value="Paraná">Paraná</option>
                  <option value="Pernambuco">Pernambuco</option>
                  <option value="Piauí">Piauí</option>
                  <option value="Rio de Janeiro">Rio de Janeiro</option>
                  <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                  <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                  <option value="Rondônia">Rondônia</option>
                  <option value="Roraima">Roraima</option>
                  <option value="Santa Catarina">Santa Catarina</option>
                  <option value="São Paulo">São Paulo</option>
                  <option value="Sergipe">Sergipe</option>
                  <option value="Tocantins">Tocantins</option>
                </select>
                <div class="form-control-focus"></div>
                <span class="help-block"></span>
              </div>
            </div>

            <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="rg">
                <span class="required">*</span> RG :
              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" placeholder="11.222.333-A" maxlength="12" name="rg" id="rg" value="<?php echo $rg; ?>" <?php if (isset($rg) && $rg != "") {
                                                                                                                                                  echo "disabled";
                                                                                                                                                } ?> required />
                <div class="form-control-focus"></div>
                <span class="help-block">Informe o RG.</span>
              </div>
            </div>



            <div class="form-group form-md-line-input" <?php if ($cref == "") { ?>style="display:none" <?php } ?> id="divcref">
              <label class="col-md-3 control-label" for="cref"> <span class="required">*</span> CREF :</label>
              <div class="col-md-9">
                <input type="text" class="form-control" placeholder="111222-A/BB" name="cref" id="cref" required value="<?php echo $cref; ?>" />
                <!-- <?php if ($funcao == 'Preparador Físico') {
                        'required';
                      } ?> -->
                <div class="form-control-focus"> </div>
                <span class="help-block">Caso a função seja <font color='#e7505a'>Preparador Físico</font>, o preenchimento do CREF é obrigatório.</span>
              </div>
            </div>

            <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="nome_pai">
                <span class="required">*</span> Nome do Pai :
              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="nome_pai" id="nome_pai" style="text-transform: uppercase" value="<?php echo $nome_pai != '' ? $nome_pai : 'NÃO POSSUI REGISTRO'; ?>" required>
                <div class="form-control-focus"> </div>
                <span class="help-block"></span>
              </div>
            </div>

            <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="nome_mae">
                <span class="required">*</span> Nome da Mãe :
              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="nome_mae" id="nome_mae" style="text-transform: uppercase" value="<?php echo $nome_mae; ?>" required />
                <div class="form-control-focus"> </div>
                <span class="help-block"></span>
              </div>
            </div>

            <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="cep">
                <span class="required">*</span> CEP :
              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="cep" id="cep" value="<?php echo $cep; ?>" required />
                <div class="form-control-focus"> </div>
                <span class="help-block">Informe o CEP (Somente números).</span>
              </div>
            </div>

            <p align="right"><input type="button" class="dt-button buttons-print btn dark btn-outline" value="Buscar Endereço" onclick="buscacep(cep.value)" /></p>

            <!-- EXIBE INFORMAÇÕES FORMULÁRIO BUSCACEP -->
            <div id="feedback"></div>
            <div id="form_endereco">
              <?php if (isset($endereco) && $endereco != "") { ?>


                <div class="form-group form-md-line-input">
                  <label class="col-md-3 control-label" for="endereco"> <span class="required">*</span> Endereço completo, numero </label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="endereco" id="endereco" value="<?php echo $endereco; ?>" required />
                    <div class="form-control-focus"> </div>
                    <span class="help-block">Endereço completo</span>

                  </div>
                </div>

                <div class="form-group form-md-line-input">
                  <label class="col-md-3 control-label" for="bairro"> <span class="required">*</span> Bairro </label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="bairro" id="bairro" value="<?php echo $bairro; ?>" required />
                    <div class="form-control-focus"> </div>
                    <span class="help-block"></span>

                  </div>
                </div>

                <div class="form-group form-md-line-input">
                  <label class="col-md-3 control-label" for="cidade"> <span class="required">*</span> Cidade </label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="cidade" id="cidade" value="<?php echo $cidade; ?>" required />
                    <div class="form-control-focus"> </div>
                    <span class="help-block"></span>

                  </div>
                </div>

                <div class="form-group form-md-line-input">
                  <label class="col-md-3 control-label" for="estado"> <span class="required">*</span> Estado </label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="estado" id="estado" value="<?php echo $estado; ?>" required />
                    <div class="form-control-focus"> </div>
                    <span class="help-block">UF</span>

                  </div>
                </div>

              <?php } ?>
            </div>
            <!-- FIM FORMUALRIO BUSCACEP -->

            <div class="form-group">
              <label class="col-md-3 control-label" for="anexo_cpf">Enviar apenas CNH </label>
              <div class="col-md-1">
                <input type="checkbox" name="apenas_cnh" id="apenas_cnh" value="1" onclick="toggleDocumentTypeShown()" />
                <div class="form-control-focus"> </div>
              </div>
            </div>

            <div class="form-group form-md-line-input" id="anexo_rg_div">
              <label class="col-md-3 control-label" for="anexo_rg"> <span class="required">*</span> RG </label>
              <div class="col-md-9">
                <input type="file" class="form-control" name="anexo_rg" id="anexo_rg" accept="application/pdf" />
                <?php
                if ($atleta_id != 0 && $anexo_rg != "") {
                ?>
                  <a href="<?php echo BASE; ?>assets/images/atletas/docs/<?php echo $anexo_rg; ?>" target="_blank">
                    <button type="button" class="btn green">Visualizar RG</button>
                  </a>
                <?php
                }
                ?>
                <div class="form-control-focus"> </div>
                <span class="help-block">Envie um anexo em formato JPG, PNG ou PDF com o RG do atleta</span>
                <?php
                if (isset($anexo_rg) && $anexo_rg !== "") {
                ?>
                  <input type="hidden" name="anexo_rg_id" value="<?php echo $anexo_rg; ?>" />
                <?php
                }
                ?>
              </div>
            </div>

            <div class="form-group form-md-line-input" id="anexo_cpf_div">
              <label class="col-md-3 control-label" for="anexo_cpf"> <span class="required">*</span> CPF</label>
              <div class="col-md-9">
                <input type="file" class="form-control" name="anexo_cpf" id="anexo_cpf" accept="application/pdf" />
                <?php
                if ($atleta_id != 0 && $anexo_cpf !== "") {
                ?>
                  <a href="<?php echo BASE; ?>assets/images/atletas/docs/<?php echo $anexo_cpf; ?>" target="_blank">
                    <button type="button" class="btn green">Visualizar CPF</button>
                  </a>
                <?php
                } ?>
                <div class="form-control-focus"> </div>
                <span class="help-block">Envie um anexo em formato JPG, PNG ou PDF com o CPF do atleta</span>
                <?php
                if (isset($anexo_cpf) && $anexo_cpf !== "") {
                ?>
                  <input type="hidden" name="anexo_cpf_id" value="<?php echo $anexo_cpf; ?>" />
                <?php
                }
                ?>
              </div>
            </div>

            <div class="form-group form-md-line-input" style="display: none;" id="anexo_cnh_div">
              <label class="col-md-3 control-label" for="anexo_cnh"> <span class="required">*</span> CNH </label>
              <div class="col-md-9">
                <input type="file" class="form-control" name="anexo_cnh" id="anexo_cnh" accept="application/pdf" />
                <div class="form-control-focus"> </div>
                <span class="help-block">Envie um anexo em formato JPG, PNG ou PDF com a CNH do atleta</span>
                <?php
                if (isset($anexo_cnh) && $anexo_cnh !== "") {
                ?>
                  <input type="hidden" name="anexo_cnh_id" value="<?php echo $anexo_cnh; ?>" />
                <?php
                }
                ?>
              </div>
            </div>
            <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="anexo_cnh"> </label>
              <div class="col-md-9">
                <?php
                if ($atleta_id != 0 && $anexo_cnh !== "") {
                ?>
                  <a href="<?php echo BASE; ?>assets/images/atletas/docs/<?php echo $anexo_cnh; ?>" target="_blank">
                    <button type="button" class="btn green">Visualizar CNH</button>
                  </a>
                <?php
                }
                ?>
              </div>
            </div>

            <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="anexo_residencia"> <span class="required">*</span> Comprovante de Residência</label>
              <div class="col-md-9">
                <input type="file" class="form-control" name="anexo_residencia" id="anexo_residencia" accept="application/pdf" />
                <?php
                if ($atleta_id != 0 && $anexo_residencia !== "") {
                ?>
                  <a href="<?php echo BASE; ?>assets/images/atletas/docs/<?php echo $anexo_residencia; ?>" target="_blank">
                    <button type="button" class="btn green">Visualizar comprov. residência</button>
                  </a>
                <?php
                }
                ?>
                <div class="form-control-focus"> </div>
                <span class="help-block">Envie um anexo em formato JPG, PNG ou PDF com o Comprovante de Residência do atleta</span>
                <?php
                if (isset($anexo_residencia) && $anexo_residencia !== "") {
                ?>
                  <input type="hidden" name="anexo_residencia_id" value="<?php echo $anexo_residencia; ?>" />
                <?php
                }
                ?>
              </div>
            </div>

            <div class="form-actions" id="div_botao" <?php if ($atleta_id == 0) { ?> style="display:none" <?php } ?>>
              <div class="row">
                <div class="col-md-offset-0 col-md-9">

                  <?php if ($atleta_id != 0) { ?>
                    <button type="submit" id="botao" class="btn green">Atualizar</button>
                    <div id="envio"> </div>
                  <?php } else { ?>
                    <button type="submit" id="botao" class="btn green">Cadastrar</button>
                    <div id="envio"> </div>
                  <?php } ?>

                </div>
              </div>
            </div>
        </form>

      </div>

    </div>
  </div>
</div>
</div>

<script>
  function envia() {
    document.getElementById("botao").style.display = "none";
    document.getElementById("envio").innerHTML = "Aguarde! Processando...";

  }

  function inicio() {
    document.getElementById("cref").required = false;
  }
  inicio();

  function verifica_funcao(funcao) {
    if (funcao == "Preparador Físico") {
      document.getElementById("divcref").style.display = "block";
      document.getElementById("cref").required = true;

    } else {
      document.getElementById("divcref").style.display = "none";
      document.getElementById("cref").value = "";
      document.getElementById("cref").required = false;

    }
  }

  function toggleDocumentTypeShown() {
    let rgInputDiv = document.getElementById('anexo_rg_div')
    let cpfInputDiv = document.getElementById('anexo_cpf_div')
    let cnhInputDiv = document.getElementById('anexo_cnh_div')

    let rgInput = document.getElementById('anexo_rg')
    let cpfInput = document.getElementById('anexo_cpf')
    let cnhInput = document.getElementById('anexo_cnh')

    if (cnhInputDiv.style.display === "none") {
      rgInputDiv.style.display = "none"
      cpfInputDiv.style.display = "none"
      // rgInput.required = false
      // cpfInput.required = false

      cnhInputDiv.style.display = "block"
      // cnhInput.required = true
    } else {
      rgInputDiv.style.display = "block"
      cpfInputDiv.style.display = "block"
      // rgInput.required = true
      // cpfInput.required = true

      // cnhInput.required = false
      cnhInputDiv.style.display = "none"
    }
  }

  function publishBID() {
    let status = document.getElementById('bid_status').value
    let atleta_id = document.getElementById('bid_atleta_id').value
    let full_select_value = document.getElementById('campeonato_id_bid').value

    if (!full_select_value) {
      alert('Selecione a inscrição')
      return
    }

    full_select_value = full_select_value.split("/")

    let campeonato_id = full_select_value[0]
    let clube_id = full_select_value[1]

    if (!status) {
      alert('Selecione a situação do atleta')
      return
    }

    window.location.href = '?publishBID=true&atleta_id=' + atleta_id + '&status=' + status + '&campeonato_id=' + campeonato_id + '&clube_id=' + clube_id
  }

  function hideBID() {
    let atleta_id = document.getElementById('bid_atleta_id').value

    if (!confirm("Tem certeza que deseja ocultar todos os registros do BID deste atleta?")) return

    window.location.href = '?hideAllBID=true&atleta_id=' + atleta_id
  }
</script>

<!--
  FUNÇÃO BUSCACEP
-->
<script>
  function buscacep(cep) {

    var xmlhttp;

    if (window.XMLHttpRequest) {

      xmlhttp = new XMLHttpRequest();

    } else {

      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

    }

    xmlhttp.onreadystatechange = function() {

      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

        document.getElementById("feedback").innerHTML = xmlhttp.responseText;

        document.getElementById("div_botao").style.display = "block";


        if (document.getElementById("sucesso").value == 1) {

          document.getElementById("endereco").value = document.getElementById("endereco").value + ", ";
          document.getElementById("endereco").focus();
        } else {
          document.getElementById("endereco").focus();
        }

        document.getElementById("form_endereco").innerHTML = "";


      } else {
        document.getElementById("feedback").innerHTML = "Carregando... aguarde!";
      }
    }

    xmlhttp.open("POST", "<?php echo BASE . "painel/buscacep/"; ?>" + cep, true);

    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); // Setando Content-type

    xmlhttp.send(cep);

  }


  function verifica_atleta(doc, funcao, url_retorno) {

    var xmlhttp;

    if (window.XMLHttpRequest) {

      xmlhttp = new XMLHttpRequest();

    } else {

      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

    }

    xmlhttp.onreadystatechange = function() {

      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

        document.getElementById("status_atleta").innerHTML = xmlhttp.responseText;


        if (document.getElementById("verifica").value == 1) {
          document.getElementById("botao").disabled = true;
        } else {
          document.getElementById("botao").disabled = false;
        }


      } else {
        document.getElementById("status_atleta").innerHTML = "Carregando... aguarde!";
      }
    }

    dados = "url_retorno=" + url_retorno

    xmlhttp.open("POST", "<?php echo BASE . "painel/verifica_atleta/"; ?>" + doc + "/" + funcao, true);

    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); // Setando Content-type

    xmlhttp.send(dados);

  }
</script>