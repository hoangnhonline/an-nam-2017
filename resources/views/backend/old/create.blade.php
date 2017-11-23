@extends('backend.layout')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Máy cũ giá rẻ    
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('old.index') }}">Máy cũ giá rẻ</a></li>
      <li class="active">Thêm mới</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <a class="btn btn-default btn-sm" href="{{ route('old.index') }}" style="margin-bottom:5px">Quay lại</a>
    <form role="form" method="POST" action="{{ route('old.store') }}" id="dataForm">
    <input type="hidden" name="is_copy" value="0">
    <div class="row">
      <!-- left column -->

      <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Thêm mới</h3>
          </div>
          <!-- /.box-header -->               
            {!! csrf_field() !!}          
            <div class="box-body">
                @if (count($errors) > 0)
                  <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                  </div>
                @endif
                <div>

                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Thông tin chi tiết</a></li>                    
                    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Hình ảnh</a></li>                    
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                   
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <div class="form-group col-md-6 none-padding">
                          <label for="email">Loại sản phẩm<span class="red-star">*</span></label>
                          <select class="form-control req" name="loai_id" id="loai_id">
                            <option value="">--Chọn--</option>
                            @foreach( $loaiSpArr as $value )
                            <option value="{{ $value->id }}" {{ $value->id == old('loai_id') || $value->id == $loai_id ? "selected" : "" }}>{{ $value->name }}</option>
                            @endforeach
                          </select>
                        </div>
                          <div class="form-group col-md-6 none-padding pleft-5">
                          <label for="email">Thương hiệu<span class="red-star">*</span></label>
                          <?php 
                          $loai_id = old('loai_id');
                          if($loai_id > 0){
                            $cateArr = DB::table('cate')->where('loai_id', $loai_id)->orderBy('display_order')->get();
                          }
                          ?>
                          <select class="form-control req" name="cate_id" id="cate_id">
                            <option value="">--Chọn--</option>
                            @foreach( $cateArr as $value )
                            <option value="{{ $value->id }}" {{ $value->id == old('cate_id') || $value->id == $cate_id ? "selected" : "" }}>{{ $value->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="email">Thông tin sản phẩm<span class="red-star">*</span></label>
                          <?php 
                          $loai_id = old('loai_id');
                          if($loai_id > 0){
                            $thongTinChungList = DB::table('thong_tin_chung')->where('loai_id', $loai_id)->get();
                          }
                          ?>
                          <select class="form-control req select2" name="thong_tin_chung_id" id="thong_tin_chung_id" style="height:40px !important">
                            <option value="">--Chọn--</option>
                            @foreach( $thongTinChungList as $value )
                            <option value="{{ $value->id }}" {{ $value->id == old('thong_tin_chung_id') ? "selected" : "" }}>{{ $value->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <?php 
                        $loai_id = isset($_GET['loai_id']) ? $_GET['loai_id'] : null;
                        ?>
                        <div class="col-md-6 row">
                            <div class="input-group">  
                                <label>Dung lượng                                   
                                </label>                              
                                <select class="form-control" data-value="{{ $loai_id }}" name="dung_luong_id">
                                  <option value="">---</option>
                                  <?php 
                                  
                                  if($loai_id){
                                  $dls = DB::table('dung_luong')->where('loai_id', $loai_id)->get();
                                  if($dls){                                  
                                  ?>
                                  @foreach($dls as $dl)
                                    <option value="{{ $dl->id }}">{{ $dl->name }}</option> 
                                    @endforeach
                                    <?php } } ?>
                                </select>
                                <span class="input-group-btn">
                                  <button style="margin-top: 24px" class="btn btn-primary btn-sm btnAddValue" type="button" data-value="{{ $loai_id }}">
                                    Tạo mới
                                  </button>
                                </span>
                              </div>   
                        </div>
                        <div class="col-md-6 ">
                          <div class="input-group">  
                                <label>Màu sắc                                  
                                </label>                              
                                <select class="form-control" id="color_id" name="color_id">
                                  <option value="">---</option>
                                  @if( $colorArr->count() > 0)
                                    @foreach( $colorArr as $color )
                                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                                    @endforeach
                                  @endif
                                </select>
                                <span class="input-group-btn">
                                  <button style="margin-top: 24px" class="btn btn-primary btn-sm btnAddColor" type="button">
                                    Tạo mới
                                  </button>
                                </span>
                           </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group" >                  
                          <label>Tên <span class="red-star">*</span></label>
                          <input type="text" class="form-control req" name="name" id="name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group" >                  
                            <label>IMEI/Serial number<span class="red-star">*</span></label>
                            <input type="text" class="form-control req" name="imei" id="imei" value="{{ old('imei') }}">
                        </div>   
                        <input type="hidden" class="form-control" readonly="readonly" name="slug" id="slug" value="{{ old('slug') }}">                        

                        <div class="col-md-12 none-padding">
                          <div class="checkbox">
                              <label><input type="checkbox" name="is_hot" value="1" {{ old('is_hot') == 1 ? "checked" : "" }}> NỔI BẬT </label>
                          </div>                          
                        </div>
                        
                        <div class="form-group" >                  
                            <label>Giá<span class="red-star">*</span></label>
                            <input type="text" class="form-control req number" name="price" id="price" value="{{ old('price') }}">
                        </div>  

                        <input type="hidden" name="so_luong_ton" value="1">
                        
                        <div style="margin-bottom:10px;clear:both"></div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea class="form-control" rows="4" name="mo_ta" id="mo_ta">{{ old('mo_ta') }}</textarea>
                          </div>
                        <div class="form-group">
                          <label>Khuyến mãi</label>
                          <textarea class="form-control" rows="4" name="khuyen_mai" id="khuyen_mai">{{ old('khuyen_mai') }}</textarea>
                        </div>                        
                       
                        <div class="clearfix"></div>
                    </div><!--end thong tin co ban-->                    
                    
                     <div role="tabpanel" class="tab-pane" id="settings">
                        <div class="form-group" style="margin-top:10px;margin-bottom:10px">  
                         
                          <div class="col-md-12" style="text-align:center">                            
                            <button class="btn btn-primary btnMultiUpload" type="button"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>
                            <div class="clearfix"></div>
                            <div id="div-image" style="margin-top:10px"></div>
                          </div>
                          <div style="clear:both"></div>
                        </div>

                     </div><!--end hinh anh-->
                    
                  </div>

                </div>
                  
            </div>
            <div class="box-footer">              
              <button type="button" class="btn btn-default" id="btnLoading" style="display:none"><i class="fa fa-spin fa-spinner"></i></button>
              <button type="submit" class="btn btn-primary" id="btnSave">Lưu</button>
              <a class="btn btn-default" class="btn btn-primary" href="{{ route('old.index')}}">Hủy</a>
            </div>
            
        </div>
        <!-- /.box -->     

      </div>
      <div class="col-md-4">      
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Thông tin SEO</h3>
          </div>

          <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <label>Meta title </label>
                <input type="text" class="form-control" name="meta_title" id="meta_title" value="{{ old('meta_title') }}">
              </div>
              <!-- textarea -->
              <div class="form-group">
                <label>Meta desciption</label>
                <textarea class="form-control" rows="6" name="meta_description" id="meta_description">{{ old('meta_description') }}</textarea>
              </div>  

              <div class="form-group">
                <label>Meta keywords</label>
                <textarea class="form-control" rows="4" name="meta_keywords" id="meta_keywords">{{ old('meta_keywords') }}</textarea>
              </div>  
              <div class="form-group">
                <label>Custom text</label>
                <textarea class="form-control" rows="6" name="custom_text" id="custom_text">{{ old('custom_text') }}</textarea>
              </div>
            
        </div>
        <!-- /.box -->     

      </div>
      <!--/.col (left) -->      
    </div>
    </form>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<div id="tagModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
    <form method="POST" action="{{ route('tag.ajax-save-dl') }}" id="formAjaxTag">      
      <div class="modal-body" id="contentTag">
          <input type="hidden" name="type" value="2">
           <!-- text input -->
          <div class="col-md-12">
            <div class="form-group">
              <label>Nhiều giá trị cách nhau bằng dấu "<span style="color:red"> ; </span>" </label>
              <textarea class="form-control" name="str_tag" id="str_tag" rows="4" >{{ old('str_tag') }}</textarea>
            </div>
            
          </div>
          <div classs="clearfix"></div>
      </div>
      <div style="clear:both"></div>
      <div class="modal-footer" style="text-align:center">             
        <input type="hidden" name="loai_id" value="0" id="loai_id_ajax">
        <button type="button" class="btn btn-primary btn-sm" id="btnSaveTagAjax"> Save</button>
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal" id="btnCloseModalTag">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>
<div id="colorModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
    <form method="POST" action="{{ route('tag.ajax-save-color') }}" id="formAjaxColor">      
      <div class="modal-body" id="contentColor">          
           <!-- text input -->
          <div class="col-md-12">
            <div class="form-group">
              <label>Nhiều giá trị cách nhau bằng dấu "<span style="color:red"> ; </span>" </label>
              <textarea class="form-control" name="str_color" id="str_color" rows="4" >{{ old('str_color') }}</textarea>
            </div>
            
          </div>
          <div classs="clearfix"></div>
      </div>
      <div style="clear:both"></div>
      <div class="modal-footer" style="text-align:center">
        <button type="button" class="btn btn-primary btn-sm" id="btnSaveColorAjax"> Save</button>
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal" id="btnCloseModalColor">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>
<input type="hidden" id="route_upload_tmp_image_multiple" value="{{ route('image.tmp-upload-multiple') }}">
<input type="hidden" id="route_upload_tmp_image" value="{{ route('image.tmp-upload') }}">
<style type="text/css">
  .nav-tabs>li.active>a{
    color:#FFF !important;
    background-color: #444345 !important;
  }
  .error{
    border : 1px solid red;
  }
  .select2-container--default .select2-selection--single{
    height: 35px !important;
  }
</style>
@stop
@section('javascript_page')
<script type="text/javascript">

$(document).on('click', '.remove-image', function(){
  if( confirm ("Bạn có chắc chắn không ?")){
    $(this).parents('.col-md-3').remove();
  }
});
$(document).on('change', '#thong_tin_chung_id', function(){
  var name = $("#thong_tin_chung_id :selected").text() + ' ';
  $('#name').val(name);
   if( name != ''){
      $.ajax({
        url: $('#route_get_slug').val(),
        type: "POST",
        async: false,      
        data: {
          str : name
        },              
        success: function (response) {
          if( response.str ){                  
            $('#slug').val( response.str );
          }                
        }
      });
   }

});
$(document).on('click', '#btnSaveTagAjax', function(){
  var loai_id = $('#loai_id').val();
  $.ajax({
    url : $('#formAjaxTag').attr('action'),
    data: $('#formAjaxTag').serialize(),
    type : "post", 
    success : function(str_id){    
      $('#str_tag').val('');      
      $('#btnCloseModalTag').click();
      $.ajax({
        url : "{{ route('tag.ajax-list-dl') }}",
        data: { 
          loai_id : $('#loai_id').val(),          
          str_id : str_id
        },
        type : "get", 
        success : function(data){
            $('select[data-value='+ loai_id +']').html(data);
        }
      });
    }
  });
});
$(document).on('click', '#btnSaveColorAjax', function(){  
  $.ajax({
    url : $('#formAjaxColor').attr('action'),
    data: $('#formAjaxColor').serialize(),
    type : "post", 
    success : function(str_id){    
      $('#str_color').val('');      
      $('#btnCloseModalColor').click();
      $.ajax({
        url : "{{ route('tag.ajax-list-color') }}",
        data: {           
          str_id : str_id
        },
        type : "get", 
        success : function(data){
            $('#color_id').html(data);
        }
      });
    }
  });
});
    $(document).ready(function(){
       $('.btnAddValue').click(function(){
        $('#loai_id_ajax').val($('#loai_id').val());
          $('#tagModal').modal('show');
      });   
       $('.btnAddColor').click(function(){        
          $('#colorModal').modal('show');
      });   
      $('#cate_id').change(function(){         
        var obj = $(this);
            $.ajax({
              url : '{{ route('get-child') }}',
              data : {
                mod : 'thong_tin_chung',
                col : 'cate_id',
                id : obj.val()
              },
              type : 'POST',
              dataType : 'html',
              success : function(data){
                $('#thong_tin_chung_id').html(data);  
              }
            });
          
        });
      $('#btnSave').click(function(){
        var errReq = 0;
        $('#dataForm .req').each(function(){
          var obj = $(this);
          if(obj.val() == '' || obj.val() == '0'){
            errReq++;
            obj.addClass('error');
          }else{
            obj.removeClass('error');
          }
        });
        if(errReq > 0){          
         $('html, body').animate({
              scrollTop: $("#dataForm .req.error").eq(0).parents('div').offset().top
          }, 500);
          return false;
        }
        if( $('#div-image img.img-thumbnail').length == 0){
          if(confirm('Bạn chưa upload hình sản phẩm. Vẫn tiếp tục lưu ?')){
            return true;
          }else{
            $('html, body').animate({
                scrollTop: $("#dataForm").offset().top
            }, 500);
            $('a[href="#settings"]').click();            
             return false;
          }
        }

      });
      $('#is_old').change(function(){
        if($(this).prop('checked') == true){
          $('#price_new').addClass('req');
        }else{
          $('#price_new').val('').removeClass('req');
        }
      });
      $('#is_sale').change(function(){
        if($(this).prop('checked') == true){
          $('#price_sale').addClass('req');
        }else{
          $('#price_sale').val('').removeClass('req');
        }
      });
      $('#dataForm .req').blur(function(){    
        if($(this).val() != ''){
          $(this).removeClass('error');
        }else{
          $(this).addClass('error');
        }
      });
      $('#loai_id').change(function(){
        location.href="{{ route('old.create') }}?loai_id=" + $(this).val();
      })
      $(".select2").select2();
      $('#dataForm').submit(function(){
        /*var no_cate = $('input[name="category_id[]"]:checked').length;
        if( no_cate == 0){
          swal("Lỗi!", "Chọn ít nhất 1 thể loại!", "error");
          return false;
        }
        var no_country = $('input[name="country_id[]"]:checked').length;
        if( no_country == 0){
          swal("Lỗi!", "Chọn ít nhất 1 quốc gia!", "error");
          return false;
        }        
        */
        $('#btnSave').hide();
        $('#btnLoading').show();
      });     
      var editor2 = CKEDITOR.replace( 'khuyen_mai',{
          language : 'vi',
          height : 100,
          toolbarGroups : [
            
            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
            { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
            { name: 'links', groups: [ 'links' ] },           
            '/',
            
          ]
      });
      var editor3 = CKEDITOR.replace( 'mo_ta',{
          language : 'vi',
          height : 100,
          toolbarGroups : [
            
            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
            { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
            { name: 'links', groups: [ 'links' ] },           
            '/',
            
          ]
      });
      
     

      $('#name').change(function(){
         var name = $.trim( $(this).val() );
         if( name != ''){
            $.ajax({
              url: $('#route_get_slug').val(),
              type: "POST",
              async: false,      
              data: {
                str : name
              },              
              success: function (response) {
                if( response.str ){                  
                  $('#slug').val( response.str );
                }                
              },
              error: function(response){                             
                  var errors = response.responseJSON;
                  for (var key in errors) {
                    
                  }
                  //$('#btnLoading').hide();
                  //$('#btnSave').show();
              }
            });
         }
      });  
     
     
      
    });
    
</script>
@stop
