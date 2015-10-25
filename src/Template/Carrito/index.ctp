<?php  //foreach ($productos as $row) { var_dump($row); } ?>

<table border="1" width="100%">
    <caption>Cat&aacute;logo de Productos</caption>
    <colgroup>
        <col width="80"/>
        <col/>
        <col/>
        <col width="100"/>
        <col width="80"/>
    </colgroup>
    <thead>
        <th>ID</th>
        <th>CATEGORIA</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
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
            <td><?= $this->Number->currency($producto->precio, 'PEN', ['locale' => 'es_PE']) ?></td>
            <td><?= $this->Html->link('Seleccionar', ['controller' => 'Carrito', 'action' => 'seleccionar', $producto->id], ['class' => 'btn btn-primary']) ?></td>
        </tr>
    <?php
        }
    ?>
   </tbody>
</table>

<br/>

<?= $this->Html->link('Ver Carrito', ['controller' => 'Carrito', 'action' => 'listar'], ['class' => 'btn btn-default'])?>