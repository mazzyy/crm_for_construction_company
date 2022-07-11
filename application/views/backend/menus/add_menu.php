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

									</div>
									<div class="card card-preview">
                                            <div class="card-inner">
                                                <ul class="nav nav-tabs mt-n3">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#tabItem5"><em class="icon ni ni-user"></em><span>Customer Info</span></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#tabItem6"><em class="icon ni ni-link"></em><span>Additional Contact Details</span></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#tabItem7"><em class="icon ni ni-bell"></em><span>Shipment Info</span></a>
                                                    </li>
  
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tabItem5"><!-- Customers -->
													<form action="#" method="POST" id="add_menu">
														<div class="row g-4">
														<div class="col-lg-6">
														<div class="form-group">
																	<label class="form-label">Customer Prefix </label>
																	<div class="form-control-wrap">
																		<select class="form-select form-control form-control-lg select2-hidden-accessible" name="items" data-placeholder="Main" id="items-edit" data-select2-id="items-edit" tabindex="-1" aria-hidden="true">
		
																			<option value="1">Mr</option>
																			<option value="2">Mrs</option>
																			<option value="3">Dr</option>
										
																		</select>
																	</div>
																</div>
															</div>
															<div class="col-lg-6">
																<div class="form-group">
																	<label class="form-label" for="Name">Primary Email </label>
																	<div class="form-control-wrap">
																		<input type="email" class="form-control" name="email" id="price" placeholder="Primary Email">
																	</div>
																</div>
															</div>

															<div class="col-lg-6">
																<div class="form-group">
																	<label class="form-label" for="Name">First Name </label>
																	<div class="form-control-wrap">
																		<input type="email" class="form-control" name="f_name" id="f_name" placeholder="First Name">
																	</div>
																</div>
															</div>
															<div class="col-lg-6">
																<div class="form-group">
																	<label class="form-label" for="Name">Last Name </label>
																	<div class="form-control-wrap">
																		<input type="email" class="form-control" name="l_name" id="l_name" placeholder="Last Name">
																	</div>
																</div>
															</div>
															
															<div class="col-lg-6">
																<div class="form-group">
																	<label class="form-label" for="Name">Primary Contact </label>
																	<div class="form-control-wrap">
																		<input type="text" class="form-control" name="contact" id="contact" placeholder="Primary Contact">
																	</div>
																</div>
															</div>
														
															
															<div class="col-lg-6">
																<div class="form-group">
																	<label class="form-label" for="Name">Company </label>
																	<div class="form-control-wrap">
																		<input type="text" class="form-control" name="company" id="company" placeholder="Company">
																	</div>
																</div>
															</div>
															<div class="col-lg-6">
																<div class="form-group">
																	<label class="form-label" for="Name">Address 1 </label>
																	<div class="form-control-wrap">
																		<input type="text" class="form-control" name="address" id="address" placeholder="Address 1">
																	</div>
																</div>
															</div>
															<div class="col-lg-6">
																<div class="form-group">
																	<label class="form-label" for="Name">Address 2 </label>
																	<div class="form-control-wrap">
																		<input type="text" class="form-control" name="address2" id="address2" placeholder="Address 2">
																	</div>
																</div>
															</div>
											
															<div class="col-lg-6">
																<div class="form-group">
																	<label class="form-label" for="Name">City </label>
																	<div class="form-control-wrap">
																		<input type="text" class="form-control" name="city" id="city" placeholder="City">
																	</div>
																</div>
															</div>
															<div class="col-lg-6">
																<div class="form-group">
																	<label class="form-label" for="Name">State </label>
																	<div class="form-control-wrap">
																		<input type="text" class="form-control" name="state" id="state" placeholder="State">
																	</div>
																</div>
															</div>
															<div class="col-lg-6">
																<div class="form-group">
																	<label class="form-label" for="Name">Zipcode </label>
																	<div class="form-control-wrap">
																		<input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="Zipcode">
																	</div>
																</div>
															</div>
															<div class="col-lg-6">
																<div class="form-group">
																	<label class="form-label" for="Name">Tax Status </label>
																	<div class="form-control-wrap">
																		<input type="text" class="form-control" name="tax_status" id="tax_status" placeholder="Tax Status">
																	</div>
																</div>
															</div>
																				
														
															<button type="button" class="btn btn-primary">Save</button>
														
														</div>
										
     												</form>								
                                                    </div>
                                                    <div class="tab-pane" id="tabItem6">
													<form action="#" method="POST" id="add_menu">
														<div class="row g-4">
														<div class="col-lg-6">
																<div class="form-group">
																	<label class="form-label" for="Name">Customers Type </label>
																	<div class="form-control-wrap">
																		<input type="text" class="form-control" name="type" id="type" placeholder="Customers Type">
																	</div>
																</div>
															</div>

															<div class="col-lg-6">
																<div class="form-group">
																	<label class="form-label" for="Name">Customer Name </label>
																	<div class="form-control-wrap">
																		<input type="email" class="form-control" name="name" id="name" placeholder="Customer Name">
																	</div>
																</div>
															</div>

															<div class="col-lg-6">
																<div class="form-group">
																	<label class="form-label" for="Name">Customer Address </label>
																	<div class="form-control-wrap">
																		<input type="email" class="form-control" name="address" id="address" placeholder="Customer Address">
																	</div>
																</div>
															</div>
															<div class="col-lg-6">
																<div class="form-group">
																	<label class="form-label" for="Name">Customer City </label>
																	<div class="form-control-wrap">
																		<input type="email" class="form-control" name="city" id="city" placeholder="Customer City">
																	</div>
																</div>
															</div>
															
															<div class="col-lg-6">
																<div class="form-group">
																	<label class="form-label" for="Name">Customer State </label>
																	<div class="form-control-wrap">
																		<input type="text" class="form-control" name="state" id="state" placeholder="Customer State">
																	</div>
																</div>
															</div>
														
															
															<div class="col-lg-6">
																<div class="form-group">
																	<label class="form-label" for="Name">Customer Zipcode </label>
																	<div class="form-control-wrap">
																		<input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="Customer Zipcode">
																	</div>
																</div>
															</div>
															<div class="col-lg-6">
																<div class="form-group">
																	<label class="form-label" for="Name">Home </label>
																	<div class="form-control-wrap">
																		<input type="text" class="form-control" name="home" id="home" placeholder="Home">
																	</div>
																</div>
															</div>
															<div class="col-lg-6">
																<div class="form-group">
																	<label class="form-label" for="Name">Email </label>
																	<div class="form-control-wrap">
																		<input type="email" class="form-control" name="email" id="email" placeholder="Email">
																	</div>
																</div>
															</div>
											
														
																				
														
															<button type="button" class="btn btn-primary">Save</button>
														
														</div>
										
     												</form>	
                                                    </div>
                                                    <div class="tab-pane" id="tabItem7">
													<form action="#" method="POST" id="add_menu">
														<div class="row g-4">
														

															<div class="col-lg-6">
																<div class="form-group">
																	<label class="form-label" for="Name">Person Name </label>
																	<div class="form-control-wrap">
																		<input type="email" class="form-control" name="name" id="name" placeholder=" Name">
																	</div>
																</div>
															</div>

															<div class="col-lg-6">
																<div class="form-group">
																	<label class="form-label" for="Name"> Address </label>
																	<div class="form-control-wrap">
																		<input type="email" class="form-control" name="address" id="address" placeholder=" Address">
																	</div>
																</div>
															</div>
															<div class="col-lg-6">
																<div class="form-group">
																	<label class="form-label" for="Name"> Address 2</label>
																	<div class="form-control-wrap">
																		<input type="email" class="form-control" name="address" id="address" placeholder=" Address">
																	</div>
																</div>
															</div>
															<div class="col-lg-6">
																<div class="form-group">
																	<label class="form-label" for="Name"> City </label>
																	<div class="form-control-wrap">
																		<input type="email" class="form-control" name="city" id="city" placeholder=" City">
																	</div>
																</div>
															</div>
															
															<div class="col-lg-6">
																<div class="form-group">
																	<label class="form-label" for="Name"> State </label>
																	<div class="form-control-wrap">
																		<input type="text" class="form-control" name="state" id="state" placeholder=" State">
																	</div>
																</div>
															</div>
														
															
															<div class="col-lg-6">
																<div class="form-group">
																	<label class="form-label" for="Name"> Zipcode </label>
																	<div class="form-control-wrap">
																		<input type="text" class="form-control" name="zipcode" id="zipcode" placeholder=" Zipcode">
																	</div>
																</div>
															</div>
													
														
																				
														
															<button type="button" class="btn btn-primary">Save</button>
														
														</div>
										
     												</form>	
                                                    </div>
                            
                                                </div>
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
