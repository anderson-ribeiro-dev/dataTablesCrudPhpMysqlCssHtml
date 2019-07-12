<?php
    include("./conexao/db.php");
    include('function.php');

    //se operação existir
    if(isset($_POST["operation"])){
        if($_POST["operation"] == "Add"){
            $image = '';
            if($_FILES["user_image"]["name"] != '')
            {
                $image = upload_image();
            }
            $statement = $connection->prepare("INSERT INTO produto (prod_nome, prod_valorpago, prod_valorvenda, prod_quantidade, prod_unidade, prod_foto) VALUES (:prod_nome, :prod_valorpago, :prod_valorvenda, :prod_quantidade, :prod_unidade, :prod_foto)");
            $result = $statement->execute(
            array(
                ':prod_nome'       => $_POST["nomeProduto"],
                ':prod_valorpago'  => $_POST["valorPago"],
                ':prod_valorvenda' => $_POST["valorVenda"],
                ':prod_quantidade' => $_POST["quantidade"],
                ':prod_unidade'    => $_POST["unidadeMedida"],
                ':prod_foto'       => $image
            )
        );
        //se não for vazio 
        if(!empty($result)){
             echo 'Dados inserido com sucesso';
        }
    }
        if($_POST["operation"] == "Edit")
        {
            $image = '';
            if($_FILES["user_image"]["name"] != ''){
                $image = upload_image();
            }else{
                $image = $_POST["hidden_user_image"];
            }
            $statement = $connection->prepare("UPDATE produto SET prod_nome = :prod_nome, prod_valorpago = :prod_valorpago, prod_valorvenda = :prod_valorvenda, prod_quantidade = :prod_quantidade, prod_unidade = :prod_unidade, prod_foto = :prod_foto  WHERE id_produto = :id_produto");
            $result = $statement->execute(
                array(

                    ':prod_nome' => $_POST["nomeProduto"],
                    ':prod_valorpago' => $_POST["valorPago"],
                    ':prod_valorvenda' => $_POST["valorVenda"],
                    ':prod_quantidade' => $_POST["quantidade"],
                    ':prod_unidade' => $_POST["unidadeMedida"],
                    ':prod_foto'  => $image,
                    ':id_produto'   => $_POST["user_id"]
                )
            );
            if(!empty($result)){
                echo 'Dados atualizados com sucesso';
            }
        }
    }
?>