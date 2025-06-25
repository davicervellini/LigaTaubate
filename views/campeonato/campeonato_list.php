<?php if(isset($_SESSION["msg"])){?>
<div> <?php echo $_SESSION["msg"];?> </div>
<?php } ?>


<form method="post" name="campeonato_off" id="campeonato_off" action="off">

<input type="button" class="btn green" value="Desativar" style="float:right;" onclick="javascript:t=window.confirm('Deseja realmente desativar estes estadios?');if(t){campeonato_off.submit();}else{alert('Operação cancelada!')}" /> 
<input type="button" class="btn green" value="Adicionar" onclick="window.location = '<?php echo BASE;?>/campeonato/add'" style="float:right;" /> 

<!-- TITULO DA PÁGINA -->
<h3 class="page-title">CAMPEONATO <small><i class="fa fa-angle-double-right"></i>  Diponíveis para edição</small></h3>
   
<div class="row">
	<div class="col-md-10">
                           
		<!-- TABELA DE CADASTROS-->
        <div class="portlet light bordered">
           <div class="portlet-title">
                <div class="caption font-green">
                    <i class="icon-settings font-green"></i>
                    <span class="caption-subject bold uppercase">Campeonatos cadastrados</span>
                </div>
           </div>
    <div class="tools"> </div>
           
	<div class="portlet-body">
    	<table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_2">
        	<thead>
            	<tr>
               		<th></th>
                	<th>Campeonato</th>
                    <th>Temporada</th>
                    <th>Tipo</th>
                    
                    <th>Configurações</th>
                </tr>
            </thead>
            
            <tbody>
  
  				<?php if(isset($campeonatos)){?>
            	<?php foreach($campeonatos as $campeonato){ ?>

				<tr>
					<th></th>
					<td> <input type="checkbox" name="checked[]" value="<?php echo $campeonato['campeonato_id']; ?>" />  <?php echo $campeonato['nome']; ?> </td>
					<td> <?php echo $campeonato['temporada']; ?> </td>
					<td> <?php echo array("","COPA","PONTOS CORRIDOS")[$campeonato['tipo']];?> </td>
					<td> 
					<div class="actions">
                    <a class="btn btn-circle btn-icon-only btn-default" href="add/<?php echo $campeonato['campeonato_id']; ?>">
                    <i class="icon-wrench tooltips" data-original-title="Editar"></i>
                    </a>

                    <a class="btn btn-circle btn-icon-only btn-default" href="conf/<?php echo $campeonato['campeonato_id']; ?>">
                    <i class="icon-equalizer tooltips" data-original-title="Configurar"></i>
                    </a>


                    <a class="btn btn-circle btn-icon-only btn-default" href="#excluir" onclick="javascript:t=window.confirm('Deseja realmente desativar este campeonato?');if(t){window.location = '<?php echo BASE;?>/campeonato/del/<?php echo $campeonato['campeonato_id']; ?>';}else{alert('Operação cancelada!')}">
                    <i class="icon-trash tooltips" data-original-title="Deletar"></i>
                    </a>
                    </div>
					</td> 
				</tr>

				<?php } ?>
				<?php } ?>

            </tbody>
        </table>
	</div>
      
       </div>
	</div>
</div>