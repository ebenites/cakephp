<?php  //foreach ($productos as $row) { var_dump($row); } ?>

<?= $this->Form->create(null, ['url' => ['controller' => 'Carrito', 'action' => 'comprar']]); ?>
    <fieldset>
        <legend>Datos de cliente</legend>
        <?= $this->Form->input('nombres',['maxLength'=>100, 'label' => 'Nombres']) ?>
        <?= $this->Form->input('correo',['maxLength'=>100, 'label' => 'Correo']) ?>
        <?= $this->Form->submit('Realizar pedido', ['class' => 'btn btn-primary']); ?>
    </fieldset>
<?= $this->Form->end(); ?>

<br/>

<?= $this->Html->link('Regresar', ['controller' => 'Carrito', 'action' => 'listar'], ['class' => 'btn btn-default'])?>  
