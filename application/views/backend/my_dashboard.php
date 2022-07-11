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
								<div class="components-preview wide-md mx-auto">
									<div class="nk-block nk-block-lg">

										<div class="card card-preview">
											<div class="card-inner">
												<ul class="nav nav-tabs mt-n3">
													<li class="nav-item">
														<a class="nav-link active " data-toggle="tab" href="#tabItem5"><em class="icon ni ni-user"></em><span>My Details</span></a>
													</li>
													<li class="nav-item">
														<a class="nav-link " data-toggle="tab" href="#tabItem6"><em class="icon ni ni-folder"></em><span>Documents</span></a>
													</li>

												</ul>
												<div class="tab-content">
													<div class="tab-pane active" id="tabItem5">

														<form action="#" method="POST" id="update_my_details">
															<div class="row g-4">
																<div class="col-sm-6">
																	<div class="form-group">
																		<label class="form-label" for="default-03">First Name</label>
																		<div class="form-control-wrap">
																			<div class="form-icon form-icon-left">
																				<em class="icon ni ni-user"></em>
																			</div>
																			<input type="text" class="form-control" name="first_name" id="first_name" value="<?= $registration->first_name; ?>">
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label class="form-label" for="default-03">Middle Name</label>
																		<div class="form-control-wrap">
																			<div class="form-icon form-icon-left">
																				<em class="icon ni ni-user"></em>
																			</div>
																			<input type="text" class="form-control" name="middle_name" id="middle_name" value="<?= $registration->middle_name; ?>">
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label class="form-label" for="default-03">Last Name</label>
																		<div class="form-control-wrap">
																			<div class="form-icon form-icon-left">
																				<em class="icon ni ni-user"></em>
																			</div>
																			<input type="text" class="form-control" name="last_name" id="last_name" value="<?= $registration->last_name; ?>">
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label class="form-label" for="default-03">Email</label>
																		<div class="form-control-wrap">
																			<div class="form-icon form-icon-left">
																				<em class="icon ni ni-mail"></em>
																			</div>
																			<input type="email" class="form-control" name="email" id="email" value="<?= $registration->email; ?>" disabled>
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label class="form-label" for="default-03">Cell Number</label>
																		<div class="form-control-wrap">
																			<div class="form-icon form-icon-left">
																				<em class="icon ni ni-mobile"></em>
																			</div>
																			<input type="text" class="form-control" name="contact" id="phone_number" value="<?= $registration->contact; ?>">
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label class="form-label" for="default-03">Whatsapp Number</label>
																		<div class="form-control-wrap">
																			<div class="form-icon form-icon-left">
																				<em class="icon ni ni-whatsapp"></em>
																			</div>
																			<input type="text" class="form-control" name="whatsapp" id="whatsapp_number" value="<?= $registration->whatsapp; ?>">
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label class="form-label" for="default-03">Address</label>
																		<div class="form-control-wrap">
																			<div class="form-icon form-icon-left">
																				<em class="icon ni ni-map-pin"></em>
																			</div>
																			<input type="text" class="form-control" name="address" id="address" value="<?= $registration->address; ?>">
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label class="form-label" for="default-03">School Attended</label>
																		<div class="form-control-wrap">
																			<div class="form-icon form-icon-left">
																				<em class="icon ni ni-home"></em>
																			</div>
																			<input type="text" class="form-control" name="school_attended" id="school_attended" value="<?= $registration->school_attended; ?>">
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label class="form-label" for="default-03">Date of birth</label>
																		<div class="form-control-wrap">
																			<div class="form-icon form-icon-left">
																				<em class="icon ni ni-calendar"></em>
																			</div>
																			<input type="text" class="form-control date-picker" name="dob" id="dob" value="<?= $registration->dob; ?>">
																		</div>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="form-label" for="gender">Gender</label>
																		<div class="preview-block">
																			<div class="custom-control custom-radio">
																				<input type="radio" id="male" value="1" name="customRadio" class="custom-control-input" <?php if ($registration->gender == '1') { ?> checked <?php } ?>>
																				<label class="custom-control-label" for="male">Male</label>

																			</div>

																			<div class="custom-control custom-radio" style="margin-left: 10px;">
																				<input type="radio" id="female" value="0" name="customRadio" class="custom-control-input" <?php if ($registration->gender == '0') { ?> checked <?php } ?>>
																				<label class="custom-control-label" for="female">Female</label>

																			</div>
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label class="form-label">Degree of Interest</label>
																		<div class="form-control-wrap">
																			<select class="form-select form-control form-control-lg" data-search="on" data-placeholder="Select Degree" name="degree_of_interest" id="degree_of_interest">
																				<option value="">Select Degree</option>
																				<?php for($i=0; $i<count($degrees); $i++): ?>
																					<option value="<?= $degrees[$i]['degree_id'];?>" <?php if($registration->degree_id == $degrees[$i]['degree_id']  ) {
																						echo 'selected';
																					};?> > <?= $degrees[$i]['degree']  ?></option>
																				<?php endfor; ?>
																			</select>
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">

																	<div class="form-group">
																		<label class="form-label">Program of Interest</label>
																		<div class="form-control-wrap">
																				<select class="form-select form-control form-control-lg" data-search="on" data-placeholder="Program of Interest" name="program_of_interest" id="program_of_interest">
																				</select>
																		</div>
																	</div>


																		</div>
																<div class="row g" id="reg_file" style="width:100%">

																	<div class="col-sm-6">
																		<div class="form-group">
																			<label class="form-label" for="default-06">Upload Document</label>
																			<div class="form-control-wrap">
																				<div class="custom-file">
																					<input type="file" name="files[]" class="custom-file-input" multiple="multiple" style="padding-top: 5px;">
																					<!-- <input type="file" multiple="multiple" name="files[]" > -->
																					<label class="custom-file-label" for="customFile">Choose file</label>
																				</div>
																			</div>
																		</div>
																	</div>

																	<div class="col-sm-3">
																		<div class="form-group">
																			<label class="form-label" for="default-03">Document Title</label>
																			<div class="form-control-wrap">
																				<div class="form-icon form-icon-left">
																					<em class="icon ni ni-pen"></em>
																				</div>
																				<input type="text" class="form-control" name="doc_title" id="doc_title" value="">
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-3">
																		<div class="form-group">
																			<label class="form-label" for="default-03"></label>
																			<div class="form-control-wrap">
																				<a href="#" class="add"><span class="icon ni ni-plus"></span> Add more</a>
																			</div>
																		</div>
																	</div>

																</div>
																<input type="hidden" name="user_id" value="<?= $this->session->userdata['id']; ?>">
																<div class="col-12">
																	<div class="form-group">
																		<button type="submit" class="btn btn-primary">Update</button>
																	</div>
																</div>
															</div>
														</form>

														<!-- <p>Cillum ad ut irure tempor velit nostrud occaecat ullamco aliqua anim Lorem sint. Veniam sint duis incididunt do esse magna mollit excepteur laborum qui. Id id reprehenderit sit est eu aliqua occaecat quis et velit excepteur laborum mollit dolore eiusmod. Ipsum dolor in occaecat commodo et voluptate minim reprehenderit mollit pariatur. Deserunt non laborum enim et cillum eu deserunt excepteur ea incid.</p> -->
													</div>
													<div class="tab-pane" id="tabItem6">

														<div class="tab-content">
															<div class="tab-pane active" id="file-grid-view">
																<div class="nk-files nk-files-view-grid">

																	<div class="nk-files-list">

																	<?php if(!empty($docs)): ?>
																		<?php foreach ($docs as $row) : ?>
																			<div class="nk-file-item nk-file">
																				<div class="nk-file-info">
																					<div class="nk-file-title">
																						<div class="nk-file-icon">
																							<a class="nk-file-icon-link" href="#">
																								<span class="nk-file-icon-type">
																									<?php $extension = pathinfo($row['file_name'], PATHINFO_EXTENSION); ?>

																									<?php if ($extension == 'docx') { ?>
																										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
																											<g>
																												<path d="M50,61H22a6,6,0,0,1-6-6V22l9-11H50a6,6,0,0,1,6,6V55A6,6,0,0,1,50,61Z" style="fill:#599def" />
																												<path d="M25,20.556A1.444,1.444,0,0,1,23.556,22H16l9-11h0Z" style="fill:#c2e1ff" />
																												<rect x="27" y="31" width="18" height="2" rx="1" ry="1" style="fill:#fff" />
																												<rect x="27" y="36" width="18" height="2" rx="1" ry="1" style="fill:#fff" />
																												<rect x="27" y="41" width="18" height="2" rx="1" ry="1" style="fill:#fff" />
																												<rect x="27" y="46" width="12" height="2" rx="1" ry="1" style="fill:#fff" />
																											</g>
																										</svg>

																									<?php } elseif ($extension == 'pdf') { ?>

																										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
																											<path d="M50,61H22a6,6,0,0,1-6-6V22l9-11H50a6,6,0,0,1,6,6V55A6,6,0,0,1,50,61Z" style="fill:#f26b6b" />
																											<path d="M25,20.556A1.444,1.444,0,0,1,23.556,22H16l9-11h0Z" style="fill:#f4c9c9" />
																											<path d="M46.3342,44.5381a4.326,4.326,0,0,0-2.5278-1.4289,22.436,22.436,0,0,0-4.5619-.3828A19.3561,19.3561,0,0,1,35.82,37.9536a56.5075,56.5075,0,0,0,1.3745-6.0858,2.339,2.339,0,0,0-.4613-1.8444,1.9429,1.9429,0,0,0-1.5162-.753h-.0014a1.6846,1.6846,0,0,0-1.3893.6966c-1.1493,1.5257-.3638,5.219-.1941,5.9457a12.6118,12.6118,0,0,0,.7236,2.1477,33.3221,33.3221,0,0,1-2.49,6.1052,20.3467,20.3467,0,0,0-5.9787,3.4413,2.5681,2.5681,0,0,0-.8861,1.8265,1.8025,1.8025,0,0,0,.6345,1.3056,2.0613,2.0613,0,0,0,1.3942.5313,2.2436,2.2436,0,0,0,1.4592-.5459,20.0678,20.0678,0,0,0,4.2893-5.3578,20.8384,20.8384,0,0,1,5.939-1.1858A33.75,33.75,0,0,0,42.96,47.7858,2.6392,2.6392,0,0,0,46.376,47.55,2.08,2.08,0,0,0,46.3342,44.5381ZM27.6194,49.6234a.8344.8344,0,0,1-1.0847.0413.4208.4208,0,0,1-.1666-.2695c-.0018-.0657.0271-.3147.4408-.736a18.0382,18.0382,0,0,1,3.7608-2.368A17.26,17.26,0,0,1,27.6194,49.6234ZM34.9023,30.848a.343.343,0,0,1,.3144-.1514.6008.6008,0,0,1,.4649.2389.853.853,0,0,1,.1683.6722v0c-.1638.92-.4235,2.381-.8523,4.1168-.0125-.05-.0249-.1-.037-.1506C34.6053,34.0508,34.3523,31.5779,34.9023,30.848ZM33.7231,43.5507a34.9732,34.9732,0,0,0,1.52-3.7664,21.2484,21.2484,0,0,0,2.2242,3.05A21.8571,21.8571,0,0,0,33.7231,43.5507Zm11.7054,2.97a1.3085,1.3085,0,0,1-1.6943.0887,33.2027,33.2027,0,0,1-3.0038-2.43,20.9677,20.9677,0,0,1,2.8346.3335,2.97,2.97,0,0,1,1.7406.9647C45.8377,46.1115,45.6013,46.3483,45.4285,46.5212Z" style="fill:#fff" />
																										</svg>

																									<?php } else { ?>

																										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
																											<path d="M50,61H22a6,6,0,0,1-6-6V22l9-11H50a6,6,0,0,1,6,6V55A6,6,0,0,1,50,61Z" style="fill:#755de0" />
																											<path d="M27.2223,43H44.7086s2.325-.2815.7357-1.897l-5.6034-5.4985s-1.5115-1.7913-3.3357.7933L33.56,40.4707a.6887.6887,0,0,1-1.0186.0486l-1.9-1.6393s-1.3291-1.5866-2.4758,0c-.6561.9079-2.0261,2.8489-2.0261,2.8489S25.4268,43,27.2223,43Z" style="fill:#fff" />
																											<path d="M25,20.556A1.444,1.444,0,0,1,23.556,22H16l9-11h0Z" style="fill:#b5b3ff" />
																										</svg>


																									<?php }  ?>

																								</span>
																							</a>
																						</div>
																						<div class="nk-file-name">
																							<div class="nk-file-name-text">
																								<a href="#" class="title"><?= $row['file_name'] ?></a>
																							</div>
																						</div>
																					</div>
																					<ul class="nk-file-desc">
																						<li class="date">03 May</li>
																						<!-- <li class="size"><//?= filesize(base_url().'uploads/student_documents/'.$row['file_name']); ?></li> -->
																						<li class="members">3 Members</li>
																					</ul>
																				</div>
																				<div class="nk-file-actions">
																					<div class="dropdown">
																						<a href="" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
																						<div class="dropdown-menu dropdown-menu-right">
																							<ul class="link-list-plain no-bdr">
																								<li><a href="<?php echo base_url() . 'uploads/student_documents/' . $row['file_name']; ?>" download class="file-dl-toast"><em class="icon ni ni-download"></em><span>Download</span></a></li>
																								<li><a href="#" onclick="deleten(this)" value="<?= $row['file_name']; ?>" class="file-dl-toast"><em class="icon ni ni-trash"></em><span>Delete</span></a></li>
																								<!-- <button type="button" onclick="deleten(this)" value="<?= $row['file_name']; ?>" class="btn btn-xs btn-danger"><span class="icon ni ni-trash"></span></button> -->
																								<li> </li>
																							</ul>
																						</div>
																					</div>
																				</div>
																			</div><!-- .nk-file -->
																		<?php endforeach; ?>
																		<?php endif; ?>
																	</div>

																</div><!-- .nk-files -->
															</div><!-- .tab-pane -->

														</div><!-- .tab-content -->

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



	<script type="text/javascript">
		// $(".add").click(function(a) {
		function deleten(a) {
			console.log($(a).attr('value'))
			// function validate(a) {
				// alert($(this).attr('value'));
				
		// var file_name= a.value;
		// console.log(file_name)
		swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Yes, delete it!'
		}).then( function(result) {
			if (result.value) {

				$.ajax({
					type: 'POST',
					url: '<?= base_url('Registration/delete_reg_doc')?>',
					data: {'filename': $(a).attr('value'), 'user_id' : <?= $this->session->userdata['id']; ?>}
				}).then(function(res){
					var res = $.parseJSON(res);
					if(res.msg_type === 'success') {
						$(a).closest('tr').remove();
						swal.fire('Deleted!', 'Document has been Deleted.', 'success');
						setTimeout(function(){
							location.reload();
						}, 300);
					}else{
						swal.fire('Error','Ops something went wrong','error');
					}
				}, function(err){
					swal.fire('Error', err.statusText, 'error');
				});

			} else if (result.dismiss === 'cancel') {
				swal.fire(
					'Cancelled',
					'Your imaginary file is safe :)',
					'error'
				)
			}
		})
		}
	</script>



	<script>
		$(document).ready(function() {
			$("#update_my_details").on('submit', (function(e) {
				e.preventDefault();
				var fd = new FormData(this);
				$.ajax({
					url: '<?php echo base_url("Registration/update_my_detail") ?>',
					data: fd,
					type: "POST",
					contentType: false,
					processData: false,
					cache: false,
					beforeSend: function() {
						imageOverlay('#update_my_details', 'show');
					},
					complete: function(data) {
						imageOverlay('#update_my_details', 'hide');
					},
					success: function(res) {
						var res = $.parseJSON(res);
						if (res.msg_type == 'success') {
							NioApp.Toast(res.message, 'success', {
								position: 'top-right',
								icon: 'auto',
								ui: ''
							});
							setTimeout(function() {
								location.reload();
							}, 2000);

						} else {
							var temp = res.message.split("<p>");
							var temp2 = temp;
							$.each(temp2, function(index, value) {
								console.log(value);
								if (typeof value !== "undefined") {
									if (value) {
										NioApp.Toast('<h5>' + value + '</h5>', 'error', {
											position: 'top-right',
											icon: 'auto',
											ui: ''
										});
									}
								}
							});
						}
					},
					error: function(xhr) {
						$("#msg").html("Error: - " + xhr.status + " " + xhr.statusText);
					}
				});
			}));
		});
	</script>


	<script type="text/javascript">
		var i = 0;
		$(".add").click(function(e) {

			e.preventDefault();
			var html = "";


			html += '<div class="col-sm-6"  ><div class="form-group' + i + '" >'
			html += '<label class="form-label" for="default-06">Upload Document</label>'
			html += '<div class="form-control-wrap"><input type="file" name="files[]" multiple="multiple" id="customFile' + i + '" onchange="showname(' + i + ')">  '
			html += '<label class="custom-file-label" for="customFile' + i + '" id="fileName' + i + '">Choose file</label>'
			html += '</div>'
			html += '</div>'
			html += '</div>'
			html += '</div>'
			html += '<div class="col-sm-3" ><div class="form-group' + i + '"><label class="form-label" for="default-03">Document Title</label><div class="form-control-wrap"><div class="form-icon form-icon-left"><em class="icon ni ni-pen"></em></div><input type="text" class="form-control" name="doc_title" ></div></div></div>'
			html += '<div class="col-sm-3">'
			html += '<div class="form-group' + i + '">'
			html += '<label class="form-label" for="default-03"></label>'
			html += '<div class="form-control-wrap">'
			html += '<a href="#" val="' + i + '"  class="remove" ><span class="icon ni ni-minus"></span> Remove</a>'
			html += '</div>'
			html += '</div>'
			html += '</div>'
			i++
			$("#reg_file").append(html);
		});

		$(document).on('click', '.remove', function(e) {
			e.preventDefault();
			var id = this.getAttribute('val');
			$("#" + id).remove();
			$('.form-group' + id).remove();
		});

		function showname(id) {
			var name = document.getElementById('customFile' + id);
			$("#fileName" + id).html(name.files.item(0).name);
		};




		$("#degree_of_interest").change(function(e){
			var id = $(this).val();

			console.log(id)
			$.ajax({
				type: "POST",
				url: "<?= base_url("Registration/get_degree_programs_by_id") ?>",
				data: {'degree_id': id},
				success: function(data) {
					var res = data;
					$('#program_of_interest').html(res);
				}
			})
		});
	</script>







</body>

</html>
