<?php if(isset($_SESSION["msg"])){ ?>
<div> <?php echo $_SESSION["msg"];?> </div>
<?php  unset($_SESSION["msg"]); } ?>

<!--
	MASCARA DE ENTRADA
-->
<script>

	jQuery(function($){
	
	$("#nascimento").mask("99/99/9999");
	$("#cpf").mask("999.999.999-99");
	$("#rg").mask("99.999.999-A");
	$("#cref").mask("999999-A/AA");
		
});

</script>

<!-- TITULO DA PÁGINA -->
<h3 class="page-title">COMISSÃO TÉCNICA <small><i class="fa fa-angle-double-right"></i> Cadastro da Comissão Técnica </small></h3>

	<div class="row">
		<div class="col-md-10">
			
			<!-- BEGIN VALIDATION STATES-->
				<div class="portlet light portlet-fit portlet-form bordered">
					<div class="portlet-title">
						<div class="caption">
							<i class=" icon-layers font-green"></i>
							<span class="caption-subject font-green sbold uppercase">Cadastro da Comissão Técnica</span>
						</div>					
                    </div>
						
	<div class="portlet-body">
                                                        
    <!-- INICIO DO FORMULÁRIO-->
    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="comissao_add">
	<input type="hidden" name="comissao_id" value="<?php echo $comissao_id;?>" />
		
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
			  <span class="required">*</span> Nome do Integrante :
			  </label>  
		  	  <div class="col-md-9">
 			  <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $nome;?>" required />
			  <div class="form-control-focus"> </div>
		      <span class="help-block">Informe o nome completo do integrante da comissão técnica.</span>
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
    								<img src="<?php echo BASE; ?>assets/images/comissao/<?php echo $foto;?>" width="200" />
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
              <span class="required">*</span> Clube :
              </label>
              <div class="col-md-9">
                  <select class="form-control" name="clube_id" id="clube_id" required >
      					<?php if(isset($clube_info["clube_id"]) && $clube_info["clube_id"]!=""){?>
      					<option value="<?php echo $clube_info["clube_id"];?>"> <?php echo $clube_info["nome"];?> </option>s
      					<?php } else { ?>
      					<option value=""> --- Selecione o clube --- </option>
      					<?php } ?>

      					<?php foreach ($clubes as $clube) {?>
      					<option value="<?php echo $clube["clube_id"];?>"> <?php echo $clube["nome"];?> </option>
      					<?php } ?>
    			  </select>
              <div class="form-control-focus"></div>
              </div>
          </div>
								
          <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="funcao">
              <span class="required">*</span> Função :
              </label>
              <div class="col-md-9">
              <select class="form-control" name="funcao" required >
            
            <?php if(isset($funcao) && $funcao!=""){?>
             <option value="<?php echo $funcao;?>" selected='selected'> <?php echo $funcao;?> </option>

            <?php } else{?>
            <option value='' selected='selected'> --- Selecione a função --- </option>
					 <?php } ?>

          <option value="Técnico">Técnico</option>
					<option value="Auxiliar Técnico">Auxiliar Técnico</option>
					<option value="Massagista">Massagista</option>
					<option value="Preparador Físico">Preparador Físico</option>
			  </select>
              <div class="form-control-focus"></div>
              <span class="help-block"></span>
              </div>
          </div>
          
          <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="cpf">
              <span class="required">*</span> CPF :
              </label>
              <div class="col-md-9">
              <input type="text" class="form-control" placeholder="111.222.333-44" name="cpf" id="cpf" value="<?php echo $cpf;?>" onblur="verifica_comissao(this.value)" required /> <span id="status_comissao"></span>
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
              <label class="col-md-3 control-label" for="cref">CREF :</label>
              <div class="col-md-9">
              <input type="text" class="form-control" placeholder="111222-A/BB" name="cref" id="cref" value="<?php echo $cref; ?>" />
              <!-- <?php if($funcao == 'Preparador Físico'){'required';} ?> -->
              <div class="form-control-focus"> </div>
			  <span class="help-block">Caso a função seja <font color='#e7505a'>Preparador Físico</font>, o preenchimento do CREF é obrigatório.</span>
              </div>
          </div>
				
         <div class="form-actions">
         	<div class="row">
            	<div class="col-md-offset-0 col-md-9">
					          <?php if($comissao_id!=0){?>
          <button type="submit" class="btn green">Atualizar</button>
          <?php } else{ ?>
          <button type="submit" class="btn green">Cadastrar</button>
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
