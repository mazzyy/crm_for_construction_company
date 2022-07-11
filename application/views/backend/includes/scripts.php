



<script src="<?= base_url() ?>assets/assets/js/bundle.js?ver=2.0.0"></script>
<script src="<?= base_url() ?>assets/assets/js/scripts.js?ver=2.0.0"></script>
<script src="<?= base_url() ?>assets/jquery-overlay/loadingoverlay.min.js"></script>
<script>
	function imageOverlay(selector, type) {
		if (selector === "") {
			if (type === 'hide') {
				setTimeout(function() {
					$('body').LoadingOverlay(type, {
						zIndex: 10000
					});
				}, 1000);
			} else {
				$('body').LoadingOverlay(type, {
					zIndex: 10000
				});
			}
		} else {
			if (type === 'hide') {
				setTimeout(function() {
					$(selector).LoadingOverlay(type, {
						zIndex: 10000
					});
				}, 1000);
			} else {
				$(selector).LoadingOverlay(type, {
					zIndex: 10000
				});
			}
		}
	}
</script>


<!-- PASSWORD UPDATE AJAX FUNCTION -->
<script type="text/javascript">
	$(document).ready(function() {
		$("#change_password").on('submit', (function(e) {
			e.preventDefault();
			var fd = new FormData(this);
			$.ajax({
				url: '<?php echo base_url("Users/change_pass") ?>',
				data: fd,
				type: "POST",
				contentType: false,
				processData: false,
				cache: false,
				beforeSend: function() {
					imageOverlay('#change_password', 'show');
				},
				complete: function(data) {
					imageOverlay('#change_password', 'hide');
				},
				success: function(res) {
					var res = $.parseJSON(res);
					if (res.msg_type === 'success') {
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

	// UPDATE PROFILE

	$(document).ready(function() {
		$("#update_profile").on('submit', (function(e) {
			e.preventDefault();
			var fd = new FormData(this);
			$.ajax({
				url: '<?php echo base_url("Dashboard/save_update_profile") ?>',
				data: fd,
				type: "POST",
				contentType: false,
				processData: false,
				cache: false,
				beforeSend: function() {
					imageOverlay('#update_profile', 'show');
				},
				complete: function(data) {
					imageOverlay('#update_profile', 'hide');
				},
				success: function(res) {
					// alert(res);
					var res = $.parseJSON(res);
					if (res.msg_type === 'success') {
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
<!-- /PASSWORD UPDATE AJAX FUNCTION -->