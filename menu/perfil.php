<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se foi enviado um arquivo
    if (isset($_FILES["inputImagem"]) && $_FILES["inputImagem"]["error"] == 0) {
        
        // Caminho para armazenar as imagens
        $caminhoSalvar = "../img/";

        // Gera um nome único para o arquivo
        $nomeArquivo = uniqid() . '_' . $_FILES["inputImagem"]["name"];

        // Move o arquivo para o diretório de destino
        if (move_uploaded_file($_FILES["inputImagem"]["tmp_name"], $caminhoSalvar . $nomeArquivo)) {
            // Aqui você pode atualizar o banco de dados com o nome do arquivo
            // Conectar ao banco de dados (substitua os valores conforme necessário)
            $conexao = new mysqli("localhost", "usuario", "senha", "l4j");

            // Verifica se a conexão foi bem-sucedida
            if ($conexao->connect_error) {
                die("Erro de conexão: " . $conexao->connect_error);
            }

            // Obtém o caminho completo da imagem para salvar no banco de dados
            $caminhoCompleto = $caminhoSalvar . $nomeArquivo;

            // Obtém outros dados do formulário
            $email = $_POST["email"];
            $celular = $_POST["celular"];
            $cep = $_POST["cep"];
            $idade = $_POST["idade"];
            $senha = $_POST["senha"];
            $rg = $_POST["rg"];

            // Atualiza a tabela 'usuarios' com o caminho da imagem
            $query = "UPDATE usuarios SET img = '$caminhoCompleto', email = '$email', celular = '$celular', cep = '$cep', idade = '$idade', senha = '$senha', rg = '$rg' WHERE id = 1"; // Substitua 'id' e '1' pelos valores adequados
            $resultado = $conexao->query($query);

            // Verifica se a atualização foi bem-sucedida
            if ($resultado) {
                echo "Perfil atualizado com sucesso!";
            } else {
                echo "Erro ao atualizar o perfil: " . $conexao->error;
            }

            // Fecha a conexão com o banco de dados
            $conexao->close();
        } else {
            echo "Erro ao mover o arquivo para o servidor.";
        }
    } else {
        echo "Erro no envio do arquivo.";
    }
}
?>
