<?php
    if(isset($_POST['submit'])){
       $nome = $_POST['nome'];
       $bruto = $_POST['salario'];

        if($bruto <= 1045){
            $INSS = $bruto * 0.075;
        }

        elseif($bruto > 1045 && $bruto <= 2089.60){
            $INSS = $bruto * 0.09;
        }

        elseif($bruto > 1045 && $bruto <= 2089.60){
            $INSS = $bruto * 0.12;
        }

        else{
            $INSS = $bruto * 0.14;
        }

        $menosINSS = $bruto - $INSS;
        
        if($menosINSS <= 1903.98){
            $IRPF = 0.0;
            $deducao = 0.0;
        }

        elseif($menosINSS > 1903.98 && $menosINSS <= 2826.65) {
            $IRPF = $salario * 0.075;
            $deducao = 142.80;  
        }

        elseif($menosINSS > 2826.65 && $menosINSS <= 3751.05){
            $IRPF = $salario * 0.15;
            $deducao = 354.80;
        }

        elseif($menosINSS > 3751.05 && $menosINSS <= 4664.68){
            $IRPF = $menosINSS * 0.225;
            $deducao = 636.13;
        }

        elseif($menosINSS > 4664.68){
            $IRPF = $menosINSS * 0.275;
            $deducao = 869.36;
        }

        $IRPF = $IRPF + $deducao;

        $liquido = $bruto - $INSS - $IRPF;

        $file = fopen("dados.txt", "a");

        fwrite($file, "|Nome: ".$nome." |");
        fwrite($file, "Salario Bruto: ".$bruto." |");
        fwrite($file, "Desconto INSS: ".$INSS." |");
        fwrite($file, "Desconto IRPF: ".$IRPF." |");
        fwrite($file, "Salario Líquido: ".$liquido." ");

        fclose($file);

        }
        
        header("Location: index.php");
    

?>