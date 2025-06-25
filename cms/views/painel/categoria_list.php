<?php if(isset($_SESSION["msg"])){?>
<div> <?php echo $_SESSION["msg"];?> </div>
<?php } ?>


<form method="post" name="categorias_off" id="categorias_off" action="categorias_off">

<input type="button" class="btn green" value="Desativar" style="float:right;" onclick="javascript:t=window.confirm('Deseja realmente desativar esta categoria?');if(t){categorias_off.submit();}else{alert('Operação cancelada!')}" /> 
<input type="button" class="btn green" value="Adicionar" onclick="window.location = 'categoria_add'" style="float:right;" /> 

<!-- TITULO DA PÁGINA -->
<h3 class="page-title">CATEGORIAS <small><i class="fa fa-angle-double-right"></i>  Categorias Cadastradas</small></h3>
   
<div class="row">
	<div class="col-md-10">
                           
		<!-- TABELA DE CADASTROS-->
        <div class="portlet light bordered">
           <div class="portlet-title">
                <div class="caption font-green">
                    <i class="icon-settings font-green"></i>
                    <span class="caption-subject bold uppercase">Categorias cadastradas</span>
                </div>
           </div>
    <div class="tools"> </div>
           
	<div class="portlet-body">
    	<table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_2">
        	<thead>
            	<tr>
               		<th></th>
                	<th>Título</th>
                    <th>URL</th>
                    <th>Descrição</th>
                    <th>Data de Criação</th>
                    <th>Configurações</th>
                </tr>
            </thead>
            
            <tbody>
               
            	<?php foreach($categorias as $categoria): ?>

				<tr>
					<th></th>
					<td> <input type="checkbox" name="checked[]" value="<?php echo $categoria['categoria_id']; ?>" /> <?php echo $categoria['titulo']; ?> </td>
					<td> <?php echo $categoria['url']; ?> </td>
					<td> <?php echo $categoria['corpo']; ?> </td>
					<td> <?php echo date('d/m/Y', strtotime($categoria['date_add'])); ?> </td>
					<td>
					<div class="actions">
                    <a class="btn btn-circle btn-icon-only btn-default" href="categoria_add/<?php echo $categoria['categoria_id']; ?>">
                    <i class="icon-wrench tooltips" data-original-title="Editar"></i>
                    </a>
                    
                    <a class="btn btn-circle btn-icon-only btn-default" href="#excluir" onclick="javascript:t=window.confirm('Deseja realmente desativar esta categoria?');if(t){window.location = 'categoria_del/<?php echo $categoria['categoria_id']; ?>';}else{alert('Operação cancelada!')}">
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