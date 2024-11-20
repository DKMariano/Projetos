<!DOCTYPE html>
<?php
        require_once "includes/banco.php";  
        require_once "includes/funcoes.php"; 
        require_once "includes/login.php";
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="estilos/estilo.css"/> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link rel="shortcut icon" href="/icones/favicon.ico" type="image/x-icon">
    <title>Logout</title>    
</head>
<body>
    <div id="corpo">
        <?php
            logout();
            echo msg_sucesso('Usuário deslogado com sucesso!'); 
            echo voltar();         
        ?>
    </div>
</body>
</html>