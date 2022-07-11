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
									<div class="card card-bordered animated fadeIn">
										<div class="card-inner">
											<div class="card-head">
												<h5 class="card-title">Add Location</h5>
											</div>
											<form action="#" method="POST" id="add_menu">
												<div class="row g-4">
													<div class="col-sm-6">
														<div class="form-group">
															<label class="form-label">Business id</label>
															<div class="form-control-wrap">
																<select class="form-select form-control form-control-lg"  data-placeholder="Main" name="parent" id="parent">
																	<option value="0">Main</option>
																	<option value="1">1</option>
																	<option value="2">2</option>
																	<option value="3">3</option>
								
																</select>
															</div>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label class="form-label" for="Name">Location Name </label>
															<div class="form-control-wrap">
																<input type="text" class="form-control" name="name" id="name" placeholder="Location Name" >
															</div>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label class="form-label" for="Name">Location Address   </label>
															<div class="form-control-wrap">
																<input type="text" class="form-control" name="location_address" id="location_address" placeholder="Location Address" >
															</div>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label class="form-label" for="pay-amount-1">Location City</label>
															<div class="form-control-wrap">
																<input type="text" class="form-control" name="location_city" id="location_city" value="" placeholder="Location City" >
															</div>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label class="form-label" for="pay-amount-1">Location State</label>
															<div class="form-control-wrap">
																<input type="text" class="form-control" name="location_state" id="location_state" value="" placeholder="Location State">
															</div>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label class="form-label" for="pay-amount-1">Location Zipcode</label>
															<div class="form-control-wrap">
																<input type="text" class="form-control" name="location_zipcode" id="location_zipcode" value="" placeholder="Location Zipcode">
															</div>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label class="form-label" for="pay-amount-1">Location Phone 1</label>
															<div class="form-control-wrap">
																<input type="text" class="form-control" name="location_phone" id="location_phone" value="" placeholder="Location Phone 1">
															</div>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label class="form-label" for="pay-amount-1">Location Phone 2</label>
															<div class="form-control-wrap">
																<input type="text" class="form-control" name="location_phone2" id="location_phone2" value="" placeholder="Location Phone 2">
															</div>
														</div>
													</div>
												

													

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
