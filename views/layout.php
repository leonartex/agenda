<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <title><?=$pg->titulo?> - Agenda</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="<?=URL_BASE?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=URL_BASE?>/css/estilo.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>

<body>
    <header class="fixed-top">
    <nav id="superior" class="navbar navbar-expand-md">
        <div class="container-fluid">
            <div class="navbar-header d-flex justify-content-start">
                <button title="Alternar menu lateral" id="colapsa" class="colapsa border" type="button" data-toggle="collapse" data-target="#lateral" aria-expanded="true" aria-controls="lateral">
                    <span class="sr-only">Alternar menu lateral</span>
                    <i class="fas fa-bars" style="font-size: 28px;"></i>
                </button>
            </div>
            <div class="d-inline-flex justify-content-center">
                <h1 style="text-align: center;"><a href="<?=URL_BASE?>">Agenda</a></h1>
            </div>
            <div class="d-flex justify-content-end">
                <ul class="nav navbar-nav">                    
                    <li class="desaparece-2"><a href="<?=URL_BASE?>/contatos/">Contatos</a></li>
                </ul>
            </div>
        </div>
    </nav>
    </header>
    <div class="wrapper">
        <div>
            <nav id="lateral" class="sidebar collapse sticky-top">
                <div class="gambiarra">
                    <p><?=$pg->ajuda?></p>
                </div>
                <ul id="navegacao" class="list-unstyled components">
                    <li <?php if($pg->view == 'agenda.php') echo 'class="active"';?>><a href="<?= URL_BASE ?>/">Início</a></li>
                    <li <?php if($pg->view == 'contatos.php') echo 'class="active"';?>><a href="<?= URL_BASE ?>/contatos/">Contatos</a></li>
                </ul>
            </nav>
        </div>
        <main id="principal" class="container-fluid">
            <?php require_once($pg->view) ?>
        </main>
    </div>
    
    <script src="<?=URL_BASE?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?=URL_BASE?>/js/bootstrap.min.js"></script>    
    <script src="<?=URL_BASE?>/js/sidebar.js"></script>
</body>

</html>