<?php
class Usuario{
    public function __construct(){
        include("models/Usuario_modelo.php");
    }

    public function cadastro(){
        $pg = (object)[];
        $pg->view = 'login.php';
        $pg->titulo = 'Entrar';
        $pg->ajuda = "Crie a sua conta se você ainda não a fez!";

        $usuario = new Usuario_modelo();
        
        require_once('views/layout.php');
    }

    public function gravar($email, $senha, $confirmaSenha, $senhaAtual, $id = 0){
        $usuario = new Usuario_modelo();
        if($id == 0)
            $url = '/login/';
        else
            $url = '/conta/';
        try{
            if($senha == $confirmaSenha){
                if($id == 0){
                    $usuario->insere($email, $senha);
                }else{
                    $aux = $usuario->pegaPorId($id);
                    if($senhaAtual == $aux[0]['senha']){
                        $usuario->atualiza($id, $email, $senha);
                    }else{
                        throw new senhaAtualException($e);
                    }
                }
                header('Location: '.URL_BASE.$url.'?status=sucesso', 303);
            }else{
                throw new ConfirmaSenhaException($e);
            }
        }catch(ConfirmaSenhaException $e){
            header('Location: '.URL_BASE.$url.'?status=erro&tipo=confirma&email='.$_POST['email'], 303);
        }catch(senhaAtualException $e){
            header('Location: '.URL_BASE.$url.'?status=erro&tipo=senha&email='.$_POST['email'], 303);
        }catch(EmailException $e){
            header('Location: '.URL_BASE.$url.'?status=erro&tipo=email&email='.$_POST['email'], 303);
        }catch(Exception $e){
            header('Location: '.URL_BASE.$url.'?status=erro&tipo=indef', 303);
        }        
    }

    public function editar($id){
        $pg = (object)[];
        $pg->view = 'usuario/editar.php';
        $pg->titulo = 'Sua conta';
        $pg->ajuda = "Edite os dados da sua conta.";

        $usuario = new Usuario_modelo();
        
        $pg->usuario = $usuario->pegaPorId($id);
        require_once('views/layout.php');
    }

    public function logar($email, $senha){
        $usuario = new Usuario_modelo();
        $aux = $usuario->pegaPorEmail($email);
        if(null !== $usuario->pegaPorEmail($email) && $aux[0]['senha'] == $senha){
            session_regenerate_id();            
            $_SESSION['email'] = $aux[0]['email'];
            $_SESSION['id'] = $aux[0]['id'];
            header('Location: '.URL_BASE.'/', 303);
        }else{
            header('Location: '.URL_BASE.'/login/?status=erro&tipo=login&emailLog='.$email, 303);
        }
    }

    public function logout(){
        session_destroy();
        header('Location: '.URL_BASE.'?status=sucesso&tipo=deslogado', 303);
    }

}