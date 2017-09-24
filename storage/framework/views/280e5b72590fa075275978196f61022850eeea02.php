<div class="block block_newshot">
  <div class="block_content row">
    <div class="col-md-6 col-sm-6 col-xs-12 item">    
      <div class="block_inner">   
        <?php 
        $bannerArr = DB::table('banner')->where(['object_id' => 2, 'object_type' => 3])->orderBy('display_order', 'asc')->get();
        ?>    
        <?php if($bannerArr): ?>
          <?php foreach($bannerArr as $banner): ?>
            <?php if($banner->ads_url !=''): ?>
            <a href="<?php echo e($banner->ads_url); ?>" title="banner slide <?php echo e($i); ?>">
            <?php endif; ?>
            <img src="<?php echo e(Helper::showImage($banner->image_url)); ?>" alt="banner trai">  
            <?php if($banner->ads_url !=''): ?>
            </a>
            <?php endif; ?>
          <?php endforeach; ?>  
        <?php endif; ?> 
      </div>
    </div><!-- /item -->
    <div class="col-md-6 col-sm-6 col-xs-12 item">
      <?php 
        $bannerArr = DB::table('banner')->where(['object_id' => 3, 'object_type' => 3])->orderBy('display_order', 'asc')->get();
        ?>    
        <?php if($bannerArr): ?>
          <?php foreach($bannerArr as $banner): ?>
            <?php if($banner->ads_url !=''): ?>
            <a href="<?php echo e($banner->ads_url); ?>" title="banner slide <?php echo e($i); ?>">
            <?php endif; ?>
            <img src="<?php echo e(Helper::showImage($banner->image_url)); ?>" alt="banner trai">  
            <?php if($banner->ads_url !=''): ?>
            </a>
            <?php endif; ?>
          <?php endforeach; ?>  
        <?php endif; ?> 
    </div><!-- /item -->
  </div>
</div><!-- /block_newshot -->