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
        //$contatos = $db->select('contatos', '*',['LIMIT' => 5, 'ORDER' => ['id' => 'DESC']]);
        $contatos = $db->select('contatos', '*',['ORDER' => 'nome']);
        return $contatos;
    }

    public function pegaPorId($id){
        $db = conexao();
        $contatos = $db->select('contatos', '*',['id' => $id]);
        return $contatos;
    }

    public function insere($nome, $telefone, $cidade, $estado, $email, $info, $categoria){
        $db = conexao();

        $db->insert('contatos', [
            'nome' => $nome,
            'telefone' => $telefone,
            'cidade' => $cidade,
            'estado' => $estado,
            'email' => $email,
            'info' => $info,
            'categoria' => $categoria
        ]);
    }

    public function atualiza($id, $nome, $telefone, $cidade, $estado, $email, $info, $categoria){
        $db = conexao();

        $db->update('contatos', [
            'nome' => $nome,
            'telefone' => $telefone,
            'cidade' => $cidade,
            'estado' => $estado,
            'email' => $email,
            'info' => $info,
            'categoria' => $categoria
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