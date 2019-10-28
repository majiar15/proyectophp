<?php if (isset($_GET['id'])): $id=$_GET['id']?>
    <h1><?= $categoria->nombre ?></h1>  
    <?php if ($productos[2]->num_rows == 0): ?>
        No hay productos para mostrar
    <?php else: ?>
        <?php while ($pro = $productos[2]->fetch_object()): ?>
            <div class = "product">
                <a href="<?= base_url ?>productos/ver&id=<?= $pro->id ?>">
                <img src = "<?= base_url ?>uploads/images/<?= $pro->imagen ?>"/>
                </a>
                <h2><?= $pro->nombre ?></h2>
                <p> <?= number_format($pro->precio) ?> pesos </p>
                <a href = "<?= base_url?>carrito/add&id=<?=$pro->id?>" class = "button">comprar</a>

            </div>
        <?php endwhile; ?>
    <?php endif; ?>
<?php else: ?>
    <h1>la categoria no existes</h1>
<?php endif;?>


<div class="pagination">
    <ul>      
<?php for ($i=0; $i < $productos[1]; $i++): ?>

           
    <?php if($i==0 && (isset($_GET['page'])) && ($_GET['page'] !=1)): ?>
        <li><a  href="<?=base_url?>categorias/ver&id=<?=$id?>&page=<?=($_GET['page'] - 1)?>"> << </a></li>
    <?php endif;?>
        
        
        
<li><a  href="<?=base_url?>categorias/ver&id=<?=$id?>&page=<?=($i + 1)?>"><?=($i + 1)?></a></li>



 <?php if(($i==$productos[1]-1 &&  ($_GET['page'] !=$productos[1]))): ?>
      <li> <a  href="<?=base_url?>categorias/ver&id=<?=$id?>&page=<?=($i + 1)?>"> >> </a> </li>
    <?php endif;?>



<?php endfor;?>
       
    </ul>
 </div>