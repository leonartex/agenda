<?php
class Contato_modelo{
    public $id;
    public $nome;
    public $telefone;
    public $cidade;
    public $estado;
    public $email;
    public $info;
    public $categoria;

    public function __construct(){
        include("libs/DB.php");
    }

    public function pegaTodos(){
        $db = conexao();
        return $db->select('contatos', '*',['usuario' => $_SESSION['id']],['ORDER' => 'nome']);
    }

    public function pegaPorId($id){
        $db = conexao();
        if($db->count('contatos', ['id' => $id, 'usuario' => $_SESSION['id']]) != 0)
            return $db->select('contatos', '*',['id' => $id, 'usuario' => $_SESSION['id']]);
        else   
            header('Location: '.URL_BASE.'?status=erro&tipo=acessoNegado', 303);
    }

    public function insere($nome, $telefone, $cidade, $estado, $email, $info, $categoria, $usuario){
        $db = conexao();

        $db->insert('contatos', [
            'nome' => $nome,
            'telefone' => $telefone,
            'cidade' => $cidade,
            'estado' => $estado,
            'email' => $email,
            'info' => $info,
            'categoria' => $categoria,
            'usuario' => $usuario
        ]);
    }

    public function atualiza($id, $nome, $telefone, $cidade, $estado, $email, $info, $categoria, $usuario){
        $db = conexao();
        
        $db->update('contatos', [
            'nome' => $nome,
            'telefone' => $telefone,
            'cidade' => $cidade,
            'estado' => $estado,
            'email' => $email,
            'info' => $info,
            'categoria' => $categoria,
            'usuario' => $usuario
        ],[
            'id' => $id
        ]);
    }

    public function delete($id){
        $db = conexao();

        $db->delete('contatos', [
            'id' => $id
        ]);
    }
}