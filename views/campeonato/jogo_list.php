<?php if (isset($_SESSION["msg"])) { ?>
    <div> <?php echo $_SESSION["msg"]; ?> </div>
<?php } ?>


<script>
    function sumula() {
        document.jogo_off.action = "sumula";
        document.jogo_off.target = "_blank";
        document.getElementById("jogo_off").submit();
    }

    function sumula_delegado() {
        document.jogo_off.action = "sumula_delegado";
        document.jogo_off.target = "_blank";
        document.getElementById("jogo_off").submit();
    }
</script>


<form method="get" action="">
    <div class="row">

        <div class="col-md-12">

            <select id="filter_campeonato" name="campeonato_id" onchange="carregaGrupos(this.value)">
                <option>CAMPEONATO </option>
                <?php 
                $currentYear = date('Y');
                foreach ($campeonatos as $campeonato) {

                    // if($campeonato["temporada"] == 2022 || $campeonato["campeonato_id"] == 77) {
                    if ($campeonato["temporada"] == $currentYear) {
                        // if (isset($campeonato)) {
                ?>
                        <option <?php if ($campeonato_id == $campeonato["campeonato_id"]) {
                                    echo "selected";
                                } ?> value="<?php echo $campeonato["campeonato_id"]; ?>"><?php echo $campeonato["nome"]; ?> <?php echo $campeonato["temporada"]; ?> </option>
                <?php }
                } ?>
            </select>
            <select id="filter_grupo" name="grupo">
                <option value="">GRUPO</option>
            </select>
            <!--<select id="filter_rodada"  name="rodada"><option value="">RODADA</option></select>-->
            <input type="submit" value="Filtrar" />

        </div>


    </div>
</form>



