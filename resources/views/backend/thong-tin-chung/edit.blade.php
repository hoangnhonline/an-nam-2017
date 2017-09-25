@extends('backend.layout')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Thông tin sản phẩm    
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('thong-tin-chung.index') }}">Thông tin sản phẩm</a></li>
      <li class="active">Chỉnh sửa</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <a class="btn btn-default btn-sm" href="{{ route('thong-tin-chung.index', ['loai_id' => $detail->loai_id]) }}" style="margin-bottom:5px">Quay lại</a>
    
    <form role="form" method="POST" action="{{ route('thong-tin-chung.update') }}" id="dataForm">
    <div class="row">
      <!-- left column -->
      <input type="hidden" name="id" value="{{ $detail->id }}">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Chỉnh sửa</h3>
          </div>
          <!-- /.box-header -->               
            {!! csrf_field() !!}          
            <div class="box-body">
                @if(Session::has('message'))
                <p class="alert alert-info" >{{ Session::get('message') }}</p>
                @endif
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
                    <li role="presentation"><a href="#thuoctinh" aria-controls="thuoctinh" role="tab" data-toggle="tab">Thuộc tính</a></li>                                  
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <div class="form-group">
                          <label for="email">Loại sản phẩm<span class="red-star">*</span></label>
                          <select class="form-control req" name="loai_id" id="loai_id">
                            <option value="">--Chọn--</option>
                            @foreach( $loaiSpList as $value )
                            <option value="{{ $value->id }}" @if(old('loai_id', $detail->loai_id) == $value->id ) selected @endif
                            >{{ $value->name }}</option>
                            @endforeach
                          </select>
                        </div>                        
                        <div class="form-group" >                  
                          <label>Tên sản phẩm <span class="red-star">*</span></label>
                          <input type="text" class="form-control req" name="name" id="name" value="{{ old('name', $detail->name) }}">
                        </div>
                        
                      <div class="form-group">
                        <label>Chi tiết</label>
                        <textarea class="form-control" rows="10" name="detail" id="detail">{{ old('detail', $detail->detail) }}</textarea>
                      </div>
                        <div class="clearfix"></div>
                    </div><!--end thong tin co ban-->                   
                   
                     <div role="tabpanel" class="tab-pane" id="thuoctinh">
                     
                     @if( !empty( $thuocTinhArr ))
                     <table class="table table-responsive table-bordered">
                      @foreach($thuocTinhArr as $loaithuoctinh)
                        <tr style="background-color:#CCC">
                          <td colspan="2">{{ $loaithuoctinh['name']}}</td>
                        </tr>
                        @if( !empty($loaithuoctinh['child']))
                          @foreach( $loaithuoctinh['child'] as $thuoctinh)
                          <tr>
                            <td width="150">{{ $thuoctinh['name']}}</td>
                            <td><input type="text" class="form-control" name="thuoc_tinh[{{ $thuoctinh['id'] }}]" value="{{ isset($spThuocTinhArr[$thuoctinh['id']]) ?  $spThuocTinhArr[$thuoctinh['id']] : "" }}" ></td>
                          </tr>
                          @endforeach
                        @endif
                      @endforeach
                      </table>
                     @endif
                     
                     </div>
                  </div>

                </div>
                  
            </div>
            <div class="box-footer">             
              <button type="button" class="btn btn-default" id="btnLoading" style="display:none"><i class="fa fa-spin fa-spinner"></i></button>
              <button type="submit" class="btn btn-primary" id="btnSave">Lưu</button>
              <a class="btn btn-default" class="btn btn-primary" href="{{ route('thong-tin-chung.index', ['loai_id' => $detail->loai_id])}}">Hủy</a>
            </div>
            
        </div>
        <!-- /.box -->     

      </div>
   

    </form>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<style type="text/css">
  .nav-tabs>li.active>a{
    color:#FFF !important;
    background-color: #444345 !important;
  }
  .error{
    border : 1px solid red;
  }
</style>
@stop
@section('javascript_page')
<script type="text/javascript">

    $(document).ready(function(){
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
        
      });
      
      $('#dataForm .req').blur(function(){    
        if($(this).val() != ''){
          $(this).removeClass('error');
        }else{
          $(this).addClass('error');
        }
      });
      $('#loai_id').change(function(){
        location.href="{{ route('thong-tin-chung.create') }}?loai_id=" + $(this).val();
      })
      $(".select2").select2();
     
      var editor = CKEDITOR.replace( 'detail',{
          language : 'vi',
          height:500,
          filebrowserBrowseUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/browse.php?type=files') }}",
          filebrowserImageBrowseUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/browse.php?type=images') }}",
          filebrowserFlashBrowseUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/browse.php?type=flash') }}",
          filebrowserUploadUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/upload.php?type=files') }}",
          filebrowserImageUploadUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/upload.php?type=images') }}",
          filebrowserFlashUploadUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/upload.php?type=flash') }}"
      });
    
     
    });
    
</script>
@stop
