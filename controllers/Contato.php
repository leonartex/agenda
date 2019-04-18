<?php
class Contato{
    public function __construct(){
        include("models/Contato_modelo.php");
    }
    public function listar(){
        $pg = (object)[];
        $pg->view = 'contatos.php';
        $pg->titulo = 'Contatos';
        $pg->ajuda = "Veja sua lista de contatos e pesquise caso não o encontre.";

        $contato = new Contato_modelo();
        
        $pg->contatos = $contato->pegaTodos(); 
        require_once('views/layout.php');
    }

    public function cadastrar(){
        $pg = (object)[]; 
        $pg->view = 'agenda.php';
        $pg->titulo = 'Registrar contato';
        $pg->ajuda = "Registre os seus contatos e depois visualize-os.";

        $contato = new Contato_modelo();
        
        $pg->contatos = $contato->pegaTodos();
        require_once('views/layout.php');
    }

    public function gravar($nome, $telefone, $cidade, $estado, $email, $info, $categoria, $id = 0){
        $contato = new Contato_modelo();
        if($id == 0)
            $url = '/adicionar/';
        else
            $url = '/editar/'.$id;
        try{
            if($id == 0){
                $contato->insere($nome, $telefone, $cidade, $estado, $email, $info, $categoria);
            }else{
                $aux = $contato->pegaPorId($id);
                $contato->atualiza($id, $nome, $telefone, $cidade, $estado, $email, $info, $categoria);
            }
            header('Location: '.URL_BASE.$url.'?status=sucesso', 303);
        }catch(Exception $e){
            header('Location: '.URL_BASE.$url.'?status=erro&tipo=indef', 303);
        }        
    }

    public function editar($id){
        $pg = (object)[];
        $pg->view = 'editar.php';
        $pg->titulo = 'Editar contato';
        $pg->ajuda = "Edite os dados de seu contato!";

        $contato = new Contato_modelo();
        
        $pg->contato = $contato->pegaPorId($id);
        require_once('views/layout.php');
    }

    public function excluir($id){
        $contato = new Contato_modelo();
        $contato->delete($id);
    }
}