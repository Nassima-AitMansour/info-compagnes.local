<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Info Compagnes - Konexia</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<link rel="shortcut icon" href="/assets/media/logos/favicon.ico" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" />
		
		<link rel="stylesheet" type="text/css" href="/assets/plugins/global/plugins.dark.bundle.css" />
		<link rel="stylesheet" type="text/css" href="/assets/css/style.dark.bundle.css" />
	</head>
	<body id="kt_body" class="dark-mode bg-body">
		<div class="d-flex flex-column flex-root">
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative" style="background-color: #46465e">
					<div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
						<div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
							<a href="../../demo7/dist/index.html" class="py-9 mb-5">
								<img alt="Logo" src="assets/media/logos/logo-2.svg" class="h-60px" />
							</a>
							<h1 class="fw-bolder fs-2qx pb-5 pb-md-10">KONEXIA</h1>
							<p class="fw-bold fs-2">Info Compages</p>
						</div>
						<div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px" style="background-image: url(assets/media/illustrations/sigma-1/13.png"></div>
					</div>
				</div>
				
				<div class="d-flex flex-column flex-lg-row-fluid py-10">
					<div class="d-flex flex-center flex-column flex-column-fluid">
						<div class="w-lg-500px p-10 p-lg-15 mx-auto">
							<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="#">
								<div class="text-center mb-10">
									<h1 class="text-dark mb-3">Se connecter</h1>
								</div>
								<div class="fv-row mb-10">
									<label class="form-label fs-6 fw-bolder text-dark">Email</label>
									<input class="form-control form-control-lg form-control-solid" type="text" name="email" autocomplete="off" />
								</div>
								<div class="fv-row mb-10">
									<div class="d-flex flex-stack mb-2">
										<label class="form-label fw-bolder text-dark fs-6 mb-0">Mot de passe</label>
									</div>
									<input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" />
								</div>
								<div class="text-center">
									<button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
										<span class="indicator-label">Connexion</span>
										<span class="indicator-progress">S'il vous plaît, attendez ...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>var hostUrl = "/assets/";</script>
		<script src="/assets/plugins/global/plugins.bundle.js"></script>
		<script src="/assets/js/scripts.bundle.js"></script>
		<script src="/assets/js/custom/authentication/sign-in/general.js"></script>
	</body>
</html>