<!-- BEGIN: main -->
<!-- BEGIN: view -->

<div class="content_infoshop">
                <div class="info_shop bg_white p-4">
                    <div class="fs_24"> Thông Tin Kho</div>
                    <div class="mt-4 border-top ">
                        
</br>
<div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
					<th class="text-center">{LANG.name_warehouse}</th>
					<th class="text-center">{LANG.name_send}</th>
					<th class="text-center">{LANG.phone_send}</th>
					<th class="text-center">{LANG.address_send}</th>                   
                </tr>
            </thead>
           
            <tbody>
                <!-- BEGIN: loop -->
                <tr class="text-center">
					<td> {VIEW.name_warehouse} </td>
					<td> {VIEW.name_send} </td>
					<td> {VIEW.phone_send} </td>
					<td> {VIEW.address} </td>                   
                <!-- END: loop -->
            </tbody>
        </table>
    </div>
</div>
                        
                    </div>
                </div>
</div>

<!-- END: view -->

<!-- END: main -->