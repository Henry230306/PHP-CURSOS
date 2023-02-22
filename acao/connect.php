<?php
    require_once 'banco.php';
    session_start();

    $login = $_POST['login'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM aluno WHERE email = '$login' AND senha= '$pass' ";
    $result = $connect -> query($sql);

    while($row = $result -> fetch_assoc()){
        $id = $row['id_aluno'];
        $nome = $row['nome_aluno'];
    }

    if($_POST){

        $_SESSION['login'] = $login;
        $_SESSION['pass'] = $pass;
        $_SESSION['id'] = $id;
        $_SESSION['nome'] = $nome;

        if(mysqli_num_rows($result) > 0 && $id == 1){
        
            header('location:../logado/admin.php');

        }elseif(mysqli_num_rows($result) > 0 && $id != 1){

            header('location:../logado/aluno.php');

        } else {
            unset($_SESSION['login']);
            unset($_SESSION['pass']);

            header('location:index.php');
        }
    } 
?>
