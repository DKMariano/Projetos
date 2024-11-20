<?php

echo "<header>";

if (empty($_SESSION['user']))
    echo "<a href='user-login.php'>Entrar</a>";
else{
    echo "<div ><b>Olá, <strong>".$_SESSION['nome']."</strong>! </b><br><br>";
    echo "<a href='user-edit.php'>| Meus Dados </a>| ";
    if(is_admin()){
        echo "<a href='user-list.php'> Administrar Usuários |</a>";
        echo "<a href='game-new.php'>Novo Jogo|</a> ";
    }  
    echo "<a href='user-logout.php'>Sair </a>";
}
echo "</header>";

?>
