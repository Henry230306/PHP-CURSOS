<?php
    require_once 'banco.php';
    session_start();
    if($_POST){
        if(@$_POST['curso']){
            $curso_array = $_POST['curso'];

            $curso_string = implode('.', $curso_array);
            $curso_array = explode('.', $curso_string);
            echo "<center>";
            echo "
                    <h4>
                        Confira suas devidas inscrições abaixo:
                    </h4>
                    <table border='1'>
                    <tr align='center'>
                        <th>
                            Nome do curso
                        </th>
                        <th>
                            Preço
                        </th>
                    </tr>
                ";

            for($i = 0 ; $i < count($curso_array) ; $i++){
                $selecionar_curso[$i] = "SELECT * FROM cursos WHERE id_curso = '$curso_array[$i]'";
            }

            for($i = 0 ; $i < count($selecionar_curso) ; $i ++){
                $resultado_curso = $connect -> query($selecionar_curso[$i]);


                while($row = $resultado_curso -> fetch_assoc()){
                    echo "
                        <tr align='center'>
                                <td>
                                    ".$row['nome_curso']."
                                </td>
                                <td>
                                    R$ ".$row['preco']."
                                </td>
                        </tr>                        
                    ";       
                }
            }
            $id_aluno = $_SESSION['id'];

            for($i = 0 ; $i < count($curso_array) ; $i++){
                $NovaCompra = "INSERT INTO compra values('', '$id_aluno', '$curso_array[$i]')";
                $connect -> query($NovaCompra);


                $atualizar_vagas_restantes = "UPDATE cursos set vagas_total = vagas_total - 1 WHERE id_curso= '$curso_array[$i]'";
                $atualizar_vagas_preenchidas = "UPDATE cursos set vagas_preenchidas = vagas_preenchidas + 1 WHERE id_curso= '$curso_array[$i]'";
                $connect -> query($atualizar_vagas_restantes);
                $connect -> query($atualizar_vagas_preenchidas);       
            }
            echo "<center>";
        } else {
            echo "
                <h1> Ops! Parece que você não escolheu nenhum curso XD</h1>
            ";
        }
        echo "
            <br>
            <a href='../logado/aluno.php'>
                <button> Voltar para a Home</button>
            </a>
        ";
    } else {
        header('location:../index.php');
    }
?>
