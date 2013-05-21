CKEDITOR.editorConfig = function( config ) {
	config.toolbar = 'MyToolbar';

	config.toolbar_MyToolbar = [
		{ name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
		{ name: 'editing', items : [ 'Find','Replace','-','SelectAll', ] },
		{ name: 'insert', items : [ 'Image','Table','HorizontalRule','PageBreak' ] },
		{ name: 'styles', items : [ 'Styles','Format' ] },
                '/',
		{ name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
		{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock' ] },
		{ name: 'links', items : [ 'Link','Unlink','Anchor' ] },
		{ name: 'tools', items : [ 'Maximize','Source' ] }
	];
};