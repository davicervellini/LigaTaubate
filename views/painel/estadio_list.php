<?php if(isset($_SESSION["msg"])){?>
<div> <?php echo $_SESSION["msg"];?> </div>
<?php } ?>


<form method="post" name="estadio_off" id="estadio_off" action="estadio_off">

<input type="button" class="btn green" value="Desativar" style="float:right;" onclick="javascript:t=window.confirm('Deseja realmente desativar estes estadios?');if(t){estadio_off.submit();}else{alert('Operação cancelada!')}" /> 
<input type="button" class="btn green" value="Adicionar" onclick="window.location = 'estadio_add'" style="float:right;" /> 

<!-- TITULO DA PÁGINA -->
<h3 class="page-title">ESTÁDIOS <small><i class="fa fa-angle-double-right"></i>  Estádios Cadastrados</small></h3>
   
<div class="row">
  <div class="col-md-12">
                           
    <!-- TABELA DE CADASTROS-->
        <div class="portlet light bordered">
           <div class="portlet-title">
                <div class="caption font-green">
                    <i class="icon-settings font-green"></i>
                    <span class="caption-subject bold uppercase">Estádios cadastrados</span>
                </div>
           </div>
    <div class="tools"> </div>
           
  <div class="portlet-body">
      <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_2">
          <thead>
              <tr>
                   <th></th>
                    <th>Nome do campo</th>
                    <th>Nome fantasia</th>
                    <th>Data de Inauguração</th>
                    <th>Bairro</th>
                    <th>Equipe Responsável</th>
                    <th>Configurações</th>
                </tr>
            </thead>
            
            <tbody>
               
              <?php foreach($estadios as $estadio): ?>

        <tr>
          <th></th>
          <td> <input type="checkbox" name="checked[]" value="<?php echo $estadio['estadio_id']; ?>" />  <?php echo $estadio['campo']; ?> </td>
          <td> <?php echo $estadio['nome_fantasia']; ?> </td>
          <td> <?php echo date('d/m/Y', strtotime($estadio['inauguracao'])); ?> </td>
          <td> <?php echo $estadio['bairro']; ?> </td>
          <td> <?php echo $estadio['clube_nome']; ?> </td>
          <td> 
          <div class="actions">
                    <a class="btn btn-circle btn-icon-only btn-default" href="estadio_add/<?php echo $estadio['estadio_id']; ?>">
                    <i class="icon-wrench tooltips" data-original-title="Editar"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only btn-default" href="#excluir" onclick="javascript:t=window.confirm('Deseja realmente desativar este estadio?');if(t){window.location = 'estadio_del/<?php echo $estadio['estadio_id']; ?>';}else{alert('Operação cancelada!')}">
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