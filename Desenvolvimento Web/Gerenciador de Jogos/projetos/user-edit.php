<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="estilos/estilo.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link rel="shortcut icon" href="icones/favicon.ico" type="image/x-icon">
    <title>Edição de Dados do Usuário</title>
    
</head>
<body>
    <?php
        require_once "includes/banco.php";  
        require_once "includes/funcoes.php";
        require_once 'includes/login.php'; 
    ?> 
    <div id="corpo"> 
        <?php
            if(!is_logado()){
                echo msg_erro("Efetue login para poder editar seus dados."); 
            }else{
                if(!isset($_POST['usuario'])){
                    include "form/user/user-edit-form.php";
                }else{
                    $usuario = $_POST['usuario']??null;
                    $nome = $_POST['nome']??null;
                    $tipo = $_POST['tipo']??null;
                    $senha1 = $_POST['senha1']??null;
                    $senha2 = $_POST['senha2']??null;

                    $q= "UPDATE usuarios SET usuario = '$usuario', nome = '$nome'";

                    if(empty($senha1) || is_null($senha2)){
                        echo msg_aviso("A senha antiga foi mantida.");
                    }else{
                        if($senha1 === $senha2){
                            $senha = gerarHash($senha1);
                            $q .= ", senha='$senha'"; 
                        }else{
                            echo msg_erro("As senhas não conferem. A senha anterior foi mantida."); 
                        }
                    }
                    $q .= " WHERE usuario = '".$_SESSION['user']."'"; 
                    if($banco->query($q)){
                        echo msg_sucesso("Usuário alterado com sucesso!");
                        logout(); 
                        echo msg_sucesso("Por segurança efetue o <a href='user-login.php'>login</a> novamente");
                    }else{
                        echo msg_erro("Não foi possível alterar os dados.");
                    }
                }
            }
        echo voltar(); 	
        ?>
    </div>
    <?php include_once 'rodape.php';  ?>
</body>
</html>