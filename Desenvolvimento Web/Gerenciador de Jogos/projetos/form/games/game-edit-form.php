
<h1>Alteração de Dados do Jogo</h1>
<form action="game-edit.php?cod=<?php echo $reg->cod; ?>" method="post" enctype="multipart/form-data"> 
    <input type="hidden" name="velha_capa" value="<?php echo $reg->capa; ?>"> 
    <table>
        <tr><td>Nome do Jogo:
            <td><input type="text" name="nome" id="nome" maxlength="30" size="30" required value="<?php echo $reg->nome; ?>"> 
        
        <tr><td>Gênero:
            <td><input type="text" name="genero" id="genero" maxlength="30" required value="<?php echo $reg->genero; ?>"> 

        <tr><td>Produtora:
            <td><input type="text" name="produtora" id="produtora" maxlength="30" required value="<?php echo $reg->produtora; ?>"> 

        <tr><td>Descrição:
            <td><input type="text" name="descricao" id="descricao" maxlength="255" required value="<?php echo $reg->descricao; ?>"> 

        <tr><td>Nota:
            <td><input type="number" name="nota" id="nota" min="0" max="10" step="0.1" required value="<?php echo $reg->nota; ?>"> 

        <tr><td>Capa:
            <td><input type="file" name="capa" id="capa"> 
            <br/><small>Capa atual: <?php echo $reg->capa; ?></small> 
        
        <tr><td colspan="2" style="text-align: right;">
            <input type="submit" name="save_image" value="Salvar" class="botao-busca"> 
    </table>
</form>
