<?php require_once("connection.php") ?>

<?php 

$info_atleta = " SELECT * ";
$info_atleta .= " FROM aptidao_atletas ";
$consulta = mysqli_query($connection, $info_atleta);

$info_atleta = mysqli_fetch_assoc($consulta);


    // excluir atleta // 

    if(isset($_POST["excluir"])){
        $id = $info_atleta["atleta_id"];

        $exclusao = " DELETE FROM aptidao_atletas WHERE atleta_id = {$id}";
        $consulta_exclusao = mysqli_query($connection,$exclusao);

        if(!$consulta_exclusao) {
            die("Erro ao conectar-se com o banco de dados!");
        } else {
            header("location:bid.php");
        }
        
    }

?>

<html>

    <head>
        <link rel="stylesheet" href="../liga/assets/css/estilo.css">
        <link rel="stylesheet" href="../liga/assets/css/estilo_mobile.css">
        
        
    </head>

    
    <body>
        <header class="header-exclusao">
    <div>
                <a href="http://ligataubate.com.br"><img class="header-logo" src="images/logoo.png" alt="Liga Taubaté" class="header-logo_img"></a>
                <h1 class="bid2">BID</h1>
            </div>
        </header>

        <div>
            <h1 class="h1_2-2">Confirmar remoção do seguinte atleta da listagem?</h1>
            
           
        </div>
        <!-- Main text ending -->
        
        
        <hr class="rounded2">



        <main>
            <div id="formulario_exclusao">

            <p class="publi"><?php

echo "Publicado em" . " " . $info_atleta["datas"] . " " . "ás" . " " . $info_atleta["hora"]; ?></p>
          

                    <img class="adicionado" src=" <?php if ( file_exists($info_atleta["foto_atleta"] )) {
                        echo $info_atleta["foto_atleta"];
                    } else {
                            echo "images/vetor.png";
                           } 
                    ?>
                    " >


                <dt class="nome_especifico2"><h3><?php echo $info_atleta["nome"] ?></h3></dt>

                
                <dt>Clube</dt>
                <dd><h3><?php echo $info_atleta["club"] ?></h3></dd>

                
                <dt>Campeonato</dt>
                <dd><h3>Incompleto</h3></dd>

                
                <dt>Situação</dt>
                <dd><h3><?php if($info_atleta["situation"] == "1"){
                    echo "Apto";
                } else {
                    echo "Inapto";
                }

                    ?></h3></dd> 
                
  

            </dl>
            </div>

            <form class="formulario_confirm" method="post" action="exclusao.php">
            <input class="input_exclusao" type="submit" name="cancelar" placeholder="cancelar" value="Cancelar" style="color: #FFFFFF; padding: 0px; width: 143px; border: #1D96F0; background: #1D96F0;">
            <?php if(isset($_POST["cancelar"])) {
                header("location:bid.php");
            }
            
            ?>
            
            <input class="input_exclusao" type="submit" name="excluir" placeholder="excluir" value="Excluir" style="
            color: black;
    padding: 0px;
    width: 173px;
    border: #1D96F0;
    background: #8B8B8B;    
            ">

            </form>
            


            
        </main>
</body>

</html>

<?php mysqli_close($connection) ?>