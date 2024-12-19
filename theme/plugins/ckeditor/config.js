/*
Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.plugins.addExternal('ckeditor_wiris', 'plugins/ckeditor_wiris/', 'package.js');
CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	config.language = 'en';
	config.height = '200';
	config.uiColor = '#d8d8d8';
	//config.extraPlugins= ['ckeditor_wiris'];
	config.allowedContent= true;
	config.toolbar = [
		['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink','Table','Image'],
		['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
		['Format','Font','FontSize']
	];
	config.extraPlugins = 'ckeditor_wiris';
	  
	
};



