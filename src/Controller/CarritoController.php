<?php
namespace App\Controller;

use Cake\Mailer\Email;

class CarritoController extends AppController{
    
    public function initialize() {
        parent::initialize();
        $this->loadModel('Productos');
    }
    
    public function index() {
        $productos = $this->Productos->find()->contain('Categorias');
        $this->set('productos', $productos);
    }
    
    public function listar() {
        $carrito = $this->request->session()->read('carrito');
        if(!$carrito) $carrito = array();
        
        $this->set('carrito', $carrito);
    }
    
    public function seleccionar($id) {
        $carrito = $this->request->session()->read('carrito');
        if(!$carrito) $carrito = array();
        
        $producto = $this->Productos->get($id, ['contain' => 'Categorias']);
        $carrito[$id] = $producto;
        
        $this->request->session()->write('carrito', $carrito);
        
        $this->Flash->success('Producto añadido al carrito');
        $this->redirect(['action'=>'listar']);
    }
    
    public function retirar($id) {
        $carrito = $this->request->session()->read('carrito');
        if(!$carrito) $carrito = array();
        
        unset($carrito[$id]);
        
        $this->request->session()->write('carrito', $carrito);
        
        $this->Flash->success('Producto retirado del carrito');
        $this->redirect(['action'=>'listar']);
    }
    
    public function comprar() {
        if($this->request->is('post')){
            $carrito = $this->request->session()->read('carrito');
            if(!$carrito) $carrito = array();

            $nombres = $this->request->data('nombres');
            $correo = $this->request->data('correo');

            $email = new Email('default'); // Seleccionar el profile a usar
            $email->emailFormat('html') 
                ->template('pedido') // Template/Email/html/pedido.ctp
                ->viewVars([  // inyección de variables al template
                    'nombres' => $nombres, 
                    'carrito' => $carrito
                ]) 
                ->from(['tienda@tecsup.edu.pe' => 'Tienda Online'])
                ->to($correo)
                ->cc('ebenites@tecsup.edu.pe')
                ->subject('Agradecemos su pedido')
                ->send();

            // Eliminar la sesion y los datos del carrito
            $this->request->session()->destroy();

            $this->Flash->success('Su pedido está siendo procesado. ¡Muchas gracias!');
            $this->redirect(['action'=>'index']);
        }
    }
        
}
