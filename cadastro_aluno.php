<!DOCTYPE html>
<html lang="pt">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Documento</title>
</head>
<body>
     

    <?php
        echo "
 <centro>
 <conjunto de campos>
                    <h1>
                        Cadastro
                    </h1>
                    <br>
                    <form method='POST' action='acao/cadastro_aluno.php'>
                        <label for='login'> Login: </label>
                        <input type='text' id='login' name='login' placeholder='Digite o user'/>
                        <br><br>
                        
 <label for='pass'> Senha: </label>
 <input type='password' id='pass' name='pass' placeholder='Digite uma senha'/>
                        <br><br>
 <label for='email'> E-mail: </label>
                        <input type='email' id='email' name='email' placeholder='Digite seu email'/>
                        <br><br>
                        <input type='submit' value='Cadastrar-se'/>
 </formulário>
                    <br>
                    <a href='index.php'>
                        <button> Voltar para o Login</button>
                    </a>
 </conjunto de campos>
 </centro>
        ";
    ?>
</body>
</html>
