
<!-- BEGIN: main -->
<div class="row">
	<div class="col-4 mb-3">
		<div class="p-1 rounded rounded-lg border">
			<div class="input-group">
				<div class="input-group-prepend align-items-center pl-3">
					<i class="fa fa-search pr-1" aria-hidden="true"></i>
				</div>
				<input type="text" name="q" value="{Q}" placeholder="Tìm kiếm theo" aria-describedby="button-addon2" class="form-control border-0" />
			</div>
		</div>
	</div>
	<div class="col-4 pr-0">
		<div class="p-1 rounded-left border d-flex">
			<div class="input-group-prepend align-items-center pl-3">
				<i class="fa fa-th-large pr-1" aria-hidden="true"></i>
			</div>
			<select class="form-control border-0 select2" id="categories" name="categories">
				<option value="0">Chuyên mục hàng hóa </option>
				<!-- BEGIN: catalogy -->
				<option value="{catalogy.id}"  {catalogy.selected}>{catalogy.name}
				</option>
				<!-- BEGIN: sub -->
				<option value="{sub.id}" {sub.selected}> --- {sub.name}
				</option>
				<!-- END: sub -->
				<!-- END: catalogy -->
			</select>
		</div>
	</div>
	<div class="col-2 p-0">
		<button id="btn_search_product" onclick="show_product()" type="submit" class="bg_white text-warning border rounded-right border-left-0" style="height: 42px;width: 42px;"><i class="fa fa-search"></i></button>
	</div>
</div>

<div id="all">
	
</div>

<script>
	
	show_product();
	
	function show_product(){
		var q = $('input[name=q]').val();
		var categories = $('#categories').val();
		$.ajax({
			type : 'GET',
			url : nv_base_siteurl + 'index.php' + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '={OP}&mod=get_list_product',
			data: {q:q,
				categories:categories
			},
			beforeSend: function() {
				//$('button.btn_ecng').prop('disabled', true);
			},               
			complete: function() {
				//$('button.btn_ecng').prop('disabled', false);	
			}, 
			success : function(res){
				$('#all').html(res);
				check_checked();
				//console.log(arr_checkbox);
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});	
		
	}
	

	// Chọn tất cả
	function check_all_arr_checkbox(src){
		var all = $(src).is(":checked")
		if(all){
			$('#all .manage_product_item .ecng_label_checkbox input').map(function(){
				var id = parseInt($(this).val());
				$('#add_arr_checkbox_'+ id).prop( "checked", true );
				
				var name_product = $('[name=name_product_'+id+']').text();
				var image_product = $('[name=image_product_'+id+']').attr('src');
				var price_product = $('[name=price_product_'+id+']').text();
				var warehouse_product = $('[name=warehouse_product_'+id+']').text();
				
				arr_checkbox.push({"id":id,"name_product":name_product,"image_product":image_product,"price_product":price_product,"warehouse_product":warehouse_product});
				
			})
			}else{
			$('#all .manage_product_item .ecng_label_checkbox input').map(function(){
				var id = parseInt($(this).val());
				$('#add_arr_checkbox_'+ id).prop( "checked", false );
				const index = arr_checkbox.indexOf(id);
				var src = arr_checkbox.findIndex(function(post, index) {
					if(post.id == id)
					return true;
				});
				arr_checkbox.splice(src, 1);
				//console.log(arr_checkbox);
			})
		}
		active_btn();
	}
	//thêm 1 phần tử vào mảng
	function add_arr_checkbox(id) {
		
		var item_checkbox = $('#add_arr_checkbox_'+ id);
		if( item_checkbox.is(':checked')) {
			var name_product = $('[name=name_product_'+id+']').text();
			var image_product = $('[name=image_product_'+id+']').attr('src');
			var price_product = $('[name=price_product_'+id+']').text();
			var warehouse_product = $('[name=warehouse_product_'+id+']').text();
			
			arr_checkbox.push({"id":id,"name_product":name_product,"image_product":image_product,"price_product":price_product,"warehouse_product":warehouse_product});
			
		}else
		{
			var id = $('#add_arr_checkbox_'+ id).val();
			var src = arr_checkbox.findIndex(function(post, index) {
				if(post.id == id)
				return true;
			});
			arr_checkbox.splice(src, 1);
		}
		check_checked_all();
		active_btn();
	}
	
	function check_checked(){
		if(arr_checkbox.length == 0)
		{	
			$('button.btn_ecng').prop('disabled', true);
			return false;
		}else{
			$('button.btn_ecng').prop('disabled', false);
		}
		
		
		
		var check_all = true;
		$('#all .manage_product_item .ecng_label_checkbox input').map(function(){
			var id = parseInt($(this).val());
			var index = arr_checkbox.indexOf(id);
			
			var src = arr_checkbox.findIndex(function(post, index) {
				if(post.id == id)
				return true;
			});
			
			if(src !== -1)
			{
				$('#add_arr_checkbox_'+ id).prop( "checked", true );
				}else{
				check_all = false;
			}
		})
		
		if(check_all)
		{
			$('input[name=checkall]').prop( "checked", true);
		}
		active_btn();
	}
	
	function check_checked_all()
	{
		var count_not_checked = $('#all .manage_product_item .ecng_label_checkbox input').is(':not(:checked)');
		
		if(count_not_checked)
		{
			$('input[name=checkall]').prop( "checked", false);
		}
		else
		{
			$('input[name=checkall]').prop( "checked", true);
		}
	}
	
	function active_btn (){
		if(arr_checkbox.length == 0)
		{	
			$('button.btn_ecng').prop('disabled', true);
			
		}else{
			$('button.btn_ecng').prop('disabled', false);
		}
	}
	
</script>
<!-- END: main -->

