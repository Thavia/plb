<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />

<?php

$acao = $this->uri->segment(2);


    if($acao == 'novo'){

        $title = 'Cadastrando novo curso';
        $formAction = site_url('cursos/create');
    }
       else
        {
            $title = 'Editando Curso '. $curso->nome;
            $formAction = site_url('cursos/update');
        }
?>
<div class="row">

    <div class="col-md-12">
        <?php echo $this->session->flashdata('msg');?>
        <?php echo (isset($msg) && $msg!='')?$msg:'';?>

            <div class="box">

                <div class="box-title">
                    <h3><i class="fa fa-bars"></i><?php echo $title; ?></h3>
                    <div class="box-tool">
                        <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
                    </div>
                </div>

                <div class="box-content">
                    <form class="form-horizontal" name="addCurso"
                          action="<?php echo $formAction ?>" method="post">

                        <input type="hidden" value="<?php echo (isset($curso) ? $curso->id :'' );?>" name="id">
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Curso:</label>
                        <div class="col-sm-4 col-lg-5 controls">
                            <input type="text" name="nome"  value="<?php echo (isset($curso) ? $curso->nome :'' );?>" class="form-control input-sm"/>
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('nome'); ?>
                        </div></div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Duração:</label>
                        <div class="col-sm-2 col-lg-3 controls">
                            <input type="number" name="duracao" min="1" value="<?php echo (isset($curso) ? $curso->duracao :'' );?>" class="form-control input-sm"/>
                            <span class="help-inline">quantidade de meses</span>
                            <?php echo form_error('duracao'); ?>
                        </div></div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Descrição:</label>
                        <div class="col-sm-8 col-lg-8 col-md-8 controls">
                            <textarea id="editor" class="form-control wysihtml5" name="descricao"><?php echo (isset($curso) ? $curso->descricao :'' );?></textarea>
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('descricao'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Valor:</label>
                        <div class="col-sm-4 col-lg-2 controls">
                            <div class="input-group">
                                <span class="input-group-addon">R$</span>
                                <input type=text" name="valor" value="<?php echo (isset($curso) ? $curso->valor :'' );?>" class="form-control input-sm" maxlength="8">

                            </div>

                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('valor'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"></label>
                        <div class="col-sm-4 col-lg-2 controls">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-check"></i> Salvar </button>

                            <span class="help-inline">&nbsp;</span>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <div class="clearfix">
    </div>
</div>	<!-- end image box -->



