<?php include_once(__DIR__ . '/../partials/head.php') ?>
<div id="layoutError">
    <div id="layoutError_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center mt-4">
                            <img class="mb-4 img-error" src="<?php echo BASE_URL ?>/assets/images/error-404-monochrome.svg" />
                            <p class="lead">This requested URL was not found on this server.</p>
                            <a href="<?php echo BASE_URL ?>"><i class="fas fa-arrow-left mr-1"></i>Return to Dashboard</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<?php include_once(__DIR__ . '/../partials/footer.php') ?>