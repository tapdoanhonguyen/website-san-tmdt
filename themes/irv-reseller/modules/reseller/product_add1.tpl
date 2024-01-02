<!-- BEGIN: main -->
<!-- BEGIN: error -->
<div class="alert alert-warning">{ERROR}</div>
<!-- END: error -->
<div class="panel panel-default">
	<div class="panel-body">
		<h4 class="mb-4" >Thêm sản phẩm</h4>
		<form class="form-horizontal form_product_add"
		action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}"
		method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="{ROW.id}" />
			<div class="row">
				<div class="col-9">
					
					<div class="bg_white rounded p-4">
						
						<div class="fs_16 font-weight-bold mb-4">{LANG.info_product}</div>
						<div class="form-group row ">
							<label for="" class="col-2 col-form-label">{LANG.name_product}<span class="text_red">*</span></label>
							<div class="col-sm-10 d-flex ">
								<input type="text" class="form-control" style="line-height:2.5" maxlength="100" name="name_product" placeholder="Nhập tên sản phẩm" id="keywords_search1" onkeyup="countChars1(this)" onchange="keywordsSearch1()" value="{ROW.name_product}" onchange="nv_get_alias('id_alias')" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')">
								<span class="px-3 rounded py-2 position-absolute" style="right:0px;"><span id="charNum1">0</span>/100</span>
							</div>
						</div>
						<div class="form-group row justify-content-end">
							<div class="col-sm-9" >
								<input class="border form-control" onkeydown="return event.key != 'Enter'" onchange="keywordsSearch()" id="keywords_search" placeholder="Nhập từ khóa tìm kiếm..." type="text">
							</div>
							<div class="col-sm-1">
								<span onclick="keywordsSearch()" id="keywords_button" style="cursor:pointer; top:0; right:5px; padding:5px 15px;" class="position-absolute btn_ecng rounded" >Thêm</span>
							</div>
							<div class="mt-2 col-sm-10" id="keywords">
								<!-- BEGIN: keyword -->
								<span class="mr-2 p-1 d-flex rounded d-block  float-left mt-1" style="background: #E6E6E6; cursor:pointer "><p class="search_text m-0 text-truncate" style="max-width:80px">{keyword}</p><!-- BEGIN: delete --><a class="pl-1" onclick="$(this).parent().remove();" style="color: #0074a2;">×</a><!-- END: delete --><input type="hidden" name="keyword[]" value="{keyword}"></span>
								<!-- END: keyword -->
							</div>
						</div>
						
						<div class="form-group row">
							<label for="" class="col-2 col-form-label">Mã sản phẩm<span class="text_red">*</span></label>
							<div class="col-sm-10">
								<div class="input-group  border rounded-lg mb-2">
									<input {readonly} class="form-control border-0" style="padding: 1.26rem 0.75rem;" type="text" name="barcode" value="{ROW.barcode}" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
									<span class="input-group-addon {pointer}" id="{random_num}" style="padding: 1px 10px;">
										<div class="input-group-prepend">
											<span class="btn secondary_text input-group-addon {pointer}" id="{random_num}"><i class="fa fa-random" ></i></span>
										</div>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-2 col-form-label">{LANG.categories_id}<span class="text_red">*</span></label>
							<div class="col-10">
								<div class="input-group mb-2 border rounded-lg ">
									<select class="form-control categories_id select2" name="categories_id">
										<option value="0">-- Chọn danh mục --</option>
										<!-- BEGIN: parent_loop -->
										<option value="{pcatid_i}" {pselect}>
											{ptitle_i}
										</option>
										<!-- END: parent_loop -->
									</select>
								</div>
							</div>
							
						</div>
						
						<div class="form-group row " id="box_brand">
							<label for="" class="col-2 col-form-label">{LANG.select_brand}<span class="text_red">*</span></label>
							<div class="col-4">
								<div class="input-group mb-2 border rounded-lg ">
									<select required="" class="form-control border-0" name="brand" id="brand">
										<!-- BEGIN: brand -->
										<option value="{STATUS.id}" {STATUS.selected}>
											{STATUS.title}
										</option>
										<!-- END: brand -->
									</select>
									
								</div>
							</div>
							<label for="" class="col-2 col-form-label text-right">{LANG.select_origin}<span class="text_red">*</span></label>
							<div class="col-4 " id="box_origin">
								<div class="input-group mb-2 border rounded-lg ">
									<select required="" class="form-control border-0" name="origin" id="origin">
										<!-- BEGIN: origin -->
										<option value="{STATUS.id}" {STATUS.selected}>
											{STATUS.title}
										</option>
										<!-- END: origin -->
									</select>
								</div>
							</div>
						</div>
						
						<div class="form-group row">
							<label for="" class="col-2 col-form-label">Kích thước sản phẩm</label>
							<div class="col-3">
								<div class="input-group  border rounded-lg mb-2">
									<input class="form-control bg-none border-0 " type="number" min="0" onkeypress="return isNumberKey(event)" step="0.01" name="length_product" value="{ROW.length_product}" placeholder="Dài"  oninput="setCustomValidity('')">
									<div class="input-group-prepend  ">
										<button  type="button" class="btn bg_gray" disabled>cm</button>
									</div>
									
								</div>
							</div>
							<div class="col-3">
								<div class="input-group  border rounded-lg mb-2">
									<input  class="form-control bg-none border-0 " type="number" min="0" onkeypress="return isNumberKey(event)" placeholder="Rộng" step="0.01" name="width_product" value="{ROW.width_product}"
									oninput="setCustomValidity('')">
									<div class="input-group-prepend  ">
										<button  type="button" class="btn bg_gray" disabled>cm</button>
									</div>
								</div>
							</div>
							<div class="col-3">
								<div class="input-group  border rounded-lg mb-2">
									<input class="form-control bg-none border-0 " type="number" min="0" onkeypress="return isNumberKey(event)" placeholder="Cao" step="0.01" name="height_product" value="{ROW.height_product}"
									oninput="setCustomValidity('')">
									<div class="input-group-prepend  ">
										<button  type="button" class="btn bg_gray" disabled>cm</button>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row price_product" {disabled_price}>
							<label for="" class="col-2 col-form-label">Giá sản phẩm<span class="text_red">*</span></label>
							
							<div class="col-3">
								<div class="input-group  border rounded-lg mb-2">
									<input class="form-control bg-none border-0 " type="text" name="price" value="{ROW.price}" placeholder="Giá bán" onkeyup="this.value=FormatNumber(this.value);" oninput="setCustomValidity('')">
									<div class="input-group-prepend ">
										<button type="button" class="btn bg_gray" disabled="">đ</button>
									</div>
								</div>
							</div>
							
							<div class="col-3">
								<div class="input-group  border rounded-lg mb-2">
									<input class="form-control bg-none border-0 " placeholder="Giá niêm yết" type="text" name="price_special" value="{ROW.price_special}" onkeyup="this.value=FormatNumber(this.value);" oninput="setCustomValidity('')">
									<div class="input-group-prepend  ">
										<button type="button" class="btn bg_gray" disabled="">đ</button>
									</div>
								</div>
							</div>
							
							<div class="col-3">
								<div class="input-group  border rounded-lg mb-2">
									<input class="form-control bg-none border-0 " type="text" name="warehouse" value="{ROW.warehouse}" onkeyup="this.value=FormatNumber(this.value);" oninput="setCustomValidity('')">
									<div class="input-group-prepend  ">
										<button type="button" class="btn bg_gray" disabled="">SL tồn kho</button>
									</div>
								</div>
							</div>
							
						</div>
						<div class="form-group row">
							
							<label for="" class="col-2 col-form-label">{LANG.weight_product}<span class="text_red">*</span></label>
							<div class="col-9">
								<input class="form-control border" style="padding: 1.2rem .75rem;" type="number" min="0" onkeypress="return isNumberKey(event)" step="0.01" name="weight_product" value="{ROW.weight_product}" required="required" oninvalid="setCustomValidity('Vui lòng nhập số')" oninput="setCustomValidity('')">
								
							</div>
							
						</div>
						<div class="text-center mb-2 {classify_check3}"id="classify_add">
							<a class="btn_ecng add_classify" onclick="add_group();">Thêm phân loại</a>
						</div>
						
						
						<div id="classify" class="mt-4">
							<div id="classify_list">
								<!-- BEGIN: classify_title -->
								<div class="p-4 mb-3 phanloai rounded" phanloai="{classify.id}" id="classifyfull_{classify.id}" style="background: #f7f7f7;">
									<div id="classify_{classify.id}">
										<div class="d-flex justify-content-between"><span class="fs_18">Nhóm phân loại</span><button type="button" class="btn_ecng_outline" onclick="remove_classify('{classify.id}');">Xóa</button></div>
										<div class="row" id="classify_list_group_{classify.id}">
											<div class="col-md-8 offset-md-2">
												
												<div class="form-gruop row">
													<label class="col-3 col-form-label">Tên nhóm phân loại</label>
													<div class="col-8">
														<div class="input-group rounded-lg mb-2">
															<input
															type="text"
															class="form-control bg-none border name_group_classify"
															placeholder="Nhóm phân loại như: màu sắc, size,...."
															name="classify[{classify.id}][name]"
															oninvalid="setCustomValidity('Vui lòng nhập tên phân loại')"
															required="required"
															oninput="setCustomValidity('')"
															onkeyup="change_name_group('{classify.id}',this)"
															value="{classify.name_classify}"
															/>
														</div>
													</div>
												</div>
												
												<!-- BEGIN: classify_value -->
												<div stt="{classify_value.id}" class="form-gruop row stt_classify" id="classify_list_group_value_{classify.id}_{classify_value.id}">
													<label for="" class="col-3 col-form-label"></label>
													<div class="col-8">
														<div class="input-group rounded-lg mb-2">
															<input name_detail_group_classify="{classify_value.id}" type="text" class="form-control bg-none border name_detail_group_classify"
															placeholder="Ví dụ : Đỏ, vàng, xanh,.."
															name="classify[{classify.id}][value][{classify_value.id}]"
															required="required"
															onclick="setCustomValidity('Vui lòng nhập phân loại')"
															oninput="setCustomValidity('')"
															onchange="change_value_name_group('{classify.id}',{classify_value.id})"
															value="{classify_value.name}"
															/>
														</div>
													</div>
													<!-- BEGIN: delete -->
													<div class="col-1"><button type="button" class="btn_ecng_outline" onclick="remove_value_name_group({classify.id},{classify_value.id})">Xóa</button></div>
													<!-- END: delete -->
												</div>
												<!-- END: classify_value -->
												
											</div>
											<div class="text-center col-12 mb-3"><a class="btn_ecng" onclick="add_value_name_group('{classify.id}');">+</a></div>
											
											<!-- BEGIN: edit_image_classify -->
											<div>
												<div class="title_image_group1">Hình ảnh thuộc tính (tối thiểu {w_h} x {w_h})</div>
												<div class="content_image_group1">
													<!-- BEGIN: image_classify -->
													<div id="item_group0_{classify_value.id}" class="content_item_image_group1">
														<label title="Upload hình ảnh" for="input_image_{classify_value.id}">
															<div class="item_image_group1">
																<!-- BEGIN: add -->
																+
																<!-- END: add -->
																
																<!-- BEGIN: loop -->
																<span class="pip"><img class="imageThumb" src="{src_image}"/><input name="classify[{classify.id}][image][{classify_value.id}]" type="hidden" value="{homeimgfile}"/><span onclick='remove_image(this)' class="remove"><i class="fa fa-trash" aria-hidden="true"></i></span></span>
																
																<!-- END: loop -->
															</div>
															<div class="capitalize name_item_group1 mt-1">{classify_value.name}</div>
															<input onchange="upload_image_group1(event, {classify.id},{classify_value.id});" class="d-none upload_img_group1" id="input_image_{classify_value.id}" type="file" accept="image/*" name="image_group[{classify_value.id}][]" />
														</label>
													</div>									
													<!-- END: image_classify -->
												</div>
											</div>
											<!-- END: edit_image_classify -->
										</div>
									</div>
								</div>
								
								<!-- END: classify_title -->
							</div>
						</div>
						<div class="table-responsive">						
							<table class="table table-bordered full" style="color: #444444;">
								<tbody>
									<tr class="content_classify_product {classify_class}" id="classify_product">
										<td class="border-0" colspan="3" style="background: #fff;color: #222222;text-transform: uppercase;">
											<strong>
												Danh sách phân loại hàng
											</strong>
										</td>
									</tr>
									<tr class="content_classify_product {classify_class}" id="classify_product2">
										<td class="border-0" colspan="3" >
											<div class="table-responsive result_detail_classify">
												<table class="table table-bordered full">
													<thead>
														<tr id="classify_product2_list" style="background:#DADADA">
															<!-- BEGIN: classify_title_table -->
															<th>{classify.name_classify}</th>
															<!-- END: classify_title_table -->
															<th>Giá bán (bắt buộc)</th>
															<th>Giá niêm yết</th>
															<th>SL Tồn kho</th>
															<th>Trạng thái</th>
														</tr>
													</thead>
													
													<tbody id="data_classify_product2_list">
														
														<!-- BEGIN: classify_table_one -->
														<tr data_classify_price="{table_classify.id}" id="data_classify_product2_list_{table_classify.id}">
															
															<td class="vertical_center" id="data_classify_product2_list_name_{table_classify.id}_id1">{table_classify.name}				
																<input hidden="" name="product[{table_classify.id}][id1]" value="{table_classify.id}" />
																<td>
																	<input
																	class="form-control"
																	type="text"
																	name="product[{table_classify.id}][price]"
																	placeholder="Giá bán"
																	required="required"
																	value="{table_classify1.price}"
																	oninvalid="setCustomValidity('Vui lòng nhập giá sản phẩm')"
																	oninput="setCustomValidity('')"
																	onkeyup="this.value=FormatNumber(this.value);"
																	/>
																</td>
																<td>
																	<input
																	class="form-control"
																	type="text"
																	name="product[{table_classify.id}][price_special]"
																	placeholder="Giá niêm yết"
																	value="{table_classify1.price_special}"
																	oninvalid="setCustomValidity('Vui lòng nhập giá sản phẩm')"
																	oninput="setCustomValidity('')"
																	onkeyup="this.value=FormatNumber(this.value);"
																	/>
																</td>
																<td><input class="form-control" required="required" type="text" name="product[{table_classify.id}][sl_tonkho]" 
																	value="{table_classify1.sl_tonkho}"
																placeholder="SL Tồn kho" onkeyup="this.value=FormatNumber(this.value);" /></td>
																
																<td class="text-center">
																	<label class="ecng_label_checkbox ">
																		<input {table_classify1.checked} value="1" type="checkbox" name="product[{table_classify.id}][status]" />
																		<span class="ecng_checkmark"></span>
																	</label>
																</td>
															</td>
														</tr>
														<!-- END: classify_table_one -->
														
														<!-- BEGIN: classify_table -->
														<tr data_classify_price="{table_classify.id}_{table_classify1.id}" id="data_classify_product2_list_{table_classify.id}_{table_classify1.id}">
															<!-- BEGIN: loop_classify -->
															<td class="vertical_center" {rowspan} id="data_classify_product2_list_name_{index0}_{table_classify.id}_id1">{table_classify.name}</td>
															<!-- END: loop_classify -->
															<td id="data_classify_product2_list_name_{table_classify.id}_{table_classify1.id}_id2">{table_classify1.name}
																<input hidden="" name="product[{table_classify.id}_{table_classify1.id}][id1]" value="{table_classify.id}" />
																<input hidden="" name="product[{table_classify.id}_{table_classify1.id}][id2]" value="{table_classify1.id}" />
															</td>
															<td>
																<input
																class="form-control"
																type="text"
																name="product[{table_classify.id}_{table_classify1.id}][price]"
																placeholder="Giá bán"
																required="required"
																value="{table_classify1.price}"
																oninvalid="setCustomValidity('Vui lòng nhập giá sản phẩm')"
																oninput="setCustomValidity('')"
																onkeyup="this.value=FormatNumber(this.value);"
																/>
															</td>
															<td>
																<input
																class="form-control"
																type="text"
																name="product[{table_classify.id}_{table_classify1.id}][price_special]"
																placeholder="Giá niêm yết"
																value="{table_classify1.price_special}"
																oninvalid="setCustomValidity('Vui lòng nhập giá sản phẩm')"
																oninput="setCustomValidity('')"
																onkeyup="this.value=FormatNumber(this.value);"
																/>
															</td>
															<td>
																<input class="form-control" required="required" type="text" name="product[{table_classify.id}_{table_classify1.id}][sl_tonkho]" 
																value="{table_classify1.sl_tonkho}"
																placeholder="SL Tồn kho" onkeyup="this.value=FormatNumber(this.value);" />
															</td>
															
															<td class="text-center">
																<input {table_classify1.checked} value="1" type="checkbox" name="product[{table_classify.id}_{table_classify1.id}][status]" />	
															</td>
															
														</tr>
														<!-- END: classify_table -->
														
													</tbody>
													
													
												</table>
											</div>
										</td>
									</tr>
								</tbody>
								
							</table>
						</div>
					</div>
					
					
					<div class="bg_white rounded mt-3 p-4" id="section3">
						<h4>Vận chuyển</h4>
						<div class="form-group row align-items-center">
							<div class="col-auto">
								<label class="ecng_label_checkbox pr-4">
									<input style="margin-top: 10px;" type="checkbox" name="self_transport" value="1" {self_transport_checked} />
									<span class="ecng_checkmark"></span>
								</label>
							</div>
							<label for="" class="col-2 col-form-label">Cửa hàng tự vận chuyển</label>
						</div>
						
						<div class="form-group row align-items-center">
							<div class="col-auto">
								<label class="ecng_label_checkbox pr-4">
									<input style="margin-top: 30px;" type="checkbox" name="free_ship" value="1" {free_ship_checked} />
									<span class="ecng_checkmark"></span>
								</label>
							</div>
							<label for="" class="col-auto col-form-label">Miễn phí vận chuyển cho Khách hàng (Cửa hàng sẽ chịu phí ship này)</label>
						</div>
					</div>
					
					
					
					<div class="table-responsive bg_white mt-3 rounded" id="section4">
						<table class="table table-striped table-bordered full">
							<colgroup>
								<col class="w200" />
								<col />
							</colgroup>
							<tbody>
								
								</br>
								<tr>
									<td class="border-0 pt-0" colspan="3" style="background: #fff;color: #222222;text-transform: uppercase;">
										<strong>
											{LANG.illustration}
										</strong>
									</td>
								</tr>
								
								<tr>
									<td class="border-0" colspan="3">
										<div>
											<div class="panel-heading mb-2">
												Chọn hình ảnh (tối thiểu {w_h} x {w_h})
											</div> 
											<div class="panel-body">
												<div class="content_image_main">
													<!-- BEGIN: data_image -->
													<div id="item_image_main{stt}" stt_img="{stt}" class="item_image_main">
														<label for="input_file_image{stt}">
															<div class="item_image_main_span rounded">
																<!-- BEGIN: add -->
																<img src="{NV_STATIC_URL}themes/{TEMPLATE}/images/icon/icon_add_circle_outline.svg" />
																<!-- END: add -->
																
																<!-- BEGIN: loop -->
																<span class="pip"><img class="imageThumb" src="{src_image}"/><input type="hidden" value="{homeimgfile}" name="array_image_pro[]" /><span onclick='remove_image(this)' class="remove"><i class="fa fa-trash" aria-hidden="true"></i></span></span>
																
																<!-- END: loop -->
															</div>
															<input multiple id="input_file_image{stt}" onchange="upload_image_main(event, {stt});" class="d-none" type="file" accept="image/*" name="array_image[]"/>
														</label>
													</div>
													<!-- END: data_image -->	
												</div>
											</div>
										</div>
									</td>
								</tr>
								
								<tr>
									<td class="border-0" colspan="3" style="background: #fff;color: #222222;text-transform: uppercase;">
										<strong>
											{LANG.bodytext} <span>(*)</span>
										</strong>
									</td>
								</tr>
								<tr>
									<td class="border-0" colspan="3">
										{ROW.bodytext}
									</td>
								</tr>
								
								
								<tr>
									<td class="border-0" colspan="3" style="background: #fff;color: #222222;text-transform: uppercase;">
										<strong>
											{LANG.sort_content}
										</strong>
									</td>
								</tr>
								<tr>
									<td class="border-0" colspan="3">
										{ROW.description}
									</td>
								</tr>
								
								
							</tbody>
							<tr>
								<td colspan="3" style="text-align: center">
									<input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}" />
								</td>
							</tr>
						</table>
						
					</div>
					
					
				</div>
				<div class="col-2 ml-3">
					<div class="bg_white rounded p-3" id="scrollAddproduct">
						<nav class="" id="myScrollspy">
							<ul class="pl-3 nav nav-pills flex-column">
								<li class="nav-item">	
									<a class="nav-link active" href="#section1">Thông tin cơ bản</a>
								</li>
								<li class="nav-item">
									<a class="nav-link " href="#section3">Vận chuyển</a>
								</li>
								<li class="nav-item">
									<a class="nav-link " href="#section4">Hình ảnh, mô tả</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
				
			</div>
			
		</div>
		
	</form>
