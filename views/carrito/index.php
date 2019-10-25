<h1>carrito </h1>
<?php if(isset($_SESSION['carrito']) && count($_SESSION['carrito'] )>=1):?>
<table>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>

    </tr>
    <?php
    foreach ($carrito as $indice => $elemento):
        $producto = $elemento['producto'];
        ?>

        <tr>
            <td><img src = "<?= base_url ?>uploads/images/<?= $producto->imagen ?>" class="img_carrito"/></td>
            <td><a href="<?= base_url ?>productos/ver&id=<?= $producto->id ?>"><?= $producto->nombre; ?></a></td>
            <td>$<?= number_format($producto->precio); ?></td>
            
            
            <td style="text-align: center;">
               
          
                <a href="<?= base_url ?>carrito/up&index=<?=$indice?>" class="up-unidades ">+</a>
             <?= $elemento['unidades']; ?>
            <a href="<?= base_url ?>carrito/down&index=<?=$indice?>" class="down-unidades " >-</a>
                
            </td>
            
            
            
            <td>  <a href="<?= base_url ?>carrito/remove&index=<?=$indice?>" class="button button-carrito button-red">eliminar producto</a> </td>
        </tr>

    <?php endforeach; ?>

</table>
<div class="delete-carrito">
    <a href="<?= base_url ?>carrito/delete_all" class="button button-delete button-red">vaciar carrito</a>
</div>
<div class="total-carrito">
    <?php $stats = Utils::statsCarrito(); ?>
    <h4>Precio Total $<?= number_format($stats['total']) ?></h4>

    <a href="<?= base_url ?>pedidos/metodo" class="button button-pedido">hacer pedido</a>

</div>
<?php else:?>
<p>
    el carrito esta vacido, añade un producto
</p>
<?php endif;?>
