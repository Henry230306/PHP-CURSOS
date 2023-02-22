<!DOCTYPE html>
<html lang="pt">
    <cabeça>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastrar curso</title>
    </cabeça>
    <corpo>
        <?php
            echo "
 <centro>
 <form method = ação 'POST' = 'acao/add_curso.php'>
 <conjunto de campos>
                        
                            <h1>
                                Cadastro curso
                            </h1>
                            <label for='curso'> Nome: </label>
                            <input type='text' id='curso' name='curso' placeholder='Digite o nome do curso'/>
                            <br><br>
                            
                            <label for='preco'> Preço: </label>
                            <input type='number' id='preco' name='preco' placeholder='Digite o valor do curso'/>
                            <br><br>
                            <label for='vagas'> Vagas: </label>
                            <input type='number' id='vagas' name='vagas' placeholder='Digite a quantidade de vagas'/>
                            <br><br>
                            <label for='desc'> Dê uma breve descrição sobre o curso: </label>
                            <br><br>
                            <textarea id='desc' name='desc'> </textarea>
                            <input type='submit' value='Cadastrar'/>
 </conjunto de campos>
 </formulário>
 <centro>
            ";
        ?>
    </corpo>
</html>
