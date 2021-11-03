<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../classes-fw/includes/globale.inc.php';
include('inc.php');

$list_main = new ParamTools($table);
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
								<h1 class="text-dark fw-bolder my-0 fs-2"><?PHP echo $folder_titre_list; ?></h1>
								<ul class="breadcrumb fw-bold fs-base my-1">
									<li class="breadcrumb-item text-muted">
										<a href="../home/" class="text-muted">Accueil</a>
									</li>
									<li class="breadcrumb-item text-dark">Liste</li>
								</ul>
							</div>
							
							<div class="d-flex flex-shrink-0">
								<div class="d-flex ms-3">
									<a href="./add.php" class="btn btn-flex flex-center bg-body btn-color-gray-700 btn-active-color-primary w-40px w-md-auto h-40px px-0 px-md-6" data-bs-toggle="modal" data-bs-target="#add-new">
										<span class="svg-icon svg-icon-2 svg-icon-primary me-0 me-md-2">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
												<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
											</svg>
										</span>
										<span class="d-none d-md-inline">Ajouter</span>
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
											<div class="table-responsive">
												<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
													<thead>
														<tr class="fw-bolder text-muted">
															<th class="w-25px">#</th>
															<th class="min-w-150px">Nome</th>
															<th class="min-w-100px text-end">Actions</th>
														</tr>
													</thead>
													<tbody>
													<?php
													$res_main = $list_main -> getliste();
													foreach($res_main as $key => $value){
														$id = $value -> {$table.'_id'};
														$name = $value -> name;
														
														$pub_class = ($value -> pub == 1)? ' svg-icon-primary' : '';
													?>
														<tr>
															<td><? echo $id; ?></td>
															<td>
																<h6><? echo $name; ?></h6>
															</td>
															<td>
																<div class="d-flex justify-content-end flex-shrink-0 action-item">
																	<button type="button" name="<?php echo $id; ?>" class="btn btn-icon btn-bg-light btn-sm pub-item">
																		<span class="svg-icon svg-icon-2hx<?php echo $pub_class; ?>">
																			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																				<path opacity="0.5" d="M12.8956 13.4982L10.7949 11.2651C10.2697 10.7068 9.38251 10.7068 8.85731 11.2651C8.37559 11.7772 8.37559 12.5757 8.85731 13.0878L12.7499 17.2257C13.1448 17.6455 13.8118 17.6455 14.2066 17.2257L21.1427 9.85252C21.6244 9.34044 21.6244 8.54191 21.1427 8.02984C20.6175 7.47154 19.7303 7.47154 19.2051 8.02984L14.061 13.4982C13.7451 13.834 13.2115 13.834 12.8956 13.4982Z" fill="black"/>
																				<path d="M7.89557 13.4982L5.79487 11.2651C5.26967 10.7068 4.38251 10.7068 3.85731 11.2651C3.37559 11.7772 3.37559 12.5757 3.85731 13.0878L7.74989 17.2257C8.14476 17.6455 8.81176 17.6455 9.20663 17.2257L16.1427 9.85252C16.6244 9.34044 16.6244 8.54191 16.1427 8.02984C15.6175 7.47154 14.7303 7.47154 14.2051 8.02984L9.06096 13.4982C8.74506 13.834 8.21146 13.834 7.89557 13.4982Z" fill="black"/>
																			</svg>
																		</span>
																	</button>
																	<a href="./edit.php?id=<? echo $id; ?>" class="btn btn-icon btn-bg-light btn-sm me-1">
																		<span class="svg-icon svg-icon-2hx">
																			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																				<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black" />
																				<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black" />
																			</svg>
																		</span>
																	</a>
																</div>
															</td>
														</tr>
													<?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="modal fade" id="add-new" tabindex="-1" aria-hidden="true">
						<div class="modal-dialog mw-650px">
							<div class="modal-content">
								<div class="modal-header pb-0 border-0 justify-content-end">
									<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
										<span class="svg-icon svg-icon-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
												<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
											</svg>
										</span>
									</div>
								</div>
								<div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
									<form class="form" method="post" action="./add.php">
										<div class="text-center mb-13">
											<h1 class="mb-3">Ajouter une nouvelle Entreprise</h1>
										</div>
										
										<div class="d-flex flex-column mb-8 fv-row">
											<label class="d-flex align-items-center fs-6 fw-bold mb-2">
												<span class="required">Nom d'entreprise</span>
											</label>
											<input type="text" class="form-control form-control-solid" placeholder="Nom d'entreprise" name="company-name" />
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