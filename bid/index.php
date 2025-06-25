<?php require_once("connection.php") ?>

<?php
// Consulta ao banco //
$atletas    =  "SELECT 
            at.nome as nome,
            at.apelido as apelido,
            at.funcao as funcao,
            at.cidade as cidade,
            at.foto as foto,
            DATE_FORMAT(bid.data, '%d/%m/%Y às %H:%i') as data,
            bid.status AS status,
            cb.nome AS nome_clube,
            cp.nome AS campeonato_nome,
            cp.temporada as campeonato_temporada
        FROM bid 
        LEFT JOIN atletas at
            ON at.atleta_id = bid.id_atleta
        LEFT JOIN clubes cb
            ON cb.clube_id = bid.id_clube
        LEFT JOIN campeonato cp
            ON cp.campeonato_id = bid.id_campeonato 
        WHERE bid.exibir_publico = 1 
        AND cp.realizado = 0
        AND cp.temporada =" . date('Y');
//Modificação temporaria, id 116 - Renato Braga 2023, depois remover AND cp.campeonato_id = 116




$nome = "";
if (isset($_GET["nome_atleta"]) && $_GET['nome_atleta']) {
    $nome       = $_GET["nome_atleta"];

    $atletas   .= " AND at.nome LIKE '%{$nome}%'";
}

$clube = "";
if (isset($_GET["clube"]) && $_GET['clube']) {
    $clube       = $_GET["clube"];

    $atletas   .= " AND cb.clube_id = '{$clube}'";
}

$campeonato = "";
if (isset($_GET["campeonato"]) && $_GET['campeonato']) {
    $campeonato       = $_GET["campeonato"];

    $atletas   .= " AND cp.campeonato_id = '{$campeonato}'";
}

$data_inicial = "";
$data_final = "";
$contagem = 0;
if (isset($_GET["data_inicial"]) && isset($_GET["data_final"]) && $_GET['data_inicial'] && $_GET['data_final']) {
    $data_inicial       = $_GET["data_inicial"];
    $data_final       = $_GET["data_final"];

    $atletas   .= " AND (bid.data BETWEEN '${data_inicial} 00:00:00' AND '${data_final} 23:59:59')";
} else {
    $data_inicial       = date_create();
    date_sub($data_inicial, date_interval_create_from_date_string("7 days"));
    $data_inicial = date_format($data_inicial, "Y-m-d");

    $data_final = date('Y-m-d');

    $atletas   .= " AND (bid.data BETWEEN '${data_inicial} 00:00:00' AND '${data_final} 23:59:59')";
}

$atletas .= "ORDER BY bid.data DESC";

$atletasArray = mysqli_query($connection, $atletas);

$contagem   = mysqli_num_rows($atletasArray);
if (!$atletasArray) {
    die("falha ao consultar o banco de dados");
}

// Consulta ao banco - clubes //
$clubes    =  "SELECT
    clube_id as id,
    nome
FROM clubes
WHERE status = 1
ORDER BY nome ASC
";
$clubesArray   = mysqli_query($connection, $clubes);

if (!$clubesArray) {
    die("falha ao consultar o banco de dados");
}

// Consulta ao banco - campeonatos //
$campeonatos    =  "SELECT
campeonato_id as id,
nome
FROM campeonato
WHERE status = 1 AND temporada = " . date('Y') . "
ORDER BY nome ASC
";
$campArray   = mysqli_query($connection, $campeonatos);

if (!$campArray) {
    die("falha ao consultar o banco de dados");
}

?>

<html lang="pt-br">

<head>
    <!-- Basic metadata (inicial) -->
    <title>Liga Municipal de Futebol de Taubaté - BID</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A Liga Municipal de Futebol de Taubaté é a entidade responsável por dirigir o futebol da cidade de Taubaté, promovendo e realizando competições nas mais diferentes categorias (base, amador e veterano) do esporte.">
    <meta name="author" content="Grupo Vergueiro">
    <meta name="keywords" content="Liga Taubaté Futebol">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Basic metadata ending -->

    <!-- CSS menu and list -->
    <link rel="stylesheet" href="./assets/css/estilo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Harmattan:wght@400;700&family=Montserrat:ital,wght@0,300;0,500;0,700;1,300;1,500;1,700&display=swap" rel="stylesheet">
    <!-- CSS menu and list ending -->

