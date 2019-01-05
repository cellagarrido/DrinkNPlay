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
    </div>
</nav>
<div class="container">
    <div class="row align-items-center" style="height: 100%">
        <div class="col-12">
            <p class="lead">
                <a href="<?= base_url('game/inicio/iniciogame') ?>" class="btn btn-lg btn-info" style="border-radius: 50px;">Iniciar jogo</a>
            </p>
            <p class="lead">
                <a href="#" class="btn btn-lg btn-info" data-toggle="modal" data-target="#exampleModalLong" style="border-radius: 50px;">Instruções</a>
            </p>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Instruções do APP e Regras do jogo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="text-align: justify;">
                <h4 style="text-align: center;">Configuração da Mesa</h4>
                <p>
                    Deve clicar em “Iniciar Jogo” para dar início a configuração.<br>
                    Selecionar “Iniciar como mesa”.<br>
                    Irá aparecer o código da mesa e deve aguardar  todos os jogadores colocarem o código para clicar em
                    “Iniciar Jogo”.<br>
                </p>
                <h4 style="text-align: center;">Configuração do Jogador</h4>
                <p>
                    Esperar configuração da mesa.<br>
                    Deve clicar em “Iniciar Jogo” para dar início a configuração.<br>
                    Selecionar “Iniciar como jogador”.<br>
                    Escrever um apelido para aparecer como nome do jogo.<br>
                    Colocar o código que foi gerado pela “mesa”.<br>
                    Clicar em “Entrar”.<br>
                </p>
                <h4 style="text-align: center;">Qual objetivo?</h4>
                <p>
                    O vencedor será aquele que terminar o jogo com maior número de cartas no seu monte.<br>
                </p>
                <h4 style="text-align: center;">Como jogar?</h4>
                <p>
                    No mínimo duas pessoas para jogar, sem número máximo de participantes.<br>
                    São 2 baralhos a cada 4 pessoas.<br>
                    A mesa irá automaticamente embaralhar as cartas e distribuir 4 cartas a cada jogador, e colocar,
                    voltadas para cima, 8 cartas na mesa.<br>
                    O primeiro jogador deve verificar se possui cartas do mesmo número com as da mesa, se sim,
                    junta-as no seu monte; se não, deve-se descartar alguma carta da mão e colocá-la para cima na mesa.<br>
                    Os jogadores seguintes farão os mesmos passos, com o adicional de que, se possuir uma carta igual
                    ao topo do monte dos adversários, pode tomar o monte do oponente e colocar sua carta por cima.<br>
                    Ao acabar as cartas da mão, o jogo distribui automaticamente mais 4 cartas que sobraram do baralho
                    e continuar o jogo.<br>
                    O jogo termina quando o baralho de reposição não tiver mais cartas.<br>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<script type="text/javascript">
    $("exampleModalLong").click(function () {
        $('#exampleModalLong').modal("show")
    });
</script>

</body>

</html>