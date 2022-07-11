<!-- sidebar @s -->
<div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
	<div class="nk-sidebar-element nk-sidebar-head">
		<div class="nk-sidebar-brand">
			<a href="html/index.html" class="logo-link nk-sidebar-logo">
				<img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">
				<img class="logo-dark logo-img" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
			</a>
		</div>
		<div class="nk-menu-trigger mr-n2">
			<a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
		</div>
	</div><!-- .nk-sidebar-element -->
	<div class="nk-sidebar-element">
		<div class="nk-sidebar-content">
			<div class="nk-sidebar-menu" data-simplebar>
				<ul class="nk-menu">
					<li class="nk-menu-heading">
						<h6 class="overline-title text-primary-alt">Menus</h6>
					</li>
					<!-- .nk-menu-heading -->
					<li class="nk-menu-item">
						<a href="<?= base_url('dashboard')?>" class="nk-menu-link">
							<span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
							<span class="nk-menu-text">Dashboard</span>
						</a>
					</li>
					<?php  for ($i = 0; $i < count($menu); $i++): ?>
					<li class="nk-menu-item <?php if (!empty($menu[$i]['child'])) { echo 'has-sub'; } ?>">
						<a href="#" class="nk-menu-link <?php if (!empty($menu[$i]['child'])) { echo 'nk-menu-toggle'; } ?>">
							<span class="nk-menu-icon"><em class="<?= $menu[$i]['class'] ?>"></em></span>
							<span class="nk-menu-text"><?= $menu[$i]['name'] ?></span>
						</a>
						<?php if (count($menu[$i]['child']) > 0): ?>
						<ul class="nk-menu-sub">
							<?php for ($j = 0; $j < count($menu[$i]['child']); $j++): ?>
							<li class="nk-menu-item">
								<a href="<?= base_url() . $menu[$i]['child'][$j]['url'] ?>" class="nk-menu-link"><span class="nk-menu-text"><i class="icon ni ni-bullet-fill"></i> <?= $menu[$i]['child'][$j]['name'] ?></span></a>
							</li>
							<?php endfor; ?>
						</ul>
						<?php endif; ?>
						<!-- .nk-menu-sub -->
					</li>
					<?php endfor; ?>
					<!-- .nk-menu-item -->

                    <?php if($user->role == 1): ?>
					<li class="nk-menu-heading">
						<h6 class="overline-title text-primary-alt">Static Menus</h6>
					</li><!-- .nk-menu-heading -->
					<li class="nk-menu-item has-sub">
						<a href="#" class="nk-menu-link nk-menu-toggle">
							<span class="nk-menu-icon"><em class="icon ni ni-grid-alt"></em></span>
							<span class="nk-menu-text">Menus Management</span>
						</a>
						<ul class="nk-menu-sub">
							<li class="nk-menu-item">
								<a href="<?= base_url('menus/manage')?>" class="nk-menu-link"><span class="nk-menu-text"><i class="icon ni ni-bullet-fill"></i> Manage Menu</span></a>
							</li>
							<li class="nk-menu-item">
								<a href="<?= base_url('Menus/menus_routes')?>" class="nk-menu-link"><span class="nk-menu-text"><i class="icon ni ni-bullet-fill"></i> Menu Routes</span></a>
							</li>

						</ul><!-- .nk-menu-sub -->
					</li><!-- .nk-menu-item -->
					<li class="nk-menu-item has-sub">
						<a href="#" class="nk-menu-link nk-menu-toggle">
							<span class="nk-menu-icon"><em class="icon ni ni-laptop"></em></span>
							<span class="nk-menu-text">Activity Logs</span>
						</a>
						<ul class="nk-menu-sub">
							<li class="nk-menu-item">
								<a href="<?= base_url('activity_logs')?>" class="nk-menu-link"><span class="nk-menu-text"><i class="icon ni ni-bullet-fill"></i> View activity logs</span></a>
							</li>
							<li class="nk-menu-item">
								<a href="<?= base_url('activity_logs/custom_search')?>" class="nk-menu-link"><span class="nk-menu-text"><i class="icon ni ni-bullet-fill"></i> Custom search logs</span></a>
							</li>
						</ul><!-- .nk-menu-sub -->
					</li><!-- .nk-menu-item -->
					<li class="nk-menu-item has-sub">
						<a href="#" class="nk-menu-link nk-menu-toggle">
							<span class="nk-menu-icon"><em class="icon ni ni-lock"></em></span>
							<span class="nk-menu-text">Groups & Permission</span>
						</a>
						<ul class="nk-menu-sub">
							<li class="nk-menu-item">
								<a href="<?= base_url('Users/manage_user_groups')?>" class="nk-menu-link"><span class="nk-menu-text"><i class="icon ni ni-bullet-fill"></i> Manage permission</span></a>
							</li>
						</ul><!-- .nk-menu-sub -->
					</li><!-- .nk-menu-item -->
					<li class="nk-menu-item has-sub">
						<a href="#" class="nk-menu-link nk-menu-toggle">
							<span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
							<span class="nk-menu-text">System Settings</span>
						</a>
						<ul class="nk-menu-sub">
							<li class="nk-menu-item">
								<a href="<?= base_url('Settings/company_info')?>" class="nk-menu-link"><span class="nk-menu-text"><i class="icon ni ni-bullet-fill"></i> Company information</span></a>
							</li>

							<li class="nk-menu-item">
								<a href="#" class="nk-menu-link"><span class="nk-menu-text"><i class="icon ni ni-bullet-fill"></i> Backup Database</span></a>
							</li>
							<li class="nk-menu-item">
								<a href="<?= base_url('Settings/smtp_configuration')?>" class="nk-menu-link"><span class="nk-menu-text"><i class="icon ni ni-bullet-fill"></i> Email configuration</span></a>
							</li>
							<li class="nk-menu-item">
								<a href="#" class="nk-menu-link"><span class="nk-menu-text"><i class="icon ni ni-bullet-fill"></i> Login Settings</span></a>
							</li>
						</ul><!-- .nk-menu-sub -->
					</li><!-- .nk-menu-item -->
                    <?php endif; ?> 

				</ul><!-- .nk-menu -->
			</div><!-- .nk-sidebar-menu -->
		</div><!-- .nk-sidebar-content -->
	</div><!-- .nk-sidebar-element -->
</div>
<!-- sidebar @e -->
