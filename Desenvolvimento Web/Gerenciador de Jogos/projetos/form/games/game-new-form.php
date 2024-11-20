<?php
require_once "includes/banco.php";  
require_once "includes/funcoes.php"; 
require_once "includes/login.php";
?>

<h1>Cadastro de Novo Jogo</h1>
<form action="game-new.php" method="post" enctype="multipart/form-data">
    
    <table>
        <tr><td>Nome do Jogo
            <td><input type="text" name="nome" id="nome" size="30" maxlength="30" required>
        
        <tr><td>Gênero
            <td><input type="text" name="genero" id="genero" size="30" maxlength="30" required>

        <tr><td>Produtora
            <td><input type="text" name="produtora" id="produtora" size="30" maxlength="30" required>
        <tr><td>Descrição
            <td><input type="text" name="descricao" id="descricao" size="30" maxlength="255" required>
        <tr><td>Nota:
            <td><input type="number" name="nota" id="nota" min="0" max="10" step="0.1" required>
        <tr><td>Capa:
            <td><input type="file" name="capa" id="capa" required>
        <tr><td colspan="2" style="text-align: right;">
            <input type="submit" name="save_image" value="Salvar" class="botao-busca"> 

    </table>
</form>
