<form action="<?php echo route('search'); ?>" method="GET" id="searchForm">
<input type="hidden" name="sort" id="sort-filter" value="new">
<div class="col-md-3 col-sm-3 col-xs-12 block_cate_left" style="padding-bottom:30px">
    <div class="block block_modul">
        <div class="block_price">
            <h3 class="block_title">Khoảng giá</h3>
            <div class="block_content clearfix">
                <div class="slider-range">
                    <div id="slider-range"></div>
                    <div class="action clearfix">
                        <span id="amount-left"></span>
                        <span id="amount-right"></span>
                    </div>
                </div>
            </div>
            <input type="hidden" name="price_fm" value="<?php echo e($price_fm); ?>" id="price_fm" />
            <input type="hidden" name="price_to" value="<?php echo e($price_to); ?>" id="price_to" />
        </div>
    </div><!-- /block_modul -->
    <?php if($routeName != 'search'): ?>
    <div class="block block_modul">
        <div class="block_brands">
            <div class="box-accordion in">
                <div class="box-header accordion-header">
                    <h3 class="block_title">Hãng <?php echo e($loaiDetail ? $loaiDetail->name : ""); ?></h3>
                    <a href="javascript:void(0);" class="btn-opened" title="Down Up"></a>
                </div>
                <div class="box-collapse">
                    <div class="block_content">
                        <ul class="clearfix">
                            <?php foreach( $cateArrByLoai[$loaiDetail->id] as $cate): ?>
                            <li>
                                <input <?php echo e(isset($cateDetail) && $cateDetail->id == $cate->id ? "checked" : ""); ?> type="checkbox" class="cate-filter" name="cate[]" value="<?php echo $cate->id; ?>" id="brand-<?php echo $cate->id; ?>"> 
                                <label for="brand-<?php echo $cate->id; ?>" title="<?php echo $cate->name; ?>"><?php echo $cate->name; ?>

                                    <span class="number-prod"><?php echo e($cate->product->count()); ?></span>
                                </label>                            
                            </li>
                            <?php endforeach; ?>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- /block_brands -->
    </div><!-- /block_modul -->
    <?php else: ?>
    <?php foreach($loaiSpList as $loaiSp): ?>
    <div class="block block_modul">
        <div class="block_brands">
            <div class="box-accordion in">
                <div class="box-header accordion-header">
                    <h3 class="block_title"><?php echo $loaiSp->name; ?></h3>
                    <a href="javascript:void(0);" class="btn-opened" title="Down Up"></a>
                </div>
                <div class="box-collapse">
                    <div class="block_content">
                        <ul class="clearfix">
                            <?php foreach( $cateArrByLoai[$loaiSp->id] as $cate): ?>
                            <li>
                                <input type="checkbox" class="cate-filter" name="cate[]" value="<?php echo $cate->id; ?>" id="brand-<?php echo $cate->id; ?>"> 
                                <label for="brand-<?php echo $cate->id; ?>" title="<?php echo $cate->name; ?>"><?php echo $cate->name; ?>                                    
                                </label>                            
                            </li>
                            <?php endforeach; ?>                           
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- /block_brands -->
    </div><!-- /block_modul -->
    <?php endforeach; ?>
    <?php endif; ?>
    <div class="block block_modul" >
        <div class="block_colors">
            <div class="box-accordion in">
                <div class="box-header accordion-header">
                    <h3 class="block_title">MÀU SẮC</h3>
                    <a href="javascript:void(0);" class="btn-opened" title="Down Up"></a>
                </div>
                <div class="box-collapse">
                    <div class="block_content">
                        <ul class="search-color">
                            <?php foreach($colorList as $color): ?>
                            <li ><a href="javascript:;" class="color-filter" data-id="<?php echo e($color->id); ?>" style="background:<?php echo $color->color_code; ?>;"></a>
                            <input type="hidden" name="color[]" type="checkbox" value="" />
                            </li>
                            <?php endforeach; ?>                            
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- /block_colors -->
    </div><!-- /block_modul -->
</div><!-- /block_cate_left -->
<input type="hidden" name="loai_id" value="<?php echo e($loaiDetail->id); ?>">
<?php if(isset($cateDetail)): ?>
<input type="hidden" name="cate_id" value="<?php echo e($cateDetail->id); ?>">
<?php endif; ?>
</form>