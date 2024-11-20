function confirmDeleteUser(usuario) {
    if (confirm("Você tem certeza que deseja excluir o usuário " + usuario + "?")) {
        window.location.href = "user-delete.php?id=" + usuario; 
    }
}
function confirmDeleteGame(cod) {
    if (confirm("Você tem certeza que deseja excluir o jogo?")) {
        window.location.href = "game-delete.php?cod=" + cod; // Corrigido de 'jogo' para 'cod'
    }
}
