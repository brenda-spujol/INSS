<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href = "./css/style.css">
    <title>IRPF|INSS</title>
</head>
<body>
    <div id="titulo">
    <h2>Calcule os descontos de INSS e IRPF</h2>
    </div>

    <div id="formulario">
        <form id="form" autocomplete="off" action="calculo.php" method="post">

            <input name="nome" type="text" placeholder="Nome">
            <input name="salario" type="number" placeholder="Salario">
            <input name="submit" type="submit">

         </form>
    </div>

    <div id="tabela">
    <?php
        
        $dados = file_get_contents("dados.txt");
        if($dados){
            $dados_separados = explode("|", $dados);
            foreach($dados_separados as $key => $value)
                if($key % 5 ==0){
                    echo($value."<br>");
                    echo("<br>");
                }else{
                    echo($value);
                }
        }

    ?>
    </div>
</body>
</html>