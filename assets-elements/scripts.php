
		<script>var hostUrl = "/assets/";</script>
		<script src="/assets/plugins/global/plugins.bundle.js"></script>
		<script src="/assets/js/scripts.bundle.js"></script>
		<script src="/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
		<script src="/assets/js/custom/widgets.js"></script>
		<script src="/assets/js/custom/apps/chat/chat.js"></script>
		<script src="/assets/js/custom/modals/create-app.js"></script>
		<script src="/assets/js/custom/modals/upgrade-plan.js"></script>

		<script type="text/javascript">
			$('.action-item .pub-item').click(function() {
				var table_item = $(this);
				var pub_row = table_item.attr("name");
				var data_delete = 'table=<?php echo $table; ?>&id='+pub_row;
				$.ajax({
					type: "GET",
					url: "../assets-elements/pub.php",
					data: data_delete,
					cache: false,
					success: function(data){
						if(data == '1'){
							table_item.find('span').addClass('svg-icon-primary');
						}
						else{
							table_item.find('span').removeClass('svg-icon-primary');
						}
					}
				});
			});
			$('.action-item .top').click(function() {
				var table_item = $(this);
				var top_row = table_item.attr("name");
				var data_delete = 'table=<?php echo $table; ?>&id='+top_row;
				$.ajax({
					type: "GET",
					url: "../assets-elements/top.php",
					data: data_delete,
					cache: false,
					success: function(data){
						if(data == '1'){
							table_item.removeClass('btn-default');
							table_item.addClass('btn-outline-danger');
						}
						else{
							table_item.removeClass('btn-outline-danger');
							table_item.addClass('btn-default');
						}
					}
				});
			});
			$('.action-item .delete').click(function() {
				var answer = confirm('Êtes-vous sûr de vouloir supprimer ceci?');
				if (answer){
					var table_item = $(this);
					var delete_row = table_item.attr("name");
					var data_delete = 'table=<?php echo $table; ?>&id='+delete_row;
					$.ajax({
						type: "GET",
						url: "../assets-elements/delete.php",
						data: data_delete,
						cache: false,
						success: function(data){
							table_item.parents('tr').fadeOut('slow');
						}
					});
				}
				else{}
			});
		</script>