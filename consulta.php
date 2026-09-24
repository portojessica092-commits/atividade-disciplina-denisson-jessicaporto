<?php
// Inclui o arquivo da classe Pessoa
require_once 'pessoa.php';

// Chama o método estático listarTodos() para recuperar todos os registros do banco em formato de array
$pessoas = Pessoa::listarTodos();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Cadastros</title>
</head>
<body>
    <h3>Lista de Pessoas Cadastradas</h3>
    <table border="1">
        <tr>
            <th>ID</th><th>Nome</th><th>User</th><th>Email</th><th>Ações</th>
        </tr>
        <?php if (!empty($pessoas)): ?>
            <?php foreach ($pessoas as $pessoa): ?>
                <tr>
                    <td><?php echo htmlspecialchars($pessoa['id']); ?></td>
                    <td><?php echo htmlspecialchars($pessoa['nome']); ?></td>
                    <td><?php echo htmlspecialchars($pessoa['user']); ?></td>
                    <td><?php echo htmlspecialchars($pessoa['email']); ?></td>
                    <td>
                        <a href="edita.php?id=<?php echo $pessoa['id']; ?>">Editar</a> | 
                        <a href="deleta.php?id=<?php echo $pessoa['id']; ?>" onclick="return confirm('Deseja excluir?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="5">Nenhum registro encontrado.</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>