<?php if(isset($_SESSION["msg"])){ ?>
<div> <?php echo $_SESSION["msg"];?> </div>
<?php } ?>

<script type="text/javascript">
/**
 * Array de objectos de qual caracter deve substituir seu par com acentos
 */
var specialChars = [
  {val:"a",let:"áàãâä"},
  {val:"e",let:"éèêë"},
  {val:"i",let:"íìîï"},
  {val:"o",let:"óòõôö"},
  {val:"u",let:"úùûü"},
  {val:"c",let:"ç"},
  {val:"A",let:"ÁÀÃÂÄ"},
  {val:"E",let:"ÉÈÊË"},
  {val:"I",let:"ÍÌÎÏ"},
  {val:"O",let:"ÓÒÕÔÖ"},
  {val:"U",let:"ÚÙÛÜ"},
  {val:"C",let:"Ç"},
  {val:"",let:"?!()"},
  {val:"",let:"!@#$%¨&*()_+ªº~´`^\"\':;=,."},
  {val:"-",let:"/"}

];

function replaceSpecialChars(str) {
  var $spaceSymbol = '-';
  var regex;
  var returnString = str;
  for (var i = 0; i < specialChars.length; i++) {
    regex = new RegExp("["+specialChars[i].let+"]", "g");
    returnString = returnString.replace(regex, specialChars[i].val);
    regex = null;
  }
  data = new Date();
  dia=data.getDate();
  if(dia<10){ dia = "0"+dia; }else{dia=dia;}
  mes=data.getMonth()+1; //não alterar esta linha 
  if(mes<10){ mes = "0"+mes; }else{mes=mes;}
  ano=data.getFullYear();
  comp = "-"+dia+"-"+mes+"-"+ano;
  document.getElementById("url").value = (returnString+comp).replace(/\s/g,$spaceSymbol).toLowerCase();
  
};

</script>

<!-- TITULO DA PÁGINA -->
<h3 class="page-title">INFORMATIVOS <small><i class="fa fa-angle-double-right"></i> Cadastro de Informativos </small></h3>

  <div class="row">
    <div class="col-md-10">
      
      <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
          <div class="portlet-title">
            <div class="caption">
              <i class=" icon-layers font-green"></i>
              <span class="caption-subject font-green sbold uppercase">Cadastro de Informativos</span>
            </div>          
                    </div>
            
  <div class="portlet-body">
                                                        
    <!-- INICIO DO FORMULÁRIO-->
    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="informativo_add">
  <input type="hidden" name="informativo_id" value="<?php echo $informativo_id;?>" />
    
      <div class="form-body">
          <div class="alert alert-danger display-hide">
              <button class="close" data-close="alert"></button> Você tem alguns erros de formulário. Por favor verifique abaixo.
      </div>
        <div class="alert alert-success display-hide">
          <button class="close" data-close="alert"></button> A validação do formulário é bem-sucedida!
    </div>
    
    <!-- CAMPOS DO FORMULÁRIO -->
      <div class="form-group form-md-line-input">
        <label class="col-md-3 control-label" for="titulo">
        <span class="required">*</span> Título do Informativo :
        </label>  
          <div class="col-md-9">
         <input type="text" class="form-control" name="titulo" value="<?php echo $titulo;?>" onkeyup="replaceSpecialChars(this.value)" required />
        <div class="form-control-focus"> </div>
          <span class="help-block">Informe o título para o informativo.</span>
              </div>
          </div>
          
          <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="url">
              <span class="required">*</span> URL do Informativo :
              </label>
              <div class="col-md-9">
              <input type="text" class="form-control" name="url" id="url" value="<?php echo $url;?>" required />
              <div class="form-control-focus"></div>
              <span class="help-block">Informe a url do informativo.</span>
              </div>
          </div>
                                                                                                                        
          <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="categoria">
              <span class="required">*</span> Categoria :
              </label>
              <div class="col-md-9">
        <select class="form-control" name="categoria_id" id="categoria_id" required >
          <?php if(isset($categoria_id)){?>
          <option value="<?php echo $categoria_id;?>"> <?php echo $categoria_titulo;?> </option>
          <?php } else{ ?>
          <option value=""> --- Selecione a categoria --- </option>
          <?php } ?>
          <?php foreach($categorias as $categoria){?>
          <option value="<?php echo $categoria["categoria_id"];?>"> <?php echo $categoria["titulo"];?> </option>
          <?php }?>
        </select>
              <div class="form-control-focus"> </div>
              </div>
          </div>
            
          <div class="row">
        <div class="col-md-12">
          <!-- BEGIN EXTRAS PORTLET-->
          <div class="portlet box green">
            <div class="portlet-title">
              <div class="caption">
                <i class="fa fa-gift"></i>Descrição do Informativo </div>
                <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                </div>
            </div>
            
           <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="#" class="form-horizontal">
              <div class="form-body">
                <div class="form-group last">
                  <div class="col-md-offset-1 col-md-10" >
                    <textarea class="ckeditor form-control" name="corpo" id="corpo" rows="6"><?php echo $corpo;?></textarea>
                  </div>
                </div>
              </div>
            </form>
            <!-- END FORM-->
            </div>
          </div>
          <!-- END EXTRAS PORTLET-->
        </div>
      </div>
        
         <div class="form-actions">
           <div class="row">
              <div class="col-md-offset-0 col-md-9">
                                        <?php if($informativo_id!=0){?>
          <button type="submit" id="botao"  onclick="envia()"class="btn green">Atualizar</button> <div id="envio"> </div>
          <?php } else{ ?>
          <button type="submit" id="botao"   onclick="envia()" class="btn green">Cadastrar</button> <div id="envio"> </div>
          <?php } ?>
                </div>
            </div>
         </div>
      </form>
      
  </div>
  
      </div>
    </div>
  </div>
</div>

<script>

function envia()
{
  document.getElementById("botao").style.display = "none";
  document.getElementById("envio").innerHTML = "Aguarde! Processando...";

}


</script>
