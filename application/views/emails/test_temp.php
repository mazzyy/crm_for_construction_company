<!DOCTYPE html>
<html>
<head>
	<title>Email Verification</title>

	<!-- <link rel="stylesheet" href="<?= base_url()?>assets/assets/css/dashlite.css?ver=2.0.0"> -->
	<style>

		/* import font */
		/* @font-face { font-family: 'Roboto'; src: url("../fonts/Roboto-Light.eot"); src: local("Roboto Light"), local("Roboto-Light"), url("../fonts/Roboto-Light.eot?#iefix") format("embedded-opentype"), url("../fonts/Roboto-Light.woff2") format("woff2"), url("../fonts/Roboto-Light.woff") format("woff"), url("../fonts/Roboto-Light.ttf") format("truetype"); font-weight: 300; font-style: normal; }

		@font-face { font-family: 'Roboto'; src: url("../fonts/Roboto-Regular.eot"); src: local("Roboto"), local("Roboto-Regular"), url("../fonts/Roboto-Regular.eot?#iefix") format("embedded-opentype"), url("../fonts/Roboto-Regular.woff2") format("woff2"), url("../fonts/Roboto-Regular.woff") format("woff"), url("../fonts/Roboto-Regular.ttf") format("truetype"); font-weight: normal; font-style: normal; }

		@font-face { font-family: 'Roboto'; src: url("../fonts/Roboto-Medium.eot"); src: local("Roboto Medium"), local("Roboto-Medium"), url("../fonts/Roboto-Medium.eot?#iefix") format("embedded-opentype"), url("../fonts/Roboto-Medium.woff2") format("woff2"), url("../fonts/Roboto-Medium.woff") format("woff"), url("../fonts/Roboto-Medium.ttf") format("truetype"); font-weight: 500; font-style: normal; }

		@font-face { font-family: 'Roboto'; src: url("../fonts/Roboto-Bold.eot"); src: local("Roboto Bold"), local("Roboto-Medium"), url("../fonts/Roboto-Bold.eot?#iefix") format("embedded-opentype"), url("../fonts/Roboto-Bold.woff2") format("woff2"), url("../fonts/Roboto-Bold.woff") format("woff"), url("../fonts/Roboto-Bold.ttf") format("truetype"); font-weight: 700; font-style: normal; }

		@font-face { font-family: 'Nunito'; src: url("../fonts/Nunito-Regular.eot"); src: local("Nunito Regular"), local("Nunito-Regular"), url("../fonts/Nunito-Regular.eot?#iefix") format("embedded-opentype"), url("../fonts/Nunito-Regular.woff2") format("woff2"), url("../fonts/Nunito-Regular.woff") format("woff"), url("../fonts/Nunito-Regular.ttf") format("truetype"); font-weight: normal; font-style: normal; }

		@font-face { font-family: 'Nunito'; src: url("../fonts/Nunito-Bold.eot"); src: local("Nunito Bold"), local("Nunito-Bold"), url("../fonts/Nunito-Bold.eot?#iefix") format("embedded-opentype"), url("../fonts/Nunito-Bold.woff2") format("woff2"), url("../fonts/Nunito-Bold.woff") format("woff"), url("../fonts/Nunito-Bold.ttf") format("truetype"); font-weight: bold; font-style: normal; } */

		/** Bootstrap (https://getbootstrap.com/)  */
		:root { --blue: #559bfb; --indigo: #2c3782; --purple: #816bff; --pink: #ff63a5; --red: #e85347; --orange: #ffa353; --yellow: #f4bd0e; --green: #1ee0ac; --teal: #20c997; --cyan: #09c2de; --white: #fff; --gray: #6c757d; --gray-dark: #343a40; --primary: #6576ff; --secondary: #364a63; --success: #1ee0ac; --info: #09c2de; --warning: #f4bd0e; --danger: #e85347; --dark: #1c2b46; --gray: #8091a7; --light: #e5e9f2; --lighter: #f5f6fa; --breakpoint-xs: 0; --breakpoint-sm: 576px; --breakpoint-md: 768px; --breakpoint-lg: 992px; --breakpoint-xl: 1200px; --breakpoint-xxl: 1540px; --font-family-sans-serif: (Roboto, sans-serif), "Helvetica Neue", Arial, "Noto Sans", sans-serif; --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace; }

		/*! Email Template */
		.email-wraper { background: #f5f6fa; font-size: 14px; line-height: 22px; font-weight: 400; color: #8094ae; width: 100%; }

		.email-wraper a { color: #6576ff; word-break: break-all; }

		.email-wraper .link-block { display: block; }

		.email-ul { margin: 5px 0; padding: 0; }

		.email-ul:not(:last-child) { margin-bottom: 10px; }

		.email-ul li { list-style: disc; list-style-position: inside; }

		.email-ul-col2 { display: flex; flex-wrap: wrap; }

		.email-ul-col2 li { width: 50%; padding-right: 10px; }

		.email-body { width: 96%; max-width: 620px; margin: 0 auto; background: #ffffff; }

		.email-success { border-bottom: #1ee0ac; }

		.email-warning { border-bottom: #f4bd0e; }

		.email-btn { background: #6576ff; border-radius: 4px; color: #ffffff !important; display: inline-block; font-size: 13px; font-weight: 600; line-height: 44px; text-align: center; text-decoration: none; text-transform: uppercase; padding: 0 30px; }

		.email-btn-sm { line-height: 38px; }

		.email-header, .email-footer { width: 100%; max-width: 620px; margin: 0 auto; }

		.email-logo { height: 40px; }

		.email-title { font-size: 13px; color: #6576ff; padding-top: 12px; }

		.email-heading { font-size: 18px; color: #6576ff; font-weight: 600; margin: 0; line-height: 1.4; }

		.email-heading-sm { font-size: 24px; line-height: 1.4; margin-bottom: .75rem; }

		.email-heading-s1 { font-size: 20px; font-weight: 400; color: #526484; }

		.email-heading-s2 { font-size: 16px; color: #526484; font-weight: 600; margin: 0; text-transform: uppercase; margin-bottom: 10px; }

		.email-heading-s3 { font-size: 18px; color: #6576ff; font-weight: 400; margin-bottom: 8px; }

		.email-heading-success { color: #1ee0ac; }

		.email-heading-warning { color: #f4bd0e; }

		.email-note { margin: 0; font-size: 13px; line-height: 22px; color: #8094ae; }

		.email-copyright-text { font-size: 13px; }

		.email-social li { display: inline-block; padding: 4px; }

		.email-social li a { display: inline-block; height: 30px; width: 30px; border-radius: 50%; background: #ffffff; }

		.email-social li a img { width: 30px; }

		.pt-5, .py-5 { padding-top: 2.75rem !important; }

		.pb-5, .py-5 { padding-bottom: 2.75rem !important; }

		.text-center { text-align: center !important; }

		.pt-4, .py-4 { padding-top: 1.5rem !important; }

		.pb-4, .py-4 { padding-bottom: 1.5rem !important; }

		.pr-3, .px-3 { padding-right: 1rem !important; }


		.pl-3, .px-3 { padding-left: 1rem !important; }

		.pr-sm-5, .px-sm-5 { padding-right: 2.75rem !important; }

		.pb-sm-5, .py-sm-5 { padding-bottom: 2.75rem !important; }
		
		.pl-sm-5, .px-sm-5 { padding-left: 2.75rem !important; }

		.pt-3, .py-3 { padding-top: 1rem !important; }

		.pb-3, .py-3 { padding-bottom: 1rem !important; }

		.pt-sm-5, .py-sm-5 { padding-top: 2.75rem !important; }

		.pb-2, .py-2 { padding-bottom: 0.75rem !important; }

		.fs-12px { font-size: 12px; }

		.pt-4, .py-4 { padding-top: 1.5rem !important; } 

		h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 { margin-bottom: 0.5rem; font-family: Nunito, sans-serif; font-weight: 700; line-height: 1.1; color: #364a63; }

		h1, .h1 { font-size: 2rem; }

		h2, .h2 { font-size: 1.75rem; }

		h3, .h3 { font-size: 1.5rem; }

		h4, .h4 { font-size: 1.25rem; }

		h5, .h5 { font-size: 1.15rem; }

		h6, .h6 { font-size: 1rem; }
		
		h1, .h1, h2, .h2 {
			letter-spacing: -0.03em;
		}
	
		td {
			display: table-cell;
			vertical-align: inherit;
		}

		table {
				border-collapse: collapse;
			}

		table {
				border-collapse: separate;
				text-indent: initial;
				border-spacing: 2px;
			}
			.table { width: 100%; margin-bottom: 1rem; color: #526484; }

.table th, .table td { padding: 0.5rem; vertical-align: top; border-top: 1px solid #dbdfea; }

.table thead th { vertical-align: bottom; border-bottom: 2px solid #dbdfea; }

.table tbody + tbody { border-top: 2px solid #dbdfea; }

.table-sm th, .table-sm td { padding: 0.25rem; }

.table-bordered { border: 1px solid #dbdfea; }

.table-bordered th, .table-bordered td { border: 1px solid #dbdfea; }

.table-bordered thead th, .table-bordered thead td { border-bottom-width: 2px; }

.table-borderless th, .table-borderless td, .table-borderless thead th, .table-borderless tbody + tbody { border: 0; }

		*, *::before, *::after {
  		  box-sizing: border-box;
}

.container, .container-fluid, .container-sm, .container-md, .container-lg, .container-xl, .container-xxl {
    width: 100%;
    padding-right: 14px;
    padding-left: 14px;
    margin-right: auto;
    margin-left: auto;
}

h1:last-child, h2:last-child, h3:last-child, h4:last-child, h5:last-child, h6:last-child, .h1:last-child, .h2:last-child, .h3:last-child, .h4:last-child, .h5:last-child, .h6:last-child, p:last-child {
    margin-bottom: 0;
}

.mb-4, .my-4 {
    margin-bottom: 1.5rem !important;
}

/* body { margin: 0; font-family: Roboto, sans-serif, "Helvetica Neue", Arial, "Noto Sans", sans-serif; font-size: 0.875rem; font-weight: 400; line-height: 1.65; color: #526484; text-align: left; background-color: #f5f6fa; } */

[tabindex="-1"]:focus:not(:focus-visible) { outline: 0 !important; }

hr { box-sizing: content-box; height: 0; overflow: visible; }

h1, h2, h3, h4, h5, h6 { margin-top: 0; margin-bottom: 0.5rem; }

p { margin-top: 0; margin-bottom: 1rem; }
		
html { font-family: sans-serif; line-height: 1.15; -webkit-text-size-adjust: 100%; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); }

html { font-family: sans-serif; line-height: 1.15; -webkit-text-size-adjust: 100%; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); }

article, aside, figcaption, figure, footer, header, hgroup, main, nav, section { display: block; }

body { margin: 0; font-family: Roboto, sans-serif, "Helvetica Neue", Arial, "Noto Sans", sans-serif; font-size: 0.875rem; font-weight: 400; line-height: 1.65; color: #526484; text-align: left; background-color: #f5f6fa; }

[tabindex="-1"]:focus:not(:focus-visible) { outline: 0 !important; }

hr { box-sizing: content-box; height: 0; overflow: visible; }

h1, h2, h3, h4, h5, h6 { margin-top: 0; margin-bottom: 0.5rem; }

p { margin-top: 0; margin-bottom: 1rem; }

abbr[title], abbr[data-original-title] { text-decoration: underline; text-decoration: underline dotted; cursor: help; border-bottom: 0; text-decoration-skip-ink: none; }

address { margin-bottom: 1rem; font-style: normal; line-height: inherit; }

a {
    transition: color .4s, background-color .4s, border .4s, box-shadow .4s;
}


		@media (max-width: 480px) { .email-preview-page .card { border-radius: 0; margin-left: -20px; margin-right: -20px; }
			.email-ul-col2 li { width: 100%; } }
			
	</style>
</head>
<body>
<div class="container">
	<table class="email-wraper">
		<tr>
			<td class="py-5">
				<table class="email-header">
					<tbody>
					<tr>
						<td class="text-center pb-4">
							<a href="#"><img class="email-logo" src="https://technologicx.com/pictures/logo-dark2x.png" alt="logo"></a>
						</td>
					</tr>
					</tbody>
				</table>
				<table class="email-body">
					<tbody>
					<tr>
						<td class="px-3 px-sm-5 pt-3 pt-sm-5 pb-3">
							<h2 class="email-heading">Confirm Your E-Mail Address</h2>
						</td>
					</tr>
					<tr>
						<td class="px-3 px-sm-5 pb-2">
							<p>Hi Ishtiyak,</p>
							<p>Welcome! <br> You are receiving this email because you have registered on our site.</p>
							<p>Click the link below to active your DashLite account.</p>
							<p class="mb-4">This link will expire in 15 minutes and can only be used once.</p>
							<a href="#" class="email-btn">Verify Email</a>
						</td>
					</tr>
					<tr>
						<td class="px-3 px-sm-5 pt-4">
							<h4 class="email-heading-s2">or</h4>
							<p>If the button above does not work, paste this link into your web browser:</p>
							<a href="#" class="link-block">https://dashlite.com/account?login_token=dacb711d08a0ee7bda83ce1660918c31e8b43c30</a>
						</td>
					</tr>
					<tr>
						<td class="px-3 px-sm-5 pt-4 pb-3 pb-sm-5">
							<p>If you did not make this request, please contact us or ignore this message.</p>
							<p class="email-note">This is an automatically generated email please do not reply to this email. If you face any issues, please contact us at help@dashlite.com</p>
						</td>
					</tr>
					</tbody>
				</table>
				<table class="email-footer">
					<tbody>
					<tr>
						<td class="text-center pt-4">
							<p class="email-copyright-text">Copyright © 2020 DashLite. All rights reserved. <br> Template Made By <a href="https://themeforest.net/user/softnio/portfolio">Softnio</a>.</p>
							<ul class="email-social" style="padding-right:8%; padding-bottom:0%">
								<li><a href="#"><img src="https://technologicx.com/pictures/facebook.png" alt=""></a></li>
								<li><a href="#"><img src="https://technologicx.com/pictures/twitter.png" alt=""></a></li>
								<li><a href="#"><img src="https://technologicx.com/pictures/youtube.png" alt=""></a></li>
								<li><a href="#"><img src="https://technologicx.com/pictures/medium.png" alt=""></a></li>
							</ul>
							<p class="fs-12px pt-3">This email was sent to you as a registered member of <a href="https://softnio.com">softnio.com</a>. To update your emails preferences <a href="#">click here</a>.</p>
						</td>
					</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</table>
</div>
</body>
</html>
