<!DOCTYPE html>
<?php
include_once "conf/default.inc.php";
require_once "conf/Conexao.php";
?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Marcas</title>
    <script>
        function excluirRegistro(url) {
            if (confirm("Confirmar Exclusão?"))
                location.href = url;
        }
    </script>
    <style>
        table {
            text-align: center;
            margin: 0 auto;
            border-collapse: collapse;
            border-radius: 5px;
            border-style: hidden;
            /* hide standard table (collapsed) border */
            box-shadow: 0 0 0 1px black;
            /* this draws the table border  */
        }

        tr,
        th,
        td {
            border: 1px solid black;
        }

        th {
            width: 150px;
        }

        a {
            text-decoration: none;
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</head>

<body>
<?php
    include  "index.php" ;
?>
    <form method="POST" class="form-check" id="formulario">
        <div class="coluna">
            <p>Consultar Vendedor</p>
            <div class="form-check">
                <input type="radio" name="optionSearchUser" id="v" value="id_marca" required>Código<br>
            </div>
            <div class="form-check">
                <input type="radio" name="optionSearchUser" id="v" value="nome" required>Nome<br>
            </div>
            <div class="input-group input-group-sm mb-3">
                <input type="text" name="valorUser" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>
        </div>
        <div class="coluna">
            <p>Ordenar por:</p>
            <div class="form-check">
                <input type="radio" name="optionOrderUser" id="v" value="id_marca" required>Código
            </div>
            <div class="form-check">
                <input type="radio" name="optionOrderUser" id="v" value="nome" required>Nome <br>
            </div>
            
            <input class="btn btn-info" type="submit" value="Consultar">
        </div>
    </form>
    
    <?php

try {

    $optionSearchUser = isset($_POST["optionSearchUser"]) ? $_POST["optionSearchUser"] : "";
    $optionOrderUser = isset($_POST["optionOrderUser"]) ? $_POST["optionOrderUser"] : "";
    $valorUser = isset($_POST["valorUser"]) ? $_POST["valorUser"] : "";

    $WHERE = "";

    if ($optionSearchUser != "") {
        if ($optionSearchUser == "id_marca") {
            $WHERE = "WHERE marca.id_marca = $valorUser"; 
        }elseif ($optionSearchUser == "nome") {
            $WHERE = "WHERE marca.nome = $valorUser";    
        }elseif ($optionSearchUser == "id_fabricante") {
            $WHERE = "WHERE marca.id_fabricante LIKE '$valorUser%'";              
        }
    }

    $ORDER = "";

    if ($optionOrderUser != "") {
        if ($optionOrderUser == "id_marca") {
            $ORDER = "ORDER BY marca.id_marca"; 
        }elseif ($optionOrderUser == "nome") {
            $ORDER = "ORDER BY marca.nome";    
        }elseif ($optionOrderUser == "id_fabricante") {
            $ORDER = "ORDER BY marca.id_fabricante";              
            }
    }

    $sql = "SELECT marca.id_marca, marca.nome, marca.id_fabricante FROM marca LEFT JOIN fabricante ON fabricante.id_fabricante = marca.id_fabricante" .$WHERE." " .$ORDER;
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query($sql);
    echo "<br><table><tr><th>Codigo</th><th>Nome</th><th>Fabricante</th><th>Alterar</th><th>Excluir</th></tr>";
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
?>
        <tr>
            <td><?php echo $linha['id_marca']; ?></td>
            <td><?php echo $linha['nome']; ?></td>
            <td><?php echo $linha['id_fabricante']; ?></td>
            <td><a href='marca_html.php?acao=editar&id_marca=<?php echo $linha['id_marca']; ?>'><img class="icon" src="img/edit.png" alt=""></a></td>
            <td><a href="javascript:excluirRegistro('View_marca.php?acao=excluir&id_marca=<?php echo $linha['id_marca']; ?>')"><img class="icon" src="img/delete.png" alt=""></a></td>
        </tr>
    <?php } ?>
    </table>
<?php
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}


    ?>

</body>

</html>