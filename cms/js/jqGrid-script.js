jQuery(document).ready(function(){
	jQuery("#prodList").jqGrid({ 
		url:'http://localhost/agriBSG/cms/products/getProducts', 
		datatype: "json", 
		colNames:['ID','Product','Category', 'Sub Category', 'ABSG Code', 'Grade'], 
		colModel:[
			{name:'prod_id',index:'prod_id'}, 
			{name:'prod_name',index:'prod_name'}, 
			{name:'prod_cat',index:'prod_cat'}, 
			{name:'sub_cat',index:'sub_cat'}, 
			{name:'absg_code',index:'absg_code'}, 
			{name:'grade',index:'grade'}
		], rowNum:10, rowList:[10,20,30], 
		pager: '#pager', 
		sortname: 'id', 
		width: 805,
		viewrecords: true, 
		sortorder: "desc", 
		caption:"Product List",
		loadError: function(xhr,status,error){
			console.log(error);
		}
	}); 
	jQuery("#prodList").jqGrid('navGrid','#pager',{ edit:false, add:false, del:false});
});