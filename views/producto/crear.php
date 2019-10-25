<?php if (isset($edit) && isset($pro) && is_object($pro)): ?>
    <h1>Editar producto <?=$pro->nombre;?></h1>
        <?php $url_action= base_url."productos/save&id=".$pro->id; ?>
<?php else: ?>
    <h1>crear nuevo producto</h1>
  <?php $url_action= base_url."productos/save"; ?>
<?php endif; ?>


<div class="form_container">

    <form action="<?= $url_action ?>" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?=isset($pro) && is_object($pro) ? $pro->nombre:'';?>">

        <label for="Descripcion">Descripcion</label>
        <textarea name='descripcion'><?=isset($pro) && is_object($pro) ? $pro->descripcion:'';?></textarea>

        <label for="precio">Precio</label>
        <input type="number" name="precio" required value="<?=isset($pro) && is_object($pro) ? $pro->precio:'';?>">

        <label for="stock">Stock</label>
        <input type="number" name="stock" value="<?=isset($pro) && is_object($pro) ? $pro->stock:'';?>">

        <label for="categoria">categoria</label>
        <?php
        $categorias = Utils::showCategorias();
        ?>
        <select name="categoria">
            <?php while ($cat = $categorias->fetch_object()): ?>
                <option value="<?= $cat->id ?>" <?=isset($pro) && is_object($pro) && $cat->id==$pro->categoria_id ? 'selected':'';?> >
                    <?= $cat->nombre ?>
                </option>                

            <?php endwhile; ?>  
        </select>

        <label for="nombre">Imagen</label>
        <?php if(isset($pro) && is_object($pro) && !empty($pro->imagen)):?>
            <img src="<?=base_url?>uploads/images/<?=$pro->imagen?>" class="thumb">
        <?Php endif;?>
            <input type="file" name="imagen">
            <label>elije la marca del componente</label>
            <select name="marca">
                <option value="AMD">AMD</option>
                <option value="Intel">Intel</option>
                <option value="NULL">no aplica</option>
            </select>
            
            <label>elije el socket del componente</label>
            <select name="socket">
                <option value="DDR4">DDR4</option>
                <option value="DDR3">DDR3</option>
                <option value="NULL">no aplica</option>
            </select>                

        <input type="submit" value="guardar">

    </form>
</div>
