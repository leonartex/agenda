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
                <h2>Alterar contato</h2>
                <form action="<?=URL_BASE?>/contato/gravar/" method="post">
                <input type="hidden" value="<?=$pg->contato[0]['id']?>" name='id'>
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Inserir nome de contato" value="<?=$pg->contato[0]['nome']?>">
                    </div>
                    <div class="form-group">
                        <label for="telefone">Telefone:</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Inserir telefone" value="<?=$pg->contato[0]['telefone']?>">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-9">
                            <label for="cidade">Cidade:</label>
                            <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Inserir nome da cidade" value="<?=$pg->contato[0]['cidade']?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="estado">Estado (UF):</label>
                            <select class="form-control" id="estado" name="estado">
                                <option <?php if($pg->contato[0]['estado'] == 'RS') echo 'selected'?>>RS</option>
                                <option <?php if($pg->contato[0]['estado'] == 'SC') echo 'selected'?>>SC</option>
                                <option <?php if($pg->contato[0]['estado'] == 'PR') echo 'selected'?>>PR</option>
                                <option <?php if($pg->contato[0]['estado'] == 'SP') echo 'selected'?>>SP</option>
                                <option <?php if($pg->contato[0]['estado'] == 'RJ') echo 'selected'?>>RJ</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="nome@email.com" value="<?=$pg->contato[0]['email']?>">
                    </div>
                    <div class="form-group">
                        <label for="info">Informações</label>
                        <textarea class="form-control" id="info" name="info"><?=$pg->contato[0]['info']?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="categoria">Categoria</label>
                        <select class="form-control" id="categoria" name="categoria">
                            <option <?php if($pg->contato[0]['categoria'] == 'Cliente') echo 'selected'?>>Cliente</option>
                            <option <?php if($pg->contato[0]['categoria'] == 'Fornecedor') echo 'selected'?>>Fornecedor</option>
                            <option <?php if($pg->contato[0]['categoria'] == 'Funcionário') echo 'selected'?>>Funcionário</option>
                        </select>
                    </div>
                    <button type="submit" class="btn-item"><i class="fas fa-save"></i> Salvar</button>
                    <a href="<?=URL_BASE?>/contatos/" class="btn-item"><i class="fas fa-eraser"></i> Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>