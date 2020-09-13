<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset = "UTF-8"/>
        <title>Editar Alunos</title>
    </head>

    <body>
    <?php
        if(empty($_POST)){
           include('cabecalho_conexao.php');

            $pront = $_GET['pront'];
            $SQL = "SELECT * FROM pessoas WHERE id = $pront";
            $query = mysqli_query($con, $SQL);

            if(mysqli_num_rows($query)>0){
                while(($resultado = mysqli_fetch_array($query)) != null){
					$mudar_nome = $resultado[1];
                    $mudar_idade = $resultado[2];
                    $mudar_endereco = $resultado[3];
                }

                echo'<form action = "editar_alunos.php" method = "POST">
					<fieldset>
					<legend>Editar informações dos alunos:</legend>
					
                    <label>Novo nome:</label>
                    <input type = "text" name = "novonome" value = "'.$mudar_nome.'"/>
                    </br>
					
                    <label>Nova idade:</label>
                    <input type = "number" name = "novaidade" value = "'.$mudar_idade.'"/>
                    </br>
					
                    <label>Novo endereço:</label>
                    <input type = "text" name = "novoendereco" value=  "'.$mudar_endereco.'"/>
					
                    <input type = hidden name = "id" value = "'.$pront.'"/>
                    <input type = "submit" value = "Enviar"/>
					
                    <a href = "cons_todos_alunos.php>Voltar</a>
					</fieldset>
                </form>';
            }
        }else{
            $novonome = $_POST['novonome'];
            $novaidade = $_POST['novaidade'];
            $novoendereco = $_POST['novoendereco'];
            $id = $_POST['id'];

            include('cabecalho_conexao.php');

            $SQL = "UPDATE pessoas SET nome = '$novonome', idade = '$novaidade', endereco= '$novoendereco' WHERE id = $id";

            include('rodape_conexao.php');
        } 
    ?>
    </body>
</html>