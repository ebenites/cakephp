<?php
namespace App\Controller;

class CategoriasController extends AppController{
    
    public function initialize(){
        parent::initialize();
        $this->loadComponent('Paginator');
    }
    
    public $paginate = [
        'maxLimit' => 2
    ];
    
    public function index() {
        $query = $this->Categorias->find();
        $query = $this->paginate($query);
        $this->set('categorias', $query);
    }
    
    public function registrar() {
        $categoria = $this->Categorias->newEntity();
        if($this->request->is('post')){
            $categoria = $this->Categorias->patchEntity($categoria, $this->request->data);
            if( $this->Categorias->save($categoria) ) {
                $this->Flash->success('Registro guardado correctamente');
                $this->redirect(['action'=>'index']);
            } else {
                $this->Flash->error('Error al momento de guardar el registro');
            }
        }
        $this->set('categoria', $categoria);
    }
    
    public function editar($id = null) {
        $categoria = $this->Categorias->get($id);
        if($this->request->is('put')){ // or post <form>
            $categoria = $this->Categorias->patchEntity($categoria, $this->request->data);
            if( $this->Categorias->save($categoria) ) {
                $this->Flash->success('Registro guardado correctamente');
                $this->redirect(['action'=>'index']);
            } else {
                $this->Flash->error('Error al momento de guardar el registro');
            }
        }
        $this->set('categoria', $categoria);
    }
    
    public function eliminar($id = null) {
        $categoria = $this->Categorias->get($id);
        if( $this->Categorias->delete($categoria) ) {
            $this->Flash->success('Registro eliminado correctamente');
        } else {
            $this->Flash->error('Error al momento de eliminar el registro');
        }
        $this->redirect(['action'=>'index']);
    }
    
}
