<div class="container" style="margin-top:100px;">
<div class="jumbotron" style="background:rgba(0,0,0,0.5);">

<div class="text-center">
    <h2 style="color:white;">Registro de Usuario</h2>
</div>
    <form action="" method="post">
    <div class="row">
    <div class="col col-md-3"></div> 
    <div class="col col-md-6">
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Nombre completo" required="" value="<?php echo !empty($user['name'])?$user['name']:''; ?>">
          <?php echo form_error('name','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" required="" value="<?php echo !empty($user['email'])?$user['email']:''; ?>">
          <?php echo form_error('email','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="phone" placeholder="Phone" value="<?php echo !empty($user['phone'])?$user['phone']:''; ?>">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="Password" required="">
          <?php echo form_error('password','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="conf_password" placeholder="Confirm password" required="">
          <?php echo form_error('conf_password','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <?php
            if(!empty($user['gender']) && $user['gender'] == 'Female'){
                $fcheck = 'checked="checked"';
                $mcheck = '';
            }else{
                $mcheck = 'checked="checked"';
                $fcheck = '';
            }
            ?>
            <div class="form-group input-group">
                <label style="color:white;">
                <input type="radio" name="gender" value="Masculino" <?php echo $mcheck; ?>>
                Masculino
                </label>
            &nbsp;&nbsp;&nbsp;
                <label style="color:white;">
                  <input type="radio" name="gender" value="Femenino" <?php echo $fcheck; ?>>
                  Femenino
                </label>
            </div>
        </div>
        
        <div class="form-group">
            <input type="submit" name="regisSubmit" class="btn btn-primary btn-block" value="Registrar"/>
        </div>
      
        </div>
        </div>
    </form>
    <p style="color:gray;" class="footInfo">Si ya estas registrado puedes acceder desde<a href="<?php echo base_url('users/login'); ?>"> aqui</a></p>              
</div>
</div>
