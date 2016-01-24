<div class="row">

    <div class="col-md-12">
        <?php echo $this->session->flashdata('msg'); ?>
        <?php echo (isset($msg) && $msg != '') ? $msg : ''; ?>


        <div class="box">

            <div class="box-title">
                <h3><i class="fa fa-bars"></i>Cadastro de novo Usuário</h3>

                <div class="box-tool">
                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
                </div>
            </div>

            <div class="box-content">


                <form class="form-horizontal" name="addcontrato" id="addcontrato"
                      action="<?php echo site_url('usuarios/create'); ?>"
                      method="post" data-toggle="validator" role="form"
                    >

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Nome:</label>

                        <div class="col-sm-8 col-lg-4 controls">
                            <input type='text' name="nome" class="form-control" required/>
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('nome'); ?>
                        </div>
                    </div>
                    <div class="form-group">

                        <label class="col-sm-3 col-lg-2 control-label">Email:</label>

                        <div class="col-sm-8 col-lg-4 controls">
                            <input id='email' type='email' name="email" class="form-control" required/>
                            <div class="help-inline" id="email_message"></div>
                            <?php echo form_error('email'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Grupo de Usuário:</label>

                        <div class="col-sm-8 col-lg-4 controls">

                            <select id="role" name="role" class="form-control" required>
                                <option>Selecione</option>
                                <option value="1">Admin</option>
                                <option value="2">Financeiro</option
                                <option value="3">Professor</option>
                                <option value="4">Secretaria</option>
                                <option value="5">Aluno</option>
                            </select>

                        </div>

                    </div>


                    <div class="form-group">
                    <label class="col-sm-3 col-lg-2 control-label">CPF:</label>
                    <div class="col-sm-8 col-lg-4 controls">
                            <input type="text" name="cpf" id="cpf" class="form-control input-sm" maxlength="14"
                                   onkeypress="return txtBoxFormat(this, '999.999.999-99', event);"/>

                            <div class="help-inline cpf" id="cpf_message"></div>
                            <?php echo form_error('cpf'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Sexo:</label>
                        <div class="col-sm-8 col-lg-4 controls">
                            <select name="sexo" class="form-control input-sm">
                                <option value="Feminino">Feminino</option>
                                <option value="Masculino">Masculino</option>
                            </select>
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('sexo'); ?>
                            </div>
                    </div>
                    <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Telefone:</label>

                                <div class="col-sm-2 col-lg-3 controls">
                                    <input type="text" name="tel" id="tel" class="form-control input-sm" maxlength="14"
                                           onkeypress="return txtBoxFormat(this, '(99) 9999-9999', event);"/>
                                    <span class="help-inline">&nbsp;</span>
                                    <?php echo form_error('tel'); ?>
                                </div>

                                <label class="col-sm-3 col-lg-1 control-label">Celular:</label>

                                <div class="col-sm-3 col-lg-3 controls">
                                    <input type="text" name="cel" id="cel" class="form-control input-sm" maxlength="15"
                                           onkeypress="return txtBoxFormat(this, '(99) 99999-9999',event);"/>
                                    <span class="help-inline">&nbsp;</span>
                                    <?php echo form_error('cel'); ?>
                                </div>
                            </div>
                    <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">CEP:</label>

                                <div class="col-sm-4 col-lg-3 controls">
                                    <input type="text" name="cep" id="cep" class="form-control input-sm" maxlength="10"
                                           onkeypress="return txtBoxFormat(this, '99.999-999',event)"/>
                            <span class="help-inline">Não sabe o cep? <a href="http://www.buscacep.correios.com.br/"
                                                                         target="_blank"> Clique aqui</a></span>
                                    <?php echo form_error('cep'); ?>

                                    <div id="cep_message" class="help-inline"></div>
                                </div>
                            </div>
                    <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Endereço:</label>

                                <div class="col-sm-4 col-lg-5 controls">
                                    <input type="text" name="endereco" id="endereco" class="form-control input-sm"/>
                                    <span class="help-inline">&nbsp;</span>
                                    <?php echo form_error('endereco'); ?>
                                </div>
                                <label class="col-sm-3 col-lg-1 control-label"> Número:</label>

                                <div class="col-sm-4 col-lg-2 controls">
                                    <input type="text" name="numero" id="numero" class="form-control input-sm"/>
                                    <span class="help-inline">&nbsp;</span>
                                    <?php echo form_error('numero'); ?>
                                </div>
                            </div>
                    <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Bairro:</label>

                                <div class="col-sm-4 col-lg-3 controls">
                                    <input type="text" name="bairro" id="bairro" class="form-control input-sm"
                                           readonly="readonly"/>
                                    <span class="help-inline">&nbsp;</span>
                                    <?php echo form_error('bairro'); ?>
                                </div>

                                <label class="col-sm-3 col-lg-1 control-label">Cidade:</label>

                                <div class="col-sm-4 col-lg-3 controls">
                                    <input type="text" name="cidade" id="cidade" class="form-control input-sm"
                                           readonly="readonly"/>
                                    <span class="help-inline">&nbsp;</span>
                                    <?php echo form_error('cidade'); ?>
                                </div>

                                <label class="col-sm-3 col-lg-1 control-label">Estado:</label>

                                <div class="col-sm-4 col-lg-2 controls">
                                    <input type="text" name="estado" id="estado" class="form-control input-sm"
                                           readonly="readonly"/>
                                    <span class="help-inline">&nbsp;</span>
                                    <?php echo form_error('estado'); ?>
                                </div>

                            </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Observações:</label>

                        <div class="col-sm-8 col-lg-8 controls">

                            <textarea name="termos" id="editor" class="form-control"></textarea>

                        </div>

                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"></label>

                        <div class="col-sm-8 col-lg-4 controls user">

                            <button class="btn btn-primary" type="submit" name="salvar"><i class="fa fa-check"></i> Salvar
                            </button>

                        </div>

                        <div class="col-sm-8 col-lg-4 controls aluno">

                            <button class="btn btn-primary" type="submit" name="salvar"><i class="fa fa-check"></i> Apenas Salvar
                            </button>

                            <button  class="btn btn-success" type="submit" name="matricular" value="matricular"><i class="fa fa-graduation-cap"></i> Salvar e Matricular
                            </button>

                        </div>


                    </div>
                </form>
            </div>
        </div>
        <div class="clearfix">
        </div>

        <!-- end image box -->

    </div>
</div>


<script type="text/javascript">

    $(document).ready(function () {



        $(".aluno").hide();

        $('#role').change(function () {
            if (this.value == '5') {

                $(".aluno").show('slow');
                $(".user").hide();

            }
            else {
                $(".aluno").hide('slow');
                $(".user").show();
            }
        });


    $(function () {

        $('#data').datetimepicker({
            locale: 'pt_BR',
            format: 'DD/MM/YYYY',
            minDate: moment.min()

        });
    });

    $(function () {

        $('#data2').datetimepicker({
            locale: 'pt_BR',
            format: 'DD/MM/YYYY',
            minDate: moment.min()

        });
    });

    $("#email").change(function () {
            var email = $(this).val();
            $("#email_message").html('');
            $("#salvar").prop("disabled", false);
            var url = "<?php echo site_url('usuarios/checarEmail');?>";
            if (email.length <= 0) return;
            $.get(url, {email: email},
                function (resposta) {
                    if (resposta.status != 1) {

                        $("#email_message").html(resposta.msg);
                        $("#salvar").prop("disabled", true);
                    }

                });


        });

    $("#cep").change(function () {
            $("#cep_message").html('');
            var cep_code = $(this).val();
            if (cep_code.length <= 0) return;
            $.get("http://apps.widenet.com.br/busca-cep/api/cep.json", {code: cep_code},
                function (result) {
                    if (result.status != 1) {

                        $("#cep_message").html
                        ('Ooops.' + result.message +
                            '. Se você tiver certeza que o CEP está correto, ' +
                            'você pode continuar o cadastro preenchendo manualmente ' +
                            'os campos de endereço abaixo.');

                        $("input#estado").prop("readonly", false);
                        $("input#cidade").prop("readonly", false);
                        $("input#bairro").prop("readonly", false);


                    }
                    else {

                        $("input#cep").val(result.code);
                        $("input#estado").val(result.state);
                        $("input#cidade").val(result.city);
                        $("input#bairro").val(result.district);
                        $("input#endereco").val(result.address);


                    }




                });
        });

    })


</script>