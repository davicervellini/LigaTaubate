<!-- TITULO DA PÁGINA -->
<h3 class="page-title">JOGOS <small><i class="fa fa-angle-double-right"></i> Configuração </small></h3>

<div class="row">
	<div class="col-md-10">

		<!-- BEGIN VALIDATION STATES-->
		<div class="portlet light portlet-fit portlet-form bordered">
			<div class="portlet-title">
				<div class="caption">
					<i class=" icon-layers font-green"></i>
					<span class="caption-subject font-green sbold uppercase">Cadastrar jogos</span>
				</div>
			</div>

			<div class="portlet-body">

				<!-- INICIO DO FORMULÁRIO-->
				<form class="form-horizontal" name="form" id="form" method="post" enctype="multipart/form-data" action="<?php echo BASE; ?>campeonato/jogo_add">


					<div class="form-body">
						<div class="alert alert-danger display-hide">
							<button class="close" data-close="alert"></button> Você tem alguns erros de formulário. Por favor verifique abaixo.
						</div>
						<div class="alert alert-success display-hide">
							<button class="close" data-close="alert"></button> A validação do formulário é bem-sucedida!
						</div>

						<div id="feedback"></div>


						<?php if (isset($mensagem)) { ?>

							<?php echo $mensagem; ?>

						<?php } ?>



						<?php if (isset($jogo_id) && $jogo_id != 0) {
							$botao = "Atualizar"; ?>

							<input type="hidden" name="jogo_id" id="jogo_id" value="<?php echo $jogo_id; ?>" />

						<?php } else {
							$botao = "Cadastrar"; ?>

							<input type="hidden" name="jogo_id" id="jogo_id" value="<?php echo $jogo_id; ?>" />

						<?php } ?>



						<div class="form-group form-md-line-input">
							<label class="col-md-3 control-label" for="campeonato_id">
								<span class="required">*</span> Campeonato:
							</label>
							<div class="col-md-9">

								<select class="form-control" name="campeonato_id" id="campeonato_id" required onchange="carregaGrupos(this.value)" />


								<option selected value=""> Selecione </option>

								<?php if (isset($campeonato)) { ?>

									<option selected value="<?php echo $campeonato["campeonato_id"]; ?>"> <?php echo $campeonato["nome"]; ?>/<?php echo $campeonato["temporada"]; ?> </option>

								<?php } ?>

								<?php foreach ($campeonatos as $campeonato) {
									if ($campeonato['temporada'] == date('Y')) {
								?>
										<option value="<?php echo $campeonato["campeonato_id"]; ?>"> <?php echo $campeonato["nome"]; ?>/<?php echo $campeonato["temporada"]; ?> </option>
								<?php
									}
								}
								?>

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
								<select class="form-control" name="fase" id="fase" required onchange="carregaDivs(this.value)" />

								<option value=""> Selecione </option>

								<?php if (isset($fase)) { ?>


									<option selected value="<?php echo $fase; ?>"> <?php echo $fase; ?> </option>

								<?php } ?>

								<option value="Grupo"> Grupo </option>
								<option value="Decisão"> Decisão </option>


								</select>

								<div class="form-control-focus"> </div>
								<span class="help-block"></span>
							</div>
						</div>

						<div id="rodada">

							<?php if (isset($fase) && $fase != "") {

								if ($fase == "Grupo") {

							?>

									<div class="form-group form-md-line-input">
										<label class="col-md-3 control-label" for="grupo">
											<span class="required">*</span> Grupo:
										</label>
										<div class="col-md-9">
											<select class="form-control" name="grupo" id="grupo" required onchange="carregaClubes(campeonato_id.value,this.value)" />

											<option value=""> Selecione </option>

											<?php if (isset($grupo)) { ?>

												<option selected value="<?php echo $grupo; ?>"> <?php echo $grupo; ?> </option>

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

											<option value=""> Selecione </option>

											<?php if (isset($rodada)) { ?>

												<option selected value="<?php echo $rodada; ?>"> <?php echo $rodada; ?> </option>

											<?php } ?>



											<?php for ($rodada = 1; $rodada <= 20; $rodada++) { ?>
												<option value='<?php echo $rodada; ?>'> <?php echo $rodada; ?> </option>
											<?php } ?>



											</select>

											<div class="form-control-focus"> </div>
											<span class="help-block"></span>
										</div>
									</div>

								<?php  } ?>

								<?php if ($fase == "Decisão") { ?>

									<div class="form-group form-md-line-input">
										<label class="col-md-3 control-label" for="grupo">
											<span class="required">*</span> Chave:
										</label>
										<div class="col-md-9">
											<select class="form-control" name="grupo" id="grupo" required onchange="" />

											<option value=""> Selecione </option>

											<?php if (isset($grupo)) { ?>

												<option selected value="<?php echo $grupo; ?>"> <?php echo $grupo; ?> </option>

											<?php } ?>


											<option value="Chave 1"> Chave 1 </option>
											<option value="Chave 2"> Chave 2 </option>
											<option value="Chave 3"> Chave 3 </option>
											<option value="Chave 4"> Chave 4 </option>
											<option value="Chave 5"> Chave 5 </option>
											<option value="Chave 6"> Chave 6 </option>
											<option value="Chave 7"> Chave 7 </option>
											<option value="Chave 8"> Chave 8 </option>

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

											<option value=""> Selecione </option>

											<?php if (isset($rodada)) { ?>

												<option selected value="<?php echo $rodada; ?>"> <?php echo $rodada; ?> </option>

											<?php } ?>


											<!--JOGO ÚNICO-->
											<optgroup label="Jogo único">

												<option value='b8'> Oitavas de final</option>

												<option value='b4'> Quartas de final</option>

												<option value='b2'> Semi-final</option>

												<option value='c1'> 3º Lugar - Jogo único</option>

												<option value='b1'> Final</option>
											</optgroup>

											<!--JOGO IDA E VOLTA-->
											<optgroup label="Ida e Volta">

												<option value='b8b1'> Oitavas de final - Jogo ida</option>

												<option value='b8b2'> Oitavas de final - Jogo volta</option>


												<option value='b4b1'> Quartas de final - Jogo ida</option>

												<option value='b4b2'> Quartas de final - Jogo volta</option>


												<option value='b2b1'> Semi-final - Jogo ida</option>

												<option value='b2b2'> Semi-final - Jogo volta</option>


												<option value='c1c1'> 3º Lugar - Jogo ida</option>

												<option value='c1c2'> 3º Lugar - Jogo volta</option>





												<option value='b1b1'> Final - Jogo ida</option>

												<option value='b1b2'> Final - Jogo volta</option>



											</optgroup>



											</select>

											<div class="form-control-focus"> </div>
											<span class="help-block"></span>
										</div>
									</div>

								<?php  } ?>
							<?php  } ?>

						</div>


						<div class="form-group form-md-line-input">
							<label class="col-md-3 control-label" for="clube_1">
								<span class="required">*</span> Casa:
							</label>
							<div class="col-md-9">

								<?php if ($fase == "Grupo" && $fase != "Decisão") { ?>
									<select class="form-control" name="clube_1" id="clube_1" required ondblclick="carregaClubes(campeonato_id.value,grupo.value)" />
								<?php } else { ?>
									<select class="form-control" name="clube_1" id="clube_1" required ondblclick="carregaClubesDecisao()" />
								<?php } ?>


								<option value=""> Selecione </option>

								<?php if (isset($clube_1)) { ?>

									<option selected value="<?php echo $clube_1["clube_id"]; ?>"> <?php echo $clube_1["nome"]; ?> </option>

								<?php } ?>


								</select>

								<div class="form-control-focus"> </div>
								<span class="help-block"></span>
							</div>
						</div>



						<div class="form-group form-md-line-input">
							<label class="col-md-3 control-label" for="clube_2">
								<span class="required">*</span> Visitante:
							</label>
							<div class="col-md-9">

								<?php if ($fase == "Grupo" && $fase != "Decisão") { ?>
									<select class="form-control" name="clube_2" id="clube_2" required ondblclick="carregaClubes(campeonato_id.value,grupo.value)" />
								<?php } else { ?>
									<select class="form-control" name="clube_2" id="clube_2" required ondblclick="carregaClubesDecisao()" />
								<?php } ?>


								<option value=""> Selecione </option>

								<?php if (isset($clube_2)) { ?>

									<option selected value="<?php echo $clube_2["clube_id"]; ?>"> <?php echo $clube_2["nome"]; ?> </option>

								<?php } ?>



								</select>

								<div class="form-control-focus"> </div>
								<span class="help-block"></span>
							</div>
						</div>


						<div class="form-group form-md-line-input">
							<label class="col-md-3 control-label" for="estadio_id">
								<span class="required">*</span> Local:
							</label>
							<div class="col-md-9">
								<select class="form-control" name="estadio_id" id="estadio_id" required />

								<option value=""> Selecione </option>


								<?php if (isset($estadio)) { ?>

									<option selected value="<?php echo $estadio["estadio_id"]; ?>"> <?php echo $estadio["campo"]; ?> </option>

								<?php } ?>



								<?php foreach ($estadios as $estadio) { ?>

									<option value="<?php echo $estadio["estadio_id"]; ?>"> <?php echo $estadio["campo"]; ?> </option>

								<?php } ?>

								</select>

								<div class="form-control-focus"> </div>
								<span class="help-block"></span>
							</div>
						</div>

						<?/*
          <div class="form-group form-md-line-input">
			  <label class="col-md-3 control-label" for="arbitragem_id">
			  <span class=""></span> Árbitro:
			  </label>  
		  	  <div class="col-md-9">
		  	  	<select class="form-control" name="arbitragem_id" id="arbitragem_id"/>

		  	  	<option value=""> Selecione </option>


		  	  		<?php if(isset($arbitragem)){?>

	 			  	<option selected value="<?php echo $arbitragem["arbitragem_id"];?>"> <?php echo $arbitragem["nome"];?> / <?php echo $arbitragem["funcao"];?> </option>

	 			  	<?php } ?>




 			  		<?php foreach($arbitros as $arbitro){?>

 			  			<option value="<?php echo $arbitro["arbitragem_id"];?>"> <?php echo $arbitro["nome"];?> / <?php echo $arbitro["funcao"];?> </option>

					<?php } ?>
	
 			  </select>

			  <div class="form-control-focus"> </div>
		      <span class="help-block"></span>
          	  </div>
          </div>


          <div class="form-group form-md-line-input">
			  <label class="col-md-3 control-label" for="auxiliar_1">
			  <!--<span class="required">*</span>--> Auxiliar 1:
			  </label>  
		  	  <div class="col-md-9">
		  	  	<select class="form-control" name="auxiliar_1" id="auxiliar_1" /><!--required-->

		  	  	<option value=""> Selecione </option>

		  	  		<?php if(isset($auxiliar_1)){?>

	 			  	<option selected value="<?php echo $auxiliar_1["arbitragem_id"];?>"> <?php echo $auxiliar_1["nome"];?> / <?php echo $auxiliar_1["funcao"];?> </option>

	 			  	<?php } ?>


		  	  	 	<?php foreach($arbitros as $arbitro){?>

 			  			<option value="<?php echo $arbitro["arbitragem_id"];?>"> <?php echo $arbitro["nome"];?> / <?php echo $arbitro["funcao"];?> </option>

					<?php } ?>


 			  </select>

			  <div class="form-control-focus"> </div>
		      <span class="help-block"></span>
          	  </div>
          </div>

          <div class="form-group form-md-line-input">
			  <label class="col-md-3 control-label" for="auxiliar_2">
			  <span></span> Auxiliar 2:
			  </label>  
		  	  <div class="col-md-9">
		  	  	<select class="form-control" name="auxiliar_2" id="auxiliar_2"/>

		  	  	<option value=""> Selecione </option>

		  	  		<?php if(isset($auxiliar_2)){?>

	 			  	<option selected value="<?php echo $auxiliar_2["arbitragem_id"];?>"> <?php echo $auxiliar_2["nome"];?> / <?php echo $auxiliar_2["funcao"];?> </option>

	 			  	<?php } ?>


		  	  	 	<?php foreach($arbitros as $arbitro){?>

 			  			<option value="<?php echo $arbitro["arbitragem_id"];?>"> <?php echo $arbitro["nome"];?> / <?php echo $arbitro["funcao"];?> </option>

					<?php } ?>

 			  </select>

			  <div class="form-control-focus"> </div>
		      <span class="help-block"></span>
          	  </div>
          </div>



           <div class="form-group form-md-line-input">
			  <label class="col-md-3 control-label" for="representante">
			  <span></span> Representante:
			  </label>  
		  	  <div class="col-md-9">
		  	  	<select class="form-control" name="representante" id="representante"  />

		  	  	<option value=""> Selecione </option>


		  	  		<?php if(isset($representante)){?>

	 			  	<option selected value="<?php echo $representante["arbitragem_id"];?>"> <?php echo $representante["nome"];?> / <?php echo $representante["funcao"];?> </option>

	 			  	<?php } ?>




 			  		<?php foreach($arbitros as $arbitro){?>

 			  			<option value="<?php echo $arbitro["arbitragem_id"];?>"> <?php echo $arbitro["nome"];?> / <?php echo $arbitro["funcao"];?> </option>

					<?php } ?>
	
 			  </select>

			  <div class="form-control-focus"> </div>
		      <span class="help-block"></span>
          	  </div>
          </div>

          <div class="form-group form-md-line-input">
			  <label class="col-md-3 control-label" for="delegado">
			  <span></span> Delegado:
			  </label>  
		  	  <div class="col-md-9">
 			  <input type="text" class="form-control" name="delegado" id="delegado" value="<?php echo $delegado;?>" />
			  <div class="form-control-focus"> </div>
		      <span class="help-block"></span>
          	  </div>
          </div>

*/ ?>

						<?php /* 
          <div class="form-group form-md-line-input">
			  <label class="col-md-3 control-label" for="representante">
			  <span class="required">*</span> Representante:
			  </label>  
		  	  <div class="col-md-9">
 			  <input type="text" class="form-control" name="representante" id="representante" value="<?php echo $representante;?>" required />
			  <div class="form-control-focus"> </div>
		      <span class="help-block"></span>
          	  </div>
          </div>
          */ ?>



						<div class="form-group form-md-line-input">
							<label class="col-md-3 control-label" for="data">
								<span class="required">*</span> Data:
							</label>
							<div class="col-md-9">
								<input type="text" class="form-control" name="data" id="data" value="<?php echo $data; ?>" required />
								<div class="form-control-focus"> </div>
								<span class="help-block"></span>
							</div>
						</div>


						<div class="form-group form-md-line-input">
							<label class="col-md-3 control-label" for="hora">
								<span class="required">*</span> Hora:
							</label>
							<div class="col-md-9">
								<input type="text" class="form-control" name="hora" id="hora" value="<?php echo $hora; ?>" required />
								<div class="form-control-focus"> </div>
								<span class="help-block"></span>
							</div>
						</div>


						<div class="form-group form-md-line-input">
							<label class="col-md-3 control-label" for="obs">
								<span class="required"></span> Obs:
							</label>
							<div class="col-md-9">
								<textarea class="form-control" name="obs" id="obs"><?php echo $obs; ?></textarea>
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

								<?php if (isset($realizado)) { ?>

									<option selected value="<?php echo $realizado; ?>"> <?php echo array("Não", "Sim")[$realizado]; ?> </option>

								<?php } ?>



								</select>

								<div class="form-control-focus"> </div>
								<span class="help-block"></span>
							</div>
						</div>


						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-0 col-md-9">



									<button type="button" id="botao" onclick="cadastraJogoAjax()" class="btn green"><?php echo $botao; ?></button>
									<div id="envio"> </div>


								</div>
							</div>
						</div>
				</form>

			</div>

		</div>
	</div>
</div>
</div>

<script type="text/javascript" src="<?php BASE; ?>assets/js/carregaGrupos.js"></script>

<script>
	function envia() {
		document.getElementById("botao").style.display = "none";
		document.getElementById("envio").innerHTML = "Aguarde! Processando...";

	}
</script>

<script>
	jQuery(function($) {

		$("#data").mask("99/99/9999");
		$("#hora").mask("99:99");

	});

	function carregaGrupos(x) {
		var xmlhttp;
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}

		xmlhttp.onreadystatechange = function() {

			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

				document.getElementById("grupo").innerHTML = xmlhttp.responseText;

			}
		}
		var id = x;


		var campos = "campeonato_id=" + id;


		xmlhttp.open("POST", "<?php echo BASE . "campeonato/carrega_grupos/"; ?>", true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); // Setando Content-type
		xmlhttp.send(campos);

	}



	function carregaClubes(x, y) {
		var xmlhttp;
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}

		xmlhttp.onreadystatechange = function() {

			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

				document.getElementById("clube_1").innerHTML = xmlhttp.responseText;
				document.getElementById("clube_2").innerHTML = xmlhttp.responseText;
			}
		}
		var id = x;
		var grupo = y;


		var campos = "campeonato_id=" + id + "&grupo=" + grupo;


		xmlhttp.open("POST", "<?php echo BASE . "campeonato/carrega_clubes/"; ?>", true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); // Setando Content-type
		xmlhttp.send(campos);

	}


	function carregaClubesDecisao() {
		var xmlhttp;
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}

		xmlhttp.onreadystatechange = function() {

			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

				document.getElementById("clube_1").innerHTML = xmlhttp.responseText;
				document.getElementById("clube_2").innerHTML = xmlhttp.responseText;


			}
		}
		var id = document.getElementById("campeonato_id").value;

		var campos = "campeonato_id=" + id;


		xmlhttp.open("POST", "<?php echo BASE . "campeonato/carrega_clubes_decisao/"; ?>", true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); // Setando Content-type
		xmlhttp.send(campos);

	}


	function carregaDivs(fase) {
		var xmlhttp;
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}

		xmlhttp.onreadystatechange = function() {

			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

				document.getElementById("rodada").innerHTML = xmlhttp.responseText;


				if (fase == "Grupo") {
					carregaGrupos(document.getElementById("campeonato_id").value);
				}
				if (fase == "Decisão") {
					carregaClubesDecisao();
				}
			}
		}

		var campos = "fase=" + fase;


		xmlhttp.open("POST", "<?php echo BASE . "campeonato/carrega_divs/"; ?>", true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); // Setando Content-type
		xmlhttp.send(campos);

	}
