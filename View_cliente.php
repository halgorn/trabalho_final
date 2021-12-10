<?php

    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

    // Se foi enviado via GET para acao entra aqui
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $codigo = isset($_GET['id_cliente']) ? $_GET['id_cliente'] : 0;
        excluir($codigo);
    }

    // Se foi enviado via POST para acao entra aqui
    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $codigo = isset($_POST['id_cliente']) ? $_POST['id_cliente'] : "";
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
        $stmt = $pdo->prepare('INSERT INTO cliente (nome, cpf, telefone, endereco) VALUES(:nome, :cpf, :telefone, :endereco)');
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
        $stmt->bindParam(':telefone', $telefone, PDO::PARAM_STR);
        $stmt->bindParam(':endereco', $endereco, PDO::PARAM_STR);
        $nome = $dados['nome'];
        $cpf = $dados['cpf'];
        $telefone = $dados['telefone'];
        $endereco = $dados['endereco'];
        $stmt->execute();
        header("location:cliente_html.php");
        
    }

    function editar($codigo){
        $dados = dadosForm();
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('UPDATE cliente SET nome = :nome,cpf = :cpf, telefone= :telefone, endereco= :endereco WHERE id_cliente = :id_cliente');
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
        $stmt->bindParam(':telefone', $telefone, PDO::PARAM_STR);
        $stmt->bindParam(':endereco', $endereco, PDO::PARAM_STR);
        $stmt->bindParam(':id_cliente', $codigo, PDO::PARAM_INT);
        $nome = $dados['nome'];
        $cpf = $cpf['cpf'];
        $telefone = $dados['telefone'];
        $endereco = $dados['endereco'];
        $codigo = $dados['id_cliente'];
        $stmt->execute();
        header("location:consultacliente.php");
    }

    function excluir($codigo){
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('DELETE from cliente WHERE id_cliente = :id_cliente');
        $stmt->bindParam('id_cliente', $codigo, PDO::PARAM_INT);
        $codigo = $codigo;
        $stmt->execute();
        header("location:consultacliente.php");
        
        //echo "Excluir".$codigo;

    }


    // Busca um item pelo código no BD
    function buscarDados($codigo){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM cliente WHERE id_cliente = $codigo");
        $dados = array();
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['id_cliente'] = $linha['id_cliente'];
            $dados['nome'] = $linha['nome'];
            $dados['cpf'] = $linha['cpf'];
            $dados['telefone'] = $linha['telefone'];
            $dados['endereco'] = $linha['endereco'];
        }
        //var_dump($dados);
        return $dados;
    }

    // Busca as informações digitadas no form
    function dadosForm(){
        $dados = array();
        $dados['id_cliente'] = $_POST['id_cliente'];
        $dados['nome'] = $_POST['nome'];
        $dados['cpf'] = $_POST['cpf'];
        $dados['telefone'] = $_POST['telefone'];
        $dados['endereco'] = $_POST['endereco'];        
        return $dados;
    }

?>