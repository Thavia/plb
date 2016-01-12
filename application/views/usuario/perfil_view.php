<div class="row">

    <div class="col-md-12">

        <div class="box">

            <div class="box-title">

                <h3><i class="fa fa-bars"></i>Editar Perfil </h3>


                <div class="box-tool">

                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>

                    <a href="#" data-action="close"><i class="fa fa-times"></i></a></div>

            </div>

            <div class="box-content">

                <?php echo $this->session->flashdata('msg'); ?>

                <?php echo validation_errors(); ?>

                <form class="form-horizontal" action="<?php echo site_url('perfil/update'); ?>" method="post">
                    <input type="hidden" name="id" value="<?php echo $perfil->getId(); ?>"/>

                    <div class="form-group">

                        <label class="col-sm-3 col-lg-2 control-label">&nbsp;</label>


                        <div class="col-sm-9 col-lg-10 controls">

                            <img class="thumbnail" id="user_photo"
                                 src="<?php echo get_profile_photo_by_id($perfil->getId(), 'thumb'); ?>"
                                 style="width:100px;"/>

                            <span id="profile_photo_error"><?php echo form_error('profile_photo'); ?></span>

                        </div>

                    </div>


                    <div class="form-group">

                        <label
                            class="col-sm-3 col-lg-2 control-label">Avatar</label>


                        <div class="col-sm-9 col-lg-10 controls">

                            <input type="hidden" name="profile_photo" id="profile_photo"
                                   value="<?php echo get_profile_photo_name_by_username($perfil->getUsername()); ?>">

                            <iframe src="<?php echo site_url('perfil/photo_uploader'); ?>"
                                    style="border:0;margin:0;padding:0;height:130px;"></iframe>

                            <span class="help-inline">&nbsp;</span>

                        </div>

                    </div>


                    <div class="form-group">

                        <label class="col-sm-3 col-lg-2 control-label">Usuário</label>


                        <div class="col-sm-9 col-lg-10 controls">

                            <input type="text" name="user_name" value="<?php echo $perfil->getUsername(); ?>"

                                   placeholder="User Name" class="form-control">

                            <span class="help-inline">&nbsp;</span>

                            <?php echo form_error('user_name'); ?>

                        </div>

                    </div>


                    <div class="form-group">

                        <label class="col-sm-3 col-lg-2 control-label">Nome</label>


                        <div class="col-sm-9 col-lg-10 controls">

                            <input type="text" name="first_name" value="<?php echo $perfil->getNome() ?>"

                                   placeholder="User Name" class="form-control">

                            <span class="help-inline">&nbsp;</span>

                            <?php echo form_error('first_name'); ?>

                        </div>

                    </div>


                    <div class="form-group">

                        <label class="col-sm-3 col-lg-2 control-label">Sexo</label>


                        <div class="col-sm-9 col-lg-10 controls">

                            <?php $curr_value = (set_value('gender') != '') ? set_value('gender') : $perfil->getGender(); ?>

                            <select class="form-control" name="gender">

                                <?php $sel = ($curr_value == 'male') ? 'selected="selected"' : ''; ?>

                                <option value="male" <?php echo $sel; ?>>Masculino</option>

                                <?php $sel = ($curr_value == 'female') ? 'selected="selected"' : ''; ?>

                                <option value="female" <?php echo $sel; ?>>Feminino</option>

                            </select>

                            <span class="help-inline">&nbsp;</span>

                            <?php echo form_error('gender'); ?>

                        </div>

                    </div>




                    <div class="form-group">

                        <label class="col-sm-3 col-lg-2 control-label">Facebook</label>


                        <div class="col-sm-9 col-lg-10 controls">

                            <input type="text" name="fb_profile" value="<?php echo $perfil->getFacebook(); ?>"

                                   placeholder="Facebook Profile Link" class="form-control">

                            <span class="help-inline">Link do seu perfil no facebook</span>

                            <?php echo form_error('fb_profile'); ?>

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="col-sm-3 col-lg-2 control-label"></label>


                        <div class="col-sm-9 col-lg-10 controls">

                            <button class="btn btn-primary" type="submit"><i

                                    class="fa fa-check"></i> Salvar</button>

                        </div>

                    </div>


                </form>

            </div>

        </div>

    </div>

</div>

<script type="text/javascript">

    jQuery(document).ready(function () {

        var base_url = "<?php echo base_url();?>";

        jQuery('#profile_photo').change(function () {

            var val = jQuery(this).val();

            var src = base_url + 'uploads/profile_photos/thumb/' + val;

            jQuery('#user_photo').attr('src', src);

        }).change();

    });

</script>