<?php if(isset($_SESSION["msg"])){?>
<div> <?php echo $_SESSION["msg"];?> </div>
<?php } ?>

<script>
function ficha_arbitro()
{
    document.arbitragem_off.action = "ficha_arbitro";
    document.arbitragem_off.target = "_blank";
    document.getElementById("arbitragem_off").submit();
}
</script>


<form method="post" name="arbitragem_off" id="arbitragem_off" action="arbitragem_off">

<input type="button" class="btn green" value="Ficha inscrição" onclick="ficha_arbitro()" style="float:right;" /> 

<input type="button" class="btn green" value="Desativar" style="float:right;" onclick="javascript:t=window.confirm('Deseja realmente desativar este membro da árbitragem?');if(t){arbitragem_off.submit();}else{alert('Operação cancelada!')}" /> 

<input type="button" class="btn green" value="Adicionar" onclick="window.location = 'arbitragem_add'" style="float:right;" /> 

<!-- TITULO DA PÁGINA -->
<h3 class="page-title">ARBITRAGEM <small><i class="fa fa-angle-double-right"></i>  Árbitros Cadastrados</small></h3>
   
<div class="row">
	<div class="col-md-10">
                           
		<!-- TABELA DE CADASTROS-->
        <div class="portlet light bordered">
           <div class="portlet-title">
                <div class="caption font-green">
                    <i class="icon-settings font-green"></i>
                    <span class="caption-subject bold uppercase">Árbitros cadastrados</span>
                </div>
           </div>
    <div class="tools"> </div>
           
	<div class="portlet-body">
    	<table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_2" style="text-transform: uppercase">
        	<thead>
            	<tr>
               		<th></th>
               		<th></th>
                	<th>Nome</th>
                    <!--<th>Contato</th>
                    <th>Nascimento</th>-->
                    <th>Função</th>
                    <th>Configurações</th>
                </tr>
            </thead>
            
            <tbody>
               
            	<?php foreach($arbitragem as $arbitragem): ?>

				<tr>
				<th></th>
					<td><input type="checkbox" name="checked[]" value="<?php echo $arbitragem['arbitragem_id']; ?>" /></td>
					<td> <?php echo $arbitragem['nome']; ?> </td>
					<!--<td> <?php echo $arbitragem['telefone']; ?> </td>
					<td> <?php echo date('d/m/Y', strtotime($arbitragem['nascimento'])); ?>  </td>-->
					<td> <?php echo $arbitragem['funcao']; ?> </td>
					<td> 
					<div class="actions">
                    <a class="btn btn-circle btn-icon-only btn-default" href="arbitragem_add/<?php echo $arbitragem['arbitragem_id']; ?>">
                    <i class="icon-wrench tooltips" data-original-title="Editar"></i>
                    </a>
                    
                        <a class="btn btn-circle btn-icon-only btn-default" href="#excluir" onclick="javascript:t=window.confirm('Deseja realmente desativar este árbitro?');if(t){window.location = 'arbitragem_del/<?php echo $arbitragem['arbitragem_id']; ?>';}else{alert('Operação cancelada!')}">
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