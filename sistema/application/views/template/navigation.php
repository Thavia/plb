<div id="sidebar" class="navbar-collapse collapse">
    <ul class="nav nav-list">
        <li class="<?php echo is_active_menu(get_user()->getRole());?>">
                <a href="<?php echo site_url(get_user()->getRole());?>">
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
                </a>

               </li>
        <li class="<?php echo is_active_menu('cursos');?>">
        <a href="#" class="dropdown-toggle">
                        <i class="fa fa-book"></i>
                        <span>Cursos</span>
                        <b class="arrow fa fa-angle-right"></b>
         </a>
         <ul class="submenu">
          <li class="<?php echo is_active_menu('cursos/index');  ?>">
          <a href="<?php echo site_url('cursos/index');?>">

          <?php if (get_user()->getRole() == 'admin')

          echo '<span>Cursos Cadastrados</span>'; else echo '<span>Meus Cursos</span>'

          ?>
          </a>
          </li>


         </ul>
       </li>
        <li class="<?php echo is_active_menu('agenda'); ?>" >
            <a href="<?php echo site_url('agenda');?>" class="dropdown-toggle">
                <i class="fa fa-calendar"></i>
                <span>Agenda de Aulas</span>
                <b class="arrow fa fa-angle-right"></b>
            </a>

        </li>

        <?php if (get_user()->getRole() == 'admin' || 'financeiro') {?>

        <li class="<?php echo is_active_menu('faturas'); ?>" >
             <a href="#" class="dropdown-toggle">
                 <i class="fa fa-money"></i>
                 <span>Faturas</span>
                 <b class="arrow fa fa-angle-right"></b>
             </a>

             <ul class="submenu">
                 <li class="<?php echo is_active_menu('faturas')?>">
                     <a href="<?php echo site_url('faturas');?>">Listar Faturas</a>

                 </li>


             </ul>



         </li>
        <li class="<?php echo is_active_menu('usuarios'); ?>" >
              <a href="<?php echo site_url('usuarios');?>" class="dropdown-toggle">
                <i class="fa fa-users"></i>
                  <span>Usuários</span>
                <b class="arrow fa fa-angle-right"></b>
            </a>

        </li>

        <?php }?>
        </ul>
    <div id="sidebar-collapse" class="visible-lg">
        <i class="fa fa-angle-double-left"></i>
    </div>
</div>