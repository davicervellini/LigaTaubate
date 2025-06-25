<?php if(isset($_SESSION["msg"])){ ?>
<div> <?php echo $_SESSION["msg"];?> </div>
<?php  unset($_SESSION["msg"]); } ?>


<!-- TITULO DA PÁGINA -->
<h3 class="page-title">CLUBES <small><i class="fa fa-angle-double-right"></i> Cadastro de Clubes </small></h3>

	<div class="row">
		<div class="col-md-10">
			
			<!-- BEGIN VALIDATION STATES-->
				<div class="portlet light portlet-fit portlet-form bordered">
					<div class="portlet-title">
						<div class="caption">
							<i class=" icon-layers font-green"></i>
							<span class="caption-subject font-green sbold uppercase">Cadastro de Clubes</span>
						</div>					
                    </div>
						
	<div class="portlet-body">
                                                        
    <!-- INICIO DO FORMULÁRIO-->
    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="clube_add">
	<input type="hidden" name="clube_id" value="<?php echo $clube_id;?>" />
		
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
			  <span class="required">*</span> Nome do clube :
			  </label>  
		  	  <div class="col-md-9">
 			  <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $nome;?>" style="text-transform: uppercase" required />
			  <div class="form-control-focus"> </div>
		      <span class="help-block">Informe o nome do clube.</span>
          	  </div>
          </div>
                                                
          <div class="form-group form-md-line-input">
			 <label class="col-md-3 control-label" for="escudo">Escudo :</label>
			   	<div class="col-md-9">
					<div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 200px;">
                        	<?php if(isset($escudo) && $escudo!=""){?>
    							<img src="<?php echo BASE; ?>assets/images/escudos/<?php echo $escudo;?>" width="200" />
    							<input type="hidden" name="escudo_id" value="<?php echo $escudo;?>" />
    						<?php } ?>
                        </div>
                            <div>
                                <span class="btn red btn-outline btn-file">
                                   <span class="fileinput-new"> Selecionar Imagem </span>
                                   <span class="fileinput-exists"> Alterar Imagem </span>
                                   <input type="file" name="escudo" id="escudo">
								</span>
                             	<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remover Imagem </a>
                             </div>
                    </div>
                 </div>
          </div>
			
		  <div class="form-group form-md-line-input">
			  <label class="col-md-3 control-label" for="nickname">
              <span class="required">*</span> Clube (Apelido) :
              </label>
              <div class="col-md-9">
              <input type="text" class="form-control" name="nickname" id="nickname" value="<?php echo $nickname;?>" style="text-transform: uppercase" required />
              <div class="form-control-focus"> </div>
              </div>
          </div>


        <div class="form-group form-md-line-input">
        <label class="col-md-3 control-label" for="email">
              <span class="required">*</span> E-mail :
              </label>
              <div class="col-md-9">
              <input type="text" class="form-control" name="email" id="email" value="<?php echo $email;?>" style="text-transform: uppercase" required />
              <div class="form-control-focus"> </div>
              </div>
          </div>
				
          <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="sigla">
              <span class="required">*</span> Sigla :
              </label>
              <div class="col-md-9">
              <input type="text" style="text-transform:uppercase;" class="form-control" name="sigla" id="sigla" value="<?php echo $sigla;?>" style="text-transform: uppercase" required />
              <div class="form-control-focus"> </div>
              <span class="help-block">Informe a sigla do clube Ex: BRA.</span>
              </div>
          </div>
				
          <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="nome_campo">
              <span class="required">*</span> Campo de jogo :
              </label>
              <div class="col-md-9">


                <select class="form-control" name="estadio_id" id="estadio_id" style="text-transform: uppercase" required >

                  <option value="" selected> -Selecione-<option>

                <?php if(isset($estadio) && $estadio!=""){?>

                <option selected value="<?php echo $estadio["estadio_id"];?>"> <?php echo $estadio["campo"];?> </option>

                <?php } ?>

                <?php foreach($estadios as $estadio){?>

                <option value="<?php echo $estadio["estadio_id"];?>"> <?php echo $estadio["campo"];?> </option>

                <?php } ?>

                 </select>

              <div class="form-control-focus"></div>
              <span class="help-block">Informe o campo em que o clube manda seus jogos.</span>
              </div>
          </div>
				
          <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="fundacao">
              <span class="required">*</span> Data de fundação :
              </label>
              <div class="col-md-9">
              <input type="text" class="form-control" placeholder="dd/mm/aaaa" name="fundacao" id="fundacao" value="<?php if($fundacao !== ''): echo $fundacao;endif;?>" required />
              <div class="form-control-focus"> </div>
              <span class="help-block">Informe a data no formato dd/mm/aaaa</span>
              </div>
          </div>
				
          <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="presidente">
              <span class="required">*</span> Presidente :
              </label>
              <div class="col-md-9">
              <input type="text" class="form-control" name="presidente" id="presidente" value="<?php echo $presidente;?>" style="text-transform: uppercase" required />
              <div class="form-control-focus"> </div>
              <span class="help-block"></span>
              </div>
          </div>
				
         <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="representante_1">
              <span class="required">*</span> Representante 1 :
              </label>
              <div class="col-md-9">
              <input type="text" class="form-control" name="representante_1" id="representante_1" value="<?php echo $representante_1;?>" style="text-transform: uppercase" required />
              <div class="form-control-focus"> </div>
              <span class="help-block"></span>
              </div>
         </div>
				
         <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="representante_2">
              <span class="required">*</span> Representante 2 :
              </label>
              <div class="col-md-9">
              <input type="text" class="form-control" name="representante_2" id="representante_2" value="<?php echo $representante_2;?>" style="text-transform: uppercase" required />
              <div class="form-control-focus"> </div>
              <span class="help-block"></span>
              </div>
         </div>
				
         <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="site">Site :</label>
              <div class="col-md-9">
              <input type="text" class="form-control" name="site" id="site" value="<?php echo $site;?>" style="text-transform: uppercase" />
              <div class="form-control-focus"> </div>
              <span class="help-block"></span>
              </div>
         </div>
				
         <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="fanpage">Fan Page :</label>
              <div class="col-md-9">
              <input type="text" class="form-control" name="fanpage" id="fanpage" value="<?php echo $fanpage;?>" / >
              <div class="form-control-focus"> </div>
              <span class="help-block"></span>
              </div>
         </div>


               <?php if($clube_id!=0){?>
            


         <h2>Informe a senha, caso queira alterá-la </h2>
        <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="senha">Senha :</label>
              <div class="col-md-9">
              <input type="password" maxlength="6" class="form-control" name="senha" id="senha" / >
              <div class="form-control-focus"> </div>
              <span class="help-block"></span>
              </div>
         </div>

         <?php } ?>

                                            
         </div>
				
         <div class="form-actions">
         	<div class="row">
            	<div class="col-md-offset-0 col-md-9">
					          <?php if($clube_id!=0){?>
                    <button type="submit" id="botao"  onsubmit="envia()" class="btn green">Atualizar</button> <div id="envio"> </div>
                    <?php } else{ ?>
                    <button type="submit" id="botao"  onsubmit="envia()" class="btn green">Cadastrar</button> <div id="envio"> </div>
                    <?php } ?>
                </div>
            </div>
         </div>
      </form>
			
	</div>
	
		</div>
	</div>
</div>


<!--
  MASCARA DE ENTRADA
-->
<script>

function envia()
{
  document.getElementById("botao").style.display = "none";
  document.getElementById("envio").innerHTML = "Aguarde! Processando...";

}

  jQuery(function($){
  
  $("#sigla").mask("AAA");
  $("#fundacao").mask("99/99/9999");
  
});

</script>