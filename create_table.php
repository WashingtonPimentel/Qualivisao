<?php
try {
    // Conecte-se ao banco de dados SQLite
    $pdo = new PDO('sqlite:qualivisao.db');
    // Defina o modo de erro do PDO para exceção
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Crie a tabela se ela não existir
    $sql = "CREATE TABLE IF NOT EXISTS sugestoes (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                nome TEXT NOT NULL,
                email TEXT NOT NULL,
                opiniao TEXT NOT NULL
            )";

    // Execute a consulta
    $pdo->exec($sql);
    echo "Tabela criada com sucesso (ou já existia).";
} catch (PDOException $e) {
    echo "Erro ao criar a tabela: " . $e->getMessage();
}
?>
