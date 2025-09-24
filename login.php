<?php
// Configurações de conexão com o banco de dados
$host = 'localhost';
$user = 'root';
$password = '123456';
$database = 'library_db';

// Conectar ao banco de dados
$conn = new mysqli($host, $user, $password, $database);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Obter dados do frontend (email e senha)
$email = $_POST['email'];
$senha = $_POST['senha'];

// Preparar e executar a consulta SQL
$sql = "SELECT * FROM usuario WHERE email = ? LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email); // "s" indica que é uma string
$stmt->execute();
$result = $stmt->get_result();

// Verificar se o usuário existe
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Verificar se a senha está correta (assumindo que a senha está em texto claro, para segurança, use hashing)
    if ($senha === $user['senha']) {
        // Login bem-sucedido
        echo json_encode(["success" => true, "message" => "Autenticação bem-sucedida!"]);
    } else {
        // Senha incorreta
        echo json_encode(["success" => false, "message" => "Senha incorreta!"]);
    }
} else {
    // Usuário não encontrado
    echo json_encode(["success" => false, "message" => "Credenciais inválidas!"]);
}

// Fechar a conexão
$conn->close();
?>
