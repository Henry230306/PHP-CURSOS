<?php
    require_once 'banco.php';

    if($_POST){
        $nome_curso = $_POST['curso'];
        $preco = $_POST['preco'];
        $vagas = $_POST['vagas'];
        $descricao = $_POST['desc'];

        $sql = "INSERT INTO cursos VALUES('', '$nome_curso', '$preco', '$vagas', '0','$descricao')";

        if($connect -> query($sql) === TRUE){

            echo "
                <h1>Novo curso adicionado com sucesso! </h1>
            ";

            echo "
                <a href='../logado/admin.php'>
                    <button> Voltar para a Home </button>
                </a>          
            ";

        } else {

            echo "
                <h1> Ocorreu um error durante a inserção, lamentamos muito</h1>
            ";
            
            echo "
                <a href='../logado/admin.php'>
                    <button> Voltar para a Home </button>
                </a>          
            ";
        }
    }
?>
