<?php
require_once "../../controller/clientesController.php";
require_once "../../config/config.php";

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= 'http://' . $_SERVER['HTTP_HOST'] . DIR ?>/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <style>
        body {
            padding-top: 3.5rem;
        }
    </style>

    <title>Essentia Pharma!</title>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="index.php"><img
                src="<?= 'http://' . $_SERVER['HTTP_HOST'] . DIR ?>/img/logo-essentia.png" width="40px"
                height="auto"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link" href="<?= 'http://' . $_SERVER['HTTP_HOST'] . DIR ?>">Home <span
                            class="sr-only"></a>
            </li>
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">Cadastros</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="<?= 'http://' . $_SERVER['HTTP_HOST'] . DIR ?>/src/view/clientes/">Clientes</a>
                </div>
            </li>
        </ul>

    </div>
</nav>

<main role="main">


    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-12">
                <p></p>
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error[0]; ?>
                    </div>
                <?php endif; ?>
                <p></p>
                <h2>Novo Cliente</h2>
                <a href="<?= 'http://' . $_SERVER['HTTP_HOST'] . DIR ?>/src/view/clientes/index.php"
                   class="btn btn-light"> << Voltar</a>
                <p></p>
                <form enctype="multipart/form-data" action="" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputRazao">Razão Social</label>
                            <input required type="text" class="form-control" name="razao_social" id="inputRazao"
                                   placeholder="Razão Social">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputFantasia">Nome Fantasia</label>
                            <input required type="text" class="form-control" name="fantasia" id="inputFantasia"
                                   placeholder="Nome Fantasia">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCnpj">CNPJ</label>
                            <input required type="text" class="form-control" name="cnpj" id="inputCnpj"
                                   placeholder="CNPJ">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputFone">Fone</label>
                            <input required type="text" class="form-control" name="fone1" id="inputFone"
                                   placeholder="Fone">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputCidade">Email</label>
                            <input required type="email" class="form-control" name="email" id="inputEmail"
                                   placeholder="Ex: email@email.com">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputImagem">Imagem</label>
                            <input type="file" class="form-control-file" name="imagem" id="inputImagem">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>

        <hr>

    </div> <!-- /container -->

</main>

<footer class="container">
    <p>&copy; Wagnorama 2018</p>
</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?= 'http://' . $_SERVER['HTTP_HOST'] . DIR ?>/js/jquery-3.3.1.slim.min.js"></script>
<script src="<?= 'http://' . $_SERVER['HTTP_HOST'] . DIR ?>/js/popper.min.js"></script>
<script src="<?= 'http://' . $_SERVER['HTTP_HOST'] . DIR ?>/js/bootstrap.min.js"></script>
<script src="<?= 'http://' . $_SERVER['HTTP_HOST'] . DIR ?>/js/jquery.mask.js"></script>

</body>
</html>
<script>
    $(document).ready(function () {

        $('#inputCnpj').mask('00.000.000/0000-00', {reverse: true});
        $('#inputFone').mask('00-0000-0000',{reverse: true});
    });
</script>