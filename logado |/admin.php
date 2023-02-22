<!DOCTYPE html>
<html lang="pt-BR">
    <cabeça>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
    </cabeça>
    <corpo>
        <?php
            require_once '../acao/banco.php';
            session_start();
            
            $nome = $_SESSION['nome'];
            echo "<center>";
            echo "<h1>Bem-vindo, $nome <h1>";
            echo "
                <a href='../add_curso.php'>
                    <button> Adicionar um novo curso</button>
                </a>
            ";
            
            echo "
                <a href='../listagem.php'>
                    <button> Listagem </button>
                </a>
            ";

            echo "
                <a href='../sair.php'>
                    <button> Sair </button>
                </a>
            ";
            echo "<center>";
        ?>
    </corpo>
</html>
