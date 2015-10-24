<?php
namespace App\Controller;

use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;

class DemoController extends AppController{
    
    public function index($name = 'guest') { // http://localhost/cakephp/portal/index/erick
        echo '$this->request->params["name"]: ' . $this->request->params['name'];
        //echo $this->request->query['name'];
        $this->request->data('MyModel.title');
        $this->request->data['title'];
//        $request->webroot;
//        $this->request->is('post');
        echo "Hello $name";
        
//        http://book.cakephp.org/3.0/en/controllers/request-response.html

        // use Cake\Datasource\ConnectionManager;
        $connection = ConnectionManager::get('default');
        $results = $connection->execute('SELECT * FROM usuarios')->fetchAll('assoc');
        var_dump($results);
        $results = $connection->execute('SELECT * FROM usuarios WHERE id=:id', ['id' => 1])->fetchAll('assoc');
        var_dump($results);
        
        $stmt = $connection->execute('SELECT * FROM usuarios');
        $rowCount = $stmt->rowCount();
        echo "Registros: $rowCount";
        
        // http://book.cakephp.org/3.0/en/orm/database-basics.html#running-select-statements
        
        $results = $connection->query('SELECT * FROM usuarios WHERE id=2')->fetchAll('assoc');
        var_dump($results);
        
//        use Cake\ORM\TableRegistry;
        $productos = TableRegistry::get('Productos');

        $query = $productos->find();
        
        foreach ($query as $article) {
            var_dump($article->nombre);
        }
        
        http://book.cakephp.org/3.0/en/orm/query-builder.html
        
//        $connection->begin();
//        
//        $connection->commit();
        
        $this->autoRender = false;
        
//        $this->redirect('/orders/thanks');
        // Render the element in src/Template/Element/ajaxreturn.ctp
//        $this->render('/Element/ajaxreturn');
    }
    
}
