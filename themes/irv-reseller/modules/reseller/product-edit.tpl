<!-- BEGIN: main -->

<div class="mt-4">
	<form id="searchForm" method="post" enctype="multipart/form-data">
		<div class="row">
			<input class="btn_ecng export_product" type="button" value="Xuất danh sách sản phẩm" />
		</div>
		</br>
		<div class="col-md-2">
			<input type="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" class="file_excel" id="file_excel" name="file_excel">
		</div>
		</br>
		<input class="btn_ecng" type="button" id="submit" name="submit" value="Sửa hàng loạt" />
	</form>
</div>
<div class="row mt-2">
	<p style="color:red; font-size: 12px">* Giới hạn 200 sản phẩm / lượt đăng</p>
</div>
<div id="invalid_file"></div>
<div id="result"></div>
<div class="row" id="export_result" style="display:none">
	<p class="export_result" style="color: blue; text-decoration: underline; cursor: pointer;"> Xuất file excel kết quả</p>
</div>
<div class="data"></div>

<div class="modal" id="notifi_screen">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content" id="modal_content">
			<div class="modal-body text-center p-4">
				<div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
			</div>
		</div>
	</div>
</div>

<script>
	
	// check file excel
	$('.file_excel').change(function(){
		var filename = $('input[type=file]').val().split('.').pop().toLowerCase();
		if($.inArray(filename, ['xls','xlsx']) == -1) {
			alert('File không đúng định dạng!');
			$('.file_excel').val('');
			return;
		}
	});
	
	$('#submit').on('click', function (){
		if($(".file_excel").get(0).files.length == 0){
			alert('Chưa chọn file!');
		} else{
			// remove hết tất cả các function click của nút xuất kết quả
			$(".export_result").prop("onclick", null).off("click");
			
			$(".export_result").css({"color": "blue", "cursor": "pointer"}).bind("click", function(e){
				e.preventDefault();
				$('#notifi_screen').modal('show');
				$.ajax({               
					type: "GET",
					url: nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=product-edit&mod=is_download_result',
					dataType: 'json',              
					success: function(res) {
						$('#notifi_screen').modal('hide');
						<!-- console.log(res); -->
						if(res.status == 'OK'){
							window.location.href = res.link;
							$(".export_result").css({"color": "#999999", "cursor": "default"}).unbind("click");
						} else{
							alert(res.mess);
						}
					},                 
					error: function(xhr, ajaxOptions, thrownError) {
						console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
					}                  
				});               
			});

			$('#export_result').hide();
			$('#notifi_screen').modal('show');
			var formData = new FormData();
			var uploadFiles = document.getElementById('file_excel').files;
			formData.append('file', uploadFiles[0]);
			$.ajax({
				url : nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=product-edit&mod=handle-data',
				type : 'post',
				data : formData,
				dataType: 'json',
				cache: false,
				contentType: false,
				processData: false,
				success : function (res) {
					//console.log(res);
					$('#notifi_screen').modal('hide');
					var html = '';
					if(res.status == 'error'){
						html += '<p style="font-weight: bold; color:red;">*File template không hợp lệ!</p>';
						$('#invalid_file').html(html);
						$('#invalid_file').show();
						$('.data').hide();
						$('.result_live').hide();
					} else{
						$('#invalid_file').hide();
						displayHtml(res);
						html += '<div class="row result_live">';
						html += '<p id="numok" style="font-weight: bold; color:green;">Thành công: 0</p>';
						html += '<p id="numerr" class="ml-4" style="font-weight: bold; color:orange;"> Thất bại: 0</p>';
						html += '</div>';
						$('#result').html(html);
						$('.result_live').show();
						sendAjax(0, res, 0, 0);
					}
				}
			});
			$('form')[0].reset();
		}
	});
	
	function sendAjax(index, data, numok, numerr){
		if(index >= Object.keys(data).length){
			$('#export_result').show();
			return false;
		}
		$.ajax({
			url : nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=product-edit&mod=submit',
			type : 'post',
			dataType: 'json',
			data: {product: data[index], index: index},
			success : function (res) {
				console.log('-------------');
				console.log(res);
				if(res.result == 'ok'){
					numok++;
					$('#numok').html('Thành công: ' + numok);
					$('#img_loading_' + res.index).attr('src', '/assets/images/ok.png');
					} else{
					numerr++;
					<!-- console.log(numerr); -->
					$('#numerr').html('Thất bại: ' + numerr);
					$('#img_loading_' + res.index).attr('src', '/assets/images/error.png');
				}
				$('#result_' + res.index).html(res.detail);
			}
			}).always(function(){
			sendAjax(++index, data, numok, numerr);
		});
		
	}
	
	function displayHtml(data){
		var html = '';
		html += '<div class="table-responsive">';
		html += '<table class="table table-striped table-bordered table-hover">';
		html += '<thead>';
		html += '<tr>';
		html += '<th class="w100">STT</th>';
		html += '<th>Mã sản phẩm</th>';
		html += '<th>Tên sản phẩm</th>';
		html += '<th>Trạng thái</th>';
		html += '<th>Chi tiết</th>';
		html += '</tr>';
		html += '</thead>';
		
		html += '<tbody>';
		for(var i=0; i<Object.keys(data).length; i++){
			html += '<tr>';
			html += '<td>'+ data[i].serial +'</td>';
			html += '<td>'+ data[i].barcode +'</td>';
			html += '<td>'+ data[i].name_product +' </td>';
			html += '<td><image id="img_loading_'+data[i].index+'" src="/assets/images/load.gif"/></td>';
			html += '<td id="result_'+data[i].index+'"></td>';
			html += '</tr>';
		}
		html += '</tbody>';
		html += '</table>';
		html += '</div>';
		$('.data').html(html);
		$('.data').show();
	}
	
	$(".export_product").on('click', function(e){
		$('#notifi_screen').modal('show');
		e.preventDefault();
		$.ajax({               
			type: "GET",
			url: nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=product-edit&mod=is_download_product',
			dataType: 'json', 
			beforeSend: function() {
				
			},	               
			complete: function() {
				
			},                 
			success: function(res) {
				$('#notifi_screen').modal('hide');
				<!-- console.log(res); -->
				if(res.status == 'OK')
				{
					window.location.href = res.link; 
				}
				else
				{
					alert(res.mess);
				}
				
				
			},                 
			error: function(xhr, ajaxOptions, thrownError) {
				
				console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}                  
		});               
	});
	
</script>


<!-- END: main -->	