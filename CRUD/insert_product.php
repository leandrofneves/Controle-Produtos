<?php
    include_once "../Connection/connection.php";
    session_start();

    if (isset($_POST["btn_cadastro"])) {

        $nome = $_POST["nome_produto"];
        $preco = $_POST["preco"];
        $sku = $_POST["sku"];
        $estoque = $_POST["estoque"];
        $descricao = $_POST["descricao"];
        $tipo = $_POST["variacoes"];
        $img = $_FILES["imagem_produto"];

        $sql = "INSERT INTO produto (nome,preco,sku,estoque,imagem) VALUES ('".$nome."', '".$preco."' , '".$sku."', '".$estoque."', '".$img."')";
        
        if (mysqli_query($connection, $sql)) {
            $id = mysqli_insert_id($connection);

            $img = $_FILES["imagem_produto"];
            $ext = strtolower(substr($_FILES['imagem_produto']['name'],-4));
            $new_name = "codigo_".$id.$ext;
            $dir = 'img/';
            move_uploaded_file($_FILES['imagem_produto']['tmp_name'], $dir.$new_name); 

            $sql2 = "UPDATE produto SET imagem='$new_name' WHERE id='$id'";
            $query2 = mysqli_query($connection, $sql2);
            
            $sql3 = "INSERT INTO variacao (id,tipo,descricao) VALUES ('".$id."', '".$tipo."', '".$descricao."') ";
            $query3 = mysqli_query($connection, $sql3);
        }

        if (mysqli_affected_rows($connection)) {
            echo "<script>window.location = '../index.php';</script>";
            $_SESSION['msg_index'] = "<span id='span_msg' style='color: rgb(131, 218, 131);'>Produto cadastrado com sucesso!</span>";
        }
    }
?>