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
		<?php $this->load->view('Backend/includes/sidebar'); ?>
		<!-- /SidBar -->


		<!-- wrap @s -->
		<div class="nk-wrap ">

			<!-- /Header -->
			<?php $this->load->view('Backend/includes/header'); ?>
			<!-- /Header -->

			<!-- content @s -->
			<div class="nk-content ">
				<div class="container-fluid">
					<div class="nk-content-inner">
						<div class="nk-content-body">
							<div class="components-preview wide-md mx-auto">
								<div class="nk-block nk-block-lg">

									<div class="card card-preview">
										<div class="card-inner">
											<ul class="nav nav-tabs mt-n3" id="myTab">
												<li class="nav-item">
													<a class="nav-link active " id="first_tab" data-toggle="tab" href="#tabItem5"><em class="icon ni ni-user"></em><span>General info</span></a>
												</li>
												<li class="nav-item" >
													<a class="nav-link" data-toggle="tab"  id="second_tab"  href="#tabItem6"><em class="icon ni ni-contact"></em><span>Contact Info</span></a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" id="third_tab"  href="#tabItem7"><em class="icon ni ni-map-pin"></em><span>Ship To Address</span></a>
												</li>
											</ul>
											<div class="tab-content">
												<div class="tab-pane active animated fadeIn" id="tabItem5">
													<!--<form action="#" method="POST" id="add_vendor">-->
														<div class="row g-4">
															<div class="col-sm-6">
																<div class="form-group">
																	<!--<label class="form-label" for="default-03">First Name</label>-->
																	<div class="form-control-wrap">
																		<div class="form-icon form-icon-left">
																			<em class="icon ni ni-user"></em>
																		</div>
																		<input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
																	</div>
																</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group">
																	<!--<label class="form-label" for="default-03">Last Name</label>-->
																	<div class="form-control-wrap">
																		<div class="form-icon form-icon-left">
																			<em class="icon ni ni-user"></em>
																		</div>
																		<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
																	</div>
																</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group">
																	<!--<label class="form-label" for="default-03">Primary Email</label>-->
																	<div class="form-control-wrap">
																		<div class="form-icon form-icon-left">
																			<em class="icon ni ni-mail"></em>
																		</div>
																		<input type="text" class="form-control" name="email" id="email" placeholder="Primary Email: admin@example.com">
																	</div>
																</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group">
																	<!--<label class="form-label" for="default-03">Primary Contact No.</label>-->
																	<div class="form-control-wrap">
																		<div class="form-icon form-icon-left">
																			<em class="icon ni ni-mobile"></em>
																		</div>
																		<input type="text" class="form-control" name="contact" id="contact" placeholder="Primary No:(000)-000-0000">
																	</div>
																</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group">
																	<!--<label class="form-label" for="default-03">Address 1</label>-->
																	<div class="form-control-wrap">
																		<div class="form-icon form-icon-left">
																			<em class="icon ni ni-map-pin"></em>
																		</div>
																		<input type="text" class="form-control" name="vendor_address1" id="vendor_address1" placeholder="Address 1">
																	</div>
																</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group">
																	<!--<label class="form-label" for="default-03">Address 2</label>-->
																	<div class="form-control-wrap">
																		<div class="form-icon form-icon-left">
																			<em class="icon ni ni-map-pin"></em>
																		</div>
																		<input type="text" class="form-control" name="vendor_address2" id="vendor_address2" placeholder="Address 2">
																	</div>
																</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group">
																	<!--<label class="form-label" for="default-03">ZipCode</label>-->
																	<div class="form-control-wrap">
																		<div class="form-icon form-icon-left">
																			<em class="icon ni ni-map-pin-fill"></em>
																		</div>
																		<input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="zipcode">
																	</div>
																</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group">
																	<!--<label class="form-label" for="default-03">City</label>-->
																	<div class="form-control-wrap">
																		<div class="form-icon form-icon-left">
																			<em class="icon ni ni-map-pin-fill"></em>
																		</div>
																		<input type="text" class="form-control" name="city" id="city" placeholder="City">
																	</div>
																</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group">
																	<!--<label class="form-label" for="default-03">State</label>-->
																	<div class="form-control-wrap">
																		<div class="form-icon form-icon-left">
																			<em class="icon ni ni-map-pin-fill"></em>
																		</div>
																		<input type="text" class="form-control" name="state" id="state" placeholder="State">
																	</div>
																</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group">
																	<!--<label class="form-label" for="default-03">Whatsapp Number</label>-->
																	<div class="form-control-wrap">
																		<div class="form-icon form-icon-left">
																			<em class="icon ni ni-whatsapp"></em>
																		</div>
																		<input type="text" class="form-control" name="whatsapp" id="whatsapp_number" placeholder="Whatsapp No: (000)-000-0000">
																	</div>
																</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group">
																	<div class="form-control-wrap">
																		<select class="form-select form-control form-control-lg" data-search="on" data-placeholder="Select Tax Status" name="tax_status" id="tax_status">
																		
																		</select>
																	</div>
																</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group">
																	<!--<label class="form-label" for="default-03">Tax ID</label>-->
																	<div class="form-control-wrap">
																		<div class="form-icon form-icon-left">
																			<em class="icon ni ni-task"></em>
																		</div>
																		<input type="text" class="form-control" name="tax_id" id="tax_id" placeholder="Tax ID:">
																	</div>
																</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group">
																	<div class="form-control-wrap">
																		<select class="form-select form-control form-control-lg" data-search="on" data-placeholder="Select Vendor Type" name="vendor_type" id="vendor_type">
																			
																		</select>
																	</div>
																</div>
															</div>
															<input type="hidden" name="business_id" value="1" />
															<div class="col-12">
																<div class="form-group">
					
																	<a class="btn btn-primary" onclick="$('#second_tab').trigger('click')"  href="#tabItem6"><span>Next</span></a>
																	
																</div>
															</div>
														</div>
													<!--</form>-->
												</div>
												<div class="tab-pane animated fadeIn" id="tabItem6">

													<!--<form action="#" method="POST" id="add_vendor_contact">-->
														<div class="row g-4">
															<div class="col-sm-6">
																<div class="form-group">
																	<!--<label class="form-label" for="default-03">First Name</label>-->
																	<div class="form-control-wrap">
																		<div class="form-icon form-icon-left">
																			<em class="icon ni ni-user"></em>
																		</div>
																		<input type="text" class="form-control" name="contact_person_name" id="contact_person_name" placeholder="Contact Person Name">
																	</div>
																</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group">
																	<!--<label class="form-label" for="default-03">Last Name</label>-->
																	<div class="form-control-wrap">
																		<div class="form-icon form-icon-left">
																			<em class="icon ni ni-user"></em>
																		</div>
																		<input type="text" class="form-control" name="contact_person_title" id="last_name" placeholder="Contact Person Title">
																	</div>
																</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group">
																	<!--<label class="form-label" for="default-03">Primary Email</label>-->
																	<div class="form-control-wrap">
																		<div class="form-icon form-icon-left">
																			<em class="icon ni ni-mail"></em>
																		</div>
																		<input type="text" class="form-control" name="contact_person_email" id="contact_person_email" placeholder="Email: admin@example.com">
																	</div>
																</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group">
																	<!--<label class="form-label" for="default-03">Primary Contact No.</label>-->
																	<div class="form-control-wrap">
																		<div class="form-icon form-icon-left">
																			<em class="icon ni ni-mobile"></em>
																		</div>
																		<input type="text" class="form-control" name="person_contact" id="person_contact" placeholder="Contact No:(000)-000-0000">
																	</div>
																</div>
															</div>
															<input type="hidden" name="business_id" value="1" />
															<div class="col-12">
																<div class="form-group">
																<a class="btn btn-primary" onclick="$('#first_tab').trigger('click')"  href="#tabItem6"><span>Back</span></a>
																	<a class="btn btn-primary" onclick="$('#third_tab').trigger('click')" href="#tabItem6"><span>Next</span></a>
																	<!--<button type="submit" class="btn btn-primary">Next</button>-->
																</div>
															</div>
														</div>
													<!--</form>-->
												</div>

												<div class="tab-pane animated fadeIn" id="tabItem7">
													<div class="tab-content">
														<!--<form action="#" method="POST" id="add_vendor_contact">-->
															<div class="row g-4">
																<div class="col-sm-6">
																	<div class="form-group">
																		<!--<label class="form-label" for="default-03">First Name</label>-->
																		<div class="form-control-wrap">
																			<div class="form-icon form-icon-left">
																				<em class="icon ni ni-user"></em>
																			</div>
																			<input type="text" class="form-control" name="contact_person_name" id="contact_person_name" placeholder="Name">
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<!--<label class="form-label" for="default-03">Last Name</label>-->
																		<div class="form-control-wrap">
																			<div class="form-icon form-icon-left">
																				<em class="icon ni ni-map-pin"></em>
																			</div>
																			<input type="text" class="form-control" name="contact_person_title" id="last_name" placeholder="Address1">
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<!--<label class="form-label" for="default-03">Primary Email</label>-->
																		<div class="form-control-wrap">
																			<div class="form-icon form-icon-left">
																				<em class="icon ni ni-map-pin"></em>
																			</div>
																			<input type="text" class="form-control" name="contact_person_email" id="contact_person_email" placeholder="Address2">
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<!--<label class="form-label" for="default-03">Primary Contact No.</label>-->
																		<div class="form-control-wrap">
																			<div class="form-icon form-icon-left">
																				<em class="icon ni ni-mobile"></em>
																			</div>
																			<input type="text" class="form-control" name="person_contact" id="person_contact" placeholder="Zipcode">
																		</div>
																	</div>
																</div>

																<div class="col-12">
																	<div class="form-group">
																	<a class="btn btn-primary" onclick="$('#second_tab').trigger('click')" href="#tabItem6"><span>Back</span></a>
																		<button type="submit" class="btn btn-primary">Save</button>
																	</div>
																</div>
															</div>
														<!--</form>-->
													</div>
												</div>

											</div>
										</div>
									</div><!-- .card-preview -->

								</div>

							</div><!-- .components-preview -->
						</div>
					</div>
				</div>
			</div>
			<!-- content @e -->

			<!-- footer @s -->
			<?php $this->load->view('Backend/includes/footer'); ?>
			<!-- footer @e -->
		</div>
		<!-- wrap @e -->
	</div>
	<!-- main @e -->
