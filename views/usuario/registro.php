<h1>Registrarse</h1>
<?php if(isset($_SESSION['register']) && $_SESSION['register']=="complete"): ?>
<strong class="alert_green">Registro Completado Correctamente</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register']=="failed"): ?>
<strong class="alert_red">Registro Fallido, Revise los campos</strong>
<?php endif;?>

<div class="form_container">

<?php Utils::deleteSession('register') ?>
<form action="<?=base_url?>usuario/save" method="POST">
    <label for="nombre">nombre</label>
    <input type="text" name="nombre" required>
    <label for="apellidos">apellidos</label>
    <input type="text" name="apellidos" required>
    <label for="email">email</label>
    <input type="email" name="email" required >
    <label for="password">password</label>
    <input type="password" name="password" required>
    <input type="submit" value="Registrarse">
    
</form>
</div>