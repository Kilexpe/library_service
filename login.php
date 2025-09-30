<?php
$email = $_POST["email"];
$password = $_Post["senha"];

// Conectar ao banco de dados
$host = 'localhost';
$user = 'root';
$password = '123456';
$database = 'library_db';


try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM usuario Where email = ?";
    $query = $conn->prepare($sql);
    $query->execute([$email]);
    $resultados = $query->fetchAll(PDO::FETCH_ASSOC);

    if ($resultados == null) {
        echo "Esse Email não existe ou Minha consulta deu erro, socorro programador";
    } else {
        echo "Esse Email está no banco de dados e foi achado no banco de dados...";
        echo "Direcionando para o dashboard...";
        header("Location: Dashboard.html");
        exit;
    }

} catch (PDOException $e) {
    die("Erro de conexão, verifique a conexão do banco de dados");
}
    

