
<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>
    <h1>Tu pedido ha sido Confirmado</h1>
    <p>tu pedido ha sido guardado con exito   </p>

    <br>
    <?php if (isset($pedido)): ?>
        <h3>Datos del pedido:</h3>

        Numero de Pedido: <?= $pedido->id ?>
        <br>
        Total a pagar: <?= number_format($pedido->costo) ?>
        <br>
        Metodo de pago: <?=$pedido->MetodoPago ?>
        <br>
        Productos: 
        <table>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Unidades</th>
            </tr>
            <?php while ($producto = $productos->fetch_object()): ?>

                <tr>
                    <td><img src = "<?= base_url ?>uploads/images/<?= $producto->imagen ?>" class="img_carrito"/></td>
                    <td><a href="<?= base_url ?>productos/ver&id=<?= $producto->id ?>"><?= $producto->nombre; ?></a></td>
                    <td>$<?= number_format($producto->precio); ?></td>
                    <td><?= $producto->unidades ?></td>
                </tr>





                <!--    
                    <ul>
                        <li>
                            //<?= $producto->nombre ?> - $<?= number_format($producto->precio) ?> - x<?= $producto->unidades ?>
                        </li>
                    </ul>-->
            <?php endwhile; ?>
        </table> 
    <?php endif; ?>

<?php else: ?>
    <p>Tu pedido no ha podido procesarse </p>
<?php endif; ?>
