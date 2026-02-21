<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'l4j';
$con = mysqli_connect($host, $user, $pass, $db) or die("Não foi possível a conexão com o Banco");

session_start();
$email = $_POST['email'];
$senha = $_POST['senha'];

// Evite vulnerabilidades de segurança usando declarações preparadas ou mysqli_real_escape_string para escapar caracteres especiais
$email = mysqli_real_escape_string($con, $email);
$senha = mysqli_real_escape_string($con, $senha);

$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    $reg = mysqli_fetch_array($result);
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    $nivel = $reg['nivel'];
    $_SESSION['nivel'] = $nivel;

    if ($nivel == 0) {
        header('Location: ../menu/inicio.html'); // Redireciona para o início do usuário com nível 0
    } else {
        header('Location: ../menu/outro.html'); // Redireciona para outra página para usuários com outro nível
    }
} else {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    unset($_SESSION['nivel']);
    echo "<script> alert('Usuário ou senha incorretos!');";
    echo "window.location='../index.html';</script>";
}
?>
