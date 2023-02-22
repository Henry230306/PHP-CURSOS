<!DOCTYPE html>
<html lang="pt">
    <cabeça>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
    </cabeça>
    <corpo>
        <?php
            require_once '../acao/banco.php';
            session_start();

            echo "<center>";

            $nome = $_SESSION['nome'];
            echo "<h1>Bem-vindo(a), $nome </h1>";

            echo "
                <a href='../participar_curso.php'>
                    <button> Ver cursos disponíveis </button>
                </a>
            ";

            echo "
                <a href='../editar.php'>
                    <button> Editar seus dados </button>
                </a>
            ";

            echo "
                <a href='../sair.php'>
                    <button> Sair </button>
                </a>
            ";

            echo "</center>";
        ?>
    </corpo>
</html>

