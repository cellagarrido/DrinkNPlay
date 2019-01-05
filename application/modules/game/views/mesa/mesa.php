<!DOCTYPE html>
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

<body class="text-center" style="height: 100%">
<div class="container-fluid" style="height: 100%">
    <div class="row" style="height: 100%;">
        <div class="col-3 col-sm-2 col-md-3 col-lg-2 col-xl-1" style="height: 100%;">
            <div class="row align-items-center" style="height: 100%;">
                <div class="col-12">
                    <?php if (count($jogadores['esquerda']) > 0) : ?>
                        <?php foreach ($jogadores['esquerda'] as $jogador) : ?>
                            <div class="rotate90" style="float: left; height: 100px; margin-left: 5%;">
                                <p style="margin-bottom: auto; line-height: 12px;">
                                    <?= $jogador->apelido ?>
                                    <br>
                                    <small class="rotate180">(Tamanho do monte: <?= $jogador->cartas['quantidade'] ?>)</small>
                                </p>
                                <p style="margin: 0;">
                                </p>
                                <?php if ($jogador->cartas['primeira'] != NULL) : ?>
                                    <img id="<?= $jogador->cartas['primeira']->id ?>" class="carta" src="<?= base_url($jogador->cartas['primeira']->img) ?>" style="width: 60px;">
                                <?php else : ?>
                                    <img src="<?= base_url('assets/img/nipes.png') ?>" style="width: 60px; border: 1px solid gray;">
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-8 col-md-6 col-lg-8 col-xl-10" style="height: 100%;">
            <div class="row align-items-center" style="height: 15%;">
                <div class="col-12" style="text-align: center">
                    <?php if ($jogadores['top']->cartas['primeira'] != NULL) : ?>
                        <img id="<?= $jogadores['top']->cartas['primeira']->id ?>" class="carta" src="<?= base_url($jogadores['top']->cartas['primeira']->img) ?>" style="width: 60px">
                    <?php else : ?>
                        <img src="<?= base_url('assets/img/nipes.png') ?>" style="width: 60px; border: 1px solid gray;">
                    <?php endif; ?>
                    <p class="rotate180" style="margin-bottom: auto; line-height: 12px;">
                        <?= $jogadores['top']->apelido ?>
                        <br>
                        <small class="rotate180">(Tamanho do monte: <?= $jogadores['top']->cartas['quantidade'] ?>)</small>
                    </p>
                </div>
            </div>
            <div class="row align-items-center" style="height: 70%; max-height: 70%">
                <div class="row col-centered align-items-center" style="height: 100%; float: left; max-width: 20%">
                    <div class="col-12">
                        <div class="rotate270" style="margin: auto 50px auto auto; float: left;">
                            <img src="<?= base_url('assets/img/back_deck_amarelo.png') ?>" style="width: 60px;">
                            <p style="margin-top: -60px; color: black;"><?= $quantidadeCartasCompra ?></p>
                        </div>
                    </div>
                </div>
                <?php if (count($colunasCartasMesa) > 0) : ?>
                    <?php foreach ($colunasCartasMesa as $cartasMesa) : ?>
                        <div class="row col-centered align-items-center" style="height: 100%; float: left; max-width: 20%">
                            <?php foreach ($cartasMesa as $cartaMesa) : ?>
                                <div class="col-12">
                                    <div class="rotate270" style="margin: auto; float: left">
                                        <img id="<?= $cartaMesa->id ?>" class="carta" src="<?= base_url($cartaMesa->img) ?>" style="width: 60px;">
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="row align-items-center" style="height: 15%;">
                <div class="col-12">
                    <p style="margin-bottom: auto; line-height: 12px;">
                        <?= $jogadores['bot']->apelido ?>
                        <br>
                        <small class="rotate180">(Tamanho do monte: <?= $jogadores['bot']->cartas['quantidade'] ?>)</small>
                    </p>
                    <?php if ($jogadores['bot']->cartas['primeira'] != NULL) : ?>
                        <img id="<?= $jogadores['bot']->cartas['primeira']->id ?>" class="carta" src="<?= base_url($jogadores['bot']->cartas['primeira']->img) ?>" style="width: 60px">
                    <?php else : ?>
                        <img src="<?= base_url('assets/img/nipes.png') ?>" style="width: 60px; border: 1px solid gray;">
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-3 col-sm-2 col-md-3 col-lg-2 col-xl-1" style="height: 100%;">
            <div class="row align-items-center" style="height: 100%;">
                <div class="col-12">
                    <?php if (count($jogadores['direita']) > 0) : ?>
                        <?php foreach ($jogadores['direita'] as $jogador) : ?>
                            <div class="rotate270" style="float: right; margin-right: 20px;">
                                <p style="margin-bottom: auto; line-height: 12px;">
                                    <?= $jogador->apelido ?>
                                    <br>
                                    <small class="rotate180">(Tamanho do monte: <?= $jogador->cartas['quantidade'] ?>)</small>
                                </p>
                                <?php if ($jogador->cartas['primeira'] != NULL) : ?>
                                    <img id="<?= $jogador->cartas['primeira']->id ?>" class="carta" src="<?= base_url($jogador->cartas['primeira']->img) ?>" style="width: 60px;">
                                <?php else : ?>
                                    <img src="<?= base_url('assets/img/nipes.png') ?>" style="width: 60px; border: 1px solid gray;">
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
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
    $(".carta").click(function () {
        var elementRemoved;
        $(".carta").each(function() {
            if ($(this).hasClass('borderCard')) {
                elementRemoved = $(this).attr('id');
                $(this).removeClass('borderCard');
                $.ajax({
                    method: "POST",
                    url: "<?= base_url('game/mesa/removerCartaTemporariaMesa') ?>",
                    dataType: "json",
                    data: {
                        id_carta: $(this).attr('id'),
                        id_mesa: <?= $this->session->userdata('mesa')->id ?>
                    },
                    success: function (mensagem) {
                        console.log(mensagem)
                    }
                });
            }
        });
        if(elementRemoved !== $(this).attr('id')){
            elemento = $(this);
            $(this).addClass('borderCard');
            $.ajax({
                method: "POST",
                url: "<?= base_url('game/mesa/addCartaTemporariaMesa') ?>",
                dataType: "json",
                data: {
                    id_carta: $(this).attr('id'),
                    id_mesa: <?= $this->session->userdata('mesa')->id ?>
                },
                success: function (mensagem) {
                    if (mensagem === true) {
                        window.location.replace("<?= base_url('game/mesa/mesagame') ?>");
                    }
                    if (mensagem === 'remover') {
                        elemento.removeClass('borderCard');
                    }
                }
            });
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
                    window.location.replace("<?= base_url('game/mesa/mesagame') ?>")
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
                    window.location.replace("<?= base_url('game/mesa/fim') ?>")
                }
            }
        });
    }, 1500);
</script>

</body>