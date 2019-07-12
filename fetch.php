<?php
    include("./conexao/db.php");
    include('function.php');

    $query = '';
    $output = array();
    $query .= "SELECT * FROM produto ";

    if(isset($_POST["search"]["value"])){
        //pesquisar itens
        $query .= 'WHERE prod_nome LIKE "%'.$_POST["search"]["value"].'%" ';
        $query .= 'OR prod_valorpago LIKE "%'.$_POST["search"]["value"].'%" ';
        $query .= 'OR prod_valorvenda LIKE "%'.$_POST["search"]["value"].'%" ';
        $query .= 'OR prod_quantidade LIKE "%'.$_POST["search"]["value"].'%" ';
        $query .= 'OR prod_unidade LIKE "%'.$_POST["search"]["value"].'%" ';
    }

    //ordenar pesquisa
     if(isset($_POST["order"])){
         $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
    }else{
         $query .= 'ORDER BY id_produto DESC ';
     }

    if($_POST["length"] != -1){
        $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
    }

    //recebe a conexão 
    $statement = $connection->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $data = array();
    $filtered_rows = $statement->rowCount();//filtrar as linhas
    foreach($result as $row){
        $image = '';
        if($row["prod_foto"] != ''){
            $image = '<img src="upload/'.$row["prod_foto"].'" class="img-thumbnail" width="50" height="35"/>';//adicionar imagem
        }else{
            $image = '';
        }
        $sub_array = array();
        $sub_array[] = $image;
        $sub_array[] = $row["prod_nome"];
        $sub_array[] = $row["prod_valorpago"];
        $sub_array[] = $row["prod_valorvenda"];
        $sub_array[] = $row["prod_quantidade"];
        $sub_array[] = $row["prod_unidade"];
        $sub_array[] = '<button type="button" name="update" id="'.$row["id_produto"].'" class="btn btn-warning btn-xs update">Update</button>';
        $sub_array[] = '<button type="button" name="delete" id="'.$row["id_produto"].'" class="btn btn-danger btn-xs delete">Delete</button>';
        $data[] = $sub_array;
       
    }
    
    $output = array(
        "draw"    => intval($_POST["draw"]),
        "recordsTotal"  =>  $filtered_rows,
        "recordsFiltered" => get_total_all_records(),
        "data"    => $data
    );
    echo json_encode($output);
?>