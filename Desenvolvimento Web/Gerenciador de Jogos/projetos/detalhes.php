<!DOCTYPE html>
<?php
    require_once "includes/banco.php";  
    require_once "includes/funcoes.php"; 
    require_once "includes/login.php";
?>
<html lang="pt-br">
<head>  
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="estilos/estilo.css"/> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <script src="js/scripts.js"></script> 
    <title>Detalhes de Jogos</title>
</head>
<body>
    <div id="corpo"> 
		<?php 
			include_once "topo.php";
			$c = $_GET['cod'] ?? 0;
            $busca = $banco->query("SELECT * FROM jogos WHERE cod='$c'"); 
        ?>
        <h1>Detalhes do jogo</h1>
        <table class="detalhes"> 
            <?php
                if (!$busca) {
                    echo "<tr><td>A busca falhou! {$banco->error}</td></tr>"; 
                } else {
                    if ($busca->num_rows == 1) {
                        $reg = $busca->fetch_object();
						$t = thumb($reg->capa);
                        echo "<tr><td rowspan='3'><img src='$t' class='full'/>";
                        echo "<td><h2>$reg->nome</h2>"; 
						echo "Nota: ".number_format($reg->nota, 1)."/10.0"; 

                             if (is_admin()) {
                                echo "        <a href='game-new.php'><span class='material-symbols-outlined'>add_circle</span> </a> ";
                                echo "<a href='game-edit.php?cod=".$reg->cod."'><span class='material-symbols-outlined'>edit</span></a>"; 
                                echo "<a href='#' onclick=\"confirmDeleteGame('".$reg->cod."')\"> <span class='material-symbols-outlined'>delete</span></a>";  
                            } elseif (is_editor()) {
                                echo "<a href='game-edit.php?cod=".$reg->cod."'><span class='material-symbols-outlined'>edit</span></a>";   
                            }  
        
                        echo "<tr><td>$reg->descricao"; 
                    } else {
                        echo "<tr><td>Nenhum registro encontrado"; 
                    }
                }
            ?>
        </table>
    <?php echo voltar()?> 	
    </div> 
    <?php include_once "rodape.php";?> 
</body>
</html>
