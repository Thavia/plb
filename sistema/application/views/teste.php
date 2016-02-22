<form class="form-horizontal form" name="form" id="addCurso">


    <div class="form-group">
        <label class="col-sm-3 col-lg-2 control-label">Curso:</label>
        <div class="col-sm-8 col-lg-4 controls">
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
        </div></div>

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
</form>
</div>
<div id="passo3">
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