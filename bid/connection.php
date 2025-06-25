<?php 

    $servidor = "admin_liga.mysql.dbaas.com.br";
    $usuario = "admin_liga";
    $senha = "Liga@@123##";
    $banco = "admin_liga";

    $connection = mysqli_connect($servidor,$usuario,$senha,$banco);
    
    if (!$connection) {
        die("erro ao tentar conectar-se com o banco de dados");
    }
?>



