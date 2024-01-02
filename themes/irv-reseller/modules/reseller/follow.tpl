<!-- BEGIN: main -->
<!-- BEGIN: view -->
<div class="well hidden">
    <form action="{NV_BASE_SITEURL}index.php" method="get">
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
<form action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th class="w100">{LANG.number}</th>
                    <th>Người theo dõi</th>
                    <th>Hình ảnh</th>
                    <th>Thời gian theo dõi</th>
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
                    <td>
                     {VIEW.number} 
                 </td>
                 <td> 

                        {VIEW.info_user.username} 
 
                </td>
                <td> 
                    <img src="{VIEW.info_user.photo}" alt="{VIEW.info_user.username}" title="{VIEW.info_user.username}" style="height: 70px;width: 70px;object-position: center;object-fit: cover;">  
                </td>
                <td> 
                    {VIEW.time_add} 
                </td>
               

            </tr>
            <!-- END: loop -->
        </tbody>
    </table>
</div>
</form>
<!-- END: view -->

<!-- END: main -->