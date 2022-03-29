<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de produtos</title>
        <link rel="stylesheet" href="CSS/style_index.css">
        <script src="JavaScript/script.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Produtos</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Cadastro</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="product.php">Tabela produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="variation.php">Tabela variações</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <section>
            <div id="msg">
                <?php
                    session_start();

                    if(isset($_SESSION['msg_index'])){
                        echo "<br>".$_SESSION['msg_index'];
                        unset($_SESSION['msg_index']);
                    }
                ?>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong" id="card">
                            <div class="card-body p-4">
                                <h4 class="mb-3">Cadastre um produto</h4>
                                <form class="needs-validation" novalidate method="post" action="CRUD/insert_product.php" enctype="multipart/form-data">
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
                                            <div>
                                                <select name="variacoes" class="form-select" aria-label="Default select example" required>
                                                    <option value="">Variação</option>
                                                    <option value="1">Cor</option>
                                                    <option value="2">Tamanho</option>
                                                    <option value="3">Cor e Tamanho</option>
                                                </select>
                                                <div class="invalid-feedback">Necessário uma variação</div>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="row mb-2">
                                        <textarea class="form-control" name="descricao" id="descricao" placeholder="Descrição da variação" required></textarea>
                                        <div class="invalid-feedback">Necessário uma descrição</div>
                                    </div> 
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Imagem do produto</label>
                                        <input type="file" class="form-control" name="imagem_produto" id="imagem_produto" required>
                                        <div class="invalid-feedback">Escolha uma imagem</div>
                                    </div>
                                    <button type="submit" name="btn_cadastro" id="btn_cadastro">
                                        Cadastrar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>