<fieldset>
    <legend>Detalle de Producto</legend>
    <label>ID:</label> <?= $producto->id?><hr/>
    <label>CATEGORÍA:</label> <?= $producto->categoria->nombre?><hr/>
    <label>NOMBRE:</label> <?= $producto->nombre?><hr/>
    <label>PRECIO:</label> <?= $this->Number->currency($producto->precio, 'PEN', ['locale' => 'es_PE'])?><hr/>
    <label>STOCK:</label> <?= $producto->stock?><hr/>
    <label>CREADO:</label> <?= $producto->creado?><hr/>
    <label>DESCRIPCIÓN:</label> <br/>
    <?= $producto->descripcion?><hr/>
    <label>IMAGEN:</label>
    <?php if($producto->imagen_nombre){?>
    <?= $this->Html->image('/catalogo/'.$producto->imagen_nombre, ['alt' => $producto->imagen_nombre, 'width' => '300']); ?>
    <?php }?>
    <hr/>
</fieldset>

<br/>

<?= $this->Html->link('<< Regresar', ['controller' => 'Productos', 'action' => 'index'])?>