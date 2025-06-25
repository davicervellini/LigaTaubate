<?php if(isset($_SESSION["msg"])){?>
<div> <?php echo $_SESSION["msg"];?> </div>
<?php } ?>


<form method="post" name="jogo_off" id="jogo_off" action="off">

<input type="button" class="btn green" value="Desativar" style="float:right;" onclick="javascript:t=window.confirm('Deseja realmente desativar estes jogos?');if(t){jogo_off.submit();}else{alert('Operação cancelada!')}" /> 
<input type="button" class="btn green" value="Adicionar" onclick="" style="float:right;" /> 

<!-- TITULO DA PÁGINA -->
<h3 class="page-title">CARTEIRINHAS <small><i class="fa fa-angle-double-right"></i></small></h3>
   
<div class="row">
  <div class="col-md-10">
                           
    <!-- TABELA DE CADASTROS-->
        <div class="portlet light bordered">
           <div class="portlet-title">
                <div class="caption font-green">
                    <i class="icon-settings font-green"></i>
                    <span class="caption-subject bold uppercase">Inscrições</span>
                </div>
           </div>
    <div class="tools"> </div>
           
  <div class="portlet-body">
      <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_2">
          <thead>
              <tr>
                   
                    <th></th>
                  <th>Campeonato</th>
                    <th>Clube</th>
                    <th>Inscrições</th>
 
                    
                    <th>Impressão</th>
                </tr>
            </thead>
            
            <tbody>
  
          <?php if(isset($inscricoes)){
             
  ?>
              <?php foreach($inscricoes as $inscricao){ ?>

        <tr>
             <th></th>
          <td> <?php echo $inscricao['campeonato_nome']; ?> </td>
          <td> <?php echo $inscricao['clube_nome']; ?> </td>
          <td> <?php echo $inscricao['quant_atletas']; ?> </td>

          <td> 
          <div class="actions">
                    <a class="btn btn-circle btn-icon-only btn-default" target="_blank" href="<?php BASE;?>/cms/painel/carteirinha/<?php echo $inscricao['clube_id']; ?>/<?php echo $inscricao['campeonato_id']; ?>">
                    <i class="icon-user tooltips" data-original-title="Carteirinha"></i>
                    </a>


                    <a class="btn btn-circle btn-icon-only btn-default" target="_blank" href="<?php BASE;?>/cms/painel/inscricao/<?php echo $inscricao['clube_id']; ?>/<?php echo $inscricao['campeonato_id']; ?>">
                    <i class="icon-docs tooltips" data-original-title="Inscrição"></i>

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