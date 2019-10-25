

<?php if (isset($_GET['socket'])): ?>
    <h1>memorias Ram <?= $_GET['socket'] ?></h1>  
      
    
<?php while ($pro = $productos->fetch_object()): ?>
<!--contenido --->
<div class = "product">
    <a href="<?=base_url?>productos/ver&id=<?=$pro->id?>">
        <img src = "<?=base_url?>uploads/images/<?=$pro->imagen?>"/>
        <h2><?=$pro->nombre?></h2>
    <a/>
<p> <?=number_format($pro->precio)?> pesos </p>
<a href = "<?= base_url?>ArmaPc/seleccionRam&id=<?=$pro->id?>" class = "button">Añadir</a>

</div>
<?php endwhile;?>


<?php endif; ?>


