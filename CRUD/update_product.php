<?php
    include_once "../Connection/connection.php";
    session_start();

    $id = $_POST["id"];
    $nome = $_POST["nome_produto"];
    $preco = $_POST["preco"];
    $sku = $_POST["sku"];
    $estoque = $_POST["estoque"];
    $tipo = $_POST["variacoes"];
    $descricao = $_POST["descricao"];
    $radio = $_POST["flexRadioDefault"];

    if ($radio=="1") {
        $sql = "UPDATE produto t1 INNER JOIN variacao t2 
        ON t1.id = t2.id
        SET t1.nome = '$nome', t1.preco='$preco', t1.sku='$sku', t1.estoque='$estoque',
        t2.tipo = '$tipo', t2.descricao = '$descricao'
        WHERE t1.id = '$id' and t2.id = '$id'";
        $query = mysqli_query($connection, $sql);
    }else{
        $img = $_FILES["imagem_produto"];
        $ext = strtolower(substr($_FILES['imagem_produto']['name'],-4));
        $new_name = "codigo_".$id.$ext;
        $dir = 'img/';
        move_uploaded_file($_FILES['imagem_produto']['tmp_name'], $dir.$new_name); 

        $sql2 = "UPDATE produto t1 INNER JOIN variacao t2 
        ON t1.id = t2.id
        SET t1.nome = '$nome', t1.preco='$preco', t1.sku='$sku', t1.estoque='$estoque', t1.imagem='$new_name',
        t2.tipo = '$tipo', t2.descricao = '$descricao'
        WHERE t1.id = '$id' and t2.id = '$id'";
        $query2 = mysqli_query($connection, $sql2);
    }

    if (mysqli_affected_rows($connection)) {
        echo "<script>window.location = '../product.php';</script>";
        $_SESSION['msg'] = "<span id='span_msg' style='color: rgb(131, 218, 131);'>Produto editado com sucesso!</span>";
    }else{
        echo "<script>window.location = '../product.php';</script>";
        $_SESSION['msg'] = "<span style='color: rgb(204, 75, 75);'>Sem alterações!</span>";
    }
?>