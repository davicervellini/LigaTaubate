<?php if(isset($_SESSION["msg"])){ ?>
<div> <?php echo $_SESSION["msg"];?> </div>
<?php  unset($_SESSION["msg"]); } ?>

<!--
  MASCARA DE ENTRADA
-->
<script>

  jQuery(function($){
  
  $("#inauguracao").mask("99/99/9999");
  $("#cep").mask("99999-999");
    
});

</script>

<!--
  CAMPOS DINAMICOS (Mandantes)
-->
<script>
  
$(document).ready(function() {
    var max_fields      = 5; //Valor maximo de caixas
    var wrapper         = $(".input_fields_wrap"); //Campos
    var add_button      = $(".add_field_button"); //Adcionar botão
    
    var x = 0; //Valor da contagem inicial
    $(add_button).click(function(e){ //Quando clicar no botão ADD
        e.preventDefault();
        if(x < max_fields){ //Valor maximo de input
            x++; //Incremento
            $(wrapper).append('<div><p><select class="form-control" name="mandante[]" id="mandante" required > <option value=""> --- Selecione o mandante  --- </option> <?php foreach ($clubes as $clube) {?><option value="<?php echo $clube["clube_id"];?>"> <?php echo $clube["nome"];?> </option><?php } ?></select></p><a href="#" style="float:right" class="remove_field">Remover Mandante</a></div>'); //Adicionar input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //Remover as caixas de mandante
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
  
</script>



<!-- TITULO DA PÁGINA -->
<h3 class="page-title">ESTÁDIOS <small><i class="fa fa-angle-double-right"></i> Cadastro de Estádios </small></h3>

  <div class="row">
    <div class="col-md-10">
      
      <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
          <div class="portlet-title">
            <div class="caption">
              <i class=" icon-layers font-green"></i>
              <span class="caption-subject font-green sbold uppercase">Cadastro de Estádios</span>
            </div>        
                    </div>
            
  <div class="portlet-body">
                                                        
    <!-- INICIO DO FORMULÁRIO-->
    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="estadio_add">
  <input type="hidden" name="estadio_id" value="<?php echo $estadio_id;?>" />
    
      <div class="form-body">
          <div class="alert alert-danger display-hide">
              <button class="close" data-close="alert"></button> Você tem alguns erros de formulário. Por favor verifique abaixo.
      </div>
        <div class="alert alert-success display-hide">
          <button class="close" data-close="alert"></button> A validação do formulário é bem-sucedida!
    </div>
    
    <!-- CAMPOS DO FORMULÁRIO -->
      <div class="form-group form-md-line-input">
        <label class="col-md-3 control-label" for="campo">
        <span class="required">*</span> Nome do campo :
        </label>  
          <div class="col-md-9">
         <input type="text" class="form-control" name="campo" id="campo" value="<?php echo $campo;?>" required />
        <div class="form-control-focus"> </div>
          <span class="help-block">Informe o nome do campo.</span>
              </div>
          </div>
        
        <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="inauguracao">
              <span class="required">*</span> Nome fantasia :
              </label>
              <div class="col-md-9">
              <input type="text" class="form-control" name="nome_fantasia" id="nome_fantasia" value="<?php if($nome_fantasia !== ''): echo $nome_fantasia; endif;?>" required />
              <div class="form-control-focus"></div>
              <span class="help-block">Informe o nome fantasia do campo</span>
              </div>
          </div>
          
          <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="inauguracao">
              <span class="required">*</span> Data de Inauguração :
              </label>
              <div class="col-md-9">
              <input type="text" class="form-control" placeholder="dd/mm/aaaa" name="inauguracao" id="inauguracao" value="<?php if($inauguracao !== ''): echo $inauguracao; endif;?>" pattern="\d{2}\ / \d{2}\/ \ d{4}" required />
              <div class="form-control-focus"></div>
              <span class="help-block">Informe a data no formato dd/mm/aaaa</span>
              </div>
          </div>
                                                                                                                         
          <div class="form-group form-md-line-input">
       <label class="col-md-3 control-label" for="foto">Foto do Campo :</label>
           <div class="col-md-9">
          <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                              <?php if(isset($foto) && $foto!=""){?>
                    <img src="<?php echo BASE; ?>assets/images/estadios/<?php echo $foto;?>" width="200" />
                    <input type="hidden" name="foto_id" value="<?php echo $foto;?>" />
                  <?php } ?>
                        </div>
                            <div>
                                <span class="btn red btn-outline btn-file">
                                   <span class="fileinput-new"> Selecionar Imagem </span>
                                   <span class="fileinput-exists"> Alterar Imagem </span>
                                   <input type="file" name="foto" id="foto">
                </span>
                               <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remover Imagem </a>
                      </div>
                    </div>
              </div>
          </div>
          


      <div class="form-group form-md-line-input">
        <label class="col-md-3 control-label" for="clube_id">
              <span class="required">*</span> Equipe Responsável :
              </label>
              <div class="col-md-9">
                  <select class="form-control" name="clube_id" id="clube_id" required >
                <?php if(isset($clube_id) && $clube_id!=""){?>
                
                  <option selected value="<?php echo $clube_id;?>"> <?php echo $clube_nome;?> </option>
                  
                <?php } else { ?>
                
                  <option value=""> --- Selecione o clube responsável --- </option>
                  
                <?php } ?>

                <?php foreach ($clubes as $clube) {?>
                
                  <option value="<?php echo $clube["clube_id"];?>"> <?php echo $clube["nome"];?> </option>
                
                <?php } ?>
            </select>
              <div class="form-control-focus"></div>
              </div>
          </div>

      <div class="form-group form-md-line-input">
          <label class="col-md-3 control-label" for="mandante">
          <span class="required">*</span> Mandantes :
          </label>
          <div class="col-md-9">
          <div class="input_fields_wrap">
          
          <div>

            
          <button class="add_field_button dt-button buttons-print btn dark btn-outline">Adicionar mandante</button>
          <em><span style="padding-top: 5px; font-size: 14px;color: #888;">(<span class="required">*</span> Limite máx. 5 mandantes)</span></em>
          
          </div>

          
            <?php if(!empty($mandantes)){?>
            <?php foreach($mandantes as $mandante){?>

            <div>


            <p>
              <select class="form-control" name="mandante[]" id="mandante" required >
              
              <?php if(isset($mandante["clube_id"]) && $mandante["clube_id"]!=""){?>
              
                <option value="<?php echo $mandante["clube_id"];?>"> <?php echo $mandante["nome"];?> </option>
              
              <?php } else { ?>
              
                <option value=""> --- Selecione o mandante --- </option>
              
              <?php } ?>

              <?php foreach ($clubes as $clube) {?>
              
                <option value="<?php echo $clube["clube_id"];?>"> <?php echo $clube["nome"];?> </option>
              
              <?php } ?>
              
              </select>
            </p>

            <a href="#" style="float:right" class="remove_field">Remover Mandante</a>

            </div>

            <?php } ?>
            <?php } ?>




          </div>      
             <div class="form-control-focus"></div>
              </div>
          </div> 


             <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="cep">
              <span class="required">*</span> CEP :
              </label>
              <div class="col-md-9">
              <input type="text" class="form-control" name="cep" id="cep" value="<?php echo $cep;?>" required />
              <div class="form-control-focus"> </div>
              <span class="help-block">Informe o CEP (Somente números).</span>
              </div>
         </div>
         
      <p align="right"><input type="button" class="dt-button buttons-print btn dark btn-outline" value="Buscar Endereço" onclick="buscacep(cep.value)" /></p>
      
     <!-- EXIBE INFORMAÇÕES FORMULÁRIO BUSCACEP -->
     <div id="feedback"></div>
         <div id="form_endereco">
<?php if(isset($endereco) && $endereco!=""){?>
  

            <div class="form-group form-md-line-input">
            <label class="col-md-3 control-label" for="endereco"> <span class="required">*</span> Endereço completo, numero </label>
            <div class="col-md-9">
            <input type="text" class="form-control" name="endereco" id="endereco" value="<?php echo $endereco;?>" required />
            <div class="form-control-focus"> </div>
            <span class="help-block">Endereço completo</span>

            </div>
            </div>

            <div class="form-group form-md-line-input">
            <label class="col-md-3 control-label" for="bairro"> <span class="required">*</span> Bairro </label>
            <div class="col-md-9">
            <input type="text" class="form-control" name="bairro" id="bairro" value="<?php echo $bairro;?>" required />
            <div class="form-control-focus"> </div>
            <span class="help-block"></span>

            </div>
            </div>

            <div class="form-group form-md-line-input">
            <label class="col-md-3 control-label" for="cidade"> <span class="required">*</span> Cidade </label>
            <div class="col-md-9">
            <input type="text" class="form-control" name="cidade" id="cidade" value="<?php echo $cidade;?>" required />
            <div class="form-control-focus"> </div>
            <span class="help-block"></span>

            </div>
            </div>

            <div class="form-group form-md-line-input">
            <label class="col-md-3 control-label" for="estado"> <span class="required">*</span> Estado </label>
            <div class="col-md-9">
            <input type="text" class="form-control" name="estado" id="estado" value="<?php echo $estado;?>" required />
            <div class="form-control-focus"> </div>
            <span class="help-block">UF</span>

            </div>
            </div>

<?php } ?>
</div>    
         <!-- FIM FORMUALRIO BUSCACEP -->
    

         <div class="form-actions">
           <div class="row">
              <div class="col-md-offset-0 col-md-9">
            <?php if($estadio_id!=0){?>
          <button type="submit"  onclick="envia()" class="btn green">Atualizar</button> <div id="envio"> </div>
          <?php } else{ ?>
          <button type="submit"  onclick="envia()" class="btn green">Cadastrar</button> <div id="envio"> </div>
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

<!--
  FUNÇÃO BUSCACEP
-->
<script>

function envia()
{
  document.getElementById("botao").style.display = "none";
  document.getElementById("envio").innerHTML = "Aguarde! Processando...";

}


function buscacep(cep){
  
  var xmlhttp;

  if(window.XMLHttpRequest){

    xmlhttp = new XMLHttpRequest();

  }else{

    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

    }

  xmlhttp.onreadystatechange = function(){

    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){

      document.getElementById("feedback").innerHTML = xmlhttp.responseText;
      

      if(document.getElementById("sucesso").value==1)
      {
        document.getElementById("endereco").value = document.getElementById("endereco").value+ ", ";
        document.getElementById("endereco").focus();
      }
      else
      {
        document.getElementById("endereco").focus();
      }

      document.getElementById("form_endereco").innerHTML = "";
      

    }

    else{
    document.getElementById("feedback").innerHTML = "Carregando... aguarde!";
    }
  }

  xmlhttp.open("POST","<?php echo BASE."painel/buscacep/";?>"+cep,true);

  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");  // Setando Content-type

  xmlhttp.send(cep);

}

</script>