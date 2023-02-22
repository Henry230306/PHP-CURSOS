<?php
    require_once 'banco.php';
    session_start();

    if((isset ($_POST['login']) == true) && (isset ($_POST['pass']) == true) && (isset ($_POST['email']) == true) ){

        $login = $_POST['login'];
        $pass = $_POST['pass'];
        $email = $_POST['email'];

        $login_teste = "SELECT * FROM aluno WHERE email = '$email'";
        $resultado_teste = $connect -> query($login_teste);

        $sql = "INSERT INTO aluno VALUES('', '$login', '$pass', '$email') ";


        $login_t = '';
        while($row = $resultado_teste -> fetch_assoc()){
            $login_t = $row['email'];
        }
        
        if( $email == $login_t){

            header('location:../cadastro_aluno.php');

        }elseif($connect -> query($sql) === TRUE){
            echo "<center>";

            echo "
                <h1> Cadastrado com sucesso! </h1>
            ";
            echo "
                <a href='../index.php'>
                    <button> Voltar para o Login</button>
                </a>
            ";

            echo "
                <a href='../cadastro_aluno.php'>
                    <button> Voltar para pág anterior</button>
                </a>
            ";

            echo "</center>";
        }
    } else {
        header('location:../cadastro_aluno.php');
    }

?>
