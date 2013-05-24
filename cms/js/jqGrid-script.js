jQuery(document).ready(function(){
    var getColumnIndexByName = function(grid,columnName) {
            var cm = grid.jqGrid('getGridParam','colModel');
            for (var i=0,l=cm.length; i<l; i++) {
                if (cm[i].name===columnName) {
                    return i; // return the index
                    alert(i);
                }
            }
            return -1;
        },
        grid = $('#prodList'), firstButtonColumnIndex, buttonNames={};

    grid.jqGrid({
        url:'http://localhost/agriBSG/cms/products/getProducts', 
        datatype: 'json',
        colNames: ['ID','Product','Category','Sub Category','ABSG Code','Grade','',''],
        colModel: [
            { name: 'id', index: 'id', keys: true, width: 40, align: "center"},
            { name: 'prod_name', index: 'prod_name', editable: true },
            { name: 'prod_cat', index: 'prod_cat', width: 110, align: "center", editable: true },
            { name: 'sub_cat', index: 'sub_cat', width: 120, align: "center", editable: true },
            { name: 'absg_code', index: 'absg_code', width: 80, align: "center", sortable: false, editable: true },
            { name: 'grade', index: 'grade', width: 80, align: "center", sortable: false, editable: true },
            { name: 'edit', width: 15, sortable: false, search: false, align: "center",
              formatter:function(){
                  return "<span class='ui-icon ui-icon-pencil'></span>"
              }},
            { name: 'del', width: 15, sortable: false, search: false, align: "center",
              formatter:function(){
                  return "<span class='ui-icon ui-icon-trash'></span>"
              }}
        ],
        pager: '#pager',
        rowNum: 10,
        rowList: [10, 20, 30],
        sortname: 'id',
        sortorder: 'desc',
        viewrecords: true,
        gridview:true,
        height: '100%',
        width: 805,
        caption: 'Product List',
        beforeSelectRow: function (rowid, e) {
            var iCol = $.jgrid.getCellIndex(e.target);
            if (iCol >= firstButtonColumnIndex) {

            	if(buttonNames[iCol] == 'Edit'){

					// alert(window.location.origin);
					// window.location = '';


            	} else {

            		var options = {
				      caption: "Delete",
				      msg: "Delete selected record(s)?",
				      bSubmit: "Delete",
				      bCancel: "Cancel",
				      url: 'http://localhost/agriBSG/cms/products/ajxProducts',
				      afterComplete: function(response){
				      	if(response){
				      		alert('Success');	
				      	} else {
				      		alert('An error occured');
				      	}
				      }
            		};

            		grid.jqGrid('delGridRow', rowid, options );
            	}
            }

            // prevent row selection if one click on the button
            return (iCol >= firstButtonColumnIndex)? false: true;
        }/*,
        onCellSelect: function (rowid,iCol,cellcontent,e) {
            if (iCol >= firstButtonColumnIndex) {
                alert("rowid="+rowid+"\nButton name: "+buttonNames[iCol]);
            }
        }*/
    });
    firstButtonColumnIndex = getColumnIndexByName(grid,'edit');
    buttonNames[firstButtonColumnIndex] = 'Edit';
    buttonNames[firstButtonColumnIndex+1] = 'Delete';
    grid.jqGrid('navGrid', '#pager', { add: false, edit: false, del: false, search: false, refresh: true });
});