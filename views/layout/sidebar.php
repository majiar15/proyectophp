<aside id="lateral">
    <div id="login" class="block_aside">
        <h3>Mi carrito</h3>
        <ul>
            <?php $stats = Utils::statsCarrito();?>
            <li>
                <a href="<?= base_url ?>carrito/index">Productos{<?=$stats['count']?>}</a>
            </li>
            
            <li>
                <a href="<?= base_url ?>carrito/index">Total:$<?=  number_format($stats['total'])?></a>
            </li>
            <li>
                <a href="<?= base_url ?>carrito/index">ver carrito</a>
            </li>
        </ul>
    </div>

    <div id="login" class="block_aside">
        <?php if (!isset($_SESSION['identity'])): ?>
            <h3>entrar a la web</h3>
            <form action="<?= base_url ?>usuario/login" method="post">
                <label for="email"  >email</label>
                <input type="email" name="email">
                <label for="password" >password </label>
                <input type="password" name="password">
                <input type="submit" value="enviar" >
            </form>
        <?php else: ?>
            <h3><?= $_SESSION['identity']->nombre ?> <?= $_SESSION['identity']->apellidos ?></h3>

        <?php endif; ?>
        <ul>                      

            <?php if (isset($_SESSION['admin']) && isset($_SESSION['identity'])): ?>
                <li><a href="<?= base_url ?>categorias/index" >gestionar categorias</a></li>
                <li><a href="<?= base_url ?>productos/gestion" >gestionar productos</a></li>
                <li><a href="<?= base_url ?>pedidos/gestion" >gestionar pedidos</a></li>
                <li><a href="<?= base_url ?>/usuario/logout" >Cerar session</a></li>                            
            <?php elseif (isset($_SESSION['identity'])): ?>
                <li><a href="<?= base_url ?>pedidos/misPedidos" >Mis pedidos</a></li>
                <li><a href="<?= base_url ?>/usuario/logout" >Cerar session</a></li>

            <?php else: ?>
                <li><a href="<?= base_url ?>/usuario/registro">Registrate aqui</a></li>

            <?php endif; ?>

        </ul>
    </div>
</aside>
</div>
<div id="central">


