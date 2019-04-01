<div class="container-fluid">
    <div id="conteudo">
        <?php if(isset($_GET['status']) && $_GET['status'] == "sucesso"){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Contato excluído com sucesso!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php }elseif(isset($_GET['status']) && $_GET['status'] == "erro"){ ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Erro ao excluir contato!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php } ?>
        <div class="itens row">
            <div class="itens-lista item-b col-md-7">
                <h2>Contatos</h2>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-search"></i></div>
                    </div>
                    <input type="text" class="form-control" id="pesquisar" placeholder="Pesquisar" onkeyup="pesquisa()">
                </div>
                <div class="table-responsive">
                    <table id="lista" class="table">
                        <?php
                            foreach($pg->contatos as $contato){
                        ?>
                            <tr>
                                <td><?=$contato['nome']?></td>
                                <td><?=$contato['email']?></td>
                                <td><?=$contato['telefone']?></td>
                                <td><button class="btn-item" onclick="mostrarContato(<?php echo "'".implode("', '", $contato)."'"; ?>)"><i class="fas fa-eye"></i><span class="sr-only">Mostrar <?=$contato['nome']?></span></button>
                            </tr>
                        <?php
                            }
                        ?>
                    </table>
                </div>
            </div>
            <div class="itens-lista item-b col-md-5" id="contato">
                <h2>Expandir contato</h2>
            </div>
        </div>
    </div>
</div>
<script>
    function pesquisa(){
        valor = $('#pesquisar').val().toLowerCase();
        $("#lista tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(valor) > -1)
        });

    }

    function deletar(id, nome){
        if(confirm('Deseja deletar '+nome+'?')){
            window.location.replace('<?=URL_BASE?>/excluir/'+id)
        }
    }

    function mostrarContato(id, nome, telefone, cidade, estado, email, info, categoria){                             
        conteudo = '<h2>'+nome+'</h2>'+
        '<span>'+email+'</span>'+
        '<div class="row">'+
        '   <div class="col-md-3">Id: '+id+'</div>'+
        '   <div class="col-md-9">Categoria: '+categoria+'</div>'+
        '</div>'+
        '<div>Telefone: '+telefone+'</div>'+
        '<div>Cidade: '+cidade+', '+estado+'</div>'+
        '<div>'+
        '    Informações: <p>'+info+
        '</p></div>'+
        '<div>'+
        '    <a class="btn-item" href="<?=URL_BASE?>/editar/'+id+'"><i class="fas fa-edit"></i> Editar<span class="sr-only">'+nome+'</span></a>'+
        "    <button class='btn-item' onclick='deletar("+id+', "'+nome+'");'+"'><i class='fas fa-trash'></i> Excluir</button>"+
        '</div>';
        $('#contato').html(conteudo);
    }
</script>