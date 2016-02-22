<div class="row">

<!--    <div class="col-md-12">-->
<!--        <div class="box">-->
<!--            <div class="box-title">-->
<!--                <h3><i class="fa fa-filter"></i> Filtros</h3>-->
<!--                <div class="box-tool">-->
<!--                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="box-content">-->
<!--                <div class="clearfix" style="height:110px;"></div>-->
<!--            </div>-->
<!---->
<!--        </div>-->
<!--    </div>-->


    <div class="col-md-12">

        <div class="box">

            <div class="box-title">

                <h3><i class="fa fa-users"></i>


                   Usuários Cadastrados

                    </h3>

                <div class="box-tool">

                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>


                </div>

            </div>

            <div class="box-content">

                <?php if ($role == 'admin'){?>
                <div class="box-tool">

                    <a href="<?php echo site_url('usuarios/novo')?>" class="btn btn-to-success"><i class="fa fa-pencil"></i> Criar Novo</a>


                </div>
                <?php }?>

                <?php echo $this->session->flashdata('msg');?>

                <?php if($usuarios->num_rows()<=0){?>

                    <div class="alert alert-info">Nenhum usuario cadastrado</div>

                <?php }else{?>

                    <div id="no-more-tables">

                        <table class="table table-hover">

                            <thead>

                            <tr>

                                <th class="numeric">#</th>

                                <th class="numeric">Nome</th>

                                <th class="numeric">E-mail</th>

                                <th class="numeric">Grupo de Acesso</th>



                                <?php if ($role == 'admin')
                                {
                                ?>
                                    <th class="numeric">Ações</th>

                                <?php }?>



                            </tr>

                            </thead>

                            <tbody>

                            <?php foreach($usuarios->result() as $row):  ?>

                                <tr>

                                    <td data-title="#" class="numeric"><?php echo $row->id;?></td>
                                    <td data-title="#" class="numeric"><?php echo $row->nome;?></td>
                                    <td data-title="#" class="numeric"><?php echo $row->email;?></td>
                                    <td data-title="#" class="numeric"><?php echo $row->role;?></td>


                                    <td data-title="Action" class="numeric"></td>

                                </tr>

                                <?php endforeach;?>

                            </tbody>

                        </table>

                    </div>

                    <div class="pagination"><ul class="pagination pagination-colory"><?php echo $pages;?></ul></div>

                <?php }?>

            </div>

        </div>

    </div>

</div>