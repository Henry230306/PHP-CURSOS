<!DOCTYPE html>
<html lang="pt">
<cabeça>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos disponíveis</title>
</cabeça>
<corpo>
    <?php
        require_once 'acao/banco.php';

        $sql = "SELECT * FROM cursos WHERE vagas_total >= 1";
        $resultado_cursos = $connect -> query($sql);

        echo "<center>";

        if($resultado_cusos -> num_rows > 0){
            echo "<form method='POST' action='acao/participar_curso.php'>";
            echo "<table border='1'>";

            echo "
                <tr align='center'>
                    <th>Seleção </th>
                    <th> Nome do curso</th>
                    <th> Preço do curso</th>
                    <th> Descrição do curso </th>
                    <th> Vagas restantes</th>
                </tr>
            ";
            while($row = $resultado_cursos -> fetch_assoc()){
                echo "
                        <tr align='center'>
                            <td>  <input type='checkbox' name='curso[]' value=".$row['id_curso']."/></td>
                            <td> ".$row['nome_curso']."</td>
                            <td> R$ ".$row['preco']."</td>
                            <td> ".$row['descricao']."</td>
                            <td> ".$row['vagas_total']."</td>
                        </tr>
                ";
            }
            echo "</table>";
            echo "<br><input type='submit' value='Cadastrar'/>";
            echo "</form>";

            echo "
                <br>
                <a href='logado/aluno.php'>
                    <button> Voltar para a Home</button>
                </a>
            ";
        } else {
            echo "
                <table>
                    <th> Não há cursos disponíveis no momento, sentimos muito</th>
                </table>
                <a href='logado/aluno.php'>
                    <button> Voltar</button>
                </a>
            ";
        }
        echo "</center>";

    ?>
</corpo>
</html>
