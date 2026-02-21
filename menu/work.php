<?PHP
	include "dbconexao.php";
	$sql = "SELECT * FROM empregos";
	$res = mysqli_query($con,$sql);

	mysqli_free_result($res);
	mysqli_close ($con);

			while ($reg = mysqli_fetch_array($res))
				{
					$codigo = $reg["codigo"];
					$titulo = $reg["titulo"];
					$autor = $reg["autor"];
					$editora = $reg["editora"];
					$genero = $reg["genero"];
					$paginas = $reg["numero_paginas"];
					$isbn = $reg["isbn"];
					$imagem = $reg["imagem"];
?>