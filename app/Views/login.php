<link href="<?= site_url(); ?>public/css/login.css" rel="stylesheet" />
<section id="login">
    <div id="wrap">
        <div class="row g-2mb-3">
            <div class="col-12 mt-3">
                <div class="p-3 border bg-light" id="form-login">
                <h4><?= esc($title); ?></h4>
                    
                    <form action="<?php echo base_url().'/validate-login';?>" method="post" autocomplete="nope">
                        <?= csrf_field(); ?>
                        <div class="mb-2 row">
                            <label for="user" class="col-sm-3 mr-10 col-form-label" id="label-login">Usuario:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="user" name="user" value="" placeholder="usuario" autocomplete="nope">
                            </div>
                            <p id="error-message"><?= session('errors.user');?> </p>
                        </div>
                        <div class="mb-2 row">
                            <label for="password" class="col-sm-3 mr-10 col-form-label" id="label-login" >Contraseña:</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="password" name="password" value="" placeholder="****" autocomplete="nope">
                            </div>
                            <p id="error-message"><?= session('errors.password');?> </p>
                        </div>
                        <div class="mb-2">
                            <button type="submit" class="btn btn-secondary" value="Enviar" id="btn-login">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>        