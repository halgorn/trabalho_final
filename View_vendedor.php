<?php

    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

    // Se foi enviado via GET para acao entra aqui
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $codigo = isset($_GET['id_vendedor']) ? $_GET['id_vendedor'] : 0;
        excluir($codigo);
    }

    // Se foi enviado via POST para acao entra aqui
    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $codigo = isset($_POST['id_vendedor']) ? $_POST['id_vendedor'] : "";
        if ($codigo == 0)
            inserir($codigo);
        else
            editar($codigo);
    }

    // Métodos para cada operação
    function inserir($codigo){
        $dados = dadosForm();
        //var_dump($dados);
        
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('INSERT INTO cliente (nome, cpf) VALUES(:nome, :cpf)');
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
        $nome = $dados['nome'];
        $cpf = $dados['cpf'];
        $stmt->execute();
        header("location:vendedor_html.php");
        
    }

    function editar($codigo){
        $dados = dadosForm();
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('UPDATE vendedor SET nome = :nome,cpf = :cpf WHERE id_vendedor = :id_vendedor');
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
        $stmt->bindParam(':id_vendedor', $codigo, PDO::PARAM_INT);
        $nome = $dados['nome'];
        $cpf = $cpf['cpf'];
        $codigo = $dados['id_vendedor'];
        $stmt->execute();
        header("location:consultavendedor.php");
    }

    function excluir($codigo){
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('DELETE from cliente WHERE id_vendedor = :id_vendedor');
        $stmt->bindParam('id_vendedor', $codigo, PDO::PARAM_INT);
        $codigo = $codigo;
        $stmt->execute();
        header("location:consultavendedor.php");
        
        //echo "Excluir".$codigo;

    }


    // Busca um item pelo código no BD
    function buscarDados($codigo){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM vendedor WHERE id_vendedor = $codigo");
        $dados = array();
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['id_vendedor'] = $linha['id_vendedor'];
            $dados['nome'] = $linha['nome'];
            $dados['cpf'] = $linha['cpf'];
      
        }
        //var_dump($dados);
        return $dados;
    }

    // Busca as informações digitadas no form
    function dadosForm(){
        $dados = array();
        $dados['id_vendedor'] = $_POST['id_vendedor'];
        $dados['nome'] = $_POST['nome'];
        $dados['cpf'] = $_POST['cpf'];       
        return $dados;
    }

?>