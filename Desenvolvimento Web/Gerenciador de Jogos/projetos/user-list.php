<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="estilos/estilo.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link rel="shortcut icon" href="icones/favicon.ico" type="image/x-icon">
    <title>Administrar Usuários</title>
    <script src="js/scripts.js"></script> 

    
</head>
<body>
    <?php
        require_once "includes/banco.php";  
        require_once "includes/funcoes.php"; 
        require_once "includes/login.php";
    ?> 
    <div id="corpo"> 
        <h1>Usuários Cadastrados</h1>
        <?php
            if (!is_logado()) {
                echo msg_erro("Efetue o <a href='user-login.php'>login</a> para poder editar seus dados."); 
            } else {
                $q = "SELECT usuario, nome, tipo FROM usuarios"; 
                $res = $banco->query($q);
                if ($res && $res->num_rows > 0){ 
                    echo "<table class='neon-retro'>";
                    echo "<thead>"; 
                    echo "<tr>";
                    echo "<th>#</th>";
                    echo "<th>Usuário</th>";
                    echo "<th>Nome Completo</th>";                    
                    echo "<th>Nível de Acesso</th>";
                    echo "<th>Ações</th>"; 
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>"; 
                    $contador = 1; 
                    while ($row = $res->fetch_object()) { 
                        echo "<tr>";
                        echo "<td>".$contador."</td>";
                        echo "<td>".$row->usuario."</td>";
                        echo "<td>".$row->nome."</td>";
                        echo "<td>".$row->tipo."</td>";
                        echo "<td>"; 
                        echo "<a href='user-new.php'><span class='material-symbols-outlined'>add_circle</span></a>";
                        echo "<a href='user-edit-adm.php?usuario=".$row->usuario."'><span class='material-symbols-outlined'>edit</span></a>"; 
                        echo "<a href='#' onclick=\"confirmDeleteUser('".$row->usuario."')\"> <span class='material-symbols-outlined'>delete</span></a>"; 
                        echo "</td>"; 
                        echo "</tr>";
                        $contador++; 
                    }
                    echo "</tbody>";
                    echo "</table>";
                } else {
                    echo msg_erro("Não há usuários cadastrados!");
                }
            }
            echo voltar();
        ?> 	
    </div>
    <?php include_once 'rodape.php'; ?>
</body>
</html>
