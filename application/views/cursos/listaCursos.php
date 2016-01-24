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

                            <tr> <?php if ($role == 'admin')
                                {
                                    ?>

                                    <th class="numeric"><input type="checkbox" class="checkall"></th>
                                <?php }?>
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
                                    <?php if ($role == 'admin')
                                    { ?><td>
                                        <input type="checkbox" name="id[]" value="<?php echo $row->id; ?>"
                                               class="check">
                                        </td><?} ?>
                                    <td data-title="#" class="numeric"><?php echo $row->id;?></td>
                                    <td data-title="#" class="numeric"><?php echo $row->nome;?></td>
                                    <td data-title="#" class="numeric"><?php echo $row->duracao;?></td>
                                    <td data-title="#" class="numeric">R$ <?php echo $row->valor;?></td>
                                    <td data-title="#" class="numeric"> <?php echo $row->totalAluno;?></td>
                                    <td data-title="#" class="numeric"> <?php echo $row->totalProfessor;?></td>


                                    <td data-title="Action" class="numeric">
                                     <span>
                                         <a class="btn btn-info" data-placement="top" data-toggle="tooltip"
                                            href="<?php echo site_url("cursos/editar/$row->id")?>"
                                                                     title="Editar">
                                             <i class="fa fa-edit"></i> </a>
                                     </span>

                                     <span data-toggle="tooltip">
                                         <a class="btn btn-info" data-placement="top" data-toggle="tooltip"
                                            href="<?php echo site_url("cursos/addProfessor/$row->id")?>"
                                            title="Add Professor">
                                             <i class="fa fa-user-plus"></i> </a>
                                     </span>

                                    </td>

                                </tr>

                            <?php endforeach;?>

                            </tbody>

                        </table>

                    </div>

                    <p>Com selecionados: </p>
                    <span data-toggle="tooltip"> <a class="btn btn-danger" data-target="#excluirModal"
                                                    data-toggle="modal" data-placement="top" title="Excluir Clientes">
                            <i class="fa fa-trash-o"></i> </a></span>
                                 <br>
                    <div class="pagination">


                        <ul class="pagination pagination-colory"><?php echo $pages; ?></ul>

                    </div>

                <?php }?>

            </div>

        </div>

    </div>

</div>


<!-- Excluir Modal -->
<div class="modal fade" id="excluirModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Aviso</h4>
            </div>
            <div class="modal-body">
                Tem certeza que deseja excluir este curso?
                <br>
                Cursos com matrículas ativas não serão excluídos.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger deletar">
                    <i class="fa fa-trash-o"></i> Excluir
                </button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">


    $(document).ready(function () {

        var dados;
        $('#excluirModal').on('shown.bs.modal',

            function (e) {
                var button = $(e.relatedTarget);
                var cursoId = button.data('cursoId');

                dados =
                {
                    id: cursoId

                };

                return dados;
            });

        $('[data-toggle="tooltip"]').tooltip();


    $('.deletar').click(function () {

        var data = [];
        $("input[type=checkbox][name='id[]']:checked").each(function () {
            data.push($(this).val());
        });
        if (data.length == 0) {
            data = dados;

        }
        else {
            data = {data};
        }
        console.log(data);
        $.ajax({

            type: 'POST',
            url: '<?php echo site_url('cursos/apagarSelecionados')?>',
            data: data,
            dataType: 'json',
            cache: false,
            success: function (response) {

                location.reload();
            }
        });


    });


    });


</script>