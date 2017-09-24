<?php $__env->startSection('content'); ?>

<div class="block_cate_top">
  <ul class="list">
    <li class="actused" style="margin-left:0px"><a href="<?php echo e(route('old-device')); ?>" title="Máy cũ nổi bật">Máy cũ nổi bật</a></li>
    <?php foreach( $loaiSpList as $loaiSp): ?>
    <li><a href="<?php echo e(route('old-cate', $loaiSp->slug )); ?>" title="<?php echo $loaiSp->name; ?> cũ"><?php echo $loaiSp->name; ?> cũ</a></li>
    <?php endforeach; ?>   
  </ul>
</div><!-- /block_cate_top -->
<?php foreach( $loaiSpList as $loaiSp): ?>
<?php if($productArr[$loaiSp->id]->count() > 0): ?>
<div class="block block_product block_product_old">
    <h3 class="block_title">
      <span><?php echo $loaiSp->name; ?> CŨ GIÁ RẺ</span>
      <a class="view-all" href="<?php echo e(route('old-cate', $loaiSp->slug )); ?>">Xem tất cả</a>
    </h3>
    <div class="block_content">
      <div class="list_de_old">
        <ul class="pro_de_old">
          <?php foreach( $productArr[$loaiSp->id] as $product ): ?>
          <li class="col-sm-5ths col-xs-6 product_item">
            <div class="de_old_img">
              <a href="<?php echo e(route('product-detail', [$product->slug, $product->id])); ?>" title="<?php echo $product->name; ?>">
                <img width="150" height="150" alt="<?php echo $product->name; ?>" class="lazy" data-original="<?php echo e($product->image_url ? Helper::showImageThumb($product->image_url) : URL::asset('admin/dist/img/no-image.jpg')); ?>">
              </a>
              <figure class="product_detail_de">
                  <?php if( $loaiSp->is_hover == 1): ?>            
                  <?php foreach($hoverInfo[$loaiSp->id] as $info): ?>
                  <?php 
                  $tmpInfo = explode(",", $info->str_thuoctinh_id);              
                  ?>

                  <p>
                  <?php echo $info->text_hien_thi; ?>: 
                  <?php                  
                  $spThuocTinhArr = json_decode( $product->thuoc_tinh, true);                 
                  
                  $countT = 0; $totalT = count($tmpInfo);
                  foreach( $tmpInfo as $tinfo){
                      $countT++;
                      if(isset($spThuocTinhArr[$tinfo])){
                          echo $spThuocTinhArr[$tinfo];
                          echo $countT < $totalT ? ", " : "";
                      }
                  }
                   ?>                   
                   </p>
                  <?php endforeach; ?>
                  
                <?php endif; ?>   
              </figure>
            </div>
            <div class="product_info">
              <h3 class="product_name">
                <a href="<?php echo e(route('product-detail', [$product->slug, $product->id])); ?>" title=""><?php echo $product->name; ?></a>
              </h3>
              <div class="product_price">
              <p class="price_title price_now">Giá : <span><?php echo e(number_format($product->price)); ?>₫</span></p>
                <?php if($product->price_new): ?>
                <p class="price_title price_old">Giá máy mới: <span><?php echo e(number_format($product->price_new)); ?>₫</span></p>

                <p class="price_title price_compare">Rẻ hơn máy mới: <span><?php echo e(number_format($product->price_new - $product->price)); ?>₫</span></p>
                <?php endif; ?>
            </div> 
            <?php if($product->is_sale): ?>
            <span class="sale_off">GIẢM <?php echo e(ceil(($product->price-$product->price_sale)*100/$product->price)); ?>%</span>
            <?php endif; ?>          
            </div>
          </li><!-- /product_item -->
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div><!-- /block_product -->
  <?php endif; ?>
<?php endforeach; ?>

<?php $__env->stopSection(); ?>