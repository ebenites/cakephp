<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class ProductosTable extends Table{
    
    public function initialize(array $config){
        $this->table('productos');
        $this->primaryKey('id');
        $this->entityClass('App\Model\Entity\Producto');
        
        // Comportamiento Timestamp: Antes de registrar un producto guarda la fecha actual enel campo 'creado'
        $this->addBehavior('Timestamp', [
            'events' => [
                'Productos.beforeSave' => [
                    'creado' => 'new',
                ]
            ]
        ]);
        
        // Relationship: many to one
        $this->belongsTo('Categorias', [
            'className' => 'App\Model\Table\CategoriasTable', // o solo Categorias
            'foreignKey' => 'categorias_id',
            'propertyName' => 'categoria'
        ]);
    }
    
}
