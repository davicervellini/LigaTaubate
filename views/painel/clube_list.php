<?php if(isset($_SESSION["msg"])){?>
<div> <?php echo $_SESSION["msg"];?> </div>
<?php } ?>


<form method="post" name="clubes_off" id="clubes_off" action="clubes_off">

<input type="button" class="btn green" value="Desativar" style="float:right;" onclick="javascript:t=window.confirm('Deseja realmente desativar este clube?');if(t){clubes_off.submit();}else{alert('Operação cancelada!')}" /> 
<input type="button" class="btn green" value="Adicionar" onclick="window.location = 'clube_add'" style="float:right;" /> 

<!-- TITULO DA PÁGINA -->
<h3 class="page-title"> CLUBES <small><i class="fa fa-angle-double-right"></i>  Clubes Cadastrados</small></h3>
   
<div class="row">
	<div class="col-md-10">
                           
		<!-- TABELA DE CADASTROS-->
        <div class="portlet light bordered">
           <div class="portlet-title">
                <div class="caption font-green">
                    <i class="icon-settings font-green"></i>
                    <span class="caption-subject bold uppercase">Clubes cadastrados</span>
                </div>
           </div>
    <div class="tools"> </div>
           
	<div class="portlet-body">
    	<table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_2" style="text-transform: uppercase">
        	<thead>
            	<tr>
               		<th></th>
               		<th>&nbsp;</th>
                	<th>Escudo</th>
                    <th>Nome do Clube</th>
                    <!--<th>Sigla</th>-->
                    <th>Presidente</th>
                    <th>Configurações</th>
                </tr>
            </thead>
            
            <tbody>
               
            	<?php foreach($clubes as $clube): ?>

				<tr>
					<th></th>
					<td><input type="checkbox" name="checked[]" value="<?php echo $clube['clube_id']; ?>" /> </td>
					<td><center><img src="<?php echo BASE."assets/images/escudos/".$clube['escudo']; ?>" width="25" /></center> </td>
					<td> <?php echo $clube['nome']; ?> </td>
					<!--<td> <?php echo $clube['sigla']; ?> </td>-->
					<td> <?php echo $clube['presidente']; ?> </td>
					<td>
					<div class="actions">
                    <a class="btn btn-circle btn-icon-only btn-default" href="clube_add/<?php echo $clube['clube_id']; ?>">
                    <i class="icon-wrench tooltips" data-original-title="Editar"></i>
                    </a>

                    <a class="btn btn-circle btn-icon-only btn-default" href="#excluir" onclick="javascript:t=window.confirm('Deseja realmente desativar esta categoria?');if(t){window.location = 'clube_del/<?php echo $clube['clube_id']; ?>';}else{alert('Operação cancelada!')}">
                    <i class="icon-trash tooltips" data-original-title="Deletar"></i>
                    </a>
                    </div>			  
				 <!--<div class="btn-group">
							<a class="btn green" href="javascript:;" data-toggle="dropdown" aria-expanded="false">
								<i class="fa fa-cogsr"></i> Configurar
								<i class="fa fa-angle-down"></i>
							</a>
							
							<ul class="dropdown-menu">
							<li>
								<a href="clube_add/<?php echo $clube['clube_id']; ?>">
								<i class="fa fa-trash-o"></i> Editar </a>
							</li>
							<li>
								<a href="clube_del/<?php echo $clube['clube_id']; ?>">
								<i class="fa fa-times"></i> Deletar </a>
							</li>
							</ul>
						</div> -->
					</td> 
				</tr>

				<?php endforeach; ?>

            </tbody>
        </table>
	</div>
      
       </div>
	</div>
</div>