<!-- BEGIN: main -->

<!-- BEGIN: error -->
<div class="alert alert-danger">{ERROR}</div>
<!-- END: error -->

<form action="{FORM_ACTION}" method="post">
	<table class="table table-striped table-bordered table-hover">
		<tfoot>
			<tr>
				<td></td>
				<td><input class="btn btn-primary" type="submit" name="submit" value="{LANG.cat_save}" /></td>
			</tr>
		</tfoot>
		<tbody>
			<tr>
				<td class="w300">{LANG.cat_title}</td>
				<td><input class="form-control" value="{DATA.title}" name="title" id="title" maxlength="100" /></td>
			</tr>
			<tr>
				<td>{LANG.userid}</td>
				<td><input class="form-control pull-left w100" type="text" maxlength="10" value="{DATA.adminid}" id="adminid" name="adminid">&nbsp;
				<input class="btn btn-default" type="button" onclick="open_browse_us()" value="{LANG.adminsl}"></td>
			</tr>
			<tr>
				<td>{LANG.sample_data_forcat}</td>
				<td>
					<!-- BEGIN: data --><label class="show"><input type="checkbox" name="data[]" value="{LISTDATA.data}" {LISTDATA.checked}/> {LISTDATA.title}</label><!-- END: data -->
				</td>
			</tr>
		</tbody>
	</table>
</form>
<script>
function open_browse_us() {
	nv_open_browse('{NV_BASE_ADMINURL}index.php?' + nv_name_variable + '=users&' + nv_fc_variable + '=getuserid&area=adminid', 'NVImg', 850, 500, 'resizable=no,scrollbars=no,toolbar=no,location=no,status=no');
}
</script>
<!-- END: main -->