</div>
<!-- JavaScript -->
<?php $this->load->view('Backend/includes/scripts'); ?>
<!-- /JavaScript -->

<script>

	$(document).ready(function () {
		$("#add_vendor").on('submit', (function (e) {
			e.preventDefault();
			var fd = new FormData(this);
			$.ajax({
				url: '<?php echo base_url("Vendor/save_vendor") ?>',
				data: fd,
				type: "POST",
				contentType: false,
				processData: false,
				cache: false,
				beforeSend: function(){
					imageOverlay('#add_vendor','show');
				},
				complete:function(data){
					imageOverlay('#add_vendor','hide');
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
		$('.select2bs4').select2({
			theme: 'bootstrap4'
		});
	});

</script>

<!-- ADD VENDOR CONTACT -->
<script>
	$(document).ready(function () {
		$("#add_vendor_contact").on('submit', (function (e) {
			e.preventDefault();
			var fd = new FormData(this);
			$.ajax({
				url: '<?php echo base_url("Vendor/add_vendor_contact") ?>',
				data: fd,
				type: "POST",
				contentType: false,
				processData: false,
				cache: false,
				beforeSend: function(){
					imageOverlay('#add_vendor_contact','show');
				},
				complete:function(data){
					imageOverlay('#add_vendor_contact','hide');
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
		$('.select2bs4').select2({
			theme: 'bootstrap4'
		});
	});



</script>
<!-- /ADD VENDOR CONTACT -->


<script>

	$("#zipcode").change(function(e){
		console.log(e.target.value)
		var zipcode = e.target.value;
		$.ajax({
			type: "POST",
			url: '<?php echo base_url("Administration/get_location_by_zipcode") ?>',
			data: {zipcode : zipcode},
			success: function (res) {
				var res = $.parseJSON(res);
				if (res.data[0] != undefined || res.data.length != 0)
				{
					console.log(res.data);
					console.log(res.data[0].location_address)
					$('#city').val(res.data[0].location_city)
					$('#state').val(res.data[0].location_state)
				}
				else
				{
					$('#city').val('')
					$('#state').val('')
				}

				}

		});
	});

</script>


<script>
	$(document).ready(function(){
		$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
			localStorage.setItem('activeTab', $(e.target).attr('href'));
		});
		var activeTab = localStorage.getItem('activeTab');
		if(activeTab){
			$('#myTab a[href="' + activeTab + '"]').tab('show');
		}
	});
</script>

</body>
</html>
