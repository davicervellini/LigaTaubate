<!-- TITULO DA PÁGINA -->
<h3 class="page-title">JOGOS <small><i class="fa fa-angle-double-right"></i> Configuração </small></h3>

	<div class="row">
		<div class="col-md-10">
			
			<!-- BEGIN VALIDATION STATES-->
				<div class="portlet light portlet-fit portlet-form bordered">
					<div class="portlet-title">
						<div class="caption">
							<i class=" icon-layers font-green"></i>
							<span class="caption-subject font-green sbold uppercase">Registrar resultado</span>
						</div>					
                    </div>
						
	<div class="portlet-body">
                                                        
    <!-- INICIO DO FORMULÁRIO-->
    <form class="form-horizontal" name="form" id="form" method="post" enctype="multipart/form-data" action="<?php echo BASE;?>campeonato/jogo_resultado/<?php echo $jogo_id;?>"> 

		
    	<div class="form-body">
        	<div class="alert alert-danger display-hide">
            	<button class="close" data-close="alert"></button> Você tem alguns erros de formulário. Por favor verifique abaixo.
			</div>
        <div class="alert alert-success display-hide">
        	<button class="close" data-close="alert"></button> A validação do formulário é bem-sucedida!
		</div>

		<?php if(isset($mensagem)){?>	

		<?php echo $mensagem;?>

		<?php }?>


		
		<?php if(isset($jogo_id) && $jogo_id!=0){ $botao = "Atualizar";?>

			<input type="hidden" name="jogo_id" value="<?php echo $jogo_id;?>" />

		<?php } else { $botao = "Cadastrar"; ?>

			<input type="hidden" name="jogo_id" value="<?php echo $jogo_id;?>" />

		<?php } ?>

			<input type="hidden" name="pontuacao_continuada" value="<?php echo $campeonato["pontuacao_continuada"];?>" />



          <div class="form-group form-md-line-input">
			  <label class="col-md-3 control-label" for="campeonato_id">
			  <span class="required">*</span> Campeonato:
			  </label>  
		  	  <div class="col-md-9">
 			  
 			  <select class="form-control" name="campeonato_id" id="campeonato_id" required  />
 			  

 			  	<?php if(isset($campeonato)){?>

 			  	<option selected value="<?php echo $campeonato["campeonato_id"];?>"> <?php echo $campeonato["nome"];?>/<?php echo $campeonato["temporada"];?> </option>

 			  	<?php } ?>

	
 			  </select>

			  <div class="form-control-focus"> </div>
		      <span class="help-block"></span>
          	  </div>
          </div>	




          <div class="form-group form-md-line-input">
			  <label class="col-md-3 control-label" for="fase">
			  <span class="required">*</span> Fase:
			  </label>  
		  	  <div class="col-md-9">
		  	  	<select class="form-control" name="fase" id="fase" required  />


		  	  	<?php if(isset($fase)){?>

 			  	<option selected value="<?php echo $fase;?>"> <?php echo $fase;?> </option>

 			  	<?php } ?>


 			  </select>

			  <div class="form-control-focus"> </div>
		      <span class="help-block"></span>
          	  </div>
          </div>



          <div class="form-group form-md-line-input">
			  <label class="col-md-3 control-label" for="grupo">
			  <span class="required">*</span> Grupo:
			  </label>  
		  	  <div class="col-md-9">
		  	  	<select class="form-control" name="grupo" id="grupo" required  />


		  	  	<?php if(isset($grupo)){?>

 			  	<option selected value="<?php echo $grupo;?>"> <?php echo $grupo;?> </option>

 			  	<?php } ?>


 			  </select>

			  <div class="form-control-focus"> </div>
		      <span class="help-block"></span>
          	  </div>
          </div>


          <div class="form-group form-md-line-input">
			  <label class="col-md-3 control-label" for="rodada">
			  <span class="required">*</span> Rodada:
			  </label>  
		  	  <div class="col-md-9">
		  	  	<select class="form-control" name="rodada" id="rodada" required />


			  	  	<?php if(isset($rodada)){?>

	 			  	<option selected value="<?php echo $rodada;?>"> <?php echo $rodada;?> </option>

	 			  	<?php } ?>


 			  </select>

			  <div class="form-control-focus"> </div>
		      <span class="help-block"></span>
          	  </div>
          </div>



          <div class="form-group form-md-line-input">
			  <label class="col-md-3 control-label" for="clube_1">
			  <span class="required">*</span> Casa:
			  </label>  
		  	  <div class="col-md-9">
		  	  	<select class="form-control" name="clube_1" id="clube_1" required  />


		  	  		<?php if(isset($clube_1)){?>

	 			  	<option selected value="<?php echo $clube_1["clube_id"];?>"> <?php echo $clube_1["nome"];?> </option>

	 			  	<?php } ?>


 			  </select>

			  <div class="form-control-focus"> </div>
		      <span class="help-block"></span>
          	  </div>
          </div>


           <div class="form-group form-md-line-input">
			  <label class="col-md-3 control-label" for="result_clube_1">
			  <span class="required">*</span> Resultado:
			  </label>  
		  	  <div class="col-md-9">
 			  <input type="number" min="0" class="form-control" name="result_clube_1" id="result_clube_1" value="<?php echo $result_clube_1;?>" required />
			  <div class="form-control-focus"> </div>
		      <span class="help-block"></span>
          	  </div>
          </div>


          <?php if(isset($fase) && $fase=="Decisão"){?>

           <div class="form-group form-md-line-input">
			  <label class="col-md-3 control-label" for="penal_clube_1">
			  <span class="required">*</span> Penâltis:
			  </label>  
		  	  <div class="col-md-9">
 			  <input type="number" min="0" class="form-control" name="penal_clube_1" id="penal_clube_1" value="<?php echo $penal_clube_1;?>" required />
			  <div class="form-control-focus"> </div>
		      <span class="help-block"></span>
          	  </div>
          </div>

          <?php } ?>



         <div class="form-group form-md-line-input">
			  <label class="col-md-3 control-label" for="clube_2">
			  <span class="required">*</span> Visitante:
			  </label>  
		  	  <div class="col-md-9">
		  	  	<select class="form-control" name="clube_2" id="clube_2" required/>

		  	  		<?php if(isset($clube_2)){?>

	 			  	<option selected value="<?php echo $clube_2["clube_id"];?>"> <?php echo $clube_2["nome"];?> </option>

	 			  	<?php } ?>



 			  </select>

			  <div class="form-control-focus"> </div>
		      <span class="help-block"></span>
          	  </div>
          </div>


          <div class="form-group form-md-line-input">
			  <label class="col-md-3 control-label" for="result_clube_2">
			  <span class="required">*</span> Resultado:
			  </label>  
		  	  <div class="col-md-9">
 			  <input type="number" min="0" class="form-control" name="result_clube_2" id="result_clube_2" value="<?php echo $result_clube_2;?>" required />
			  <div class="form-control-focus"> </div>
		      <span class="help-block"></span>
          	  </div>
          </div>



         <?php if(isset($fase) && $fase=="Decisão"){?>

           <div class="form-group form-md-line-input">
			  <label class="col-md-3 control-label" for="penal_clube_2">
			  <span class="required">*</span> Penâltis:
			  </label>  
		  	  <div class="col-md-9">
 			  <input type="number" min="0" class="form-control" name="penal_clube_2" id="penal_clube_2" value="<?php echo $penal_clube_2;?>" required />
			  <div class="form-control-focus"> </div>
		      <span class="help-block"></span>
          	  </div>
          </div>

          <?php } ?>


          <div class="form-group form-md-line-input">
			  <label class="col-md-3 control-label" for="obs">
			  <span class="required"></span> Obs:
			  </label>  
		  	  <div class="col-md-9">
 			  <textarea class="form-control" name="obs" id="obs" ><?php echo $obs;?></textarea>
			  <div class="form-control-focus"> </div>
		      <span class="help-block"></span>
          	  </div>
          </div>

          <div class="form-group form-md-line-input">
			  <label class="col-md-3 control-label" for="realizado">
			  <span class="required">*</span> Realizado:
			  </label>  
		  	  <div class="col-md-9">
 			  	
 			  	<select class="form-control" name="realizado" id="realizado" required />

		  	  		<option value=""> Selecione </option>





		  	  		<option value="1"> Sim </option>
		  	  		<option value="0" selected> Não </option>

		  	  		<?php if(isset($realizado)){?>

	 			  	<option selected value="<?php echo $realizado;?>"> <?php echo array("Não","Sim")[$realizado];?> </option>

	 			  	<?php } ?>


	
 			  	</select>

			  <div class="form-control-focus"> </div>
		      <span class="help-block"></span>
          	  </div>
          </div>

         <!--OCORRENCIAS-->

        <div class="form-group form-md-line-input">
		  		<label class="col-md-3 control-label" for="ocorrencias">
		  		<span class="required">*</span> Ocorrências :
		  		</label>
		  		<div class="col-md-9">
		  		<div class="input_fields_wrap">
		  		
		  		<div>



		  			
					<button class="add_field_button dt-button buttons-print btn dark btn-outline">Adicionar ocorrência</button>
					<em><span style="padding-top: 5px; font-size: 14px;color: #888;">(<span class="required">*</span> Limite máx. 5 mandantes)</span></em>
		  		
		  		</div>

           
            <?php if(!empty($ocorrencias_partida)){?>
            <?php foreach($ocorrencias_partida as $op){?>

            <div>


            <p>
              <select class="form-control" name="ocorrencias[]" id="ocorrencias" required >
             
             	<option value="<?php echo $op["ref"];?>"> <?php echo $op["ref_descricao"];?> </option>
              
              </select>

               <select class="form-control" name="atletas[]" id="atletas" required >
             
             	<option value="<?php echo $op["value"];?>"> <?php echo $op["value_descricao"];?> </option>
              
              </select>


            </p>

            <a href="#" style="float:right" class="remove_field">Remover ocorrência</a>

            </div>

            <?php } ?>
            <?php } ?>

				


		  		</div>  		
         		<div class="form-control-focus"></div>
          		</div>
          </div> 



         <!--/OCORRENCIAS-->


         <h3> Anexos </h3>

         <div class="form-group form-md-line-input">
			  <label class="col-md-3 control-label" for="sumula-pg1">
			  <span class="required"></span> Súmula - Página 1:
			  </label>  
		  	  <div class="col-md-9">
 			  <input type="file" class="form-control" name="sumula-pg1" id="sumula-pg1" />
			  <div class="form-control-focus"></div>
		      <span class="help-block"></span>
		      <input type="hidden" name="sumula-pg1-id" value="<?php if(isset($sumula_pg1[0]["foto_id"])){ echo $sumula_pg1[0]["foto_id"];} ?>" />
		      <?php if(isset($sumula_pg1[0]["foto"])){ ?> <a href="https://www.ligataubate.com.br/cms/assets/images/sumulas/<?php echo $sumula_pg1[0]["parent"];?>/<?php echo $sumula_pg1[0]["foto"];?>" target="_blank"> Anexo </a> 

		      	[
      			<a href="#excluir" onclick="javascript:t=window.confirm('Deseja realmente excluir este anexo?');if(t){window.location='<?php echo BASE;?>campeonato/exclui_julgamento/<?php echo $sumula_pg1[0]["foto_id"];?>';}else{alert('Operação cancelada!')}" >
      				excluir
      			</a>
      			]


		      <?php } ?>
          	  </div>
          </div>


         <div class="form-group form-md-line-input">
			  <label class="col-md-3 control-label" for="sumula-pg2">
			  <span class="required"></span> Súmula - Página 2:
			  </label>  
		  	  <div class="col-md-9">
 			  <input type="file" class="form-control" name="sumula-pg2" id="sumula-pg2" />
			  <div class="form-control-focus"> </div>
		      <span class="help-block"></span>
		      <input type="hidden" name="sumula-pg2-id" value="<?php if(isset($sumula_pg2[0]["foto_id"])){ echo $sumula_pg2[0]["foto_id"];} ?>" />
		      <?php if(isset($sumula_pg2[0]["foto"])){ ?> <a href="https://www.ligataubate.com.br/cms/assets/images/sumulas/<?php echo $sumula_pg2[0]["parent"];?>/<?php echo $sumula_pg2[0]["foto"];?>" target="_blank"> Anexo </a> 

		      	[
      			<a href="#excluir" onclick="javascript:t=window.confirm('Deseja realmente excluir este anexo?');if(t){window.location='<?php echo BASE;?>campeonato/exclui_julgamento/<?php echo $sumula_pg2[0]["foto_id"];?>';}else{alert('Operação cancelada!')}" >
      				excluir
      			</a>
      			]

		      <?php } ?>
          	  </div>
          </div>

          <div class="form-group form-md-line-input">
			  <label class="col-md-3 control-label" for="sumula-pg3">
			  <span class="required"></span> Súmula - Página 3:
			  </label>  
		  	  <div class="col-md-9">
 			  <input type="file" class="form-control" name="sumula-pg3" id="sumula-pg3" />
			  <div class="form-control-focus"> </div>
		      <span class="help-block"></span>
		      <input type="hidden" name="sumula-pg3-id" value="<?php if(isset($sumula_pg3[0]["foto_id"])){ echo $sumula_pg3[0]["foto_id"];} ?>" />
		      <?php if(isset($sumula_pg3[0]["foto"])){ ?> <a href="https://www.ligataubate.com.br/cms/assets/images/sumulas/<?php echo $sumula_pg3[0]["parent"];?>/<?php echo $sumula_pg3[0]["foto"];?>" target="_blank"> Anexo </a> 

	      		[
      			<a href="#excluir" onclick="javascript:t=window.confirm('Deseja realmente excluir este anexo?');if(t){window.location='<?php echo BASE;?>campeonato/exclui_julgamento/<?php echo $sumula_pg3[0]["foto_id"];?>';}else{alert('Operação cancelada!')}" >
      				excluir
      			</a>
      			]

		      <?php } ?>
          	  </div>
          </div>


           <div class="form-group form-md-line-input">
			  <label class="col-md-3 control-label" for="sumula-delegado">
			  <span class="required"></span> Súmula - Delegado:
			  </label>  
		  	  <div class="col-md-9">
 			  <input type="file" class="form-control" name="sumula-delegado" id="sumula-delegado" />
			  <div class="form-control-focus"> </div>
		      <span class="help-block"></span>
		      <input type="hidden" name="sumula-delegado-id" value="<?php if(isset($sumula_delegado[0]["foto_id"])){ echo $sumula_delegado[0]["foto_id"];} ?>" />
		      <?php if(isset($sumula_delegado[0]["foto"])){ ?> <a href="https://www.ligataubate.com.br/cms/assets/images/sumulas/<?php echo $sumula_delegado[0]["parent"];?>/<?php echo $sumula_delegado[0]["foto"];?>" target="_blank"> Anexo </a>


		            [
          			<a href="#excluir" onclick="javascript:t=window.confirm('Deseja realmente excluir este anexo?');if(t){window.location='<?php echo BASE;?>campeonato/exclui_julgamento/<?php echo $sumula_delegado[0]["foto_id"];?>';}else{alert('Operação cancelada!')}" >
          				excluir
          			</a>
          			]
          		

		       <?php } ?>
          	  </div>
          </div>


          <div class="form-group form-md-line-input">
			  <label class="col-md-3 control-label" for="sumula-julgamento">
			  <span class="required"></span> Julgamentos (Múltiplo):
			  </label>  
		  	  <div class="col-md-9">
 			  <input type="file" class="form-control" name="sumula-julgamento[]" id="sumula-julgamento" multiple />
			  <div class="form-control-focus"> </div>
		      <span class="help-block"></span>
          	  </div>
          </div>



          <?php if(!empty($sumula_julgamento)){?>

          	<h3> Anexos de julgamentos </h3> 
          <?php foreach($sumula_julgamento as $jul){?>

          	<p> <a target="_blank" href="https://www.ligataubate.com.br/cms/assets/images/sumulas/<?php echo $jul["parent"];?>/<?php echo $jul["foto"];?>"> Anexo </a> 

          		
          			[
          			<a href="#excluir" onclick="javascript:t=window.confirm('Deseja realmente excluir este anexo?');if(t){window.location='<?php echo BASE;?>campeonato/exclui_julgamento/<?php echo $jul["foto_id"];?>';}else{alert('Operação cancelada!')}" >
          				excluir
          			</a>
          			]
          		


          	</p> 

          <?php } ?>
          <?php } ?>


                                              
        <div class="form-actions">
         	<div class="row">
            	<div class="col-md-offset-0 col-md-9">

   					

   					 <button type="submit" class="btn green"><?php echo $botao;?></button>


                </div>
            </div>
         </div>
      </form>
			
	</div>
	
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php BASE;?>assets/js/carregaGrupos.js"></script>