</div>


</div>

<!-- The Modal -->
<div class="modal fade" id="sitemodal">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			
			<!-- Modal Header -->
			<div class="modal-header1">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			
			<!-- Modal body -->
			<div class="modal-body">
				
			</div>
			
		</div>
	</div>
</div>

<script>
	
	
	bodytext.on( 'fileUploadRequest', function( evt ) {
		
		let fileLoader = evt.data.fileLoader;
		console.log(fileLoader);
		console.log(fileLoader.file.width);
		var size = (fileLoader.file.size)/1024;
		
		if (size > 2048)
		{
			fileLoader.message = "Kích thước hình ảnh không vượt quá 2M"
			fileLoader.abort ();
			evt.cancel ();
		}
		
		// kiểm tra số lượng hình ảnh không vượt quá 10 hình 
		var retails_bodytext = CKEDITOR.instances['retails_bodytext'].getData();
		var count_img = (retails_bodytext.match(/<img/g) || []).length;
		
		if(count_img >= 10)
		{
			fileLoader.message = "Mô tả sản phẩm không vượt quá 10 hình"
			fileLoader.abort ();
			evt.cancel ();
		}
		
		//DO required
		// To prevent the default behavior.
		//evt.stop ();
		
	});
	
	
	
	description.on( 'fileUploadRequest', function( evt ) {
		
		let fileLoader = evt.data.fileLoader;
		var size = (fileLoader.file.size)/1024;
		
		if (size > 2048)
		{
			fileLoader.message = "Kích thước hình ảnh không vượt quá 2M"
			fileLoader.abort();
			evt.cancel ();
		}
		
		// kiểm tra số lượng hình ảnh không vượt quá 10 hình 
		var retails_description = CKEDITOR.instances['retails_description'].getData();
		var count_img = (retails_description.match(/<img/g) || []).length;
		
		if(count_img >= 10)
		{
			fileLoader.message = "Thông số kỹ thuật không vượt quá 10 hình"
			fileLoader.abort();
			evt.cancel ();
		}
		
		//DO required
		// To prevent the default behavior.
		//evt.stop ();
		
	});
	
