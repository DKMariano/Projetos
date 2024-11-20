<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="estilos/estilo.css"/> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link rel="shortcut icon" href="icones/favicon.ico" type="image/x-icon">
    <title>Deletar Usuário</title>    
</head>
<body>
    <?php
        require_once "includes/banco.php";  
        require_once "includes/funcoes.php"; 
        require_once "includes/login.php";


        if (!is_logado()) {
            echo msg_erro("Efetue o <a href='user-login.php'>login</a> para poder editar seus dados."); 
        } else {

            $usuario = $_GET['id']; 
            
            if ($usuario) {
 
                $q = "DELETE FROM usuarios WHERE usuario = '$usuario'"; 
                $res = $banco->query($q); 
                
                if ($res) {
                    echo msg_sucesso("Usuário excluído com sucesso.");
                } else {
                    echo msg_erro("Não foi possível excluir o usuário.");
                }
            } else {
                echo msg_erro("Nenhum usuário especificado para exclusão.");
            }
        }
        echo voltar();
    ?> 	
</div>
<?php include_once 'rodape.php';  ?>
</body>
</html>
