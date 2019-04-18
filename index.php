<?php
    require_once("controllers/Login.php");
    require_once("libs/constantes.php");
    require_once("exceptions/UsuarioExceptions.php");

    require_once("libs/AltoRouter.php");

    $router = new AltoRouter();
    //$router->setBasePath('');
    $router->setBasePath('agenda/');

    $router->map( 'GET', '/', function() {
        if(!verificaSessao()){
            header('Location: '.URL_BASE.'/login/?status=erro&tipo=requerlogin', 303);
        }
        include("controllers/Contato.php");
        $contato = new Contato();
        $contato->listar();
    });

    $router->map( 'GET', '/adicionar/', function() {
        if(!verificaSessao()){
            header('Location: '.URL_BASE.'/login/?status=erro&tipo=requerlogin', 303);
        }
        include("controllers/Contato.php");
        $contato = new Contato();
        $contato->cadastrar();
    });

    $router->map( 'POST', '/contato/gravar/', function() {
        if(!verificaSessao()){
            header('Location: '.URL_BASE.'/login/?status=erro&tipo=requerlogin', 303);
        }
        include("controllers/Contato.php");
        $contato = new Contato();
        if(!isset($_POST['id']))
            $contato->gravar($_POST['nome'], $_POST['telefone'], $_POST['cidade'], $_POST['estado'], $_POST['email'], $_POST['info'], $_POST['categoria']);
        else
            $contato->gravar($_POST['nome'], $_POST['telefone'], $_POST['cidade'], $_POST['estado'], $_POST['email'], $_POST['info'], $_POST['categoria'], $_POST['id']);
    });

    $router->map( 'GET', '/contato/excluir/[i:id]/', function($id) {
        if(!verificaSessao()){
            header('Location: '.URL_BASE.'/login/?status=erro&tipo=requerlogin', 303);
        }
        try{
            include("controllers/Contato.php");
            $contato = new Contato();
            $contato->excluir($id);

            header('Location: ' . URL_BASE.'/?status=sucesso', 301);
        die();
        }catch(Exception $e){
            header('Location: ' . URL_BASE.'/?status=erro', 301);
        }
    });

    $router->map( 'GET', '/editar/[i:id]/', function($id) {
        if(!verificaSessao()){
            header('Location: '.URL_BASE.'/login/?status=erro&tipo=requerlogin', 303);
        }
        if(!verificaSessao()){
            header('Location: '.URL_BASE.'/login/?status=erro&tipo=requerlogin', 303);
        }
        include("controllers/Contato.php");
        $contato = new Contato();
        $contato->editar($id);
    });

    /**
     * Rotas para usuário
     */

    $router->map( 'GET', '/login/', function() {
        include("controllers/Usuario.php");
        $usuario = new Usuario();
        $usuario->cadastro();
    });    

    $router->map( 'GET', '/conta/', function() {
        if(!verificaSessao()){
            header('Location: '.URL_BASE.'/login/?status=erro&tipo=requerlogin', 303);
        }
        include("controllers/Usuario.php");
        $usuario = new Usuario();
        $usuario->editar($_SESSION['id']);
    });

    $router->map( 'POST', '/usuario/gravar/', function() {
        include("controllers/Usuario.php");
        $usuario = new Usuario();
        if(!isset($_POST['id']))
            $usuario->gravar($_POST['email'], $_POST['senha'], $_POST['confirmaSenha']);
        else
            $usuario->gravar($_POST['email'], $_POST['senha'], $_POST['confirmaSenha'], $_POST['senhaAtual'], $_POST['id']);
    });

    $router->map( 'POST', '/usuario/logar/', function() {
        include("controllers/Usuario.php");
        $usuario = new Usuario();
        $usuario->logar($_POST['email'], $_POST['senha']);
    });

    $router->map( 'GET', '/logout/', function() {
        include("controllers/Usuario.php");
        $usuario = new Usuario();
        $usuario->logout();
    });

    $match = $router->match();
    
    if( $match && is_callable( $match['target'] ) ) {
        call_user_func_array( $match['target'], $match['params'] ); 
    } else {
        require_once('views/404.html');
    }