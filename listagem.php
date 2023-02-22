<!DOCTYPE html>
<html lang="pt-NR">
    <cabeça>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Listagem</title>
    </cabeça>
    <corpo>
        <?php
            require_once 'acao/banco.php';
            session_start();

            $sql_alunos = "SELECT * FROM aluno WHERE id_aluno > 1";
   

            echo "<center>";
            echo "<fieldset>";

            echo "
                <h1> Lista de TODOS os alunos ativos </h1>
            ";
            echo "<table border='1'>";
            if($sql_alunos -> num_rows > 0){
                while($row = $sql_alunos-> fetch_assoc()){
                    echo "
                        <tr align='center'>
                            <th> Matrícula</th>
                            <th> Nome do aluno</th>
                            <th> Email do aluno</th>
                            
                        </tr>
                        <tr align='center'>
                            <td>".$row['id_aluno']."</td>
                            <td>".$row['nome_aluno']."</td>
                            <td>".$row['email']."</td>
                        </tr>
                    ";
                }
            } 
            else {
                echo "
                    <h2> Não temos alunos no momento</h2>
                ";
            }

            echo "</table>";
            echo "<hr>";
        ?>

        <?php
            $cursos = "SELECT * FROM cursos";
            $cursos = $connect -> query($cursos);

            echo "<h1>Organizar os alunos por curso</h1>";

            echo "<form method='POST'>";
            echo "<select name='curso'>";
            echo "<option value = 'null'> SELECIONAR </option>";

            while($row = $cursos -> fetch_assoc()){
                echo "
                    <option value=".$row['id_curso']."> ".$row['nome_curso']."</option>
                ";
            }
            echo "<input type='submit' value='Escolher'/> ";
            echo "</form>";

        ?>

        <?php
            if($_POST &&  $_POST['curso'] != 'null'){
                $id = $_POST['curso'];

                $sql_aluno_por_curso = 
                    "SELECT a.nome_aluno, a.email 
                    FROM aluno as a, compra as co, cursos as cu 
                    WHERE co.id_aluno = a.id_aluno AND co.id_curso = cu.id_curso AND cu.id_curso = '$id'
                    GROUP BY a.id_aluno 
                ";
                $sql_aluno_por_curso = $connect -> query($sql_aluno_por_curso);


                echo "<table border='1'>";
                if($sql_aluno_por_curso -> num_rows > 0 ){
                    echo "
                        <tr algin='center'> 
                        <th> Nome do meliante </th>
                        <th> Email do meliante</th>
                    
                        </tr>
                    ";
                    while($row = $sql_aluno_por_curso -> fetch_assoc()){
                        echo "
                            <tr align='center'>
                                <td>".$row['nome_aluno']."</td>
                                <td>".$row['email']."</td>
                            </tr>
                        ";
                    }
                    
                }
                else {
                    echo 
                        "<h2> Não possuímos alunos nesse curso no momento</h2>
                    ";
                }
                echo "</table>";
            } elseif(@$_POST['curso'] == null || $_POST['curso'] == 'null') {
                echo "<br >Por favor, selecione um curso";
            } else {
                echo "[error]";
            }

            echo "<hr>";
        ?>

        <?php
            $cursos = "SELECT * FROM cursos WHERE vagas_total >= 1";
            $cursos = $connect -> query($cursos);

            echo "<h1> Cursos atuais </h1>";

            if($cursos ->num_rows > 0 ){
                echo "<table border='1'>";
            
                echo "
                <tr align ='center'>
                    <th> Nome do curso </th>
                    <th> Preço </th>
                    <th> Vagas abertas </th>
                    <th> Vagas fechadas </th>
                    <th> Descrição do curso </th>
                </tr>";

                while($row = $cursos -> fetch_assoc()){
                
                    echo "
                        <tr align ='center'>
                            <td>".$row['nome_curso']."</td>
                            <td>".$row['preco']."</td>
                            <td>".$row['vagas_total']."</td>
                            <td>".$row['vagas_preenchidas']."</td>
                            <td>".$row['descricao']."</td>
                        </tr>
                    ";
                }
                echo "</table>";
            } else {
                echo "
                    <h2> Não possuímos cursos abertos no momento, sentimos muito </h2>
                ";
            }

            echo "
                <br><br>
                <a href='logado/admin.php'>
                    <button> Voltar para a Home </button>
                </a>
            ";
            echo "</fieldset>";
            echo "</center>";
        ?>
    </corpo>
</html>
