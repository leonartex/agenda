<?php
    DEFINE("HOST_NAME", $_SERVER['SERVER_NAME']);
    DEFINE("URI_BASE", "localhost/agenda");
    if(isset($_SERVER['HTTPS'])) {
        if ($_SERVER['HTTPS'] == "on") {
            DEFINE("PROTOCOL", 'https');
        }else{
            DEFINE("PROTOCOL", 'http');
        }
    }else{
        DEFINE("PROTOCOL", 'http');
    }
    DEFINE("URL_BASE", PROTOCOL . '://' . URI_BASE);

    require_once("libs/AltoRouter.php");
    require_once("libs/Medoo.php");
    use Medoo\Medoo;

    $router = new AltoRouter();
    //$router->setBasePath('');
    $router->setBasePath('agenda/');

    $router->map( 'GET', '/', function() {
        $pg = (object)[]; 
        $pg->view = 'agenda.php';
        $pg->titulo = 'Registrar contato';
        $pg->ajuda = "Registre os seus contatos e depois visualize-os.";

        $db = new Medoo([
            'database_type' => 'mysql',
            'database_name' => 'agenda',
            'server' => 'localhost',
            'username' => 'root',
            'password' => ''
        ]);

        $pg->contatos = $db->select('contatos', '*',['LIMIT' => 5]);
        require_once('views/layout.php');
    });

    $router->map( 'POST', '/adicionar/', function() {
        try{
            $db = new Medoo([
                'database_type' => 'mysql',
                'database_name' => 'agenda',
                'server' => 'localhost',
                'username' => 'root',
                'password' => ''
            ]);

            $db->insert('contatos', [
                'nome' => $_POST['nome'],
                'telefone' => $_POST['telefone'],
                'cidade' => $_POST['cidade'],
                'estado' => $_POST['estado'],
                'email' => $_POST['email'],
                'info' => $_POST['info'],
                'categoria' => $_POST['categoria']
            ]);

            header('Location: ' . URL_BASE.'/?status=sucesso', 301);
        die();
        }catch(Exception $e){
            header('Location: ' . URL_BASE.'/?status=erro', 301);
        }
    });

    $router->map( 'GET', '/excluir/[i:id]/', function($id) {
        try{
            $db = new Medoo([
                'database_type' => 'mysql',
                'database_name' => 'agenda',
                'server' => 'localhost',
                'username' => 'root',
                'password' => ''
            ]);

            $db->delete('contatos', [
                'id' => $id
            ]);

            header('Location: ' . URL_BASE.'/contatos/?status=sucesso', 301);
        die();
        }catch(Exception $e){
            header('Location: ' . URL_BASE.'/contatos/?status=erro', 301);
        }
    });

    $router->map( 'GET', '/editar/[i:id]/', function($id) {
        $pg = (object)[];
        $pg->view = 'editar.php';
        $pg->titulo = 'Editar contato';
        $pg->ajuda = "Edite os dados de seu contato!";

        $db = new Medoo([
            'database_type' => 'mysql',
            'database_name' => 'agenda',
            'server' => 'localhost',
            'username' => 'root',
            'password' => ''
        ]);

        $contato = $db->select('contatos', '*', [
            'id' => $id
        ]);
        require_once('views/layout.php');
    });

    $router->map( 'POST', '/altera/', function() {
        try{
            $db = new Medoo([
                'database_type' => 'mysql',
                'database_name' => 'agenda',
                'server' => 'localhost',
                'username' => 'root',
                'password' => ''
            ]);

            $db->update('contatos', [
                'nome' => $_POST['nome'],
                'telefone' => $_POST['telefone'],
                'cidade' => $_POST['cidade'],
                'estado' => $_POST['estado'],
                'email' => $_POST['email'],
                'info' => $_POST['info'],
                'categoria' => $_POST['categoria']
            ],[
                'id' => $_POST['id']
            ]);
            header('Location: ' . URL_BASE.'/editar/'.$_POST['id'].'/?status=sucesso', 301);
            die();
        }catch(Exception $e){
            header('Location: ' . URL_BASE.'/editar/'.$_POST['id'].'/?status=erro', 301);
            die();
        }
    });

    $router->map( 'GET', '/contatos/', function() {
        $pg = (object)[];
        $pg->view = 'contatos.php';
        $pg->titulo = 'Contatos';
        $pg->ajuda = "Veja sua lista de contatos e pesquise caso não o encontre.";

        $db = new Medoo([
            'database_type' => 'mysql',
            'database_name' => 'agenda',
            'server' => 'localhost',
            'username' => 'root',
            'password' => ''
        ]);

        $pg->contatos = $db->select('contatos', '*');
        require_once('views/layout.php');
    });

    $match = $router->match();
    
    if( $match && is_callable( $match['target'] ) ) {
        call_user_func_array( $match['target'], $match['params'] ); 
    } else {
        require_once('views/404.html');
    }

