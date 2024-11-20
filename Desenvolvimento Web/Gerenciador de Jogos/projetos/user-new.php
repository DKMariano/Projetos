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
    <title>Cadastrar Novo Usuário</title>
</head>
<body>
    <div id="corpo"> 
        <?php
            if(!is_admin()){
                echo msg_erro("Área restrita ao administrador!"); 
            } else {
                if(!isset($_POST['usuario'])){
                    require "form/user/user-new-form.php"; 
                } else {
                    $usuario = $_POST['usuario'] ?? null; 
                    $nome = $_POST['nome'] ?? null; 
                    $senha1 = $_POST['senha1'] ?? null; 
                    $senha2 = $_POST['senha2'] ?? null; 
                    $tipo = $_POST['tipo'] ?? null; 

                    if($senha1 === $senha2){ 
                        if(empty($usuario) || empty($nome) || empty($senha1) || empty($senha2) || empty($tipo)){
                            echo msg_erro("Todos os dados são obrigatórios");
                        } else {
                            $verifica_usuario = $banco->query("SELECT COUNT(*) as total FROM usuarios WHERE usuario='$usuario'"); 
                            $resultado = $verifica_usuario->fetch_assoc(); 

                            if($resultado['total'] > 0) { 
                                echo msg_erro("Este nome de usuário já está em uso. Escolha outro."); 
                            } else {
                                $senha= gerarHash($senha1);
                                $q = "INSERT INTO usuarios (usuario, nome, senha, tipo) VALUES ('$usuario', '$nome', '$senha', '$tipo')"; 
                                if($banco->query($q)){
                                    echo msg_sucesso("O novo usuário $nome foi cadastrado com sucesso."); 
                                } else {
                                    echo msg_erro("Não foi possível criar o usuário $usuario."); 
                                }
                            }
                        }
                    } else {
                        echo msg_erro("As senhas não conferem. Tente novamente."); 
                    }
                }
            }

            echo voltar();
        ?>
    </div>
    <?php include_once 'rodape.php';  ?>
</body>
</html>
