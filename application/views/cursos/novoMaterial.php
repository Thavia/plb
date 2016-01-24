<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />

<div class="row">

    <div class="col-md-12">
        <?php echo (isset($error) && $error!='')?$error:'';?>
        <br>
        <?php (isset($fileinfo)) ? var_dump($fileinfo):'';?>

            <div class="box">

                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>Inserindo novo material no curso <?php echo $curso->nome;?></h3>
                    <div class="box-tool">
                        <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
                    </div>
                </div>

                <div class="box-content">

                        <?php echo form_open_multipart('cursos/salvarMaterial', ['class' => 'form-horizontal']);?>
                        <input type="hidden" value="<?php echo (isset($curso) ? $curso->id :'' );?>" name="id">
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Tipo:</label>
                        <div class="col-sm-4 col-lg-5 controls">
                            <select name="tipo" id="tipo" class="form-control">

                                <option>Selecione</option>

                                <option value="file">Arquivo</option>

                                <option value="link">Link Externo</option>

                            </select>


                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('tipo'); ?>
                        </div>
                    </div>
                    <div class="form-group arquivo">
                        <label class="col-sm-3 col-lg-2 control-label">Arquivo:</label>
                        <div class="col-sm-2 col-lg-3 controls">
                            <input type="file" name="file" class="form-control input-sm" accept=".png, .jpg, .jpeg, .pdf"/>
                            <span class="help-inline">Arquivos permitidos: .pdf, .jpg, .png</span>
                            <?php echo form_error('file'); ?>
                        </div></div>
                    <div class="form-group ">
                        <label class="col-sm-3 col-lg-2 control-label arquivo">Renomear ?</label>
                        <label class="col-sm-3 col-lg-2 control-label link">Título do link</label>
                        <div class="col-sm-2 col-lg-3 col-md-8 controls nome">
                            <input type="text" name="file_name" class="form-control" maxlength="40">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('file_name'); ?>
                        </div>
                    </div>

                        <div class="form-group arquivo link">
                            <label class="col-sm-3 col-lg-2 control-label">Link</label>
                            <div class="col-sm-12 col-lg-6 col-md-8 controls">
                                <input type="url" name="link" class="form-control">
                                <span class="help-inline">&nbsp;</span>
                                <?php echo form_error('file_name'); ?>
                            </div>
                        </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"></label>
                        <div class="col-sm-4 col-lg-2 controls">
                            <button class="btn btn-primary salvar" type="submit"><i class="fa fa-check"></i> Salvar </button>

                            <span class="help-inline">&nbsp;</span>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <div class="clearfix">
    </div>
</div>


<script type="application/javascript">

    $('.arquivo').hide();
    $('.link').hide();
    $('.salvar').hide();
    $('.nome').hide();
    $('#tipo').change(function () {

        console.log($('#tipo').val());

        if ($('#tipo').val() == 'file') {
            $('.arquivo').show('slow');
            $('.link').hide();
            $('.salvar').show('slow');
            $('.nome').show('slow');

        }

        if ($('#tipo').val() == 'link') {
            $('.arquivo').hide();
            $('.link').show('slow');
            $('.salvar').show('slow');
            $('.nome').show('slow');

        }

        if ($('#tipo').val() == 'Selecione') {
            $('.arquivo').hide('slow');
            $('.link').hide('slow');
            $('.salvar').hide('slow');
            $('.nome').hide('slow');

        }
    });


</script>


