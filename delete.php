<?php
    include("./conexao/db.php");
    include("function.php");

    if(isset($_POST["user_id"])){
        $image = get_image_name($_POST["user_id"]);
        if($image != ''){
            unlink("upload/" . $image);
        }
        $statement = $connection->prepare("DELETE FROM produto WHERE id_produto = :id_produto");
        $result = $statement->execute(
            array(
                ':id_produto' => $_POST["user_id"]
            )
        );
        
        if(!empty($result)){
            echo 'Dados excluidos com sucesso';
        }
    }
?>