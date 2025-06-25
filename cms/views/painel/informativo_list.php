<?php if(isset($_SESSION["msg"])){?>
<div> <?php echo $_SESSION["msg"];?> </div>
<?php } ?>


<form method="post" name="informativo_off" id="informativo_off" action="informativos_off">

<input type="button" class="btn green" value="Desativar" style="float:right;" onclick="javascript:t=window.confirm('Deseja realmente desativar estes informativos?');if(t){informativo_off.submit();}else{alert('Operação cancelada!')}" /> 
<input type="button" class="btn green" value="Adicionar" onclick="window.location = 'informativo_add'" style="float:right;" /> 

<!-- TITULO DA PÁGINA -->
<h3 class="page-title">INFORMATIVOS <small><i class="fa fa-angle-double-right"></i>  Informativos Publicados</small></h3>
   
<div class="row">
	<div class="col-md-10">
                           
		<!-- TABELA DE CADASTROS-->
        <div class="portlet light bordered">
           <div class="portlet-title">
                <div class="caption font-green">
                    <i class="icon-settings font-green"></i>
                    <span class="caption-subject bold uppercase">informativos Publicados</span>
                </div>
           </div>
    <div class="tools"> </div>
           
	<div class="portlet-body">
    	<table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_2">
        	<thead>
            	<tr>
               		<th></th>
                	<th>Título</th>
                    <th>Categoria</th>
                    <th>Data de Criação</th>
                    <th>Configurações</th>
                </tr>
            </thead>
            
            <tbody>
               
            	<?php foreach($informativos as $informativo): ?>

				<tr>
					<th></th>
					<td> <input type="checkbox" name="checked[]" value="<?php echo $informativo['informativo_id']; ?>" /> <?php echo $informativo['titulo']; ?> </td>
					<td> <?php echo $informativo['categoria_titulo']; ?>  </td>
					<td> <?php echo date('d/m/Y H:i:s', strtotime($informativo['date_add'])); ?> </td>
					<td>
					<div class="actions">
                    <a class="btn btn-circle btn-icon-only btn-default" href="informativo_add/<?php echo $informativo['informativo_id']; ?>">
                    <i class="icon-wrench tooltips" data-original-title="Editar"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only btn-default" href="#" onclick="javascript:t=window.confirm('Deseja realmente desativar este informativo?');if(t){window.location = 'informativo_del/<?php echo $informativo['informativo_id']; ?>';}else{alert('Operação cancelada!')}">
                    <i class="icon-trash tooltips" data-original-title="Deletar"></i>
                    </a>
                    </div>
					</td> 
				</tr>

				<?php endforeach; ?>

            </tbody>
        </table>
	</div>
      
       </div>
	</div>
</div>





