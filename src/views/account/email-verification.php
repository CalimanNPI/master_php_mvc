<?php include_once(__DIR__ . '/../partials/head.php') ?>
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <?php

        $type = "";
        $messages = "";
        $alert = "";

        if (isset($this->data['messages'])) {
            foreach ($this->data['messages'] as $item) {
                $messages .= "<strong>Error!</strong> $item <br/>";
            }
            $type = "danger";
            $alert = "<div class='alert alert-{$type}' role='alert'>{$messages}</div>";
        }

        ?>
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Verificación</h3>
                            </div>
                            <div class="card-body">
                                <?php echo $alert; ?>
                                <form method="post" action="<?php echo BASE_URL ?>/resend-email-verification">
                                    <div class="form-group"><label class="small mb-1" for="inputPassword">Clave usuario</label>
                                        <input class="form-control py-4" id="inputPassword" type="text" name="clave" placeholder="9999999999" />
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <button class="w-100  btn btn-danger btn-lg">Enviar verificación</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small"><a href="<?php echo BASE_URL ?>/login">Inicio de sesión</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<?php 
include_once(__DIR__ . '/../partials/footer.php');
exit;
?>