<?php
namespace App\Controller;

class RolesController extends AppController{
    
    public function index() {
        $query = $this->Roles->find();
        $this->set('roles', $query);
    }
    
    public function registrar() {
        $rol = $this->Roles->newEntity();
        if($this->request->is('post')){
//            var_dump($this->request->data); $this->autoRender = false;
//            $rol->nombre = $this->request->data['Rol']['nombre'];
            $rol = $this->Roles->patchEntity($rol, $this->request->data);
            if( $this->Roles->save($rol) ) {
                $this->Flash->success('Registro guardado correctamente');
                $this->redirect(['action'=>'index']);
            } else {
                $this->Flash->error('Error al momento de guardar el registro');
            }
        }
        $this->set('rol', $rol);
    }
    
    public function editar($id = null) {
        $rol = $this->Roles->get($id);
        if($this->request->is('put')){ // or post <form>
            $rol = $this->Roles->patchEntity($rol, $this->request->data);
            if( $this->Roles->save($rol) ) {
                $this->Flash->success('Registro guardado correctamente');
                $this->redirect(['action'=>'index']);
            } else {
                $this->Flash->error('Error al momento de guardar el registro');
            }
        }
        $this->set('rol', $rol);
    }
    
    public function eliminar($id = null) {
        $rol = $this->Roles->get($id);
        if( $this->Roles->delete($rol) ) {
            $this->Flash->success('Registro eliminado correctamente');
        } else {
            $this->Flash->error('Error al momento de eliminar el registro');
        }
        $this->redirect(['action'=>'index']);
    }
    
}
