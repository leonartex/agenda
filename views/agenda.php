<div class="container-fluid">
    <div id="conteudo">
        <?php if(isset($_GET['status']) && $_GET['status'] == "sucesso"){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Contato registrado com sucesso!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php }elseif(isset($_GET['status']) && $_GET['status'] == "erro"){ ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Erro ao registrar contato!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php } ?>
        <div class="itens row">
            <div class="itens-lista item-b col-md-6">
                <h2>Registrar contato</h2>
                <form action="<?=URL_BASE?>/adicionar/" method="post">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Inserir nome de contato">
                    </div>
                    <div class="form-group">
                        <label for="telefone">Telefone:</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Inserir telefone">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-9">
                            <label for="cidade">Cidade:</label>
                            <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Inserir nome da cidade">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="estado">Estado (UF):</label>
                            <select class="form-control" id="estado" name="estado">
                                <option>RS</option>
                                <option>SC</option>
                                <option>PR</option>
                                <option>SP</option>
                                <option>RJ</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="nome@email.com">
                    </div>
                    <div class="form-group">
                        <label for="info">Informações</label>
                        <textarea class="form-control" id="info" name="info"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="categoria">Categoria</label>
                        <select class="form-control" id="categoria" name="categoria">
                            <option>Cliente</option>
                            <option>Fornecedor</option>
                            <option>Funcionário</option>
                        </select>
                    </div>
                    <button type="submit" class="btn-item"><i class="fas fa-save"></i> Salvar</button>
                    <button type="reset" class="btn-item"><i class="fas fa-eraser"></i> Limpar</button>
                </form>
            </div>
            <div class="itens-lista item-b col-md-6">
                <h2>Últimos contatos registrados</h2>
                <span>Limite de 5</span>
                <div class="table-responsive">
                    <table id="lista" class="table">
                        <?php
                            foreach($pg->contatos as $contato){
                        ?>
                            <tr>
                                <td><?=$contato['nome']?></td>
                                <td><?=$contato['email']?></td>
                                <td><?=$contato['telefone']?></td>
                            </tr>
                        <?php
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>