
<div class="container" style="margin-top:100px;">
<div class="jumbotron" style="background:rgba(0,0,0,0.5);">
<div class="text-center">
<h2 style="color:white;">User Login</h2>
</div>
<br />
    <?php
    if(!empty($success_msg)){
        echo '<p class="alert-success">'.$success_msg.'</p>';
    }elseif(!empty($error_msg)){
        echo '<p class="alert-danger">'.$error_msg.'</p>';
    }
    ?>
    <form action="" method="post">
    <div class="row">
    <div class="col col-md-3"></div> 
    <div class="col col-md-6">
    <span class="help-block">Si estas registrado puedes iniciar digitando tu...</span>
        <div class="form-group has-feedback">
            <input type="email" class="form-control" name="email" placeholder="E-mail" required="" value="">
            <?php echo form_error('email','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="Contraseña" required="">
          <?php echo form_error('password','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
        <div class="text-center">
        <a href="<?=base_url('/index.php/factura')?>" class="btn btn-default">Volver</a>
        <input type="submit" name="loginSubmit" class="btn btn-primary" value="Enviar"/>
        </div>
        </div>
        </div>
        </div>
    </form><hr/>
    <p class="footInfo" style="color:gray;">Sin cuenta aún? <a class="a" href="<?php echo base_url(); ?>users/registration">Registrate aqui</a></p>
</div>
</div>
