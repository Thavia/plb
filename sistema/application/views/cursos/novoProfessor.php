<div class="row">

    <div class="col-md-12">

        <div class="box">

            <div class="box-title">
                <h3><i class="fa fa-bars"></i>Associando um professor no curso <?php echo $curso->nome; ?></h3>

                <div class="box-tool">
                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
                </div>
            </div>

            <div class="box-content">


                <form class="form-horizontal" action="<?php echo site_url('cursos/salvarProfessor') ?>" method="post" >
                <input type="hidden" name="fk_curso" value="<?php echo $curso->id ?>" />

                <div class="form-group">
                    <label class="col-sm-3 col-lg-2 control-label">Professor:</label>

                    <div class="col-sm-8 col-lg-4 controls">
                        <select name="professor" id="profs" style="width:320px;" class="form-control col-md-12"
                                required></select>
                        <span class="help-inline">&nbsp;</span>
                        <?php echo form_error('professor'); ?>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-3 col-lg-2 control-label"></label>

                    <div class="col-sm-4 col-lg-2 controls">
                        <button class="btn btn-primary salvar" type="submit"><i class="fa fa-check"></i> Salvar</button>

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
    $(document).ready(function () {

        $(function () {

            $('#data').datetimepicker({
                locale: 'pt_BR',
                format: 'DD/MM/YYYY',
                minDate: moment.min()

            });
        });

        $('#profs').select2({


            placeholder: 'Selecione um Professor',
            allowClear: true,
            data:  <?php echo $profs; ?>,
            templateResult: formatUser

        });

        function formatUser (user) {
            if (!user.id) { return user.text; }
            var $user = $(
                '<i class="fa fa-user"></i> ' + user.text + '</span> <br>'+
                '<i class="fa fa-envelope"></i> ' + user.email + '</span>'
            );
            return $user;
        };


    });

</script>