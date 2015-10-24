<?php  //foreach ($productos as $row) { var_dump($row); } ?>
<h2>Mantenimiento de Productos</h2>

<table border="1" width="100%">
    <caption>Lista de Productos</caption>
    <colgroup>
        <col width="80"/>
        <col/>
        <col/>
        <col width="100"/>
        <col width="100"/>
        <col width="86"/>
        <col width="80"/>
        <col width="80"/>
        <col width="80"/>
    </colgroup>
    <thead>
        <th>ID</th>
        <th>CATEGORIA</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>STOCK</th>
        <th>IMAGEN</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </thead>
    <tbody>
    <?php
        foreach ($productos as $producto) {
    ?>
        <tr>
            <td><?= $producto->id ?></td>
            <td><?= $producto->categoria->nombre ?></td>
            <td><?= $producto->nombre ?></td>
            <td><?= $this->Number->currency($producto->precio, 'PEN', ['locale' => 'es_PE']) ?></td><!-- http://book.cakephp.org/3.0/en/core-libraries/number.html#formatting-currency-values -->
            <td><?= $producto->stock ?></td>
            <td><?= $this->Html->image('/catalogo/'.(($producto->imagen_nombre)?$producto->imagen_nombre:'empty.png'), ['alt' => $producto->imagen_nombre, 'width' => '64', 'height' => '64']); ?></td>
            <td><?= $this->Html->link('Mostrar', ['controller' => 'Productos', 'action' => 'mostrar', $producto->id]) ?></td>
            <td><?= $this->Html->link('Editar', ['controller' => 'Productos', 'action' => 'editar', $producto->id]) ?></td>
            <td><?= $this->Html->link('Eliminar', ['controller' => 'Productos', 'action' => 'eliminar', $producto->id]) ?></td>
        </tr>
    <?php
        }
    ?>
   </tbody>
</table>

<br/>

<?= $this->Html->link('Nuevo', ['controller' => 'Productos', 'action' => 'registrar'], ['class' => 'btn btn-default'])?>