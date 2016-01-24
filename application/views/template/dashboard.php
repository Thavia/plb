<div class="page-title">

    <div>

        <h1><i class="fa fa-file-o"></i> Dashboard</h1>

        <h4>Raio-X</h4>

    </div></div>


<div class="row">

    <?php if (isset($agenda)) { ?>

    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-calendar"></i>Agenda de Aulas</h3>
                <div class="box-tool">
                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>

                </div>
            </div>
            <div class="box-content">
                <div id="calendar" style="width: 100%; height: 100%"></div>



            </div>
        </div>
    </div>

<?php } ?>




</div>
<div class="row">


    <div class="col-md-12">
        <div class="row">

            <?php if (isset($faturamentoMes)) { ?>
            <div class="col-md-4">

                <div class="tile tile-lime">

                    <div class="img">

                        <i class="fa fa-money"></i>

                    </div>

                    <div class="content">

                        <p class="big">
                            <?php foreach($faturamentoMes->result() as $fm):

                            echo 'R$ '. $fm->valor;
                            endforeach;
                    ?>
                        </p>

                        <p class="title"> Faturamento em <?php echo formatar_data(date('M'),'mes')?></p>
                    </div>
                </div>
            </div><?php }?>

            <?php if (isset($totalAlunos)){?>
            <div class="col-md-4">

                <div class="tile tile-red">

                    <div class="img">

                        <i class="fa fa-graduation-cap"></i>

                    </div>
                    <div class="content">

                        <p class="big">
                            <?php echo $totalAlunos; ?>
                                  </p>

                        <p class="title">

                            Total de Alunos

                        </p>

                    </div>

                </div>

            </div>
            <?php }?>

            <?php if (isset($totalProfessores)){ ?>

            <div class="col-md-4">

                <div class="tile tile-dark-red">

                    <div class="img">

                        <i class="fa fa-users"></i>

                    </div>

                    <div class="content">
                        <p class="big">
                        <?php echo $totalProfessores; ?>
                        </p>
                        <p class="title">
                            Total de Professores
                        </p>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <a href="https://www.websumare.com" target="_blank" class="btn btn-info">Suporte Técnico</a>
    </div>
</div>

<script>

    $(document).ready(function() {

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next, today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },

            editable: true,
            lang: 'pt-br',
            eventLimit: true, // allow "more" link when too many events
            events: [
                <?php

                $eventos	=	$agenda->result_array();
                foreach($eventos as $row):



                ?>
                {
                    title: "<?php echo $row['titulo'];?>",
                    start: "<?php echo $row['data'];?>",
                    url: "<?php echo site_url('agenda/exibir/'.$row['id']);?>"

                },
                <?php
                   endforeach;
                   ?>
            ]
        });






    });

</script>

