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
						<div class="container-fluid d-flex align-items-center justify-content-between" id="kt_header_container">
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
									<a href="./add.php" class="btn btn-flex flex-center bg-body btn-color-gray-700 btn-active-color-primary w-40px w-md-auto h-40px px-0 px-md-6">
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
						<div class="container-fluid" id="kt_content_container">
							<div class="row gy-5 g-xl-8">
								<div class="col-xxl-12">
									<div class="card card-xxl-stretch mb-5 mb-xl-8">
										<div class="card-body py-3">
											<div class="table-responsive">
												<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
													<thead>
														<tr class="fw-bolder text-muted">
															<th class="w-25px">#</th>
															<th>URLS</th>
															<th>Info</th>
															<th>Ventes</th>
															<th>VPS</th>
															<th>Gmail</th>
															<th>Technique</th>
															<th class="min-w-100px text-end">Actions</th>
														</tr>
													</thead>
													<tbody>
													<?php
													$list_visa_types = new ParamTools('visa_types');
													$list_urls_languages = new ParamTools('urls_languages');

													$res_main = $list_main -> getliste();
													foreach($res_main as $key => $value){
														$id = $value -> {$table.'_id'};
														$domain_name = $value -> domain_name;
														$address_id = $value -> address_id;
														$resm_typevisa = $list_visa_types -> get($value -> urls_typevisa);
														$typevisa = $resm_typevisa -> name;
														
														$resm_languages = $list_urls_languages -> get($value -> url_langage);
														$languages = $resm_languages -> name;
														
														$address_type = ($value -> address_type == 1)? 'Privée' : 'Partagée';

														$vps_host = $value -> vps_host;
														$vps_ip = $value -> vps_ip;
														$vps_type = ($value -> vps_type == 1)? 'Prenium' : 'Basique';

														$gmail_name = $value -> gmail_name;
														$gmail_user = $value -> gmail_user;
														$gmail_phone = $value -> gmail_phone;
														
														if($value -> pub == 1){
															$pub_class = ' svg-icon-success';
															$date_install = '<span class="badge fs-7 badge-light-success">'.$value -> date_install.'</span>';
														}
														else{
															$pub_class = '';
															$date_install = '<span class="badge fs-7 badge-light-warning">Pas encore installé</span>';
														}
														
														$date_add = $value -> date_add;
														
														$total_sell = 0;
														$total_price = 0;
														$total_price = number_format($total_price, 2, ',', ' ');;
													?>
														<tr>
															<td><? echo $id; ?></td>
															<td>
																<h6><? echo $domain_name; ?></h6>
																<span class="text-muted fw-bold d-block"><? echo $vps_ip; ?> (<? echo $address_type; ?>)</span>
															</td>
															<td>
																<h6><? echo $typevisa; ?> - <? echo $languages; ?></h6>
															</td>
															<td>
																<h6 class="date-install"><? echo $total_price; ?> &euro;</h6>
																<span class="text-muted fw-bold d-block"><? echo $total_sell; ?></span>
															</td>
															<td>
																<h6><? echo $vps_host; ?></h6>
																<span class="text-muted fw-bold d-block"><? echo $address_id; ?> (<? echo $vps_type; ?>)</span>
															</td>
															<td>
																<h6><? echo $gmail_user; ?></h6>
																<span class="text-muted fw-bold d-block"><? echo $gmail_name; ?> (<? echo $gmail_phone; ?>)</span>
															</td>
															<td>
																<h6 class="date-install"><? echo $date_install; ?></h6>
																<span class="text-muted fw-bold d-block"><? echo $date_add; ?></span>
															</td>
															<td>
																<div class="d-flex justify-content-end flex-shrink-0 action-item">
																	<button type="button" name="<?php echo $id; ?>" class="btn btn-icon btn-bg-light btn-m me-2 install-item">
																		<span class="svg-icon svg-icon-2hx <?php echo $pub_class; ?>">
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24"/>
																					<path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
																					<path d="M10.875,15.75 C10.6354167,15.75 10.3958333,15.6541667 10.2041667,15.4625 L8.2875,13.5458333 C7.90416667,13.1625 7.90416667,12.5875 8.2875,12.2041667 C8.67083333,11.8208333 9.29375,11.8208333 9.62916667,12.2041667 L10.875,13.45 L14.0375,10.2875 C14.4208333,9.90416667 14.9958333,9.90416667 15.3791667,10.2875 C15.7625,10.6708333 15.7625,11.2458333 15.3791667,11.6291667 L11.5458333,15.4625 C11.3541667,15.6541667 11.1145833,15.75 10.875,15.75 Z" fill="#000000"/>
																					<path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
																				</g>
																			</svg>
																		</span>
																	</button>
																	<a href="./edit.php?id=<? echo $id; ?>" class="btn btn-icon btn-bg-light btn-m ">
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
		<script type="text/javascript">
			$('.action-item .install-item').click(function() {
				var table_item = $(this);
				var pub_row = table_item.attr("name");
				var data_delete = 'id='+pub_row;
				$.ajax({
					type: "GET",
					url: "install.php",
					data: data_delete,
					cache: false,
					success: function(data){
						var result = JSON.parse(data);
						if(result.code_response == 1){
							table_item.parents('tr').find('h6.date-install span').text(result.date_install);
							table_item.parents('tr').find('h6.date-install span').removeClass('badge-light-warning');
							table_item.parents('tr').find('h6.date-install span').addClass('badge-light-success');
							table_item.find('span').addClass('svg-icon-success');
							Swal.fire(
								"ç'est fait!",
								'le site a été vérifier',
								'success'
							)
						}
						else if(result.code_response == 10){
							Swal.fire(
								'Erreur!',
								"Le site n'existe pas",
								'error'
							)
						}
						else if(result.code_response == 11){
							Swal.fire(
								'Erreur!',
								'Il y a une erreur de SSL',
								'error'
							)
						}
						else if(result.code_response == 12){
							Swal.fire(
								'Erreur!',
								'Il y a une erreur de HTACCESS',
								'error'
							)
						}
						else{
							Swal.fire(
								'Erreur!',
								'il y a un erreur inconnu',
								'error'
							)
						}
					}
				});
			});
		</script>
		
	</body>
</html>