</script>


<script>
	function cadastraJogoAjax() {
		var xmlhttp;
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}

		xmlhttp.onreadystatechange = function() {

			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

				document.getElementById("feedback").innerHTML = xmlhttp.responseText;
				alert(xmlhttp.responseText);
			}
		}
		var jogo_id = document.getElementById("jogo_id").value;
		var campeonato_id = document.getElementById("campeonato_id").value;
		var fase = document.getElementById("fase").value;
		var grupo = document.getElementById("grupo").value;
		var rodada = form.rodada.value;
		var clube_1 = document.getElementById("clube_1").value;
		var clube_2 = document.getElementById("clube_2").value;
		var estadio_id = document.getElementById("estadio_id").value;

		var arbitragem_id = "88"; //document.getElementById("arbitragem_id").value;
		var auxiliar_1 = "88"; //document.getElementById("auxiliar_1").value;
		var auxiliar_2 = "88"; //document.getElementById("auxiliar_2").value;
		var representante = "88"; //document.getElementById("representante").value;
		var delegado = "88"; //document.getElementById("delegado").value;

		var data = document.getElementById("data").value;
		var hora = document.getElementById("hora").value;
		var obs = document.getElementById("obs").value;
		var realizado = document.getElementById("realizado").value;



		var campos = "jogo_id=" + jogo_id + "&campeonato_id=" + campeonato_id + "&fase=" + fase + "&grupo=" + grupo + "&rodada=" + rodada + "&clube_1=" + clube_1 + "&clube_2=" + clube_2 + "&estadio_id=" + estadio_id + "&arbitragem_id=" + arbitragem_id + "&auxiliar_1=" + auxiliar_1 + "&auxiliar_2=" + auxiliar_2 + "&representante=" + representante + "&delegado=" + delegado + "&data=" + data + "&hora=" + hora + "&obs=" + obs + "&realizado=" + realizado;


		xmlhttp.open("POST", "<?php echo BASE . "campeonato/cadastrajogoajax/"; ?>", true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); // Setando Content-type
		xmlhttp.send(campos);

	}
</script>