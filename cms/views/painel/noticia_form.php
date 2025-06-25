<?php if(isset($_SESSION["msg"])){ ?>
<div> <?php echo $_SESSION["msg"];?> </div>
<?php  unset($_SESSION["msg"]); } ?>

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
  mes=data.getMonth() + 1; //não alterar esta linha
  console.log(mes);
  if(mes<10){ mes = "0"+mes; }else{mes=mes;}
  ano=data.getFullYear();
  comp = "-"+dia+"-"+mes+"-"+ano;
  document.getElementById("url").value = (returnString+comp).replace(/\s/g,$spaceSymbol).toLowerCase();
  
};

</script>

<!-- TITULO DA PÁGINA -->
<h3 class="page-title">NOTÍCIAS <small><i class="fa fa-angle-double-right"></i> Cadastro de Notícias </small></h3>

  <div class="row">
    <div class="col-md-10">
      
      <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
          <div class="portlet-title">
            <div class="caption">
              <i class=" icon-layers font-green"></i>
              <span class="caption-subject font-green sbold uppercase">Cadastro de Notícias</span>
            </div>          
                    </div>
            
  <div class="portlet-body">
                                                        
    <!-- INICIO DO FORMULÁRIO-->
    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="noticia_add">
  <input type="hidden" name="noticia_id" value="<?php echo $noticia_id;?>" />
    
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
        <span class="required">*</span> Título da Notícia :
        </label>  
          <div class="col-md-9">
         <input type="text" class="form-control" name="titulo" value="<?php echo $titulo;?>" onkeyup="replaceSpecialChars(this.value)" maxlength="60" required />
        <div class="form-control-focus"> </div>
          <span class="help-block">Informe o título para a notícia.</span>
              </div>
          </div>
          
          <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="url">
              <span class="required">*</span> URL:
              </label>
              <div class="col-md-9">
              <input type="text" class="form-control" name="url" id="url" value="<?php echo $url;?>" required />
              <div class="form-control-focus"></div>
              <span class="help-block">Informe a url da notícia.</span>
              </div>
          </div>
                                                                                                                        
          <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="categoria">Categoria :</label>
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
                                                                                                                        
          <div class="form-group form-md-line-input">
        <label class="col-md-3 control-label" for="tipo_noticia">
        <span class="required">*</span> Posição da Notícia :
        </label>  
          <div class="col-md-9">
         <select class="form-control" name="tipo_noticia" id="tipo_noticia" required >
          <?php if(isset($tipo_noticia)){?>
          <?php $tipo_anuncio_rotulo = array("","Destaque Slide (1)","Destaque (2)","Normal (3)");?>

          <option value="<?php echo $tipo_noticia;?>" selected> <?php echo $tipo_anuncio_rotulo[$tipo_noticia];?> </option>

          <?php } else{ ?>

          <option value=""> --- Selecione a posição --- </option>

          <?php } ?>
          <option value="1"> Destaque Slide (1)</option>
          <option value="2"> Destaque (2)</option>
          <option value="3"> Normal (3) </option>
        </select>
        <div class="form-control-focus"> </div>
          <span class="help-block">Informe o posicionamento da notícia.</span>
              </div>
          </div>
            
          <div class="row">
        <div class="col-md-12">
          <!-- BEGIN EXTRAS PORTLET-->
          <div class="portlet box green">
            <div class="portlet-title">
              <div class="caption">
                <i class="fa fa-gift"></i>Descrição da Notícia </div>
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
           
          <div class="form-group form-md-line-input">
        <label class="col-md-3 control-label" for="video_youtube">Vídeo <em>(* Link do youtube)</em> :</label>
              <div class="col-md-9">
              <input type="text" class="form-control" name="video_youtube" id="video_youtube" value="<?php echo $video_youtube;?>" />
              <div class="form-control-focus"></div>
              <span class="help-block">Copie o código do vídeo (é o que aparece entre o símbolo "=" e "&" (caso este exista)</span>
              </div>
          </div>  
                                                                                                                             
          <div class="form-group form-md-line-input">
       <label class="col-md-3 control-label" for="foto_principal">Foto Principal :</label>
           <div class="col-md-9">
          <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
              <?php if(isset($foto_principal) && $foto_principal!=""){?>
                <img src="<?php echo BASE; ?>assets/images/noticias/<?php echo $foto_principal;?>" width="200" /> <br />
                <input type="hidden" name="foto_principal_id" value="<?php echo $foto_principal;?>" />
              <?php } ?>
                        </div>
                            <div>
                                <span class="btn red btn-outline btn-file">
                                   <span class="fileinput-new"> Selecionar Imagem </span>
                                   <span class="fileinput-exists"> Alterar Imagem </span>
                                   <input type="file" name="foto_principal" id="foto_principal">
                </span>
                               <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remover Imagem </a>
                          </div>
                    </div>
            </div>
          </div>
      
          
              
      <!-- Galeria -->                
          <div class="form-group form-md-line-input">
       <label class="col-md-3 control-label" for="galeria">Galeria :</label>
           <div class="col-md-9">
          <div class="fileinput fileinput-new" data-provides="fileinput">
                       
                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
    
                        </div>
                            <div>
                                <span class="btn red btn-outline btn-file">
                                   <span class="fileinput-new"> Selecionar Imagem </span>
                                   <span class="fileinput-exists"> Alterar Imagem </span>
                                   <input type="file" multiple name="galeria[]" id="galeria" />  
                </span>
                               
                          </div>
                          
                    </div>


            </div>
          </div>


          <div class="form-actions">
          
            <div class="row">
              <div class="col-md-offset-0 col-md-9">
      <?php foreach($galeria as $foto){?>
      <div style="float:left;margin:5px">
        <p> <img src="<?php echo BASE; ?>assets/images/galerias/<?php echo $foto["foto"];?>" width="200" /> </p>

        <p> <a href="<?php echo BASE."painel/exclui_foto/".$foto["foto_id"];?>" target="_self" class="btn red fileinput-exists" data-dismiss="fileinput"> Remover Imagem </a> </p>
      </div>
      <?php } ?>  
      </div>
       </div>
     </div>

           

         
          <!--
          <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="galeria">Galeria de Imagem :</label>
              <div class="col-md-9">
          <form action="<?php echo BASE; ?>assets/global/plugins/dropzone/upload.php" class="dropzone dropzone-file-area dz-clickable" id="my-dropzone" style="width: 500px; margin-top: 50px;">
          <h3 class="sbold"><font><font>Solte arquivos aqui ou clique para fazer o upload</font></font></h3>                
          <div class="dz-default dz-message"><span></span></div></form>
              </div>
          </div>
          -->
                      
         <div class="form-actions">
           <div class="row">
              <div class="col-md-offset-0 col-md-9">
                              <?php if($noticia_id!=0){?>
          <button type="submit"  onclick="envia()" class="btn green">Atualizar</button> <div id="envio"> </div>
          <?php } else{ ?>
          <button type="submit"  onclick="envia()" class="btn green">Cadastrar</button> <div id="envio"> </div>
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
