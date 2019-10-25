<?php if (isset($_SESSION['identity'])): ?>
    <h1>Hacer pedido</h1>
    <p>
    <a href="<?= base_url ?>carrito/index">ver los productos del pedido</a>
    </p>
    <h3>Direccion para el envio:</h3>
    <br/>
    <form action="<?=base_url?>pedidos/add" method="post">
        <label for="departamento" >departamento</label>
        <input type="text" name="departamento" required />

        <label for="ciudad">ciudad</label>
        <input type="text" name="ciudad" required />
        
        <label for="direccion">direccion</label>
        <input type="text" name="direccion" required />

        <input type="submit" value="confirmar pedido" />
       
    </form>
    



    

<?php else: ?>
    <h1>necesitas estar identificado</h1>
    <p>necesitas estar logeado en la web para realizar tu pedido</p>
<?php endif; ?>

