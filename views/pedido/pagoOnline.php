 <?php Utils::isIdentity()?>
<?php
if(isset($_SESSION['tarjet']) && $_SESSION['tarjet'] =='failed'):
?>
<span class="alert_red">error al validar su informacion</span>
<?php endif;
 Utils::deleteSession('target');
?>
<form action="<?=base_url?>pedidos/MetodoPago" method="post">
        <label for="tarjeta" >tarjeta</label>
        <input type="text" name="tarjeta" required maxlength="16" />

        <label for="mes">mes de expriracion</label>
        <input type="text" name="mes" required maxlength="2"/>
        
        <label for="año">año de expiracion</label>
        <input type="text" name="año" required maxlength="2"/>
        
        <label for="CVV">CVV</label>
        <input type="text" name="CVV" required maxlength="4"/>
        
        <label for="nombreTitular">Nombre del titular</label>
        <input type="text" name="nombreTitular" required />   
        
        <input type="submit" value="confirmar pedido" />
       
    </form>
    