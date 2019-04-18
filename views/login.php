<div class="container-fluid">
    <div id="conteudo" class="itens row">
            <div class="itens-lista item-b col-md-6">
                <h2>Entrar</h2>
                <form action="<?=URL_BASE?>/usuario/logar/" method="post">
                    <div class="form-group">
                        <label for="emailLog">Endereço de email</label>
                        <input type="email" class="form-control" id="emailLog" name="email" placeholder="Inserir seu email" value="<?php if(isset($_GET['emailLog'])) echo $_GET['emailLog'];?>">
                    </div>
                    <div class="form-group">
                        <label for="senhaLog">Senha</label>
                        <input type="password" class="form-control" id="senhaLog" name="senha" placeholder="Inserir sua senha">
                    </div>
                    <button type="submit" class="btn-item">Entrar</button>
                </form>
            </div>
            <div class="itens-lista item-p col-md-6">
                <h2>Cadastre-se</h2>
                <form action="<?=URL_BASE?>/usuario/gravar/" method="post">
                    <div class="form-group">
                        <label for="emailCad">Endereço de email</label>
                        <input type="email" class="form-control" id="emailCad" name="email" aria-describedby="ajudaEmail" placeholder="exemplo@email.com" value="<?php if(isset($_GET['emailCad'])) echo $_GET['emailCad'];?>">
                        <small id="ajudaEmail" class="form-text text-muted">Nós nunca iremos compartilhar seus dados com terceiros.</small>
                    </div>
                    <div class="form-group">
                        <label for="senhaCad">Senha</label>
                        <input type="password" class="form-control" id="senhaCad" name="senha" placeholder="Inserir senha">
                    </div>
                    <div class="form-group">
                        <label for="confirmaSenha">Confirmar senha</label>
                        <input type="password" class="form-control" id="confirmaSenha" name="confirmaSenha" placeholder="Inserir senha novamente">
                    </div>
                    <button type="submit" class="btn-item">Cadastrar</button>
                </form>
            </div>
    </div>
</div>