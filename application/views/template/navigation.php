<div id="sidebar" class="navbar-collapse collapse">
    <ul class="nav nav-list">
     <?php if(get_user()->getRole()=='admin'){?>

                <li class="<?php echo is_active_menu(get_user()->getRole());?>">
                <a href="<?php echo site_url(get_user()->getRole());?>">
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
                </a>

               </li>


       <li class="<?php echo is_active_menu('admin/clientes'); echo is_active_menu('admin/dependentes');?>">
        <a href="#" class="dropdown-toggle">
                        <i class="fa fa-users"></i>
                        <span>Clientes</span>
                        <b class="arrow fa fa-angle-right"></b>
         </a>
         <ul class="submenu">
          <li class="<?php echo is_active_menu('admin/clientes/listar');  ?>">
          <a href="<?php echo site_url('admin/clientes/listar');?>">

          <span>Listar Clientes</span>
          </a>
          </li>
          <li class="<?php echo is_active_menu('admin/clientes/cadastrar');?>">
          <a href="<?php echo site_url('admin/clientes/cadastrar');?>">

          <span>Cadastrar Cliente</span>
          </a>
          </li>
             <li class="<?php echo is_active_menu('admin/dependentes/cadastrar');?>">
                 <a href="<?php echo site_url('admin/dependentes/cadastrar');?>">

                     <span>Cadastrar Dependente</span>
                 </a>
             </li>
             <li class="<?php echo is_active_menu('admin/dependentes/listar');?>">
                 <a href="<?php echo site_url('admin/dependentes/listar');?>">

                     <span>Listar Dependentes</span>
                 </a>
             </li>



         </ul>
       </li>

         <li class="<?php echo is_active_menu('admin/cardapios')?>">
             <a href="#" class="dropdown-toggle">
                 <i class="fa fa-glass"></i>
                 <span>Cardápios</span>
                 <b class="arrow fa fa-angle-right"></b>
             </a>

         <ul class="submenu">
             <li class="<?php is_active_menu('admin/cardapios/listar')?>">

                 <a href="<?php echo site_url('admin/cardapios/listar');?>">Listar Cardápios</a>
             </li>
             <li class="<?php is_active_menu('admin/cardapios/cadastrar')?>">

                 <a href="<?php echo site_url('admin/cardapios/cadastrar');?>">Cadastrar Cardápio</a>
             </li>




         </ul></li>
        <li class="<?php echo is_active_menu('admin/contratos'); ?>" >
            <a href="#" class="dropdown-toggle">
                <i class="fa fa-folder"></i>
                <span>Contratos</span>
                <b class="arrow fa fa-angle-right"></b>
            </a>

            <ul class="submenu">
                <li class="<?php echo is_active_menu('admin/contratos/listar')?>">
                    <a href="<?php echo site_url('admin/contratos/listar');?>">Listar Contratos</a>

                </li>
                <li class="<?php echo is_active_menu('admin/contratos/cadastrar')?>">
                    <a href="<?php echo site_url('admin/contratos/cadastrar');?>">Cadastrar Contrato</a>

                </li>


            </ul>



        </li>

         <li class="<?php echo is_active_menu('admin/orcamentos'); ?>" >
             <a href="#" class="dropdown-toggle">
                 <i class="fa fa-file"></i>
                 <span>Orçamentos</span>
                 <b class="arrow fa fa-angle-right"></b>
             </a>

             <ul class="submenu">
                 <li class="<?php echo is_active_menu('admin/orcamentos/listar')?>">
                     <a href="<?php echo site_url('admin/orcamentos/listar');?>">Listar Orçamentos</a>

                 </li>
                 <li class="<?php echo is_active_menu('admin/orcamentos/gerar')?>">
                     <a href="<?php echo site_url('admin/orcamentos/gerar');?>">Gerar Orçamento</a>

                 </li>

                 <li class="<?php echo is_active_menu('admin/orcamentos/templates')?>">
                     <a href="<?php echo site_url('admin/orcamentos/templates');?>">Templates de E-mail</a>

                 </li>

             </ul>



         </li>

         <li class="<?php echo is_active_menu('admin/faturas'); ?>" >
             <a href="#" class="dropdown-toggle">
                 <i class="fa fa-money"></i>
                 <span>Faturas</span>
                 <b class="arrow fa fa-angle-right"></b>
             </a>

             <ul class="submenu">
                 <li class="<?php echo is_active_menu('admin/faturas/listar')?>">
                     <a href="<?php echo site_url('admin/faturas/listar');?>">Listar Faturas</a>

                 </li>
                 <li class="<?php echo is_active_menu('admin/faturas/gerar')?>">
                     <a href="<?php echo site_url('admin/faturas/gerar');?>">Gerar Faturas</a>

                 </li>


             </ul>



         </li>



          <li class="<?php echo is_active_menu('admin/editprofile');?>">
          <a href="<?php echo site_url('admin/editprofile');?>">
          <i class="fa fa-user"></i>
          <span>Perfil</span>
          </a>
          </li>


          <li class="<?php echo is_active_menu('admin/users');?>">



          <a href="<?php echo site_url('admin/users');?>">



          <i class="fa fa-users"></i>



          <span>Usuários</span>



          </a>



          </li>




                <li class="<?php echo is_active_menu('admin/system');?>">



                    <a href="#" class="dropdown-toggle">



                        <i class="fa fa-cog"></i>



                        <span>Sistema</span>



                        <b class="arrow fa fa-angle-right"></b>



                    </a>



                    <ul class="submenu">



                      <!--<li class="active"> HIGHLIGHTS SUBMENU-->



                      <li class="<?php echo is_active_menu('admin/system/allbackups');?>"><a href="<?php echo site_url('admin/system/allbackups');?>">Gerenciar Backups</a></li>

                      <li class="<?php echo is_active_menu('admin/system/smtpemailsettings');?>"><a href="<?php echo site_url('admin/system/smtpemailsettings');?>">Configurações SMTP</a></li>



                      <!--li class="<?php echo is_active_menu('admin/system/newlang');?>"><a href="<?php echo site_url('admin/system/newlang');?>">New Language</a></li-->

               <li class="<?php echo is_active_menu('admin/system/emailtmpl');?>"><a href="<?php echo site_url('admin/system/emailtmpl');?>">Editar Texto de E-mails</a></li>
                     <li class="<?php echo is_active_menu('admin/system/sitesettings');?>"><a href="<?php echo site_url('admin/system/sitesettings');?>">Configurações do Site</a></li>



                      <li class="<?php echo is_active_menu('admin/system/settings');?>"><a href="<?php echo site_url('admin/system/settings');?>">Configurações Admin</a></li>



                    </ul>



                </li>



                <?php }?>
    </ul>
		<div id="sidebar-collapse" class="visible-lg">
			<i class="fa fa-angle-double-left"></i>
		</div>
</div>