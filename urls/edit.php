<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../classes-fw/includes/globale.inc.php';
include('inc.php');

$list_main = new ParamTools($table);

if(isset($_POST['id']) and $_POST['id'] != ''){
	$id = intval($_POST['id']);
	
	$data['domain_name'] = addslashes($_POST['domain_name']);
    $data['address_id'] = addslashes($_POST['address_id']);
    $data['address_type'] = intval($_POST['address_type']);
    $data['urls_typevisa'] = intval($_POST['urls_typevisa']);
    $data['url_langage'] = intval($_POST['url_langage']);
	
    $data['vps_host'] = addslashes($_POST['vps_host']);
    $data['vps_ip'] = addslashes($_POST['vps_ip']);
    $data['vps_type'] = intval($_POST['vps_type']);
	
    $data['gmail_name'] = addslashes($_POST['gmail_name']);
    $data['gmail_user'] = addslashes($_POST['gmail_user']);
    $data['gmail_phone'] = addslashes($_POST['gmail_phone']);
    $data['gmail_phone_type'] = intval($_POST['gmail_phone_type']);
	
	$data['id'] = $id;
	$list_main -> update($data);
	
	header('Location: ./');
}

if(isset($_GET['id']) and intval($_GET['id'])>0){
	$id = intval($_GET['id']);
	$resm_edit = $list_main -> get($id);
		if($resm_edit){
			$domain_name = $resm_edit -> domain_name;
			$address_id = $resm_edit -> address_id;
			$urls_typevisa = $resm_edit -> urls_typevisa;
			$url_langage = $resm_edit -> url_langage;
			$address_type = $resm_edit -> address_type;
			$address_type1 = ($address_type == 1)? ' checked' : '';
			$address_type0 = ($address_type == 0)? ' checked' : '';

			$vps_host = $resm_edit -> vps_host;
			$vps_ip = $resm_edit -> vps_ip;
			$vps_type = $resm_edit -> vps_type;
			$vps_type1 = ($vps_type == 1)? ' checked' : '';
			$vps_type0 = ($vps_type == 0)? ' checked' : '';

			$gmail_name = $resm_edit -> gmail_name;
			$gmail_user = $resm_edit -> gmail_user;
			$gmail_phone = $resm_edit -> gmail_phone;
			$gmail_phone_type = $resm_edit -> gmail_phone_type;
			$gmail_phone_type1 = ($gmail_phone_type == 1)? ' checked' : '';
			$gmail_phone_type0 = ($gmail_phone_type == 0)? ' checked' : '';
		}
}
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
								<h1 class="text-dark fw-bolder my-0 fs-2"><?PHP echo $folder_titre_edit; ?></h1>
								<ul class="breadcrumb fw-bold fs-base my-1">
									<li class="breadcrumb-item text-muted">
										<a href="../home/" class="text-muted">Accueil</a>
									</li>
									<li class="breadcrumb-item text-dark">modifier</li>
								</ul>
							</div>
							
							<div class="d-flex flex-shrink-0">
								<div class="d-flex ms-3">
									<a href="./" class="btn btn-flex flex-center bg-body btn-color-gray-700 btn-active-color-primary w-40px w-md-auto h-40px px-0 px-md-6">
										<span class="svg-icon svg-icon-2 svg-icon-primary me-0 me-md-2">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black"/>
												<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black"/>
											</svg>
										</span>
										<span class="d-none d-md-inline">Liste</span>
									</a>
								</div>
							</div>
						</div>
					</div>
					
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<div class="container-xxl" id="kt_content_container">
							<div class="row gy-5 g-xl-8">
								<div class="col-xxl-12">
									<form class="form" method="post" action="./edit.php">
										<input type="hidden" name="id" value="<? echo $id; ?>">
										<div class="card card-xxl-stretch mb-5 mb-xl-8">
											<div class="card-body py-3">
												<div class="row mb-5">
													<div class="col-md-12 fv-row fv-plugins-icon-container mb-6">
														<label class="required fs-5 fw-bold mb-2">Nom de Domain</label>
														<input type="text" class="form-control form-control-solid" placeholder="" name="domain_name" value="<? echo $domain_name; ?>">
													</div>
													<div class="col-md-6 fv-row fv-plugins-icon-container mb-6">
														<label class="required fs-5 fw-bold mb-2">Visa</label>
														<select name="urls_typevisa" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Visa">
															<option></option>
															<?php
															$list_visa_types = new ParamTools('visa_types');
															$res_visa_types = $list_visa_types -> getliste('pub = 1');
															foreach($res_visa_types as $key => $value){
																$id = $value -> visa_types_id;
																$name = $value -> name;
																$sel = ($id == $urls_typevisa)? ' SELECTED' : '';
															?>
															<option value="<? echo $id; ?>"<? echo $sel; ?>><? echo $name; ?></option>
															<?php
															}
															?>
														</select>
													</div>
													<div class="col-md-6 fv-row fv-plugins-icon-container mb-6">
														<label class="required fs-5 fw-bold mb-2">Langue de Site</label>
														<select name="url_langage" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Langue de Site">
															<option></option>
															<?php
															$list_urls_languages = new ParamTools('urls_languages');
															$res_urls_languages = $list_urls_languages -> getliste('pub = 1');
															foreach($res_urls_languages as $key => $value){
																$id = $value -> urls_languages_id;
																$name = $value -> name;
																$sel = ($id == $url_langage)? ' SELECTED' : '';
															?>
															<option value="<? echo $id; ?>"<? echo $sel; ?>><? echo $name; ?></option>
															<?php
															}
															?>
														</select>
													</div>
													<div class="col-md-6 fv-row fv-plugins-icon-container mb-6">
														<label class="required fs-5 fw-bold mb-2">Adresse IP</label>
														<input type="text" class="form-control form-control-solid" placeholder="" name="address_id" value="<? echo $address_id; ?>">
													</div>
													<div class="col-md-6 fv-row fv-plugins-icon-container mb-6">
														<label class="required fs-5 fw-bold mb-6">Type d'Adresse IP</label>
														<div class="d-flex align-items-center">
															<label class="form-check form-check-custom form-check-solid me-10">
																<input class="form-check-input h-20px w-20px" type="radio" name="address_type" value="1"<? echo $address_type1; ?>/>
																<span class="form-check-label fw-bold">Adresse IP privée</span>
															</label>
															<label class="form-check form-check-custom form-check-solid">
																<input class="form-check-input h-20px w-20px" type="radio" name="address_type" value="0"<? echo $address_type0; ?>/>
																<span class="form-check-label fw-bold">Adresse IP partagée</span>
															</label>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="card card-xxl-stretch mb-5 mb-xl-8">
											<div class="card-body py-3">
												<div class="row mb-5">
													<div class="text-center pt-5 mb-6">
														<h2 class="mb-3">VPS</h2>
													</div>
													<div class="col-md-4 fv-row fv-plugins-icon-container mb-3">
														<label class="required fs-5 fw-bold mb-2">Nom de VPS</label>
														<input type="text" class="form-control form-control-solid" name="vps_host" value="<? echo $vps_host; ?>">
													</div>
													<div class="col-md-4 fv-row fv-plugins-icon-container mb-3">
														<label class="required fs-5 fw-bold mb-2">Adresse IP</label>
														<input type="text" class="form-control form-control-solid" name="vps_ip" value="<? echo $vps_ip; ?>">
													</div>
													<div class="col-md-4 fv-row fv-plugins-icon-container mb-3">
														<label class="required fs-5 fw-bold mb-6">Type VPS</label>
														<div class="d-flex align-items-center">
															<label class="form-check form-check-custom form-check-solid me-10">
																<input class="form-check-input h-20px w-20px" type="radio" name="vps_type" value="1"<? echo $vps_type1; ?>/>
																<span class="form-check-label fw-bold">Prenium</span>
															</label>
															<label class="form-check form-check-custom form-check-solid">
																<input class="form-check-input h-20px w-20px" type="radio" name="vps_type" value="0"<? echo $vps_type0; ?>/>
																<span class="form-check-label fw-bold">Basique</span>
															</label>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="card card-xxl-stretch mb-5 mb-xl-8">
											<div class="card-body py-3">
												<div class="row mb-5">
													<div class="text-center pt-5 mb-6">
														<h2 class="mb-3">GMAIL</h2>
													</div>
													<div class="col-md-6 fv-row fv-plugins-icon-container mb-6">
														<label class="required fs-5 fw-bold mb-2">Nom</label>
														<input type="text" class="form-control form-control-solid" name="gmail_name" value="<? echo $gmail_name; ?>">
													</div>
													<div class="col-md-6 fv-row fv-plugins-icon-container mb-6">
														<label class="required fs-5 fw-bold mb-2">Email</label>
														<input type="text" class="form-control form-control-solid" name="gmail_user" value="<? echo $gmail_user; ?>">
													</div>
													<div class="col-md-6 fv-row fv-plugins-icon-container mb-6">
														<label class="required fs-5 fw-bold mb-2">Téléphone</label>
														<input type="text" class="form-control form-control-solid" name="gmail_phone" value="<? echo $gmail_phone; ?>">
													</div>
													<div class="col-md-6 fv-row fv-plugins-icon-container mb-6">
														<label class="required fs-5 fw-bold mb-6">Type de Numéro</label>
														<div class="d-flex align-items-center">
															<label class="form-check form-check-custom form-check-solid me-10">
																<input class="form-check-input h-20px w-20px" type="radio" name="gmail_phone_type" value="1"<? echo $gmail_phone_type1; ?>/>
																<span class="form-check-label fw-bold">Orange - Carte prépaid</span>
															</label>
															<label class="form-check form-check-custom form-check-solid">
																<input class="form-check-input h-20px w-20px" type="radio" name="gmail_phone_type" value="0"<? echo $gmail_phone_type0; ?>/>
																<span class="form-check-label fw-bold">Autre</span>
															</label>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="text-center">
											<button type="submit" class="btn btn-primary">
												<span class="indicator-label">Enregistrer</span>
												<span class="indicator-progress">S'il vous plaît, attendez ...

												<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
											</button>
										</div>
											
									</form>
								</div>
							</div>
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