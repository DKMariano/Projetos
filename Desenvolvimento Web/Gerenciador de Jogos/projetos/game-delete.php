<!DOCTYPE html>
<?php
require_once "includes/banco.php";  
require_once "includes/funcoes.php";
require_once 'includes/login.php';

?>
    
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="estilos/estilo.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link rel="shortcut icon" href="icones/favicon.ico" type="image/x-icon">
    <title>Deletar Jogo</title>

</head>
<body>
    <div id="corpo"> 
        <?php

        $cod = $_GET['cod'] ?? null; 
        if (!$cod) {
            echo msg_erro("Código do jogo não fornecido!");
            exit;
        }
        
        $capa = $_POST['capa'] ?? null; 
        if ($cod) {
            $q = "DELETE FROM jogos WHERE cod = '$cod'"; 
            if ($banco->query($q)) {
                if ($capa) { 
                    unlink("fotos/".$capa);
                }
                echo msg_sucesso("Jogo excluído com sucesso."); 
            } else {
                echo msg_erro("Não foi possível excluir o jogo.");
            }
        } else {
            echo msg_erro("Não foi possível excluir o jogo.");
        }
        
        echo voltar();
        ?> 	
    </div>
    <?php include_once 'rodape.php'; ?>
</body>
</html>