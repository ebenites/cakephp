<?php
namespace App\Controller;

use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

class ProductosController extends AppController{
    
    public function initialize(){
        parent::initialize();
        $this->loadModel('Categorias');
    }
    
    public function index() {
        $query = $this->Productos->find('all')->contain(['Categorias']);
        $this->set('productos', $query);
    }
    
    public function mostrar($id = null) {
        $producto = $this->Productos->get($id, ['contain' => ['Categorias']]);
        $this->set('producto', $producto);
    }
    
    public function registrar() {
        $producto = $this->Productos->newEntity();
        if($this->request->is('post')){
            $producto = $this->Productos->patchEntity($producto, $this->request->data);
            
            if($this->request->data['imagen']['error'] == 0){
            
                $producto->imagen_nombre = $this->request->data['imagen']['name'];
                $producto->imagen_tipo = $this->request->data['imagen']['type'];
                $producto->imagen_tamanio = $this->request->data['imagen']['size'];

                // http://book.cakephp.org/3.0/en/core-libraries/file-folder.html
                new Folder(WWW_ROOT . 'catalogo', true, 0755); // Crea directorio dentro de WWW_ROOT (webroot)
                // Similar a mkdir('catalogo', 0777, true); 
                
                $imagen = new File($this->request->data['imagen']['tmp_name']); // Carga el archivo temporal para luego copiarlo en otra ruta
                $imagen->copy(WWW_ROOT . 'catalogo/'.$this->request->data['imagen']['name']);   
                // Similar a move_uploaded_file($this->request->data['imagen']['tmp_name'], 'catalogo/'.$this->request->data['imagen']['name']);
                
            }
            
            if( $this->Productos->save($producto) ) {
                $this->Flash->success('Registro guardado correctamente');
                $this->redirect(['action'=>'index']);
            } else {
                $this->Flash->error('Error al momento de guardar el registro');
            }
        }
        $this->set('producto', $producto);
        
        $query = $this->Categorias->find('list');
        $this->set('categorias', $query);
    }
    
    public function editar($id = null) {
        $producto = $this->Productos->get($id);
        if($this->request->is('put')){ // or post <form>
            $producto = $this->Productos->patchEntity($producto, $this->request->data);
            
            if($this->request->data['imagen']['error'] == 0){
                
                // Eliminar el anterior
                $imagen_anterior = new File(WWW_ROOT . 'catalogo/'.$producto->imagen_nombre);
                $imagen_anterior->delete(); // Similar a unlink('catalogo/'.$producto->imagen_nombre);
                
                $producto->imagen_nombre = $this->request->data['imagen']['name'];
                $producto->imagen_tipo = $this->request->data['imagen']['type'];
                $producto->imagen_tamanio = $this->request->data['imagen']['size'];
                
                new Folder(WWW_ROOT . 'catalogo', true, 0755); 
                $imagen = new File($this->request->data['imagen']['tmp_name']);
                $imagen->copy(WWW_ROOT . 'catalogo/'.$this->request->data['imagen']['name']);  
                
            }
            
            if( $this->Productos->save($producto) ) {
                $this->Flash->success('Registro guardado correctamente');
                $this->redirect(['action'=>'index']);
            } else {
                $this->Flash->error('Error al momento de guardar el registro');
            }
        }
        $this->set('producto', $producto);
        
        $query = $this->Categorias->find('list');
        $this->set('categorias', $query);
    }
    
    public function eliminar($id = null) {
        $producto = $this->Productos->get($id);
        
        // Eliminar imagen
        $imagen = new File(WWW_ROOT . 'catalogo/'.$producto->imagen_nombre);
        $imagen->delete();
        
        if( $this->Productos->delete($producto) ) {
            $this->Flash->success('Registro eliminado correctamente');
        } else {
            $this->Flash->error('Error al momento de eliminar el registro');
        }
        $this->redirect(['action'=>'index']);
    }
    
}
