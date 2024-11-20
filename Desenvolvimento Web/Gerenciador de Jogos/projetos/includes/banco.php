<?php
    $banco = new mysqli("localhost", "root", "", "banco_jogos");
    if($banco->connect_errno){
        echo "<p>Encontrei um erro no {$banco->errno} --> {$banco->connect_error}</p>";
        die();
    }
    
    $banco->query("SET names 'utf8'");
    $banco->query("SET character_set_connection=utf8");
    $banco->query("SET character_set_client=utf8");
    $banco->query("SET character_set_results=utf8");

?>
