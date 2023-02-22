<!DOCTYPE html>
<html lang="pt">
    <cabeça>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar suas informações</title>
    </cabeça>
    <corpo>
        <?php
            session_start();
            require_once 'acao/banco.php';
            
            $id_aluno = $_SESSION['id'];
                echo "<center>";
                echo "<fieldset>";
                echo "
                    <h1> Alterar seus dados </h1>
                ";  

                $sql = "SELECT * FROM aluno WHERE id_aluno = '$id_aluno'";
                $result = $connect -> query($sql);
                $data = $result -> fetch_assoc();

                echo "<form method='POST' action='acao/update.php'>";

                echo "
                    <label for='name'> Seu nome: </label>
                    <input type='text' name='name' id='name' value=".$data['nome_aluno']."/>
                    <br> <br>
                    <label for='email'> Seu email: </label>
                    <input type='text' name='email' id='email' value=".$data['email']."/>
                    <br><br>
                    <label for='pass'> Sua senha: </label>
                    <input type='text' name='pass' id='pass' value=".$data['senha']."/>
                    <input type='submit' value='Enviar'/>
                ";

                echo "</form>";
                echo "</fieldset>";
                echo "</center>";
        ?>
    </corpo>
</html>
