<?php
class Usuario_modelo{
    public $id;
    public $email;
    public $senha;

    public function __construct(){
        include("libs/DB.php");
    }

    public function pegaTodos(){
        $db = conexao();
        $usuarios = $db->select('usuarios', '*');
        return $usuarios;
    }

    public function pegaPorId($id){
        $db = conexao();
        $usuario = $db->select('usuarios', '*',['id' => $id]);
        return $usuario;
    }

    public function pegaPorEmail($email){
        $db = conexao();
        if($db->count('usuarios', ['email' => $email]) != 0){
            return $db->select('usuarios', '*',['email' => $email]);
        }else{
            return null;
        }
    }

    public function insere($email, $senha){
        $db = conexao();

        if($db->count('usuarios', ['email' => $email]) == 0){
            $db->insert('usuarios', [
                'email' => $email,
                'senha' => $senha
            ]);
        }else{
            throw new EmailException($e);
        }
    }

    public function atualiza($id, $email, $senha){
        $db = conexao();

        $db->update('usuarios', [
            'email' => $email,
            'senha' => $senha
        ],[
            'id' => $id
        ]);
    }

    public function delete($id){
        $db = conexao();

        $db->delete('usuarios', [
            'id' => $id
        ]);
    }
}