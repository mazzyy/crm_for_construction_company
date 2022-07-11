<!DOCTYPE html>
<html lang="zxx" class="js">

<!-- HEAD -->
<?php $this->load->view('backend/includes/head'); ?>
<!-- /HEAD -->

<body class="nk-body bg-lighter npc-general has-sidebar ">
<div class="nk-app-root">
	<!-- main @s -->
	<div class="nk-main ">

		<!-- /SidBar -->
		<?php $this->load->view('backend/includes/sidebar'); ?>
		<!-- /SidBar -->
		<!-- wrap @s -->
		<div class="nk-wrap ">


			<!-- /Header -->
			<?php $this->load->view('backend/includes/header'); ?>
			<!-- /Header -->

			<!-- content @s -->
			<div class="nk-content ">
				<div class="container-fluid">
					<div class="nk-content-inner">
						<div class="nk-content-body">

						</div>
					</div>
				</div>
			</div>
			<!-- content @e -->
			<!-- footer @s -->
			<?php $this->load->view('backend/includes/footer'); ?>
			<!-- footer @e -->
		</div>
		<!-- wrap @e -->
	</div>
	<!-- main @e -->
</div>
<!-- app-root @e -->



<!-- JavaScript -->
<?php $this->load->view('backend/includes/scripts'); ?>
<!-- /JavaScript -->

<script src="<?= base_url()?>assets/assets/js/charts/gd-default.js?ver=2.0.0"></script>

</body>

</html>
