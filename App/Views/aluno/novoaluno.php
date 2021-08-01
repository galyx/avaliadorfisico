    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- Box de erro e sucesso -->
                    <?php if($Sessao::retornaMensagem()){ ?>
                        <div class="box box-info">
                            <div class="box-body">
                                <h3 class="box-title"><?php echo $Sessao::retornaMensagem(); ?></h3>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- END BOX -->
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Cadastrar Novo Aluno</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form action="http://<?php echo APP_HOST; ?>/aluno/salvaraluno" method="post" id="form_aluno" role="form" required>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="cpfaluno">CPF do Aluno</label>
                                    <input type="text" name="cpfaluno" class="form-control cpf" value="<?php echo $Sessao::retornaValorFormulario('cpfaluno'); ?>" data-inputmask="'mask': ['999.999.999-99']" data-mask placeholder="Digite o CPF se Possuir">
                                </div>
                                <div class="form-group">
                                    <label for="nomealuno">Nome do Aluno</label>
                                    <input type="text" name="nomealuno" class="form-control" value="<?php echo $Sessao::retornaValorFormulario('nomealuno'); ?>" placeholder="Digite o Nome do Aluno">
                                </div>
                                <div class="form-group">
                                    <label for="datanascimento">Data de Nascimento</label>
                                    <input type="text" name="datanascimento" class="form-control data" data-mask data-inputmask="'alias': 'dd/mm/yyyy'" value="<?php echo $Sessao::retornaValorFormulario('datanascimento'); ?>" placeholder="Data de Nascimento">
                                </div>
                                <div class="form-group">
                                    <label for="emailaluno">Email do Aluno</label>
                                    <input type="text" name="emailaluno" class="form-control" value="<?php echo $Sessao::retornaValorFormulario('emailaluno'); ?>" placeholder="Digite o Email do aluno (se possuir)">
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
    </div>