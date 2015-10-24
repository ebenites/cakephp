<?php
namespace App\Controller;

use Cake\Mailer\Email;

class CorreoController  extends AppController{
    
    public function smtp() {
        
        $email = new Email('default');
        $email->from(['tienda@tecsup.edu.pe' => 'Tienda Online'])
            ->to('erick.benites@gmail.com')
            ->subject('Correo desde CakePHP 3')
            ->send('Contenido del correo ...');
        
        echo 'Correo enviado';
        $this->autoRender = false;
        
    }
    
    public function gmail() {
        
        $email = new Email('gmail-profile');
            $email->emailFormat('html') // html, text o both
            ->template('compra', 'default') // template(<template>, <layout>)
            ->viewVars([
                'nombres' => 'Erick Benites', 
                'producto' => 'CakePHPCookbook'
                ]) // inyección de variables al template
            ->to('erick.benites@gmail.com')
            ->subject('Correo desde CakePHP 3 con Gmail')
            ->attachments([
                'CakePHPCookbook.pdf' => WWW_ROOT . 'CakePHPCookbook.pdf',
                'photo.png' => [
                    'file' => WWW_ROOT . 'img/logo.png',
                    'mimetype' => 'image/png',
                    'contentId' => 'logo-id'
                ]
            ])
            ->send("Contenido adicional ... \n ...");
        
        echo 'Correo enviado';
        $this->autoRender = false;
        
    }
    
}
