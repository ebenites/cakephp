<?php //foreach ($categorias as $row) { var_dump($row); } ?>
<h2>Mantenimiento de Categorias</h2>

<table border="1" width="100%">
    <caption>Lista de Categorias</caption>
    <colgroup>
        <col width="80"/>
        <col/>
        <col width="80"/>
        <col width="80"/>
    </colgroup>
    <thead>
        <th><?= $this->Paginator->sort('id', 'ID') ?></th>
        <th><?= $this->Paginator->sort('nombre', 'NOBRE') ?></th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </thead>
    <tbody>
    <?php
        foreach ($categorias as $categoria) {
    ?>
        <tr>
            <td><?= $categoria->id ?></td>
            <td><?= $categoria->nombre ?></td>
            <td><?= $this->Html->link('Editar', ['controller' => 'Categorias', 'action' => 'editar', $categoria->id]) ?></td>
            <td><?= $this->Html->link('Eliminar', '/categorias/eliminar/'.$categoria->id) ?></td>
        </tr>
    <?php
        }
    ?>
   </tbody>
   <tfoot>
       <tr>
           <td colspan="4">
               <ul class="pagination">
<!--                // Shows the page numbers-->
                <?= $this->Paginator->numbers() ?>
<!--                // Shows the next and previous links-->
                <?= $this->Paginator->prev('« Anterior') ?>
                <?= $this->Paginator->next('Siguiente »') ?>
<!--                // Prints X of Y, where X is current page and Y is number of pages-->
                <?= $this->Paginator->counter() ?>
               </ul>
           </td>
       </tr>
   </tfoot>
</table>

<br/>

<?= $this->Html->link('Nuevo', ['controller' => 'Categorias', 'action' => 'registrar'], ['class' => 'btn btn-default'])?>