<?php include_once(__DIR__ . '/partials/head.php') ?>

<div class="login-container">
    <div class="logo-container vertical-center">
        <img src="<?php echo BASE_URL ?>/assets/images/img3.jpg" alt="" class="">
    </div>
    <div class=" vertical-center text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">

                    <?php

                    $type = "";
                    $messages = "";
                    $alert = "";

                    if (isset($this->data['messages'])) {
                        foreach ($this->data['messages'] as $item) {
                            $messages .= "<strong >Error!</strong> $item <br/>";
                        }
                        $type = "danger";
                        $alert = "<div class='alert alert-{$type}' role='alert'>{$messages}</div>";
                    }

                    ?>
                    <form method="post" action="<?php echo BASE_URL ?>/register">
                        <img class="mb-4" src="<?php echo BASE_URL ?>/assets/images/logo.png" width="200">
                        <h1 class="h3 mb-3 fw-normal">Registro</h1>

                        <?php echo $alert; ?>

                        <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Correo electrónico</label>
                            <input class="form-control py-4 text-lowercase" id="inputEmailAddress" type="email" name="email" placeholder="cdcac@cdcac.com" />
                        </div>
                        <div class="form-group"><label class="small mb-1" for="inputPassword">Clave usuario</label>
                            <input class="form-control py-4" id="inputPassword" type="text" name="clave" placeholder="9999999999" />
                        </div>
                        <div class="form-group"><label class="small mb-1" for="inputPassword">Teléfono Celular</label>
                            <input class="form-control py-4" id="inputPassword" type="tel" name="tel" placeholder="5500000000" />
                        </div>

                        <button class="btn btn-danger btn-lg w-100" type="submit">Enviar registro</button>
                        <p class="mt-5 mb-3 text-muted">
                            <a id="forgot-password" href="<?php echo BASE_URL ?>/login">Inicio de sesión</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once(__DIR__ . '/partials/footer.php');
exit;
?>