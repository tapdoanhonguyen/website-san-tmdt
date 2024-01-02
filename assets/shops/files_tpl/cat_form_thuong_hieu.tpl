<!-- BEGIN: main -->
	<div class="panel panel-default">
		<div class="panel-heading">{LANG.tabs_content_customdata}: {TEMPLATE_NAME}</div>
		<div class="panel-body">
			<div class="form-group">
				<label class="col-md-4 control-label"> {CUSTOM_LANG.1.title} </label>
				<div class="col-md-20"><select class="form-control" name="custom[1]">
							<option value=""> --- </option>
						<!-- BEGIN: select_1 -->
							<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
							<!-- END: select_1 -->
					</select></div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label"> {CUSTOM_LANG.2.title} </label>
				<div class="col-md-20"><select class="form-control" name="custom[2]">
							<option value=""> --- </option>
						<!-- BEGIN: select_2 -->
							<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
							<!-- END: select_2 -->
					</select></div>
			</div>
		</div>
	</div>
<!-- END: main -->