<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tabela produtos</title>
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
                            <a class="nav-link active" aria-current="page" href="product.php">Tabela produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="variation.php">Tabela variações</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div id="msg">
                <h4>Tabela produtos</h4>
                <?php
                    session_start();

                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                ?>
            </div>
            <table class='table table-bordered' id="tabela_produto">
                <thead>
                    <th class='text-center'>ID</th>
                    <th class='text-center'>Nome do produto</th>
                    <th class='text-center'>Preço</th>
                    <th class='text-center'>SKU</th>
                    <th class='text-center'>Estoque</th>
                    <th class='text-center'>Nome da imagem</th>
                    <th class='text-center'>Editar</th>
				    <th class='text-center'>Excluir</th>
                    <?php
                        require_once "Connection/connection.php";

                        $sql = "SELECT * FROM produto INNER JOIN variacao ON produto.id=variacao.id ORDER BY produto.id";
                        $query = mysqli_query($connection,$sql);

                        while ($row = mysqli_fetch_assoc($query)){
                            echo "<tbody id='tabela_user'>";
                            
                                echo "<td class='text-center'>" . $row['id'] . "</td>";
                                echo "<td class='text-center'>" . $row['nome'] . "</td>";
                                echo "<td class='text-center'> R$ " . $row['preco'] . "</td>";
                                echo "<td class='text-center'>" . $row['sku'] . "</td>";
                                echo "<td class='text-center'>" . $row['estoque'] . "</td>";
                                echo "<td class='text-center'>". $row['imagem'] . "</td>";
                                
                                echo "<td class='text-center'>";
                                    echo "<a href='#' data-bs-toggle='modal' data-bs-target='#edit_product' data-id='".$row['id']."' data-nome='".$row['nome']."' data-preco='".$row['preco']."' data-sku='".$row['sku']."' data-estoque='".$row['estoque']."' data-img='".$row['imagem']."' data-descricao='".$row['descricao']."' data-tipo='".$row['tipo']."'>";
                                        echo '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-pencil-square" viewBox="0 0 16 16">';
                                            echo "<path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>";
                                            echo '<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>';
                                        echo "</svg>";
                                    echo "</a>";
                                echo "</td>";

                                echo "<td class='text-center'>";
                                    echo "<a href='#' data-bs-toggle='modal' data-bs-target='#remove_product' data-id='".$row['id']."'>";
                                        echo '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-x-square-fill" viewBox="0 0 16 16">';
                                            echo '<path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>';
                                        echo "</svg>";
                                    echo "</a>";
                                echo "</td>";

                            echo "</tbody>";
                        } 
                    ?>
                </thead>
            </table>
            <div class="modal fade" id="edit_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Editar produto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form class="needs-validation" novalidate method="post" action="CRUD/update_product.php" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" name="nome_produto" id="nome_produto" placeholder="Nome do produto" required>
                                    <label for="nome_produto">Nome do produto</label>
                                    <div class="invalid-feedback">Campo obrigatório</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="preco" id="preco" placeholder="Preço do produto" onkeypress='return somenteNumero();' required>
                                            <label for="preco">Preço</label>
                                            <div class="invalid-feedback">Campo obrigatório</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="sku" id="sku" placeholder="SKU" required>
                                            <label for="sku">SKU</label>
                                            <div class="invalid-feedback">Campo obrigatório</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="estoque" id="estoque" placeholder="Estoque" onkeypress='return somenteNumero();' required>
                                            <label for="estoque">Estoque</label>
                                            <div class="invalid-feedback">Campo obrigatório</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <select name="variacoes" id="variacoes" class="form-select" aria-label="Default select example" required>
                                            <option value="">Variação</option>
                                            <option value="1">Cor</option>
                                            <option value="2">Tamanho</option>
                                            <option value="3">Cor e Tamanho</option>
                                        </select>
                                        <div class="invalid-feedback">Necessário uma variação</div>
                                    </div>  
                                </div>
                                <div class="row mb-2">
                                    <textarea class="form-control" name="descricao" id="descricao" placeholder="Descrição da variação" required></textarea>
                                    <div class="invalid-feedback">Necessário uma descrição</div>
                                </div>    
                                <label for="formFile" class="form-label">Manter imagem do produto? </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="1" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Sim
                                    </label>
                                </div>
                                <input type="hidden" id="nome_img" name="nome_img">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Não
                                    </label>
                                </div>
                                <input type="file" class="form-control" name="imagem_produto" id="imagem_produto" required>
                                <div class="invalid-feedback">Escolha nova imagem</div>
                            </div>
                            <input type="hidden" name="id" id="id">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button> 
                                <button type="submit" class="btn btn-dark">Salvar</button> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="remove_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Remover produto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="CRUD/delete_product.php" method="post">
                            <div class="modal-body">
                                <span>Tem certeza que deseja este produto?</span>
                                <input type="hidden" name="id" id="id">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Não</button> 
                                <button type="submit" class="btn btn-dark">Sim</button> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            $('#edit_product').on('show.bs.modal', function (event) {
                var btnModal = $(event.relatedTarget);
                var id = btnModal.data('id');
                var nome = btnModal.data('nome');
                var preco = btnModal.data('preco');
                var sku = btnModal.data('sku');
                var estoque = btnModal.data('estoque');
                var img = btnModal.data('img');
                var descricao = btnModal.data('descricao');
                var tipo = btnModal.data('tipo');
                var modal = $(this);
                modal.find('#id').val(id);
                modal.find('#nome_produto').val(nome);
                modal.find('#preco').val(preco);
                modal.find('#sku').val(sku);
                modal.find('#estoque').val(estoque);
                modal.find('#nome_img').val(img);
                modal.find('#descricao').val(descricao);
                modal.find('#variacoes').val(tipo);
            });

            $('#remove_product').on('show.bs.modal', function (event) {
                var btnModal = $(event.relatedTarget);
                var id = btnModal.data('id');
                var modal = $(this);
                modal.find('#id').val(id);
            });

            $("#imagem_produto").hide();
            $("#imagem_produto").removeAttr('required');
            $("#flexRadioDefault1").click(function() {
                $("#imagem_produto").hide();
                $("#imagem_produto").removeAttr('required');
            });
            $("#flexRadioDefault2").click(function() {
                $("#imagem_produto").show();
                $("#imagem_produto").attr("required", "req");
            });

            (function () {
                'use strict'

                var forms = document.querySelectorAll('.needs-validation')

                Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
            })()
        </script>
    </body>
</html>