<?php

require_once 'config.php';
require_once DBAPI;
include(HEADER_TEMPLATE);
$erro = "";

try {
    $db = open_database();
} catch (Exception $e) {
    $erro = $e->getMessage();
}
?>

<div class="container1 row justify-content-center">
    <div class="col-12 col-xl-10">

        <h1 class="form-title mb-0">Dashboard</h1>
        <hr>

        <?php if (!$erro): ?>

            <div class=" row g-3">
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="gerentes/add.php" class="index-buttom dashboard-tile">
                        <i class="fa fa-user-plus fa-3x index-icon"></i>
                        <p class="index-p">Novo Gerente</p>
                    </a>
                </div>

                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="gerentes" class="index-buttom dashboard-tile">
                        <i class="fa fa-user-group fa-3x index-icon"></i>
                        <p class="index-p">Gerentes</p>
                    </a>
                </div>
            </div>

        <?php else: ?>

            <div class=" alert alert-danger" role="alert">
                <p class="mb-0">
                    <b>ERRO:</b> Não foi possível conectar ao banco de dados!<br>
                    <?= htmlspecialchars($erro) ?>
                </p>
            </div>

        <?php endif; ?>

    </div>
</div>

<?php include FOOTER_TEMPLATE; ?>