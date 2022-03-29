<?php
    include_once "../Connection/connection.php";
    session_start();

    $id = $_POST["id"];

    $sql = "DELETE produto, variacao FROM produto INNER JOIN variacao ON produto.id=variacao.id WHERE produto.id='$id'";
    $query = mysqli_query($connection, $sql);

    if (mysqli_affected_rows($connection)) {
        echo "<script>window.location = '../product.php';</script>";
        $_SESSION['msg'] = "<span id='span_msg' style='color: rgb(131, 218, 131);'>Produto removido da base de dados!</span>";
    }
?>