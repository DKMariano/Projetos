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
    <title>Cadastrar Novo Jogo</title>
</head>
<body>
    <div id="corpo"> 
        <?php
            if (!isset($_POST['save_image'])) {
                require "form/games/game-new-form.php"; 
            } else {
             
                $nome = $_POST['nome']; 
                $genero = $_POST['genero']; 
                $produtora = $_POST['produtora']; 
                $descricao = $_POST['descricao']; 
                $nota = $_POST['nota'];
                $capa = $_FILES['capa']['name']; 
                
                $check_query = "SELECT * FROM jogos WHERE nome = '$nome'";
                $result = mysqli_query($banco, $check_query);
                    
                if (mysqli_num_rows($result) > 0) {
                    echo msg_erro("Erro: O jogo '$nome' já existe no banco de dados.");
                    
                } else {
                    $insert_image_query = "INSERT INTO jogos (nome, genero, produtora, descricao, nota, capa) VALUES ('$nome', '$genero', '$produtora', '$descricao', '$nota', '$capa')";  
                    if (mysqli_query($banco, $insert_image_query)) {
                        if (move_uploaded_file($_FILES["capa"]["tmp_name"], "fotos/" . $capa)) {
                            echo msg_sucesso('A imagem foi salva com sucesso');
                            
                        } else {
                            echo msg_erro("Erro ao mover a imagem para a pasta fotos.");
                        }
                    } else {
                        echo msg_erro("Erro ao enviar a imagem.");
                    }
                }
            }            
            echo voltar(); 
        ?>
    </div>
    <?php include_once 'rodape.php';  ?>
</body>
</html>