<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Completo</title>
    <link href="style.css" rel="stylesheet" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>

<body>
<section>
  <h1>Crud Completo</h1>
  <nav>
    <ul class="menuItems">
    <div class="dropdown">
      <button class="dropbtn">Cliente</button>
        <div class="dropdown-content">
          <a href='consultacliente.php' data-item='Cliente'>Consultar Cliente</a>
          <a href="cliente_html.php">Adicionar cliente</a>
        </div>
      </div>
      <div class="dropdown">
        <button class="dropbtn">Fabricante</button>
          <div class="dropdown-content">
            <a href='consultafabricante.php' data-item='Fabricante'>Consultar Fabricante</a>
            <a href="fabricante_html.php">Adicionar Fabricante</a>
          </div>
      </div>
      <div class="dropdown">
        <button class="dropbtn">Marca</button>
          <div class="dropdown-content">
            <a href='consultamarca.php' data-item='Marca'>Consultar Marca</a>
            <a href="marca_html.php">Adicionar Marca</a>
          </div>
      </div>
      <div class="dropdown">
      <button class="dropbtn">Vendedor</button>
        <div class="dropdown-content">
          <a href='consultavendedor.php' data-item='Marca'>Consultar Vendedor</a>
          <a href="vendedor_html.php">Adicionar Vendedor</a>
        </div>
      </div>
    </ul>
  </nav>
</section>
</body>
</html>

