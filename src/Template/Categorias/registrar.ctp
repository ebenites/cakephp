<?= $this->Form->create($categoria); ?>
    <fieldset>
        <legend>Registro de Categor&iacute;a</legend>
        <?= $this->Form->input('nombre',array('maxLength'=>100, 'label' => 'Nombre')) ?>
        <?= $this->Form->input('orden',array('maxLength'=>10, 'label' => 'Orden')) ?>
        <?= $this->Form->submit('Guardar', ['class' => 'btn btn-primary']); ?>
    </fieldset>
<?= $this->Form->end(); ?>

<br/>

<?= $this->Html->link('<< Regresar', ['controller' => 'Categorias', 'action' => 'index'], ['class' => 'btn btn-default'])?>