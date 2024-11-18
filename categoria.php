<?php
// Inicia a sessão
session_start();

// Inclui a conexão com o banco de dados
$host = "localhost";
$dbname = "carros_db";
$user = "root"; // Substitua pelo seu usuário
$password = ""; // Substitua pela sua senha

$conn = new mysqli($host, $user, $password, $dbname);

// Verifica a conexão com o banco
if ($conn->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
}

// Consulta as categorias na tabela CATEGORIA
$sql = "SELECT id, nome FROM CATEGORIA";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Categorias</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Lista de Categorias</h1>

    <!-- Tabela de Categorias -->
    <table>
        <tr>
            <th>ID</th>
            <th>Nome da Categoria</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['nome']); ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="2">Nenhuma categoria encontrada.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>

<?php
// Fecha a conexão com o banco de dados
$conn->close();
?>
