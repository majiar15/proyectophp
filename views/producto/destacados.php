<?php if(isset($_POST['search'])):?>

<h1>resultados de la busqueda <?=$_POST['search']?></h1>

<?php else:?>

<h1>algunos de nuestros prodcutos</h1>

<?php endif;?>

<?php if($productos->num_rows !=0):?>

<?php while ($pro = $productos->fetch_object()): ?>
    <!--contenido --->
    <div class = "product">
        <a href="<?= base_url ?>productos/ver&id=<?= $pro->id ?>">
            <img src = "<?= base_url ?>uploads/images/<?= $pro->imagen ?>"/>
            <h2><?= $pro->nombre ?></h2>
            <a/>
            <p> <?= number_format($pro->precio) ?> pesos </p>
            <a href = "<?= base_url ?>carrito/add&id=<?= $pro->id ?>" class = "button">comprar</a>

    </div>
<?php endwhile; ?>
    
<?php else:?>
    <h2>no hay resultados de la busqueda <?=$_POST['search']?> </h2>
    
<?php endif; ?>
