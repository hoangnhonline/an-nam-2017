<?php echo $__env->make('frontend.partials.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<div class="block block_breadcrumb">
    <ol class="breadcrumb">
        <li><a href="<?php echo e(route('home')); ?>" title="Trở về trang chủ">Trang chủ</a></li>       
        <li class="active">Kết quả lọc</li>
    </ol>
</div><!-- /block_breadcrumb -->
<?php echo $__env->make('frontend.home.ads', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="block_categories row">
    <?php echo $__env->make('frontend.search.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="col-md-9 col-sm-9 col-xs-12 block_cate_right">                        
        <div class="block block_view">
            <span>Xem theo:</span>
            <ul class="block_content">
                <li <?php if($sort=="new"): ?> class="active" <?php endif; ?>><a href="javascript:;" data-sort="new" class="sort">Mới nhất</a></li>
                <li <?php if($sort=="old"): ?> class="active" <?php endif; ?>><a href="javascript:;" data-sort="old" class="sort" title="Cũ nhất">Cũ nhất</a></li>
                <li <?php if($sort=="high"): ?> class="active" <?php endif; ?>><a href="javascript:;" data-sort="high" class="sort" title="Giá cao nhất">Giá cao nhất</a></li>
                <li <?php if($sort=="low"): ?> class="active" <?php endif; ?>><a href="javascript:;" data-sort="low" class="sort" title="Giá thấp nhất">Giá thấp nhất</a></li>
            </ul>
            
            <!-- <a href="#" onclick="return false;" class="filter-prod">Bộ lọc sản phẩm</a> -->
        </div><!-- /block_view_by -->
        <div class="block block_product block_pg-product">
            <h3 class="block_title block_title_link">
                KẾT QUẢ LỌC            
                <span class="num"><?php echo e($productList->total()); ?></span>    
            </h3>
            <div class="block_content row">
                <ul class="list">
                  <?php foreach( $productList as $product ): ?>
                    <li class="col-sm-3 col-xs-6 product_item">
                        <div class="item">
                            <a href="<?php echo e(route('product-detail', [$product->slug, $product->id])); ?>" title="<?php echo $product->name; ?>">
                                <div class="product_img">
                                    <img class="lazy" data-original="<?php echo e($product->image_url ? Helper::showImageThumb($product->image_url) : URL::asset('admin/dist/img/no-image.jpg')); ?>" alt="<?php echo $product->name; ?>" title="<?php echo $product->name; ?>">
                                </div>
                                <div class="product_info">
                                  <h3 class="product_name"><?php echo $product->name; ?></h3>
                                  <div class="product_price">
                                  <span class="product_price_new"><?php echo e($product->is_sale == 1 ? number_format($product->price_sale) : number_format($product->price)); ?>đ</span>
                                  <?php if($product->is_sale): ?>
                                  <span class="product_price_old"><?php echo e(number_format($product->price)); ?>đ</span>
                                  <?php endif; ?>
                                </div>
                                <?php if($product->is_new): ?>
                                <span class="new">NEW</span>
                                <?php endif; ?>
                                <?php if($product->is_sale): ?>
                                <span class="sale_off">GIẢM <?php echo e(ceil(($product->price-$product->price_sale)*100/$product->price)); ?>%</span>
                                <?php endif; ?>
                                </div>
                                <div class="product_detail">
                                  <p class="name"><?php echo $product->name; ?></p>
                                        <div class="product_price">
                                  <span class="product_price_new"><?php echo e($product->is_sale == 1 ? number_format($product->price_sale) : number_format($product->price)); ?>đ</span>
                                  <?php if($product->is_sale): ?>
                                  <span class="product_price_old"><?php echo e(number_format($product->price)); ?>đ</span>
                                  <?php endif; ?>
                                </div>
                                <?php if( $product->loaiSp->is_hover == 1): ?>            
                                    <?php foreach($hoverInfo[$product->loai_id] as $info): ?>
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

                                </div>
                            </a>
                        </div>
                    </li><!-- /product_item -->        
                    <?php endforeach; ?>                              
                </ul>
                <div class="clearfix"></div>
                <div class="text-center">
                    <div class="block_pagination">
                        <?php echo e($productList->appends(['loai_id' => $loai_id, 'cate_id' => $cate_id, 'price_fm' => $price_fm, 'price_to' => $price_to, 'cate' => $cateArr, 'keyword' => $tu_khoa, 'color' => $colorArr])->links()); ?>   
                    </div>                
                </div>
            </div>
        </div><!-- /block_product -->
    </div><!-- /block_cate_right -->
</div><!-- /block_categories -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
    (function($) {
        "use strict";
        /*  [ Filter by price ]
        - - - - - - - - - - - - - - - - - - - - */
        $('#slider-range').slider({
            range: true,
            min: 0,
            max: 50000000,
            values: [<?php echo e($price_fm); ?>, <?php echo e($price_to); ?>],
            step : 2000000,
            slide: function (event, ui) {
                $('#amount-left').text(ui.values[0]);
                $('#price_fm').val(ui.values[0]);
                $('#amount-right').text(ui.values[1] );
                $('#price_to').val(ui.values[1]);
                $('#searchForm').submit();
            }
        });
        $('#amount-left').text($('#slider-range').slider('values', 0));        
        $('#amount-right').text($('#slider-range').slider('values', 1));        
    })(jQuery);
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>