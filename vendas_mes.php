<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendas por mês</title>
</head>
<body>
    
    <form action='valores_vendas.php' method="post">
        Informe a quantia vendida em cada mês: <br> <br>

            Janeiro: <input type="number" name= "quantia1" id="quantia1" value='quantia1'><br> 
            <?php 
            $quantia1=['quantia1']; ?>

            Fevereiro: <input type="number" name= "quantia" id="quantia2"><br>
            Março: <input type="number" name= "quantia" id="quantia3"><br>
            Abril: <input type="number" name= "quantia" id="quantia4"><br>
            Maio: <input type="number" name= "quantia" id="quantia5"><br>
            Junho: <input type="number" name= "quantia" id="quantia6"><br>
            Julho: <input type="number" name= "quantia" id="quantia"7><br>
            Agosto: <input type="number" name= "quantia" id="quantia8"><br>
            Setembro: <input type="number" name= "quantia" id="quantia9"><br>
            Outubro <input type="number" name= "quantia" id="quantia10"><br>
            Novembro: <input type="number" name= "quantia" id="quantia11"><br>
            Dezembro: <input type="number" name= "quantia" id="quantia12"><br>
            <input type="submit" name="salvar" id= "salvar" value=" Salvar">  <br> 

            <? echo getElementById('quantia1');

            
             
    </form> 
    
    
    
</body>
</html>