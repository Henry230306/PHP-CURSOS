<!DOCTYPE html>
<html lang="pt-BR">
     <head>

          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE-Edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Login</title>

</head>
<body>
     <?php
     echo"
     <center>
     <form method='POST' action='acao/connect.php'>
     <fieldset>
     <h1>
     Cursos On-Line
     </h1>

     <label for='login'>Login: </label>
     <input type='text' id='login' name='login' placeholder='Digite o Email'/>

     <br>

     <label for='pass'>Password: </label>
     <input type='password' id='pass' name='pass' placeholder='Digite a Password'/>

     <br><br>

     <input type='submit' value='OK'/>

     <br><br>

     <a href='cadastro_aluno.php',>Novo Cadastro</a>
     </fielset>
     </form>
     </center>
     ";

     ?>
     </body>
     </html>
