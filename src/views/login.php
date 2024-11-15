<?php include_once(__DIR__ . '/partials/head.php') ?>


<?php
$messages = "";
$alert = "";

if (isset($this->data['messages'])) {
    foreach ($this->data['messages'] as $item) {
        $messages .= "<strong>Error!</strong> $item <br/>";
    }
    $alert = "<div class='alert alert-danger' role='alert'>{$messages}</div>";
}

if (isset($this->data['success'])) {
    foreach ($this->data['success'] as $item) {
        $messages .= "<strong >Bien! $item</strong> <br/>";
    }
    $alert = "<div class='alert alert-success' role='alert'>{$messages}</div>";
}

if (isset($this->data['info'])) {
    foreach ($this->data['info'] as $item) {
        $messages .= "<strong >Información! $item</strong>  <br/>";
    }
    $alert = "<div class='alert alert-success d-flex align-items-center text-uppercase font-monospace' role='alert'>
        <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-exclamation-triangle-fill flex-shrink-0 me-2' viewBox='0 0 16 16' role='img' aria-label='Warning:'>
        <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
        </svg>
        <div>
        {$messages}
        </div>  
    </div>";
}
?>

<div class="login-container">
    <div class="logo-container vertical-center">
        <img src="<?php echo BASE_URL ?>/assets/images/img3.jpg" alt="" class="">
    </div>
    <div class=" vertical-center text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <?php echo $alert ?>
                    <form method="post" action="<?php echo BASE_URL ?>/login">
                        <img class="mb-4" src="<?php echo BASE_URL ?>/assets/images/logo.png" width="200">
                        <h1 class="h3 mb-3 fw-normal">Inicio de sesión</h1>

                        <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Correo electrónico</label>
                            <input class="form-control py-4" id="inputEmailAddress" type="email" name="email" placeholder="cdcac@cdcac.com" />
                        </div>
                        <div class="form-group"><label class="small mb-1" for="inputPassword">Clave usuario</label>
                            <input class="form-control py-4" id="inputPassword" type="text" name="clave" placeholder="9999999999" />
                        </div>
                        <button class="w-100 btn btn-danger btn-lg">Iniciar sesión</button>



                        <p class="mt-5 mb-3 text-muted">
                            <a id="forgot-password" href="<?php echo BASE_URL ?>/register">Registro</a>
                        </p>
                        <p class="mt-5 mb-3 text-muted">
                            <a id="forgot-password" href="<?php echo BASE_URL ?>/resend-email-verification">Volver a enviar correo electrónico de verificación</a>
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