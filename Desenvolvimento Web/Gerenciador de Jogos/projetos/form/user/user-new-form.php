<h1>Cadastro de Novo Usuário</h1>
<form action="user-new.php" method="post"> 
    <table>
        <tr><td>Nome de Usuário:
            <td><input type="text" name="usuario" id="usuario" size="10" maxlength="10">
        
        <tr><td>Nome Completo:
            <td><input type="text" name="nome" id="nome" size="30" maxlength="30">
        
        <tr><td>Nível de Acesso:
            <td><select name="tipo" id="tipo">
            <option value="admin">Administrador do Sistema</option>
            <option value="editor" selected>Editor </option>
            </select>

        <tr><td>Digite a Senha:
            <td><input type="password" name="senha1" id="senha1" size="10" maxlength="10">
        <tr><td>Confirme a Senha:
            <td><input type="password" name="senha2" id="senha2" size="10" maxlength="10">
        <tr>
            <td colspan="2" style="text-align: right;">
            <input type="submit" value="Salvar" class="botao-busca"> 
    </table>
</form>
