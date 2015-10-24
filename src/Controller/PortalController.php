<?php
namespace App\Controller;

class PortalController extends AuthController{
    
    public function index() {
        $usuario = $this->Auth->user();
        $this->set('usuario', $usuario);
    }
    
}
