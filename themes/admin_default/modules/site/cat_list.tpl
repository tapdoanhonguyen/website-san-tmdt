<!-- BEGIN: main -->
<div id="users">
	<div class="m-bottom"><a class="btn btn-primary btn-xs" href="{ADD_NEW_CAT}">{LANG.cat_add}</a></div>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th class="w100">{LANG.cat_sort}</th>
				<th>{LANG.cat_title}</th>
				<th>{LANG.useridname}</th>
				<th>{LANG.sample_data}</th>
				<th class="w150"></th>
			</tr>
		</thead>
		<tbody>
			<!-- BEGIN: row -->
			<tr>
				<td><select class="form-control" name="weight" id="weight{ROW.cid}" onchange="nv_chang_weight({ROW.cid});">
						<!-- BEGIN: weight -->
						<option value="{WEIGHT.pos}"{WEIGHT.selected}>{WEIGHT.pos}</option>
						<!-- END: weight -->
				</select></td>
				<td><strong><a href="{ROW.titlelink}">{ROW.title}</a></strong></td>
				<td>{ROW.adminid}</td>
				<td>{ROW.data}</td>
				<td class="text-center">
					<em class="fa fa-edit">&nbsp;</em><a href="{EDIT_URL}">{GLANG.edit}</a>  - <em class="fa fa-trash-o">&nbsp;</em><a href="javascript:void(0);" onclick="nv_cat_del({ROW.cid});">{GLANG.delete}</a>
				</td>
			</tr>
			<!-- END: row -->
		</tbody>
	</table>
</div>
<!-- END: main -->
