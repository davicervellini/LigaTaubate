<?php if(isset($_SESSION["msg"])){?>
<div> <?php echo $_SESSION["msg"];?> </div>
<?php } ?>


<form method="post" name="comissao_off" id="comissao_off" action="comissao_off">

<input type="button" class="btn green" value="Desativar" style="float:right;" onclick="javascript:t=window.confirm('Deseja realmente desativar este membro da comissão?');if(t){comissao_off.submit();}else{alert('Operação cancelada!')}" /> 
<input type="button" class="btn green" value="Adicionar" onclick="window.location = 'comissao_add'" style="float:right;" /> 

<!-- TITULO DA PÁGINA -->
<h3 class="page-title">COMISSÃO TÉCNICA <small><i class="fa fa-angle-double-right"></i>  Integrantes Cadastrados</small></h3>
   
<div class="row">
	<div class="col-md-10">
                           
		<!-- TABELA DE CADASTROS-->
        <div class="portlet light bordered">
           <div class="portlet-title">
                <div class="caption font-green">
                    <i class="icon-settings font-green"></i>
                    <span class="caption-subject bold uppercase">Integrantes da comissão cadastrados</span>
                </div>
           </div>
    <div class="tools"> </div>
           
	<div class="portlet-body">
    	<table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_2">
        	<thead>
            	<tr>
               		<th></th>
                	<th>Nome</th>
                    <th>Clube</th>
                    <th>Nascimento</th>
                    <th>Função</th>
                    <th>Configurações</th>
                </tr>
            </thead>
            
            <tbody>
               
            	<?php foreach($comissoes as $comissao): ?>

				<tr>
					<th></th>
					<td> <input type="checkbox" name="checked[]" value="<?php echo $comissao['comissao_id']; ?>" /> <?php echo $comissao['nome']; ?> </td>
					<td> <?php echo $comissao["clube_nome"]; ?> </td>
					<td> <?php echo date('d/m/Y', strtotime($comissao['nascimento'])); ?>  </td>
					<td> <?php echo $comissao['funcao']; ?> </td>
					<td>
					<div class="actions">
                    <a class="btn btn-circle btn-icon-only btn-default" href="comissao_add/<?php echo $comissao['comissao_id']; ?>">
                    <i class="icon-wrench tooltips" data-original-title="Editar"></i>
                    </a>

                    <a class="btn btn-circle btn-icon-only btn-default" href="#excluir" onclick="javascript:t=window.confirm('Deseja realmente desativar este membro da comissão?');if(t){window.location = 'comissao_del/<?php echo $comissao['comissao_id']; ?>';}else{alert('Operação cancelada!')}">
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