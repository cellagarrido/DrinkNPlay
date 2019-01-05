<!DOCTYPE html>
<!-- saved from url=(0049)https://getbootstrap.com/docs/4.1/examples/cover/ -->
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/favicon.ico">

    <title>DrinkNPlay</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/css/project.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/fonts/open-iconic-master/font/css/open-iconic-bootstrap.css') ?>" rel="stylesheet">
</head>

<body class="text-center">
<nav class="navbar navbar-dark bg-dark">
    <div class="row align-items-center" style="width: 100%;">
        <div class="col-12">
            <img src="<?= base_url('assets/img/logo2.png') ?>" width="200px">
        </div>
        <div class="col-2">
        </div>
    </div>
</nav>
<div class="container">
    <div class="row align-items-center" style="height: 100%">
        <div class="col-12">
            <p class="lead">
            <h1>Obrigado por Jogar</h1>
            <h1 style="color: red;">DrinkNPlay</h1>
            <h1>O Jogador</h1>
            <h1 style="color: red;">Jogador <?= $vencedor ?></h1>
            <h1>Foi o Vencedor</h1>
            </p>
            <p class="lead">
                <a href="<?= base_url('game/inicio/index') ?>" class="btn btn-lg btn-info" style="border-radius: 50px;">Inicio</a>
            </p>
        </div>
    </div>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>

</body>

</html>