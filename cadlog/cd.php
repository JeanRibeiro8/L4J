<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "l4j";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

        if ($conn->query($sql) === TRUE) {
            echo"<script language='javascript' type='text/javascript'>
          alert('Usuário cadastrado com sucesso!');
          javascript:window.location='../menu/inicio.html'</script>";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }

        // Fechando a conexão
        $conn->close();
    }
?>