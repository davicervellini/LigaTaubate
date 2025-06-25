<?php if (isset($_SESSION["msg"])) { ?>
    <div> <?php echo $_SESSION["msg"]; ?> </div>
<?php
    unset($_SESSION["msg_success"]);
} ?>

<?php
$atletaInstance = new atletas();

if (isset($_GET['publishBID'])) {
    $atletas_ids = substr_replace($_GET['publishBID'], "", -1, 1);
    $atletas_ids = explode("_", $atletas_ids);

    $atletaInstance->publishBIDList($atletas_ids);

?>
    <script>
        window.location.href = 'https://www.ligataubate.com.br/cms/painel/atletas';
    </script>
<?php
}
?>

<?php
if (isset($_GET['inaptBID'])) {
    $atletas_ids = substr_replace($_GET['inaptBID'], "", -1, 1);
    $atletas_ids = explode("_", $atletas_ids);

    $atletaInstance->inaptBIDList($atletas_ids);

?>
    <script>
        window.location.href = 'https://www.ligataubate.com.br/cms/painel/atletas';
    </script>
<?php
}
?>


<?php
if (isset($_GET['travadoBID'])) {
    $atletas_ids = substr_replace($_GET['travadoBID'], "", -1, 1);
    $atletas_ids = explode("_", $atletas_ids);

    $atletaInstance->travadBIDList($atletas_ids);

?>
    <script>
        window.location.href = 'https://www.ligataubate.com.br/cms/painel/atletas';
    </script>
<?php
}
?>

<?php
if (isset($_GET['liberado'])) {
    $atletas_ids = substr_replace($_GET['liberado'], "", -1, 1);
    $atletas_ids = explode("_", $atletas_ids);

    $atletaInstance->liberadoList($atletas_ids);

?>
    <script>
        window.location.href = 'https://www.ligataubate.com.br/cms/painel/atletas';
    </script>
<?php
}
?>

<?php
if (isset($_GET['fotoFora'])) {
    $atletas_ids = substr_replace($_GET['fotoFora'], "", -1, 1);
    $atletas_ids = explode("_", $atletas_ids);

    $atletaInstance->fotoForaList($atletas_ids);

?>
    <script>
        window.location.href = 'https://www.ligataubate.com.br/cms/painel/atletas';
    </script>
<?php
}
?>

<?php
if (isset($_GET['inscricaoFora'])) {
    $atletas_ids = substr_replace($_GET['inscricaoFora'], "", -1, 1);
    $atletas_ids = explode("_", $atletas_ids);

    $atletaInstance->inscricaoForaList($atletas_ids);

?>
    <script>
        window.location.href = 'https://www.ligataubate.com.br/cms/painel/atletas';
    </script>
<?php
}
?>

<?php
if (isset($_GET['aguardandoFPF'])) {
    $atletas_ids = substr_replace($_GET['aguardandoFPF'], "", -1, 1);
    $atletas_ids = explode("_", $atletas_ids);

    $atletaInstance->aguardandoFPFList($atletas_ids);

?>
    <script>
        window.location.href = 'https://www.ligataubate.com.br/cms/painel/atletas';
    </script>
<?php
}
?>

