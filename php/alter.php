<?php
// Obter o valor do parâmetro "id" enviado via POST
$id = $_POST["id"];

$host = "db-concessionaria.ch6oiaqhw5j6.us-east-1.rds.amazonaws.com";
$username = "lafigueiredo";
$password = "";
$database = "db_concessionaria";

// Conexão com o banco de dados
$conn = new mysqli($host, $username, $password, $database);

// Verificar se houve erro na conexão
if ($conn->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
}

// Atualizar a quantidade na tabela "alocacao" para o veículo com o ID especificado
$sql = "UPDATE alocacao SET quantidade = quantidade - 1 WHERE id = " . $id;
$conn->query($sql);

// Exibir uma mensagem de sucesso em JavaScript e redirecionar para a página "index.html"
echo '<script>alert("Venda Feita com Sucesso");
window.location.href = "../index.html";</script>';

// Fechar a conexão com o banco de dados
$conn->close();
?>
