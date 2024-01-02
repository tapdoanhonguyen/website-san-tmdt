<!-- BEGIN: error -->
<div class="p-4 text-center">
	Đã xãy ra lỗi trong quá trình chuyển trạng thái đơn hàng
</div>

<!-- END: error -->

<!-- BEGIN: main -->
<div class="row">
	<div class="col-6 mb-3">
		<div class="p-1 rounded rounded-lg border">
			<div class="input-group">
				<div class="input-group-prepend align-items-center pl-3">
					<i class="fa fa-search pr-1" aria-hidden="true"></i>
				</div>
				<input type="text" name="q" value="{Q}" placeholder="Tìm kiếm theo" aria-describedby="button-addon2" class="form-control border-0" />
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="p-1 rounded rounded-lg border d-flex">
			<div class="input-group-prepend align-items-center pl-3">
				<i class="fa fa-th-large pr-1" aria-hidden="true"></i>
			</div>
			<select class="form-control border-0 select2" id="catalogy" name="catalogy">
				<option>Chuyên mục hàng hóa </option>
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
</div>
<!-- END: main -->
