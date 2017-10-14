<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Cài đặt site
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="<?php echo e(route('settings.index')); ?>">Cài đặt</a></li>
      <li class="active">Cập nhật</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">   
    <form role="form" method="POST" action="<?php echo e(route('settings.update')); ?>">
    <div class="row">
      <!-- left column -->

      <div class="col-md-7">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Cập nhật</h3>
          </div>
          <!-- /.box-header -->               
            <?php echo csrf_field(); ?>


            <div class="box-body">
              <?php if(count($errors) > 0): ?>
                  <div class="alert alert-danger">
                      <ul>
                          <?php foreach($errors->all() as $error): ?>
                              <li><?php echo e($error); ?></li>
                          <?php endforeach; ?>
                      </ul>
                  </div>
              <?php endif; ?>
              <?php if(Session::has('message')): ?>
              <p class="alert alert-info" ><?php echo e(Session::get('message')); ?></p>
              <?php endif; ?>
                 <!-- text input -->
                <div class="form-group">
                  <label>Tên site <span class="red-star">*</span></label>
                  <input type="text" class="form-control" name="site_name" id="site_name" value="<?php echo e($settingArr['site_name']); ?>">
                </div>
                
                <div class="form-group">
                  <label>Facebook</label>
                  <input type="text" class="form-control" name="facebook_fanpage" id="facebook_fanpage" value="<?php echo e($settingArr['facebook_fanpage']); ?>">
                </div>
                <div class="form-group">
                  <label>Facebook APP ID</label>
                  <input type="text" class="form-control" name="facebook_appid" id="facebook_appid" value="<?php echo e($settingArr['facebook_appid']); ?>">
                </div>
                <div class="form-group">
                  <label>Google +</label>
                  <input type="text" class="form-control" name="google_fanpage" id="google_fanpage" value="<?php echo e($settingArr['google_fanpage']); ?>">
                </div>
                <div class="form-group">
                  <label>Twitter</label>
                  <input type="text" class="form-control" name="twitter_fanpage" id="twitter_fanpage" value="<?php echo e($settingArr['twitter_fanpage']); ?>">
                </div>
                <div class="form-group">
                  <label>Email CC</label>
                  <textarea class="form-control" rows="3" name="email_cc" id="email_cc"><?php echo e($settingArr['email_cc']); ?></textarea>
                </div>
                <div class="form-group">
                  <label>Mô tả chung</label>
                  <textarea class="form-control" rows="7" name="mo_ta_sp" id="mo_ta_sp"><?php echo e($settingArr['mo_ta_sp']); ?></textarea>
                </div>
                <div class="form-group">
                  <label>Code google analystic </label>
                  <input type="text" class="form-control" name="google_analystic" id="google_analystic" value="<?php echo e($settingArr['google_analystic']); ?>">
                </div>   
                <div class="form-group" style="margin-top:10px;margin-bottom:10px">  
                  <label class="col-md-3 row">Logo </label>    
                  <div class="col-md-9">
                    <img id="thumbnail-logo" src="<?php echo e($settingArr['logo'] ? Helper::showImage($settingArr['logo']) : URL::asset('public/admin/dist/img/img.png')); ?>" class="img-logo" width="150" >                    
                    <button class="btn btn-default btnSingleUpload" data-set="logo" type="button"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>
                  </div>
                  <div style="clear:both"></div>
                </div>               
                
                <div style="clear:both"></div> 
                <div class="form-group" style="margin-top:10px;margin-bottom:10px">  
                  <label class="col-md-3 row">Banner ( og:image ) </label>    
                  <div class="col-md-9">
                    <img id="thumbnail-banner" src="<?php echo e($settingArr['banner'] ? Helper::showImage($settingArr['banner']) : URL::asset('public/admin/dist/img/img.png')); ?>" class="img-banner" width="200">
                 
                    <button class="btn btn-default btnSingleUpload" data-set="banner" type="button"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>
                  </div>
                  <div style="clear:both"></div>
                </div>
                <div style="clear:both"></div>            
                 
            </div>                        
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Lưu</button>         
            </div>
            
        </div>
        <!-- /.box -->     

      </div>
      <div class="col-md-5">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Thông tin SEO</h3>
          </div>
          <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <label>Meta title <span class="red-star">*</span></label>
                <input type="text" class="form-control" name="site_title" id="site_title" value="<?php echo e($settingArr['site_title']); ?>">
              </div>
              <!-- textarea -->
              <div class="form-group">
                <label>Meta desciption <span class="red-star">*</span></label>
                <textarea class="form-control" rows="4" name="site_description" id="site_description"><?php echo e($settingArr['site_description']); ?></textarea>
              </div>  

              <div class="form-group">
                <label>Meta keywords <span class="red-star">*</span></label>
                <textarea class="form-control" rows="4" name="site_keywords" id="site_keywords"><?php echo e($settingArr['site_keywords']); ?></textarea>
              </div>  
              <div class="form-group">
                <label>Custom text</label>
                <textarea class="form-control" rows="4" name="custom_text" id="custom_text"><?php echo e($settingArr['custom_text']); ?></textarea>
              </div>
            
        </div>
        <!-- /.box -->     

      </div>
      <!--/.col (left) -->      
    </div>
<input type="hidden" name="logo" id="logo" value="<?php echo e($settingArr['logo']); ?>"/>          
<input type="hidden" name="favicon" id="favicon" value="<?php echo e($settingArr['favicon']); ?>"/>          
<input type="hidden" name="banner" id="banner" value="<?php echo e($settingArr['banner']); ?>"/>    
    </form>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>