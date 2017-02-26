	<section class="content">
			<header class="main-header clearfix">
				<h1 class="main-header__title">
					<i class="fa fa-inbox"></i>
					Email Templates				</h1>
			</header>



		<div class="row">

			<div class="col-md-12">
				<article class="widget">

			<div id="box_bg" class="row-fluid" style="display:block;">
				<div id="content_admin" class="admin_content_block grid-wrap">
					<div style="clear:both"></div>
					<table  width="100%" id="list" align="center">
					</table>
					<div id="pager" ></div>
				</div>
			</div>

</article><!-- /widget -->
				</div>
			</div> <!-- /row -->
	</section> <!-- /content -->

<script>
	
	$Grid	= $("#list");
	
	$(function() {

		$("#list").jqGrid({
			url: '<?php echo $this->Html->url(array("controller" => "email_contents", "action" => "emailgrid")); ?>',
			datatype: "json",
			mtype: 'GET',
			colNames: ['S No','Title', 'Subject','Modified' , 'Action'],
			colModel: [
				{name:'id',index:'id',width:20,align:'center',stype:'text',sorttype:'int',sortable:false}, 
				{name: 'title', index: 'title', width: 40, align: 'left', stype: 'text', sortable: true},
				{name: 'subject', index: 'subject', width: 40, align: 'left', stype: 'text', sortable: true},
				{name: 'modified', index: 'modified', width: 30, align: 'center', stype: 'text', sortable: false, formatter : 'date', formatoptions : {newformat : 'd/m/Y'}},
				{name: 'action', index: '', width: 20, align: 'center', stype: '', sortable: false, search: false}
			],
			pager: jQuery('#pager'),
			rowNum:10,
			rowList: [5, 10, 15],
			sortname: 'id',
			sortorder: 'asc',
			viewrecords: true,
			gridview: true,
			hidegrid: false,
			multiselect: false,
			height: "100%",
			autowidth: true,
			shrinkToFit:true,
		});

		$("#list").jqGrid('navGrid', '#pager', {edit: false, add: false, del: false, search: false, refresh: true});

	});
	
	$( window ).resize(function() {
	 	$Grid.setGridWidth($(".admin_content_block").width());
	});
	
	
	function changeCmsStatus(id,status){
	
	URL = '<?php echo $this->Html->url(array("controller" => "emailcontents","action" => "changestatus"));?>';
	
	$.ajax({
		url : URL,
		type: "POST",
		data : ({id:id,status:status}),
		beforeSend: function (XMLHttpRequest) {
			
		},
		complete: function (XMLHttpRequest, textStatus) {
			
		},
		success : function(data){
			$("#list").trigger("reloadGrid");
		}
	});
}

</script> 