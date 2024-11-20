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
    <title>Edição de Dados do Jogo (Administrador)</title>
</head>
<body>
    <div id="corpo"> 
        <?php
     
        $cod = $_GET['cod'] ?? null; 
        if (!$cod) {
            echo msg_erro("Código do jogo não fornecido!");

        }

        
        $q = "SELECT * FROM jogos WHERE cod='$cod'";
        $res = $banco->query($q);
        $reg = $res ? $res->fetch_object() : null;

        if (!$reg) {
            echo msg_erro("Jogo não encontrado!"); 
            

        }


        if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
            $nome = $_POST['nome']; 
            $genero = $_POST['genero']; 
            $produtora = $_POST['produtora']; 
            $descricao = $_POST['descricao']; 
            $nota = $_POST['nota'];
            $nova_capa = $_FILES['capa']['name']; 
            $velha_capa = $_POST['velha_capa']; 

          
            if (!empty($nova_capa)) { 
                $update_capa = $nova_capa;
            } else {
                $update_capa = $velha_capa; 
            }

 
            $q_update = "UPDATE jogos SET nome='$nome', genero='$genero', produtora='$produtora', descricao='$descricao', capa='$update_capa', nota='$nota' WHERE cod='$cod'";


            if ($banco->query($q_update)) { 
                
                if (!empty($nova_capa)) {
                    move_uploaded_file($_FILES['capa']['tmp_name'], "fotos/" . $nova_capa);
                   
                    if ($velha_capa !== $nova_capa && file_exists("fotos/".$velha_capa)) {
                        unlink("fotos/".$velha_capa);
                    }
                }
                echo msg_sucesso("Jogo atualizado com sucesso!"); 
            } else {
                echo msg_erro("Não foi possível alterar os dados do jogo."); 
            }
        } else {
      
            require "form/games/game-edit-form.php"; 
        }

        echo voltar(); 	
        ?> 
    </div>
    <?php include_once 'rodape.php'; ?>
</body>
</html>