<script>

	jQuery(function($){
	
	$("#data").mask("99/99/9999");
	$("#hora").mask("99:99");
		
});

function carregaGrupos(x){
	var xmlhttp;
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}else{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		
	xmlhttp.onreadystatechange = function(){
	
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			
			document.getElementById("grupo").innerHTML = xmlhttp.responseText;
			
		}		
	}
	var id  = x;
	
	
	var campos  = "campeonato_id="+id;
	
	
	xmlhttp.open("POST","<?php echo BASE."campeonato/carrega_grupos/";?>",true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");	// Setando Content-type
	xmlhttp.send(campos);
	
}



function carregaClubes(x,y){
	var xmlhttp;
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}else{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		
	xmlhttp.onreadystatechange = function(){
	
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			
			document.getElementById("clube_1").innerHTML = xmlhttp.responseText;
			document.getElementById("clube_2").innerHTML = xmlhttp.responseText;
		}		
	}
	var id  = x;
	var grupo  = y;
	
	
	var campos  = "campeonato_id="+id+"&grupo="+grupo;
	
	
	xmlhttp.open("POST","<?php echo BASE."campeonato/carrega_clubes/";?>",true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");	// Setando Content-type
	xmlhttp.send(campos);
	
}

</script>

<?php $casa = array();?>
<?php $visitante = array();?>

