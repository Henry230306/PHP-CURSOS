<?php
     if((isset ($_POST['name']) == true) && (isset ($_POST['pass']) == true) && (isset ($_POST['email']) == true) ){
        require_once 'banco.php';
        session_start();

        $nome = $_POST['name'];
        $pass = $_POST['pass'];
        $email = $_POST['email'];

        $id = $_SESSION['id']; 

        $sql = 
            "UPDATE aluno SET 
            nome_aluno = '$nome',
            senha = '$pass',
            email = '$email'
            WHERE id_aluno = '$id'
        ";

        if($connect -> query($sql) === TRUE){
            
            header('location:../logado/aluno.php');
            
        } else {
            echo "<h1> [error]!, lamentamos o ocorrido </h1>";
        }
    }
?>
