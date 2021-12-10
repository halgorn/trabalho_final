<!DOCTYPE html>
<?php
include_once "View_marca.php";
$acao = isset($_GET['acao']) ? $_GET['acao'] : "";
$dados;
if ($acao == 'editar'){
    $codigo = isset($_GET['id_marca']) ? $_GET['id_marca'] : "";
    if ($codigo > 0)
        $dados = buscarDados($codigo);

}

?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD completo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link href="style.css" rel="stylesheet" >
</head>
<body>
<br>
<div class="container">  
     <h2>Cadastro Marca</h2> 
    <form action="View_marca.php" method="post">    
        <input readonly style="display:none;" type="number" name="id_marca" id="id_marca" value="<?php if ($acao == "editar") echo $dados['id_marca']; else echo 0; ?>"><br>
        <div class="c" id="c">
            <label for="">Nome Marca:</label> 
            <input required=true   type="text" name="nome" id="nome" value="<?php if ($acao == "editar") echo $dados['nome']; ?>"><br>
         
        </div>
        <div class="c" id="c">
            <label for="">Fabricante (id):</label>  
            <input required=true   type="text" name="id_fabricante" id="id_fabricante" value="<?php if ($acao == "editar") echo $dados['id_fabricante']; ?>"><br>
        </div>
        <br><button  class="btn btn-info" type="submit" name="acao" id="acao" value="salvar">Salvar</button>
        <a href="consultamarca.php"><button class="btn btn-info">Listar</button></a>
        <a href="marca_html.php"><button class="btn btn-info">Novo</button></a>
    </form>
</div>

<br><br>


</body>
</html>