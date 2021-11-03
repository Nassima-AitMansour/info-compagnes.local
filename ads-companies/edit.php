<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../classes-fw/includes/globale.inc.php';
include('inc.php');

$list_main = new ParamTools($table);

if(isset($_POST['id']) and $_POST['id'] != ''){
	$id = intval($_POST['id']);
	
	$data['name'] = addslashes($_POST['company-name']);
	
	$data['id'] = $id;
	$list_main -> update($data);
	
	header('Location: ./');
}

if(isset($_GET['id']) and intval($_GET['id'])>0){
	$id = intval($_GET['id']);
	$resm_edit = $list_main -> get($id);
		if($resm_edit){
			
			$name = $resm_edit -> name;
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
									<div class="card card-xxl-stretch mb-5 mb-xl-8">
										<div class="card-body py-3">
											<form class="form" method="post" action="./edit.php">
												<input type="hidden" name="id" value="<?php echo $id; ?>">
												<div class="d-flex flex-column mb-8 fv-row">
													<label class="d-flex align-items-center fs-6 fw-bold mb-2">
														<span class="required">Nom d'entreprise</span>
													</label>
													<input type="text" class="form-control form-control-solid" placeholder="Nom d'entreprise" name="company-name" value="<?php echo $name; ?>"/>
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