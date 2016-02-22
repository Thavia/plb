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

                    <?php if ($role =='admin' || 'secretaria')
                        echo 'Faturas'; else echo 'Minhas Faturas';
                    ?>
                </h3>

                <div class="box-tool">

                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>


                </div>

            </div>

            <div class="box-content">

                <?php if ($role == 'admin' || 'secretaria'){?>
                    <div class="box-tool">

                        <a href="<?php echo site_url('faturas/novo')?>" class="btn btn-to-success"><i class="fa fa-pencil"></i> Criar Novo</a>


                    </div>
                <?php }?>

                <?php echo $this->session->flashdata('msg');?>

                <?php if($faturas->num_rows()<=0){?>

                    <div class="alert alert-info">Sem faturas</div>

                <?php }else{?>

                    <div id="no-more-tables">

                        <table class="table table-hover">

                            <thead>

                            <tr>

                                <th class="numeric">#</th>
                                <?php if ($role == 'admin' || 'secretaria')
                                {
                                    ?>

                                    <th class="numeric">Cliente</th>
                                    <th class="numeric">CPF</th>

                                <?php }?>

                                <th class="numeric">Vencimento</th>

                                <th class="numeric">Valor</th>
                                <th class="numeric">Forma de Pagamento</th>

                                <th class="numeric">Status</th>





                                <?php if ($role == 'admin' || 'secretaria')
                                {
                                    ?>

                                    <th class="numeric">Ações</th>

                                <?php }?>



                            </tr>

                            </thead>

                            <tbody>

                            <?php foreach($faturas->result() as $row):  ?>

                                <tr>

                                    <td data-title="#" class="numeric"><?php echo $row->id;?></td>

                                    <?php if ($role == 'admin' || 'secretaria')
                                    {
                                        ?>

                                        <td class="numeric"><?php echo $row->nome; ?></td>
                                        <td class="numeric"><?php echo $row->cpf; ?></td>

                                    <?php }?>
                                    <td data-title="#" class="numeric"><?php echo formatar_data($row->data_vencimento);?></td>
                                    <td data-title="#" class="numeric">R$  <?php echo $row->valor;?></td>
                                    <td data-title="#" class="numeric"> <?php echo formaPagamento($row->forma_pagamento);?></td>
                                    <td data-title="#" class="numeric"><?php echo $row->status;?></td>


                                    <?php if ($role == 'admin' || 'secretaria')
                                    {
                                        ?>

                                        <td class="numeric"></td>

                                    <?php }?>

                                </tr>

                            <?php endforeach;?>

                            </tbody>

                        </table>

                    </div>

                    <div class="pagination">

                        <ul class="pagination pagination-colory"><?php echo $pages; ?></ul>

                    </div>
                <?php }?>

            </div>

        </div>

    </div>

</div>