<?php
    //salvar imagem 
    function upload_image(){
        if(isset($_FILES["user_image"]))
        {
            $extension = explode('.', $_FILES['user_image']['name']);
            $new_name = rand() . '.' . $extension[1];
            $destination = './upload/' . $new_name;
            move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);
            return $new_name;
        }
    }

    function get_image_name($user_id){
        include("./conexao/db.php");
        $statement = $connection->prepare("SELECT prod_foto FROM produto WHERE id_produto = '$user_id'");
        $statement->execute();
        $result = $statement->fetchAll();
        foreach($result as $row){
            return $row["prod_foto"];
        }
    }

    function get_total_all_records(){
        include("./conexao/db.php");
        $statement = $connection->prepare("SELECT * FROM produto");
        $statement->execute();
        $result = $statement->fetchAll();
        return $statement->rowCount();
    }

?>