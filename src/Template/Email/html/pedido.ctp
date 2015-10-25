<p>Estimado(a) <?=$nombres?></p>
<p>Su siguiente pedido est&aacute; en proceso:</p>

<table border="1" width="100%">
    <caption>Lista de pedidos</caption>
    <colgroup>
        <col width="80"/>
        <col/>
        <col/>
        <col width="100"/>
    </colgroup>
    <thead>
        <th>ID</th>
        <th>CATEGORIA</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
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
        </tr>
    <?php
        }
    ?>
   </tbody>
   <tfoot>
       <tr>
           <td colspan="3"></td>
           <td><?= $this->Number->currency($total, 'PEN', ['locale' => 'es_PE']) ?></td>
       </tr>
   </tfoot>
</table>