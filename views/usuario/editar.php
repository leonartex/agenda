<div class="container-fluid">
    <div id="conteudo">
        <?php if(isset($_GET['status']) && $_GET['status'] == "sucesso"){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Contato alterado com sucesso!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php }elseif(isset($_GET['status']) && $_GET['status'] == "erro"){ ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Erro ao alterar contato!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php } ?>
        <div class="itens row">
            <div class="itens-lista item-b col-md-6">
                <h2>Editar conta</h2>
                <form action="<?=URL_BASE?>/usuario/gravar/" method="post">
                <input type="hidden" value="<?=$pg->usuario[0]['id']?>" name='id'>
                    <div class="form-group">
                        <label for="email">Endereço de email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="exemplo@email.com" value="<?=$pg->usuario[0]['email']?>">                        
                    </div>
                    <div class="form-group">
                        <label for="senhaAtual">Senha atual</label>
                        <input type="password" class="form-control" id="senhaAtual" name="senhaAtual" placeholder="Inserir sua senha atual">
                    </div>
                    <div class="form-group">
                        <label for="senhaCad">Nova senha</label>
                        <input type="password" class="form-control" id="senhaCad" name="senha" placeholder="Inserir sua nova senha">
                    </div>
                    <div class="form-group">
                        <label for="confirmaSenha">Confirmar nova senha</label>
                        <input type="password" class="form-control" id="confirmaSenha" name="confirmaSenha" placeholder="Inserir sua nova senha novamente">
                    </div>
                    <button type="submit" class="btn-item"><i class="fas fa-save"></i> Salvar</button>
                    <a href="<?=URL_BASE?>/contatos/" class="btn-item"><i class="fas fa-eraser"></i> Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>