</script>


<script type="text/javascript">
	
	$('.unit_currency_1').select2({})
	$('.store_id').select2({placeholder:'Mời bạn chọn cửa hàng'})
	//$('.unit_id').select2({})
	$('.unit_weight').select2({})
	$('.unit_length').select2({})
	$('.unit_width').select2({})
	$('.unit_height').select2({})
	
	
	function nv_get_alias(id) {
		var title = strip_tags($("[name='name_product']").val());
		if (title != '') {
			$.post(nv_base_siteurl + 'index.php' + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=productadd&nocache=' + new Date().getTime(), 'get_alias_title=' + encodeURIComponent(title), function(res) {
				$("#"+id).val(strip_tags(res));
			});
		}
		return false;
	}
	$('#random_num').click(function() {
		$(this).parent('.input-group').children('input').val('{raw_product_prefix}' + generateCardNo(9));
	});
	$('#upload_image_product').change(function () {
		var name_file = $(this).val().slice(12)
		if(name_file!=''){
			$('#image').val('{currentpath}/'+name_file);
			}else{
			$('#image').val($(this).val());
		}
	}); 
	<!-- BEGIN: no_edit -->
	$('#brand').select2();
	$('#origin').select2();
	<!-- END: no_edit -->
	
	$('select[name=categories_id]').change(function() {
		var categories_id = $(this).find('option:selected').val();
		if(categories_id!={ROW.categories_id}){
			$("#brand").empty()
			$("#origin").empty()
		}
		$('#box_origin').removeClass('hidden');
		$('#box_brand').removeClass('hidden');
		$('#brand').select2({
			placeholder:"Chọn thương hiệu",
			ajax: {
				url: nv_base_siteurl + 'index.php' + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '={OP}&mod=brand&cat_id='+categories_id,
				dataType: 'json',
				data: function (params) {
					var query = {
						q: params.term
					}
					return query;
				},
				processResults: function (data) {
					return {
						results: data
					};
				},
				cache: true
			}
		}); 
		$('#origin').select2({
			placeholder:"Chọn xuất xứ", 
			ajax: {
				url: nv_base_siteurl + 'index.php' + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '={OP}&mod=origin&cat_id='+categories_id,
				dataType: 'json',
				delay: 250,
				data: function (params) {
					var query = {
						q: params.term
					}
					return query;
				},
				processResults: function (data) {
					return {
						results: data
					};
				},
				cache: true
			}
		});
		
	})
	<!-- BEGIN: edit2 -->
	$('#brand').select2({
		placeholder:"Chọn thương hiệu",
		ajax: {
			url: nv_base_siteurl + 'index.php' + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '={OP}&mod=brand&cat_id={ROW.categories_id}',
			dataType: 'json',
			delay: 250,
			data: function (params) {
				var query = {
					q: params.term
				}
				return query;
			},
			processResults: function (data) {
				return {
					results: data
				};
			},
			cache: true
		}
	});
	$("#brand").select2("trigger", "select", {
		data: { id: {ROW.brand}, text: '{ROW.brand_name}'}
	});
	$('#box_origin').removeClass('hidden');
	$('#box_brand').removeClass('hidden');
	$('#origin').select2({
		placeholder:"Chọn xuất xứ", 
		ajax: {
			url: nv_base_siteurl + 'index.php' + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '={OP}&mod=origin&cat_id={ROW.categories_id}',
			dataType: 'json',
			delay: 250,
			data: function (params) {
				var query = {
					q: params.term
				}
				return query;
			},
			processResults: function (data) {
				return {
					results: data
				};
			},
			cache: true
		}
	});
	$("#origin").select2("trigger", "select", {
		data: { id: {ROW.origin}, text: '{ROW.origin_name}'}
	});
	<!-- END: edit2 -->
	$('.categories_id').select2({})
	
	
	// kích thướt hình ảnh chuẩn
	var w_h = 800;
	
	// data mẫu
	
	var data_json = '{data_price}';
	var data_obj = JSON.parse(data_json);
	
	
	$("#classify_product2").on("change", "input", function(){
		getdata_new();
	});
	
	
	function getdata_new()
	{
		data_obj = [];
		
		$('#data_classify_product2_list tr').each(function(index, value){
			
			var data_classify_price = $(this).attr('data_classify_price');
			
			var id1 = $('input[name="product['+ data_classify_price +'][id1]"]').val();
			
			var length_id2 = $('input[name="product['+ data_classify_price +'][id2]"]').length;
			
			if(length_id2)
			var id2 = $('input[name="product['+ data_classify_price +'][id2]"]').val();
			else
			var id2 = 0;
			
			
			var price = $('input[name="product['+ data_classify_price +'][price]"]').val();
			var price_special = $('input[name="product['+ data_classify_price +'][price_special]"]').val();
			var sl_tonkho = $('input[name="product['+ data_classify_price +'][sl_tonkho]"]').val();
			var status = 0;
			
			
			if ($('input[name="product['+ data_classify_price +'][status]"]').is(':checked')) 
			{
				status = 1;
			}
			
			var obj = {'id1' : id1, 'id2' : id2, 'price' : price, 'price_special' : price_special, 'sl_tonkho' : sl_tonkho, 'status' : status};
			
			data_obj.push(obj); 	
			
		});
	}
	
	function getdata(id1,id2)
	{
		var data_select = {'id1' : '', 'id2' : '', 'price' : '', 'price_special' : '', 'sl_tonkho' : '', 'status' : '1', 'checked' : ''};
		
		$.each(data_obj , function (index, element){ 
			
			if(element.id1 == id1 && element.id2 == id2)
			{
				data_select = element;
				return false;
			}
			
		}); 
		
		
		return data_select;
	}
	
	
	// xử lý hình ảnh
	
	function upload_image_main(e, id) {
		
		console.log('hhhhhhhhh');
		
		var ext = $('#input_file_image'+id).val().split('.').pop().toLowerCase();
		if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
			alert('Không phải file ảnh!');
			return;
		}
		
		var files = e.target.files;
		
		if(files.length > 7)
		{
			alert('Số lượng hình ảnh không được phép vượt quá 7!');
			return false;
		}
		
		
		// xóa cảnh báo upload hình ảnh trước đó cảnh báo nếu có
		$('.content_image_main .error_image_product').removeClass('error_image_product');
		
		
		return Promise.all([].map.call(files, function (file) {
			return new Promise(function (resolve, reject) {
				var reader = new FileReader();
				
				reader.onloadend = function () {
					
					var image = new Image();
					image.src = reader.result;
					image.onload = function () {
						var height = this.height;
						var width = this.width;
						var size = (file.size/1024);
						resolve({ url: reader.result, width : width, height : height, size : size});
						
					};
					
					
				};
				
				reader.readAsDataURL(file);
			});
			})).then(function (results) {
			
			var stt = id;
			
			$.each(results , function (index, result){
				
				if(result.width < w_h && result.height < w_h)
				{
					alert('Kích thước tối thiểu (tối thiểu '+ w_h +' x '+ w_h +')');
					$('#input_file_image'+id).val('');
					return true;
				}
				
				if(result.width > 3000 || result.height > 3000)
				{
					alert('Kích thước không vượt quá 3000px');
					$('#input_file_image'+id).val('');
					return true;
				}
				
				if(result.size > 2048)
				{
					alert('Dung lượng không vượt quá 2M');
					$('#input_file_image'+id).val('');
					return true;
				}
				
				id = stt;
				
				$("#item_image_main" + id + ' .item_image_main_span').html("<span class=\"pip\">" +
				"<img class=\"imageThumb\" src=\"" + result.url + "\"/>" +
				"<input type=\"hidden\" value="+ result.url +" name=\"array_image_pro[]\" />" +
				"<span onclick='remove_image(this)' class=\"remove\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></span>" +
				"</span>");
				
				stt = stt + 1;
				
				if(stt > 7)
				{
					stt = 1;
				}
				
				
			});
			return results;
		});
		
		
	}
	
	
	function remove_image(a)
	{
		event.preventDefault()
		
		$(a).parent().parent().parent().find('input[type=file]').val('');
		$(a).parent().parent().html('+');
		$(a).parent(".pip").remove();
	}
	
	function upload_image_group1(e,id_group,id)
	{
		var files = e.target.files,
		filesLength = files.length;
		for (var i = 0; i < filesLength; i++) {
			var f = files[i]
			var fileReader = new FileReader();
			fileReader.onload = (function(e) {
				
				var image = new Image();
				image.src = fileReader.result;
				image.onload = function () {
					var height = this.height;
					var width = this.width;
					
					if(height < w_h && width < w_h)
					{
						alert('Kích thước tối thiểu (tối thiểu '+ w_h +' x '+ w_h +')');
						$('#input_image_'+id).val('');
						return false;
					}
					
					if(width > 3000 || height > 3000)
					{
						alert('Kích thước không vượt quá 3000px');
						$('#input_image_'+id).val('');
						return false;
					}
					
					var size = (f.size/1024);
					if(size > 2048)
					{
						alert('Dung lượng không vượt quá 2M');
						$('#input_image_'+id).val('');
						return false;
					}
					
					var file = e.target;
					$("#item_group0_" + id + ' .item_image_group1').html("<span class=\"pip\">" +
					"<img class=\"imageThumb\" src=\"" + e.target.result + "\"/>" +
					"<input name=\"classify["+ id_group +"][image]["+ id +"]\" type=\"hidden\" value="+ e.target.result +" />" +
					"<span onclick='remove_image(this)' class=\"remove\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></span>" +
					"</span>");
					
				};
				
				
			});
			fileReader.readAsDataURL(f);
		}
		
	}
	
	
	function add_image_group1(id_group,id_next)
	{ 
		
		var length_value = $('#classify_list_group_value_'+ id_group +'_' + id_next +' .name_detail_group_classify').length;
		var name_value = '';
		
		if(length_value > 0)
		{
			name_value = $('#classify_list_group_value_'+ id_group +'_' + id_next +' .name_detail_group_classify').val();
		}
		var item_html = '<div id="item_group0_'+ id_next +'" class="content_item_image_group1"><label title="Upload hình ảnh" for="input_image_'+ id_next +'"><div class="item_image_group1 btn_ecng_dotted rounded"><img src="{NV_STATIC_URL}themes/{TEMPLATE}/images/icon/icon_add.svg" style="width:24px"/></div><div class="capitalize name_item_group1 mt-1"><span>'+ name_value +'</span></div><input onchange="upload_image_group1(event, '+ id_group +', '+ id_next +');" class="d-none upload_img_group1" id="input_image_'+ id_next +'" type="file" accept="image/*" name="image_group['+ id_next +'][]"/></label></div>';
		$('.content_image_group1').append(item_html);
	}
	
	
	
	// xử lý thuộc tính sản phẩm
	
	// thêm thuộc tính
	function add_group()
	{
		// stt group
		var id_group = parseInt(get_stt_phanloai()) + 1;
		
		var count_phan_loai = $('#classify_list .phanloai').length;
		// đếm phân loại = 2 thì cho nút add_group ẩn đi
		if(count_phan_loai == 1)
		{
			$('#classify_add').addClass('hidden');
		}
		
		// hiên thị table nhập giá
		$('.content_classify_product').removeClass('hidden');
		
		
		// hình ảnh group 1
		var div_html_image = '';
		if (id_group == 1) {
			div_html_image = '<div><div class="title_image_group1">Hình ảnh thuộc tính (tối thiểu '+ w_h +' x '+ w_h +')</div><div class="content_image_group1"></div></div>';
			// thêm div chứa hình ảnh nhóm phân loại
		}
		
		$('#classify_list').append('<div class="p-4 mb-3 phanloai" phanloai="'+ id_group +'" id="classifyfull_' + id_group + '" style="background: #F7F7F7;">' +
		'<div  id="classify_' + id_group + '">' +
		
		'<div class="d-flex justify-content-between">' +
		'<span class="fs_18">Nhóm phân loại</span>' +
		'<img src="{NV_STATIC_URL}themes/{TEMPLATE}/images/icon/icon_clear.svg" style="cursor:pointer" onclick="remove_classify(\'' + id_group + '\');"/>' +
		'</div>' +
		
		'<div class="row" id="classify_list_group_' + id_group + '">' +
		'<div class="col-md-8 offset-md-2">' +
		'<div  class="form-gruop row">' +
		'<label class="col-3 col-form-label">Tên nhóm phân loại</label>' +
		'<div class="col-8">' +
		'<div class="input-group rounded-lg mb-2">' +
		'<input type="text" class="form-control bg-none border name_group_classify" placeholder="Nhóm phân loại như: màu sắc, size,...." name="classify[' + id_group + '][name]"  oninvalid="setCustomValidity(\'Vui lòng nhập tên phân loại\')" required="required" oninput="setCustomValidity(\'' + '\')" onkeyup="change_name_group(\'' + id_group + '\',this)" value="" >' +
		'</div>' +
		'</div>' +
		'</div>' +
		'<div stt=1 class="form-gruop row stt_classify" id="classify_list_group_value_' + id_group + '_1">' +
		'<label class="col-3 col-form-label">Phân loại sản phẩm</label>' +
		'<div class="col-8">' +
		'<div class="input-group rounded-lg mb-2">' +
		'<input name_detail_group_classify ="1" type="text" class="form-control bg-none border name_detail_group_classify" placeholder="Ví dụ : Đỏ, vàng, xanh,.." name="classify[' + id_group + '][value][1]"  required="required" oninvalid="setCustomValidity(\'Vui lòng nhập phân loại\')"  oninput="setCustomValidity(\'' + '\')" onchange="change_value_name_group(\'' + id_group + '\',1)" value="" /></td>' +
		'</div>' +
		'</div>' + 
		
		'</div>' +
		'</div>' +
		'<div class="text-center col-12 my-3">' +
		'<a class="btn_ecng_dotted px-5 py-2 secondary_text" style="cursor:pointer" onclick="add_value_name_group(\'' + id_group + '\');"><img class="pr-1" src="{NV_STATIC_URL}themes/{TEMPLATE}/images/icon/icon_add.svg" style="padding-bottom:1px;"/>Thêm phân loại sản phẩm</a>' +
		'</div>' +
		div_html_image +
		'</div>' +
		'</div>' +
		'</div>');
		
		
		
		if (id_group == 1) {
			// xử lý thêm hình ảnh cho nhóm phân loại 1
			add_image_group1(1,1);
		}
		
		field_input_price();
		
	}
	
	
	// xóa nhóm phân loại
	
	function remove_classify(id)
	{
		$('#classify_list').find('#classifyfull_'+ id).remove();
		var length = $('#classify_list .phanloai').length;
		
		if(length == 0)
		{
			// ẩn table nhập giá
			$('.content_classify_product').addClass('hidden');
		}
		
		if(length < 2)
		{
			$('#classify_add').removeClass('hidden');
		}
		
		build_view_table();
		
		field_input_price();
		
		// check group 1 hình ảnh
		check_group_image1();
	}
	
	
	function check_group_image1()
	{
		var group = $('#classify .phanloai').length;
		if(group == 1)
		{
			// check xem group image có tồn tại không
			var group_image1 = $('#classify .phanloai .content_image_group1').length;
			if(group_image1 == 0)
			{
				// bild lại group1 new
				var group_id = $('#classify .phanloai').attr('phanloai');
				div_html_image = '<div><div class="title_image_group1">Hình ảnh thuộc tính (tối thiểu '+ w_h +' x '+ w_h +')</div><div class="content_image_group1"></div></div>';
				$('#classify_list_group_'+ group_id).append(div_html_image);
				
				$('#classify .phanloai .stt_classify').each(function(){
					var id_value = $(this).attr('stt');					
					
					add_image_group1(group_id,id_value)
					//change_value_name_group(group_id,id_value);
					
				});
			}
		}
	}
	
	
	
	function change_name_group(group_id, a)
	{
		build_view_table();
	}
	
	
	// thay đổi giá trị phân loại sản phẩm
	
	function change_value_name_group(id,id_value){
		
		// thêm tên thuộc tính vào hình ảnh nếu phân loại sản phẩm = 1
		var first_child = $('#classify_list').children('.phanloai').first().attr('phanloai');
		if(id == first_child)
		{
			var name_image = $('#classify_list_group_value_'+ id +'_' + id_value +' input[type=text]').val();
			$('#item_group0_'+ id_value +' .name_item_group1').html(name_image);
		}
		
		build_view_table();
		
	}
	
	
	function field_input_price()
	{
		// có thuộc tính nên giá sản phẩm sẽ disabled đi
		
		var id_group_new = $('#classify_list .phanloai').length;
		
		
		if(id_group_new > 0)
		{
			$('.price_product').hide();
		}
		else
		{
			$('.price_product').show();
		}
		
	}
	
	function build_view_table()
	{	
		// danh sách chi tiết thuộc tính sản phẩm
		
		var thead = '';
		var tbody = '';
		
		
		var list_array0 = [];
		var list_array1 = [];
		var i=1;
		
		// đưa các giá trị phân loại sản phẩm vào mảng, tạo thead từ tên nhóm phân loại
		$('#classify_list .phanloai').each(function(){
			
			// thead
			var name_group_classify = $(this).find('.name_group_classify').val();
			thead += '<th>'+ name_group_classify +'</th>';
			
			
			// tbody
			//
			$(this).find('.name_detail_group_classify').each(function(){
				
				var id = $(this).attr('name_detail_group_classify');
				var name = $(this).val();
				
				if(i==1){
					list_array0.push({"id":id,"name":name});
					}else{
					list_array1.push({"id":id,"name":name});
				}
				
				
			});
			
			i=i + 1;
			
			
		});
		
		// xuất html thead tên nhóm phân loại
		var thead_html = '<thead><tr id="classify_product2_list" style="background:#DADADA">'+ thead;
		thead_html += '<th>Giá bán (bắt buộc)</th>';
		thead_html += '<th>Giá niêm yết</th>';
		thead_html += '<th>SL Tồn kho</th>';
		thead_html += '<th>Trạng thái</th>';
		
		//list_array0 = [1,2]
		//list_array1 = [1,2]
		
		// xuất html trộn các phân loại sản phẩm với nhau
		
		var html_tr = '';
		
		$.each(list_array0, function(index0, value0){
			
			if (list_array1.length === 0) {
				
				// không có thuộc tính thứ 2
				var value_data = getdata(value0.id,0);
				
				if(value_data.status == 1)
				{
					value_data.checked = 'checked=checked';
				}
				
				if(value_data.id1 == '')
				{
					value_data.checked = 'checked=checked';
				}
				
				
				html_tr += '<tr data_classify_price="'+value0.id+'"     id="data_classify_product2_list_'+value0.id+'">'+
				'<td id="data_classify_product2_list_name_'+value0.id+'">'+
				value0.name +
				'<input hidden name="product['+value0.id+'][id1]" value="'+value0.id+'" /> '+ 
				'</td><td>'+
				'<input class="form-control" type="text" value="'+ value_data.price +'" name="product['+value0.id+'][price]" placeholder="Giá bán" required="required" oninvalid="setCustomValidity(\'Vui lòng nhập giá sản phẩm\')"  oninput="setCustomValidity(\''+'\')"  onkeyup="this.value=FormatNumber(this.value);"  />'+ 
				'</td>' +
				'<td>'+
				'<input class="form-control" type="text" value="'+ value_data.price_special +'" name="product['+value0.id+'][price_special]" placeholder="Giá niêm yết" oninvalid="setCustomValidity(\'Vui lòng nhập giá sản phẩm\')"  oninput="setCustomValidity(\''+'\')"  onkeyup="this.value=FormatNumber(this.value);"  />'+ 
				'</td>' +
				'<td>'+
				'<input class="form-control" required="required" type="text" value="'+ value_data.sl_tonkho +'" name="product['+value0.id+'][sl_tonkho]" placeholder="SL Tồn kho" onkeyup="this.value=FormatNumber(this.value);" />'+ 
				'</td>' +
				'<td>'+
				'<label class="ecng_label_checkbox ">'+
				'<input value="1" '+ value_data.checked +' type="checkbox" name="product['+value0.id+'][status]" />'+
				'<span class="ecng_checkmark">'+'</span>'
				'</label>'+ 
				'</td>' +
				
				'</tr>';
				
			}
			else
			{
				// danh sách thuộc tính thứ 2 list_array1
				$.each(list_array1, function(index1, value1){
					
					var value_data = getdata(value0.id,value1.id);
					
					if(value_data.status == 1)
					{
						value_data.checked = 'checked=checked';
					}
					
					if(value_data.id1 == '' && value_data.id1 == '' )
					{
						value_data.checked = 'checked=checked';
					}
					
					
					var td_value1_name = '';
					if(index1 == 0)
					{
						td_value1_name = '<td class="vertical_center" rowspan="'+ list_array1.length +'" id="data_classify_product2_list_name_'+index0+'_'+value0.id+'_id1">'+
						value0.name +
						'</td>'
					}
					
					html_tr += '<tr data_classify_price="'+value0.id+'_'+value1.id+'" id="data_classify_product2_list_'+value0.id+'_'+value1.id+'">'+
					td_value1_name +
					'<td id="data_classify_product2_list_name_'+value0.id+'_'+value1.id+'_id2">'+
					value1.name +
					'<input hidden name="product['+value0.id+'_'+value1.id+'][id1]" value="'+value0.id+'" /> '+
					'<input hidden name="product['+value0.id+'_'+value1.id+'][id2]" value="'+value1.id+'" /> '+ 
					'</td>'+
					'<td>'+
					'<input class="form-control" type="text" value="'+ value_data.price +'" name="product['+value0.id+'_'+value1.id+'][price]" placeholder="Giá bán"  required="required" oninvalid="setCustomValidity(\'Vui lòng nhập giá sản phẩm\')"  oninput="setCustomValidity(\''+'\')"  onkeyup="this.value=FormatNumber(this.value);"  />'+ 
					'</td>' +
					'<td>'+
					'<input class="form-control" type="text" value="'+ value_data.price_special +'" name="product['+value0.id+'_'+value1.id+'][price_special]" placeholder="Giá niêm yết"  oninvalid="setCustomValidity(\'Vui lòng nhập giá sản phẩm\')"  oninput="setCustomValidity(\''+'\')"  onkeyup="this.value=FormatNumber(this.value);"  />'+ 
					'</td>' +
					'<td>'+
					'<input class="form-control" required="required" type="text" value="'+ value_data.sl_tonkho +'" name="product['+value0.id+'_'+value1.id+'][sl_tonkho]" placeholder="SL Tồn kho" onkeyup="this.value=FormatNumber(this.value);" />'+ 
					'</td>' +
					'<td>'+
					'<input value="1" '+ value_data.checked +' type="checkbox" name="product['+value0.id+'_'+value1.id+'][status]">'+ 
					'</td>' +
					
					'</tr>';
					
					
				});
				
			}
			
		});
		
		
		// html_tr
		var tbody_html = '<tbody id="data_classify_product2_list">'+ html_tr +'</tbody>';
		
		var table_html = '<table class="table table-bordered full" style="color: #444444;">'+ thead_html + tbody_html +'</table>';
		
		$('.result_detail_classify').html(table_html);
		
		getdata_new();
		
	}
	
	
	// lấy số thứ tự phân loại sản phẩm
	function get_stt_classify_name(id_group)
	{
		//stt_classify
		var length_stt = $('#classify_list_group_'+ id_group + ' .stt_classify').length;
		
		var stt = 0;
		
		if(length_stt > 0)
		stt = $('#classify_list_group_'+ id_group + ' .stt_classify').last().attr('stt');
		
		return stt;
	}
	
	
	// lấy số thứ tự nhóm group
	function get_stt_phanloai()
	{
		//stt_classify
		var stt = $('#classify_list .phanloai').last().attr('phanloai');
		if(!stt)
		stt = 0;
		
		return stt;
	}
	
	// thêm phân loại sản phẩm
	
	function add_value_name_group(id_group)
	{
		
		var id_next = parseInt(get_stt_classify_name(id_group)) + 1;
		
		var first_child = $('#classify_list').children('.phanloai').first().attr('phanloai');
		
		if(first_child == id_group)
		{
			// nhóm phân loại 1 thì add thêm hình ảnh vào
			add_image_group1(id_group,id_next);
		}
		
		
		$('#classify_list_group_' + id_group + ' .col-md-8.offset-md-2').append('<div stt='+ id_next +' class="form-group mb-0 row stt_classify" id="classify_list_group_value_' + id_group + '_' + id_next + '">' +
		'<label for="" class="col-3 col-form-label"></label>' +
		'<div class="col-8">' +
		'<div class="input-group rounded-lg mb-2">' +
		'<input name_detail_group_classify="'+ id_next +'" type="text" class="form-control bg-none border name_detail_group_classify" placeholder="Ví dụ : Đỏ, vàng, xanh,.." name="classify[' + id_group + '][value][' + id_next + ']" required="required" onclick="setCustomValidity(\'Vui lòng nhập phân loại\')"  oninput="setCustomValidity(\'' + '\')"  onchange="change_value_name_group(\'' + id_group + '\',' + id_next + ')" value="" /></td>' +
		'</div>' +
		'</div>' +
		'<div class="col-1"><img src="{NV_STATIC_URL}themes/{TEMPLATE}/images/icon/icon_delete.svg" onclick="remove_value_name_group(' + id_group + ',' + id_next + ')"></div>' +
		'</div>');
	}
	
	
	
	// xóa 1 phân loại sản phẩm
	
	function remove_value_name_group(id, id_value)
	{
		
		$('#classify_list_group_value_'+id+'_'+id_value).remove();
		
		// remove image group 0 vị trí id
		var first_child = $('#classify_list').children('.phanloai').first().attr('phanloai');
		
		
		if(id == first_child)
		{	
			$('#item_group0_'+id_value).remove();
		}
		
		build_view_table();
		
	}
	
	
	// kết thúc xử lý thuộc tính sản phẩm
	
	
	$('form.form_product_add input[type=submit]').click(function(event){
		
		event.preventDefault();
		
		var check = true;
		
		if($('input[name=name_product]').val() == '')
		{
			alert('Tên sản phẩm chưa nhập!');
			$('input[name=name_product]').focus(); 
			return false;
		}
		if($('input[name=name_product]').val().length > 100)
		{
			alert('Tên sản phẩm vượt giới hạn ký tự!');
			$('input[name=name_product]').focus(); 
			return false;
		}
		
		if($('input[name=barcode]').val() == '')
		{
			alert('Mã vạch chưa nhập!');
			$('input[name=barcode]').focus(); 
			return false;
		}
		
		if($('select[name=categories_id]').val() == 0)
		{
			alert('Chuyên mục sản phẩm chưa chọn!');
			$(this).parent().addClass('error_select');
			$('select[name=categories_id]').focus(); 
			return false;
		}
		
		if($('select[name=brand]').val() <= 0)
		{
			alert('Thương hiệu chưa chọn!');
			$('select[name=brand]').focus(); 
			return false;
		}
		
		
		
		if($('select[name=origin]').val() <= 0)
		{
			alert('Xuất xứ chưa chọn!');
			$('select[name=origin]').focus(); 
			return false;
		}
		
		if($('input[name=weight_product]').val() == '')
		{
			alert('Khối lượng sản phẩm chưa nhập!');
			$('input[name=weight_product]').focus(); 
			return false;
		}
		
		// kiểm tra giá sản phẩm khi không có thuộc tính sản phẩm
		var classify = $('#classify_list .phanloai').length;
		if(classify == 0)
		{
			if($('input[name=price]').val() <= 0)
			{
				alert('Giá bán chưa nhập!');
				$('input[name=price]').focus(); 
				return false;
			}
			
			
		}
		else
		{
			// tên thuộc tính sản phẩm
			$('#classify_list input[type=text]').each(function(){
				if( ($(this).val() == '') && ($(this).attr('required') == 'required') )
				{
					alert('Tên nhóm phân loại chưa nhập!');
					$(this).focus();
					check = false;
					return false;
					
				}
			})
			
			if(!check)
			{
				return false;
			}
			
			// giá, giá niêm yết, tồn kho thuộc tính sản phẩm
			var flag = false;
			$('.result_detail_classify input[type=text]').each(function(){
				if( ($(this).val() == '') && ($(this).attr('required') == 'required') )
				{
					alert('Thuộc tính sản phẩm chưa nhập!');
					$(this).focus();
					check = false;
					return false;
					
				}
			})
			
			if(!check)
			{
				return false;
			}
			
		}
		
		
		// hình ảnh sản phẩm
		var flag = false;
		$.map($('input[type=hidden][name="array_image_pro[]"]'), function(el) {
			if(el.value != '')
			{
				flag = true;
				return false;
			}
		});
		
		if(!flag)
		{
			alert('Chưa chọn hình minh họa sản phẩm!');
			$('.content_image_main .item_image_main').addClass('error_image_product');
			return false;
		}
		
		
		var bodytext = CKEDITOR.instances['retails_bodytext'].getData();
		
		if(bodytext == '')
		{
			alert('Mô tả sản phẩm chưa nhập!');
			CKEDITOR.instances['retails_bodytext'].focus();
			return false;
		}
		else if(bodytext.length > 60000)
		{
			alert('Mô tả sản phẩm vượt quá 60.000 ký tự!');
			CKEDITOR.instances['retails_bodytext'].focus();
			return false;
		}
		
		
		var description = CKEDITOR.instances['retails_description'].getData();
		
		if(description.length > 20000)
		{
			alert('Thông số kỹ thuật vượt quá 20.000 ký tự!');
			CKEDITOR.instances['retails_bodytext'].focus();
			return false;
		}
		
		
		// gửi thông tin dữ liệu
		for (instance in CKEDITOR.instances) {
			CKEDITOR.instances[instance].updateElement();
		}
		
		
		if(!check)
		{
			return false;
		}
		
		
		var formData = new FormData($('form.form_product_add')[0]);
		
		$.ajax({               
			type: "POST",      
			dataType: 'json',  
			url: nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=productadd1&add=1',
			data: formData,
			processData: false,
			contentType: false,
			beforeSend: function() {
				$('#notifi_screen').modal('show');
				$('form input[type=submit]').prop('disabled', true);
			},	               
			complete: function() {
				
			},                 
			success: function(json) {
				
				$('#notifi_screen').on('shown.bs.modal', function (e) {
				$("#notifi_screen").modal('hide');})
				
				
				
				let myPromise = new Promise(function(myResolve, myReject) {
					// "Producing Code" (May take some time)
					
					$('form input[type=submit]').prop('disabled', false);
					myResolve(); // when successful
					myReject();  // when error
				});
				
				// "Consuming Code" (Must wait for a fulfilled Promise)
				myPromise.then(
				function(value) { 
					
					if(json['status'] == 'OK')
					{
						alert(json['mess']);
						window.location.href = '{list_product}';
					}
					else
					{
						alert(json['mess']);
					}
					
				}
				);
				
				
				console.log(json);
				
				
			},                 
			error: function(xhr, ajaxOptions, thrownError) {
				
				console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}                  
		});
		
		
	});
	
	
	//keywords_search
	var timesSubmitted = 0;
	var maxSubmits = 4;
	
	
	
	
	function keywordsSearch(){
		var keywords_search = document.querySelector('#keywords_search').value;
		var keywords_search1 = document.querySelector('#keywords_search1').value;
		var limit_key = document.querySelectorAll('#keywords span').length;
		keywords_search = loc_xoa_dau(keywords_search);
		
		if(limit_key > 4){
			console.log();
		}
		else if(keywords_search.length > 0 && keywords_search1.length > 0  && timesSubmitted < maxSubmits){
			timesSubmitted++;
			$('#keywords').append('<span class="mr-2 p-1 d-flex rounded d-block align-items-center float-left mt-1" style="background: #E6E6E6; cursor:pointer " ondblclick="$(this).remove();"><p class="search_text m-0 text-truncate pr-1" style="max-width:80px">'+keywords_search+  '</p><a class="" onclick="remove_text(),$(this).parent().remove();" style="border-radius: 50%;background: #707070;height: 15px;width: 15px;line-height: 15px;text-align: center;color: #fff;">&times;</a><input type="hidden" name="keyword[]" value="'+keywords_search+  '" /></span>');
			document.querySelector('#keywords_search').value='';
			$("#keywords_search").focus();	
			
		}		
	}
	function keywordsSearch1(){
		var keywords_search1 = document.querySelector('input[name="name_product"]').value;
		keywords_search1 = loc_xoa_dau(keywords_search1);
		
		var div = '<span class="mr-2 text_search1 p-1 d-flex rounded d-block float-left mt-1" > <p class="text-truncate m-0 px-1" style="max-width:80px" id="keywords_1" >'+ keywords_search1 +'</p><input type="hidden" name="keyword[]" value="'+keywords_search1+  '" /></span>';
		$('#keywords').html(div);
		$('.text_search1').css("background","#E6E6E6");
	}
	
	function remove_text() {
		timesSubmitted--;
	};
	
	function loc_xoa_dau(str) {
		str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
		str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
		str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
		str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
		str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
		str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
		str = str.replace(/đ/g, "d");
		str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
		str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
		str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
		str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
		str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
		str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y");
		str = str.replace(/Đ/g, "D");
		
		return str;
	}
	function countChars1(obj) {	
		document.getElementById("charNum1").innerHTML = obj.value.length;
	};
	
	
</script>

<div class="modal fade" id="notifi_screen">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content" id="modal_content">
			<div class="modal-body text-center p-4">
				<div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
			</div>
		</div>
	</div>
</div>


<!-- END: main -->
