<!-- TITULO DA PÁGINA -->
<h3 class="page-title">CAMPEONATOS <small><i class="fa fa-angle-double-right"></i> Cadastro </small></h3>

	<div class="row">
		<div class="col-md-10">
			
			<!-- BEGIN VALIDATION STATES-->
				<div class="portlet light portlet-fit portlet-form bordered">
					<div class="portlet-title">
						<div class="caption">
							<i class=" icon-layers font-green"></i>
							<span class="caption-subject font-green sbold uppercase">Campeonatos cadastrados</span>
						</div>					
                    </div>
						
	<div class="portlet-body">
                                                        
    <!-- INICIO DO FORMULÁRIO-->
    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="add">
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
			  <div class="form-control-focus"> </div>
		      <span class="help-block"></span>
          	  </div>
          </div>

          <div class="form-group form-md-line-input">
			  <label class="col-md-3 control-label" for="descricao">
			  <span class="required">*</span> Descrição :
			  </label>  
		  	  <div class="col-md-9">
 			  <textarea class="form-control" name="descricao" id="descricao" rows="4" required><?php echo $descricao;?></textarea>
			  <div class="form-control-focus"> </div>
		      <span class="help-block"></span>
          	  </div>
          </div>	


          <div class="form-group form-md-line-input">
			  <label class="col-md-3 control-label" for="temporada">
			  <span class="required">*</span> Temporada :
			  </label>  
		  	  <div class="col-md-9">
 			  <input type="number" class="form-control" min = "2010" name="temporada" id="temporada" value="<?php echo $temporada;?>" required />
			  <div class="form-control-focus"> </div>
		      <span class="help-block"></span>
          	  </div>
          </div>	


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


          <div class="form-group form-md-line-input">
			  <label class="col-md-3 control-label" for="num_clubes_campeonato">
			  <span class="required">*</span> Quant. de equipes:
			  </label>  
		  	  <div class="col-md-9">
 			  <input type="number" class="form-control" min = "2" name="num_clubes_campeonato" id="num_clubes_campeonato" value="<?php echo $num_clubes_campeonato;?>" required />
			  <div class="form-control-focus"> </div>
		      <span class="help-block"></span>
          	  </div>
          </div>	


           <div class="form-group form-md-line-input">
			  <label class="col-md-3 control-label" for="grupos">
			  <span class="required">*</span> Quant. de grupos:
			  </label>  
		  	  <div class="col-md-9">
 			  <input type="number" class="form-control" min="1" name="grupos" id="grupos" value="<?php echo $grupos;?>" required />
			  <div class="form-control-focus"> </div>
		      <span class="help-block"></span>
          	  </div>
          </div>


           <div class="form-group form-md-line-input">
			  <label class="col-md-3 control-label" for="clubes_proxima_fase">
			  <span class="required">*</span> Clubes na próxima fase:
			  </label>  
		  	  <div class="col-md-9">
 			  <input type="number" class="form-control" min="1" name="clubes_proxima_fase" id="clubes_proxima_fase" value="<?php echo $clubes_proxima_fase;?>" required />
			  <div class="form-control-focus"> </div>
		      <span class="help-block"></span>
          	  </div>
          </div>	


           <div class="form-group form-md-line-input">
			  <label class="col-md-3 control-label" for="decisao">
			  <span class="required">*</span> Finais ida e volta?:
			  </label>  
		  	  <div class="col-md-9">
 			  <select type="text" class="form-control" name="decisao" id="decisao"  required />
			  

			  	<?php if(isset($decisao) && $decisao!=""){ ?>
			  	<option selected value="<?php echo $decisao;?>"> <?php echo array("Não","Sim")[$decisao];?> </option>
			  	<?php } else{ ?>  
			  	<option value=""> SELECIONE </option>
			  	<?php } ?>   

 			  	<option value="1"> Sim </option>
 			  	<option value="0"> Não </option>


 			  </select>
			  <div class="form-control-focus"> </div>
		      <span class="help-block"></span>
          	  </div>
          </div>	


          <div class="form-group form-md-line-input">
			  <label class="col-md-3 control-label" for="gol_fora">
			  <span class="required">*</span> Regra de gol fora?:
			  </label>  
		  	  <div class="col-md-9">
 			  <select type="text" class="form-control" name="gol_fora" id="gol_fora" required>


 			  
			  	<?php if(isset($gol_fora) && $gol_fora!=""){ ?>
			  	<option selected value="<?php echo $gol_fora;?>"> <?php echo array("Não","Sim")[$gol_fora];?> </option>
			  	<?php } else{ ?>  
			  	<option value=""> SELECIONE </option>
			  	<?php } ?>   

 			  	<option value="1"> Sim </option>
 			  	<option value="0"> Não </option>


 			  </select>


			  <div class="form-control-focus"> </div>
		      <span class="help-block"></span>
          	  </div>
          </div>	


          <div class="form-group form-md-line-input">
			  <label class="col-md-3 control-label" for="tipo_decisao">
			  <span class="required">*</span> Tipo de decisão:
			  </label>  
		  	  <div class="col-md-9">
 			  
 			  <select type="text" class="form-control" name="tipo_decisao" id="tipo_decisao" required>

			  	<?php if(isset($tipo_decisao) && $tipo_decisao!=""){ ?>
			  	<option selected value="<?php echo $tipo_decisao;?>"> <?php echo array("Pênaltis","Melhor campanha")[$tipo_decisao];?> </option>
			  	<?php } else{ ?>  
			  	<option value=""> SELECIONE </option>
			  	<?php } ?>   
 			  	    <option value="0"> Pênaltis </option>  
                    <option value="1"> Melhor campanha </option>

             </select>

			  <div class="form-control-focus"> </div>
		      <span class="help-block"></span>
          	  </div>
          </div>	


         <div class="form-group form-md-line-input">
			  <label class="col-md-3 control-label" for="decisao">
			  <span class="required">*</span> Pontuação continuada:
			  </label>  
		  	  <div class="col-md-9">
 			  <select type="text" class="form-control" name="pontuacao_continuada" id="pontuacao_continuada"  required />
			  

			  	<?php if(isset($pontuacao_continuada) && $pontuacao_continuada!=""){ ?>
			  	<option selected value="<?php echo $pontuacao_continuada;?>"> <?php echo array("Não","Sim")[$pontuacao_continuada];?> </option>
			  	<?php } else{ ?>  
			  	<option value=""> SELECIONE </option>
			  	<?php } ?>   

 			  	<option value="1"> Sim </option>
 			  	<option value="0"> Não </option>


 			  </select>
			  <div class="form-control-focus"> </div>
		      <span class="help-block"></span>
          	  </div>
          </div>	
                    
                    
                                              

	
        <div class="form-actions">
         	<div class="row">
            	<div class="col-md-offset-0 col-md-9">

    
				<?php if($campeonato_id!=0){?>
				<script>
					function desabilitaCampos()
					{
						// document.getElementById("temporada").disabled = true;
						// document.getElementById("tipo").disabled = true;
						// document.getElementById("num_clubes_campeonato").disabled = true;
						// document.getElementById("grupos").disabled = true;
						// document.getElementById("clubes_proxima_fase").disabled = true;
						// document.getElementById("decisao").disabled = true;
						// document.getElementById("gol_fora").disabled = true;
						// document.getElementById("tipo_decisao").disabled = true;

					}
					desabilitaCampos();
				</script>
				<button type="submit" id="botao" class="btn green">Atualizar</button>  <div id="envio"> </div>
				<?php } else{ ?>
				<button type="submit" id="botao" class="btn green">Cadastrar</button>  <div id="envio"> </div>
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