<script>
    function carteirinhas() {
        document.atletas_off.action = "carteirinha";
        document.atletas_off.target = "_blank";
        document.getElementById("atletas_off").submit();
    }

    function aprovarBID() {
        var checkboxes = document.getElementsByName('checked[]');

        var atletas = ""
        for (var checkbox of checkboxes) {
            if (checkbox.checked) {
                var fullValue = checkbox.value.split("/")
                atletas += fullValue[2] + "_"
            }
        }

        if (!atletas) return

        window.location.href = `https://www.ligataubate.com.br/cms/painel/atletas?publishBID=${atletas}`
    }

    function inaptoBID() {
        var checkboxes = document.getElementsByName('checked[]');

        var atletas = ""
        for (var checkbox of checkboxes) {
            if (checkbox.checked) {
                var fullValue = checkbox.value.split("/")
                atletas += fullValue[2] + "_"
            }
        }

        if (!atletas) return

        window.location.href = `https://www.ligataubate.com.br/cms/painel/atletas?inaptBID=${atletas}`
    }

    function travadoBID() {
        var checkboxes = document.getElementsByName('checked[]');

        var atletas = ""
        for (var checkbox of checkboxes) {
            if (checkbox.checked) {
                var fullValue = checkbox.value.split("/")
                atletas += fullValue[2] + "_"
            }
        }

        if (!atletas) return

        window.location.href = `https://www.ligataubate.com.br/cms/painel/atletas?travadoBID=${atletas}`
    }

    function liberado() {
        var checkboxes = document.getElementsByName('checked[]');

        var atletas = ""
        for (var checkbox of checkboxes) {
            if (checkbox.checked) {
                var fullValue = checkbox.value.split("/")
                atletas += fullValue[2] + "_"
            }
        }

        if (!atletas) return

        window.location.href = `https://www.ligataubate.com.br/cms/painel/atletas?liberado=${atletas}`
    }

    function fotoFora() {
        var checkboxes = document.getElementsByName('checked[]');

        var atletas = ""
        for (var checkbox of checkboxes) {
            if (checkbox.checked) {
                var fullValue = checkbox.value.split("/")
                atletas += fullValue[2] + "_"
            }
        }

        if (!atletas) return

        window.location.href = `https://www.ligataubate.com.br/cms/painel/atletas?fotoFora=${atletas}`
    }

    function inscricaoFora() {
        var checkboxes = document.getElementsByName('checked[]');

        var atletas = ""
        for (var checkbox of checkboxes) {
            if (checkbox.checked) {
                var fullValue = checkbox.value.split("/")
                atletas += fullValue[2] + "_"
            }
        }

        if (!atletas) return

        window.location.href = `https://www.ligataubate.com.br/cms/painel/atletas?inscricaoFora=${atletas}`
    }

    function aguardandoFPF() {
        var checkboxes = document.getElementsByName('checked[]');

        var atletas = ""
        for (var checkbox of checkboxes) {
            if (checkbox.checked) {
                var fullValue = checkbox.value.split("/")
                atletas += fullValue[2] + "_"
            }
        }

        if (!atletas) return

        window.location.href = `https://www.ligataubate.com.br/cms/painel/atletas?aguardandoFPF=${atletas}`
    }
</script>



