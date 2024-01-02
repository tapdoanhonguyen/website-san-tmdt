<!-- BEGIN: main -->
<div id="company_info">
<ul style="padding:0; margin:0" itemscope itemtype="http://schema.org/LocalBusiness">
    <li class="hide hidden"><span itemprop="image">{SITE_LOGO}</span><span itemprop="priceRange">N/A</span></li>
    <!-- BEGIN: company_name -->
	<li id="company_name"><span itemprop="name">{DATA.company_name}</span>
	<!-- BEGIN: company_sortname --> (<span itemprop="alternateName">{DATA.company_sortname}</span>)
	<!-- END: company_sortname -->
	</li>
	<!-- END: company_name -->
	
    <!-- BEGIN: company_regcode --><li><em class="fa fa-file-text"></em><span>{LANG.company_regcode}:{DATA.company_regcode}
	<!-- BEGIN: company_regplace --> - {DATA.company_regplace}<!-- END: company_regplace -->
	</span>	
	</li>
	<!-- END: company_regcode -->
	
    <!-- BEGIN: company_responsibility --><li><em class="fa fa-flag"></em><span>{LANG.company_responsibility}: <span itemprop="founder" itemscope itemtype="http://schema.org/Person"><span itemprop="name">{DATA.company_responsibility}</span></span></span></li><!-- END: company_responsibility -->
    
	<!-- BEGIN: company_address --><li><a   data-toggle="modal" data-target="#company-map-modal" ><em class="fa fa-map-marker"></em>  <span>&nbsp;&nbsp;{LANG.company_address}:<span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><span itemprop="addressLocality" class="company-address">{DATA.company_address}</span></span></span></a></li><!-- END: company_address -->
	
    <!-- BEGIN: company_phone --><li><em class="fa fa-phone"></em><span>{LANG.company_phone}: <!-- BEGIN: item --><!-- BEGIN: comma -->&nbsp; <!-- END: comma --><!-- BEGIN: href --><a href="tel:{PHONE.href}"><!-- END: href --><span itemprop="telephone">{PHONE.number}</span><!-- BEGIN: href2 --></a><!-- END: href2 --><!-- END: item --></span></li><!-- END: company_phone -->
	<!-- BEGIN: company_hotline --><li><em class="fa fa-phone"></em><span>{LANG.company_hotline}: <!-- BEGIN: item --><!-- BEGIN: comma -->&nbsp; <!-- END: comma --><!-- BEGIN: href --><a href="tel:{HOTLINE.href}"><!-- END: href --><span itemprop="telephone">{HOTLINE.number}</span><!-- BEGIN: href2 --></a><!-- END: href2 --><!-- END: item --></span></li><!-- END: company_hotline -->
		
    <!-- BEGIN: company_fax --><li><em class="fa fa-fax"></em><span>{LANG.company_fax}: <span itemprop="faxNumber">{DATA.company_fax}</span></span></li><!-- END: company_fax -->
    <!-- BEGIN: company_email --><li><em class="fa fa-envelope"></em><span>{LANG.company_email}: <!-- BEGIN: item --><!-- BEGIN: comma -->&nbsp; <!-- END: comma --><a href="mailto:{EMAIL}"><span itemprop="email">{EMAIL}</span></a><!-- END: item --></span></li><!-- END: company_email -->
    <!-- BEGIN: company_website --><li><em class="fa fa-globe"></em><span>{LANG.company_website}: <!-- BEGIN: item --><!-- BEGIN: comma -->&nbsp; <!-- END: comma --><a href="{WEBSITE}" target="_blank"><span itemprop="url">{WEBSITE}</span></a><!-- END: item --></span></li><!-- END: company_website -->
</ul>
 <!-- BEGIN: company_hometext -->
	<span itemprop="name">{DATA.company_hometext}</span>
<!-- END: company_hometext -->
	</div>
<!-- BEGIN: company_map_modal -->
<div class="modal fade company-map-modal" id="company-map-modal" data-trigger="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
    
				<iframe src="{DATA.company_map}" style="width:100%; height:400px" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
<!-- END: company_map_modal -->
<!-- END: main -->