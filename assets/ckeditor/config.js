/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';
    config.toolbar_Custom = [
    ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Scayt'],
    ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
    ['Image','Flash','Youtube','Table'],
    ['Link','Unlink','Maximize'],
    '/',
    ['Bold','Italic','Underline','Strike','Subscript','Superscript','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','FontSize','Styles','Format'],[]
    [ 'Source', '-', 'Bold', 'Italic', 'syntaxhighlight' ],
    ['TextColor','BGColor'],
    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote']
    ];
    config.shiftEnterMode = CKEDITOR.ENTER_P;
    config.enterMode = CKEDITOR.ENTER_BR;
    config.height = 300;
    config.extraPlugins = 'syntaxhighlight,youtube';
};
