<?php
try {
    // Cria (ou abre) o banco de dados SQLite
    $pdo = new PDO('sqlite:suggestions.db');

    // Define o modo de erro do PDO para exceção
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Cria a tabela "suggestions" se não existir
    $pdo->exec("CREATE TABLE IF NOT EXISTS suggestions (
        id INTEGER PRIMARY KEY,
        name TEXT NOT NULL,
        email TEXT NOT NULL,
        phone TEXT NOT NULL,
        suggestion TEXT NOT NULL,
        datetime TEXT NOT NULL
    )");

    echo "Banco de dados e tabela criados com sucesso.";
} catch (PDOException $e) {
    echo "Erro ao criar o banco de dados: " . $e->getMessage();
}
?>
