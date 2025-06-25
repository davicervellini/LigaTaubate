<?php if(isset($_SESSION["msg"])){?>
<div> <?php echo $_SESSION["msg"];?> </div>
<?php } ?>


<!-- TITULO DA PÁGINA -->
<h3 class="page-title"> ATIVIDADES <small><i class="fa fa-angle-double-right"></i>  Log de registros</small></h3>
   
<div class="row">
	<div class="col-md-10">
                           
		<!-- TABELA DE CADASTROS-->
        <div class="portlet light bordered">
           <div class="portlet-title">
                <div class="caption font-green">
                    <i class="icon-settings font-green"></i>
                    <span class="caption-subject bold uppercase">Atividades</span>
                </div>
           </div>
    <div class="tools"> </div>
           
	<div class="portlet-body">
    	<table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_2" style="text-transform: uppercase">
        	<thead>
            	<tr>
               		<th></th>
               		<th>&nbsp;</th>
                	<th>Usuário</th>
                    <th>Clube</th>
                    <th>Campeonato</th>
                    <th>Atleta</th>
                    <th>Ação</th>
                    <th>Data da ação</th>
                </tr>
            </thead>
            
            <tbody>
               
            	<?php foreach($atividades as $atividade){ ?>

				<tr>
					<th></th>
                 
					<td><input type="checkbox" name="checked[]" value="<?php echo $atividade['atividade_id']; ?>/<?php echo $atividade['atividade_id']; ?>/<?php echo $atividade['atividade_id']; ?>" /></td>

					<td> <?php echo $atividade['email_usuario']; ?> </td>


                    <td> <?php echo $atividade['clube']; ?> </td>


                    <td> <?php echo $atividade['campeonato']; ?> </td>


                    <td> <?php echo $atividade['atleta']; ?> </td>


                    <td> <?php echo $actions[$atividade['action']]; ?> </td>


                    <td style="font-size:14px; font-weight: bold"> 
                     <?php 
                        echo date('d/m/Y H:i:s',strtotime($atividade['date_add'])); 
                     ?> 
                    </td>


					
             

                    <?php /*
					<div class="actions">
                    <a class="btn btn-circle btn-icon-only btn-default" href="<?php echo BASE;?>painel/atleta_add/<?php echo $clube_id;?>/<?php echo $atleta['atleta_id']; ?>">
                    <i class="icon-wrench tooltips" data-original-title="Editar"></i>
                    </a>

                    <?php if($clube_id==0){?>
                        <a class="btn btn-circle btn-icon-only btn-default" href="#excluir" onclick="javascript:t=window.confirm('Deseja realmente desativar este atleta?');if(t){window.location = '<?php echo BASE;?>painel/atleta_del/<?php echo $atleta['atleta_id']; ?>';}else{alert('Operação cancelada!')}">
                    <i class="icon-trash tooltips" data-original-title="Deletar"></i>
                    </a>
                    <?php } ?>
                    

                    </div>

                    */ ?>

				</tr>

				<?php } ?>

            </tbody>
        </table>
	</div>
      
       </div>
	</div>
</div>