<?php if(isset($_SESSION["msg"])){?>
<div> <?php echo $_SESSION["msg"];?> </div>
<?php } ?>


<form name="noticias_off" id="noticias_off" method="post" action="noticias_off">

<input type="button" class="btn green" value="Desativar" style="float:right;" href="#" onclick="javascript:t=window.confirm('Deseja realmente desativar estas notícias?');if(t){noticias_off.submit();}else{alert('Operação cancelada!')}" /> 
<input type="button" class="btn green" value="Adicionar" onclick="window.location = 'noticia_add'" style="float:right;" /> 

<!-- TITULO DA PÁGINA -->
<h3 class="page-title">NOTÍCIAS <small><i class="fa fa-angle-double-right"></i>  Notícias Publicadas</small></h3>
   
<div class="row">
	<div class="col-md-10">
                           
		<!-- TABELA DE CADASTROS-->
        <div class="portlet light bordered">
           <div class="portlet-title">
                <div class="caption font-green">
                    <i class="icon-settings font-green"></i>
                    <span class="caption-subject bold uppercase">Notícias Publicadas</span>
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
                    <th>Categoria</th>
                    <th>Data de Criação</th>
                    <th>Configurações</th>
                </tr>
            </thead>
            
            <tbody>
               
            	<?php foreach($noticias as $noticia): ?>

				<tr>
					<th></th>
					<td> <input type="checkbox" name="checked[]" value="<?php echo $noticia['noticia_id']; ?>" /> <?php echo $noticia['titulo']; ?> </td>
					<td> <?php echo $noticia['url']; ?> </td>
					<td> <?php echo $noticia['categoria_titulo']; ?>  </td>
					<td> <?php echo date('d/m/Y H:i:s', strtotime($noticia['date_add'])); ?> </td>
					<td>
					<div class="actions">
                    <a class="btn btn-circle btn-icon-only btn-default" href="noticia_add/<?php echo $noticia['noticia_id']; ?>">
                    <i class="icon-wrench tooltips" data-original-title="Editar"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only btn-default" href="#" onclick="javascript:t=window.confirm('Deseja realmente desativar esta notícia?');if(t){window.location = 'noticia_del/<?php echo $noticia['noticia_id']; ?>';}else{alert('Operação cancelada!')}">
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










