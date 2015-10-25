<?php  //foreach ($productos as $row) { var_dump($row); } ?>

<table border="1" width="100%">
    <caption>Lista de pedidos</caption>
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
        $total = 0;
        foreach ($carrito as $producto) {
            $total += $producto->precio;
    ?>
        <tr>
            <td><?= $producto->id ?></td>
            <td><?= $producto->categoria->nombre ?></td>
            <td><?= $producto->nombre ?></td>
            <td><?= $this->Number->currency($producto->precio, 'PEN', ['locale' => 'es_PE']) ?></td>
            <td><?= $this->Html->link('Retirar', ['controller' => 'Carrito', 'action' => 'retirar', $producto->id], ['class' => 'btn btn-primary']) ?></td>
        </tr>
    <?php
        }
    ?>
   </tbody>
   <tfoot>
       <tr>
           <td colspan="3"></td>
           <td><?= $this->Number->currency($total, 'PEN', ['locale' => 'es_PE']) ?></td>
           <td></td>
       </tr>
   </tfoot>
</table>

<br/>

<?= $this->Html->link('Regresar', ['controller' => 'Carrito', 'action' => 'index'], ['class' => 'btn btn-default'])?>  
&nbsp;
<?= $this->Html->link('Comprar', ['controller' => 'Carrito', 'action' => 'comprar'], ['class' => 'btn btn-primary'])?>