<?php if(isset($_SESSION["msg"])){ ?>
<div> <?php echo $_SESSION["msg"];?> </div>
<?php  unset($_SESSION["msg"]); } ?>

<!--
	MASCARA DE ENTRADA
-->
<script>

	jQuery(function($){
	
	$("#nascimento").mask("99/99/9999");
	$("#rg").mask("99.999.999-A");
	$("#cpf").mask("999.999.999-99");
  $("#cep").mask("99999-999");
	//$("#telefone").mask("(99) 9999-99999");
		
});


  var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
},
spOptions = {
    onKeyPress: function(val, e, field, options) {
                      field.mask(SPMaskBehavior.apply({}, arguments), options);
                    }
};

$('#telefone').mask(SPMaskBehavior, spOptions);

</script>

<!-- TITULO DA PÁGINA -->
<h3 class="page-title">ARBITRAGEM <small><i class="fa fa-angle-double-right"></i> Cadastro de Árbitros </small></h3>

	<div class="row">
		<div class="col-md-10">
			
			<!-- BEGIN VALIDATION STATES-->
				<div class="portlet light portlet-fit portlet-form bordered">
					<div class="portlet-title">
						<div class="caption">
							<i class=" icon-layers font-green"></i>
							<span class="caption-subject font-green sbold uppercase">Cadastro de Árbitros</span>
						</div>					
                    </div>
						
	<div class="portlet-body">
                                                        
    <!-- INICIO DO FORMULÁRIO-->
    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="arbitragem_add">
	<input type="hidden" name="arbitragem_id" value="<?php echo $arbitragem_id;?>" />
		
    	<div class="form-body">
        	<div class="alert alert-danger display-hide">
            	<button class="close" data-close="alert"></button> Você tem alguns erros de formulário. Por favor verifique abaixo.
			</div>
        <div class="alert alert-success display-hide">
        	<button class="close" data-close="alert"></button> A validação do formulário é bem-sucedida!
		</div>
		
		<!-- CAMPOS DO FORMULÁRIO -->
		  <div class="form-group form-md-line-input">
			  <label class="col-md-3 control-label" for="nome">
			  <span class="required">*</span> Nome do Árbitro :
			  </label>  
		  	  <div class="col-md-9">
 			  <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $nome;?>" style="text-transform: uppercase" required />
			  <div class="form-control-focus"> </div>
		      <span class="help-block">Informe o nome completo do árbitro.</span>
          	  </div>
          </div>
          
          <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="nascimento">
              <span class="required">*</span> Nascimento :
              </label>
              <div class="col-md-9">
              <input type="text" class="form-control" placeholder="dd/mm/aaaa" name="nascimento" id="nascimento" value="<?php if($nascimento !== ''): echo $nascimento; endif;?>" required />
              <div class="form-control-focus"></div>
              <span class="help-block">Informe a data no formato dd/mm/aaaa</span>
              </div>
          </div>
                                                                                                                         
          <div class="form-group form-md-line-input">
			 <label class="col-md-3 control-label" for="foto">Foto (3x4) :</label>
			   	<div class="col-md-9">
					<div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 250px;">
                        	    <?php if(isset($foto) && $foto!=""){?>
    								<img src="<?php echo BASE; ?>assets/images/arbitros/<?php echo $foto;?>" width="200" />
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
			  <label class="col-md-3 control-label" for="funcao"> 
              <span class="required">*</span> Função :
              </label>
              <div class="col-md-9">
                  <select class="form-control" name='funcao' id='funcao' style="text-transform: uppercase" required >
     					<option value=''> --- Selecione a função ---</option>
     					<option value="<?php echo $funcao;?>" selected='selected'><?php echo $funcao;?></option>
     					<option value='Árbitro'>Árbitro</option>
     					<option value='Assistente'>Assistente</option>
     					<option value='Árbitro e Assistente'>Árbitro e Assistente</option>
     					<option value='Representante'>Representante</option>
    			  </select>
              <div class="form-control-focus"></div>
              </div>
          </div>
          
          <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="cpf">
              <span class="required">*</span> CPF :
              </label>
              <div class="col-md-9">
              <input type="text" class="form-control" placeholder="111.222.333-44" name="cpf" id="cpf" value="<?php echo $cpf;?>" onblur="verifica_arbitragem(this.value)" required /> <span id="status_arbitragem"></span>
              <div class="form-control-focus"> </div>
              <span class="help-block">Informe o CPF sem números e traços.</span>
			  </div>
		  </div>
				
          <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="rg">
              <span class="required">*</span> RG :
              </label>
              <div class="col-md-9">
              <input type="text" class="form-control" placeholder="11.222.333-A" name="rg" id="rg" value="<?php echo $rg;?>" required />
              <div class="form-control-focus"></div>
              <span class="help-block">Informe o RG sem números e traços.</span>
              </div>
          </div>			
				
          <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="telefone">
              <span class="required">*</span> Telefone :
              </label>
              <div class="col-md-9">
              <input type="text" class="form-control" placeholder="(XX) 3632-6516" name="telefone" id="telefone" value="<?php echo $telefone;?>" required />
              <div class="form-control-focus"></div>
              <span class="help-block">Informe o nº de telefone ou celular.</span>
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
            <label class="col-md-3 control-label" for="numero"> <span class="required">*</span> Número </label>
            <div class="col-md-9">
            <input type="text" class="form-control" name="numero" id="numero" value="<?php echo $numero;?>" required />
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
				

                    <?php if($arbitragem_id!=0){?>
          <button type="submit" id="botao"  onclick="envia()" class="btn green">Atualizar</button> <div id="envio"> </div>
          <?php } else{ ?>
          <button type="submit" id="botao"  onclick="envia()" class="btn green">Cadastrar</button> <div id="envio"> </div>
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

function envia()
{
  document.getElementById("botao").style.display = "none";
  document.getElementById("envio").innerHTML = "Aguarde! Processando...";

}


</script>



<script>
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