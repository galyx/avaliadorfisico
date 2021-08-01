<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <h1>Buscar Alunos Cadastrados</h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Pesquisar aluno</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <form action="http://<?php echo APP_HOST; ?>/aluno/selecionaraluno" method="get" class="form-inline">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Total por página:</label>
                                        <select name="totalPorPagina" id="totalPorPagina" class="form-control" onchange="this.form.submit()">
                                            <option value="5" <?php echo ($viewVar['totalPorPagina'] == "5")? "selected" : ""; ?>>5</option>
                                            <option value="15" <?php echo ($viewVar['totalPorPagina'] == "15")? "selected" : ""; ?>>15</option>
                                            <option value="30" <?php echo ($viewVar['totalPorPagina'] == "30")? "selected" : ""; ?>>30</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group pull-right">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">
                                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                            </span>
                                            <input type="text" placeholder="Buscar conteúdo" required value="<?php echo $viewVar['buscarAluno']; ?>" class="form-control" name="buscarAluno" />

                                            <div class="input-group-btn">
                                                <button class="btn btn-success" type="submit">Buscar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box-off -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h2 class="box-title">Dados do Aluno</h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php if($Sessao::retornaMensagem()){ ?>
                            <div class="alert alert-warning" role="alert">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo $Sessao::retornaMensagem(); ?>
                            </div>
                        <?php } ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <td class="info">Codigo</td>
                                    <td class="info">CPF</td>
                                    <td class="info">Nome</td>
                                    <td class="info">Email</td>
                                    <td class="info">Data de Nascimento</td>
                                    <td class="info">Data Cadastrada</td>
                                </tr>
                                <?php
                                    foreach($viewVar['listaAlunos'] as $aluno) {
                                ?>
                                    <div class="box-group" id="accordion">
                                        <tr data-toggle="collapse" data-parent="#accordion" href="#<?php echo $aluno->getCodigoAluno(); ?>">
                                            <td><?php echo $aluno->getCodigoAluno(); ?></td>
                                            <td><?php echo $aluno->getCpfAluno(); ?></td>
                                            <td><?php echo $aluno->getNomeAluno(); ?></td>
                                            <td><?php echo $aluno->getEmailAluno(); ?></td>
                                            <td><?php echo date("d/m/Y", strtotime(str_replace("-","/",$aluno->getDataNascimento()))); ?></td>
                                            <td><?php echo date("d/m/Y H:i:s", strtotime(str_replace("-","/",$aluno->getDataCadastro()))); ?></td>
                                        </tr>
                                        <tr id="<?php echo $aluno->getCodigoAluno(); ?>" class="panel-collapse collapse">
                                            <td  colspan="6">
                                                <a href="http://<?php echo APP_HOST; ?>/aluno/novaficha?codigoAluno=<?php echo $aluno->getCodigoAluno(); ?>" class="btn btn-app"><i class="fa fa-file-o"></i>Nova Ficha</a>
                                                <a href="http://<?php echo APP_HOST; ?>/aluno/selecionarficha?codigoAluno=<?php echo $aluno->getCodigoAluno(); ?>" class="btn btn-app"><i class="fa fa-file-text-o"></i> Abrir Ficha</a>
                                                <a href="http://<?php echo APP_HOST; ?>/aluno/editaraluno?codigoAluno=<?php echo $aluno->getCodigoAluno(); ?>" class="btn btn-app"><i class="fa fa-edit"></i> Alterar Cadastro</a>
                                            </td>
                                        </tr>
                                    </div>
                                <?php
                                    }
                                ?>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <?php echo $viewVar['paginacao']; ?>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>