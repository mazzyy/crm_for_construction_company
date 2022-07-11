
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
												<h5 class="card-title">Edit Location</h5>
											
											</div>
											<form action="<?= base_url('employee/update'); ?>" method="POST" id="add_menu">
												<div class="row g-4">
													<div class="col-lg-6">
														<div class="form-group">
															<label class="form-label" for="Name">First Name </label>
															<div class="form-control-wrap">
																<input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" value="<?php echo $emp[0]['fname'] ?>" >
															</div>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label class="form-label" for="Name">Last Address   </label>
															<div class="form-control-wrap">
																<input type="text" class="form-control" name="lname" id="lname" placeholder="Last Address" value="<?php echo $emp[0]['lname'] ?>" >
															</div>
														</div>
													</div>
												
													<input type="hidden" class="form-control" name="id" id="id" value="<?php echo $emp[0]['id'] ?>" >
													
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



</html>
