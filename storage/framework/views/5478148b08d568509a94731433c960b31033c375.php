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
            <input type="hidden" name="keyword" value="<?php echo isset($tu_khoa) ? $tu_khoa : ""; ?>" >
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
                                <input <?php echo e(in_array($cate->id, $cateArr) ? "checked" : ""); ?> type="checkbox" class="cate-filter" name="cate[]" value="<?php echo $cate->id; ?>" id="brand-<?php echo $cate->id; ?>"> 
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
    <?php else: ?>
    <?php if(isset($loai_id)): ?>
        <?php foreach($loaiSpList as $loaiSp): ?>  
        <?php if($loaiSp->id == $loai_id): ?>  
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
                                    <input <?php echo e(in_array($cate->id, $cateArr) ? "checked" : ""); ?> type="checkbox" class="cate-filter" name="cate[]" value="<?php echo $cate->id; ?>" id="brand-<?php echo $cate->id; ?>"> 
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
        <?php endif; ?>
        <?php endforeach; ?>
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
                                    <input <?php echo e(in_array($cate->id, $cateArr) ? "checked" : ""); ?> type="checkbox" class="cate-filter" name="cate[]" value="<?php echo $cate->id; ?>" id="brand-<?php echo $cate->id; ?>"> 
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
                            <li ><a href="javascript:;" class="color-filter <?php if(in_array($color->id, $colorArr)): ?> active <?php endif; ?>" data-id="<?php echo e($color->id); ?>" style="background:<?php echo $color->color_code; ?>;"></a>
                            <input type="hidden" name="color[]" value="<?php echo e(in_array($color->id, $colorArr) ? $color->id : ""); ?>" />
                            </li>
                            <?php endforeach; ?>                            
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- /block_colors -->
    </div><!-- /block_modul -->
</div><!-- /block_cate_left -->
<?php if($loai_id): ?>
<input type="hidden" name="loai_id" value="<?php echo e($loai_id); ?>">
<?php endif; ?>
<?php if($cate_id): ?>
<input type="hidden" name="cate_id" value="<?php echo e($cate_id); ?>">
<?php endif; ?>
</form>