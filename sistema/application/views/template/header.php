<div id="navbar" class="navbar">
	<button type="button" class="navbar-toggle navbar-btn collapsed" data-toggle="collapse" data-target="#sidebar">
	<span class="fa fa-bars"></span>
	</button>
	<a class="navbar-brand" href="<?php echo site_url(get_user()->getRole());?>">
	<small>
	<i class="fa fa-desktop"></i>
	Student Center </small>
	</a>
		
	<ul class="nav memento-nav pull-right">
		<li class="user-profile">
			<a data-toggle="dropdown" href="index.html#" class="user-menu dropdown-toggle">
			<i class="fa fa-user"></i>
			<span class="hhh" id="user_info"><?php echo get_user()->getNome();?></span>
			<i class="fa fa-caret-down"></i>
			</a>
			<ul class="dropdown-menu dropdown-navbar" id="user_menu">
				<li style="margin-top:10px;"></li>	
				<li>
				<a href="<?php echo site_url('perfil/changepass');?>">
				<i class="fa fa-cog"></i>
				Alterar Senha </a>
				</li>
				<li>
				<a href="<?php echo site_url('perfil');?>">
				<i class="fa fa-wrench"></i>
				Editar Perfil </a>
				</li>
				<li>			
				<li class="divider"></li>
				<li>
				<a href="<?php echo site_url('login/logout')?>">
				<i class="fa fa-sign-out"></i>
				Sair </a>
				</li>
				<li class="divider"></li>
			</ul>
		</li>
	</ul>

	<ul class="nav memento-nav pull-right">
		<li>
			<a href="http://www.plbnet.com.br" target="_blank">
				<i class="fa fa-laptop"></i>
				Visitar Site
			</a>
		</li>
	</ul>
</div>