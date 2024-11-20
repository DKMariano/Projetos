<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="estilos/estilo.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link rel="shortcut icon" href="icones/favicon.ico" type="image/x-icon">
    <script src="js/scripts.js"></script> 
    <title>Listagem de Jogos</title>
</head>
<body>
    <?php
        require_once "includes/banco.php";  
        require_once "includes/funcoes.php";
        require_once 'includes/login.php'; 

       
        $ordem = $_GET['o'] ?? "n"; 
        $chave = $_GET['c'] ?? ""; 
    ?> 
    <div id="corpo"> 
        <?php include_once "topo.php"; ?>
        <h1>Escolha o seu Jogo</h1> 
        <form method="get" id="busca" action="index.php">
            Ordenar: 
            <a href="index.php?o=n&c=<?php echo $chave; ?>"> Nome </a> |
            <a href="index.php?o=p&c=<?php echo $chave; ?>"> Produtora </a> | 
            <a href="index.php?o=n1&c=<?php echo $chave; ?>"> Nota Alta </a> | 
            <a href="index.php?o=n2&c=<?php echo $chave; ?>"> Nota Baixa </a> | 
            <a href="index.php">Mostrar Todos </a> | 
            Buscar: <input type="text" name="c" size="10" maxlength="40" value="<?php echo $chave; ?>"/>
            <input type="submit" value="OK" class="botao-busca" /> 
        </form>

        <table class="listagem"> 
            <?php 

                $q = "SELECT cod, nome, genero, produtora, capa, nota FROM jogos";
                
                if (!empty($chave)) {
                    $q .= " WHERE nome LIKE '%$chave%' OR produtora LIKE '%$chave%' OR genero LIKE '%$chave%'";
                }


                switch ($ordem) {
                    case "p":
                        $q .= " ORDER BY produtora"; 
                        break;
                    case "n1":
                        $q .= " ORDER BY nota DESC"; 
                        break;
                    case "n2":
                        $q .= " ORDER BY nota ASC"; 
                        break;
                    default:
                        $q .= " ORDER BY nome"; 
                        break;
                }


                $busca = $banco->query($q); 
                

                if (!$busca) {
                    echo "<tr><td>Infelizmente a busca deu errado</td></tr>"; 
                } else {
          
                    if ($busca->num_rows == 0) {
                        echo "<tr><td>Nenhum registro encontrado</td></tr>"; 
                    } else {
 
                        while ($reg = $busca->fetch_object()) {
                            $t = thumb($reg->capa);  
                            echo "<tr><td><img src='$t' class='mini'/></td>";
                            echo "<td><a href='detalhes.php?cod={$reg->cod}'><strong><u>{$reg->nome}</u></strong></a>";                            
                            echo "<br/><b>Gênero: </b>{$reg->genero}";
                            echo "<br/><b>Produtora: </b>{$reg->produtora}";
                            echo "<br/><b>Nota: </b><em>{$reg->nota}</em>";


                            if (is_admin()) {
                                echo "</td><td><a href='game-new.php'><span class='material-symbols-outlined'>add_circle</span> </a> ";
                                echo "<a href='game-edit.php?cod=".$reg->cod."'><span class='material-symbols-outlined'>edit</span></a>"; 
                                echo "<a href='#' onclick=\"confirmDeleteGame('".$reg->cod."')\"> <span class='material-symbols-outlined'>delete</span></a>";  
                            } elseif (is_editor()) {
                                echo "</td><td><a href='game-edit.php?cod=".$reg->cod."'><span class='material-symbols-outlined'>edit</span></a>";  
                            }
                        }
                    }
                }
            ?>
        </table>
    </div>
    <?php include_once "rodape.php";?> 
</body>
</html>
