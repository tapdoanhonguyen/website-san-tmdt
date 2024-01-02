<!-- BEGIN: main -->


<div id="follow">
	<form id="search_follow">
		<div class="p-1 bg-light rounded rounded-lg shadow-sm mb-4">
			<div class="input-group">
				<div class="input-group-prepend">
						<button type="submit" class="btn btn-link text-warning"><i class="fa fa-search"></i></button>
				</div>
				<input class="form-control border-0 bg-light" type="text" value="{Q}" name="s" maxlength="255" placeholder="{LANG.search_title}" />
			</div>
		</div>
	</form>
	<!-- BEGIN: view -->
	<form action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
		<div id="list_follow_none" class="bg_white w-100 h-auto rounded text-center" style="min-height: 331px">
			
			<div class="list_follow">
				<!-- BEGIN: no_data -->
				<div class="pt-2 fs_16 mb-3 bg_white text-center" style="min-height: 331px">Không tìm thấy kết quả!</div>
				<!-- END: no_data -->
				<!-- BEGIN: loop -->
				<div class="row m-0 py-3" style="border-bottom: 1px solid #dee2e6; min-height:111px">
					<div class="col-2">
						<a class=" fs_16 d-flex justify-content-center align-items-center w-100 h-100" href="{VIEW.alias}" style="max-height: 75px">
							<img class="rounded" src="{VIEW.avatar_image}" alt="{VIEW.company_name}" title="{VIEW.company_name}" style="max-height: 100%; max-width: 100%; object-fit: cover;">
						</a>
					</div>
					<div class="col-8  d-flex align-items-center">
						<a class="pl-3 fs_14 font-weight-bold" href="{VIEW.alias}">
							{VIEW.company_name}
						</a>
					</div>	
					<div class="col-2 d-flex text-right align-items-center justify-content-end ">
						<a class="btn btn-outline-danger mr-3" href="{VIEW.link_delete}">
							Bỏ theo dõi
						</a>
					</div>
				</div>
				<!-- END: loop -->
			</div>
		</div>
		<script>
			$("#search_follow").submit(function(e) {
				e.preventDefault();
				$.ajax({
					type: "GET",
					url: nv_base_siteurl + 'index.php' + '?'  + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +'=follow',
					data: $('#search_follow').serialize(), 
					success: function(res)
					{
						$('#follow').html(res);
					}
				});
			});
			
		</script>
		
	</form>
	<!-- BEGIN: generate_page -->
	<div class="text-center">
		{NV_GENERATE_PAGE}
	</div>
	<!-- END: generate_page -->
	<!-- END: view -->
	
</div>

<!-- END: main -->