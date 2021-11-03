<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../classes-fw/includes/globale.inc.php';
//include('inc.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require '../assets-elements/head.php'; ?>
	</head>
	<body id="kt_body" class="dark-mode header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-enabled" data-kt-aside-minimize="on">
		<div class="d-flex flex-column flex-root">
			<div class="page d-flex flex-row flex-column-fluid">
				<?php require '../assets-elements/menu.php'; ?>
				
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
						<div class="container-xxl d-flex align-items-center justify-content-between" id="kt_header_container">
							<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-2 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
								<h1 class="text-dark fw-bolder my-0 fs-2">Listes de publicité Active</h1>
								<ul class="breadcrumb fw-bold fs-base my-1">
									<li class="breadcrumb-item text-muted">
										<a href="../home/" class="text-muted">Accueil</a>
									</li>
									<li class="breadcrumb-item text-dark">Liste</li>
								</ul>
							</div>
							<div class="d-flex d-lg-none align-items-center ms-n2 me-2">
								<div class="btn btn-icon btn-active-icon-primary" id="kt_aside_toggle">
									<span class="svg-icon svg-icon-2x">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
											<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
										</svg>
									</span>
								</div>
								<a href="../../demo7/dist/index.html" class="d-flex align-items-center">
									<img alt="Logo" src="/assets/media/logos/logo-demo7.svg" class="h-30px" />
								</a>
							</div>
							<div class="d-flex flex-shrink-0">
								<div class="d-flex ms-3">
									<a href="#" class="btn btn-flex flex-center bg-body btn-color-gray-700 btn-active-color-primary w-40px w-md-auto h-40px px-0 px-md-6" tooltip="New Member" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">
										<span class="svg-icon svg-icon-2 svg-icon-primary me-0 me-md-2">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
												<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
											</svg>
										</span>
										<span class="d-none d-md-inline">New Member</span>
									</a>
								</div>
								<div class="d-flex ms-3">
									<a href="#" class="btn btn-flex flex-center bg-body btn-color-gray-700 btn-active-color-primary w-40px w-md-auto h-40px px-0 px-md-6" tooltip="New App" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app" id="kt_toolbar_primary_button">
										<!--begin::Svg Icon | path: icons/duotune/general/gen005.svg-->
										<span class="svg-icon svg-icon-2 svg-icon-primary me-0 me-md-2">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM15 17C15 16.4 14.6 16 14 16H8C7.4 16 7 16.4 7 17C7 17.6 7.4 18 8 18H14C14.6 18 15 17.6 15 17ZM17 12C17 11.4 16.6 11 16 11H8C7.4 11 7 11.4 7 12C7 12.6 7.4 13 8 13H16C16.6 13 17 12.6 17 12ZM17 7C17 6.4 16.6 6 16 6H8C7.4 6 7 6.4 7 7C7 7.6 7.4 8 8 8H16C16.6 8 17 7.6 17 7Z" fill="black" />
												<path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />
											</svg>
										</span>
										<!--end::Svg Icon-->
										<span class="d-none d-md-inline">New App</span>
									</a>
								</div>
								<div class="d-flex align-items-center ms-3">
									<div class="btn btn-icon btn-primary w-40px h-40px pulse pulse-white" id="kt_drawer_chat_toggle">
										<span class="svg-icon svg-icon-2">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path opacity="0.3" d="M20 3H4C2.89543 3 2 3.89543 2 5V16C2 17.1046 2.89543 18 4 18H4.5C5.05228 18 5.5 18.4477 5.5 19V21.5052C5.5 22.1441 6.21212 22.5253 6.74376 22.1708L11.4885 19.0077C12.4741 18.3506 13.6321 18 14.8167 18H20C21.1046 18 22 17.1046 22 16V5C22 3.89543 21.1046 3 20 3Z" fill="black" />
												<rect x="6" y="12" width="7" height="2" rx="1" fill="black" />
												<rect x="6" y="7" width="12" height="2" rx="1" fill="black" />
											</svg>
										</span>
										<span class="pulse-ring"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<div class="container-fluid" id="kt_content_container">
							<?php
							$list_visa_types = new ParamTools('visa_types');
							$res_visa_types = $list_visa_types -> getliste('pub = 1');
							foreach($res_visa_types as $key_visa => $value_visa){
								$visa_types_id = $value_visa -> visa_types_id;
								$visa_types_name = $value_visa -> name;
							?>
							<div class="border-0  mb-xl-8">
								<h3 class="card-title fw-bolder text-dark"><? echo $visa_types_name; ?></h3>
							</div>
							<div class="row gy-5 g-xl-8">
								<?php
								$list_urls_languages = new ParamTools('urls_languages');
								$res_urls_languages = $list_urls_languages -> getliste('pub = 1');
								foreach($res_urls_languages as $key_language => $value_language){
									$urls_languages_id = $value_language -> urls_languages_id;
									$urls_languages_name = $value_language -> name;
								?>
								<div class="col-xl-3">
									<div class="card card-xl-stretch mb-xl-8">
										<div class="card-header border-0">
											<h3 class="card-title fw-bolder text-dark"><? echo $urls_languages_name; ?></h3>
										</div>
										<div class="card-body pt-0">
											<?php
//											SELECT * FROM `urls_ads` inner join urls on urls_ads.url_id=urls.urls_id WHERE urls.url_langage = 1 and urls.urls_typevisa=1
											$resm_ads_urls = $db -> selectm('*', '`urls_ads` inner join urls on urls_ads.url_id=urls.urls_id' ,'urls.url_langage = '.$urls_languages_id.' and urls.urls_typevisa='.$visa_types_id);
											foreach($resm_ads_urls as $key_ads_urls => $value_ads_urls){
												
												$domain_name = $value_ads_urls -> domain_name;
												$address_id = $value_ads_urls -> address_id;
												$address_type = ($value_ads_urls -> address_type == 1)? 'Privée' : 'Partagée';
											?>
											<div class="d-flex align-items-center bg-light-warning rounded p-5 mb-7">
												<span class="svg-icon me-5 svg-icon-warning">
													<span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black" />
															<path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black" />
														</svg>
													</span>
												</span>
												<div class="flex-grow-1 me-2">
													<a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6"><? echo $domain_name; ?></a>
													<span class="text-muted fw-bold d-block"><? echo $address_id; ?> - <? echo $address_type; ?></span>
												</div>
												<span class="fw-bolder text-warning py-1">0.00 &euro;</span>
												<span class="fw-bolder text-warning py-1">28</span>
											</div>
											<?php
											}
											?>
										</div>
									</div>
								</div>
								<?php
								}
								?>
							</div>
							<?php
							}
							?>
						</div>
					</div>
					<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
						<div class="container-xxl d-flex flex-column flex-md-row flex-stack">
							
							<div class="text-dark order-2 order-md-1">
								<span class="text-gray-400 fw-bold me-1">Created by</span>
								<a href="javascript:void(0);" target="_blank" class="text-muted text-hover-primary fw-bold me-2 fs-6">Konexia</a>
								<span class="text-gray-400 fw-bold me-1">V 0.1 - 2021</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php require '../assets-elements/scripts.php'; ?>
	</body>
</html>