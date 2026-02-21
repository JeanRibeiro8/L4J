<?php
session_start();

// Verificar se o usuário está logado
if(isset($_SESSION['usuario'])) {
    header("Location: dashboard.php"); // Redirecionar para o painel de controle se o usuário já estiver logado
    exit();
}

// Verificar o formulário de login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    // Verificar as credenciais (substitua isso pelo seu processo de autenticação)
    if ($usuario === "seu_usuario" && $senha === "sua_senha") {
        $_SESSION['usuario'] = $usuario;
        header("Location: dashboard.php"); // Redirecionar para o painel de controle após o login
        exit();
    } else {
        $erro = "Credenciais inválidas!";
    }
}
?>