<?php
namespace App\Controller;

use Cake\Event\Event;

abstract class AuthController extends AppController{
    
//  http://book.cakephp.org/3.0/en/controllers/components/authentication.html
    public function initialize(){
        parent::initialize();
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'userModel' => 'Usuarios',
                    'fields' => ['username' => 'username', 'password' => 'password'],
                    'passwordHasher' => [
                        'className' => 'Plain'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Usuarios',
                'action' => 'login'
            ],
            'authError' => 'No tienes permiso de acceder',
            'loginRedirect' => [
                'controller' => 'Portal',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Usuarios',
                'action' => 'login'
            ]
        ]);
    }

    public function beforeFilter(Event $event){
        parent::beforeFilter($event);
//        $this->Auth->allow(['index', 'view', 'display']);
    }
    
}
