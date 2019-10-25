<h1>Crear Nueva categoria</h1>


<form action="<?=base_url?>categorias/save" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre"  required/>
    
    <input type="submit" value="guardar"/>
    
    
    
</form>