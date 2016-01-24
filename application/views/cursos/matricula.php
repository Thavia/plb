<div class="row">

    <div class="col-md-12">
        <?php echo $this->session->flashdata('msg'); ?>
        <?php echo (isset($msg) && $msg != '') ? $msg : ''; ?>


        <div class="box">

            <div class="box-title">
                <h3><i class="fa fa-bars"></i>Matriculando <?php echo $aluno->nome?></h3>

                <div class="box-tool">
                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
                </div>
            </div>

            <div class="box-content">

                <div id="erro" class="alert alert-danger"></div>

                <form class="form-horizontal form" name="form" id="addcontrato">
                    <div class="form-group">
                    <input type="hidden" name="userId" value="<?php echo $aluno->fk_user; ?>">
                        <label class="col-sm-3 col-lg-2 control-label">Curso:</label>

                        <div class="col-sm-8 col-lg-4 controls">
                            <select name="curso" id="cursos" style="width:320px;" class="form-control col-md-12" required></select>
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('curso'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Duração:</label>
                        <div class="col-sm-8 col-lg-4 controls">
                            <select name="duracao" class="form-control input-sm">
                                <option value="32">32 Aulas em 6 meses</option>
                                <option value="64">64 Aulas em 12 meses</option>
                            </select>
                            <?php echo form_error('duracao'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Forma de Pagamento:</label>

                        <div class="col-sm-8 col-lg-4 controls">

                            <select id="forma_pagamento" name="forma_pagamento" class="form-control" required>
                                <option>Selecione</option>
                                <option value="cc">Cartão de Crédito</option>
                                <option value="boleto">Boleto Bancário</option>
                            </select>

                        </div>

                    </div>
                    <div class="form-group boleto">

                        <label class="col-sm-3 col-lg-2 control-label">Primeiro Vencimento:</label>

                        <div class="col-sm-8 col-lg-4 controls">
                            <div class='input-group date' id='data2'>
                                <input type='text' name="data_vencimento" class="form-control"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                            </div>
                            <?php echo form_error('data_vencimento'); ?>
                        </div>
                    </div>
                    <div class="cc">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12"><h3 class="align-center"><i class="fa fa-credit-card"></i> Cartão de crédito</h3></div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Bandeira</label>
                            <div class="col-sm-8 col-lg-4 controls">
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
                            <label class="col-sm-3 col-lg-2 control-label">Número</label>
                            <div class="col-sm-8 col-lg-4 controls">
                                <input type="text" class="form-control"
                                       id="number" name="number" maxlength="16">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">CVV</label>
                            <div class="col-sm-8 col-lg-4 controls">
                                <input type="text" class="form-control"
                                       id="cvv" name="cvv" maxlength="3">
                            </div>
                        </div>




                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Validade</label>
                            <div class="col-sm-1 col-lg-1 controls">
                                <input type="tel" class="form-control" placeholder="mm"
                                       id="expiration_month" name="expiration_month" onkeypress="return txtBoxFormat(this, '99',event)" maxlength="2">
                            </div>
                            <div class="col-sm-1 col-lg-1 controls">

                                <input type="tel" class="form-control"
                                       placeholder="aaaa"  id="expiration_year" name="expiration_year" onkeypress="return txtBoxFormat(this, '9999',event)" maxlength="4">
                            </div>
                        </div>



                    </div>
                </form>


                <div class="form-group cc">
                    <label class="col-sm-3 col-lg-2 control-label"></label>

                    <div class="col-sm-8 col-lg-4 controls user">

                        <button class="btn btn-success enviar"><i class="fa fa-lock"></i> Processar Pagamento
                        </button>

                    </div>

                </div>

                <div class="form-group boleto">
                    <label class="col-sm-3 col-lg-2 control-label"></label>

                    <div class="col-sm-8 col-lg-4 controls user">

                        <button class="btn btn-primary enviar"><i class="fa fa-money"></i> Gerar Boleto
                        </button>

                    </div>

                </div>


                <div class="row">

                    <div class="col-md-12 col-sm-12 col-lg-12 process" style="display:none">
                        <h3 class="aguarde"><i class="fa fa-cog fa-spin"></i> Aguarde... Processando Pagamento</h3>
                        <div id="response"></div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="clearfix">
    </div>

    <!-- end image box -->

</div>



<?php echo ENVIRONMENT == 'development' ? get_option('cc_dev')->values : get_option('cc_prod')->values; ?>

<script>

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



        $("#brand,#number,#cvv,#expiration_month, #expiration_year").change( function() {


            checkout.getPaymentToken({
                brand: $("#brand").val(),
                number: $("#number").val(),
                cvv: $("#cvv").val(),
                expiration_month: $("#expiration_month").val(),
                expiration_year: $("#expiration_year").val()
            }, callback);



        });

    });

    $(document).ready(function () {
        $('#cursos').select2({


            placeholder: 'Selecione um Curso',
            allowClear: true,
            data:  <?php echo $cursos; ?>




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
    });

    $('.boleto').hide();
    $('.cc'). hide();
    $('#forma_pagamento').change(function (){


        if ($('#forma_pagamento').val() == 'cc')


        {
            $('.cc'). show('slow');
            $('.boleto').hide();


        }

        if ($('#forma_pagamento').val() == 'boleto')

        {
            $('.boleto'). show('slow');
            $('.cc').hide();


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






</script>
