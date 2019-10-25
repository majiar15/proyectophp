<h1>gestion de productos</h1>

<a href="<?=base_url?>productos/crear" class="button button-small">
    crear producto
</a>

     <?php if(isset($_SESSION['editar']) && $_SESSION['editar']=='complete'):?>    
      <strong class="alert_green">El producto se ha editado correctamente</strong>
    <?php elseif(isset($_SESSION['editar']) && $_SESSION['editar']!='complete'): ?>
        <strong class="alert_red">error al editar el producto</strong>     
         <?php Utils::deleteSession('editar') ; ?>  
    <?php elseif(isset($_SESSION['producto']) && $_SESSION['producto']=='complete'):?>    
      <strong class="alert_green">El producto se ha creado correctamente</strong>
    <?php elseif(isset($_SESSION['producto']) && $_SESSION['producto']=='failed'): ?>
        <strong class="alert_red">El producto NO se ha creado correctamente</strong>     
    <?php endif;?>
        <?php Utils::deleteSession('editar') ; ?> 
        <?php Utils::deleteSession('producto') ; ?>
        
     <?php if(isset($_SESSION['delete']) && $_SESSION['delete']=='complete'):?>    
      <strong class="alert_green">El producto se ha eliminado correctamente</strong>
    <?php elseif(isset($_SESSION['delete']) && $_SESSION['delete']=='failed'): ?>
        <strong class="alert_red">El producto no se elimino correctamente</strong>     
    <?php endif;?>
        <?php Utils::deleteSession('delete') ; ?>
        
    


<table border="1">
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>precio</th>
        <th>stock</th>
        <th>Acciones</th>
        
    </tr>
    <?php while($pro = $producto->fetch_object()):?>
    <tr>
        
        <td><?=$pro->id;?></td>
        <td><?=$pro->nombre;?></td>
        <td><?=$pro->precio;?></td>
        <td><?=$pro->stock;?></td>
        <td>
            <a href="<?=base_url?>productos/editar&id=<?=$pro->id?>" class="button button-gestion ">editar</a>
            <a href="<?=base_url?>productos/eliminar&id=<?=$pro->id?>" class="button button-gestion button-red">eliminar</a>
        </td>
        
    </tr>
    
    <?php endwhile; ?>
</table>

