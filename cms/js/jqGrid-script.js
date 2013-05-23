jQuery(document).ready(function(){
	jQuery("#prodList").jqGrid({ 
		url:'http://localhost/agriBSG/cms/products/getProducts', 
		datatype: "json", 
		colNames:['Product','Category', 'Sub Category', 'ABSG Code'], 
		colModel:[
			{product:'product',index:'product', width:55}, 
			{category:'category',index:'category', width:90}, 
			{sub:'sub',index:'sub', width:100}, 
			{code:'code',index:'code', width:80, align:"right"}, 
		], rowNum:10, rowList:[10,20,30], 
		pager: '#pager2', 
		sortname: 'id', 
		viewrecords: true, 
		sortorder: "desc", 
		caption:"Product List" 
	}); 
	jQuery("#prodList").jqGrid('navGrid','#pager2',{ edit:false, add:false, del:false});
});