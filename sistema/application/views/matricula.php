<div class="row">

    <div class="col-md-12">
        <div id="response"></div>
        <?php echo $this->session->flashdata('msg'); ?>
        <?php echo (isset($msg) && $msg != '') ? $msg : ''; ?>

        <?php if (!$user){?>
        <div id="passo1" class="box">

            <div class="box-title">
                <h3><i class="fa fa-user"></i>Passo1: Crie sua conta</h3>

                <div class="box-tool">
                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
                </div>
            </div>

            <div  class="box-content">

                <div class="row">
                    <div class="col-md-6" id="cadastro">
                        <form class="form-horizontal form" name="form" id="addUser">
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-4 control-label">Nome Completo:</label>

                                <div class="col-sm-8 col-lg-6 controls">
                                    <input type="text" id="nome" name="nome" class="form-control" required />
                                    <span class="help-inline">&nbsp;</span>
                                    <?php echo form_error('nome'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-4 control-label">E-mail:</label>

                                <div class="col-sm-8 col-lg-6 controls">
                                    <input type="email" id="email" name="email" class="form-control" required />
                                    <span class="help-inline">&nbsp;</span>
                                    <?php echo form_error('nome'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 col-lg-4 control-label">CPF:</label>

                                <div class="col-sm-8 col-lg-6 controls">
                                    <input type="text" id="cpf" name="cpf" class="form-control" onkeypress="return txtBoxFormat(this, '999.999.999-99',event)" maxlength="14" required />
                                    <span class="help-inline">&nbsp;</span>
                                    <?php echo form_error('nome'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 col-lg-4 control-label">Telefone:</label>

                                <div class="col-sm-8 col-lg-6 controls">
                                    <input type="tel" id="tel" name="telefone" class="form-control" onkeypress="return txtBoxFormat(this, '(99) 99999-9999', event)" maxlength="15" required />
                                    <span class="help-inline">&nbsp;</span>
                                    <?php echo form_error('nome'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-4 control-label">Senha:</label>

                                <div class="col-sm-8 col-lg-6 controls">
                                    <input type="password" id="senha" name="senha" class="form-control" required />
                                    <span class="help-inline">&nbsp;</span>
                                    <?php echo form_error('nome'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-4 control-label">Confirmar Senha:</label>

                                <div class="col-sm-8 col-lg-6 controls">
                                    <input type="password" id="confirmarSenha" name="confirmarSenha" class="form-control" required />
                                    <span id="confirmarSenhaMsg" class="help-inline">&nbsp;</span>
                                    <?php echo form_error('nome'); ?>
                                </div>
                            </div>

                        </form>

                        <label class="col-sm-3 col-lg-4 control-label"></label>

                        <div class="col-sm-8 col-lg-6 controls">
                            <button id="ir1" class="btn btn-success"> Prosseguir</button>
                            <span class="help-inline">&nbsp;</span>
                        </div>

                    </div>
                    <div class="col-md-6">

                        <h3>Já é cadastrado? Faça seu login</h3>
                        <form id="form-login" action="<?php echo site_url('login/logar');?>" method="post">
                            <div class="form-group col-md-12">
                                <div class="controls">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                        <input class="form-control" type="email" name="username" placeholder="E-mail">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="controls">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                        <input class="form-control" type="password" name="password" placeholder="Senha">
                                    </div>
                                </div>
                            </div>

                            <hr style="margin-bottom:5px;" />
                            <div class="form-group col-md-12">
                                <div class="controls col-md-4">
                                    <button type="submit" class="btn btn-primary form-control" >Entrar</button>

                                </div>
                                <p class="col-md-4">
                                    <a href="<?php echo site_url('login/forgotpass');?>" class="goto-forgot" style="width:49%;margin-right:2px;margin-top:10px">Esqueceu a senha?</a>
                                </p>
                            </div>
                            <hr/>
                        </form>
                    </div>

                </div>

            </div>
        </div>
        <?} ?>
    </div>

    <div class="col-md-12">

        <div id="passo2" class="box">

            <div class="box-title">
                <h3><i class="fa fa-graduation-cap"></i>Passo 2: Confirme seu curso</h3>

                <div class="box-tool">
                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
                </div>
            </div>

            <div  class="box-content">

                <div class="row">
                    <div class="col-md-6">

                        <form class="form-horizontal form" name="form" id="addCurso">


                            <div class="form-group">
                                <label class="col-sm-3 col-lg-4 control-label">Curso:</label>
                                <div class="col-sm-8 col-lg-6 controls">
                                    <select name="curso" class="form-control input-sm">


                                        <?php


                                        foreach ($cursos->result() as $curso):
                                            $sel=null;
                                            if($cursoSelecionado->id == $curso->id){

                                                $sel = 'selected="selected"';
                                            }

                                            echo '<option value="'.$curso->id.'" '.$sel.'>'.$curso->nome.'</option>';
                                        endforeach;
                                        ?>

                                    </select>
                                    <?php echo form_error('curso'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 col-lg-4 control-label">Duração:</label>
                                <div class="col-sm-8 col-lg-6 controls">
                                    <select name="duracao" class="form-control input-sm">
                                        <option value="32">32 Aulas em 6 meses</option>
                                        <option value="64">64 Aulas em 12 meses</option>
                                    </select>
                                    <?php echo form_error('duracao'); ?>
                                </div>
                            </div>

                        </form>

                        <label class="col-sm-3 col-lg-4 control-label"></label>
                        <div class="col-sm-8 col-lg-6 controls">
                            <button class="btn btn-success" id="ir2"> Prosseguir</button>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">

                    <div id="cursoDescricao">

                    </div>

                </div>

            </div>
        </div>

    </div>

    <div class="col-md-12">
        <div id="passo3" class="box">

            <div class="box-title">
                <h3><i class="fa fa-money"></i>Passo 3: Efetue o pagamento</h3>

                <div class="box-tool">
                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
                </div>
            </div>

            <div  class="box-content">
                <div class="row">
                    <div class="col-md-6">

                        <form class="form-horizontal" id="formaPagamento">

                            <div class="form-group">
                                <label class="col-sm-3 col-lg-4 control-label">Forma de Pagamento:</label>

                                <div class="col-sm-8 col-lg-6 controls">

                                    <select id="forma_pagamento" name="forma_pagamento" class="form-control" required>
                                        <option>Selecione</option>
                                        <option value="cc">Cartão de Crédito</option>
                                        <option value="boleto">Boleto Bancário</option>
                                    </select>

                                </div>

                            </div>

                            <div id="cc">
                                <h3 class="text-center"> Cartão de Crédito</h3>

                                <div class="form-group">
                                    <label class="col-sm-3 col-lg-4 control-label">Bandeira</label>
                                    <div class="col-sm-8 col-lg-6 controls">
                                        <select name="brand" id="brand"
                                                class="form-control">
                                            <option>Selecione</option>
                                            <option value="master">MasterCard</option>
                                            <option value="visa">VISA</option>
                                            <option value="amex">American Express</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-3 col-lg-4 control-label">Número</label>
                                    <div class="col-sm-8 col-lg-6 controls">
                                        <input type="text" class="form-control"
                                               id="number" name="number" maxlength="16">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-3 col-lg-4 control-label">CVV</label>
                                    <div class="col-sm-8 col-lg-6 controls">
                                        <input type="text" class="form-control"
                                               id="cvv" name="cvv" maxlength="3">
                                    </div>
                                </div>




                                <div class="form-group">
                                    <label class="col-sm-3 col-lg-4 control-label">Validade</label>
                                    <div class="col-sm-12 col-lg-6 controls">
                                        <input type="tel" class="form-control" placeholder="mm/aaaa"
                                               id="expiration" name="expiration" onkeypress="return txtBoxFormat(this, '99/9999',event)" maxlength="7">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 col-lg-4 control-label">Validade</label>
                                    <div class="col-sm-12 col-lg-6 controls">
                                    <button id ="processarPagamento" class="btn btn-success"> Processar Pagamento </button>
                                    </div>
                                </div>



                            </div>
                            <div class="boleto">

                                <label class="col-sm-3 col-lg-4 control-label">Gerar Boleto:</label>

                                <div class="col-sm-8 col-lg-6 controls">

                                <a href="<?php echo site_url('geraBoleto')?>">

                                    <img width="90px" src="<?php echo base_url()?>/images/boleto.png">

                                </a>

                                </div>


                            </div>


                    </div>

                    <div class="col-md-6">



                    </div>
                </div>


            </div>
        </div>


    </div>

</div>

<?php echo ENVIRONMENT == 'development' ? get_option('cc_dev')->values : get_option('cc_prod')->values; ?>

<script type="text/javascript">

    var cc;
    $gn.ready(function (checkout) {

        var callback = function (error, response) {
            if (error) {
                // Trata o erro ocorrido
                console.error(error.error_description);
            } else {
                // Trata a resposta
                cc = response
            }
        };



        $('#processarPagamento').click( function() {

            var expirationDate = $("#expiration").val().split('/');
            checkout.getPaymentToken({
                brand: $("#brand").val(),
                number: $("#number").val(),
                cvv: $("#cvv").val(),
                expiration_month: expirationDate[0],
                expiration_year: expirationDate[1]
            }, callback);



        });

    });

</script>
<script type="text/javascript">
    $(document).ready(function () {



        $('#passo2').hide();
        $('#passo3').hide();

        $('#confirmarSenha').onChange(function(){


            if($('#confirmarSenha').val() != $('#senha').val()){

                $('#confirmarSenhaMsg').html('As senhas não são iguais!');
                $("#ir1").prop("disabled", true);
            }

        });


        var user = <?php if($user) echo true; else echo 0?>;
        if(user == 1) {

            $('#passo2').show('slow');

        }

        $('#ir1').click(function (){


            $('#passo1').hide();
            $('#passo3').hide();

            var data = {

                nome: $('#nome').val(),
                email: $('#email').val(),
                cpf: $('#cpf').val(),
                tel: $('#tel').val(),
                senha: $('#senha').val()


            };

        $.ajax({

                type: 'POST',
                url: '<?php echo site_url('SignUp/createAjax')?>',
                data: {data},
                dataType: 'json',
                cache: false,
                success: function (response) {
                    if(response.sucesso)
                    $('#passo2').show('slow');
                    else{

                        $('#response').html("<div class='alert alert-danger'> Este e-mail já está cadastrado, faça seu " +
                            "login ou cadastre um novo e-mail </div>");
                        $('#passo1').show();
                        $('#cadastro').hide();

                    }




        }
        });
    });
        $('#ir2').click(function (){

            $('#passo3').show('slow');
            $('#passo2').hide();


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




        $('.boleto').hide();
        $('#cc'). hide();
        $('#forma_pagamento').change(function (){


            if ($('#forma_pagamento').val() == 'cc')


            {
                $('#cc'). show('slow');
                $('.boleto').hide();


            }

            if ($('#forma_pagamento').val() == 'boleto')

            {
                $('.boleto'). show('slow');
                $('#cc').hide();


            }




        });
        $("#erro").hide();
        $('.enviar').click(function () {

            $(".form").hide();
            $('.cc').hide();
            $('.boleto').hide();
            $(".process").show();
            $("#response").hide();
            $("#erro").hide();

            var frm = $(document.form);
            var data = JSON.stringify(frm.serializeArray());

            $.ajax({

                type: 'POST',
                url: '<?php echo site_url('cursos/processarPagamento')?>',
                data: {data,cc},
                dataType: 'json',
                cache: false,
                success: function (response) {

                    if (response.code == 200) {

                        $(".aguarde").fadeOut();

                        if($("#forma_pagamento").val() == 'boleto') {
                            $("#response").html(
                                '<div class="alert alert-success"><h4> Código de Barras:' + response.data.barcode + '</h4>' +
                                '</div>' +
                                '<h3><a href="' + response.data.link + '" target="_blank"> <i class="fa fa-print"></i> Imprimir Boleto </a></h3>'
                                + response.boleto
                            ).slideDown('slow');

                        } else {

                            $("#response").html('<div class="col-md-12"><h3> Aguardando confirmação da administradora do cartão ' +
                                'de crédito. Seu código de acompanhamento é #'+ response.data.subscription_id  + '</h3>' +
                                '<h2> Isso levará alguns instantes... Confira também seu e-mail com as informações da compra</h2></div>').slideDown();

                        }


                    }

                    else {
                        console.log(response);
                        $(".aguarde").fadeOut();
                        $('.boleto').hide();
                        $('.cc'). hide();
                        $(".form").show();


                        $("#erro").html(
                            '<div class="alert alert-danger">' +
                            response
                            +
                            '</div>'
                        ).slideDown('slow');
                    }

                }
            });


        });






    });








</script>
