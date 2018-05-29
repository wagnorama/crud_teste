<?php require_once "/../config/config.php" ?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?='http://'.$_SERVER['HTTP_HOST'].DIR ?>/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <style>
        body {
            padding-top: 3.5rem;
        }
    </style>

    <title>Essentia Pharma!</title>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="index.php"><img src="<?='http://'.$_SERVER['HTTP_HOST'].DIR ?>/img/logo-essentia.png" width="40px" height="auto"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?='http://'.$_SERVER['HTTP_HOST'].DIR?>">Home <span class="sr-only"></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cadastros</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="<?='http://'.$_SERVER['HTTP_HOST'].DIR?>/src/view/clientes/">Clientes</a>
                </div>
            </li>
        </ul>

    </div>
</nav>

<main role="main">

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3 text-center"><img src="<?='http://'.$_SERVER['HTTP_HOST'].DIR ?>/img/logo-essentia2.png" width="200px" height="auto"></h1>
            <p class="text-center">Este é um teste feito para o processo seletivo da empresa Essentia Pharma, feito pelo candidato <strong>Wagner Martins</strong></p>
            <p class="text-center"><a class="btn btn-primary btn-lg" href="https://www.linkedin.com/in/wagner-martins-901b562a/" target="_blank" role="button">Sobre mim &raquo;</a></p>
        </div>
    </div>

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-4">
                <h2>Clientes</h2>
                <p>Cadastro de exemplo de clientes </p>
                <p><a class="btn btn-secondary" href="<?='http://'.$_SERVER['HTTP_HOST'].DIR?>/src/view/clientes/" role="button">Saiba Mais &raquo;</a></p>
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
<script src="<?='http://'.$_SERVER['HTTP_HOST'].DIR?>/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="<?='http://'.$_SERVER['HTTP_HOST'].DIR?>/js/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="<?='http://'.$_SERVER['HTTP_HOST'].DIR?>/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</body>
</html>
