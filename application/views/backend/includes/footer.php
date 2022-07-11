
<!-- @@ Profile Edit Modal @e -->
<div class="modal fade" tabindex="-1" role="dialog" id="profile_edit">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
			<div class="modal-body modal-body-lg">
				<h5 class="title"><em class="icon ni ni-user"></em> Update Profile </h5>
				<ul class="nk-nav nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#personal">Personal</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#password">Security and Login</a>
					</li>
				</ul><!-- .nav-tabs -->

				<div class="tab-content">
					<div class="tab-pane active" id="personal">
						<form method="POST" id="update_profile">
							<div class="row gy-4">
								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label" for="default-03">First Name</label>
										<div class="form-control-wrap">
											<div class="form-icon form-icon-left">
												<em class="icon ni ni-user"></em>
											</div>
											<input type="text" class="form-control rounded-pill" id="first_name" name="first_name" value="<?= $user->first_name ?>">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label" for="default-03">Last Name</label>
										<div class="form-control-wrap">
											<div class="form-icon form-icon-left">
												<em class="icon ni ni-user"></em>
											</div>
											<input type="text" class="form-control rounded-pill" id="last_name" name="last_name" value="<?= $user->last_name ?>">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label" for="default-03">Phone Number</label>
										<div class="form-control-wrap">
											<div class="form-icon form-icon-left">
												<em class="icon ni ni-mobile"></em>
											</div>
											<input type="text" class="form-control form-control rounded-pill" id="contact" name="contact" value="<?= $user->contact ?>" placeholder="">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label" for="default-03">Date of Birth</label>
										<div class="form-control-wrap">
											<div class="form-icon form-icon-left">
												<em class="icon ni ni-calendar"></em>
											</div>
											<input type="text" class="form-control form-control  date-picker rounded-pill" id="dob" name="dob" value="<?= $user->dob ?>" placeholder="Date of Birthday">
										</div>
									</div>
								</div>
								<div class="col-md-6">
								<div class="form-group">
										<label class="form-label" for="default-06">Profile pictue</label>
										<div class="form-control-wrap">
											<div class="custom-file">
												<input type="file" multiple class="custom-file-input" name="image" id="customFile">
												<label class="custom-file-label" for="customFile">Choose file</label>
											</div>
										</div>
									</div>
								</div>
								<input type="hidden" name='user_id' value="<?= $user->user_id ?>" />
								<div class="col-12">
									<button type="submit" class="btn btn-primary">Update</button>
									<button class="btn btn-danger" data-dismiss="modal" aria-label="Close">Close</button>
								</div>
							</div>
						</form>
					</div><!-- .tab-pane -->
					<div class="tab-pane" id="password">
						<form method="POST" id="change_password">

							<div class="row gy-4">
								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label" for="default-03">Current Password</label>
										<div class="form-control-wrap">
											<div class="form-icon form-icon-left">
												<em class="icon ni ni-lock"></em>
											</div>
											<input type="password" class="form-control rounded-pill" id="current_password" name="current_password" placeholder="Current Password">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label" for="address-l2">New Password</label>
										<div class="form-control-wrap">
											<div class="form-icon form-icon-left">
												<em class="icon ni ni-lock"></em>
											</div>
											<input type="password" class="form-control rounded-pill" id="new_password" name="new_password" placeholder="New Password">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label" for="address-st">Confirm New Password</label>
										<div class="form-control-wrap">
											<div class="form-icon form-icon-left">
												<em class="icon ni ni-lock"></em>
											</div>
											<input type="password" class="form-control rounded-pill" id="confirm_password" name="confirm_password" placeholder="Confirm New Password">
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="">
										<label class="form-label" for="address-st">Send Confirmation Email</label>
										<div class="">

											<div class="custom-control custom-switch">
												<input type="checkbox" class="custom-control-input" id="is_confirm">
												<label class="custom-control-label" for="is_confirm"></label>
											</div>
										</div>

									</div>
								</div>

								<div class="col-12">
									<!-- <div class="modal-footer bg-light"> -->
									<button type="submit" class="btn btn-primary">Update</button>
									<button class="btn btn-danger" data-dismiss="modal" aria-label="Close">Close</button>

								</div>
							</div>
						</form>
					</div><!-- .tab-pane -->

				</div><!-- .tab-content -->
			</div><!-- .modal-body -->
		</div><!-- .modal-content -->
	</div><!-- .modal-dialog -->
</div><!-- .modal -->




<div class="nk-footer">
	<div class="container-fluid">
		<div class="nk-footer-wrap">
			<div class="nk-footer-copyright justify-content-center"> &copy; <?= date('Y'); ?> <a href="#" target="_blank"><?= $company_info['name']?></a> All Rights Reserved.
			</div>
		</div>
	</div>
</div>
