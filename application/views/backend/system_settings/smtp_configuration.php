<!DOCTYPE html>
<html lang="zxx" class="js">


<!-- HEAD -->
<?php $this->load->view('backend/includes/head'); ?>
<!-- /HEAD-->

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
							<div class="components-preview wide-md mx-auto">
								<div class="nk-block nk-block-lg">
									<div class="nk-block-head">
										<!--										<div class="nk-block-head-content">-->
										<!--											<h4 class="title nk-block-title">Add Menu</h4>-->
										<!--											<div class="nk-block-des">-->
										<!--												<p>You can alow display form in column as example below.</p>-->
										<!--											</div>-->
										<!--										</div>-->
									</div>
									<div class="card card-bordered">
										<div class="card-inner">
											<div class="card-head">
												<h5 class="card-title">SMTP Configuration</h5>
											</div>
											<form action="#" method="POST" id="smtp_config">
												<div class="row g-4">
													<div class="col-sm-6">
														<div class="form-group">
															<label class="form-label">Host</label>
															<div class="form-control-wrap">
																<div class="form-control-wrap">
																	<input type="text" class="form-control" name="host" id="port" value="<?= $smtp_config->host; ?>" >
																</div>
															</div>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label class="form-label" for="Name">Port</label>
															<div class="form-control-wrap">
																<input type="text" class="form-control" name="port" id="port"  value="<?= $smtp_config->port; ?>">
															</div>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label class="form-label">Email</label>
															<div class="form-control-wrap">
																<input type="text" class="form-control" name="email" id="email" value="<?= $smtp_config->email ?>" >
															</div>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label class="form-label" for="pay-amount-1">Password</label>
															<div class="form-control-wrap">
																<input type="password" class="form-control" name="password" id="password" value="<?= $smtp_config->password; ?>">
															</div>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label class="form-label">Sender</label>
															<div class="form-control-wrap">
																<input type="text" class="form-control" name="sent_title" id="sent_title" value="<?= $smtp_config->sent_title; ?>">
															</div>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label class="form-label">Sender Email</label>
															<div class="form-control-wrap">
																<input type="text" class="form-control" name="sent_email" id="sent_email" value="<?= $smtp_config->sent_email; ?>">
															</div>
														</div>
													</div>
													<input type="hidden" name="id" value="<?= $smtp_config->id; ?>">
													<div class="col-12">
														<div class="form-group">
															<button type="submit" class="btn btn-primary">Save</button>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div><!-- .nk-block -->
							</div><!-- .components-preview -->
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
<!-- JavaScript -->
<?php $this->load->view('backend/includes/scripts'); ?>
<!-- /JavaScript -->

<script type="text/javascript">
	$(document).ready(function () {
		$("#smtp_config").on('submit', (function (e) {
			e.preventDefault();
			var fd = new FormData(this);
			$.ajax({
				url: '<?php echo base_url("Settings/save_smtp_setting") ?>',
				data: fd,
				type: "POST",
				contentType: false,
				processData: false,
				cache: false,
				beforeSend: function(){
					imageOverlay('#smtp_config','show');
				},
				complete:function(data){
					imageOverlay('#smtp_config','hide');
				},
				success: function (res) {
					var res = $.parseJSON(res);
					if (res.msg_type === 'success') {
						NioApp.Toast(res.message, 'success', {position: 'top-right', icon: 'auto', ui: ''});
						setTimeout(function(){
							window.location = res.redirect_link;
						}, 2000);

					} else {
						var temp = res.message.split("<p>");
						var temp2 = temp;
						$.each(temp2, function( index, value ) {
							console.log(value);
							if(typeof value !== "undefined")
							{
								if(value){
									NioApp.Toast('<h5>' + value + '</h5>', 'error', {position: 'top-right', icon: 'auto', ui: ''});
								}
							}
						});
					}
				},
				error: function (xhr) {
					$("#msg").html("Error: - " + xhr.status + " " + xhr.statusText);
				}
			});
		}));
	});
</script>

</html>
