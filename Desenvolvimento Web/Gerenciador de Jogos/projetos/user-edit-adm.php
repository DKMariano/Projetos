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
    <title>Edição de Dados do Usuário (Administrador)</title>
</head>
<body>
    <div id="corpo"> 
    <?php
        if (!is_logado()) {
            echo msg_erro("Efetue o <a href='user-login.php'>login</a> para poder editar os dados de outros usuários."); 
        } else {
            $usuario = $_GET['usuario']; 

            $q = "SELECT * FROM usuarios WHERE usuario='$usuario'";
            $res = $banco->query($q);
            $reg = $res ? $res->fetch_object() : null;

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $novo_usuario = $_POST['usuario'];
                $nome = $_POST['nome'];
                $tipo = $_POST['tipo'] ?? null; 
                $senha1 = $_POST['senha1'] ?? null; 
                $senha2 = $_POST['senha2'] ?? null; 
            
                if (empty($nome)) {
                    echo msg_erro("O nome do usuário não pode ficar em branco."); 
                    return; 
                }
            
                if ($senha1 && $senha1 !== $senha2) {
                    echo msg_erro("As senhas não coincidem. Tente novamente.");
                } else {
                    $q_update = "UPDATE usuarios SET nome='$nome', tipo='$tipo'";
            
                    if ($novo_usuario !== $usuario) {
                        $q_update .= ", usuario='$novo_usuario'"; 
                    }
                    
                    if ($senha1) {
                        $q_update .= ", senha='" . gerarHash($senha1) . "'"; 
                    }
            
                    $q_update .= " WHERE usuario='$usuario'"; 
            
                    if ($banco->query($q_update)) {
                        echo msg_sucesso("Usuário alterado com sucesso!");
                    } else {
                        echo msg_erro("Não foi possível alterar os dados.");
                    }
                }
            } else {
                include "form/user/user-edit-adm-form.php"; 
            }
            
        }
    echo voltar(); 	
    ?> 
    </div>
    <?php include_once 'rodape.php';  ?>
</body>
</html>
