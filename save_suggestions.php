<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Conexão com o banco de dados SQLite
        $pdo = new PDO('sqlite:qualivisao.db');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Captura os dados do formulário
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $opiniao = $_POST["opiniao"];

        // Prepara a consulta SQL
        $stmt = $pdo->prepare("INSERT INTO sugestoes (nome, email, opiniao) VALUES (:nome, :email, :opiniao)");

        // Executa a consulta SQL
        $stmt->execute(array(':nome' => $nome, ':email' => $email, ':opiniao' => $opiniao));

        // Retorna uma resposta para o frontend
        echo json_encode(array("success" => true));
    } catch (PDOException $e) {
        // Retorna uma mensagem de erro em caso de falha na conexão ou consulta
        echo json_encode(array("error" => "Erro ao salvar os dados: " . $e->getMessage()));
    }
} else {
    // Retorna uma mensagem de erro caso o formulário não tenha sido submetido corretamente
    echo json_encode(array("error" => "O formulário não foi submetido corretamente."));
}
?>
