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
															<th>Publicités</th>
														</tr>
													</thead>
													<tbody>
													<?php
													$list_visa_types = new ParamTools('visa_types');
													$list_urls_languages = new ParamTools('urls_languages');
													$list_ads_company = new ParamTools('ads_company');
													$list_urls_ads = new ParamTools('urls_ads');

													$res_main = $list_main -> getliste('pub = 1');
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
														$total_price = number_format($total_price, 2, ',', ' ');
														
														$ads_statut = '';
														$resm_ads_urls = $list_ads_company -> getliste();
														foreach($resm_ads_urls as $key_ads => $value_ads){
															$resm_urls_ads = $list_urls_ads -> getliste('url_id = '.$id.' and ads_company = '.$value_ads -> ads_company_id);
															
															$pub_class_btnads = '';
															if($resm_urls_ads){
																$pub_class_btnads = ($resm_urls_ads[0] -> pub == 1)? 'badge-light-warning' : '';
																$pub_class_btnads = ($resm_urls_ads[0] -> pub == 2)? 'badge-light-success' : $pub_class_btnads;
																$pub_class_btnads = ($resm_urls_ads[0] -> pub == 3)? 'badge-light-primary' : $pub_class_btnads;
																$pub_class_btnads = ($resm_urls_ads[0] -> pub == 4)? 'badge-light-danger' : $pub_class_btnads;
															}
															
															$ads_statut .= '<button class="badge add-ads me-4 '.$pub_class_btnads.'" style="border: none;" type="button" name="'.$id.'-'.$value_ads -> ads_company_id.'">'.$value_ads -> name.'</button>';
															
														}
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
															<td><div class="act-btns"><? echo $ads_statut; ?></div></td>
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
			$('.act-btns button').click(function() {
				var table_item = $(this);
				var pub_row = table_item.attr("name");
				var data_push = 'ads='+pub_row;
				$.ajax({
					type: "POST",
					url: "./company-ads.php",
					data: data_push,
					cache: false,
					success: function(data){
						var result = JSON.parse(data);
						if(result.code_response == 1){
							table_item.addClass('badge-light-warning');
							Swal.fire(
								"submited into google!",
								'le site a été vérifier',
								'success'
							)
						}
					}
				});
			});
		</script>
	</body>
</html>