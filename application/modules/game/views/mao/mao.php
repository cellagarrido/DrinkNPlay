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
<div class="container-fluid" style="height: 100%">
    <div class="row" style="height: 100%;">
        <div class="col-3 col-sm-2 col-md-2 col-lg-2 col-xl-1 col-centered" style="height: 100%;">
            <div class="row align-items-center" style="height: 100%;">
                <div class="col-12">
                    <h2 class="rotate270" style="width: max-content; color: red; float: right; height: 0px; margin-right: -100px;">
                        <?= $this->session->userdata('jogador')->apelido ?><span class="suaVez">, aguarde</span>
                    </h2>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-8 col-md-8 col-lg-8 col-xl-10" style="height: 100%;">
            <div class="row align-items-center" style="height: 100%; max-height: 100%">
                <div class="row col-centered align-items-center" style="height: 100%; float: left; max-width: 20%">
                    <?php if (count($cartas) > 0) : ?>
                        <?php foreach ($cartas as $carta) : ?>
                            <div class="col-12">
                                <div class="rotate270" style="margin: auto; float: left">
                                    <img id="<?= $carta->id ?>" class="carta" src="<?= base_url($carta->img) ?>" style="width: 80px;">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-3 col-sm-2 col-md-2 col-lg-2 col-xl-1 col-centered" style="height: 100%;">
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
    var vez = 0;
    window.setInterval(function(){
        $.ajax({
            method: "POST",
            url: "<?= base_url('game/auth/verificarVez') ?>",
            dataType: "json",
            data: {
                id: '<?= $this->session->userdata('jogador')->id ?>'
            },
            success: function (mensagem) {
                if(mensagem.vez === '1') {
                    vez = 1;
                    $(".suaVez").html(', sua vez');
                } else {
                    vez = 0;
                    $(".suaVez").html(', aguarde');
                }
            }
        });
    }, 2500);
    $(".carta").click(function () {
        if(vez === 1){
            var elementRemoved;
            $(".carta").each(function() {
                if ($(this).hasClass('borderCard')) {
                    elementRemoved = $(this).attr('id');
                    $(this).removeClass('borderCard');
                    $.ajax({
                        method: "POST",
                        url: "<?= base_url('game/mao/removerCartaTemporariaUsuario') ?>",
                        dataType: "json",
                        data: {
                            id_carta: $(this).attr('id'),
                            id_usuario: <?= $this->session->userdata('jogador')->id ?>,
                            id_mesa: <?= $this->session->userdata('mesa')->id ?>
                        },
                        success: function (mensagem) {
                            console.log(mensagem)
                        }
                    });
                }
            });
            if(elementRemoved !== $(this).attr('id')){
                $(this).addClass('borderCard');
                $.ajax({
                    method: "POST",
                    url: "<?= base_url('game/mao/addCartaTemporariaUsuario') ?>",
                    dataType: "json",
                    data: {
                        id_carta: $(this).attr('id'),
                        id_usuario: <?= $this->session->userdata('jogador')->id ?>,
                        id_mesa: <?= $this->session->userdata('mesa')->id ?>
                    },
                    success: function (mensagem) {
                        if (mensagem === true) {
                            window.location.replace("<?= base_url('game/mao/jogadormao') ?>")
                        }
                    }
                });
            }
        }
    });
    window.setInterval(function(){
        $.ajax({
            method: "POST",
            url: "<?= base_url('game/mesa/verificaRodada') ?>",
            dataType: "json",
            data: {
                id: '<?= $this->session->userdata('vezJogador') ?>'
            },
            success: function (mensagem) {
                if (mensagem === true) {
                    window.location.replace("<?= base_url('game/mao/jogadormao') ?>")
                }
            }
        });
    }, 1500);
    window.setInterval(function(){
        $.ajax({
            method: "POST",
            url: "<?= base_url('game/mao/verificaFimJogo') ?>",
            dataType: "json",
            data: {},
            success: function (mensagem) {
                if (mensagem === true) {
                    window.location.replace("<?= base_url('game/inicio/index') ?>")
                }
            }
        });
    }, 1500);
</script>
</body>

</html>