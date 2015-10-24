<!DOCTYPE html>
<html>
<head>
    <title><?= $this->fetch('title') ?></title>
    
    <?= $this->Html->charset() ?>
    <?= $this->Html->meta('icon') ?>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google fonts -->
    <link href='https://fonts.googleapis.com/css?family=Noto+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>

    <!-- jQuery -->
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" rel="stylesheet">
    <script src="//code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
    <?= $this->Html->css('base.css') ?>

    <!-- My custom style -->
    <?= $this->Html->css('style.css') ?>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    
    <header>
        <div class="container-fluid">
            <div class="logo-header"><img src="/cakephp/img/logo.png" height="60" alt="Tecsup"/></div>
            <div class="toolbar-profile">Bienvenido <?=$this->request->session()->read('Auth.User.nombres')?></div>
        </div>
    </header>
    
    <nav class="navbar navbar-default">
        <div class="container-fluid">

            <!-- Menu btn -->
            <div class="navbar-header">
                <div class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-menu-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </div>
                <?=$this->Html->link('Tecsup', '/', ['class' => 'navbar-brand'])?>
            </div>

            <!-- Menu options -->
            <div class="collapse navbar-collapse" id="bs-menu-navbar-collapse-1">

                <ul class="nav navbar-nav">
                    <li><a href="/cakephp/roles/">Roles</a></li>
                    <li><?=$this->Html->link('Usuarios', ['controller' => 'usuarios'])?></li>
                    <li><?=$this->Html->link('Categorias', ['controller' => 'categorias'])?></li>
                    <li><?=$this->Html->link('Productos', ['controller' => 'productos'])?></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><?=$this->Html->link('Salir', ['controller' => 'usuarios', 'action' => 'logout'])?></li>
                </ul>

            </div>
        </div>
    </nav>

    <?= $this->Flash->render() ?><!-- Mensajes desde los controladores -->
    
    <section class="container-fluid clearfix">
        <?= $this->fetch('content') ?><!-- contenido de las plantillas de cada accion -->
    </section>
    
    <footer>
        <div class="container-fluid">
            <div class="text-footer">Todos los Derechos Reservados © <?php echo date('Y')?></div>
        </div>
    </footer>
    
</body>
</html>