<form method="post" name="jogo_off" id="jogo_off" action="off">

    <!--<input type="button" class="btn green" value="Desativar" style="float:right;" onclick="javascript:t=window.confirm('Deseja realmente desativar estes jogos?');if(t){jogo_off.submit();}else{alert('Operação cancelada!')}" /> -->
    <input type="button" class="btn green" onclick="window.location = '<?php BASE; ?>/cms/campeonato/jogo_add'" value="Adicionar" onclick="" style="float:right;" />

    <input type="button" class="btn green" value="Sumula" style="float:right;" onclick="sumula()" /> &nbsp;


    <!-- <input type="button" class="btn green" value="Sumula delegado" style="float:right;" onclick="sumula_delegado()" /> &nbsp; -->

    <!-- TITULO DA PÁGINA -->
    <h3 class="page-title">JOGOS <small><i class="fa fa-angle-double-right"></i></small></h3>

    <div class="row">
        <div class="col-md-12">

            <!-- TABELA DE CADASTROS-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-green">
                        <i class="icon-settings font-green"></i>
                        <span class="caption-subject bold uppercase">Jogos Cadastrados **</span>
                    </div>
                </div>

                <div class="tools"> </div>

                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_2">
                        <thead>
                            <tr>
                                <th></th>
                                <th width="1%"></th>
                                <th>Campeonato</th>
                                <th>Grupo</th>
                                <th>Rodada</th>
                                <th>Casa</th>
                                <th> Resultado</th>
                                <th>Visitante</th>
                                <th>Data</th>


                                <th>Configurações</th>
                            </tr>
                        </thead>

                        <tbody>



                            <?php if (isset($jogos)) { ?>
                                <?php foreach ($jogos as $jogo) { ?>




                                    <tr>
                                        <th></th>
                                        <td><input type="checkbox" name="checked[]" value="<?php echo $jogo["jogo"]['jogo_id']; ?>" /> </td>
                                        <td> <?php echo $jogo["jogo"]['campeonato']; ?> <br /> <span id="feedback<?php echo $jogo["jogo"]['jogo_id']; ?>"></span></td>
                                        <td> <?php echo $jogo["jogo"]['grupo']; ?> </td>
                                        <td> <?php //echo $jogo["jogo"]['rodada']; 
                                                ?> <?php echo $jogo["jogo"]['rodada_descricao']; ?> </td>
                                        <td> <?php echo $jogo["jogo"]['clube_1']; ?> </td>

                                        <td align="center">


                                            <input type="hidden" id="campeonato_id<?php echo $jogo["jogo"]['jogo_id']; ?>" value="<?php echo $jogo["jogo"]['campeonato_id']; ?>" />
                                            <input type="hidden" id="jogo_id<?php echo $jogo["jogo"]['jogo_id']; ?>" value="<?php echo $jogo["jogo"]['jogo_id']; ?>" />
                                            <input type="hidden" id="fase<?php echo $jogo["jogo"]['jogo_id']; ?>" value="<?php echo $jogo["jogo"]['fase']; ?>" />
                                            <input type="hidden" id="grupo<?php echo $jogo["jogo"]['jogo_id']; ?>" value="<?php echo $jogo["jogo"]['grupo']; ?>" />
                                            <input type="hidden" id="pontuacao_continuada<?php echo $jogo["jogo"]['jogo_id']; ?>" value="<?php echo $jogo["jogo"]['pontuacao_continuada']; ?>" />

                                            <input type="hidden" id="clube_1<?php echo $jogo["jogo"]['jogo_id']; ?>" value="<?php echo $jogo["jogo"]['clube_id_1']; ?>" />
                                            <input type="hidden" id="clube_2<?php echo $jogo["jogo"]['jogo_id']; ?>" value="<?php echo $jogo["jogo"]['clube_id_2']; ?>" />


                                            <input type="text" id="result_clube_1<?php echo $jogo["jogo"]['jogo_id']; ?>" value="<?php echo $jogo["jogo"]['result_clube_1']; ?>" style="width:30px" />

                                            x

                                            <input type="text" id="result_clube_2<?php echo $jogo["jogo"]['jogo_id']; ?>" value="<?php echo $jogo["jogo"]['result_clube_2']; ?>" style="width:30px" />



                                            <br />

                                            <input type="text" id="penal_clube_1<?php echo $jogo["jogo"]['jogo_id']; ?>" value="<?php echo $jogo["jogo"]['penal_clube_1']; ?>" style="width:20px" />

                                            x

                                            <input type="text" id="penal_clube_2<?php echo $jogo["jogo"]['jogo_id']; ?>" value="<?php echo $jogo["jogo"]['penal_clube_2']; ?>" style="width:20px" />

                                        </td>



                                        <td> <?php echo $jogo["jogo"]['clube_2']; ?> </td>
                                        <td>
                                            <?php $realizado = array("Pendente", "Realizado"); ?>

                                            <select id="realizado<?php echo $jogo["jogo"]["jogo_id"]; ?>">

                                                <option selected value="<?php echo $jogo["jogo"]["realizado"]; ?>"><?php echo $realizado[$jogo["jogo"]["realizado"]]; ?> </option>

                                                <option value="0">Pendente</option>
                                                <option value="1">Realizado</option>

                                            </select>

                                            <br /><?php echo date('d/m/Y', strtotime($jogo["jogo"]['data'])); ?> <br /><?php echo date('H:i', strtotime($jogo['jogo']['hora'])); ?>
                                        </td>
                                        <td>
                                            <div class="actions">
                                                <a class="btn btn-circle btn-icon-only btn-default" href="<?php BASE; ?>/cms/campeonato/jogo_add/<?php echo $jogo["jogo"]["jogo_id"]; ?>">
                                                    <i class="icon-wrench tooltips" data-original-title="Editar"></i>
                                                </a>


                                                <a class="btn btn-circle btn-icon-only btn-default" href="<?php BASE; ?>/cms/campeonato/jogo_resultado/<?php echo $jogo["jogo"]["jogo_id"]; ?>">
                                                    <i class="icon-magnifier-add tooltips" data-original-title="Resultado"></i>
                                                </a>


                                                <?php if ($jogo["jogo"]["realizado"] == 0) { ?>
                                                    <a class="btn btn-circle btn-icon-only btn-default" href="#excluir" onclick="javascript:t=window.confirm('Deseja realmente desativar este jogo?');if(t){window.location = '<?php BASE; ?>/cms/campeonato/jogo_del/<?php echo $jogo["jogo"]["jogo_id"]; ?>';}else{alert('Operação cancelada!')}">
                                                        <i class="icon-trash tooltips" data-original-title="Deletar"></i>
                                                    <?php } ?>
                                                    </a>

                                                    <a class="btn btn-circle btn-icon-only btn-default" onclick="javascript:t=window.confirm('Deseja realmente salvar o resultado deste jogo?');if(t){jogoAjax(<?php echo $jogo["jogo"]["jogo_id"]; ?>);}else{alert('Operação cancelada!'); return false;}">
                                                        <i class="fa fa-edit tooltips" data-original-title="Salvar Resultado"></i>
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

    <script type="text/javascript" src="<?php BASE; ?>assets/js/carregaGrupos.js"></script>

    <script>
        carregaGrupos(<?php echo $campeonato_id; ?>)

        function carregaGrupos(x) {
            var xmlhttp;
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function() {

                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                    document.getElementById("filter_grupo").innerHTML = xmlhttp.responseText;

                    if (document.getElementById("filter_grupo").value == "<?php $grupo; ?>") {
                        document.getElementById("filter_grupo").value = "<?php echo $grupo; ?>"
                    } else {
                        document.getElementById("filter_grupo").value = "Selecione o Grupo"
                    }

                }
            }
            var id = x;


            var campos = "campeonato_id=" + id;


            xmlhttp.open("POST", "<?php echo BASE . "campeonato/carrega_grupos/"; ?>", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); // Setando Content-type
            xmlhttp.send(campos);

        }



        function jogoAjax(jogo_id) {
            var xmlhttp;
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function() {

                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                    document.getElementById("feedback" + jogo_id).innerHTML = xmlhttp.responseText;

                } else {
                    document.getElementById("feedback" + jogo_id).innerHTML = "Salvando...";
                }
            }

            var campos = ""


            campos += "campeonato_id=" + document.getElementById("campeonato_id" + jogo_id).value;
            campos += "&clube_1=" + document.getElementById("clube_1" + jogo_id).value;
            campos += "&result_clube_1=" + document.getElementById("result_clube_1" + jogo_id).value;
            campos += "&penal_clube_1=" + document.getElementById("penal_clube_1" + jogo_id).value;

            campos += "&clube_2=" + document.getElementById("clube_2" + jogo_id).value;
            campos += "&result_clube_2=" + document.getElementById("result_clube_2" + jogo_id).value;
            campos += "&penal_clube_2=" + document.getElementById("penal_clube_2" + jogo_id).value;
            // //campos += "&obs="+document.getElementById("obs"+jogo_id).value;
            campos += "&realizado=" + document.getElementById("realizado" + jogo_id).value;
            campos += "&jogo_id=" + document.getElementById("jogo_id" + jogo_id).value;
            campos += "&fase=" + document.getElementById("fase" + jogo_id).value;
            campos += "&grupo=" + document.getElementById("grupo" + jogo_id).value;
            campos += "&pontuacao_continuada=" + document.getElementById("pontuacao_continuada" + jogo_id).value;


            xmlhttp.open("POST", "<?php echo BASE . "campeonato/jogo_resultado_ajax/"; ?>", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); // Setando Content-type
            xmlhttp.send(campos);

        }
    </script>