 <?php if(isset($gestion)): ?>

<h1>gestionar pedidos</h1>

<?php else: ?>
<h1>mis pedidos</h1>
<?php endif; ?>
 <table>
    <tr>
        <th>N° pedido</th>
        <th>Costo</th>
        <th>Fecha</th>
        <th>Estado</th>
    </tr>
    <?php while($ped= $pedidos->fetch_object()):
  

        ?>
        
    <tr>
        <td><a href="<?=base_url?>pedidos/detalle&id=<?=$ped->id?>"><?=$ped->id?></a></td>
        <td><?= number_format($ped->costo)?></td>
        <td><?=$ped->fecha?></td>

        <td><?=Utils::showEstado($ped->estado)?></td>

    </tr>
        
    <?php endwhile; ?>

</table>
