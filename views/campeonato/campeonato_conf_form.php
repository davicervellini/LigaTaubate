<!-- TITULO DA PÁGINA -->
<h3 class="page-title">CAMPEONATOS <small><i class="fa fa-angle-double-right"></i> Configuração </small></h3>

	<div class="row">
		<div class="col-md-10">
			
			<!-- BEGIN VALIDATION STATES-->
				<div class="portlet light portlet-fit portlet-form bordered">
					<div class="portlet-title">
						<div class="caption">
							<i class=" icon-layers font-green"></i>
							<span class="caption-subject font-green sbold uppercase">Configurar campeonato</span>
						</div>					
                    </div>
						
	<div class="portlet-body">
                                                        
    <!-- INICIO DO FORMULÁRIO-->
    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo BASE;?>campeonato/conf/<?php echo $campeonato_id;?>">
	<input type="hidden" name="campeonato_id" value="<?php echo $campeonato_id;?>" />
		
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
			  <span class="required">*</span> Nome do campeonato :
			  </label>  
		  	  <div class="col-md-9">
 			  <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $nome;?>" required />
 			  <input type="hidden" name="campeonato_id" id="campeonato_id" value="<?php echo $campeonato_id;?>" required />
			  <div class="form-control-focus"> </div>
		      <span class="help-block"></span>
          	  </div>
          </div>

          <?php foreach($classificacao as $class){?>

          <div class="form-group col-md-6" style="overflow:scroll; height:400px;margin-left:5px">

         	<h3> GRUPO <?php echo $class["grupo"];?> </h3>

	          <?php foreach($clubes as $clube){?>

	        	<label for="<?php echo $class["grupo"];?>@<?php echo $clube["clube_id"];?>">

			        <input type="checkbox" name="clube[]" id="<?php echo $class["grupo"];?>@<?php echo $clube["clube_id"];?>" value="<?php echo $class["grupo"];?>@<?php echo $clube["clube_id"];?>" onclick="alert(<?php echo $class["grupo"];?>)"/>

			       <?php if($clube["escudo"]!=""){?>
				        <img src="<?php echo BASE;?>assets/images/escudos/<?php echo $clube["escudo"];?>" width="20" />
				    <?php } ?>

			        <?php echo $clube["nickname"];?> 

	      		</label>

	      		<br />

	          	<?php } ?>
	       </div>

          <?php } ?>



          
			
			<script>

				function marcaGruposClubes(ID)
				{
					document.getElementById(ID).checked = true;
				}

			</script>
					
					<?php foreach($grupos_clubes as $gc){?>

						<script>

							marcaGruposClubes("<?php echo $gc["grupo"]."@".$gc["clube_id"];?>");

						</script>
			
					<?php } ?>
			
		

        <?php /*

          <div class="form-group form-md-line-input">
			  <label class="col-md-3 control-label" for="tipo">
			  <span class="required">*</span> Tipo de disputa :
			  </label>  
		  	  <div class="col-md-9">
 			  <select class="form-control" name="tipo" id="tipo" required />
 			  	

 			  	<?php if(isset($tipo) && $tipo!=""){?>

 			  	<option value="<?php echo $tipo;?>"> <?php echo array("","COPA","PONTOS CORRIDOS")[$tipo];?> </option>

 			  	<?php } else{ ?>

 			  	<option value=""> Selecione </option>

 			  	<?php } ?>

 			  	<option value="1"> COPA </option>
 			  	<option value="2"> PONTOS CORRIDOS </option>

 			  </select>

			  <div class="form-control-focus"> </div>
		      <span class="help-block"></span>
          	  </div>
          </div>	

          */ ?>
                                              
        <div class="form-actions">
         	<div class="row">
            	<div class="col-md-offset-0 col-md-9">

   					 <button type="submit" class="btn green">Configurar</button>


                </div>
            </div>
         </div>
      </form>
			
	</div>
	
			</div>
		</div>
	</div>
</div>