<script>
	
$(document).ready(function() {
    var max_fields      = 100; //Valor maximo de caixas
    var wrapper         = $(".input_fields_wrap"); //Campos
    var add_button      = $(".add_field_button"); //Adcionar botão
    
    var x = 0; //Valor da contagem inicial
    $(add_button).click(function(e){ //Quando clicar no botão ADD
        e.preventDefault();
        if(x < max_fields){ //Valor maximo de input
            x++; //Incremento
            $(wrapper).append('<div><p><select class="form-control" name="ocorrencias[]" id="ocorrencias" required > <option value=""> --- Selecione a ocorrência  --- </option> <?php foreach($ocorrencias as $ocorrencia){?> <option value="<?php echo $ocorrencia["code"];?>"> <?php echo $ocorrencia["value"];?></option> <?php }?> </select> <select class="form-control" name="atletas[]" id="atletas" required > <option value=""> --- Selecione o atleta  --- </option>  <optgroup label="Casa"> <?php foreach($atletas as $atleta){ if(array_key_exists("casa", $atleta["atletas"])){ if($atleta["atletas"]["casa"]["funcao"]=="Atleta"){ ?> ** <?php array_push($casa, $atleta["atletas"]["casa"]["nome"]."@".$atleta["atletas"]["casa"]["atleta_id"]);?>   ** <?php } } }?>  <?php asort($casa); foreach($casa as $cs){ $cs = explode("@", $cs);?> <option value="<?php echo $cs[1];?>"> <?php echo $cs[0];?> </option> <?php } ?> </optgroup> <optgroup label="Visitante"> <?php foreach($atletas as $atleta){ if(array_key_exists("visitante", $atleta["atletas"])){ if($atleta["atletas"]["visitante"]["funcao"]=="Atleta"){ ?> *** <?php array_push($visitante, $atleta["atletas"]["visitante"]["nome"]."@".$atleta["atletas"]["visitante"]["atleta_id"]);?>   *** <?php } } }?> <?php asort($visitante); foreach($visitante as $vs){ $vs = explode("@", $vs);?> <option value="<?php echo $vs[1];?>"> <?php echo $vs[0];?> </option> <?php } ?> </optgroup></select></p><a href="#" style="float:right" class="remove_field">Remover ocorrência</a></div>'); //Adicionar input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //Remover as caixas de mandante
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
	
</script>
