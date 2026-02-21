<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'l4j';
$con = mysqli_connect($host, $user, $pass, $db) or die("Não foi possível a conexão com o Banco");

session_start();
$email = mysqli_real_escape_string($con, $_POST['email']);
$senha = mysqli_real_escape_string($con, $_POST['senha']);

// Use password_hash() ao armazenar senhas no banco de dados e password_verify() para verificar senhas
$sql = "SELECT * FROM usuarios WHERE email = '$email' AND status = '1'";
$result = mysqli_query($con, $sql);

if ($result) {
    $reg = mysqli_fetch_assoc($result);
    
    // Verifica se a senha fornecida corresponde à senha no banco de dados usando password_verify()
    if ($reg && password_verify($senha, $reg['senha'])) {
        $_SESSION['email'] = $email;
        $_SESSION['id_user'] = $reg['id_user'];
        $_SESSION['nivel'] = $reg['nivel'];

        if ($_SESSION['nivel'] == 0) {
            header('location: admin.php');
            exit(); // Garante que o script pare após o redirecionamento
        } else {
            header('location: site.php');
            exit(); // Garante que o script pare após o redirecionamento
        }
    } else {
        // Se a senha estiver incorreta
        unset($_SESSION['email']);
        unset($_SESSION['id_user']);
        unset($_SESSION['nivel']);
        echo "<script> alert('Usuário ou senha incorretos!');";
        echo "window.location='index.php';</script>";
        exit(); // Garante que o script pare após a execução do JavaScript
    }
} else {
    // Se houver um erro na consulta SQL
    echo "Erro na consulta SQL: " . mysqli_error($con);
    exit(); // Garante que o script pare após a exibição do erro
}
?>
