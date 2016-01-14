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

                <h3><i class="fa fa-bars"></i>

                    <?php if ($role =='admin')
                    echo 'Cursos Cadastrados'; else echo 'Meus Cursos';
                    ?>
                    </h3>

                <div class="box-tool">

                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>


                </div>

            </div>

            <div class="box-content">

                <?php if ($role == 'admin'){?>
                <div class="box-tool">

                    <a href="<?php echo site_url('cursos/novo')?>" class="btn btn-to-success"><i class="fa fa-pencil"></i> Criar Novo</a>


                </div>
                <?php }?>

                <?php echo $this->session->flashdata('msg');?>

                <?php if($cursos->num_rows()<=0){?>

                    <div class="alert alert-info">Nenhum curso cadastrado</div>

                <?php }else{?>

                    <div id="no-more-tables">

                        <table class="table table-hover">

                            <thead>

                            <tr>

                                <th class="numeric">#</th>

                                <th class="numeric">Curso</th>

                                <th class="numeric">Duração</th>

                                <th class="numeric">Valor</th>



                                <?php if ($role == 'admin')
                                {
                                ?>
                                    <th class="numeric">Total de Alunos</th>
                                    <th class="numeric">Total de Professores</th>
                                    <th class="numeric">Ações</th>

                                <?php }?>



                            </tr>

                            </thead>

                            <tbody>

                            <?php foreach($cursos->result() as $row):  ?>

                                <tr>

                                    <td data-title="#" class="numeric"><?php echo $row->id;?></td>
                                    <td data-title="#" class="numeric"><?php echo $row->nome;?></td>
                                    <td data-title="#" class="numeric"><?php echo $row->duracao;?></td>
                                    <td data-title="#" class="numeric">R$ <?php echo $row->valor;?></td>
                                    <td data-title="#" class="numeric"> <?php echo $row->totalAluno;?></td>
                                    <td data-title="#" class="numeric"> <?php echo $row->totalProfessor;?></td>


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