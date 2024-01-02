<!-- BEGIN: main -->
<!-- BEGIN: view -->
<div class="well">
<form action="{NV_BASE_ADMINURL}index.php" method="get">
	<input type="hidden" name="{NV_LANG_VARIABLE}"  value="{NV_LANG_DATA}" />
	<input type="hidden" name="{NV_NAME_VARIABLE}"  value="{MODULE_NAME}" />
	<input type="hidden" name="{NV_OP_VARIABLE}"  value="{OP}" />
	<div class="row">
		<div class="col-xs-24 col-md-6">
			<div class="form-group">
				<input class="form-control" type="text" value="{Q}" name="q" maxlength="255" placeholder="{LANG.search_title}" />
			</div>
		</div>
		<div class="col-xs-12 col-md-3">
			<div class="form-group">
				<input class="btn btn-primary" type="submit" value="{LANG.search_submit}" />
			</div>
		</div>
	</div>
</form>
</div>
<form action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="w100">{LANG.number}</th>
					<th>{LANG.title}</th>
					<th>{LANG.adminid}</th>
					<th>{LANG.data}</th>
					<th>{LANG.theme}</th>
					<th>{LANG.module}</th>
					<th class="w150">&nbsp;</th>
				</tr>
			</thead>
			<!-- BEGIN: generate_page -->
			<tfoot>
				<tr>
					<td class="text-center" colspan="5">{NV_GENERATE_PAGE}</td>
				</tr>
			</tfoot>
			<!-- END: generate_page -->
			<tbody>
				<!-- BEGIN: loop -->
				<tr>
					<td> {VIEW.number} </td>
					<td> {VIEW.title} </td>
					<td> {VIEW.adminid} </td>
					<td> {VIEW.data} </td>
					<td> {VIEW.theme} </td>
					<td> {VIEW.module} </td>
					<td class="text-center"><i class="fa fa-edit fa-lg">&nbsp;</i> <a href="{VIEW.link_edit}#edit">{LANG.edit}</a> - <em class="fa fa-trash-o fa-lg">&nbsp;</em> <a href="{VIEW.link_delete}" onclick="return confirm(nv_is_del_confirm[0]);">{LANG.delete}</a></td>
				</tr>
				<!-- END: loop -->
			</tbody>
		</table>
	</div>
</form>
<!-- END: view -->

<!-- BEGIN: error -->
<div class="alert alert-warning">{ERROR}</div>
<!-- END: error -->
<!-- BEGIN: add -->
<div class="panel panel-default">
<div class="panel-body">
<form class="form-horizontal" action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
	<input type="hidden" name="cid" value="{ROW.cid}" />
	<div class="form-group">
		<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.title}</strong> <span class="red">(*)</span></label>
		<div class="col-sm-19 col-md-20">
			<input class="form-control" type="text" name="title" value="{ROW.title}" required="required" oninvalid="setCustomValidity( nv_required )" oninput="setCustomValidity('')" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.userid}</strong> <span class="red">(*)</span></label>
		<div class="col-sm-19 col-md-20">
			<input class="form-control" type="text" name="adminid" id="adminid" value="{ROW.adminid}" required="required" oninvalid="setCustomValidity( nv_required )" oninput="setCustomValidity('')" />
			<input class="btn btn-default" type="button" onclick="open_browse_us()" value="{LANG.adminsl}">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.sample_data_forcat}</strong> <span class="red">(*)</span></label>
		<div class="col-sm-19 col-md-20">
			<!-- BEGIN: data --><label class="show"><input type="checkbox" name="data[]" value="{LISTDATA.data}" {LISTDATA.checked}/> {LISTDATA.title}</label><!-- END: data -->
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.theme}</strong> <span class="red">(*)</span></label>
		<div class="col-sm-19 col-md-20">
			<!-- BEGIN: theme -->
				<label><input class="form-control" type="checkbox" name="theme[]" value="{THEME.key}" {THEME.checked} {THEME.disabled}>{THEME.title}</label>
			<!-- END: theme -->
						
			
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.module}</strong> <span class="red">(*)</span></label>
		<div class="col-sm-19 col-md-20">
			<!-- BEGIN: module -->
				<label><input class="form-control" type="checkbox" name="module[]" value="{MODULE.key}" {MODULE.checked} {MODULE.disabled}>{MODULE.title}</label>
			<!-- END: module -->
		</div>
	</div>
	<div class="form-group" style="text-align: center"><input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}" /></div>
</form>
</div></div>
<script>
    function open_browse_us() {
        nv_open_browse('{NV_BASE_ADMINURL}index.php?' + nv_name_variable + '=users&' + nv_fc_variable + '=getuserid&area=adminid&return=userid&filtersql={FILTERSQL}', 'NVImg', 850, 500, 'resizable=no,scrollbars=no,toolbar=no,location=no,status=no');
    }
</script>

<!-- END: add -->
<!-- END: main -->