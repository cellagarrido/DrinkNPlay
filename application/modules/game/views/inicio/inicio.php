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
        <div class="col-2">
            <a href="<?= base_url('game/inicio/index') ?>" class="btn btn-lg btn-info" style="border-radius: 50px;">
                <span class="oi oi-chevron-left" title="chevron-left" aria-hidden="true"></span>
            </a>
        </div>
        <div class="col-8">
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
                <a href="<?= base_url('game/auth/index') ?>" class="btn btn-lg btn-info" style="border-radius: 50px;">Iniciar como jogador</a>
            </p>
            <p class="lead">
                <a href="<?= base_url('game/mesa/criarMesa') ?>" class="btn btn-lg btn-info" style="border-radius: 50px;">Iniciar como mesa</a>
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