<form method="post" name="atletas_off" id="atletas_off" action="atletas_off">
    <div style="width:100%; display:flex; align-items:center; justify-content: flex-end;">
        <?php
        if ($_SESSION['email'] == 'presidente@ligataubate.com.br' || $_SESSION['email'] == 'leonardosoareszuin@gmail.com') {
        ?>
            <input type="button" class="btn" style="color: green; margin-right:8px;" value="Verificar novas entradas!" onclick="window.location = '<?php echo BASE; ?>painel/atletas_novo'" />
            <input type="button" class="btn green" value="Aprovar - BID" style="" onclick="aprovarBID()" /> &nbsp;
            <input type="button" class="btn red" value="Inapto - BID" style="" onclick="inaptoBID()" /> &nbsp;
            <input type="button" class="btn red" value="Travado - BID" style="" onclick="travadoBID()" /> &nbsp;
            <input type="button" class="btn green" value="Liberado" style="" onclick="liberado()" /> &nbsp;
            <input type="button" class="btn red" value="Foto fora do padrão" style="" onclick="fotoFora()" /> &nbsp;
            <input type="button" class="btn red" value="Inapto - inscrição fora do prazo" style="" onclick="inscricaoFora()" /> &nbsp;
            <input type="button" class="btn red" value="Aguardando inscrição FPF" style="" onclick="aguardandoFPF()" /> &nbsp;


        <?php
        }
        ?>

        <?php if ($clube_id == 0) { ?>


            <input type="button" class="btn green" value="Carteirinhas" style="" onclick="carteirinhas()" /> &nbsp;

            <input type="button" class="btn green" value="Desativar" style="" onclick="javascript:t=window.confirm('Deseja realmente desativar este atleta?');if(t){atletas_off.submit();}else{alert('Operação cancelada!')}" />

            &nbsp;

            <input type="button" class="btn green" value="Adicionar" onclick="window.location = '<?php echo BASE; ?>painel/atleta_add/'" style="" />

        <?php } else { ?>
            <input type="button" class="btn green" value="Adicionar" onclick="window.location = '<?php echo BASE; ?>painel/atleta_add/<?php echo $clube_id; ?>'" style="" />

        <?php } ?>
    </div>

    <!-- TITULO DA PÁGINA -->
    <h3 class="page-title"> ATLETAS <small><i class="fa fa-angle-double-right"></i> Atletas Cadastrados</small></h3>

    <div class="row">
        <div class="col-md-10">

            <!-- TABELA DE CADASTROS-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-green">
                        <i class="icon-settings font-green"></i>
                        <span class="caption-subject bold uppercase">Atletas cadastrados</span>
                    </div>
                </div>
                <div class="tools"> </div>

                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_2" style="text-transform: uppercase">
                        <thead>
                            <tr>
                                <th></th>
                                <th>&nbsp;</th>
                                <th>Nome</th>
                                <th>Clube</th>
                                <th>Campeonato</th>
                                <th>Função</th>
                                <!--<th>Inscrição</th>-->
                                <!--<th>Nascimento</th>
                    <th>Naturalidade</th>-->
                                <th>Configurações</th>
                            </tr>
                        </thead>

                        <tbody>



                            <?php foreach ($atletas as $atleta) {

                            ?>

                                <tr>
                                    <th></th>
                                    <td><input type="checkbox" name="checked[]" value="<?php echo $atleta['inscricao_clube_id']; ?>/<?php echo $atleta['campeonato_id']; ?>/<?php echo $atleta['atleta_id']; ?>" /></td>
                                    <td> <?php echo $atleta['nome']; ?> </td>
                                    <td> <?php echo $atleta['clube_nome']; ?> </td>

                                    <td> <?php echo (isset($atleta['campeonato_nome'])) ? $atleta['campeonato_nome'] : ''; ?>

                                        <?php if (isset($atleta["inscricoes"])) {

                                            foreach ($atleta["inscricoes"] as $insc) {

                                                echo $insc["campeonato"] . " " . $insc["temporada"];
                                                echo "<br />";
                                            }
                                        }


                                        ?>

                                    </td>

                                    <td> <?php echo $atleta['funcao']; ?> </td>
                                    <!--<td> <?php echo $atleta['campeonato_nome']; ?> </td>-->
                                    <!--<td> <?php echo date('d/m/Y', strtotime($atleta['nascimento'])); ?>  </td>-->
                                    <!--<td> <?php echo $atleta['natural_cidade']; ?>/<?php echo $atleta['natural_estado']; ?> </td>-->
                                    <td>
                                        <div class="actions" style="
                                                display:flex;
                                                justify-content:center;
                                                align-content:center;
                                            ">
                                            <a class="btn btn-circle btn-icon-only btn-default" href="<?php echo BASE; ?>painel/atleta_add/<?php echo $clube_id; ?>/<?php echo $atleta['atleta_id']; ?>">
                                                <i class="icon-wrench tooltips" data-original-title="Editar"></i>
                                            </a>

                                            <?php if ($clube_id == 0) { ?>
                                                <a class="btn btn-circle btn-icon-only btn-default" href="#excluir" onclick="javascript:t=window.confirm('Deseja realmente desativar este atleta?');if(t){window.location = '<?php echo BASE; ?>painel/atleta_del/<?php echo $atleta['atleta_id']; ?>';}else{alert('Operação cancelada!')}">
                                                    <i class="icon-trash tooltips" data-original-title="Deletar"></i>
                                                </a>
                                            <?php } ?>


                                        </div>
                                    </td>
                                </tr>

                            <?php } ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>