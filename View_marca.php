<?php

    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

    // Se foi enviado via GET para acao entra aqui
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $codigo = isset($_GET['id_marca']) ? $_GET['id_marca'] : 0;
        excluir($codigo);
    }

    // Se foi enviado via POST para acao entra aqui
    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $codigo = isset($_POST['id_marca']) ? $_POST['id_marca'] : "";
        if ($codigo == 0)
            inserir($codigo);
        else
            editar($codigo);
    }

    // Métodos para cada operação
    function inserir($codigo){
        $dados = dadosForm();
        $nome = $dados['nome'];
        $id_fabricante = $dados['id_fabricante'];
    
        //var_dump($dados);

        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('INSERT INTO marca (nome,id_fabricante) VALUES(:nome,:id_fabricante)');
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
       
        $stmt = $pdo->prepare('INSERT INTO fabricante (id_fabricante) VALUES(:id_fabricante)');
        $stmt->bindParam(':id_fabricante', $id_fabricante, PDO::PARAM_STR);
        $stmt->execute();
        header("location:marca_html.php");
        
    }
     // Busca as informações digitadas no form
     function dadosForm(){
        $dados = array();
        $dados['id_marca'] = $_POST['id_marca'];
        $dados['nome'] = $_POST['nome'];
        $dados['id_fabricante'] = $_POST['id_fabricante'];        
        return $dados;
    }
    function editar($codigo){
        $dados = dadosForm();
        var_dump($dados);
        $nome = $dados['nome'];
        $id_fabricante = $dados['id_fabricante'];
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('UPDATE marca SET nome = :nome WHERE id_marca = :id_marca');
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->execute();

        $stmt = $pdo->prepare('UPDATE produto SET nome = :nome WHERE id_marca = :id_marca');
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->execute();


        $stmt = $pdo->prepare('UPDATE fabricante SET id_fabricante = :id_fabricante WHERE id_fabricante = :id_fabricante');
        $stmt->bindParam(':id_fabricante', $id_fabricante, PDO::PARAM_STR);
        $stmt->execute();

        $stmt = $pdo->prepare('UPDATE produto SET id_fabricante = :id_fabricante WHERE id_fabricante = :id_fabricante');
        $stmt->bindParam(':id_fabricante', $id_fabricante, PDO::PARAM_STR);
        $stmt->execute();

        header("location:consultamarca.php");
    }

    /*function editar($codigo){
        $dados = dadosForm();
        $nome = $dados['nome'];
        $id_fabricante = $dados['id_fabricante'];
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('UPDATE marca SET nome = :nome, id_fabricante= :id_fabricante WHERE id_marca = :id_marca');
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':id_fabricante', $id_fabricante, PDO::PARAM_INT);
        $stmt->bindParam(':id_marca', $codigo, PDO::PARAM_INT);
        $nome = $dados['nome'];
        $codigo = $dados['id_marca'];
        $stmt->execute();
        $stmt = $pdo->prepare('UPDATE fabricante SET  nome = :nome WHERE id_fabricante = :id_fabricante');
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':id_fabricante', $id_fabricante, PDO::PARAM_STR);
        $stmt->execute();
        header("location:consultamarca.php");*/
    

    function excluir($codigo){
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('DELETE from marca WHERE id_marca = :id_marca');
        $stmt->bindParam('id_marca', $codigo, PDO::PARAM_INT);
        $codigo = $codigo;
        $stmt->execute();
        header("location:consultamarca.php");
        
        //echo "Excluir".$codigo;

    }


    // Busca um item pelo código no BD
    function buscarDados($codigo){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT marca.id_marca, marca.nome, marca.id_fabricante FROM marca LEFT JOIN fabricante ON fabricante.id_fabricante = marca.id_fabricante WHERE marca.id_fabricante = $codigo");
        $dados = array();
        var_dump($consulta);
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            
            $dados['id_marca'] = $linha['id_marca'];
            $dados['nome'] = $linha['nome'];
            $dados['id_fabricante'] = $linha['id_fabricante'];
        }
        //var_dump($dados);
        return $dados;
    }

   

?>