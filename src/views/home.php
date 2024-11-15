<?php include_once(__DIR__ . '/partials/head.php') ?>

<div class="login-container">
    <div class="logo-container vertical-center">
        <img src="<?php echo BASE_URL ?>/assets/images/img3.jpg" alt="" class="">
    </div>
    <div class="vertical-center text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <form>
                        <img class="mb-4" src="<?php echo BASE_URL ?>/assets/images/logo.png" width="200">
                        <h1 class="h3 mb-3 fw-normal">Inicio </h1>

                     
                        <a class="w-100 btn btn-lg btn-danger" href="<?php echo BASE_URL ?>/login">Iniciar sesión</a>
                        <br>
                        <br>
                        <a class="w-100 btn btn-lg btn-danger" href="<?php echo BASE_URL ?>/register">Registrarse</a>
                      
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