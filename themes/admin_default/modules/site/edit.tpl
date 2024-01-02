<!-- BEGIN: main -->

<!-- BEGIN: error -->
<div class="alert alert-danger">{ERROR}</div>
<!-- END: error -->

<form action="{FORM_ACTION}" method="post">
	<table class="table table-striped table-bordered table-hover">
		<tfoot>
			<tr>
				<td></td>
				<td><input class="btn btn-primary" type="submit" name="submit" value="{LANG.site}" /></td>
			</tr>
		</tfoot>
		<tbody>
			<tr>
				<td class="w200">{LANG.cat_title}</td>
				<td><select name="cid" class="form-control">
						<!-- BEGIN: cid -->
						<option value="{LISTCATS.cid}"{LISTCATS.selected}>{LISTCATS.title}</option>
						<!-- END: cid -->
				</select></td>
			</tr>
			<tr>
				<td>{LANG.title}</td>
				<td><input class="form-control" type="text" value="{DATA.title}" name="title" /></td>
			</tr>
			<tr>
				<td>{LANG.parked_domains}</td>
				<td><input class="form-control" type="text" value="{DATA.parked_domains}" name="parked_domains" id="parked_domains_iavim" /></td>
			</tr>
		</tbody>
	</table>
</form>
<!-- END: main -->
