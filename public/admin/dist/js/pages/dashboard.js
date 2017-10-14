/*
 * Author: Abdullah A Almsaeed
 * Date: 4 Jan 2014
 * Description:
 *      This is a demo file used only for the main dashboard (index.html)
 **/
var h = screen.height;
var w = screen.width;
var left = (screen.width/2)-((w-300)/2);
var top = (screen.height/2)-((h-100)/2);

function singleUpload(obj) {
    window.KCFinder = {};
    window.KCFinder.callBack = function(url) {
       $('#' + obj.data('set')).val(url);
       $('#' + 'thumbnail-' + obj.data('set')).attr('src', $('#app_url').val() + url);
        window.KCFinder = null;
    };
    window.open($('#url_open_kc_finder').val(), 'kcfinder_single','scrollbars=1,menubar=no,width='+ (w-300) +',height=' + (h-300) +',top=' + top+',left=' + left);
}
function multiUpload() {
    window.KCFinder = {};
    window.KCFinder.callBackMultiple = function(files) {
        var strHtml = '';
        for (var i = 0; i < files.length; i++) {
             strHtml += '<div class="col-md-3">';

        strHtml += '<img class="img-thumbnail" src="' +  $('#app_url').val() + files[i]  + '" style="width:100%">';
         strHtml += '<div class="checkbox">';
         strHtml += '<input type="hidden" name="image_tmp_url[]" value="' + files[i]  + '">';
        
        strHtml += '<label><input type="radio" name="thumbnail_id" class="thumb" value="' + files[i]  + '"> &nbsp;  Ảnh đại diện </label>';
        strHtml += '<button class="btn btn-danger btn-sm remove-image" type="button" data-value="' +  $('#app_url').val() + files[i]  + '" data-id="" ><span class="glyphicon glyphicon-trash"></span></button></div></div>';      
        }
        $('#div-image').append(strHtml);
            if( $('#div-image input.thumb:checked').length == 0){
              $('#div-image input.thumb').eq(0).prop('checked', true);
            }
        window.KCFinder = null;
    };
      window.open($('#url_open_kc_finder').val(), 'kcfinder_multiple','scrollbars=1,menubar=no,width='+ (w-300) +',height=' + (h-300) +',top=' + top+',left=' + left);
}

$(document).ready(function(){

  "use strict";

  $('.btnSingleUpload').click(function(){        
    singleUpload($(this));
  });
  $('.btnMultiUpload').click(function(){        
    multiUpload();
  });

  $('#dataForm #name').change(function(){
       var name = $.trim( $(this).val() );         
        $.ajax({
          url: $('#route_get_slug').val(),
          type: "POST",
          async: false,      
          data: {
            str : name
          },              
          success: function (response) {
            if( response.str ){                  
              $('#dataForm #slug').val( response.str );
            }                
          }
        });         
    });
    if( $('#mo_ta_sp').length == 1){
      CKEDITOR.replace( 'mo_ta_sp',{
          height : 500
      });
    }
});
var toolbar = [
    { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source' ] },
    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: ['Image', 'Bold', 'Italic', 'Underline', 'Subscript', 'Superscript', 'NumberedList', 'BulletedList', 'Link', 'Unlink' ] },                             
    { name: 'styles', items: [ 'Format' ] },
    { name: 'tools', items: [ 'Maximize' ] },                      
];