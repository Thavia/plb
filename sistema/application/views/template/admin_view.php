<div class="page-title">

    <div>

        <h1><i class="fa fa-file-o"></i> Dashboard</h1>

        <h4>Estatísticas</h4>

    </div></div>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-calendar"></i>Estatísticas do mês</h3>
                    <div class="box-tool">
                        <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>

                    </div>
                </div>
                <div class="box-content">

                    <div class="row">
                        <div class="col-md-3">
                            <h4>Aniversários</h4>
                           <li>
                               Teste 1
                           </li>
                            <li>
                                Teste 2
                            </li>

</div>
                        <div class="col-md-3">
                            <h4>Cardápios</h4>
                        </div>
                        <div class="col-md-3">
                            <h4>Receita</h4>
                        </div>

                        <div class="col-md-3">
                            <h4>Despesas</h4>
                        </div>




                </div>
            </div>
</div>

</div>


<div class="row">
    <div class="col-md-6">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-calendar"></i>Agenda de Aniversários</h3>
                <div class="box-tool">
                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>

                </div>
            </div>
            <div class="box-content">
                <div id="calendar" style="width: 100%; height: 100%"></div>
            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bullhorn"></i>Lembretes</h3>
                <div class="box-tool">
                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>

                </div>
            </div>
            <div class="box-content">
                
            </div>
        </div>
    </div>



</div>

<div class="row">
    <div class="col-md-12">
        <div class="row">


            <div class="col-md-4">

                <div class="tile tile-dark-blue">

                    <div class="img">

                        <i class="fa fa-folder"></i>

                    </div>

                    <div class="content">

                        <p class="big">
                            <?php
                            $CI = get_instance();
                            $CI->load->database();
                            $query = $CI->db->get_where('contratos',array('status !='=>0));
                            echo $query->num_rows();
                            ?>
                        </p>

                        <p class="title"> Contratos</p>
                    </div>
                </div>
            </div>



            <div class="col-md-4">

                <div class="tile tile-green">

                    <div class="img">

                        <i class="fa fa-users"></i>

                    </div>
                    <div class="content">

                        <p class="big">

                            <?php
                            $CI = get_instance();
                            $CI->load->database();
                            $query = $CI->db->get_where('clientes',array('status'=>1));
                            echo $query->num_rows();
                            ?>

                        </p>

                        <p class="title">

                            Clientes

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="tile tile-dark-red">

                    <div class="img">

                        <i class="fa fa-birthday-cake"></i>

                    </div>

                    <div class="content">
                        <p class="big">
                            <?php
                            $query = $CI->db->get_where('dependentes',array('status'=>1));
                            echo $query->num_rows();
                            ?>
                        </p>
                        <p class="title">
                            Aniversariantes
                        </p>
                    </div>
                </div>
            </div>
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

                $notices	=	$this->db->get('contratos')->result_array();
                foreach($notices as $row):



                ?>
                {
                    title: "<?php echo get_dependente_by_id($row['dependente_id'])->nome;?>",
                    start: "<?php echo $row['data_festa'];?>",
                    url: "<?php echo site_url('admin/contratos/exibir/'.$row['id']);?>"

                },
                <?php
                   endforeach;
                   ?>
            ]
        });

     });

</script>
