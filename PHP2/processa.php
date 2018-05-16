<?php

    $nome = $_GET['nome'];
    $email = $_GET['email'];
    $website = $_GET['website'];
    $mensagem = $_GET['mensagem'];

    $usuario = root;
    $senha = root;

    # Conexão com MySQL via PDO_MYSQL

    try{
        $conn = new PDO("mysql:host=localhost;dbname=php2", $usuario, $senha);
        print "Conexão efetuada com sucesso!";
        
        $conn->exec("set names utf8");
        
        $stmt = $conn->prepare('INSERT INTO mensagens (nome, email, website, mensagem) VALUES (:nome, :email, :website, :mensagem)');
        
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':website', $website);
        $stmt->bindValue(':mensagem', $mensagem);
        
        $stmt->execute();
        
    }catch(PDOException $e){
        echo $e->getMessage();
    }

?>