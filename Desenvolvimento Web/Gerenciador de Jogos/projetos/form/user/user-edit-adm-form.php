<h1>Alteração de Dados</h1>

<form action="user-edit-adm.php?usuario=<?php echo $usuario; ?>" method="post">
    <table>
        <tr><td>Nome de Usuário:</td>
            <td><input type="text" name="usuario" id="usuario" maxlength="10" size="10" value="<?php echo $reg->usuario; ?>" required>
        
        <tr><td>Nome Completo:
            <td><input type="text" name="nome" id="nome" maxlength="30" size="30" value="<?php echo $reg->nome; ?>" required>

        <tr><td>Nível de Acesso:
            <td><select name="tipo" id="tipo">
            <option value="admin">Administrador do Sistema</option>
            <option value="editor" selected>Editor </option>
            </select>
        
            <tr><td>Nova Senha:
            <td><input type="password" name="senha1" id="senha1" maxlength="10" size="10">

        <tr>
            <td>Confirme a Nova Senha:</td>
            <td><input type="password" name="senha2" id="senha2" maxlength="10" size="10"></td>

        <tr><td colspan="2" style="text-align: right;">
                <input type="submit" value="Salvar Alterações" class="botao-busca">

    </table>
</form>