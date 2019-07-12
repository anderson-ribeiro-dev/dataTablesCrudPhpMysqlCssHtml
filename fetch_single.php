<?php
    include("./conexao/db.php");
    include('function.php');

    if(isset($_POST["user_id"])){
        $output = array();
        $statement = $connection->prepare("SELECT * FROM produto WHERE id_produto = '".$_POST["user_id"]."' LIMIT 1");
        $statement->execute();
        $result = $statement->fetchAll();
        foreach($result as $row){
            $output["nomeProduto"]   =  $row["prod_nome"];
            $output["valorPago"]     =  $row["prod_valorpago"];
            $output["valorVenda"]    =  $row["prod_valorvenda"];
            $output["quantidade"]    =  $row["prod_quantidade"];
            $output["unidadeMedida"] =  $row["prod_unidade"];
            // print_r($row);
            if($row["prod_foto"] != ''){
                $output['user_image'] = '<img src="upload/'.$row["prod_foto"].'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row["prod_foto"].'" />';
            }else{
                $output['user_image'] = '<input type="hidden" name="hidden_user_image" value=""/>';
            }
        }
        echo json_encode($output);   
    }
?>