<?php if (isset($product)): ?>
    <h1><?= $product->nombre ?></h1>  


    <div class="detail-product">
        <div id="image">
            <img src = "<?= base_url ?>uploads/images/<?= $product->imagen ?>"/>
            
            </div>
            
            <div id="data">
                <p class="description"><?= $product->descripcion ?></p>
                <p class="price"> <?= number_format($product->precio) ?> pesos </p>
                <a href = "<?= base_url?>carrito/add&id=<?=$product->id?>" class = "button">comprar</a>
            </div>




        </div>



    <?php else: ?>
        <h1>el producto no existe no existes</h1>
    <?php endif; ?>


