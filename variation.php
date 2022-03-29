<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tabela variações</title>
        <link rel="stylesheet" href="CSS/style_product.css">
        <script src="JavaScript/script.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </head>
    <body id="body">
        <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Produtos</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Cadastro</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="product.php">Tabela produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Tabela variações</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div id="msg">
                <h4>Tabela variações</h4>
            </div>
            <table class='table table-bordered' id="tabela_produto">
                <thead>
                    <th class='text-center'>ID</th>
                    <th class='text-center'>Variação</th>
                    <th class='text-center'>Descrição da variação</th>
                    <?php
                        require_once "Connection/connection.php";
                        
                        $sql = "SELECT * FROM variacao ORDER BY id";
                        $query = mysqli_query($connection,$sql);

                        while ($row = mysqli_fetch_assoc($query)){
                            echo "<tbody id='tabela_user'>";
                            
                                echo "<td class='text-center'>" . $row['id'] . "</td>";

                                if ($row['tipo']==1) {
                                    echo "<td class='text-center'>Cor</td>";
                                }else if($row['tipo']==2){
                                    echo "<td class='text-center'>Tamanho</td>";
                                }else{
                                    echo "<td class='text-center'>Cor e Tamanho</td>";
                                }
                                
                                echo "<td class='text-center'>" . $row['descricao'] . "</td>";

                            echo "</tbody>";
                        } 
                    ?>
                </thead>
            </table>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </body>
</html>