</head>

<body>
    <header>
        <img src="./images/logoo.png" width="130" />

        <form class="search-container" action="index.php" method="GET">
            <div class="input-box">
                <label>Data inicial</label>

                <input type="date" name="data_inicial" value="<?= $data_inicial; ?>" />
            </div>
            <div class="input-box">
                <label>Data final</label>

                <input type="date" name="data_final" value="<?= $data_final; ?>" />
            </div>
            <div class="input-box">
                <label>Clube:</label>

                <select value="<?= $clube; ?>" name="clube">
                    <option value="">Selecione clube</option>
                    <?php
                    foreach ($clubesArray as $c) {
                    ?>
                        <option value="<?= $c['id'] ?>" <?php if ($c['id'] == $clube) echo "selected"; ?>>
                            <?= strtoupper(utf8_encode($c['nome'])) ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="input-box">
                <label>Campeonato:</label>

                <select value="<?= $campeonato; ?>" name="campeonato">
                    <option value="">Selecione Campeonato</option>
                    <?php
                    foreach ($campArray as $camp) {
                    ?>
                        <option value="<?= $camp['id'] ?>" <?php if ($camp['id'] == $campeonato) echo "selected"; ?>>
                            <?= strtoupper(utf8_encode($camp['nome'])) ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="input-box">
                <label>Nome do atleta</label>

                <input type="text" name="nome_atleta" value="<?= $nome; ?>" />
            </div>

            <input type="submit" value="Buscar" />
        </form>
    </header>

    <section class="info-container">
        <h1>Publicações de <?= date_format(date_create($data_inicial), "d/m/Y") ?> a <?= date_format(date_create($data_final), "d/m/Y") ?></h1>

        <h4><?= $contagem ?> publicações encontradas</h4>
    </section>

    <section class="cards-container">
        <?php
        foreach ($atletasArray as $a) {
        ?>
            <div class="card" style="height:370px;">
                <?php
                if ($a['foto']) {
                ?>
                    <img src="../cms/assets/images/atletas/<?= $a['foto'] ?>" alt="Foto do atleta" />
                <?php
                } else {
                ?>
                    <span class="empty-photo"><?= substr($a['nome'], 0, 1) ?></span>
                <?php
                }
                ?>

                <div class="content-container" style="margin-top:6px">
                    <h2><?= strtoupper(utf8_encode($a['nome'])) ?></h2>
                    <div class="item">
                        <label>Apelido</label>
                        <h6><?= strtoupper(utf8_encode($a['apelido'])) ?></h6>
                    </div>
                    <div class="item">
                        <label>Função</label>
                        <h6><?= strtoupper(utf8_encode($a['funcao'])) ?></h6>
                    </div>
                    <div class="item">
                        <label>Clube</label>
                        <h6><?= strtoupper(utf8_encode($a['nome_clube'])) ?></h6>
                    </div>
                    <div class="item">
                        <label>Cidade</label>
                        <h6><?= strtoupper(utf8_encode($a['cidade'])) ?></h6>
                    </div>
                    <div class="item">
                        <label>Campeonato</label>
                        <h6><?= strtoupper(utf8_encode($a['campeonato_nome'])) ?></h6>
                    </div>
                    <div class="item">
                        <label>Situação</label>
                        <h6>
                            <?php
                            if ($a['status'] == 0) echo "Inapto";
                            else if ($a['status'] == 1) echo "Ativo";
                            else if ($a['status'] == 2) echo "Liberado";
                            else if ($a['status'] == 3) echo "Travado";
                            else if ($a['status'] == 4) echo "Suspenso CDD";
                            else if ($a['status'] == 5) echo "Foto fora do padrão";
                            else if ($a['status'] == 6) echo "Aguardando inscrição FPF";
                            else if ($a['status'] == 7) echo "Inapto - inscrição fora do prazo";
                            ?>
                        </h6>
                    </div>

                    <small>Publicado em <?= $a['data'] ?></small>
                </div>
            </div>
        <?php
        }
        ?>
    </section>
</body>

</html>

<?php
mysqli_close($connection)
?>